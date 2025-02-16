@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
                <div class="card-header">Edit Nilai</div>
                <div class="card-body">
                    <form action="{{ route('nilai.update',$nilai->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $s)
                                        <li>{{ $s }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <select name="siswa_id" class="form-control mb-3">
                            <option disabled selected>Pilih Siswa</option>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->id }}" @selected($s->id == $nilai->siswas->id)>{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pengajar</label>
                        <select name="pengajar_id" class="form-control mb-3">
                            <option disabled selected>Pilih Pengajar</option>
                            @foreach ($pengajar as $s)
                                <option value="{{ $s->id }}" @selected($s->id == $nilai->pengajars->id)>{{ $s->mapels->nama_mapel }} - {{ $s->gurus->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="number" name="nilai" class="form-control mb-3" value="{{ $nilai->nilai }}">
                    </div>
                    <a href="{{ route('nilai.index') }}" class="btn btn-dark">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
                </div>
            </div>
</div>
@endsection
