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
				@foreach($dataM as $student)
				<form method="post" action="{{url('/teacher/save-report/'.$student->studentID)}}" enctype="multipart/form-data">
					@csrf
					<table class="table table-borders" id="dynamicForm">
						<tr>
							<th>Nama Murid</th>
							<td><input type="text" name="nama_murid" class="form-control" readonly value="{{$student->nama_murid}}" required></td>
							@endforeach
						</tr>
						<!-- <tr>
							<th>Kelas</th>
						</tr> -->
						<tr>
							<th>Tanggal Penilaian</th>
							<td><input type="date" id="tanggal" name="tanggal_penilaian" class="form-control" value='<?php echo date('Y-m-d'); ?>' required></td>
						</tr>
						<tr>
							<th>Kategori Penilaian</th>
							<td><input type="text" name="kategori_penilaian" class="form-control" required></td>
						</tr>
						<tr>
							<th>Keterangan Penilaian</th>
							<td><textarea name="keterangan_penilaian" class="form-control" required></textarea></td>
						</tr>
						<tr>
							<th>Tingkat Penilaian</th>
							<td><input type="text" name="tingkat_penilaian" class="form-control" required></td>
						</tr>
						<tr>
							<th>Foto Kegiatan</th>
							<td><input type="file" name="photo" class="form-control" required></td>
						</tr>
					</table>
					<div class="modal-footer">
						<a href="{{url('/teacher/buat-laporan')}}" type="button" class="btn" data-dismiss="modal" value="Cancel">Kembali</a>
						<button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang dimasukkan sudah benar?')">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- @push('script')
<script>
	$(document).ready(function(){
		var i = 0;
		$("#addbtn").click(function(){
				++i;
				$("#dynamicForm").append('<tr><th>Kategori Penilaian</th><td><input type="text" name="kategori_penilaian['+i+'][kategori_penilaian]" class="form-control" required></td></tr><tr><th>Keterangan Penilaian</th><td><textarea name="keterangan_penilaian['+i+'][keterangan_penilaian]" class="form-control" required></textarea></td></tr><tr><th>Tingkat Penilaian</th><td><input type="text" name="tingkat_penilaian['+i+'][tingkat_penilaian]" class="form-control" required></td></tr>');
			});

			$("#removebtn").click(function(){
				$("#dynamicForm tr:last").remove();
			});
		});

	
</script>
@endpush -->