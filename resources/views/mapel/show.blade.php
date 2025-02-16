@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <a href="{{ route('mapel.index') }}" class="btn btn-black mb-3">Kembali</a>
    <div class="card">
        <div class="card-header">Data Pengajar</div>
        <div class="card-body">
                    <a href="{{ route('pengajar.create',$mapel) }}" class="btn btn-success mb-3"><i data-feather="plus"></i></a>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Guru</th>
                                <th>Nip</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengajar as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->gurus->nama }}</td>
                                    <td>{{ $s->gurus->nip }}</td>
                                    <td>
                                        <form action="{{ route('pengajar.destroy',$s->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('pengajar.edit',$s->id) }}" class="btn btn-icon btn-transparent-dark"><i data-feather="edit-2"></i></a>
                                            <button type="submit" class="btn btn-icon btn-transparent-dark"><i data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
</div>
@endsection
