<?php
session_start();

if (isset($_SESSION['user_id'])) {

if ($_SESSION['role_id']=='2') {

header("location:../user/user.php");

}



  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);


$id=$_SESSION['user_id'];

?>



<!DOCTYPE html>
<html>
<head>
	<title> SET THEME</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

<link href="sample/../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="sample/sidebars.css" rel="stylesheet">


	<style type="text/css">
		
::placeholder {
  color: orange;
  opacity: 1; /* Firefox */
}

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



<!-- nav start -->

<div class="container-fluid">
<div class=" row  " >
	
<div class="col-3 bg-dark  " >

  <?php    

require_once("main-side-bar/side bar.php");


?>


</div>



<!-- horizintal nav start -->

<div class="col-9" >
<nav class="navbar navbar-expand-lg bg-dark  ">
  <div class="container-fluid  ">
<a class="navbar-brand  text-warning " href="#">   <img src="../<?php echo $_SESSION['profile']; ?>" style="height: 80px;width:80px " >  <?php echo $_SESSION['admin_name'];  ?></a>
    
  </div>
</nav>

<!-- nav end -->

<!-- crete post -->
<center>
<div class="container" >
	

<div id="msg"  style="display: none;" ></div>

<div class="row my-5  " >
	
<div class="col-12 bg-dark text-warning  "  > 

  <div class="col-md-6">
    <label for="font-color" class="form-label">FONT COLOR</label>
    <input type="color" class="form-control" id="font-color" value="#000000" >
  </div>
  <div class="col-md-6">
    <label for="inputsize" class="form-label">FONT SIZE</label>
    <input type="number" class="form-control" id="input_size" placeholder="enter font-size" value="20"  >
  </div>
  <div class="col-12 my-3 ">
    <input type="color" class="form-control" id="background-color" value="#FFD700" style="height: 80px"  >
        <label for="background-color" class="form-label"> POST background-color</label>
  </div>
  
  

  <div class="col-12 my-5 ">
    <button  onclick="set_default_theme(<?php echo $id  ?>)"  type="submit" class="btn btn-warning">SET THEMES</button>
  </div>


</div>


</div>

<div id="show_theme" >


</div>


</div>
</center>




<!-- crete post end -->



<!-- all users start -->




</div>




<!-- all users end -->


<!-- footer start -->

<div class="container-fluid" >
  
<div class="row  bg-dark text-warning  mt-2 "  id="contact_us"   >  



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


	show_theme();
  
function set_default_theme(user_id) {
  var user_id = user_id;
  var font_color = document.getElementById('font-color').value;
  var font_size = document.getElementById('input_size').value+'px';
  var background_color = document.getElementById('background-color').value;
  
  var fd = new FormData();


  
  fd.append('user_id', user_id);
  fd.append('font_color', font_color);
  fd.append('font_size', font_size);

  fd.append('background_color', background_color);


  fd.append('action', 'set_default_theme');

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;

      text=obj.responseText

  alert(text);
  show_theme();
    }
  }

  obj.open("POST", "create_page_process.php");

  

  obj.send(fd);
}





function deactivate_theme(theme_id) {
  var theme_id = theme_id;

  
  var fd = new FormData();


  
  fd.append('theme_id', theme_id);


  fd.append('action', 'deactivate_theme');

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;

      text=obj.responseText

  alert(text);
  show_theme();
    }
  }

  obj.open("POST", "create_page_process.php");

  

  obj.send(fd);
}




function activate_theme(theme_id) {
  var theme_id = theme_id;

  
  var fd = new FormData();


  
  fd.append('theme_id', theme_id);


  fd.append('action', 'activate_theme');

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;

      text=obj.responseText

  alert(text);
  show_theme();
    }
  }

  obj.open("POST", "create_page_process.php");

  

  obj.send(fd);
}









function show_theme() {
  

  
  var fd = new FormData();


  


  fd.append('action', 'show_theme');

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('show_theme').innerHTML = obj.responseText;

   
    }
  }

  obj.open("POST", "create_page_process.php");

  

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