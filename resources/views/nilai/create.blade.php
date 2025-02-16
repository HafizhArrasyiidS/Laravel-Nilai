@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
                <div class="card-header">Tambah Nilai</div>
                <div class="card-body">
                    <form action="{{ route('nilai.store') }}" method="post">
                        @csrf
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
                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pengajar</label>
                        <select name="pengajar_id" class="form-control mb-3">
                            <option disabled selected>Pilih Pengajar</option>
                            @foreach ($pengajar as $s)
                                <option value="{{ $s->id }}">{{ $s->mapels->nama_mapel }} - {{ $s->gurus->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="number" name="nilai" class="form-control mb-3">
                    </div>
                    <a href="{{ route('nilai.index') }}" class="btn btn-dark">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Input</button>
                </form>
                </div>
            </div>
</div>
@endsection
