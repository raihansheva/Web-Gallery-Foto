<?php

namespace App\Http\Controllers;

use App\Models\mLike;
use App\Models\mKomen;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostKomenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    {
        // komentar
        $komen = new mKomen;
        $komen->FotoID = $request->FotoID;
        $komen->UserID = $request->UserID;
        $komen->IsiKomentar = $request->komentar;
        $komen->TanggalKomentar = Carbon::now()->format('Y-m-d');
        $komen->save();

        return redirect()->back();

        // dd($data);
    }

    public function like(Request $request)
    {
        // like foto
        $idfoto = $request->FotoID;
        $likefoto = mLike::where('FotoID', '=', $idfoto)->where('UserID', '=', Auth::user()->id)->first();
        // dd($likefoto);
        if ($likefoto == null) {
            $like = new mLike;
            $like->FotoID = $request->FotoID;
            $like->UserID = $request->UserID;
            $like->TanggalLike = Carbon::now()->format('Y-m-d');
            $like->save();
        } else {
            $hapus = mLike::where('FotoID','=', $idfoto)->where('UserID','=',Auth::user()->id);
            $hapus->delete();
        }
        return redirect()->back();

        // dd($data);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komen = mKomen::findOrFail($id);
        $komen->delete();
        // dd($komen);
        return redirect()->back();
    }
}
