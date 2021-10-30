<?php

namespace App\Http\Controllers;

use App\Models\berkala;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class BerkalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.berkala.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $berkala = berkala::all();
            return DataTables::of($berkala)
                ->addColumn('action', function ($berkala) {
                    return view('admin.berkala.action', compact('berkala'))->render();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berkala.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ringkasan' => 'required|string',
            'unit' => 'required|string',
            'penanggungjawab' => 'required|string',
            'jangka' => 'required|string',
            'unduhan' => 'required|file|max:2048|mimes:pdf,docx,doc,xlsx,xls'
        ]);

        $file = $request->file('unduhan');
        $fileName = $request->ringkasan . '.' . $file->getClientOriginalExtension();

        berkala::create([
            'ringkasan' => $request->input('ringkasan'),
            'unit' => $request->input('unit'),
            'penanggungjawab' => $request->input('penanggungjawab'),
            'jangka' => $request->input('jangka'),
            'unduhan' => $fileName
        ]);

        Storage::putFileAs('public/berkala', $file, $fileName);

        return redirect()->route('berkala.index')->with('success', 'Data berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function show(berkala $berkala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function edit(berkala $berkala)
    {
        return view('admin.berkala.edit', compact('berkala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berkala $berkala)
    {
        $request->validate([
            'ringkasan' => 'required|string',
            'unit' => 'required|string',
            'penanggungjawab' => 'required|string',
            'jangka' => 'required|string'
        ]);

        if ($request->file('unduhan') != null) {
            $request->validate([
                'unduhan' => 'required|file|max:2048|mimes:pdf,docx,doc,xlsx,xls',
                'unduhan_lama' => 'required|string'
            ]);

            if (Storage::exists('public/berkala/' . $request->unduhan_lama)) {
                Storage::delete('public/berkala/' . $request->unduhan_lama);
            }

            if (Storage::exists('public/berkala/' . $berkala->unduhan)) {
                Storage::delete('public/berkala/' . $berkala->unduhan);
            }

            $file = $request->file('unduhan');
            $fileName = $request->ringkasan . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/berkala', $file, $fileName);

            $berkala->unduhan = $fileName;
        }

        $berkala->ringkasan = $request['ringkasan'];
        $berkala->unit = $request['unit'];
        $berkala->penanggungjawab = $request['penanggungjawab'];
        $berkala->jangka = $request['jangka'];
        $berkala->save();

        return redirect()->route('berkala.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function destroy(berkala $berkala)
    {
        if (Storage::exists('public/berkala/' . $berkala->unduhan)) {
            Storage::delete('public/berkala/' . $berkala->unduhan);
        }

        $berkala->delete();

        return redirect()->route('berkala.index')->with('success', 'Data berhasil dihapus.');
    }
}
