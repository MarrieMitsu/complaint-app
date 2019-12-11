$(document).ready(function(){
	// Run Function
	getDivisi();

	// Login
	$('#form-login').on('submit', async function(e){
		e.preventDefault();
		const username = $('#username').val();
		const password = $('#password').val();
		const data = {username: username, password:password};

		$('small').text('');

		try{
			const url = `${host}/${path}/login/loginauth`;
			var response = await AJAXPost(url, data);
			
			if (response.status == 0) {
				$('#' + response.id).next().text(response.res);
			}else{
				if (response.role == 'Admin') {
					window.location.href = `${host}/${path}/admin`;
				}else if (response.role == 'Teknisi') {
					window.location.href = `${host}/${path}/teknisi`;
				}
			}
		}catch(err){
			console.log(err);
		}
	});

	// Post Complaint
	$('#form-keluhan').on('submit', async function(e){
		e.preventDefault();
		$('small').text('');

		const nisn = $('#nisn').val();
		const pelapor = $('#pelapor').val();
		const email = $('#email').val();
		const keluhan = $('#keluhan').val();
		const divisi = $('#divisi option:selected').val();

		if (isNaN(nisn)) {
			$('#nisn').next().text('NISN harus angka');
		}else if(/\d/.test(pelapor)){
			$('#pelapor').next().text('Nama tidak boleh mengandung angka');
		}else{
			try{
				const url = `${host}/${path}/api/rest_complaint`;
				const data = {nisn: nisn, pelapor: pelapor, email: email, keluhan: keluhan, divisi:divisi}
				var response = await AJAXPost(url, data);
				loader('load');

				if (response.status == 0) {
					loader('remove');
					Swal.fire({
						title: 'Gagal',
						type: 'error'
					});
				}else{
					$('#form-keluhan').trigger('reset');
					loader('remove');
					Swal.fire({
						title: 'Berhasil',
						type: 'success'
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
		}
	});
	
});