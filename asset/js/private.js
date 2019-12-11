$(document).ready(function(){
	// Run Function
	getComplaint('default');
	getTeknisi('default');
	getDivisi();

	// Modal hide
	$('#modal-detail').on('hidden.bs.modal', function(){
		$('#modal-detail input, #modal-detail select').prop('disabled', true);
		$('#modal-detail input, #modal-detail select').removeClass('is-valid');
		$('#btn-edit, #btn-hapus').removeClass('d-none');
		$('#btn-save, #btn-cancel').addClass('d-none');
		$('#password, #d-password').attr('type', 'password');
	});

	$('#tambah-teknisi').on('hidden.bs.modal', function(){
		$('#password, #d-password').attr('type', 'password');
		$('#form-teknisi').trigger('reset');
	});

	// Password toggle
	$('.password-toggle').on('click', function(){
		let attr = $('#password').attr('type');
		
		if (attr == 'password') {
			$('#password, #d-password').attr('type', 'text');
		}else{
			$('#password, #d-password').attr('type', 'password');
		}
	});

	// Logout
	$('#logout').on('click', function(e){
		e.preventDefault();

		Swal.fire({
			title: 'Logout',
			type: 'question',
			showCancelButton: true
		}).then((result) =>{
			if (result.value) {
				$.ajax({
					url: `${host}/${path}/login/logout`,
					dataType: 'json',
					success: function(response){
						window.location.href = `${host}/${path}/login`;
					}
				});
			}else{
				false;
			}
		});
	});

	// Get keluhan baru
	$('#baru').on('click', function(e){
		e.preventDefault();

		statusKeluhan = 'baru';
		$('#nav-title').text('Keluhan : Baru');
		$('#btn-hapus-histori').addClass('d-none');
		getComplaint('table', `${host}/${path}/api/rest_complaint?status=baru`);
	});

	// Get keluhan proses/pending
	$('#pending-proses').on('click', function(e){
		e.preventDefault();

		statusKeluhan = 'pending';
		$('#nav-title').text('Keluhan : Pending/Proses');
		$('#btn-hapus-histori').addClass('d-none');
		getComplaint('table', `${host}/${path}/api/rest_complaint?status=proses`);
	});

	// Get keluhan Selesai
	$('#histori').on('click', function(e){
		e.preventDefault();
	
		statusKeluhan = 'selesai';
		$('#nav-title').text('Histori');
		$('#btn-hapus-histori').removeClass('d-none');
		getComplaint('table', `${host}/${path}/api/rest_complaint?status=selesai`);
	});

	// Get detail keluhan
	$('#list-keluhan').on('click', function(e){
		e.preventDefault();
		if (e.target.id == 'detail-keluhan') {
			const no_keluhan = $(e.target).closest('tr').find('th').text();
			const status = $(e.target).closest('td').prev().text().replace(/[^a-zA-Z ]/g, "");
			getComplaint('modal', `${host}/${path}/api/rest_complaint?status=${status}&no_keluhan=${no_keluhan}`);
			$('#modal-detail').modal('show');
		}
	});

	// Search keluhan
	$('#form-search').on('submit', function(e){
		e.preventDefault();
		const role = $('#role').text();
		const tanggal = $('#date-search').val();
		const search = $('#input-search').val();

		if (role === 'Admin') {
			const divisi = $('#divisi-search option:selected').val();
			getComplaint('table', `${host}/${path}/api/rest_complaint?status=${statusKeluhan}&divisi=${divisi}&tanggal=${tanggal}&search=${search}`);
		}else if(role === 'Teknisi'){
			let divisi = $('#divisi').text().replace(/[^a-zA-Z ]/g, "");
			getComplaint('table', `${host}/${path}/api/rest_complaint?status=pending&divisi=${divisi}&tanggal=${tanggal}&search=${search}`);
		}
		
	});

	// Terima keluhan baru
	$('#btn-terima').on('click', function(){
		Swal.fire({
			title: 'Terima',
			text: 'Keluhan',
			type: 'question',
			showCancelButton: true
		}).then(async (result) =>{
			if (result.value) {
				try{
					const noKeluhan = $('#d-no-keluhan').val();
					const url = `${host}/${path}/api/rest_complaint`;
					const data = {no_keluhan: noKeluhan, status: 'Pending'}

					var response = await AJAXPut(url, data);
					$('#modal-detail').modal('hide');
					getComplaint('table', `${host}/${path}/api/rest_complaint?status=baru`);

					if (response.status == 1) {
						Swal.fire({
							type: 'success',
						});
					}else{
						Swal.fire({
							type: 'error',
						});
					}
					
				}catch(err){
					console.log(err);
					Swal.fire({
						title: 'Internal error',
						text: 'Silahkan menghubungi admin',
						type: 'error'
					});
				}
			}else{
				false;
			}
		});
	});

	// Hapus keluhan baru
	$('#btn-hapus-keluhan').on('click', function(){
		Swal.fire({
			title: 'Hapus',
			text: 'Keluhan',
			type: 'question',
			showCancelButton: true
		}).then(async (result) =>{
			if (result.value) {
				try{
					const noKeluhan = $('#d-no-keluhan').val();
					const url = `${host}/${path}/api/rest_complaint`;
					const data = {no_keluhan: noKeluhan}

					var response = await AJAXDelete(url, data);
					$('#modal-detail').modal('hide');
					getComplaint('table', `${host}/${path}/api/rest_complaint?status=baru`);

					if (response.status == 1) {
						Swal.fire({
							type: 'success',
						});
					}else{
						Swal.fire({
							type: 'error',
						});
					}
						
				}catch(err){
					console.log(err);
					Swal.fire({
						title: 'Internal error',
						text: 'Silahkan menghubungi admin',
						type: 'error'
					});
				}
			}else{
				false;
			}
		});
	});

	// Proses keluhan pending
	$('#btn-proses').on('click', function(){
		Swal.fire({
			title: 'Proses',
			text: 'Keluhan',
			type: 'question',
			showCancelButton: true
		}).then(async (result) =>{
			if (result.value) {
				const noKeluhan = $('#d-no-keluhan').val();
				const waktu = $('#d-waktu').val();

				if (waktu != 0) {
					try{
						const url = `${host}/${path}/api/rest_complaint`;
						const data = {no_keluhan: noKeluhan, waktu: waktu ,status: 'Proses'}

						var response = await AJAXPut(url, data);
						$('#modal-detail').modal('hide');
						getComplaint('default');

						if (response.status == 1) {
							Swal.fire({
								type: 'success',
							});
						}else{
							Swal.fire({
								type: 'error',
							});
						}
					}catch(err){
						console.log(err);
						Swal.fire({
							title: 'Internal error',
							text: 'Silahkan menghubungi admin',
							type: 'error'
						});
					}
				}else{
					$('#d-waktu').next().text('Input tidak boleh 0 atau kosong');
				}
					
			}else{
				false;
			}
		});
	});

	// Feedback_1 keluhan Proses
	$('#btn-kirim-feedback').on('click', function(){
		Swal.fire({
			title: 'Kirim',
			text: 'Feedback proses',
			type: 'question',
			showCancelButton: true
		}).then(async (result) =>{
			if (result.value) {
				const noKeluhan = $('#d-no-keluhan').val();
				
				$('#modal-detail').modal('hide');
				loader('load');
				getComplaint('data', `${host}/${path}/api/rest_complaint?no_keluhan=${noKeluhan}`).then( async (response) =>{
					var sendMail = await AJAXPost(`${host}/${path}/send_email`, response.data[0]);
					if (sendMail.status == 1) {
						try{
							const url = `${host}/${path}/api/rest_complaint`;
							const data = {no_keluhan: noKeluhan, feedback_1: 1}

							var response = await AJAXPut(url, data);
							getComplaint('table', `${host}/${path}/api/rest_complaint?status=proses`);
							loader('remove');
							Swal.fire({
								type: 'success',
							});
						}catch(err){
							console.log(err);
							Swal.fire({
								title: 'Internal error',
								text: 'Silahkan menghubungi admin',
								type: 'error'
							});
						}
					}else{
						Swal.fire({
							title: 'Gagal',
							text: 'Mengirim Feedback Kepada Pelapor',
							type: 'error'
						});
					}
				});
			}else{
				false;
			}
		});
	});

	// Selesai keluhan Proses
	$('#btn-selesai').on('click', function(){
		Swal.fire({
			title: 'Selesai',
			text: 'Feedback akan terkirim kepada Pelapor',
			type: 'question',
			showCancelButton: true
		}).then(async (result) =>{
			if (result.value) {
				const noKeluhan = $('#d-no-keluhan').val();

				$('#modal-detail').modal('hide');
				loader('load');
				getComplaint('data', `${host}/${path}/api/rest_complaint?no_keluhan=${noKeluhan}`).then( async (response) =>{
					var sendMail = await AJAXPost(`${host}/${path}/send_email`, response.data[0]);
					if (sendMail.status == 1) {
						try{
							const url = `${host}/${path}/api/rest_complaint`;
							const data = {no_keluhan: noKeluhan ,status: 'Selesai', feedback_2: 1}

							var response = await AJAXPut(url, data);
							getComplaint('default');
							loader('remove');
							if (response.status == 1) {
								Swal.fire({
									type: 'success',
								});
							}else{
								Swal.fire({
									type: 'error',
								});
							}
						}catch(err){
							console.log(err);
							Swal.fire({
								title: 'Internal error',
								text: 'Silahkan menghubungi admin',
								type: 'error'
							});
						}
					}else{
						Swal.fire({
							title: 'Gagal',
							text: 'Mengirim Feedback Kepada Pelapor',
							type: 'error'
						});
					}
				});
			}else{
				false;
			}
		});
	});

	// Hapus Permanent Histori
	$('#btn-hapus-histori').on('click', function(){
		Swal.fire({
			title: 'Hapus Permanent',
			text: 'Peringatan!, seluruh histori keluhan akan dihapus permanent dan tidak dapat dipulihkan',
			type: 'warning',
			showCancelButton: true
		}).then( async (result) =>{
			if (result.value) {
				const {value: kataKunci} = await Swal.fire({
					title: 'Masukan kata kunci',
					text: 'It\'s a secret',
					input: 'text'
				});

				var d = new Date();
				let date = `${d.getDate()}-${d.getHours()}-${d.getMinutes()}=${d.getDate() + d.getHours() + d.getMinutes()}`;
				console.log(date);

				if (kataKunci == date) {
					try{
						const url = `${host}/${path}/api/rest_complaint`;
						const data = {delete_all: 'Selesai'}

						var response = await AJAXDelete(url, data);
						getComplaint('table', `${host}/${path}/api/rest_complaint?status=selesai`);

						if (response.status == 1) {
							Swal.fire({
								type: 'success',
							});
						}else{
							Swal.fire({
								type: 'error',
							});
						}
							
					}catch(err){
						console.log(err);
						Swal.fire({
							title: 'Internal error',
							text: 'Silahkan menghubungi admin',
							type: 'error'
						});
					}
				}else{
					Swal.fire({
						title: 'Gagal',
						text: 'Kata kunci salah',
						type: 'error'
					});
				}
			}else{
				false;
			}
		});
	});

	// Get detail Teknisi
	$('#list-teknisi').on('click', function(e){
		e.preventDefault();
		if (e.target.id == 'detail-teknisi') {
			const idTeknisi = $(e.target).closest('tr').find('th').text();
			getTeknisi('modal', `${host}/${path}/api/rest_teknisi?id_teknisi=${idTeknisi}`);
			$('#modal-detail').modal('show');
		}
	});

	// Search teknisi
	$('#form-search').on('submit', function(e){
		e.preventDefault();
		const divisi = $('#divisi-search option:selected').val();
		const search = $('#input-search').val();

		getTeknisi('table', `${host}/${path}/api/rest_teknisi?divisi=${divisi}&search=${search}`);
		
	});

	// Post Teknisi
	$('#form-teknisi').on('submit', async function(e){
		e.preventDefault();
		$('small').text('');

		const namaTeknisi = $('#nama-teknisi').val();
		const username = $('#username').val();
		const password = $('#password').val();
		const divisi = $('#divisi option:selected').val();

		try{
			const url = `${host}/${path}/api/rest_teknisi`;
			const data = {nama_teknisi: namaTeknisi, username: username, password: password, divisi:divisi}

			await AJAXGet(`${host}/${path}/api/rest_teknisi?username=${username}`).then( async (response) => {
				if (response.status == 1) {
					$('#username').next().text('Username sudah ada');
				}else if( /\d/.test(namaTeknisi)){
					$('#nama-teknisi').next().text('Nama tidak boleh mengandung angka');
				}else{
					var response = await AJAXPost(url, data);
					
					if (response.status == 1) {
						$('#tambah-teknisi').modal('hide');
						getTeknisi('default');
						$('#form-teknisi').trigger('reset');
						Swal.fire({
							title: 'Berhasil',
							text: 'Menambahkan Teknisi',
							type: 'success'
						});
					}else{
						Swal.fire({
							title: 'Gagal',
							text: 'Menambahkan Teknisi',
							type: 'error'
						});
					}

				}
			});			
		}catch(err){
			console.log(err);
		}
	});

	// Edit Teknisi
	$('#btn-edit').on('click', function(){
		$('#modal-detail input:not(#d-id-teknisi, #d-username), #modal-detail select').prop('disabled', false);
		$('#modal-detail input:not(#d-id-teknisi, #d-username), #modal-detail select').addClass('is-valid');
		$('#btn-edit, #btn-hapus-teknisi').addClass('d-none');
		$('#btn-save, #btn-cancel').removeClass('d-none');
	});

	// Cancel Edit Teknisi
	$('#btn-cancel').on('click', function(){
		$('#modal-detail input, #modal-detail select').prop('disabled', true);
		$('#modal-detail input, #modal-detail select').removeClass('is-valid');
		$('#btn-edit, #btn-hapus-teknisi').removeClass('d-none');
		$('#btn-save, #btn-cancel').addClass('d-none');
	});

	// Save Teknisi
	$('#form-detail-teknisi').on('submit', async function(e){
		e.preventDefault();
		$('small').text('');

		const idTeknisi = $('#d-id-teknisi').val();
		const namaTeknisi = $('#d-nama-teknisi').val();
		const password = $('#d-password').val();
		const divisi = $('#d-divisi option:selected').val();

		try{
			const url = `${host}/${path}/api/rest_teknisi`;
			const data = {id_teknisi: idTeknisi, nama_teknisi: namaTeknisi, password: password, divisi:divisi}

			if( /\d/.test(namaTeknisi)){
				$('#d-nama-teknisi').next().text('Nama tidak boleh mengandung angka');
			}else{
				var response = await AJAXPut(url, data);

				if (response.status == 1) {
					$('#modal-detail').modal('hide');
					getTeknisi('default');
					$('#form-detail-teknisi').trigger('reset');
					Swal.fire({
						title: 'Berhasil',
						text: 'Mengubah Teknisi',
						type: 'success'
					});
				}else{
					$('#modal-detail').modal('hide');
					Swal.fire({
						title: 'Berhasil',
						text: 'Tidak ada perubahan',
						type: 'info'
					});
				}

			}
			
		}catch(err){
			console.log(err);
		}
	});

	// Hapus Teknisi
	$('#btn-hapus-teknisi').on('click', function(){
		Swal.fire({
			title: 'Hapus',
			text: 'Teknisi',
			type: 'question',
			showCancelButton: true
		}).then(async (result) =>{
			if (result.value) {
				try{
					const idTeknisi = $('#d-id-teknisi').val();
					const url = `${host}/${path}/api/rest_teknisi`;
					const data = {id_teknisi: idTeknisi, status: 0}

					var response = await AJAXPut(url, data);
					$('#modal-detail').modal('hide');
					getTeknisi('default');
					
					if (response.status == 1) {
						Swal.fire({
							type: 'success',
						});
					}else{
						Swal.fire({
							type: 'error',
						});
					}
				}catch(err){
					console.log(err);
					Swal.fire({
						title: 'Internal error',
						text: 'Silahkan menghubungi admin',
						type: 'error'
					});
				}
			}else{
				false;
			}
		});
	});

	// Post Divisi
	$('#form-divisi').on('submit', async function(e){
		e.preventDefault();
		const namaDivisi = $('#nama-divisi').val();

		try{
			const url = `${host}/${path}/api/rest_divisi`;
			const data = {divisi: namaDivisi}
			var response = await AJAXPost(url, data);

			if (response.status == 1) {
				$('#tambah-divisi').modal('hide');
				getDivisi();
				$('#form-divisi').trigger('reset');
				Swal.fire({
					title: 'Berhasil',
					text: 'Menambahkan Divisi',
					type: 'success'
				});
			}else{
				Swal.fire({
					title: 'Gagal',
					text: 'Menambahkan Divisi',
					type: 'error'
				});
			}
		}catch(err){
			console.log(err);
			Swal.fire({
					title: 'Internal error',
					text: 'Silahkan menghubungi admin',
					type: 'error'
				});
		}
	});

	// Hapus Divisi
	$('#list-divisi').on('click', function(e){
		e.preventDefault();
		if (e.target.id == 'btn-hapus') {
			Swal.fire({
				title: 'Hapus',
				text: 'Divisi',
				type: 'question',
				showCancelButton: true
			}).then(async (result) =>{
				if (result.value) {
					try{
						const idDivisi = $(e.target).closest('tr').find('th').text();
						const url = `${host}/${path}/api/rest_divisi`;
						const data = {id_divisi: idDivisi}

						var response = await AJAXDelete(url, data);
						getDivisi();
						
						if (response.status == 1) {
							Swal.fire({
								type: 'success',
							});
						}else{
							Swal.fire({
								type: 'error',
							});
						}
					}catch(err){
						console.log(err);
						Swal.fire({
							title: 'Internal error',
							text: 'Silahkan menghubungi admin',
							type: 'error'
						});
					}
				}else{
					false;
				}
			});
			
		}
	});

});