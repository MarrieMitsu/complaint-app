<!-- Admin Navbar -->
<nav class="navbar navbar-expand navbar-dark bg-primary consolas">
	<span id="role" class="navbar-brand mb-0 h1">Teknisi</span>
	<div class="navbar-nav ml-auto">
		<div class="profile dropdown">
			<img src="<?= base_url('asset/image/user.png'); ?>" width="40" class="d-block m-p hs-m" data-toggle="dropdown">
			<div class="dropdown-menu text-center">
				<a href="<?= base_url('teknisi'); ?>" class="dropdown-item text-primary f-b">Dashboard</a>
				<a href="<?= base_url('teknisi/profilepage'); ?>" class="dropdown-item text-primary f-b">Profil</a>
				<a href="#" id="logout" class="dropdown-item text-primary f-b">Logout</a>
			</div>
		</div>
	</div>
</nav>
<!-- Akhir Admin Navbar -->