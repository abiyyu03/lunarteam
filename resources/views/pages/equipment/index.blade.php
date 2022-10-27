@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Equipment</h1>
        <a href="/equipment/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    {{-- <p>Total Keseluruhan Data : {{$cleaningData->total()}}</p> --}}
                    {{-- <table class="table table-striped" id="table-1">
                        <thead class="bg-primary text-light"> --}}
                    <table class="table-bordered table table-striped" id="table-1">
                        <thead>
                            <th>#</th>
                            <th>Plant Area</th>
                            <th>Kode Equipment</th>
                            {{-- <th>ID Equipment</th> --}}
                            <th>Deskripsi Equipment</th>
                            <th>Sub - Asset</th>
                            <th>Frekuensi</th>
                            <th>Kuantitas</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($equipmentData as $e)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$e->plant_area->plant_area}}</td>
                                    <td>{{$e->equipment_code}}</td>
                                    <td>{{$e->equipment_description}}</td>
                                    <td>{{$e->sub_assets}}</td>
                                    <td>{{$e->frequency}}</td>
                                    <td>{{$e->quantity}}</td>
                                    <td>
                                        <a href="/equipment/edit/{{$e->id}}" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i></a>
                                        <a href="/equipment/delete/{{$e->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="d-flex justify-content-end">
                    {{$equipmentData->links("pagination::bootstrap-4")}}
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