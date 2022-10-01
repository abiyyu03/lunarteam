@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Tightening</h1>
        <a href="/tightening/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>

    <!-- Content Row -->
    <div class="mb-4">
        <div class="card">
            <div class="card-body shadow">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check"></i> 
                        {{$message}}
                    </div>
                @endif
                <div class="table-responsive">
                    <p>Total Keseluruhan Data : {{$tighteningData->total()}}</p>
                    <table class="table-bordered table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Equipment</th>
                            <th>Pekerjaan</th>
                            <th>Petugas</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($tighteningData as $t)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{Carbon\Carbon::parse($t->tanggal)->isoFormat('dddd, D MMM YYYY')}}</td>
                                    <td>{{$t->equipment}}</td>
                                    <td>{{$t->pekerjaan}}</td>
                                    <td>{{$t->petugas->nama_petugas}}</td>
                                    <td>
                                        <a href="/tightening/edit/{{$t->id}}" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a href="/tightening/delete/{{$t->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{$tighteningData->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection