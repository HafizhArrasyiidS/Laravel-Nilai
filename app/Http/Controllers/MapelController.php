<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapels = Mapel::all();
        return view('mapel.index', compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_mapel'    =>  'required',
            'kode_mapel'    =>  'required',
        ]);
        Mapel::create($request->all());
        return redirect()->route('mapel.index')->with(['succes', 'berhasil']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        $pengajar = $mapel->pengajars()->latest()->paginate(5);
        return view('mapel.show', compact('pengajar', 'mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $this->validate($request, [
            'nama_mapel'    =>  'required',
            'kode_mapel'    =>  'required|unique:mapels,kode_mapel',
        ]);
        $mapel->update($request->all());
        return redirect()->route('mapel.index')->with(['succes', 'berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapel.index')->with(['succes', 'berhasil']);
    }
}
