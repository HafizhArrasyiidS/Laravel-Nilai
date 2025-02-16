@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
        <div class="card-header">Data Siswa</div>
        <div class="card-body">
                    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3"><i data-feather="plus"></i></a>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswas as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->jenkel }}</td>
                                    <td>{{ $s->alamat }}</td>
                                    <td>{{ $s->no_hp }}</td>
                                    <td>
                                        <form action="{{ route('siswa.destroy',$s->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('siswa.edit',$s->id) }}" class="btn btn-icon btn-transparent-dark"><i data-feather="edit-2"></i></a>
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
