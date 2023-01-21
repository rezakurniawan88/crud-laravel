<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::paginate(4);
        return view('karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            "nama" => "required|min:3",
            "jabatan" => "required|min:3",
            "email" => "required|min:12",
            "nohp" => "required|min:3|max:12"
        ]);

        $data = new Karyawan;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->save();

        return to_route("karyawan.index")->with("success", "Data berhasil ditambahkan");
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
        $data = Karyawan::findOrFail($id);
        return view("karyawan.edit", compact("data"));
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
        $request->validate([
            "nama" => "required|min:3",
            "jabatan" => "required|min:3",
            "email" => "required|min:12",
            "nohp" => "required|min:3|max:12"
        ]);

        $data = Karyawan::find($id);
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->save();

        return to_route("karyawan.index")->with("success", "Data berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Karyawan::find($id);
        $data->delete();

        return back()->with("success", "Data berhasil dihapus");
    }
}
