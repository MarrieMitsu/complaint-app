<!-- Container -->
<div class="fullscreen container-fluid bg-dark">

	<!-- Title -->
	<h2 class="consolas text-center text-white mt-4">Login</h2>
	<!-- Akhir Title -->

	<!-- Formulir -->
	<div class="row justify-content-center">
		<div class="col-11 col-md-8 col-lg-8 my-3 p-5 rounded bg-light consolas">
			<form id="form-login">
				<div class="form-group">
					<label for="username" class="f-b">Username</label>
					<input type="text" id="username" class="form-control" required>
					<small class="form-text text-danger"></small>
				</div>
				<div class="form-group">
					<label for="password" class="f-b">Password</label>
					<input type="password" id="password" class="form-control" required>
					<small class="form-text text-danger"></small>
				</div>
				<span class="d-inline-block text-primary m-p ho-m mb-3" data-toggle="modal" data-target="#modal-ketentuan">[Ketentuan]</span>
				<button type="submit" class="d-block btn btn-primary">Login</button>
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
						<li class="text-dark my-2">Hanya pihak tertentu yang dapat melakukan validasi login</li>
						<li class="text-dark my-2">Jika lupa password dapat menghubungi admin melalui email : admin@gmail.com</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Modal Ketentuan -->

</div>
<!-- Akhir Container