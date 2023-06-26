<?php

session_start();
require_once("database_connection/connection.php");

extract($_REQUEST);
if (isset($login)) {

  $query="SELECT * FROM `user` WHERE email='{$email}' AND `password` ='{$login_password}'";

$result=mysqli_query($connection,$query);


if ($result->num_rows > 0) {

	$data = mysqli_fetch_assoc($result);


	// $id=$data['user_id'];

/*
$_SESSION['admin_name']=$data['first_name']." ".$data['last_name'];

$_SESSION['profile']=$data['user_image'];

$_SESSION['user_id']=$data['user_id'];*/




if ( $data['is_approved']=="Pending") {

  $error_msg.="<li>Your account is in pending state it is not approved yet </li>";

 header("location:index.php?msg=$error_msg");
  

}

elseif($data['is_approved']=="Rejected") {

  $error_msg.="<li>Your account is rejected kindly try again with a different email </li>";

  header("location:index.php?msg=$error_msg");
  
}


elseif($data['is_active']=="InActive") {

  $error_msg.="<li>Your account is DEACTIVATED kindly CONTACT US FOR FURTHER DETAIL </li>";

  header("location:index.php?msg=$error_msg");
  
}
else{

  $query2="SELECT * FROM `user` WHERE user_id='{$data['user_id']}'";

$result2=mysqli_query($connection,$query2);

if ($result2->num_rows>0) {
	
$data2=mysqli_fetch_assoc($result2);


if ($data2['role_id']=='1') {
	

$_SESSION['role_id']=$data2['role_id'];

	$_SESSION['admin_name']=$data2['first_name']." ".$data2['last_name'];

$_SESSION['profile']=$data2['user_image'];

$_SESSION['user_id']=$data2['user_id'];


 header("location:admin/admin.php?id=$id");

}

else{


if ($data2['role_id']==2) {

$_SESSION['role_id']=$data2['role_id'];


$_SESSION['user_name']=$data2['first_name']." ".$data2['last_name'];

$_SESSION['user_user_profile']=$data2['user_image'];

$_SESSION['user_user_id']=$data2['user_id'];


header("location:user/user.php?id=$id");


}

}

}


}







}

else{

$error_msg.="<li>INVALID EMAIL OR PASSWORD</li>";

header("location:index.php?msg=$error_msg");



}

	
}







?>