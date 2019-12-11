<!-- Admin Navbar -->
<nav class="navbar navbar-expand navbar-dark bg-dark consolas">
	<span id="role" class="navbar-brand mb-0 h1">Admin</span>
	<div class="navbar-nav">
		<a class="nav-item nav-link" href="<?= base_url('admin/'); ?>">Keluhan</a>
		<a class="nav-item nav-link" href="<?= base_url('admin/teknisipage'); ?>">Teknisi</a>
		<a class="nav-item nav-link" href="<?= base_url('admin/divisipage'); ?>">Divisi</a>
	</div>
	<div class="navbar-nav ml-auto">
		<div class="profile dropdown">
			<img src="<?= base_url('asset/image/user.png'); ?>" width="40" class="d-block m-p hs-m" data-toggle="dropdown">
			<div class="dropdown-menu text-center">
				<a href="<?= base_url('admin/profilepage'); ?>" class="dropdown-item text-primary f-b">Profil</a>
				<a href="#" class="dropdown-item text-primary f-b" data-toggle="modal" data-target="#modal-panduan">Panduan</a>
				<a href="#" id="logout" class="dropdown-item text-primary f-b">Logout</a>
			</div>
		</div>
	</div>
</nav>
<!-- Akhir Admin Navbar -->

<!-- Modal Panduan -->
<div class="modal fade" id="modal-panduan" tabindex="-1">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content consolas">
			<div class="modal-header">
				<h5 class="modal-title">Panduan</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body scrollbar">
				<ul>
					<li class="text-dark my-4">
						<span class="f-b">Menu <span class="badge badge-dark p-2">Keluhan</span></span>
						<p>Pada menu <b>keluhan</b> terdapat tiga kategori <b>keluhan</b> yaitu, <span class="badge badge-success p-1">Baru</span> <span class="badge badge-success p-1">Pending/Proses</span> <span class="badge badge-success p-1">Histori</span></p>
						<p><b>keluhan</b> <span class="badge badge-success p-1">Baru</span> : Halaman untuk pengecekan apakah keluhan yang dikirim oleh pelapor layak atau tidak untuk ditangani ketahap selanjutnya.</p>
						<p><b>keluhan</b> <span class="badge badge-success p-1">Pending/Proses</span> : Halaman untuk melihat keluhan yang akan ditangani oleh teknisi atau staf. Disini admin hanya bisa mengirim feedback(sedang diproses) untuk keluhan yang statusnya sudah <span class="badge badge-success p-1">Proses!</span> melalui email oleh teknisi atau staf. Untuk status <span class="badge badge-danger p-1">Pending!</span> admin hanya bisa menuggu sampai teknisi atau staf menanggani keluhan tersebut.</p>
						<p><b>keluhan</b> <span class="badge badge-success p-1">Histori</span> : Halaman yang berisi riwayat atau histori keluhan yang sudah selesai ditangani.</p>
					</li>
					<li class="text-dark my-4">
						<span class="f-b">Menu <span class="badge badge-dark p-2">Teknisi</span></span>
						<p>Halaman yang berisi list akun Teknisi atau Staf yang bertugas untuk menangani keluhan.</p>
						<p>Admin dapat membuat akun Teknisi baru atau mengubah akun Teknisi yang sudah ada, serta dapat menghapus akun Teknisi</p>
					</li>
					<li class="text-dark my-4">
						<span class="f-b">Menu <span class="badge badge-dark p-2">Divisi</span></span>
						<p>Halaman yang berisi list Divisi dari suatu struktur organisasi yang diimplementasikan pada aplikasi ini. Admin dapat membuat Divisi baru dan menghapusnya</p>
					</li>
					<li class="text-dark my-4">
						<span class="f-b text-primary">Dashboard Teknisi</span>
						<p>Halaman dimana Teknisi menangani keluhan yang sudah dikirimkan oleh Admin</p>
						<p><b>keluhan</b> dengan status <span class="badge badge-danger p-1">Pending!</span> adalah keluhan yang belum ditangani dan diberi perkiraan batas waktu selesai oleh Teknisi</p>
						<p><b>keluhan</b> dengan status <span class="badge badge-success p-1">Proses!</span> adalah keluhan yang sedang diproses oleh Teknisi. Jika keluhan tersebut sudah selesai ditangani maka Teknisi akan mengirimkan feedback(sudah selesai ditangani) kepada pelapor melalu email</p>
					</li>
					<li class="text-dark my-4">
						<span class="f-b text-primary">Halaman Formulir Keluhan</span>
						<p>Halaman untuk pengaduan keluhan yang dilakukan oleh pelapor</p>
					</li>
					<li class="text-dark my-4">
						<span class="f-b text-primary">Halaman Login</span>
						<p>url : alamatwebsite.domain/login</p>
					</li>
					<li class="text-dark my-4">
						<span class="f-b text-primary">Kata kunci Histori</span>
						<p>It's a secret, keep looking for it! or maybe you can ask someone <span class="f-b">OwO</span></p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Panduan -->