<!-- Container -->
<div class="container-fluid consolas">
	
	<!-- Title -->
	<div class="row">
		<div class="col-12 col-md-6 col-lg-6">
			<h3 class="d-inline-block"><span class="mt-3 ml-3 badge badge-info">Teknisi</span></h3>
		</div>
		<div class="col-12 col-md-6 col-lg-6">
			<button class="mt-3 ml-3 btn btn-success fd f-b" data-toggle="modal" data-target="#tambah-teknisi">Tambah Teknisi</button>
		</div>
	</div>
	<!-- Akhir Title -->

	<!-- Search Menu -->
	<div class="row p-3 border-bottom">
		<div class="col-12">
			<form id="form-search" class="form-inline">
				<div class="form-group m-2">
					<select id="divisi-search" class="divisi-option custom-select fd">
						<option value="">Divisi</option>
						<!-- <option value="Sarana Prasarana">Sarana Prasarana</option>
						<option value="Perpustakaan">Perpustakaan</option>
						<option value="Cleaning Service">Cleaning Service</option> -->
					</select>
				</div>
				<div class="form-group m-2">
					<input id="input-search" class="form-control fd" type="text" placeholder="Search">
				</div>
				<div class="form-group m-2">
					<button id="submit-search" class="btn btn-outline-success fd" type="submit">Search</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Akhir Search Menu -->

	<!-- Tabel List Teknisi -->
	<div class="box-table p-3 table-responsive text-center">
		<table class="table table-bordered table-hover fd">
			<thead class="thead-light">
				<tr>
					<th scope="col">ID Teknisi</th>
					<th scope="col">Nama Teknisi</th>
					<th scope="col">Divisi</th>
					<th scope="col">Setting</th>
					</tr>
			</thead>
			<tbody id="list-teknisi">
				<!-- <tr>
					<th scope="row">1</th>
					<td>Fairul</td>
					<td ><span class="badge badge-warning p-2">Perpustakaan</span></td>
					<td><a href="#" class="align-center badge badge-secondary p-2" data-toggle="modal" data-target="#modal-detail">Detail</a></td>
				</tr> -->
			</tbody>
		</table>
	</div>
	<!-- Akhir Tabel List Teknisi -->

	<!-- Modal Detail -->
	<div class="modal fade" id="modal-detail" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content consolas">
				<div class="modal-header">
					<h5 class="modal-title">Teknisi</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body scrollbar">
					<form id="form-detail-teknisi">
						<div class="form-group">
							<label for="d-id-teknisi" class="f-b">ID Teknisi</label>
							<input type="text" id="d-id-teknisi" class="form-control bg-white" value="1" disabled>
						</div>
						<div class="form-group">
							<label for="d-nama-teknisi" class="f-b">Nama Teknisi</label>
							<input type="text" id="d-nama-teknisi" class="form-control bg-white" value="Fairul" disabled>
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<label for="d-username" class="f-b">Username</label>
							<input type="text" id="d-username" class="form-control bg-white" value="fairul" disabled>
						</div>
						<div class="form-group">
							<label for="d-password" class="f-b">Password</label>
							<input type="password" id="d-password" class="form-control bg-white" value="fairul" disabled>
							<small class="password-toggle text-primary m-p ho-m mb-3">Show/Hide</small>
						</div>
						<div class="form-group">
							<label for="d-divisi" class="f-b">Divisi</label>
							<select id="d-divisi" class="divisi-option custom-select bg-white fd" disabled>
								<option value="">Divisi</option>
								<!-- <option value="Sarana Prasarana">Sarana Prasarana</option>
								<option value="Perpustakaan">Perpustakaan</option>
								<option value="Cleaning Service">Cleaning Service</option> -->
							</select>
						</div>
						<div class="form-group">
							<button id="btn-edit" type="button" class="btn btn-primary d-none">Edit</button>
							<button id="btn-save" type="submit" class="btn btn-warning d-none">Save</button>
							<button id="btn-hapus-teknisi" type="button" class="btn btn-danger d-none">Hapus</button>
							<button id="btn-cancel" type="button" class="btn btn-danger d-none">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Modal Detail -->

	<!-- Modal Tambah Teknisi -->
	<div class="modal fade" id="tambah-teknisi" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content consolas">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Teknisi</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body scrollbar">
					<form id="form-teknisi">
						<div class="form-group">
							<label for="nama-teknisi" class="f-b">Nama Teknisi</label>
							<input type="text" id="nama-teknisi" class="form-control" required>
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<label for="username" class="f-b">Username</label>
							<input type="text" id="username" class="form-control" required>
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<label for="password" class="f-b">Password</label>
							<input type="password" id="password" class="form-control" required>
							<small class="password-toggle text-primary m-p ho-m mb-3">Show/Hide</small>
						</div>
						<div class="form-group">
							<label for="divisi" class="f-b">Divisi</label>
							<select id="divisi" class="divisi-option custom-select fd" required>
								<option value="">Divisi</option>
								<!-- <option value="Sarana Prasarana">Sarana Prasarana</option>
								<option value="Perpustakaan">Perpustakaan</option>
								<option value="Cleaning Service">Cleaning Service</option> -->
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Modal Tambah Teknisi -->

</div>
<!-- Akhir Container -->