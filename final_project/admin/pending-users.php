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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PENDING ACCOUNTS</title>
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
  <div class="row bg-dark " >
   <div class="col-12" > 
<nav class="navbar navbar-expand-lg   ">
  <div class="container-fluid  ">
<a class="navbar-brand  text-warning " href="#">   <img src="../<?php echo $_SESSION['profile']; ?>" style="height: 80px;width:80px " >  <?php echo $_SESSION['admin_name'];  ?></a>
    
  </div>
</nav>
</div>
</div>
<center>
<div class="row   text-dark  mt-5  " style="margin-left: 10px" >
<div class="col-12">


 <h2>SHOW NUMBER OF RECORDS</h2>
<br>
  FROM <input type="number"  onchange="limit_change()" name="limit_start" id ="limit_start"  value="0" >
  LIMIT <input type="number" onchange="limit_change()"  name="limit_end" id ="limit_end"  value="10" >
  <br>
SEARCH  🔎:
<input type="text" onblur="remove()"   onkeyup="showdata()" id="search" name="" style="width: 30%" placeholder="SEARCH HERE">
 <div class="row" > 




<div id="msg"  class="text-dark" >
  

</div>


  <table id="example" class="display bg-dark text-warning " cellpadding="10px" style="font-size: 18px" >



 </table> 
  






</div>


</div>




<!-- user table start end  -->  

</div>
</div>


</div>
</center>
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





      <script src="sample/sidebars.js"></script>


<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

// setInterval(show_pending_users, 1000);


  show_pending_users()
  // setInterval(msgremove, 120000); 



  
function show_pending_users()
{


var limit=document.getElementById('limit_start').value

var limit_end=document.getElementById('limit_end').value

if (limit<0 || limit=="" ) {

limit=0

}

if (limit_end<0 || limit_end=="" ) {

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


obj.open("POST","pending_user_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=show_pending_users&limit="+limit+"&end_limit="+limit_end);




}



function approve_user(user_id)
{

// var id = document.getElementById('approve').value

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

    show_pending_users()
      
      }




}


obj.open("POST","pending_user_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=approve_user&id="+id);

}





function reject_user(user_id)
{

// var id = document.getElementById('reject').value

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

    show_pending_users()
      
      }




}


obj.open("POST","pending_user_ajax.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=reject_user&id="+id);




}

// function msgremove(){

//   document.getElementById('msg').innerHTML=""
// }
function limit_change(){

  show_pending_users()

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
        }



      }

      

      obj.open("POST","pending_user_ajax.php")
      obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
      obj.send("action=showdata&data="+data);



 }


function remove(){
if (document.getElementById('search').value=="") {

 show_pending_users()


}


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