<?php
session_start();


/*if (isset($_SESSION['user_user_id'])&&$_SESSION['user_user_id']=2) {


unset($_SESSION['user_user_id']);

unset($_SESSION['role_id']);

$error_msg.="<li>LOGOUT SUCESSFULL</li>";

 header("location:../index.php?msg=$error_msg");


}*/




session_destroy();

$error_msg.="<li>LOGOUT SUCESSFULL</li>";

 header("location:../index.php?msg=$error_msg");






?>