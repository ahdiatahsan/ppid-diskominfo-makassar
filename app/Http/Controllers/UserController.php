<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        return view('admin.profil.index');
    }

    public function ubah(Request $request, $id)
    {
        $profil = User::find($id);
        $request->validate([
            'email' => "required|email|max:255|unique:users,email,$profil->id"
        ]);

        $profil->email = $request['email'];
        $profil->save();

        return redirect()->route('profil.index')->with('success', 'Informasi Admin telah diubah.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profil.password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profil = User::find($id);
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $old_password = $request['old_password'];
        $new_password = bcrypt($request['password']);

        $check_password = Hash::check($old_password, Auth::user()->password, []);

        if ($check_password) {
            $profil->password = $new_password;
            $profil->save();
        } else {
            return redirect()->route('profil.edit', $profil->id)
                ->with('not_match', 'Maaf password lama tidak sesuai dengan yang Anda masukkan, coba lagi.');
        }

        return redirect()->route('profil.edit', $profil->id)->with('success', 'Password Admin telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
