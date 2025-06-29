<?php

namespace App\Http\Controllers;

use App\Models\tr_krriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\select;

class DataKaryawanController extends Controller
{
    public function karyawan()
    {
        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('dashboard')],
            ['title' => 'Analysis', 'url' => '/list-terbaik', 'active' => true],
        ];
        $this->generateBreadcrumb($breadcrumbs, $breadcrumbsTitle = 'Dashboard');
        return view('dashboard.karyawan.index', [
            'title' => 'Karyawan',
            'active' => 'karyawan',
            'karyawan' => User::where('is_admin', 0)->get()
        ]);
    }


    public function data_karywan()
    {
        try {

            $karyawan = User::all();

            if ($karyawan->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'data' => [],
                    'message' => 'Data karyawan tidak ditemukan.'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $karyawan
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'An error occurred: ' . $th->getMessage()
            ], 500);
        }
    }

    public function karyawan_store(Request $request)
    {
        Log::info($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
        ]);
        $validatedData['password'] = Hash::make('password');
        $saveEmployee = User::create($validatedData);
        return response()->json([
            'success' => true,
            'data' => $saveEmployee,
            'message' => 'Karyawaan berhasil ditambah.'
        ]);
    }

    public function editKaryawan($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }
        return response()->json($user);
    }

    public function editKriteria($id)
    {
        $kriteria = tr_krriteria::find($id);
        if (!$kriteria) {
            return response()->json(['message' => 'kriteria not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $kriteria
        ]);
    }

    public function karyawan_update(Request $request, $id)
    {
        $employee = User::find($id);
        if (!$employee) {
            return response()->json(['message' => 'user not found'], 404);
        }
        $validated = $request->validate([
            // 'name_category' => 'required|string|max:255|unique:tm_category,name_category,' . $employee->id,
            'name' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
        ]);

        $employee->update($validated);
        return response()->json([
            'success' => true,
            'data' => $employee,
            'message' => 'Karyawaan berhasil diupdate.'
        ]);
        // Log::info($request->all());
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'jabatan' => 'required',
        // ]);
        // $saveEmployee = User::where('id', $request->id)->update($validatedData);
        // if (!$saveEmployee) {
        //     # code...
        // }
        // return response()->json([
        //     'success' => true,
        //     'data' => $saveEmployee,
        //     'message' => 'Karyawaan berhasil diupdate.'
        // ]);
    }

    public function karyawan_delete($id)
    {
        $employee = User::find($id);
        if (!$employee) {
            return response()->json(['message' => 'user not found'], 404);
        }
        $employee->delete();
        return response()->json([
            'success' => true,
            'data' => $employee,
            'message' => 'Karyawaan berhasil dihapus.'
        ]);
    }

    public function kriteria()
    {
        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('dashboard')],
            ['title' => 'Analysis', 'url' => 'javascript:;', 'active' => true],
        ];
        $this->generateBreadcrumb($breadcrumbs, $breadcrumbsTitle = 'Dashboard');
        return view('dashboard.kriteria.index', [
            'title' => 'Kriteria',
            'active' => 'kriteria',
            'kriteria' => tr_krriteria::all()
        ]);
    }

    public function kriteria_store(Request $request)
    {
        // dd($request->all());
        Log::info($request->all());
        $validated = $request->validate([
            'kriteria' => 'required|string',
            'bobot' => 'required|integer',
            'tipe' => 'required|string',

        ]);

        $kriteria = tr_krriteria::create($validated);

        return response()->json([
            'success' => true,
            'data' => $kriteria,
            'message' => 'Kriteria berhasil ditambah.'
        ]);
        // return response()->json([
        //     'success' => true,
        //     'data' => [
        //         'id' => $kriteria->id, // pastikan ini ada
        //         'kriteria' => $kriteria->kriteria,
        //         'bobot' => $kriteria->bobot,
        //         'tipe' => $kriteria->tipe,
        //     ],
        //     'message' => 'Kriteria berhasil ditambah.'
        // ]);
    }

    public function kriteria_update(Request $request, $id)
    {
        $kriteria = tr_krriteria::find($id);
        if (!$kriteria) {
            return response()->json(['message' => 'kriteria not found'], 404);
        }
        $validated = $request->validate([
            'kriteria' => 'required|string',
            'bobot' => 'required|integer',
            'tipe' => 'required|string',

        ]);

        $kriteria->update($validated);
        return response()->json([
            'success' => true,
            'data' => $kriteria,
            'message' => 'Kriteria berhasil diupdate.'
        ]);
    }

    public function getKriteria()
    {
        try {
            // $kriteria = DB::table('tr_krriterias')->select('id', 'kriteria')->get();
            $kriteria = tr_krriteria::all();
            if ($kriteria->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'data' => [],
                    'message' => 'Data kriteria tidak ditemukan.'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $kriteria
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'An error occurred: ' . $th->getMessage()
            ], 500);
        }
    }

    public function kriteria_delete($id)
    {
        $kriteria = tr_krriteria::find($id);
        if (!$kriteria) {
            return response()->json(['message' => 'kriteria not found'], 404);
        }
        $kriteria->delete();
        return response()->json([
            'success' => true,
            'data' => $kriteria,
            'message' => 'Kriteria berhasil dihapus.'
        ]);
    }
}
