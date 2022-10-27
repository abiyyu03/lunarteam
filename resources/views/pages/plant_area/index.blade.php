@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plant Area</h1>
        <a href="/plant_area/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    {{-- <p>Total Keseluruhan Data : {{$plantAreaData->total()}}</p> --}}
                    <table class="table-bordered table table-striped" id="table-1">
                        <thead>
                            <th>#</th>
                            <th>Plant Area</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($plantAreaData as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->plant_area}}</td>
                                    <td>
                                        <a href="/plant_area/edit/{{$p->id}}" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a href="/plant_area/delete/{{$p->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="d-flex justify-content-end">
                    {{$plantAreaData->links("pagination::bootstrap-4")}}
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