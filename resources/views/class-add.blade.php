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
				<form method="post" action="{{url('/admin/save-class')}}">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Tambah Data Kelas</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Kelas</label>
							<input type="text" class="form-control" name="nama_kelas" required>
						</div>
						<div class="form-group">
							<label>Jumlah Muird</label>
							<input type="number" class="form-control" name="jumlah_murid" required>
						</div>
						<div class="form-group">
							<label>Jumlah Pengajar</label>
							<input type="number" class="form-control" name="jumlah_pengajar" required>
						</div>
					</div><br>
					<div class="modal-footer">
						<a href="{{url('/admin/daftar-kelas')}}" type="button" class="btn" data-dismiss="modal" value="Cancel">Kembali</a>
						<button type="submit" class="btn btn-info" onclick="return confirm('Apakah data yang dimasukkan sudah benar?')">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection