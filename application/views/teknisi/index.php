<!-- Container -->
<div class="container-fluid consolas">

	<!-- Title -->
	<div class="row">
		<div class="col">
			<h4 class="d-inline-block"><span class="mt-3 ml-3 badge badge-primary">@<?= $namaUser; ?></span></h4>
			<h4 class="d-inline-block"><span id="divisi" class="mt-3 ml-3 badge badge-warning">#<?= $divisi; ?></span></h4>
		</div>
	</div>
	<!-- Akhir Title -->

	<!-- Search Menu -->
	<div class="row p-3 border-bottom">
		<div class="col-12">
			<form id="form-search" class="form-inline">
				<div class="form-group m-2">
					<input id="date-search" class="form-control fd" type="date">
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

	<!-- Tabel List Keluhan -->
	<div class="box-table p-3 table-responsive text-center">
		<table class="table table-bordered table-hover fd">
			<thead class="thead-light">
				<tr>
					<th scope="col">No Keluhan</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Status</th>
					<th scope="col">Setting</th>
					</tr>
			</thead>
			<tbody id="list-keluhan">
				<!-- <tr>
					<th scope="row">21312</th>
					<td>19-11-2019</td>
					<td ><span class="badge badge-danger p-2">Pending!</span></td>
					<td><a href="#" class="align-center badge badge-secondary p-2" data-toggle="modal" data-target="#modal-detail">Detail</a></td>
				</tr> -->
			</tbody>
		</table>
	</div>
	<!-- Akhir Tabel List Keluhan -->

	<!-- Modal Detail -->
	<div class="modal fade" id="modal-detail" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content consolas">
				<div class="modal-header">
					<h5 class="modal-title">Detail Keluhan</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body scrollbar">
					<form id="form-detail-keluhan">
						<div class="form-group">
							<label for="d-no-keluhan" class="f-b">No Keluhan</label>
							<input type="text" id="d-no-keluhan" class="form-control bg-white" value="213854" disabled>
						</div>
						<div class="form-group">
							<label for="d-tanggal" class="f-b">Tanggal</label>
							<input type="text" id="d-tanggal" class="form-control bg-white" value="11-11-1111" disabled>
						</div>
						<div class="form-group">
							<label for="d-status" class="f-b">Status</label>
							<input type="text" id="d-status" class="form-control bg-white" value="Pending" disabled>
						</div>
						<div class="form-group mt-5">
							<label for="d-nisn" class="f-b">NISN</label>
							<input type="text" id="d-tanggal" class="form-control bg-white" value="20183358" disabled>
						</div>
						<div class="form-group">
							<label for="d-pelapor" class="f-b">Pelapor</label>
							<input type="text" id="d-pelapor" class="form-control bg-white" value="Bella Qoirunnisa" disabled>
						</div>
						<div class="form-group">
							<label for="d-email" class="f-b">E-mail</label>
							<input type="email" id="d-email" class="form-control bg-white" value="fairul@gmail.com" disabled>
						</div>
						<div class="form-group mt-5">
							<label for="d-keluhan" class="f-b">Isi Keluhan</label>
							<textarea id="d-keluhan" class="form-control bg-white" rows="5" disabled>Keluhan</textarea>
						</div>
						<div class="form-group mt-5">
							<label for="d-divisi" class="f-b">Divisi</label>
							<input type="text" id="d-divisi" class="form-control bg-white" value="Perpustakaan" disabled>
						</div>
						<div class="form-group">
							<label for="d-waktu" class="f-b">Perkiraan Waktu (Hari)</label>
							<input type="text" id="d-waktu" class="form-control bg-white" value="11" disabled>
							<small class="form-text text-danger"></small>
						</div>
						<div class="form-group">
							<button id="btn-proses" type="button" class="btn btn-success d-none">Proses</button>
							<button id="btn-selesai" type="button" class="btn btn-primary d-none">Selesai</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Modal Detail -->

</div>
<!-- Akhir Container -->