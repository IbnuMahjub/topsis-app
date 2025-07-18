<?php

namespace App\Http\Controllers;

use App\Models\TopsisResult;
use Illuminate\Http\Request;

class TopsisController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('dashboard')],
            ['title' => 'Analysis', 'url' => 'javascript:;', 'active' => true],
        ];
        $this->generateBreadcrumb($breadcrumbs, $breadcrumbsTitle = 'Dashboard');
        return view('dashboard.topsis.index', [
            'title' => 'Topsis',
            'active' => 'topsis',
        ]);
    }

    public function simpanHasil(Request $request)
    {
        $validated = $request->validate([
            'nama_terbaik' => 'required|string',
            'nilai_preferensi' => 'required|numeric',
            'log_perhitungan' => 'required',
        ]);

        $validated['status'] = 0;
        $hasil = TopsisResult::create($validated);

        return response()->json([
            'success' => true,
            'data' => $hasil
        ]);
    }

    public function karyawanTerbaik()
    {
        $semuaHasil = TopsisResult::orderByDesc('id')->get(); // Ambil semua, urutkan terbaru duluan

        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('dashboard')],
            // ['title' => 'Analysis', 'url' => 'javascript:;', 'active' => true],
            ['title' => 'Karyawan Terbaik', 'url' => '/list-terbaik', 'active' => true],

        ];
        $this->generateBreadcrumb($breadcrumbs, $breadcrumbsTitle = 'Grafik Karyawan Terbaik');

        return view('dashboard.topsis.karyawan-terbaik', [
            'title' => 'Karyawan Terbaik',
            'semuaHasil' => $semuaHasil
        ]);
    }
    public function karyawanTerbaikTable()
    {
        $semuaHasil = TopsisResult::where('status', 1)
            ->orderByDesc('nilai_preferensi') // Urut dari yang tertinggi
            ->get();

        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('dashboard')],
            // ['title' => 'Analysis', 'url' => 'javascript:;', 'active' => true],
            ['title' => 'Grafik Karyawan Terbaik', 'url' => '/topsis/karyawan-terbaik', 'active' => true],
        ];
        $this->generateBreadcrumb($breadcrumbs, $breadcrumbsTitle = 'Karyawan Terbaik');

        return view('dashboard.topsis.karyawan-terbaik-table', [
            'title' => 'Karyawan Terbaik',
            'semuaHasil' => $semuaHasil
        ]);
    }

    public function destroy($id)
    {
        $hasil = TopsisResult::findOrFail($id);
        $hasil->delete();

        return redirect()->back()->with('success', 'Data hasil TOPSIS berhasil dihapus.');
    }
}
