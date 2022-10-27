@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
        <a href="/petugas/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    <table class="table-bordered table table-striped" id="table-1">
                        <thead>
                            <th>#</th>
                            <th>Nama Petugas</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($petugasData as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->nama_petugas}}</td>
                                    <td>
                                        <a href="/petugas/edit/{{$p->id}}" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a href="/petugas/delete/{{$p->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
</script>
@endpush