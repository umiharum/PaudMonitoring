@extends('layouts.app')

@section('contents')
<div class="container-xl">
    <div class="table-wrapper">
        <div class="table-tilte">
            <div class="row">
                <div class="col-sm-10">
                    <h2>Daftar Kelas</h2>
                </div>
                <div class="col-sm-auto">
                    <a href="{{url('/admin/tambah-kelas')}}" class="btn btn-success">Tambah Kelas Baru</a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Jumlah Murid</th>
                    <th>Jumlah Pengajar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $std)
                <tr>
                    <td>{{$std->nama_kelas}}</td>
                    <td>{{$std->jumlah_murid}}</td>
                    <td>{{$std->jumlah_pengajar}}</td>
                    <td>
                        <a href="{{url('/admin/kelas/'.$std->kelasID)}}" class="btn btn-success">Lihat Kelas</a>
                        @if(Auth::user()->is_admin == 1)
                        <a href="{{url('/admin/ubah-kelas/'.$std->kelasID)}}" class="btn btn-primary">Ubah</a>
                        <a href="{{url('/admin/hapus-kelas/'.$std->kelasID)}}" class="btn btn-danger" onclick="return confirm('Apakah ingin menghapus data?')">Hapus</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection