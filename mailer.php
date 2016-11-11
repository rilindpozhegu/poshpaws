<?php

   require 'vendor/autoload.php';
   date_default_timezone_set('Europe/Belgrade');

   $bodyMail = '';

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
	}else if($_POST['mail'] == "school"){
		$schoolBody = '<label>Name </label>'.$_POST['school_name'].'<br>'.
							'<label>School’s Name </label>'.$_POST['school_age'].'<br>'.
							'<label>Age of Children </label>'.$_POST['school_location'].'<br>'.
							'<label>Event Location </label>'.$_POST['school_address'].'<br>'.
							'<label>Indoor/ Outdoor </label>'.$_POST['school_inout'].'<br>'.
							'<label>Contact Details </label>'.$_POST['school_contact'].'<br>'.
							'<label>Package </label>'.$_POST['school_sdate'].'<br>'.
							'<label>Description </label>'.$_POST['school_special'].'<br>'.
							'<label>Description </label>'.$_POST['school_area1'].'<br>'.
							'<label>Description </label>'.$_POST['school_area2'].'<br>';

							$bodyMail = $schoolBody;
	}else if($_POST['mail'] == "petParties"){
		$partiesBody = '<label>Name </label>'.$_POST['school_name'].'<br>'.
							'<label>Name </label>'.$_POST['pet_name'].'<br>'.
							'<label>People Attending </label>'.$_POST['pet_attending'].'<br>'.
							'<label>Pets </label>'.$_POST['pet_pets'].'<br>'.
							'<label>Address </label>'.$_POST['pet_address'].'<br>'.
							'<label>Indoor/Outdoor </label>'.$_POST['pet_inout'].'<br>'.
							'<label>Select Date </label>'.$_POST['pet_sdate'].'<br>'.
							'<label>Start Date </label>'.$_POST['pet_fdate'].'<br>'.
							'<label>Package </label>'.$_POST['pet_dropDown'].'<br>';

							$bodyMail = $partiesBody;
	}

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('blinizeka@gmail.com')
  ->setPassword('south777')
  ;

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Hello from Emirates Graphics')
  ->setFrom(array('blinizeka@gmail.com' => 'Blin Zeka'))
  ->setTo(array('rilindp@gmail.com' => 'Me'))
  ->setBody($bodyMail, 'text/html');

// Send the message
$result = $mailer->send($message);

?>