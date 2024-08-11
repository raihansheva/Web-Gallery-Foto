<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mPoto;
use App\Models\mAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    
    {
        
        $album = DB::select('call album(?)', [Auth::user()->id]);
        // dd($album);
        return view('master.profile', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {   $request->validate([
        'name' => 'required',
        'Email' => 'required',
        'NamaLengkap' => 'required',
        'Alamat' => 'required',
        ]);
        // update profile
        $poto ='default.jpg';
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('upload/', $request->file('foto')->getClientOriginalName());
            $poto = $request->file('foto')->getClientOriginalName();
        }
        $user = User::findorFail(Auth::user()->id);
        $user->update([
            'name' => $request->name,
            'Email' => $request->Email,
            'NamaLengkap' => $request->NamaLengkap,
            'Alamat' => $request->Alamat,
            'profile' => $poto,
        ]);

        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function editpw(Request $request)
    {
        // ubah password
        $user = User::findorFail(Auth::user()->id);
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus foto
        $result = mPoto::find($id)->delete();
        if (!$result) {
            return redirect()->back()->with('warning', 'gagal terhapus');
        }

        return redirect()->back()->with('warning', 'berhasil terhapus');
    }

    public function liatuser(string $id)
    {
        // tampil user lain dan album
        $album = DB::select('call album(?)', [$id]);
        $user= User::all()->where('id', $id )->first();
        // dd($album);
        return view('profileuser', compact('album','user'));
    }

    public function liatfotoalbum(string $id)
    {
        // tampil pto album user lain
        $data['foto']= mPoto::with('user','komentar')->where('AlbumID', $id)->inRandomOrder()->get();
        // $data['komen']= mKomen::with('foto')->get();
        $data['album']= mAlbum::all()->where('AlbumID','=',$id);
        $data['user']= User::all()->where('id', '!=', Auth::user()->id);
        return view('potoalbum',$data);
    }

    public function liatreport()
    {
        $data['report']= DB::table('report')->where('UserID','=' ,Auth::user()->id)->get();
        // dd($data);
        $data['jumfoto'] = mPoto::all()->where('UserID','=',Auth::user()->id)->count();
        $data['jumalbum'] = mAlbum::all()->where('UserID','=',Auth::user()->id)->count();
        return view('report',$data);
    }
}
