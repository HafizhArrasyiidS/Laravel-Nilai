@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
                <div class="card-header">Tambah Guru</div>
                <div class="card-body">
                    <form action="{{ route('guru.store') }}" method="post">
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
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control mb-3">
                    </div>
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="text" name="nip" class="form-control mb-3">
                    </div>
                    <a href="{{ route('guru.index') }}" class="btn btn-dark">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Input</button>
                </form>
                </div>
            </div>
</div>
@endsection
