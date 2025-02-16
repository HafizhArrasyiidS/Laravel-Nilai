@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
        <div class="card-header">Data Guru</div>
        <div class="card-body">
                    <a href="{{ route('mapel.create') }}" class="btn btn-success mb-3"><i data-feather="plus"></i></a>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mapel</th>
                                <th>Kode Mapel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mapels as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->nama_mapel }}</td>
                                    <td>{{ $s->kode_mapel }}</td>
                                    <td>
                                        <form action="{{ route('mapel.destroy',$s->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('mapel.edit',$s->id) }}" class="btn btn-icon btn-transparent-dark"><i data-feather="edit-2"></i></a>
                                            <a href="{{ route('mapel.show',$s->id) }}" class="btn btn-icon btn-transparent-dark"><i data-feather="eye"></i></a>
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
