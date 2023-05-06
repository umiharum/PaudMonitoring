@extends('layouts.app')

@section('contents')
<div class="container-xl">
    <div class="table-wrapper">
        <div class="table-tilte">
            <div class="row">
                <div class="col-sm-10">
                    <h2>Daftar Guru</h2>
                </div>
                <div class="col-sm-auto">
                    <a href="{{url('/admin/tambah-guru')}}" class="btn btn-success">Tambah Data Guru</a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Guru</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Kelas Mengajar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataT as $tch)
                <tr>
                    <td>{{$tch->nama_guru}}</td>
                    <td>{{$tch->alamat_guru}}</td>
                    <td>{{$tch->email_guru}}</td>
                    <td>{{$tch->noTelp_guru}}</td>
                    <td>{{$tch->kelas}}</td>
                    <td>
                        <a href="{{url('/admin/ubah-guru/'.$tch->teacherID)}}" class="btn btn-primary">Ubah</a>
                        <a href="{{url('/admin/hapus-guru/'.$tch->teacherID)}}" class="btn btn-danger" onclick="return confirm('Apakah ingin menghapus data?')">Hapus</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection