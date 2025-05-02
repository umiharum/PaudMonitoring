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
				<form method="post" action="{{url('/admin/save-teacher')}}">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Tambah Data Guru</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Guru</label>
							<input type="text" class="form-control" name="nama_guru" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" class="form-control" name="alamat_guru" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email_guru" required>
						</div>
						<div class="form-group">
							<label>No. Telepon</label>
							<input type="tel" class="form-control" name="noTelp_guru" required>
						</div>
						<div class="form-group">
							<label>Kelas Mengajar</label>
							<select name="kelas" class="form-control" required>
								<option>- Pilih Kelas -</option>
								@foreach($dataK as $kelas)
								<option value="{{$kelas->nama_kelas}}">{{$kelas->nama_kelas}}</option>
								@endforeach
							</select>
						</div>
					</div><br>
					<div class="modal-footer">
						<a href="{{url('/admin/daftar-guru')}}" type="button" class="btn" data-dismiss="modal" value="Cancel">Kembali</a>
						<button type="submit" class="btn btn-info" onclick="return confirm('Apakah data yang dimasukkan sudah benar?')">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection