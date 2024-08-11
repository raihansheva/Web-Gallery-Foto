<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mPoto;
use App\Models\mKomen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // tampil ke beranda
        $data['foto']= mPoto::with('user','komentar','like')->inRandomOrder()->get();
        // $data['komen']= mKomen::with('foto')->get();
        $data['user']= User::all()->where('id', '!=', Auth::user()->id);
        $foto = mPoto::all();
        $jumlahKomentar = [];
        foreach($foto as $fotoitem){
            $jumlahKomentar[$fotoitem->FotoID] = $fotoitem->komentar->count();
        }
        
        return view('home',$data, compact('foto','jumlahKomentar'));
        // dd($data);
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
        //
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
        //
    }

    public function authenticate(Request $request){
            // login 
            $credential = $request->validate([
                'name' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($credential)) {
                $request->session()->regenerate();
                return redirect('/home')->with('success', 'Anda berhasil Login');;
                // dd(Auth::user());
            }

            return back()->with('error','Username atau Password');

    }

    public function regis(Request $request){
        // registrasi
        $request->validate([
            'name' => 'required|unique:users,name',
            'password' => 'required',
            'Email' => 'required|email|unique:users,Email',
            'NamaLengkap' => 'required',
            'Alamat' => 'required',
    ]);
        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'Email' => $request->Email,
            'NamaLengkap' => $request->NamaLengkap,
            'Alamat' => $request->Alamat,
            'profile'=> '',
        ]);
        return redirect()->route('login');
    }

    public function masuk(Request $request){
        
        return view('form-login');
    }

    public function logout(Request $request){
        // logout
        Auth::logout();
        return redirect('/');
    }
    public function cari(Request $request)
    {
        // cari gambar
        $cari = $request->cari;
        $data['foto'] = mPoto::with('user','komentar')->where('JudulFoto', "like", "%" . $cari . "%")->paginate();
        $data['user']= User::all()->where('id', '!=', Auth::user()->id);
        $foto = mPoto::all();
        $jumlahKomentar = [];
        foreach($foto as $fotoitem){
            $jumlahKomentar[$fotoitem->FotoID] = $fotoitem->komentar->count();
        }
        
        return view('home', $data, compact('foto','jumlahKomentar'));
    }

    public function cariuser(Request $request)
    {
        // cari gambar
        $cari = $request->cariuser;
        $data['foto'] = mPoto::with('user','komentar')->paginate();
        $data['user']= DB::select('SELECT * FROM users WHERE NamaLengkap LIKE ?', [$cari]);
        // $data['user'] = DB::table('users')->where('name', "like", "%" . $cari . "%")->paginate();
        $foto = mPoto::all();
        // dd($data);
        $jumlahKomentar = [];
        foreach($foto as $fotoitem){
            $jumlahKomentar[$fotoitem->FotoID] = $fotoitem->komentar->count();
        }
        
        return view('home', $data, compact('foto','jumlahKomentar'));
    }
}
