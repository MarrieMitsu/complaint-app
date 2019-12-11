<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Helper asset_url()
 * ------------------------------------------------------------------------
 * @accesspublic
 * @param    string
 * @return    string
 */

	if ( ! function_exists('asset'))
	{
		function asset($uri)
		{
			$_ci =& get_instance();
			return $_ci->config->base_url('assets/'.$uri);
		}
	}

	// Is Login
	function isLogin($param){
		$_ci =& get_instance();

		$user = $_ci->session->userdata();

		switch ($param) {
			case 'unset':
				if ($user['logged_in'] == FALSE) {
					redirect(base_url('login'));
				}
				break;
			case 'set':
				if (isset($user['logged_in']) == TRUE && isset($user['role']) == 'Admin') {
					redirect(base_url('admin'));
				}else if(isset($user['logged_in']) == TRUE && isset($user['role']) == 'Teknisi'){
					redirect(base_url('teknisi'));
				}
				break;
		}

			
	}

	// Send Email
	function sendEmail($email, $pelapor, $tanggal, $keluhan, $feedback){
		require_once "vendor/phpmailer/phpmailer/src/Exception.php";
		require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
		require_once "vendor/phpmailer/phpmailer/src/SMTP.php";

		$mail = new PHPMailer;

		try {
			$mail->SMTPDebug = 0;
			$mail->SMTPOptions = [
			 	'ssl' => [
			 		'verify_peer' => false,
			 		'verify_peer_name' => false,
			 		'allow_self_signed' => true
			 	]
			 ];
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = TRUE;
			$mail->Username = 'marriemitsu@gmail.com';
			$mail->Password = '9110CRA#g32V';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->setFrom('telvin@gmail.com', 'Telvin');
			// $mail->AddReplyTo('telvin@gmail.com', 'Telvin');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject = 'Laporan keluhan';
			$mail->Body = "
				<p>Hi <b>". $pelapor ."</b>, keluhan anda yang berisi :</p> 
				<p><b>\"". $keluhan ."\"</b></p>
				<p>Yang dikirim pada <b>". $tanggal ."</b> ". $feedback ."</p>";

			// Send mail
			$mail->send();
			$status = ['status' => 1, 'res' => 'Terkirim!'];
		}catch (Exception $e) {
			$status =['status' => 0, 'res' => $e];
		}
		
		return $status;
	}

?>