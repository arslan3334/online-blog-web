
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
	<title> FLYING BLOGS FORGOT PASSWORD</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">




</head>
<body class="bg-warning" >

	<!-- nav bar starte -->
<?php


 require_once("header.php");


?>

<center>



<div class="col-md-11 text-warning   " style="margin-top: 300px;margin-bottom: 400px" > 

  <fieldset  class="bg-dark text-warning"  style="padding: 200px">
    
    <div  style="display: none;" class="text-warning" id="msg"></div>
<legend> ENTER EMAIL TO GET PASSWORD</legend>


<div class="input-group mb-3">


  <input type="text" id="email" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">




  <button class="btn btn-outlin-secondary text-dark bg-warning " type="button" id="button-addon2" onclick="check_email()"  style="width: 200px;height: 60px">SUBMIT</button>
</div>


  </fieldset>


</div>

</center>
</div>









<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- front end validations start -->



<!-- front end validations start end -->


<!-- footer start -->

<?php
 require_once("footer.php");
?>
  
<!-- footer end -->


<script type="text/javascript">
  
function check_email(){


var email = document.getElementById('email').value


  var fd = new FormData();
  fd.append('action', 'check_email');
fd.append('email', email);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
 document.getElementById('msg').innerHTML = obj.responseText;

text=obj.responseText;
alert(text);

    }
  };

  obj.open("POST", "ajax.php");


  obj.send(fd);
}


</script>

</body>
</html>