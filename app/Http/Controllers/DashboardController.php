<?php

namespace App\Http\Controllers;

use App\Models\berkala;
use App\Models\sertamerta;
use App\Models\setiapsaat;
use App\Models\infografis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $berkala = collect(berkala::select('id')->get())->count();
        $sertamerta = collect(sertamerta::select('id')->get())->count();
        $setiapsaat = collect(setiapsaat::select('id')->get())->count();
        $infografis = collect(infografis::select('id')->get())->count();

        return view('admin.dashboard', compact('berkala', 'sertamerta', 'setiapsaat', 'infografis'));
    }
}
