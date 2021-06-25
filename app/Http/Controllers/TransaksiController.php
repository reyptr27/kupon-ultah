<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kupon;
use App\Models\HargaKupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
        $request->validate([
           'kupon' => ['required', 'size:10', 'unique:transaksi,kode_kupon', 'exists:kupon,kode_kupon'],
           'nama' => 'required|alpha|max:50',
           'hp' => 'required|numeric|digits_between:10,15',
        ], [
            'kupon.required' => 'Harus diisi!',
            'kupon.size' => 'Harus 10 digit!',
            'kupon.unique' => 'Telah terpakai!',
            'kupon.exists' => 'Anda salah!',
            'nama.required' => 'Harus diisi!',
            'nama.alpha' => 'Hanya alphabet!',
            'nama.max' => 'Max 50 digit!',
            'hp.required' => 'Harus diisi!',
            'hp.numeric' => 'Hanya angka!',
            'hp.digits_between' => 'Min 10 & max 15 digit!',
        ]);

        /*
        mengambil nilai harga kupon 
        menggunakan query builder 
        (menggunakan "value()" karena return auto int)
        */
        $hargakupon = DB::table('harga_kupon')->value('harga');
        //dd($hargakupon);

        //mencari kode_kupon di tabel kupon 
        $kupon = Kupon::where('kode_kupon', '=', $request->kupon)->first();
        //dd($kupon);
        
        //mengubah validasi
        $kupon->validasi = 1;
        //update data
        $kupon->save();
      
        //menghitung harga total
        $hargatotal = $kupon->jumlah * $hargakupon;
        //dd($hargatotal);

        //membuat data transaksi
        $transaksi = Transaksi::create([
            'kode_kupon' => $kupon->kode_kupon,
            'nama' => $request->nama,
            'hp' => $request->hp,
            'jumlah' => $kupon->jumlah,
            'total' => $hargatotal,
            'validasi' => $kupon->validasi
        ]);
        
        //dd($transaksi);
        return redirect()->route('success.transaksi', Crypt::encryptString($kupon->id));
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
    public function edit($id)
    {
        //
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
        //
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

    public function success($id) 
    {
        //enkripsi url
        $decryptid = Crypt::decryptString($id);
        //dd($id);
        $kupon = Kupon::findOrFail($decryptid);
        //dd($kupon);
        return view('berhasil')->with('kupon', $kupon);
    }
}
