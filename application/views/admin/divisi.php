<!-- Container -->
<div class="container-fluid consolas">
	
	<!-- Title -->
	<div class="row border-bottom">
		<div class="col-12 col-md-6 col-lg-6">
			<h3 class="d-inline-block"><span class="mt-3 ml-3 badge badge-info">Divisi</span></h3>
		</div>
		<div class="col-12 col-md-6 col-lg-6">
			<button class="my-3 ml-3 btn btn-success fd f-b" data-toggle="modal" data-target="#tambah-divisi">Tambah Divisi</button>
		</div>
	</div>
	<!-- Akhir Title -->

	<!-- Tabel List Divisi -->
	<div class="box-table p-3 table-responsive text-center">
		<table class="table table-bordered table-hover fd">
			<thead class="thead-light">
				<tr>
					<th scope="col">ID Divisi</th>
					<th scope="col">Nama Divisi</th>
					<th scope="col">Setting</th>
					</tr>
			</thead>
			<tbody id="list-divisi">
				<!-- <tr>
					<th scope="row">1</th>
					<td ><span class="badge badge-warning p-2">Perpustakaan</span></td>
					<td><a href="#" class="align-center badge badge-danger p-2">Hapus</a></td>
				</tr> -->
			</tbody>
		</table>
	</div>
	<!-- Akhir Tabel List Divisi -->

	<!-- Modal Tambah Teknisi -->
	<div class="modal fade" id="tambah-divisi" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content consolas">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Divisi</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body scrollbar">
					<form id="form-divisi">
						<div class="form-group">
							<label for="nama-divisi" class="f-b">Nama Divisi</label>
							<input type="text" id="nama-divisi" class="form-control" required>
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