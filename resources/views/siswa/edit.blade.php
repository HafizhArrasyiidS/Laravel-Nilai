@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
                <div class="card-header">Edit Siswa</div>
                <div class="card-body">
                    <form action="{{ route('siswa.update',$siswa->id) }}" method="post">
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
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control mb-3" value="{{ $siswa->nama }}">
                    </div>
                    <div class="form-group">
                    <label for="">Jenkel</label>
                        <select name="jenkel" class="form-control mb-3">
                            <option value="L" @selected(old('jenkel', $siswa->jenkel) == 'L')>Laki-laki</option>
                            <option value="P" @selected(old('jenkel', $siswa->jenkel) == 'P')>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control mb-3" value="{{ $siswa->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" name="no_hp" class="form-control mb-3" value="{{ $siswa->no_hp }}">
                    </div>
                    <a href="{{ route('siswa.index') }}" class="btn btn-dark">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
                </div>
            </div>
</div>
@endsection
