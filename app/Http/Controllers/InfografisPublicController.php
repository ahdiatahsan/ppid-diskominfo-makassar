<?php

namespace App\Http\Controllers;

use App\Models\infografis;
use Illuminate\Http\Request;

class InfografisPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infografises = infografis::orderBy('created_at', 'desc')->get();

        return view('user.infografis.index', compact('infografises'));
    }
    
}
