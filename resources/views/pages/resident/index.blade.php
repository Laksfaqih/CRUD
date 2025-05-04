@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
    <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

{{-- tabel --}}
<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Status Perkawinan</th>
                            <th>Pekerjaan</th>
                            <th>Telepon</th>
                            <th>Status Penduduk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($residents) < 1)
                            <tr>
                                <td colspan="11" class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                        @else
                            @foreach($residents as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->birth_place }}, {{ $item->birth_date }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->religion }}</td>
                                <td>{{ $item->marital_status }}</td>
                                <td>{{ $item->occupation }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('edit.resident', $item->id) }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('delete.resident', $item->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-eraser"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
