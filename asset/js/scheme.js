// Global Variable
var host = window.location.origin;
var path = window.location.pathname.split('/')[1];
var statusKeluhan = 'baru';

// AJAX Get
function AJAXGet(url){
	return new Promise(function(resolve, reject){
		$.ajax({
			type: 'GET',
			url: url,
			dataType: 'json',
			success: function(response){
				resolve(response);
			},
			error: function(xhr, status, error){
				reject([xhr, status, error]);
			}
		});
	});
}

// AJAX Post
function AJAXPost(url, data){
	return new Promise(function(resolve, reject){
		$.ajax({
			type: 'POST',
			url: url,
			dataType: 'json',
			data: data,
			success: function(response){
				resolve(response);
			},
			error: function(xhr, status, error){
				reject([xhr, status, error]);
			}
		});
	});
}

// AJAX Put
function AJAXPut(url, data){
	return new Promise(function(resolve, reject){
		$.ajax({
			type: 'PUT',
			url: url,
			dataType: 'json',
			data: data,
			success: function(response){
				resolve(response);
			},
			error: function(xhr, status, error){
				reject([xhr, status, error]);
			}
		});
	});
}

// AJAX Delete
function AJAXDelete(url, data){
	return new Promise(function(resolve, reject){
		$.ajax({
			type: 'DELETE',
			url: url,
			dataType: 'json',
			data: data,
			success: function(response){
				resolve(response);
			},
			error: function(xhr, status, error){
				reject([xhr, status, error]);
			}
		});
	});
}

// Loader
function loader(kategori){
	switch(kategori){
		case 'load':
			$('body').append(`
				<div class="loader-box">
					<div class="loader"></div>
					<h5 class="text-white text-center">Loading</h5>
				</div>
			`);
			break;
		case 'remove':
			$('body').find('.loader-box').remove();
			break;
	}
			
}

// Status color
function statusColor(param){
	let color;
	switch(param){
		case 'Baru':
			color = 'primary';
			break;
		case 'Pending':
			color = 'danger';
			break;
		case 'Proses':
			color = 'success';
			break;
		case 'Selesai':
			color = 'primary';
			break;
	}
	return color;
}

// Table Scheme
function tableScheme(kategori, response){
	switch(kategori){
		case 'keluhan':
			$('#list-keluhan').empty();
			if (response.status == 0) {
				$('#list-keluhan').append(`
					<tr>
						<td colspan="4">Tidak ada data</td>
					</tr>
				`);
			}else{
				var complaint = response.data;
				$.each(complaint, function(index, item){
					let color = statusColor(item.status);
					$('#list-keluhan').append(`
						<tr>
							<th scope="row">${item.no_keluhan}</th>
							<td>${item.tgl_keluhan}</td>
							<td><span class="badge badge-${color} p-2">${item.status}!</span></td>
							<td><a href="#" id="detail-keluhan" class="align-center badge badge-secondary p-2" data-toggle="modal">Detail</a></td>
						</tr>
					`);
				});
			}
			break;
		case 'teknisi':
			$('#list-teknisi').empty();
			if (response.status == 0) {
				$('#list-teknisi').append(`
					<tr>
						<td colspan="4">Tidak ada data</td>
					</tr>
				`);
			}else{
				var teknisi = response.data;
				$.each(teknisi, function(index, item){
					$('#list-teknisi').append(`
						<tr>
							<th scope="row">${item.id_teknisi}</th>
							<td>${item.nama_user}</td>
							<td><span class="badge badge-warning p-2">${item.divisi}</span></td>
							<td><a href="#" id="detail-teknisi" class="align-center badge badge-secondary p-2" data-toggle="modal">Detail</a></td>
						</tr>
					`);
				});
			}
			break;
		case 'divisi':
			$('#list-divisi').empty();
			if (response.status == 0) {
				$('#list-divisi').append(`
					<tr>
						<td colspan="4">Tidak ada data</td>
					</tr>
				`);
			}else{
				var divisi = response.data;
				$.each(divisi, function(index, item){
					$('#list-divisi').append(`
						<tr>
							<th scope="row">${item.id_divisi}</th>
							<td><span class="badge badge-warning p-2">${item.nama_divisi}</span></td>
							<td><a href="#" id="btn-hapus" class="align-center badge badge-danger p-2" data-toggle="modal">Hapus</a></td>
						</tr>
					`);

					$('.divisi-option').append(`
						<option value="${item.nama_divisi}">${item.nama_divisi}</option>
					`);
				});
			}
			break;
	}
}

