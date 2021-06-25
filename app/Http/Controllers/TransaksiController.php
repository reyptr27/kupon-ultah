<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kupon;
use App\Models\HargaKupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        dd($message);
        //dd($transaksi);
        return redirect()->route('success.transaksi', [$kupon]);
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
        //dd($id);
        $kupon = Kupon::where('id', $id)->first();
        //dd($kupon);
        return view('berhasil')->with('kupon', $kupon);
    }
}
