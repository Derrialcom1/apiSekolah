<?php

namespace App\Http\Controllers;

use App\Models\Murid; 
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Murid::all();
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
        $murid = new Murid;
        $murid->nisn = $request->nisn;
        $murid->name_murid = $request->name_murid;
        $murid->email_murid = $request->email_murid;
        $murid->number_phone_murid = $request->number_phone_murid;
        $murid->address = $request->address;
        $murid->gender = $request->gender;
        $murid->kelas_id = $request->kelas_id;
        if ($murid->save()) {
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
        return Murid::where('nisn', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Murid::where('nisn',$id)->first();
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
        $murid = Murid::where('nisn',$id)->first();
        $murid->name_murid = $request->name_murid;
        $murid->email_murid = $request->email_murid;
        $murid->number_phone_murid = $request->number_phone_murid;
        $murid->address = $request->address;
        $murid->gender = $request->gender;
        $murid->kelas_id = $request->kelas_id;
        if ($murid->save()) {
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
        $murid = Murid::where('nisn',$id)->first();
        if ($murid->delete()) {
            return ["status"=>"Berhasil Menghapus Data"];
        } else {
            return ["status"=>"Gagal Menghapus Data"];
        }
    }
}
