@extends('layouts.app')

@section('contents')
<div class="container-xl">
    <div class="table-wrapper">
        <div class="table-tilte">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Daftar Murid</h2>
                </div>
                <div class="col-sm-auto">
                    <a href="{{url('/admin/tambah-murid')}}" class="btn btn-success">Tambah Data Murid</a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Murid</th>
                    <th>Kelompok Belajar</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nama Orang Tua</th>
                    <th>Kebutuhan Khusus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataM as $mrd)
                <tr>
                    <td>{{$mrd->nama_murid}}</td>
                    <td>{{$mrd->kelompok_belajar}}</td>
                    <td>{{$mrd->tempat_lahir.', '.$mrd->tanggal_lahir}}</td>
                    <td>{{$mrd->alamat}}</td>
                    <td>{{$mrd->nama_orangtua}}</td>
                    <td>{{$mrd->kebutuhan_khusus}}</td>
                    <td>
                        <a href="{{url('/admin/ubah-murid/'.$mrd->studentID)}}" class="btn btn-primary">Ubah</a>
                        <a href="{{url('/admin/hapus-murid/'.$mrd->studentID)}}" class="btn btn-danger" onclick="return confirm('Apakah ingin menghapus data?')">Hapus</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection