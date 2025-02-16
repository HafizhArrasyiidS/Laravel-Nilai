@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
        <div class="card-header">Data Nilai</div>
        <div class="card-body">
                    <a href="{{ route('nilai.create') }}" class="btn btn-success mb-3"><i data-feather="plus"></i></a>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Mapel</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nilais as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->siswas->nama }}</td>
                                    <td>{{ $s->pengajars->mapels->nama_mapel }} - {{ $s->pengajars->gurus->nama }}</td>
                                    <td>{{ $s->nilai }}</td>
                                    <td>
                                        <form action="{{ route('nilai.destroy',$s->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('nilai.edit',$s->id) }}" class="btn btn-icon btn-transparent-dark"><i data-feather="edit-2"></i></a>
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
