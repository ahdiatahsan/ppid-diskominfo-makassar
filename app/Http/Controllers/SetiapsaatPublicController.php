<?php

namespace App\Http\Controllers;

use App\Models\setiapsaat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SetiapsaatPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.setiapsaat.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $setiapsaat = setiapsaat::all();
            return DataTables::of($setiapsaat)
                ->addColumn('action', function ($setiapsaat) {
                    return view('user.setiapsaat.action', compact('setiapsaat'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function download(setiapsaat $setiapsaat)
    {
        $filepath = Storage::url('public/setiapsaat/' . $setiapsaat->unduhan);
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        return response()->download(public_path($filepath), $setiapsaat->ringkasan . '.' . $extension);
    }
}
