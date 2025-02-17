<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($mapel)
    {
        $guru = Guru::all();
        return view('pengajar.create', compact('guru', 'mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'mapel_id'  =>  'required',
            'guru_id'   =>  ['required', Rule::unique('pengajars', 'guru_id')->where('mapel_id', $request->mapel_id)]
        ]);
        Pengajar::create($request->all());
        return redirect()->route('mapel.show',$request->mapel_id)->with(['succes', 'berhasil']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajar $pengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajar $pengajar)
    {
        $guru = Guru::all();
        return view('pengajar.edit', compact('guru', 'pengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajar $pengajar)
    {
        $this->validate($request, [
            'guru_id' =>  'required'
        ]);
        $exists = Pengajar::where('mapel_id', $pengajar->mapel_id)->where('guru_id', $request->guru_id)->where('id','!=', $pengajar->id)->exists();
        if($exists) {
            return redirect()->back()->withErrors(['guru_id' => 'Guru Sudah Ada']);
        } 
        $pengajar->update([
            'guru_id'   =>  $request->guru_id
        ]);
        return redirect()->route('mapel.show', $pengajar->mapel_id)->with(['success', 'berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajar $pengajar)
    {
        $pengajar->delete();
        return redirect()->route('mapel.show',$pengajar->mapel_id)->with(['succes', 'berhasil']);
    }
}
