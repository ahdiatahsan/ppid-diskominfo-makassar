<?php

namespace App\Http\Controllers;

use App\Models\berkala;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BerkalaPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.berkala.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $berkala = berkala::all();
            return DataTables::of($berkala)
                ->addColumn('action', function ($berkala) {
                    return view('user.berkala.action', compact('berkala'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function download(berkala $berkala)
    {
        $filepath = Storage::url('public/berkala/' . $berkala->unduhan);
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        return response()->download(public_path($filepath), $berkala->ringkasan . '.' . $extension);
    }

}
