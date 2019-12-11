<!-- Container -->
<div class="container-fluid">
	
	<!-- Jumbotron -->
	<div class="row">
		<div class="custom-jumbotron col-12">
			<div class="container text-center">
				<h1 class="text-white">TEL-VIS</h1>
				<p class="text-dark">Laporkan masalahmu disini</p>
			</div>
		</div>
	</div>
	<!-- Akhir Jumbotron -->

	<!-- Content 1 -->
	<div class="row">
		<div class="col-12">
			<h2 class="my-4 text-center">Apa itu Telvis</h2>
			<div class="container text-center">
				<div class="banner"></div>
				<p><TABLE>TEL-VIS (Telkom Service) merupakan sebuah website yang dibuat untuk menampung berbagai keluhan di lingkungan SMK Telkom Jakarta. TEL-VIS dibuat untuk memudahkan jalannya informasi antara pelapor dan para staff</TABLE></p>
			</div>
		</div>
	</div>
	<!-- Akhir Content 1 -->

	<!-- Content 2 -->
	<div class="row">
		<div class="col-12">
			<h2 class="my-4 text-center">Divisi Keluhan</h2>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white"> DIVISI KESISWAAN</h4>
							<p class="text-white">  mengkoordinasikan  semua kegiatan sekolah dalam melaksanakan program kesiswaan sesuai dengan visi misi dan program kerja.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-1">Contoh Keluhan</button>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white">DIVISI KURIKULUM </h4>
							<p class="text-white">Penetapkan kebijakan mutu dalam standar SKL, proses penilaian, menyusun program, mengatur pelaksanaan dan evaluasi pembelajaraan.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-2">Contoh Keluhan</button>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white">DIVISI PERPUSTAKAN</h4>
							<p class="text-white">bertugas menyimpan koleksi buku dan menyediakan sarana untuk belajar bagi siswa dan siswi sekolah.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-3">Contoh Keluhan</button>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white">DIVISI HUBIN</h4>
							<p class="text-white">mengkoordinasikan pelaksanaan tugas di bidang hubungan kerjasama dengan dunia indusri/dunia usaha dan memasarkan tamatan SMK.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-4">Contoh Keluhan</button>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white">DIVISI LABOTARIUM</h4>
							<p class="text-white">Bertanggung jawab dan melakukan kordinasi pada pelaksanaan praktikum sesuai dengan jadwal dan tujuan.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-5">Contoh Keluhan</button>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white">DIVISI TATA USAHA</h4>
							<p class="text-white">Bertanggung jawab atas pelaksanaan tugas - tugas pada LPPM, sesuai dengan rencana yang telah di tetapkan oleh pemimpin LPPM.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-6">Contoh Keluhan</button>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white">DIVISI SARANA PRASARANA</h4>
							<p class="text-white">Menyiapkan bahan di bidang perencanaan kebutuhan, pengadaan, dan distribusi serta inventarisasi aset.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-7">Contoh Keluhan</button>
						</div>
					</div>
					<div class="col-12 col-md-3 col-lg-3">
						<div class="custom-card p-3 rounded border text-center">
							<div class="img-icon"></div>
							<h4 class="text-white">DIVISI CLEANING SERVICE</h4>
							<p class="text-white">Membersihkan halaman yang ada di sekolah, membersihkan ruang kelas, ruang guru dan ruang sekolah.</p>
							<button class="btn btn-danger" data-toggle="modal" data-target="#modal-divisi-8">Contoh Keluhan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Content 2 -->

	<!-- Content 3 -->
	<div class="row">
		<div class="content-3 col-12">
			<div class="container text-center text-white">
				<a href="<?= base_url('complaint/formulir'); ?>" class="btn btn-danger consolas f-b">Buat Keluhan</a>
			</div>
		</div>
	</div>
	<!-- AKhir Content 3 -->

</div>
<!-- Akhir Container -->

<!-- Modal Divisi 1 -->
<div class="modal fade" id="modal-divisi-1" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contoh nya bertugas menginput data siswa yang ada disekolah dan masalah yang berkaitan tentang siswa.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 1 -->

<!-- Modal Divisi 2 -->
<div class="modal fade" id="modal-divisi-2" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contoh nya bertugas cara pembelajaraan, jadwal kegiatan sekolah.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 2 -->

<!-- Modal Divisi 3 -->
<div class="modal fade" id="modal-divisi-3" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contohnya bertugas memberikan pinjaman buku dan memberikan sarana untuk belajar.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 3 -->

<!-- Modal Divisi 4 -->
<div class="modal fade" id="modal-divisi-4" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contohnya bertugas mengeola kegiatan PKL dan mempromosikan sekolah.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 4 -->

<!-- Modal Divisi 5 -->
<div class="modal fade" id="modal-divisi-5" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contoh tugas nya merawat tempat lab dan mengkoordinasikan peminjaman lab.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 5 -->

<!-- Modal Divisi 6 -->
<div class="modal fade" id="modal-divisi-6" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contoh tugas nya bagian administrasi sekolah dan mengkoordinasikan tugas-tugas yang di berikan oleh pimpinan.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 6 -->

<!-- Modal Divisi 7 -->
<div class="modal fade" id="modal-divisi-7" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contoh tugas nya merawat aset di sekolah dan memperbaiki aset di sekolah apabila ada yang rusak.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 7 -->

<!-- Modal Divisi 8 -->
<div class="modal fade" id="modal-divisi-8" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content consolas">
			<div class="modal-body">
				<p>contoh tugas nya membersihkan lingkungan sekolah dan merawat halaman sekolah.</p>
			</div>
		</div>
	</div>
</div>
<!-- Akhir Modal Divisi 8 -->
	