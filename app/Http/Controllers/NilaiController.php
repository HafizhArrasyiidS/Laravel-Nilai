<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Pengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilais = Nilai::all();
        return view('nilai.index', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajar = Pengajar::all();
        $siswa = Siswa::all();
        return view('nilai.create', compact('pengajar', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'siswa_id'  =>  'required',
            'pengajar_id'   =>  'required',
            'nilai' =>  'required|numeric|min:0|max:100'
        ]);
        Nilai::create($request->all());
        return redirect()->route('nilai.index')->with(['succes', 'berhasil']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        $pengajar = Pengajar::all();
        $siswa = Siswa::all();
        return view('nilai.edit', compact('pengajar', 'siswa', 'nilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        $this->validate($request, [
            'siswa_id'  =>  'required',
            'pengajar_id'   =>  'required',
            'nilai' =>  'required|numeric|min:0|max:100'
        ]);
        $nilai->update($request->all());
        return redirect()->route('nilai.index')->with(['succes', 'berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index')->with(['succes', 'berhasil']);
    }
}
