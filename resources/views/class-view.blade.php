@extends('layouts.app')

@section('contents')
<div class="container-xl">
    <div class="table-wrapper">
        <div class="table-tilte">
            <div class="row">
                <div class="col-sm-10">
                    @foreach($class as $name)
                    <h3>Daftar Murid dan Guru {{$name->nama_kelas}}</h3>
                    @endforeach
                </div>
                <div class="button">
                    <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#popupguru">Tambah Guru</a>
                    <span style="float: right;">
                        <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#popupmurid">Tambah Murid</a>
                    </span>
                </div><br><br>
                <table class="table table-striped-columns">
                    <thead>
                        <tr>
                            <th>Guru</th>
                            <th>Murid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($murid as $nmurid)
                        @foreach($guru as $nguru)
                        <tr>
                            <td>{{$nguru->nama_guru}}</td>
                            <td>{{$nmurid->nama_murid}}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div id="popupmurid" class="modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                            <form method="post" action="{{url('/admin/save-addMurid')}}">
                            @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addMurid">Tambahkan murid</h1>
                                </div>
                                @foreach($class as $name)
                                    <div class="form-group">
                                        <div class="modal-body">
                                            <label for="kelas_id">Kode Kelas</label>
                                            <input type="text" class="form-control" name="kelas_id" disabled value="{{$name->kelasID}}" />
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <div class="modal-body">
                                        <label for="murid">Nama Murid</label>
                                        <select class="form-control" name="murid" required>
                                            <option>- Pilih murid -</option>
                                            @foreach($cname as $murid)
                                            <option value="{{$murid->kelasID}}">{{$murid->nama_murid}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang dimasukkan sudah benar?')">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="popupguru" class="modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                            <form method="post" action="{{url('/admin/save-addGuru')}}">
                            @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addGuru">Tambahkan guru</h1>
                                </div>
                                @foreach($class as $name)
                                    <div class="form-group">
                                        <div class="modal-body">
                                            <label for="kelas_id">Kode Kelas</label>
                                            <input type="text" class="form-control" name="kelas_id" disabled value="{{$name->kelasID}}" />
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <div class="modal-body">
                                        <label for="guru">Nama Guru</label>
                                        <select class="form-control" name="guru" required>
                                            <option>- Pilih guru -</option>
                                            @foreach($teacher as $nt)
                                            <option value="{{$nt->teacherID}}">{{$nt->nama_guru}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang dimasukkan sudah benar?')">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection