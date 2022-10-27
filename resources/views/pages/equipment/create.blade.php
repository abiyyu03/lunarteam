@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Equipment</h1>
        <a href="/equipment" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    <!-- Content Row -->
    <div class="mb-4">
    <div class="card">
        <div class="card-body shadow">
            <form method="POST" action="{{route('equipment.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="equipment_code">Equipment Code</label>
                    <input type="text" name="equipment_code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="plant_area_id">Plant Area</label>
                    <select class="form-control selectData" name="plant_area_id">
                        <option>- Pilih Plant Area -</option>
                        @foreach ($plantAreaData as $p)
                        <option value="{{$p->id}}">{{$p->plant_area}}"</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="equipment_description">Deskripsi Equipment</label>
                    <textarea name="equipment_description" class="form-control" cols="10" rows="5"></textarea>
                    {{-- <input type="date" name="equipment_description" class="form-control" required> --}}
                </div>
                <div class="form-group">
                    <label for="sub_assets">Sub Asset</label>
                    <input type="text" name="sub_assets" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="frequency">Frekuensi</label>
                    {{-- <input type="text" name="frequency" class="form-control" required> --}}
                    <select class="form-control" name="frequency">
                        <option>- Frekuensi -</option>
                        <option value="Weekly">Weekly</option>
                        <option value="2 Week">2 Week</option>
                        <option value="Monthly">Month</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Kuantitas</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div> 
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary form-control">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.selectData').select2();
    });
</script>
@endpush

