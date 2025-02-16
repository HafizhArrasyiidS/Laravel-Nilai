<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'  =>  'required',
            'jenkel'    =>  'required',
            'alamat'    =>  'required',
            'no_hp' =>  'required|numeric'
        ]);
        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with(['succes', 'berhasil']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nama'  =>  'required',
            'jenkel'    =>  'required',
            'alamat'    =>  'required',
            'no_hp' =>  'required|numeric'
        ]);
        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with(['succes', 'berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with(['succes', 'berhasil']);
    }
}
