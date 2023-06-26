<?php
session_start();


if (isset($_SESSION['user_id'])) {


$admin_id=$_SESSION['user_id'];

  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREATE USER</title>
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

require_once("main-side-bar/side bar.php");


?>

<!-- side nave end dash board -->
</div>



<!-- horizintal nav start -->

<div class="col-9" >
<nav class="navbar navbar-expand-lg bg-dark  ">
  <div class="container-fluid  ">

    <a class="navbar-brand  text-warning " href="#">   <img src="../<?php echo $_SESSION['profile']; ?>" style="height: 80px;width:80px " > WELCOME  <?php echo  $_SESSION['admin_name'];?></a>
   
<button class="rounded-pill bg-warning text-dark" onclick="show_admin_edit_panel(<?php echo $admin_id;  ?>)" >UPDATE ACCOUNT</button>

  </div>
</nav>

<center>


<div id="msg" style="display: none;" class="text-dark  my-5" >
  	

  </div>


  <div id="admin_edit_panel" >
  	
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
<!-- 
<form class="text-dark" action="create_user_admin_process.php" method="POST" enctype="multipart/form-data" > -->
  
<?php

$form = new panels;

$form->create_user_by_admin();

?>
<!-- 
</form> -->



<!-- check form end -->



  
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

require_once("main-side-bar/footer.php");


?>

  </div>

</div>
  

 




<!-- footer end -->


<script src="sample/../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sample/sidebars.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript">
  


function show_admin_edit_panel(id) {
  
  var id = id ;
  




  var fd = new FormData();





  
    fd.append('id', id);
  fd.append('action', "update_admin");

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('admin_edit_panel').innerHTML = obj.responseText;


    }




  }

  obj.open("POST", "create_user_admin_process.php");

  

  obj.send(fd);
}

 

function  cancel_update(){

document.getElementById('admin_edit_panel').innerHTML='';
}




function add_user() {
  var first_name = document.getElementById('form6Example1').value;
  var last_name = document.getElementById('form6Example2').value;
  var create_password = document.getElementById('form6Example3').value;
  var confirm_password = document.getElementById('form6Example4').value;
  var email = document.getElementById('form6Example5').value;
  var birth = document.getElementById('form6Example6').value;
  var gender = document.getElementById('male').checked ? 'Male' : 'Female';
  var address = document.getElementById('form6Example7').value;
  var role = document.getElementById('form6Example11').value;

  var fd = new FormData();

  if (document.getElementById('form6Example10').files.length === 0) {
    var bg_img = '';
  } else {
    var bg_img = document.getElementById('form6Example10').files[0];
    fd.append('img', bg_img);
  }

  if (
    first_name === '' ||
    last_name === '' ||
    create_password === '' ||
    confirm_password === '' ||
    email === '' ||
    birth === '' ||
    address === '' ||
    role === '' ||
    bg_img === null
  ) {
    alert('ALL FIELDS ARE REQUIRED');
    return;
  }

else if (create_password!==confirm_password) {

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
  fd.append('role', role);
  fd.append('action', 'create_user');

  var obj = new XMLHttpRequest();

  obj.onreadystatechange = function () {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;

      text=obj.responseText;

      alert(text);
    }
  };

  obj.open('POST', 'create_user_admin_process.php');
  obj.send(fd);
}





function update_admin(admin_update_id) {

	var admin_update_id= admin_update_id

  var first_name = document.getElementById('admin_form6Example1').value;
  var last_name = document.getElementById('admin_form6Example2').value;
  var create_password = document.getElementById('admin_form6Example3').value;
  var confirm_password = document.getElementById('admin_form6Example4').value;
  var email = document.getElementById('admin_form6Example5').value;
  var birth = document.getElementById('admin_form6Example6').value;
  var gender = document.getElementById('admin_male').checked ? 'Male' : 'Female';
  var address = document.getElementById('admin_form6Example7').value;
  /*var role = document.getElementById('form6Example11').value;*/

  var fd = new FormData();

  if (document.getElementById('admin_form6Example10').files.length === 0) {
    var bg_img = '';
fd.append('action', 'update_admin_without_image');

  } else {
    var bg_img = document.getElementById('admin_form6Example10').files[0];
    fd.append('img', bg_img);

    fd.append('action', 'update_admin_with_image');
  }

  

 if (create_password!==confirm_password) {

alert('CREATE PASSWORD AND CONFIRM PASSWORD DOESNOT MATCH');
    return;

}

 fd.append('admin_update_id', admin_update_id);
  fd.append('first_name', first_name);
  fd.append('last_name', last_name);
  fd.append('email', email);
  fd.append('create_password', create_password);
  fd.append('confirm_password', confirm_password);
  fd.append('birth', birth);
  fd.append('gender', gender);
  fd.append('address', address);
  
  var obj = new XMLHttpRequest();

  obj.onreadystatechange = function () {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;

      text=obj.responseText;

      alert(text);
    }
  };

  obj.open('POST', 'create_user_admin_process.php');
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