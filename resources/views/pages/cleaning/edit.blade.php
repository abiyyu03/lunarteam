@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Cleaning</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="mb-4">
    <div class="card">
        <div class="card-body shadow">
            <form method="POST" action="{{route('cleaning.update',$cleaningData->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{$cleaningData->tanggal}}" required>
                </div>
                <div class="form-group">
                    <label for="equipment">Equipment</label>
                    <input type="text" name="equipment" class="form-control" value="{{$cleaningData->equipment}}" required>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{$cleaningData->pekerjaan}}" required>
                </div>
                <div class="form-group">
                    <label for="petugas">Petugas</label>
                    <select name="petugas_id" id="" class="form-control selectData">
                        <option value="">-</option>
                        @foreach ($petugasData as $p)
                            <option value="{{$p->id}}" {{$cleaningData->petugas_id == $p->id ? 'selected' : ''}}>{{$p->nama_petugas}}</option>
                        @endforeach
                    </select>
                </div>
                <img src="/img/cleaning/{{$cleaningData->gambar_sebelum}}" width="240" alt="">
                <div class="form-group">
                    <label for="gambar_sebelum">Gambar Sebelum</label>
                    <input type="file" accept="image/*" name="gambar_sebelum" class="form-control">
                </div>
                <img src="/img/cleaning/{{$cleaningData->gambar_sesudah}}" width="240" alt="">
                <div class="form-group">
                    <label for="gambar_sesudah">Gambar Sesudah</label>
                    <input type="file" accept="image/*" name="gambar_sesudah" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary form-control">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</div>
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.selectData').select2();
    });
</script>
@endsection

