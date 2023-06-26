<?php

session_start();


if (isset($_SESSION['user_id'])) {

// require_once("../database_connection/connection.php");


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
	<title> ALL USERS</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

<!-- <link href="sample/../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

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

    <a class="navbar-brand  text-warning " href="#">   <img src="../<?php echo $_SESSION['profile']; ?>" style="height: 80px;width:80px " ><?php echo  $_SESSION['admin_name']; ?></a>
    
  </div>
</nav>



<center>

<div class="col-md-12 text-warning " id="edit_panel" > 

  
</div>

</center>



<!-- form end -->
<center>
<div id="msg">
  
</div>
<div class="row   text-dark  mt-5 " style="margin-left: 5px" >
<div class="col-12" >
<h1   class="" >ALL APPROVED USERS </h1>
  
  
<br>




  <table id="example" class="display bg-dark text-warning " cellpadding="10px" style="font-size: 20px;" >

    
  FROM <input type="number" onchange="limit_change()"  name="limit_start" id ="limit_start"  value="0" style="margin-right: 40px;height: 40px"  class="rounded-3"  >
  LIMIT <input type="number" name="limit_end"  onchange="limit_change()" id ="limit_end"  value="10" style="margin-right: 40px;height: 40px"  class="rounded-3" >
  <br>
SEARCH  🔎:
<input type="text" onblur="remove()"   onkeyup="showdata()" id="search" name="" style="width: 30%" placeholder="SEARCH HERE"  style="margin-right:30px"  class="rounded-3 my-4 " >

</table>
</div>
</div>
</center>



</div>

<!-- horizintal nav end -->



</div>	




</div>
</div>
<!-- header end -->




<!-- footer start -->

<div class="container-fluid" >
  
<div class="row  bg-dark text-warning  mt-5 "  id="contact_us"   >  


<?php    

require_once("main-side-bar/footer.php");


?>

  </div>

</div>
  

 




<!-- footer end -->






<!-- <script src="sample/../assets/dist/js/bootstrap.bundle.min.js"></script> -->

      <script src="sample/sidebars.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>



<script type="text/javascript">
  

 // setInterval(show_all_approved_users, 1000);

   setInterval(msgremove, 4000); 

   show_all_approved_users()

function show_all_approved_users()
{


var limit=document.getElementById('limit_start').value

var limit_end=document.getElementById('limit_end').value



if (limit<0) {

limit=0

}




if (limit_end<0) {

limit_end=0

}




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
      
      }


}


obj.open("POST","all_user_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=show_approved_users&limit="+limit+"&end_limit="+limit_end);




}

function inactive_user(user_id)
{

// var id = document.getElementById('inactive').value

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

  document.getElementById('msg').innerHTML = obj.responseText


   show_all_approved_users()
      
      }




}


obj.open("POST","all_user_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=inactive_user&id="+id);




}


function active_user(user_id)
{

// var id = document.getElementById('active').value

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

  document.getElementById('msg').innerHTML = obj.responseText

   show_all_approved_users()
      
      }




}


obj.open("POST","all_user_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=active_user&id="+id);




}


function msgremove(){

  document.getElementById('msg').innerHTML=""
}




function edit_user(user_id)
{


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

   show_all_approved_users()
      
      }



}


obj.open("POST","all_user_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=edit_user&id="+id);




}






function update_user(update_id)
{

// var id = document.getElementById('edit').value

var id = update_id

var first_name = document.getElementById('validationCustom01').value

var last_name = document.getElementById('validationCustom02').value

var birth = document.getElementById('validationCustomUsername').value

var address = document.getElementById('validationCustom03').value

var role_id = document.getElementById('Update_role').value

var fd = new FormData();

if (document.getElementById('updated_bg_img').files[0]==null) {

var bg_img = "";

 fd.append('action', "update_user_with_out_profile_image");

}

else{

var bg_img = document.getElementById('updated_bg_img').files[0];

fd.append('bg_img', bg_img);

 fd.append('action', "update_user");
}

if (document.getElementById('male').checked) {

 var gender= document.getElementById('male').value

 fd.append('gender', gender);
}

else{


  if (document.getElementById('female').checked) {

    var gender=document.getElementById('female').value

    fd.append('gender', gender);
  }
}


  fd.append('user_id', id);
  fd.append('first_name', first_name);
  fd.append('last_name', last_name);
  fd.append('birth', birth);
  fd.append('address', address);

  fd.append('role_id',role_id);
  

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

  text=obj.responseText;
  alert(text);
remove_Edit()
   show_all_approved_users()
      
      }



}


obj.open("POST","all_user_ajax.php")
    // obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
     obj.send(fd);
}










// check update user with form data end














function limit_change(){

  show_all_approved_users()

}



function showdata(){

if (document.getElementById('search').value=="") {


  return 1
}

var data= document.getElementById('search').value

var obj;
      if (window.XMLHttpRequest) {
        obj = new XMLHttpRequest();
      }else{
        obj = new ActiveXObject("Microsoft.XMLHTTP");
      }

      obj.onreadystatechange = function(){

        if (obj.readyState == 4 && obj.status == 200) {
          document.getElementById('example').innerHTML = obj.responseText;
          //$('#example').DataTable();
        }



      }

      

      obj.open("POST","all_user_ajax.php")
      obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
      obj.send("action=showdata&data="+data);



 }


function remove(){
if (document.getElementById('search').value=="") {

 show_all_approved_users()


}


 }


function remove_Edit(){

document.getElementById('edit_panel').innerHTML=""


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