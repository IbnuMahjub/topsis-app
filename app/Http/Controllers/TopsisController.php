<?php

namespace App\Http\Controllers;

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
}
