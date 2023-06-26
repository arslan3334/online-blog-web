
<?php

session_start();

require_once("database_connection/connection.php");


if (  isset($_SESSION['role_id']) && $_SESSION['role_id']=='1') {

header("location:admin/admin.php");

}
elseif ( isset($_SESSION['role_id']) &&  $_SESSION['role_id']=='2') {

header("location:user/user.php");

}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> FLYING BLOGS REGISTER</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-warning" >

	<!-- nav bar starte -->
<?php


 require_once("header.php");


?>

<center>

<div class="col-md-11 text-warning " > 

  <fieldset  style="margin-top:200px; "  >

  <legend class="text-warning bg-dark rounded-4 "  >  <h1> REGISTER HERE </h1></legend>
<ul class="text-dark" style="list-style: none;" >
  <h1>
<?php

if (isset($_GET['msg'])) {
  
echo $_GET['msg'];

}
?>
</h1>
</ul>






<form  style="padding: 50px;border: 20px solid;border-style: groove;"  class="row g-3 bg-dark mt-5 text-warning  "  action="register_process.php" method="POST"  enctype="multipart/form-data">

<h1 class="mb-3" >REGISTER FORM</h1>

<div class="row mb-4">
    <div class="col">
      <div class="form-outline">

        <span class="text-warning" style="display:none;" id="pattern_firstname">write first name like (Arslan)</span>

        <input type="text" id="firstname"   name="firstname" required="" class="form-control" />
        <label class="form-label"  for="firstname">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">

   <span class="text-warning" style="display:none;" id="pattern_lastname">write last name like (Ahmed)</span>
        <input type="text" id="lastname"    name="lastname"  class="form-control" />
        <label class="form-label"  for="lastname">Last name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">

<span class="text-warning" style="display: none;" id="pattern_password"  >

At least one lowercase letter 
At least one uppercase letter 
At least one digit 
At least one special character 
Minimum length of 8 characters 

</span>

    <input type="text"   id="register_password" name="register_password" class="form-control" />
    <label class="form-label" for="register_password">PASSWORD</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">



<span class="text-warning" style="display: none;" id="pattern_confirm_password">confirm-password should not be same as password</span>

    <input type="text"    id="confirm_password"  name="confirm_password"  class="form-control" />
    <label class="form-label" for="confirm_password">CONFIRM PASSWORD</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">

<span class="text-warning" style="display:none;" id="pattern_email">write  email like (arsal123@gmail.com)</span>

    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="email">Email</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">


<span class="text-warning" style="display: none;" id="empty-dob"  >Date-of-birth should not be empty</span>

    <input type="date" id="date_of_birth" required="" name="date_of_birth" class="form-control" />
    <label class="form-label" for="date_of_birth">DATE OF BIRTH</label>
  </div>


<div class="form-outline mb-4">
    
<span class="text-warning" style="display: none;" id="empty-gender"  >gender should not be empty</span>

  <label  style="margin-left: 10px;" >*Gender</label>
  <br>
   <label>
   Male
</label>
   <input type="radio" id="gender_male" class="gender"  value="male"  name="gender">
   
   <label>  Female
</label>
    <input type="radio" id="gender_female"  class="gender" value="female" name="gender">
  <label>
<!-- 
    <label class="form-label" for="form6Example9">GENDER</label> -->
  </div>



 <div class="form-outline mb-4">


    <!-- <input type="text" name="confirm_password" id="form6Example10" class="form-control" /> -->

<span class="text-warning" style="display: none;" id="empty-image"  >IMAGE SHOULD NOT BE EMPTY</span>
<input  type="file" name="img"  id="image"  accept="image/*" class="form-control" required >



    <label class="form-label" for="image">PROFILE IMAGE</label>
  </div>


  <!-- Message input -->
  <div class="form-outline mb-4">
<span class="text-warning" style="display: none;" id="empty-address"  >Address should not be empty</span>

    <textarea  required="" class="form-control" name="address" id="address" rows="4"></textarea>
    <label class="form-label" for="address">ADDRESS</label>
  </div>


<div class="form-outline mb-4">
  <!-- 
<input  type="file" name="img" id="form6Example10" class="form-control" required > -->


<span class="text-warning" style="display: none;" id="empty-role"  >Role should not be empty</span>

<select  required="" name="role"id="role"  class="form-control"  >
    <option value="">--SELECT ROLE--</option>
<option value="1" >Admin</option>
<option value="2" >User</option>

  </select>

    <label class="form-label" for="role">USER ROLE</label>





  </div>

  <input type="submit"  onclick = "return register_validation()"  name="register" value="REGISTER" class="bg-warning text-dark rounded my-5 " >


 
</form><!-- 
</fieldset> -->

</div>

</center>
</div>









<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- front end validations start -->


<script type="text/javascript">
  
function register_validation(){

  var flag=true;

var firstname_pattern=/^[A-Z]{1}[a-z0-9]{2,}$/;
var lastname_pattern=/^[A-Z]{1}[a-z0-9]{2,}$/;

var email_pattern=/^[a-zA-Z0-9]{3,}[@][a-z]{3,}[.][a-z]{3,}$/;

/*var password_pattern=/^[a-zA-Z0-9!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]{8,}$/;*/

var password_pattern=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  var firstname=document.getElementById('firstname').value;

  var lastname=document.getElementById('lastname').value;

  var email=document.getElementById('email').value;

  var password=document.getElementById('register_password').value;

  var confirm_password=document.getElementById('confirm_password').value;
  
  var address=document.getElementById('address').value;

  var role=document.getElementById('role').value;

  var date_of_birth=document.getElementById('date_of_birth').value;

  var profile=document.getElementById('image');

  var male=document.getElementById('gender_male');

  var female=document.getElementById('gender_female');

/*
  var other=document.getElementById('gender_other');*/
  var gender = null;


 if(male.checked) gender=male.value;
  if(female.checked) gender=female.value;
   /*if(other.checked) gender=other.value;*/

  if (firstname_pattern.test(firstname)) {
    
    document.getElementById("pattern_firstname").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("pattern_firstname").style.display="block";
  }







if (lastname_pattern.test(lastname)) {
    
    document.getElementById("pattern_lastname").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("pattern_lastname").style.display="block";
  }

if (email_pattern.test(email)) {
    
    document.getElementById("pattern_email").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("pattern_email").style.display="block";
  }




if (password_pattern.test(password)) {
    
    document.getElementById("pattern_password").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("pattern_password").style.display="block";
  }




/*if (address=="") {
    
    document.getElementById("empty-address").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("empty-address").style.display="block";
  }


if (role=="") {
    
    document.getElementById("empty-role").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("empty-role").style.display="block";
  }*/



/*if (profile=='') {
    
    document.getElementById("empty-image").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("empty-image").style.display="block";
  }
*/




if (confirm_password == password ) {
    
    document.getElementById("pattern_confirm_password").style.display ="none";
  }
  else{
    flag=false;
    document.getElementById("pattern_confirm_password").style.display="block";
  }


if (!gender) {
  flag=false;
document.getElementById("empty-gender").style.display="block";

}
else{

if (gender) {
  document.getElementById("empty-gender").style.display="none";
}
  
}


  if(flag) {
    return true;
  }
  else {
    return false;
  }

}

</script>



<!-- front end validations start end -->


<!-- footer start -->

<?php
 require_once("footer.php");
?>
  
<!-- footer end -->

</body>
</html>