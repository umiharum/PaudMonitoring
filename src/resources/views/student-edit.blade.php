@extends('layouts.app')

@section('contents')
<div class="container">
	<div id="editStudent">
		<div class="modal-dialog">
			<div class="modal-content">
				@if(Session::has('success'))
				<div class="alert alert-success" role="alert">
					{{Session::get('success')}}
				</div>
				@endif
				<form method="post" action="{{url('/admin/update-student')}}">
					@csrf
					<input type="hidden" name="studentID" value="{{$dataM->studentID}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Murid</label>
							<input type="text" class="form-control" name="nama_murid" value="{{$dataM->nama_murid}}" required>
						</div>
						<div class="form-group">
							<label>Kelompok Belajar</label>
							<input type="text" class="form-control" name="kelompok_belajar" value="{{$dataM->kelompok_belajar}}" required>
						</div>
						<div class="form-group">
							<label>Tempat Lahir</label>
							<input type="text" class="form-control" name="tempat_lahir" value="{{$dataM->tempat_lahir}}" required>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="date" class="form-control" name="tanggal_lahir" value="{{$dataM->tanggal_lahir}}" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" class="form-control" name="alamat" value="{{$dataM->alamat}}" required>
						</div>
						<div class="form-group">
							<label>Nama Orang Tua</label>
							<input type="text" class="form-control" name="nama_orangtua" value="{{$dataM->nama_orangtua}}" required>
						</div>
						<div class="form-group">
							<label>Kebutuhan Khusus</label>
							<input type="text" class="form-control" name="kebutuhan_khusus" value="{{$dataM->kebutuhan_khusus}}" required>
						</div>
					</div><br>
					<div class="modal-footer">
						<a href="{{url('/admin/daftar-murid')}}" type="button" class="btn" data-dismiss="modal" value="Cancel">Kembali</a>
						<button type="submit" class="btn btn-info" onclick="return confirm('Apakah data yang dimasukkan sudah benar?')">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection