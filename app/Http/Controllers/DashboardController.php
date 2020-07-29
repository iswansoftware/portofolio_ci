<?php

namespace App\Http\Controllers;

use App\Portofolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $portofolioCount = Portofolio::count();

        $portofolio = Portofolio::all();

        return view('dashboard.index')
            ->with([
                'portofolioCount' => $portofolioCount,
                'portofolio' => $portofolio,
            ]);
    }
}
