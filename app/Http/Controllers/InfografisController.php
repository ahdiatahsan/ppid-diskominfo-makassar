<?php

namespace App\Http\Controllers;

use App\Models\infografis;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class InfografisController extends Controller
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
        return view('admin.infografis.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $infografis = infografis::all();
            return DataTables::of($infografis)
                ->addColumn('action', function ($infografis) {
                    return view('admin.infografis.action', compact('infografis'))->render();
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function download(infografis $infografis)
    {
        $filepath = Storage::url('public/infografis/' . $infografis->gambar);
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        return response()->download(public_path($filepath), $infografis->judul . '.' . $extension);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infografis.create');
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
            'judul' => 'required|string',
            'gambar' => 'required|file|max:2048|mimes:jpeg,jpg,png,webp'
        ]);

        $file = $request->file('gambar');
        $fileName = $request->judul . '.' . $file->getClientOriginalExtension();

        infografis::create([
            'judul' => $request->input('judul'),
            'gambar' => $fileName
        ]);

        Storage::putFileAs('public/infografis', $file, $fileName);

        return redirect()->route('infografis.index')->with('success', 'Data berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function show(infografis $infografis)
    {
        return view('admin.infografis.show', compact('infografis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function edit(infografis $infografis)
    {
        return view('admin.infografis.edit', compact('infografis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, infografis $infografis)
    {
        $request->validate([
            'judul' => 'required|string'
        ]);

        if ($request->file('gambar') != null) {
            $request->validate([
                'gambar' => 'required|file|max:2048|mimes:jpeg,jpg,png,webp',
                'gambar_lama' => 'required|string'
            ]);

            if (Storage::exists('public/infografis/' . $request->gambar_lama)) {
                Storage::delete('public/infografis/' . $request->gambar_lama);
            }

            if (Storage::exists('public/infografis/' . $infografis->gambar)) {
                Storage::delete('public/infografis/' . $infografis->gambar);
            }

            $file = $request->file('gambar');
            $fileName = $request->judul . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/infografis', $file, $fileName);

            $infografis->gambar = $fileName;
        }

        $infografis->judul = $request['judul'];
        $infografis->save();

        return redirect()->route('infografis.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\infografis  $infografis
     * @return \Illuminate\Http\Response
     */
    public function destroy(infografis $infografis)
    {
        if (Storage::exists('public/infografis/' . $infografis->gambar)) {
            Storage::delete('public/infografis/' . $infografis->gambar);
        }

        $infografis->delete();

        return redirect()->route('infografis.index')->with('success', 'Data berhasil dihapus.');
    }
}
