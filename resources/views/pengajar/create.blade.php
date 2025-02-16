@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
                <div class="card-header">Tambah Pengajar</div>
                <div class="card-body">
                    <form action="{{ route('pengajar.store') }}" method="post">
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
                        <label for="">Guru</label>
                        <select name="guru_id" class="form-control mb-3">
                            <option disabled selected>Pilih Guru</option>
                            @foreach ($guru as $s)
                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <input type="hidden" name="mapel_id" value="{{ $mapel }}">
                    <a href="{{ route('mapel.show',$mapel) }}" class="btn btn-dark">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Input</button>
                </form>
                </div>
            </div>
</div>
@endsection
