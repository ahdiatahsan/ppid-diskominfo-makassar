<?php

namespace App\Http\Controllers;

use App\Models\sertamerta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SertamertaController extends Controller
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
        return view('admin.sertamerta.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $sertamerta = sertamerta::all();
            return DataTables::of($sertamerta)
                ->addColumn('action', function ($sertamerta) {
                    return view('admin.sertamerta.action', compact('sertamerta'))->render();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sertamerta.create');
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
            'sumber' => 'required|string',
            'telp' => 'required|string',
            'kategori' => 'required|string',
            'link' => 'string|nullable'
        ]);

        if ($request->file('unduhan') != null) {
            $request->validate([
                'unduhan' => 'file|max:2048|mimes:pdf,docx,doc,xlsx,xls'
            ]);

            $file = $request->file('unduhan');
            $fileName = $request->ringkasan . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/sertamerta', $file, $fileName);

            sertamerta::create([
                'ringkasan' => $request->input('ringkasan'),
                'sumber' => $request->input('sumber'),
                'telp' => $request->input('telp'),
                'kategori' => $request->input('kategori'),
                'link' => $request->input('link'),
                'unduhan' => $fileName
            ]);
        } else {
            sertamerta::create([
                'ringkasan' => $request->input('ringkasan'),
                'sumber' => $request->input('sumber'),
                'telp' => $request->input('telp'),
                'kategori' => $request->input('kategori'),
                'link' => $request->input('link')
            ]);
        }

        return redirect()->route('sertamerta.index')->with('success', 'Data berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sertamerta  $sertamerta
     * @return \Illuminate\Http\Response
     */
    public function show(sertamerta $sertamerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sertamerta  $sertamerta
     * @return \Illuminate\Http\Response
     */
    public function edit(sertamerta $sertamerta)
    {
        return view('admin.sertamerta.edit', compact('sertamerta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sertamerta  $sertamerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sertamerta $sertamerta)
    {
        $request->validate([
            'ringkasan' => 'required|string',
            'sumber' => 'required|string',
            'telp' => 'required|string',
            'kategori' => 'required|string',
            'link' => 'string'
        ]);

        if ($request->file('unduhan') != null) {
            $request->validate([
                'unduhan' => 'required|file|max:2048|mimes:pdf,docx,doc,xlsx,xls',
                'unduhan_lama' => 'string|nullable'
            ]);

            if (Storage::exists('public/sertamerta/' . $request->unduhan_lama)) {
                Storage::delete('public/sertamerta/' . $request->unduhan_lama);
            }

            if (Storage::exists('public/sertamerta/' . $sertamerta->unduhan)) {
                Storage::delete('public/sertamerta/' . $sertamerta->unduhan);
            }

            $file = $request->file('unduhan');
            $fileName = $request->ringkasan . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/sertamerta', $file, $fileName);

            $sertamerta->unduhan = $fileName;
        }

        $sertamerta->ringkasan = $request['ringkasan'];
        $sertamerta->sumber = $request['sumber'];
        $sertamerta->telp = $request['telp'];
        $sertamerta->kategori = $request['kategori'];
        $sertamerta->link = $request['link'];
        $sertamerta->save();

        return redirect()->route('sertamerta.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sertamerta  $sertamerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(sertamerta $sertamerta)
    {
        if (Storage::exists('public/sertamerta/' . $sertamerta->unduhan)) {
            Storage::delete('public/sertamerta/' . $sertamerta->unduhan);
        }

        $sertamerta->delete();

        return redirect()->route('sertamerta.index')->with('success', 'Data berhasil dihapus.');
    }
}
