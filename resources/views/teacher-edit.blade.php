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
				<form method="post" action="{{url('/admin/update-teacher')}}">
					@csrf
					<input type="hidden" name="teacherID" value="{{$dataT->teaherID}}">
					<div class="modal-body">
						<h2>Ubah Data Guru</h2>
						<div class="form-group">
							<label>Nama Guru</label>
							<input type="text" class="form-control" name="nama_guru" value="{{$dataT->nama_guru}}" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" class="form-control" name="alamat_guru" value="{{$dataT->alamat_guru}}" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email_guru" value="{{$dataT->email_guru}}" required>
						</div>
						<div class="form-group">
							<label>No. Telepon</label>
							<input type="tel" class="form-control" name="noTelp_guru" value="{{$dataT->noTelp_guru}}" required>
						</div>
						<div class="form-group">
							<label>Kelas Mengajar</label>
							<input type="text" class="form-control" name="kelas" value="{{$dataT->kelas}}" required>
						</div>
					</div><br>
					<div class="modal-footer">
						<a href="{{url('/admin/daftar-guru')}}" type="button" class="btn" data-dismiss="modal" value="Cancel">Kembali</a>
						<button type="submit" class="btn btn-info" onclick="return confirm('Apakah data yang diubah sudah benar?')">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection