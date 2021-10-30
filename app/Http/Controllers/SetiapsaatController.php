<?php

namespace App\Http\Controllers;

use App\Models\setiapsaat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SetiapsaatController extends Controller
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
        return view('admin.setiapsaat.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $setiapsaat = setiapsaat::all();
            return DataTables::of($setiapsaat)
                ->addColumn('action', function ($setiapsaat) {
                    return view('admin.setiapsaat.action', compact('setiapsaat'))->render();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setiapsaat.create');
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
            'penanggungjawab' => 'required|string',
            'telp' => 'required|string',
            'unduhan' => 'required|file|max:2048|mimes:pdf,docx,doc,xlsx,xls'
        ]);

        $file = $request->file('unduhan');
        $fileName = $request->ringkasan . '.' . $file->getClientOriginalExtension();

        setiapsaat::create([
            'ringkasan' => $request->input('ringkasan'),
            'penanggungjawab' => $request->input('penanggungjawab'),
            'telp' => $request->input('telp'),
            'unduhan' => $fileName
        ]);

        Storage::putFileAs('public/setiapsaat', $file, $fileName);

        return redirect()->route('setiapsaat.index')->with('success', 'Data berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\setiapsaat  $setiapsaat
     * @return \Illuminate\Http\Response
     */
    public function show(setiapsaat $setiapsaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setiapsaat  $setiapsaat
     * @return \Illuminate\Http\Response
     */
    public function edit(setiapsaat $setiapsaat)
    {
        return view('admin.setiapsaat.edit', compact('setiapsaat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setiapsaat  $setiapsaat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setiapsaat $setiapsaat)
    {
        $request->validate([
            'ringkasan' => 'required|string',
            'penanggungjawab' => 'required|string',
            'telp' => 'required|string'
        ]);

        if ($request->file('unduhan') != null) {
            $request->validate([
                'unduhan' => 'required|file|max:2048|mimes:pdf,docx,doc,xlsx,xls',
                'unduhan_lama' => 'required|string'
            ]);

            if (Storage::exists('public/setiapsaat/' . $request->unduhan_lama)) {
                Storage::delete('public/setiapsaat/' . $request->unduhan_lama);
            }

            if (Storage::exists('public/setiapsaat/' . $setiapsaat->unduhan)) {
                Storage::delete('public/setiapsaat/' . $setiapsaat->unduhan);
            }

            $file = $request->file('unduhan');
            $fileName = $request->ringkasan . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/setiapsaat', $file, $fileName);

            $setiapsaat->unduhan = $fileName;
        }

        $setiapsaat->ringkasan = $request['ringkasan'];
        $setiapsaat->penanggungjawab = $request['penanggungjawab'];
        $setiapsaat->telp = $request['telp'];
        $setiapsaat->save();

        return redirect()->route('setiapsaat.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setiapsaat  $setiapsaat
     * @return \Illuminate\Http\Response
     */
    public function destroy(setiapsaat $setiapsaat)
    {
        if (Storage::exists('public/setiapsaat/' . $setiapsaat->unduhan)) {
            Storage::delete('public/setiapsaat/' . $setiapsaat->unduhan);
        }

        $setiapsaat->delete();

        return redirect()->route('setiapsaat.index')->with('success', 'Data berhasil dihapus.');
    }
}
