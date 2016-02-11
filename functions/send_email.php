<?php if(!defined("DIR")){ exit(); }
class send_email{
	public $outMessage = 2; 
	function __construct(){

	}

	public function send($host,$user,$pass,$from,$fromname,$where_to_send,$subject,$message){
		// multiple recipients
		@require '_plugins/phpmailer/PHPMailerAutoload.php';
		try {
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $host;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $user;                 // SMTP username
		$mail->Password = $pass;                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->CharSet = 'UTF-8';
		$mail->setFrom($from, $fromname);
		$mail->addAddress($where_to_send);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		$mail->addReplyTo($from, $fromname);
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = strip_tags($message);
		$mail->SMTPDebug = 0;
		$mail->send();
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}
		
		return $this->outMessage;
	}

	function __destruct(){

	}
}
?>