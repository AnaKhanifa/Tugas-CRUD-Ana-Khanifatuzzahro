<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHp;
use App\Http\Requests\UpdateHp;
use App\Models\HP;
use Illuminate\Http\Request;

class HpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datahp = HP::all();
        return view('index')->with([
            'datahp'=>$datahp
        ]);
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
    public function store(StoreHp $request)
    {
        $validate = $request->validated();
        $hp = new HP();
        $hp->nama = $request->txtnama;
        $hp->brand = $request->txtbrand;
        $hp->tahun = $request->txttahun;
        $hp->harga = $request->txtharga;
        $hp->save();

        return redirect('/')->with('msg','Input Hp Berhasil');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = HP::find($id);
        return view('edit')->with([
            'txtid'=>$data->id,
            'txtnama'=>$data->nama,
            'txtbrand'=>$data->brand,
            'txttahun'=>$data->tahun,
            'txtharga'=>$data->harga
        ]);
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
    public function update(UpdateHp $request, $id)
    {
        $data = HP::find($id);
        $data->nama = $request->txtnama;
        $data->brand = $request->txtbrand;
        $data->tahun = $request->txttahun;
        $data->harga = $request->txtharga;
        $data->save();

        return redirect('/')->with('msg','Update Hp "'.$data->nama.'" Berhasil');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = HP::find($id);
        $data ->delete();

        return redirect('/')->with('msg','"'.$data->nama.'" Berhasil Dihapus');
    
    }
}
