<?php

namespace App\Http\Controllers;

use App\Models\sertamerta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SertamertaPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.sertamerta.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $sertamerta = sertamerta::all();
            return DataTables::of($sertamerta)
                ->addColumn('action', function ($sertamerta) {
                    return view('user.sertamerta.action', compact('sertamerta'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function download(sertamerta $sertamerta)
    {
        $filepath = Storage::url('public/sertamerta/' . $sertamerta->unduhan);
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        return response()->download(public_path($filepath), $sertamerta->ringkasan . '.' . $extension);
    }
}
