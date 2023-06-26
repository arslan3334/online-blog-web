<?php

session_start();

if (isset($_SESSION['user_user_id'])) {


if ($_SESSION['role_id']=='1') {

header("location:../admin/admin.php");

}



  require_once("../admin/oop_work/database_setting.php");
  require_once("../admin/oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

  $result = $database->select_all_page();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ALL PAGES</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

<link href="sample/../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="sample/sidebars.css" rel="stylesheet">



<link rel="stylesheet" type="text/css" href="tablemodule/jquery.dataTables.min.css">
  <script type="text/javascript" src="tablemodule/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="tablemodule/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function () {
      $('#example').DataTable();
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

    <a class="navbar-brand  text-warning " href="#">   <img src="../<?php echo $_SESSION['user_user_profile'] ?>" style="height: 80px;width:80px " >  <?php echo $_SESSION['user_name'];  ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
  </div>
</nav>

<center>
<div class="col-md-12 text-warning " > 

<div class="row my-3 " style="margin-left: 20px;color: black" >
  
<!-- code here -->

<table  id="example" class="display text-dark  " style="width:100%"  style="color: black" >



<thead class="text-dark" >
        <tr style="font-size: 15px;" >
            <th>ALL BLOGS</th>
            
        </tr>
    </thead>
    <tbody style="text-align: center;" >


<?php

if ($result->num_rows>0) {
  
while ($data=mysqli_fetch_assoc($result)) {
  
 ?>
 
<tr  >
  
<td  >
  <div class="card text-bg-dark" style="width:600px " >
  <img  style="height: 200px;width: 100%"  src="../<?php echo $data['blog_background_image'];  ?>"   class="card-img" alt="..."  >
  <div class="card-img-overlay">
    <h5 class="card-title"><?php echo $data['blog_title'];   ?></h5>
    <p class="card-text"></p>
    <p class="card-text  text-warning "><small>Last updated 3 mins ago</small></p>

   <a style="padding: 10px;text-decoration: none;"  href="user_blog.php?blog_id=<?php echo  $data['blog_id'];  ?>" class="bg-warning  text-dark rounded ">   <?php echo $data['blog_title'];   ?> </a>
  </div>
</div>


</td>


</tr>


 <?php 




}


}



?>

 </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
             <th>ALL BLOGS</th>
        </tr>
    </tfoot>

</table>




</div>

</div>

</center>







</div>





</div>	







</div>
</div>
<!-- header end -->




<!-- form end -->



<!-- footer start -->

<div class="container-fluid" >
  
<div class="row  bg-dark text-warning  mt-3 "  id="contact_us"   >  


<?php    

require_once("require/footer.php");

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