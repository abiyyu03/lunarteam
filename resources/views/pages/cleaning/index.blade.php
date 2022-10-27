@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Cleaning</h1>
        <a href="/cleaning/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                            <th>Tanggal</th>
                            <th>Equipment</th>
                            <th>Pekerjaan</th>
                            <th>Petugas</th>
                            <th>Gambar Sebelum</th>
                            <th>Gambar Sesudah</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($cleaningData as $c)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{Carbon\Carbon::parse($c->tanggal)->isoFormat('dddd, D MMM YYYY')}}</td>
                                    <td>{{$c->equipment}}</td>
                                    <td>{{$c->pekerjaan}}</td>
                                    <td>{{$c->petugas->nama_petugas}}</td>
                                    <td><img src="/img/cleaning/{{$c->gambar_sebelum}}" width="240" height="180" alt=""></td>
                                    <td><img src="/img/cleaning/{{$c->gambar_sesudah}}" width="240" height="180" alt=""></td>
                                    <td>
                                        <a href="/cleaning/edit/{{$c->id}}" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a href="/cleaning/delete/{{$c->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</a>
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