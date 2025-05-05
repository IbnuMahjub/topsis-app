<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $token = session('token');
        // $url = env('API_URL') . '/api/countOrder';
        // $response = Http::withToken($token)->get($url);
        // $data = $response->json();
        // dd($response->json());       

        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('dashboard')],
            ['title' => 'Analysis', 'url' => 'javascript:;', 'active' => true],
        ];
        $this->generateBreadcrumb($breadcrumbs, $breadcrumbsTitle = 'Dashboard');
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            // 'orders' => $data['dataorder'],
            // 'orderCount' => $data['count'],
        ]);
    }
}
