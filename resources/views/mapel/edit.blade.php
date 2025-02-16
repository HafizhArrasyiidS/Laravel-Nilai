@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
                <div class="card-header">Edit Mapel</div>
                <div class="card-body">
                    <form action="{{ route('mapel.update',$mapel->id) }}" method="post">
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
                        <label for="">Nama Mapel</label>
                        <input type="text" name="nama_mapel" class="form-control mb-3" value="{{ $mapel->nama_mapel }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kode Mapel</label>
                        <input type="text" name="kode_mapel" class="form-control mb-3" value="{{ $mapel->kode_mapel }}">
                    </div>
                    <a href="{{ route('mapel.index') }}" class="btn btn-dark">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
                </div>
            </div>
</div>
@endsection
