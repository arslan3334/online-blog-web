<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;

require_once("database_connection/connection.php");

extract($_REQUEST);


  date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "check_email") {


// echo "$email";

$query="SELECT * FROM `user` WHERE user.`email`='{$email}'";

$result=mysqli_query($connection,$query);

// var_dump($result);
// die();

if ($result->num_rows>0) {

$data=mysqli_fetch_assoc($result);

$pass=$data['password'];

$firstname=$data['first_name'];
 $lastname=$data['last_name'];
	


require_once('PHPMailer/src/PHPMailer.php');
require 'PHPMailer/src/SMTP.php';

require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer();

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;


$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->SMTPAuth = true;

$mail->Username = 'dummyacc19233@gmail.com';


$mail->Password = 'zfhadzoooxsuhxhr';


$mail->setFrom('dummyacc19233@gmail.com', 'MY ACTION');



$mail->addAddress($email, ' ACTION');

$mail->Subject = "ACCOUNT ACTIVITY";

$mail->msgHTML(" DEAR USER ".$firstname." ".$lastname." YOUR PASSWORD THAT YOU FORGOT IS  ".$pass." 
 TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU ");

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;


} else {
    $msg ='<h1 style="color:green;">Message sent!</h1>';

   
}

echo" CONGRATULATIONS EMAIL HAS BEEN  SENT TO YOU WITH YOUR PASSWORD";




}

else{

	echo"INVALID EMAIL ";
}



}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "visitor_feedback"){

$query="INSERT INTO user_feedback (user_name,user_email,feedback,created_at,updated_at)
VALUES('{$user_name}','{$email}','{$feedback}','{$time}','{$time}')";

$result=mysqli_query($connection,$query);

if ($result) {
	

	echo "FEEDBACK GIVEN SUCCESSFULLY";
}




}



?>