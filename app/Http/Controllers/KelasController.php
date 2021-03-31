<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kelas::all();
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
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->slug = Str::slug($request->nama_kelas);
        if ($kelas->save()) {
            return ["status"=>"Berhasil Menyimpan Data"];
        } else {
            return ["status"=>"Gagal Menyimpan Data"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Kelas::where('id',$id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Kelas::where('id',$id)->first();
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
        $kelas = Kelas::where('id',$id)->first();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->slug = Str::slug($request->nama_kelas);
        if ($kelas->save()) {
            return ["status"=>"Berhasil Mengupdate Data"];
        } else {
            return ["status"=>"Gagal Mengupdate Data"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::where('id',$id)->first();
        if ($kelas->delete()) {
            return ["status"=>"Berhasil Menghapus Data"];
        } else {
            return ["status"=>"Gagal Menghapus Data"];
        }
    }
}
