@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
                <div class="card-header">Edit Pengajar</div>
                <div class="card-body">
                    <form action="{{ route('pengajar.update',$pengajar->id) }}" method="post">
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
                        <label for="">Guru</label>
                        <select name="guru_id" class="form-control mb-3">
                            @foreach ($guru as $s)
                                <option value="{{ $s->id }}" @selected($s->id == $pengajar->gurus->id)>{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ route('mapel.show', $pengajar->mapel_id) }}" class="btn btn-dark">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
                </div>
            </div>
</div>
@endsection
