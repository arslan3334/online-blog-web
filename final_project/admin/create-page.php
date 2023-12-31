
<?php
session_start();


if (isset($_SESSION['user_id'])) {

  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREATE PAGE</title>

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

<script type="text/javascript">
  

setInterval(remove_msg,5000);

function create_page_by_admin(){
  
  var blog_title = document.getElementById('page_title').value;
  var post_per_page = document.getElementById('post_per_page').value;

  var fd = new FormData();

  if (document.getElementById('bg_img').files[0]==null) {

   var bg_img="";
alert ('all fields are required')
   return
  }

  else{
var bg_img = document.getElementById('bg_img').files[0];

fd.append('bg_img', bg_img);

  }




  fd.append('blog_title', blog_title);
  fd.append('post_per_page', post_per_page);
  // fd.append('bg_img', bg_img);
  fd.append('action', "create_page");

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;

    remove_input_data();

    }
  }

  obj.open("POST", "create_page_process.php");

  // Set the Content-Type header correctly
  // obj.setRequestHeader("Content-Type", "multipart/form-data");

  // Don't set the boundary here, it's automatically generated by the browser

  obj.send(fd);
}

function remove_msg(){

document.getElementById('msg').innerHTML=""


}


function remove_input_data(){

document.getElementById('page_title').value=""
document.getElementById('post_per_page').value=""

}



</script>





</head>
<body class="bg-warning" >
<!-- header -->
<div class="container-fluid">
<div class=" row  " >
	
<div class="col-3 bg-dark " >


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


<div class="row my-5 " >

<div class="col-12" >
  
<div id="msg" >
  

</div>

<center>

  <ul class="text-dark" >
  
<?php

if (isset($_GET['msg'])) {
  
echo $_GET['msg'];

}
?>

</ul>
  <!-- <form  action="create_page_process.php" method="POST" enctype="multipart/form-data"> -->
  <?php
$create_page = new panels;

$create_page->create_page();

  ?>

<!-- </form> -->
</div>

<!-- edit pages -->
</center>



  </div>


</div>






</div>	




</div>
</div>








 
 <!-- footer start -->

<div class="container-fluid" >
  
<div class="row  bg-dark text-warning   "  id="contact_us"  style="padding: 50px;"  >  



<?php    

require_once("main-side-bar/footer.php");


?>

  </div>

</div>
  

 




<!-- footer end -->


<script src="sample/../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sample/sidebars.js"></script>

<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>





</body>
</html>

<?php

}

else{
$error_msg.="<li>PLZ LOGIN FIRST ...! </li>";

 header("location:../index.php?msg=$error_msg");

}


?>