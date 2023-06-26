<?php
session_start();


if (isset($_SESSION['user_user_id'])) {



if ($_SESSION['role_id']=='1') {

header("location:../admin/admin.php");

}


  require_once("../admin/oop_work/database_setting.php");
  require_once("../admin/oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');

$user_id=$_SESSION['user_user_id'];




?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UPDATE USER</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

<link href="sample/../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="sample/sidebars.css" rel="stylesheet">



<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>



</head>
<body class="bg-warning" >

	<!-- header -->
<div class="container-fluid">
<div class=" row  " >
	
<div class="col-3 bg-dark  " >

<?php    


require_once("require/side-bar.php");

?>

<!-- side nave end dash board -->
</div>



<!-- horizintal nav start -->

<div class="col-9" >
<nav class="navbar navbar-expand-lg bg-dark  ">
  <div class="container-fluid  ">

    <a class="navbar-brand  text-warning " href="#">   <img src="../<?php echo $_SESSION['user_user_profile'] ?>" style="height: 80px;width:80px " > WELCOME  <?php echo  $_SESSION['user_name'];?></a>
   
  </div>
</nav>

<center>


<div id="msg" style="display: none;" class="text-dark  my-5" >
  	

  </div>


<div class="col-md-12 text-warning bg-dark mt-5 " style=" border: 8px solid; ; padding: 40px;border-style: groove;"   > 

<h1>CREATE USER HERE</h1>


<!-- check form start -->
<ul class="text-dark" >
<?php

if (isset($_GET['msg'])) {
  
echo $_GET['msg'];

}
?>
</ul>
<?php

$update_user=$database->select_user_to_update($user_id);

if ($update_user->num_rows>0) {



$update_user_data=mysqli_fetch_assoc($update_user);





}

?>



<!-- check form end -->
<div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" value="<?php echo $update_user_data['first_name'];  ?>"  required name="first_name" class="form-control" />
        <label class="form-label"  for="form6Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2"  value="<?php echo $update_user_data['last_name'];  ?>"  name="last_name" class="form-control" />
        <label class="form-label"  for="form6Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text"   value="<?php echo $update_user_data['password'];  ?>" name="create_password" id="form6Example3" class="form-control" />
    <label class="form-label" for="form6Example3">PASSWORD</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" value="<?php  echo $update_user_data['password'] ?>"  name="confirm_password" id="form6Example4" class="form-control" />
    <label class="form-label" for="form6Example4">CONFIRM PASSWORD</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email"  value="<?php echo $update_user_data['email'];  ?>" name="email" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">Email</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="date" value="<?php echo $update_user_data['date_of_birth'] ?>"  name="date_of_birth" id="form6Example6" class="form-control" />
    <label class="form-label" for="form6Example6">DATE OF BIRTH</label>
  </div>


<div class="form-outline mb-4">
    

 <label>
   Male
</label>

<?php  

if ($update_user_data['gender']=='Male') {
  

?>
   <input type="radio" value="Male" id="male" name="gender" checked="" >
<?php

}

else{

?>

   <input type="radio" value="Male" id="male" name="gender">

<?php


}

    ?>
<!--    <input type="radio" value="Male" id="male" name="gender"> -->
   
   <label>  Female
</label>

<?php

if ($update_user_data['gender']=='Female') {

?>

    <input type="radio" value="Female" id="female" name="gender" checked="">

<?php


  
}
else{


?>
    
    <input type="radio" value="Female" id="female" name="gender">

<?php

}


?><!-- 
    <input type="radio" value="Female" id="female" name="gender"> -->
<!-- 
    <label class="form-label" for="form6Example9">GENDER</label> -->
  </div>



 <div class="form-outline mb-4">
    <!-- <input type="text" name="confirm_password" id="form6Example10" class="form-control" /> -->
<input  type="file" name="img"   id="form6Example10" class="form-control" required >

    <label class="form-label" for="form6Example10">PROFILE IMAGE</label>
  </div>


  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea name="address"   class="form-control" id="form6Example7" rows="4">
      <?php  echo $update_user_data['address'] ?>

    </textarea>
    <label class="form-label" for="form6Example7">ADDRESS</label>
  </div>



  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
<!-- 
     <input type="submit" onclick="add_user()" name="create" value="CREATE" class="btn btn-dark btn-block mb-4 " > -->

<button onclick="update_user()" class="btn btn-warning btn-block mb-4 " > UPDATE </button>
  </div>




  
<!-- real form start -->

  
</div>

</center>



<!-- form end -->



</div>

<!-- horizintal nav end -->

<!-- register user srart -->



<!-- register user end -->



</div>	







</div>
</div>
<!-- header end -->




<!-- form end -->



<!-- footer start -->

<div class="container-fluid" >
  
<div class="row  bg-dark text-warning  mt-5 "  id="contact_us"   >  


<?php    


require_once("require/footer.php");

?>

  </div>

</div>
  

 




<!-- footer end -->


<script src="sample/../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sample/sidebars.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript">
  





function update_user() {
  var first_name = document.getElementById('form6Example1').value;
  var last_name = document.getElementById('form6Example2').value;
  var create_password = document.getElementById('form6Example3').value;
  var confirm_password = document.getElementById('form6Example4').value;
  var email = document.getElementById('form6Example5').value;
  var birth = document.getElementById('form6Example6').value;
  var gender = document.getElementById('male').checked ? 'Male' : 'Female';
  var address = document.getElementById('form6Example7').value;
  /*var role = document.getElementById('form6Example11').value;*/

  var fd = new FormData();

  if (document.getElementById('form6Example10').files.length === 0) {
    var bg_img = '';
fd.append('action', 'update_user_without_image');

  } else {
    var bg_img = document.getElementById('form6Example10').files[0];
    fd.append('img', bg_img);

    fd.append('action', 'update_user_with_image');
  }

  

 if (create_password!==confirm_password) {

alert('CREATE PASSWORD AND CONFIRM PASSWORD DOESNOT MATCH');
    return;

}


  fd.append('first_name', first_name);
  fd.append('last_name', last_name);
  fd.append('email', email);
  fd.append('create_password', create_password);
  fd.append('confirm_password', confirm_password);
  fd.append('birth', birth);
  fd.append('gender', gender);
  fd.append('address', address);
  /*fd.append('role', role);*/
  /*fd.append('action', 'create_user');*/

  var obj = new XMLHttpRequest();

  obj.onreadystatechange = function () {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;

      text=obj.responseText;

      alert(text);
    }
  };

  obj.open('POST', 'ajax.php');
  obj.send(fd);
}





</script>


</body>
</html>


<?php

}

else{
$error_msg.="<li>PLZ LOGIN FIRST ...! </li>";

 header("location:../index.php?msg=$error_msg");

}




?>