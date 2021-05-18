<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit']) && isset($_POST['email'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $department = $_POST["department"];
    $doctor = $_POST["doctor"];
    $message = $_POST["message"];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();


    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //SMTP Settings
    $mail->isSMTP();
    // $mail->SMTPDebug = 3;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "starinfosol954@gmail.com";
    $mail->Password = 'Starinfosol@0954';
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; //465
    // $mail->Port = 465;
    $mail->SMTPSecure = "tls"; //ssl
    // $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->AddReplyTo($email, $name);
    $mail->addAddress('starinfosol954@gmail.com');
    // $mail->Subject = ("$email ($subject)");
    $message = "<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<table>
				<tr>
					<th>Name :</th>
					<td>" . $name . "</td>
				</tr>
				<tr>
					<th>Email :</th>
					<td>" . $email . "</td>
				</tr>
				<tr>
					<th>Contact no :</th>
					<td>" . $phone . "</td>
				</tr>
				<tr>
					<th>Date of Booking :</th>
					<td>" . $date . "</td>
				</tr>
				<tr>
					<th>Department :</th>
					<td>" . $department . "</td>
				</tr>
				<tr>
					<th>Doctor :</th>
					<td>" . $doctor . "</td>
				</tr>
				<tr>
					<th>Message</th>
					<td>" . $message . "</td>
				</tr>
			</table>
		</body>
		</html>";

    $mail->Body = $message;

    if ($mail->send()) {
        $status = "Hello : $name, Your appointment is booked. We will contact you as soon as possible.";
        // $response = "Email is sent!";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }

    if (empty($name) || empty($email) || empty($phone)) {
        
        echo "Please fill all the fields";
    }
    else
    {
        echo "<script type= 'text/javascript'>alert('Your appointment has booked Successfully');
        </script>";
    }

    echo "$status";
    // header("Location: http://www.starinfosol.com");
    // exit();
    // exit(json_encode(array("status" => $status, "response" => $response)));
}
?>