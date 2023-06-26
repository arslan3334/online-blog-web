<?php
session_start();

if (isset($_SESSION['user_id'])) {


if ($_SESSION['role_id']=='2') {

header("location:../user/user.php");

}


$id=$_SESSION['user_id'];


  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);


?>


<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="tablemodule/jquery.dataTables.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ALL PAGES</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

<link href="sample/../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="sample/sidebars.css" rel="stylesheet">




<script type="text/javascript" src="tablemodule/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="tablemodule/jquery.dataTables.min.js"></script>
  
<script type="text/javascript">
    
    $(document).ready(function () {
      //$('#example').DataTable();
  });
  </script>


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

setInterval(remove_msg,7000);
  
show_pages();




function show_pages()
{



var obj;

  if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

  }

  else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

  }

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {

          document.getElementById('example').innerHTML = obj.responseText
         
          $('#example').DataTable({
            // searching: true,
            stateSave: true,
            "bDestroy": true
          });
    
      
}




}


obj.open("POST","admin_page_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=show_pages");

}

function active_page(id)
{


var id = id

var obj;

  if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

  }

  else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

  }

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {

          document.getElementById('msg').innerHTML = obj.responseText
          //$('#example').DataTable();
    
      show_pages();
      }




}


obj.open("POST","admin_page_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=active_page&page_id="+id);

}


function deactivate_page(deactive_id)
{


var page_id = deactive_id

var obj;

  if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

  }

  else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

  }

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {


          document.getElementById('msg').innerHTML = obj.responseText
          show_pages();
          // $('#example').DataTable();
    
      
      }




}


obj.open("POST","admin_page_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=deactive_page&page_id="+page_id);

}




function edit_page(user_id)
{

// var id = document.getElementById('edit').value

var id = user_id

var obj;

  if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

  }

  else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

  }

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {

  document.getElementById('edit_panel').innerHTML = obj.responseText

   
      
      }



}


obj.open("POST","admin_page_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=edit_page&id="+id);




}



/*function update_page(update_id) {
  var id = update_id;
  var blog_title = document.getElementById('page_title').value;
  var post_per_page = document.getElementById('post_per_page').value;
  var bg_img = document.getElementById('bg_img').files[0];

  var fd = new FormData();
  fd.append('id', id);
  fd.append('blog_title', blog_title);
  fd.append('post_per_page', post_per_page);
  fd.append('bg_img', bg_img);
  fd.append('action', "update_page");

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('msg').innerHTML = obj.responseText;
      show_pages();
      remove_panel();
    }
  }

  obj.open("POST", "admin_page_ajax.php");

  

  obj.send(fd);
}*/

/*real update function end*/

function update_page(update_id) {
  var id = update_id;
  var blog_title = document.getElementById('page_title').value;
  var post_per_page = document.getElementById('post_per_page').value;
  
  var fd = new FormData();

if (document.getElementById('bg_img').files[0]==null) {


var bg_img =""

fd.append('action', "update_page_without_image");


}

else{

var bg_img = document.getElementById('bg_img').files[0];

fd.append('bg_img', bg_img);

fd.append('action', "update_page");
}



  
  fd.append('id', id);
  fd.append('blog_title', blog_title);
  fd.append('post_per_page', post_per_page);
  
  

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
      show_pages();
      remove_panel();
    }
  }

  obj.open("POST", "admin_page_ajax.php");

  

  obj.send(fd);
}

// check update end

function remove_panel(){

document.getElementById('edit_panel').innerHTML=""

}

function remove_msg(){

document.getElementById('msg').innerHTML=""

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

<!-- all pages -->

<center>
<div class="container-fluid">

<div id="edit_panel" class="my-3"  >
  

</div>

<div class="row  bg-dark  text-warning my-5 ">



<div class="col-12" >



<h1   class="text-warning"  style="margin-top:40px" >YOUR PAGES </h1>
  
<div id="msg" >
  
</div>

<table id="example" class="display"  style="width:100%">


</table>

</div>
</div>

  </div>
</center>
<!-- all pages end -->




</div>

<!-- horizintal nav end -->




</div>	




</div>
</div>
<!-- header end -->



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










<!-- https://stackoverflow.com/questions/13708781/datatables-warningtable-id-example-cannot-reinitialise-data-table -->
</body>
</html>


<?php


}

else{


$error_msg.="<li>PLZ LOGIN FIRST ...! </li>";

 header("location:../index.php?msg=$error_msg");

}


?>