<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\mPoto;
use App\Models\mAlbum;
use App\Models\mkeranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['poto'] = mkeranjang::all();
        return view('master.album');
    }
    
    public function album()
    {
        $data['album'] = mAlbum::all()->where('UserID' , Auth::user()->id);
        return view('master.album2',$data);
        // dd($data);
    }

    public function poto(Request $request, $id)
    {
        $albumid['albumid'] = $id;
        // $data['album'] = mAlbum::all()->where('AlbumID' , $id);
        $data['krnjng'] = mkeranjang::all()->where('UserID',Auth::user()->id);

        return view('master.poto',$data, $albumid);
        // dd($data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // posting foto dari keranjang ke tabel foto
        $tgl = Carbon::now()->format('Y-m-d');
        $albm = $request->AlbumID;
        $user = $request->UserID;

        DB::select('call post(?,?,?)', [$tgl,$albm,$user]);
        return redirect('/tambahalbum2');
    }

    public function hapus($id)
    {
        // hapus album
        mAlbum::find($id)->delete();
        return redirect()->back();
        // dd($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaAlbum' => 'required|unique:album,NamaAlbum',
            'Deskripsi' => 'required',
    ]);
        // bikin album
        $album = new mAlbum;
        $album->NamaAlbum = $request->NamaAlbum;
        $album->Deskripsi = $request->Deskripsi;
        $album->TanggalDibuat = Carbon::now()->format('Y-m-d');
        $album->UserID = $request->UserID;
        $album->save();

        return redirect('/tambahalbum2')->with('success', 'Album berhasil dibuat, Upload minimal 1 foto ke dalam album');;

        // dd($request->all());

    }

    public function storepoto(Request $request)
    {
        $request->validate([
            'Judul' => 'required',
            'keterangan' => 'required',
    ]);
        // posting foto ke keranjang
        $poto ='default.jpg';
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('upload/', $request->file('foto')->getClientOriginalName());
            $poto = $request->file('foto')->getClientOriginalName();
        }

        $album = new mkeranjang;
        $album->UserID = Auth::user()->id;
        $album->AlbumID= $request->AlbumID;
        $album->judul = $request->Judul;
        $album->foto = $poto;
        $album->keterangan = $request->keterangan;
        $album->save();

        return redirect()->back();

        // dd($request->all());

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
    public function edit(Request $request , $id)
    {
        // edit album
        $album = mAlbum::findorFail($id);
        $album->update([
            'NamaAlbum' => $request->NamaAlbum,
            'Deskripsi' => $request->Deskripsi,
            'TanggalUnggah' => $request->TanggalUnggah,
            'UserID' => $request->UserID,
        ]);

        return redirect()->back()->with('success', 'Album berhasil dibuat, Upload minimal 1 foto dahulu');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // edit foto
        $poto = mPoto::findorFail($id);
        $poto->update([
            'JudulFoto' => $request->JudulFoto,
            'DeskripsiFoto' => $request->DeskripsiFoto,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus data yang ada di keranjang
        $result = mkeranjang::find($id)->delete();
        if (!$result) {
            return redirect()->back()->with('warning', 'gaga terhapus');
        }

        return redirect()->back()->with('success', 'foto terhapus');
    }
}
