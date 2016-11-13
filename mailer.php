<?php

   require 'vendor/autoload.php';
   date_default_timezone_set('Europe/Belgrade');

   $bodyMail = '';
   $subjectEmail = '';
   $emailFrom = '';
   $passwordMail = "nitarilind";
   $mailSent = "Mail has been sent";

   if($_POST['mail'] == "booking"){

		   $bookingBody = '<label>Name </label>'.$_POST['booking_name'].'<br>'.
							'<label>Attending </label>'.$_POST['booking_attending'].'<br>'.
							'<label>Pets </label>'.$_POST['booking_pets'].'<br>'.
							'<label>Address </label>'.$_POST['booking_address'].'<br>'.
							'<label>First Date </label>'.$_POST['booking_fdate'].'<br>'.
							'<label>Start Date </label>'.$_POST['booking_sdate'].'<br>'.
							'<label>Package </label>'.$_POST['booking_dropDown'].'<br>'.
							'<label>Description </label>'.$_POST['booking_textarea'].'<br>';

			$bodyMail = $bookingBody;
			$subjectEmail = 'Email from Event Booking Form';
			//$emailFrom = $_POST['booking_email'];

	}else if($_POST['mail'] == "school"){
			$schoolBody = '<label>Name </label>'.$_POST['school_name'].'<br>'.
							'<label>School’s Name </label>'.$_POST['school_age'].'<br>'.
							'<label>Age of Children </label>'.$_POST['school_location'].'<br>'.
							'<label>Event Location </label>'.$_POST['school_address'].'<br>'.
							'<label>Indoor/ Outdoor </label>'.$_POST['school_inout'].'<br>'.
							'<label>Contact Details </label>'.$_POST['school_contact'].'<br>'.
							'<label>Package </label>'.$_POST['school_sdate'].'<br>'.
							'<label>Special Requirments </label>'.$_POST['school_special'].'<br>'.
							'<label>Description </label>'.$_POST['school_area1'].'<br>'.
							'<label>Description </label>'.$_POST['school_area2'].'<br>';

			$bodyMail = $schoolBody;
			$subjectEmail = 'Email - School Booking Form';

	 		//$emailFrom = $_POST['school_mail'];

	}else if($_POST['mail'] == "petParties"){
			$partiesBody = '<label>Name </label>'.$_POST['pet_name'].'<br>'.
							'<label>People Attending </label>'.$_POST['pet_attending'].'<br>'.
							'<label>Pets </label>'.$_POST['pet_pets'].'<br>'.
							'<label>Address </label>'.$_POST['pet_address'].'<br>'.
							'<label>Indoor/Outdoor </label>'.$_POST['pet_inout'].'<br>'.
							'<label>Select Date </label>'.$_POST['pet_sdate'].'<br>'.
							'<label>Start Date </label>'.$_POST['pet_fdate'].'<br>'.
							'<label>Package </label>'.$_POST['pet_dropDown'].'<br>';

			$bodyMail = $partiesBody;
			$subjectEmail = 'Email - Petting From Parties';
			//$emailFrom = $_POST['pet_mail'];

	}else if($_POST['mail'] == "appointment"){
			$appointmentBody ='<label>Name </label>'.$_POST['appointment_name'].'<br>'.
							'<label>Start Date </label>'.$_POST['appointment_date'].'<br>'.
							'<label>Description </label>'.$_POST['appointment_text'].'<br>';

			$bodyMail = $appointmentBody;
			$subjectEmail = 'Email - Make an appointment';
			//$emailFrom = $_POST['appointment_mail'];

	}else if($_POST['mail'] == "modal"){
			$modalPettingBody = '<label>Name </label>'.$_POST['modal_name'].'<br>'.
							'<label>People Attending </label>'.$_POST['modal_attending'].'<br>'.
							'<label>Pets </label>'.$_POST['modal_pets'].'<br>'.
							'<label>Address </label>'.$_POST['modal_address'].'<br>'.
							'<label>Indoor/ Outdoor </label>'.$_POST['modal_inout'].'<br>'.
							'<label>Select Date </label>'.$_POST['modal_date1'].'<br>'.
							'<label>Start Date </label>'.$_POST['modal_date2'].'<br>'.
							'<label>Select Package </label>'.$_POST['modal_dropDown'].'<br>'.
							'<label>Animals we bring to school </label>'.$_POST['modal_area1'].'<br>'.
							'<label>Face Painter </label>'.$_POST['modal_area2'].'<br>';

			$bodyMail = $modalPettingBody;
			$subjectEmail = 'Email -  Booking Form Petting Form Partie';

	 		//$emailFrom = $_POST['school_mail'];
		}


// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('rilindp@gmail.com')
  ->setPassword($passwordMail)
  ;

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance($subjectEmail)
  ->setFrom(array('rilindp@gmail.com' => ''))
  ->setTo(array('sacha@emiratesgraphic.com' => 'Sacha Christe'))
  ->setBody($bodyMail, 'text/html');

// Send the message
$result = $mailer->send($message);
echo $mailSent;

?>