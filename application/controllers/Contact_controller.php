<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('mail/PHPMailer.php');
require('mail/SMTP.php');
require('mail/Exception.php');
class Contact_controller extends CI_Controller {
	//use mail\PHPMailer\PHPMailer;
	
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$this->load->view('contact_view');
	}
	public function handleContact()
	{	
		
		//use mail\PHPMailer\PHPMailer;
		//require 'vendor/autoload.php';

		$name=$this->input->post('name');
		$title=$this->input->post('title');
		$email=$this->input->post('email');
		$content=$this->input->post('content');

		$mail = new PHPMailer;
		try {
		    //Server settings
		    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'vinhphac2@gmail.com';                     //SMTP username
		    $mail->Password   = 'otbetqjhdtwchbsq';                               //SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		    //Recipients
		    $mail->setFrom('xoilac@sport.vn', 'Admin xoilac.com');
		    $mail->addAddress($email, $name);     //Add a recipient
		    $mail->addAddress('1614117@hcmut.edu.vn');               //Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    // //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = $title;
		    $mail->Body    = 'Cảm ơn bạn đã liên hệ đến chúng tôi với nội dung:'.'<br>'. "<b>".$content."</b>". '<br>'.'Chúng tôi sẽ sớm liên lạc lại với bạn.';
		   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		    $mail->CharSet="UTF-8";
		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		
	}
}

/* End of file Contact_controller.php */
/* Location: ./application/controllers/Contact_controller.php */