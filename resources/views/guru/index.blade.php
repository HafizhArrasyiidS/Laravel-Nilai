@extends('layouts.app')

@section('content')
<div class="container-xl px-4 mt-10 justify-content-between col-md-8">
    <div class="card">
        <div class="card-header">Data Guru</div>
        <div class="card-body">
                    <a href="{{ route('guru.create') }}" class="btn btn-success mb-3"><i data-feather="plus"></i></a>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nip</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($gurus as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->nip }}</td>
                                    <td>
                                        <form action="{{ route('guru.destroy',$s->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('guru.edit',$s->id) }}" class="btn btn-icon btn-transparent-dark"><i data-feather="edit-2"></i></a>
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
