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
				<form method="post" action="{{url('/teacher/save-report-month/'.$student->studentID)}}">
					@csrf
					<table class="table table-borders" id="dynamicForm">
						<input type="hidden" name="pb_id" value="$pb_id">
						<tr>
							<th>Nama Murid</th>
							<td><input type="text" name="nama_murid" class="form-control" readonly value="{{$student->nama_murid}}" required></td>

						</tr>
						<tr>
							<th>Kelompok Belajar</th>
							<td><input type="text" name="kelompok_belajar" class="form-control" value="{{$student->kelompok_belajar}}" required></td>
							@endforeach
						</tr>
						<tr>
							<th>Bulan Penilaian</th>
							<td><input type="text" name="bulan_penilaian" class="form-control" value='<?php echo $date ?>' required></td>

						</tr>
						<tr>
							<th>Kategori Penilaian</th>
							<td><input name="kategori_penilaian1" class="form-control" value="{{$nilai[0]->kategori_penilaian}}" required></input></td>
						</tr>
						<tr>
							<th>Tingkat Penilaian</th>
							<td>
								<input type="radio" id="belajarlagi" value="Belajar Lagi" name="tingkat_penilaian1"> <label for="belajarlagi">Belajar Lagi</label>
								<input type="radio" id="cukup" value="Cukup" name="tingkat_penilaian1"> <label for="cukup">Cukup</label>
								<input type="radio" id="baik" value="Baik" name="tingkat_penilaian1"> <label for="baik">Baik</label>
								<input type="radio" id="sangatbaik" value="Sangat Baik" name="tingkat_penilaian1"> <label for="sangatbaik">Sangat Baik</label>
							</td>
						</tr>
						<tr>
							<th>Kategori Penilaian 2</th>
							<td><input name="kategori_penilaian2" class="form-control" value="{{$nilai[1]->kategori_penilaian}}" required></input></td>
						</tr>
						<tr>
							<th>Tingkat Penilaian</th>
							<td>
								<input type="radio" id="belajarlagi" value="Belajar Lagi" name="tingkat_penilaian2"> <label for="belajarlagi">Belajar Lagi</label>
								<input type="radio" id="cukup" value="Cukup" name="tingkat_penilaian2"> <label for="cukup">Cukup</label>
								<input type="radio" id="baik" value="Baik" name="tingkat_penilaian2"> <label for="baik">Baik</label>
								<input type="radio" id="sangatbaik" value="Sangat Baik" name="tingkat_penilaian2"> <label for="sangatbaik">Sangat Baik</label>
							</td>
						</tr>
						<tr>
							<th>Kategori Penilaian 3</th>
							<td><input name="kategori_penilaian3" class="form-control" value="{{$nilai[2]->kategori_penilaian}}" required></input></td>
						</tr>
						<tr>
							<th>Tingkat Penilaian</th>
							<td>
								<input type="radio" id="belajarlagi" value="Belajar Lagi" name="tingkat_penilaian3"> <label for="belajarlagi">Belajar Lagi</label>
								<input type="radio" id="cukup" value="Cukup" name="tingkat_penilaian3"> <label for="cukup">Cukup</label>
								<input type="radio" id="baik" value="Baik" name="tingkat_penilaian3"> <label for="baik">Baik</label>
								<input type="radio" id="sangatbaik" value="Sangat Baik" name="tingkat_penilaian3"> <label for="sangatbaik">Sangat Baik</label>
							</td>
						</tr>
						<tr>
							<th>Catatan</th>
							<td><textarea type="text" name="catatan" class="form-control" required></textarea></td>
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

	const add = document.querySelectorAll("div.input-group button.add-nilai");
	add.forEach(function(e) {
		e.addEventListener('click', function() {
			let element = this.parentElement;
			console.log(element);
			let newElement = document.createElement('div');
			newElement.classList.add('.input-group', 'mb-3');
			newElement.innerHTML = '<tr><th>Kategori Penilaian 1</th><td><input name="kategori_penilaian1[]" class="form-control" required></input></td></tr><tr><th>Tingkat Penilaian</th><td><input type="radio" id="belajarlagi" value="Belajar Lagi" name="tingkat_penilaian1[]"> <label for="belajarlagi">Belajar Lagi</label><input type="radio" id="cukup" value="Cukup" name="tingkat_penilaian1[]"> <label for="cukup">Cukup</label><input type="radio" id="baik" value="Baik" name="tingkat_penilaian1[]"> <label for="baik">Baik</label><input type="radio" id="sangatbaik" value="Sangat Baik" name="tingkat_penilaian1[]"> <label for="sangatbaik">Sangat Baik</label></td></tr>';
			document.getElementById('extra-nilai').appendChild(newElement);
		})
	})
</script>
@endpush -->