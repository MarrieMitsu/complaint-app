<!-- Container -->
<div class="fullscreen container-fluid bg-dark">

	<!-- Title -->
	<h2 class="consolas text-center text-white mt-4">Formulir Keluhan</h2>
	<!-- Akhir Title -->

	<!-- Formulir -->
	<div class="row justify-content-center">
		<div class="col-11 col-md-8 col-lg-8 my-3 p-5 rounded bg-light consolas">
			<form id="form-keluhan">
				<div class="form-group">
					<label for="nisn" class="f-b">NISN</label>
					<input type="text" maxlength="8" id="nisn" class="form-control" required>
					<small class="form-text text-danger"></small>
				</div>
				<div class="form-group">
					<label for="pelapor" class="f-b">Nama Lengkap</label>
					<input type="text" id="pelapor" class="form-control" required>
					<small class="form-text text-danger"></small>
				</div>
				<div class="form-group">
					<label for="email" class="f-b">E-mail</label>
					<input type="email" id="email" class="form-control" required>
					<small class="form-text text-danger"></small>
				</div>
				<div class="form-group mt-5">
					<label for="keluhan" class="f-b">Isi Keluhan</label>
					<textarea class="form-control" id="keluhan" rows="5" required></textarea>
				</div>
				<div class="form-group">
					<label for="divisi" class="f-b">Divisi</label>
					<select id="divisi" class="divisi-option custom-select" required>
						<option value="">Divisi</option>
						<!-- <option value="Sarana Prasarana">Sarana Prasarana</option>
						<option value="Perpustakaan">Perpustakaan</option>
						<option value="Cleaning Service">Cleaning Service</option> -->
					</select>
					<small class="form-text text-danger"></small>
				</div>
				<span class="d-inline-block text-primary m-p ho-m mb-3" data-toggle="modal" data-target="#modal-ketentuan">[Baca ketentuan]</span>
				<button type="submit" class="d-block btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	<!-- Akhir Formulir -->

	<!-- Modal Ketentuan -->
	<div class="modal fade" id="modal-ketentuan" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content consolas">
				<div class="modal-header">
					<h5 class="modal-title">Ketentuan</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ol>
						<li class="text-dark my-2">NISN harus sesuai dengan NISN peserta didik</li>
						<li class="text-dark my-2">E-mail dapat menggunakan e-mail pribadi. Nantinya e-mail digunakan untuk mengirim feedback kepada pelapor</li>
						<li class="text-dark my-2">Penulisan keluhan harus jelas dan detail berisi isi keluhan, dan lokasi atau tempat kejadian</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Modal Ketentuan -->

</div>
<!-- Akhir Container