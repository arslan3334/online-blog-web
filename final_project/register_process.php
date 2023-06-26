<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;

require_once("database_connection/connection.php");

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');

// echo"<pre>";
// print_r($_FILES);
//  print_r($_POST);
// echo"</pre>";

extract($_FILES);
extract($_REQUEST);


    $realname = $img['name'];
		 
		 $temp_name = $img['tmp_name'];
		
		$servername = time()."_".$realname;

	


	$profile_path="user_profiles/".$servername;

if (isset($register)) {

$query_check="SELECT *FROM `user` WHERE user.`email`= '{$email}'";

$result=mysqli_query($connection,$query_check);

if ($result->num_rows>0) {
	

$error_msg.="<li>email is already taken </li>";

header("location:register.php?msg=$error_msg");
}

else{

move_uploaded_file($temp_name, "user_profiles/".$servername);

require_once("FPDF/fpdf.php");


$error_msg=null;


 $firstname_pattern="/^[A-Z]{1}[a-z0-9]{2,}$/";
 $lastname_pattern="/^[A-Z]{1}[a-z0-9]{2,}$/";

 $email_pattern="/^[a-zA-Z0-9]{3,}[@][a-z]{3,}[.][a-z]{3,}$/";

$password_pattern = "/^[a-zA-Z0-9!@#$%^&*()_+\-=;:|,.<>\/?]{8,}$/";

// first patter start







if ($firstname=="") {
	  
$error_msg.="<li>enter firstname it is required</li>";

header("location:register.php?msg=$error_msg");
	
}
else{

	 
if (!preg_match($firstname_pattern,$firstname)) {
$error_msg.="<li>enter firstname like Arsal</li>";

header("location:register.php?msg=$error_msg");

}

}

// first pattern end


if ($lastname=="") {
	  
$error_msg.="<li>enter Lastname it is required</li>";

header("location:register.php?msg=$error_msg");
	
}
else{

	 
if (!preg_match($lastname_pattern,$lastname)) {
$error_msg.="<li>enter Lastname like Nisar</li>";

header("location:register.php?msg=$error_msg");

}

}
// second pattern end

if ($email=="") {
	  
$error_msg.="<li>enter email it is required</li>";

header("location:register.php?msg=$error_msg");
	
}
else{

	 
if (!preg_match($email_pattern,$email)) {
$error_msg.="<li>enter EMAIL like (arsal123@gmail.com) </li>";

header("location:register.php?msg=$error_msg");

}

}
// third pattern end
if ($register_password=="") {
	  
$error_msg.="<li>enter password it is required</li>";

header("location:register.php?msg=$error_msg");
	
}
else{

	 
if (!preg_match($password_pattern,$register_password)) {
$error_msg.="<li>enter password SHOULD BE AT LEAST 8 CHARACTER</li>";

header("location:register.php?msg=$error_msg");

}

}

// fourth pattern end

if ($confirm_password=="") {
	  
$error_msg.="<li>enter CONFIRM password it is required</li>";

header("location:register.php?msg=$error_msg");
	
}
else{

	 
if ($confirm_password != $register_password ) {
$error_msg.="<li>CONFIRM PASSWORD AND PASSWORD DOES NOT MATCH</li>";

header("location:register.php?msg=$error_msg");

}

}
// fifth pattern end
if ($date_of_birth =="") {
	$error_msg.="<li>DATE OF BIRTH IS REQUIRED</li>";

header("location:register.php?msg=$error_msg");


}
// sixth pattern end

if (!isset($gender)) {
$error_msg.="<li>GENDER IS REQUIRED</li>";

header("location:register.php?msg=$error_msg");


}

// seventh pattern end

if ($address=="") {
$error_msg.="<li>ADDRESS IS REQUIRED</li>";

header("location:register.php?msg=$error_msg");


}
// eighth pattern end

if ($role=="") {
$error_msg.="<li>ROLE IS REQUIRED</li>";

header("location:register.php?msg=$error_msg");


}





// all pattern end



// $query="INSERT INTO 
// `user` 
// (role_id,first_name,last_name,email,`password`,gender,date_of_birth,user_image,address,created_at,updated_at)
// VALUES ('{$role}','{$firstname}','{$lastname}','{$email}','{register_password}','{$gender}','{$date_of_birth}','{$img}','{$address}','{$time}','{$time}')";

// $result=mysqli_query($connection,$query);



$query="INSERT INTO `user`(role_id,first_name,last_name,email,`password`,gender,date_of_birth,user_image,address,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,?,?,?) ";

$stmt=mysqli_prepare($connection,$query);

mysqli_stmt_bind_param($stmt,"issssssssss",$role,$firstname,$lastname,$email,$register_password,$gender,$date_of_birth,$profile_path,$address,$time,$time);

$result= mysqli_stmt_execute($stmt);



// database query end
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



$mail->addAddress($email, 'MY ACTION');

$mail->Subject = "ACCOUNT ACTIVITY";

$mail->msgHTML(" DEAR CUSTOMER ".$firstname." ".$lastname." YOUR ACCOUNT IS IN PENDING STATE WAIT TILL ADMIN APPROVE IT YOU WILL GET A EMAIL AS SOON AS ANY ACTION IS TAKEN BY ADMIN  TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU ");

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;


} else {
    $msg ='<h1 style="color:green;">Message sent!</h1>';

   
}





// mailing code end

// report generation start

if ($role==2) {
	$role="user";
}

else{

if ($role==1) {
	$role="admin";
}

}

$report = new FPDF();

$report->AddPage("P", "Legal", 0);
 
 
$report->SetFont("Times","B",10);

$report->SetFillColor(255, 255, 255);

$report->Cell(500,10,"FIRST NAME :".$firstname,0,2,"L",true);
$report->Cell(100,10,"LAST NAME :".$lastname,0,2,"L",true);

$report->Cell(100,10,"EMIAL :".$email,0,2,"L",true);
$report->Cell(100,10,"PASSWORD :".$register_password,0,2,"L",true);

$report->Cell(100,10,"DATE OF BIRTH :".$date_of_birth,0,2,"L",true);
$report->Cell(100,10,"GENDER :".$gender,0,2,"L",true);
$report->Cell(100,10,"ADDRESS :".$address,0,2,"L",true);
$report->Cell(100,10,"ROLE :".$role,0,2,"L",true);

$report->Output("I", "USERDATA");
// report generation end

}
}



?>