@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pelumas</h1>
        <a href="/pelumas/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    {{-- <p>Total Keseluruhan Data : {{$pelumasData->total()}}</p> --}}
                    <table class="table-bordered table table-striped" id="table-1">
                        <thead>
                            <th>#</th>
                            <th>Nama Pelumas</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($pelumasData as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->nama_pelumas}}</td>
                                    <td>
                                        <a href="/pelumas/edit/{{$p->id}}"" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                        {{-- <a href="/pelumas/delete/{{$p->id}}" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="d-flex justify-content-end">
                    {{$pelumasData->links("pagination::bootstrap-4")}}
                </div> --}}
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