    <?php
require './phpmailer/PHPMailerAutoload.php';

if(isset($_POST['submit'])) {

	$from = $_POST['email'];
	$name = $_POST['author'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	//echo $from;
	// echo "---";
	// echo $name;
	// echo "---";
	// echo $subject;
	// echo "---";
	// echo $message;

	$msgsubject = "Thank You";
	$body = "Thank You for contacting, I will get back to you in one working day. <br> <br>  Regards,</br> <b> Ankush Arun Kawanpure </b> <br>
	 Rochester Institute of Technology,<br> Rochester, NY. <br> <a href=\"ankushkawanpure.com\"> ankushkawanpure.com </a>";
	$plainbody = "Thank You for contacting, I will get back to you in one working day. Regards, Ankush Arun Kawanpure 
	 Rochester Institute of Technology, Rochester, NY. ankushkawanpure.com";

	echo $body;
	sendmail($from, $name, $msgsubject, $body, $plainbody);
}

function sendmail($to, $name, $msgsubject, $body, $plainbody) {

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'aak24792@gmail.com';                 // SMTP username
	$mail->Password = 'Scanapp@24';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('aak24792@gmail.com', 'Ankush Kawanpure');
	
	$mail->addAddress($to, $name);     // Add a recipient
	
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('aak24792@gmail.com', 'ankushkawanpure.com');
	//$mail->addCC('aak24792@gmail.com');
	$mail->addBCC('aak24792@gmail.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $msgsubject; //'Here is the subject';
	$mail->Body    = $body; //'This is the HTML message body <b>in bold!</b>';
	$mail->AltBody = $plainbody; //'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    // echo 'Message could not be sent.';
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	    header("Location: index.html#contact");
        exit;
	} else {
	    // echo 'Message has been sent';
	    header("Location: index.html#contact");
	    exit;
	}

}




 ?>