// Modal Scheme
function modalScheme(kategori, response){
	switch(kategori){
		case 'keluhan':
			if (response.status == 0) {
				console.log(response);
			}else{
				var complaint = response.data[0];
				var role = $('#role').text();
				
				$('#d-no-keluhan').val(complaint.no_keluhan);
				$('#d-tanggal').val(complaint.tgl_keluhan);
				$('#d-status').val(complaint.status);
				$('#d-nisn').val(complaint.nisn);
				$('#d-pelapor').val(complaint.pelapor);
				$('#d-email').val(complaint.email);
				$('#d-keluhan').val(complaint.isi_keluhan);
				$('#d-divisi').val(complaint.divisi);
				$('#d-waktu').val(complaint.hari);

				switch(complaint.status){
					case 'Baru':
						$('#btn-terima, #btn-hapus-keluhan').removeClass('d-none');
						$('#btn-kirim-feedback, #btn-proses, #btn-selesai').addClass('d-none');
						break;
					case 'Pending':
						if (role == 'Admin') {
							$('#btn-kirim-feedback').removeClass('d-none');
							$('#btn-kirim-feedback').prop('disabled', true);
							$('#btn-terima, #btn-hapus-keluhan, #btn-proses, #btn-selesai').addClass('d-none');
						}else if(role == 'Teknisi'){
							$('#btn-proses').removeClass('d-none');
							$('#btn-terima, #btn-hapus-keluhan, #btn-kirim-feedback, #btn-selesai').addClass('d-none');
							$('#d-waktu').prop('disabled', false);
							$('#d-waktu').addClass('is-valid');
						}
						break;
					case 'Proses':
						if (role == 'Admin') {
							$('#btn-kirim-feedback').removeClass('d-none');
							$('#btn-terima, #btn-hapus-keluhan, #btn-proses, #btn-selesai').addClass('d-none');
							if (complaint.feedback_1 == 1) {
								$('#btn-kirim-feedback').prop('disabled', true);
							}else{
								$('#btn-kirim-feedback').prop('disabled', false);
							}
						}else if(role == 'Teknisi'){
							console.log(role);
							$('#btn-selesai').removeClass('d-none');
							$('#btn-terima, #btn-hapus-keluhan, #btn-proses, #btn-kirim-feedback').addClass('d-none');
							$('#d-waktu').prop('disabled', true);
							$('#d-waktu').removeClass('is-valid');
						}
						break;
					case 'Selesai':
							$('#btn-terima, #btn-hapus-keluhan, #btn-kirim-feedback, #btn-proses, #btn-selesai').addClass('d-none');
						break;
				}
			}
			break;
		case 'teknisi':
			if (response.status == 0) {
				console.log(response);
			}else{
				var teknisi = response.data[0];
				
				$('#d-id-teknisi').val(teknisi.id_teknisi);
				$('#d-nama-teknisi').val(teknisi.nama_user);
				$('#d-username').val(teknisi.username);
				$('#d-password').val(teknisi.password);
				$('#d-divisi').val(teknisi.divisi);

				$('#btn-edit, #btn-hapus-teknisi').removeClass('d-none');
			}
			break;
	}
}

// Get complaint
async function getComplaint(kategori, url = null){
	try{
		var role = $('#role').text();

		switch(kategori){
			case 'default':
				switch(role){
					case 'Admin':
						var responseDefault = await AJAXGet(`${host}/${path}/api/rest_complaint?status=baru`);
						tableScheme('keluhan', responseDefault);
						break;
					case 'Teknisi':
						const divisi = $('#divisi').text().replace(/[^a-zA-Z ]/g, "");
						var responseDefault = await AJAXGet(`${host}/${path}/api/rest_complaint?status=proses&divisi=${divisi}`);
						tableScheme('keluhan', responseDefault);
						break;
				}
				break;
			case 'data':
				var response = await AJAXGet(url);
				return response;
				break;
			case 'table':
				var response = await AJAXGet(url);
				tableScheme('keluhan', response);
				return response;
				break;
			case 'modal':
				var response = await AJAXGet(url);
				modalScheme('keluhan', response);
				return response;
				break;
		}
	}catch(err){
		console.log(err);
	}
}

// Get Teknisi
async function getTeknisi(kategori, url = null){
	try{
		switch(kategori){
			case 'default':
				var response = await AJAXGet(`${host}/${path}/api/rest_teknisi`);
				tableScheme('teknisi', response);
				return response;
				break;
			case 'table':
				var response = await AJAXGet(url);
				tableScheme('teknisi', response);
				return response;
				break;
			case 'modal':
				var response = await AJAXGet(url);
				modalScheme('teknisi', response);
				return response;
				break;
		}
	}catch(err){
		console.log(err);
	}
}

// Get Divisi
async function getDivisi(){
	try{
		const url = `${host}/${path}/api/rest_divisi`;
		var response = await AJAXGet(url);
		tableScheme('divisi', response);
		return response
	}catch(err){
		console.log(err);
	}
}