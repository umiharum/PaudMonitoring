@extends('layouts.app')

@section('contents')
<div class="container-xl">
    <div class="table-wrapper">
        <div class="table-tilte">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Laporan Bulanan</h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Murid</th>
                    <th>Kelompok Belajar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataM as $mrd)
                <tr>
                    <td>{{$mrd->nama_murid}}</td>
                    <td>{{$mrd->kelompok_belajar}}</td>
                    <td>
                        <a href="{{url('/teacher/buat-laporan-bulanan/'.$mrd->studentID)}}" class="btn btn-primary">Buat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection