<?php

session_start();


if (isset($_SESSION['user_id'])) {
  

if ($_SESSION['role_id']=='2') {

header("location:../user/user.php");

}



  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);


// $result=$database->select_catagory();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tablemodule/jquery.dataTables.min.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREATE CATAGORY</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

<link href="sample/../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="sample/sidebars.css" rel="stylesheet">


<script type="text/javascript" src="tablemodule/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="tablemodule/jquery.dataTables.min.js"></script>
  
<script type="text/javascript">
    
    $(document).ready(function () {
      // $('#example').DataTable();
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

    <a class="navbar-brand  text-warning " href="#">  <?php echo $_SESSION['admin_name'];  ?>   <img src="../<?php echo $_SESSION['profile']; ?>" style="height: 80px;width:80px " >  </a>
    
      </div>
</nav>


<div class="row my-5 " >

<div class="col-12" >
  
<center>

<?php

$catagory_panel= new panels;

 $catagory_panel->create_catagory();





?>

<div id="edit_panel" >
  


</div>




  <!-- <fieldset class="bg-dark text-warning"  >
  
<div id="msg" class="text-warning" ></div>

<legend   >Create CATAGORY</legend>

  
<table cellpadding="20px" >
  
<tr>
  <th>CATAGORY TITLE</th>
  <td> <input type="text" name="catagory-title" id="catagory-title" required=""  placeholder="Enter catagory title" class="rounded" >  </td>
   
</tr>

<tr>
  <th>CATAGORY DESCRIPTION</th>  
   <td> <input type="text" name="catagory-description" id="catagory-description" required=""  placeholder="Enter catagory title" class="rounded" >  </td>

</tr>






<tr><td>
  
<input type="submit"  onclick="create_catagory()" name="create-catagory" value=" create"  class="bg-warning rounded " style="width: 100px; margin-left: 200px;" >  
</td></tr>

</table>





</fieldset>
 -->
</div>


</center>



  </div>
<div class="col-12 bg-dark text-warning my-3  " >
<div id="msg" ></div>

  <table id="example" class="display  "  style="width:100%">

</table>


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


<script type="text/javascript">


edit_catagory_panel()

  function create_catagory()
{


var title= document.getElementById('catagory-title').value;

var desc = document.getElementById('catagory-description').value


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
         
          // $('#example').DataTable({
            
          //   stateSave: true,
          //   "bDestroy": true
          // });
    remove_value()
    edit_catagory_panel()
      
}




}


obj.open("POST","create_page_process.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=create_catagory&category_title="+title+"&category_description="+desc);

}


function remove_value(){

 document.getElementById('catagory-title').value="";

 document.getElementById('catagory-description').value="";


}




 function edit_catagory_panel()
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
            
            stateSave: true,
            "bDestroy": true
          });

     
}




}


obj.open("POST","create_page_process.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=show_catagories");

}




function deactivate_category(deactivate_id)
{

 var category_id = deactivate_id


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
         
          // $('#example').DataTable({
            
          //   stateSave: true,
          //   "bDestroy": true
          // });
          edit_catagory_panel()

      
}

}


obj.open("POST","create_page_process.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=deactivate_catagory&category_id="+category_id);

}


function active_category(activate_id)
{

 var category_id = activate_id


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
         
          // $('#example').DataTable({
            
          //   stateSave: true,
          //   "bDestroy": true
          // });
          edit_catagory_panel()

      
}

}


obj.open("POST","create_page_process.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=activate_catagory&category_id="+category_id);

}


function edit_category(edit_id){




var category_id = edit_id


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
         
          // $('#example').DataTable({
            
          //   stateSave: true,
          //   "bDestroy": true
          // });
          edit_catagory_panel()

      
}

}


obj.open("POST","create_page_process.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=edit_catagory_panel&category_id="+edit_id);

}




function update_category(update_id){


var category_id = update_id

var category_title = document.getElementById('category_title').value
var category_description = document.getElementById('category_description').value




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
         
          // $('#example').DataTable({
            
          //   stateSave: true,
          //   "bDestroy": true
          // });
          remove_edit_panel()
          edit_catagory_panel()

      
}

}


obj.open("POST","create_page_process.php")
    obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
    obj.send("action=update_catagory&category_id="+category_id+"&category_title="+category_title+"&category_description="+category_description);

}


function remove_edit_panel() {
  document.getElementById('edit_panel').innerHTML="";
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