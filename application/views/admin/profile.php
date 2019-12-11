<!-- Container -->
<div class="container-fluid consolas">
	
	<!-- Title -->
	<div class="row border-bottom">
		<div class="col-12 col-md-6 col-lg-6">
			<h3 class="d-inline-block"><span class="mt-3 ml-3 badge badge-info">Profile</span></h3>
		</div>
		</div>
	</div>
	<!-- Akhir Title -->

	<!-- Profile -->
	<div class="card mx-auto mt-5 border-primary" style="width: 17rem;">
		<img src="<?= base_url('asset/image/user.png'); ?>" class="m-3 mx-auto"  width="150">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<span class="badge badge-primary py-2 px-3">ID : <?= $id; ?></span>
			</li>
			<li class="list-group-item">
				<span class="badge badge-primary py-2 px-3">Nama : <?= $namaUser; ?></span>
			</li>
			<li class="list-group-item">
				<span class="badge badge-primary py-2 px-3">Username : <?= $username; ?></span>
			</li>
				<li class="list-group-item">
					<span class="badge badge-primary py-2 px-3">Role : <?= $role; ?></span>
				</li>
		</ul>
	</div>
	<!-- Akhir Profile -->


</div>
<!-- Akhir Container -->