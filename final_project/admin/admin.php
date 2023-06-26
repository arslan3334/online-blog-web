
<?php

session_start();


if (isset($_SESSION['user_id'])) {


if ($_SESSION['role_id']=='2') {

header("location:../user/user.php");

}


/*require_once("../database_connection/connection.php");*/

$id=$_SESSION['user_id'];


  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');


?>




<!DOCTYPE html>
<html>
<head>

  <script src="sample/../assets/js/color-modes.js"></script>
	<title>ADMIN PANEL</title>
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


<link rel="stylesheet" type="text/css" href="tablemodule/jquery.dataTables.min.css">
  <script type="text/javascript" src="tablemodule/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="tablemodule/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function () {
      $('#example').DataTable();
  });
  </script>


</head>
<body class="bg-warning "  >

<div class="container-fluid" >
  <div class="row  " >
<!-- nav start -->
<div class="col-3 bg-dark  " >


<?php    

require_once("main-side-bar/side bar.php");


?>

<!-- side nave end dash board -->
</div>

<!-- horizontal nav start -->

<div class="col-9  "  style="border: 20px solid black;border-style: groove;" > 
<a   style="font-size: 40px;font-family:all;" class="navbar-brand  text-dark " href="#"><img src="../<?php  echo $_SESSION['profile'];     ?>" style="height: 80px;width:80px " class="rounded-3" > WELCOME  <?php  echo  $_SESSION['admin_name']; ?></a>
    


  <!-- <div class="row bg-secondary text-warning" >



 </div> -->
<!-- horzontal nav end -->

<!-- slider start -->
<div class="col my-2" >
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/1683827062_blog4.jpg" class="d-block w-100" alt="images/1.jpg" style="height: 400px;width:100% " >
      <div class="carousel-caption d-none d-md-block">
        <h5>HARD WORK IS THE KEY OF SUCCESS</h5>
        <p>NEVER QUIT UNITL YOU WIN </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/1684085997_blog2.jpg" class="d-block w-100" alt="images/1.jpg" style="height: 400px;width:200px " >
      <div class="carousel-caption d-none d-md-block">
          <h5>HARD WORK IS THE KEY OF SUCCESS</h5>
        <p>NEVER QUIT UNITL YOU WIN </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/1684086732_blog3.jpg" class="d-block w-100" alt="images/1.jpg" style="height: 400px;width:100% " >
      <div class="carousel-caption d-none d-md-block">
  <h5>HARD WORK IS THE KEY OF SUCCESS</h5>
        <p>NEVER QUIT UNITL YOU WIN </p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<!-- slider end -->



<!-- total blog start -->
<div class="col my-3 " style="margin-left: 70px"  >
  
<!-- body work start -->

<div class="row" >

<!-- row starte -->

<div class="col-4" >

<?php


$all_blog=$database->count_blogs();


if ($all_blog->num_rows>0) {
  

  $number_of_all_blogs=mysqli_fetch_assoc($all_blog);

}

$active_blog='Active';

$number_of_active_blogs=$database->count_blog_with_conditions_active_inactive($active_blog);

if ($number_of_active_blogs->num_rows>0) {

$active_blog=mysqli_fetch_assoc($number_of_active_blogs);

}



$InActive_blog='InActive';

$number_of_InActive_blogs=$database->count_blog_with_conditions_active_inactive($InActive_blog);

if ($number_of_InActive_blogs->num_rows>0) {

$InActive_blog=mysqli_fetch_assoc($number_of_InActive_blogs);

}



?>



<div class="card border-dark mb-3 rounded-4  " style="max-width: 18rem; border: 15px solid ;border-style: groove;">
  <div class="card-header bg-dark text-warning "> TOTAL BLOGS  <?php echo $number_of_all_blogs['COUNT(blog_id)'];?> </div>
  <div class="card-body bg-warning text-dark ">
    <h3 class="card-title"><a href="all-pages-admin-view.php">ACTIVE BLOGS</a>  =  <?php echo $active_blog['COUNT(blog_id)']  ?></h3>

    <h3 class="card-title">DEACTIVATED BLOGS  =  <?php echo $InActive_blog['COUNT(blog_id)']  ?></h3>

  </div>
  <div class="card-header bg-dark text-warning ">TOTAL BLOGS  <?php echo $number_of_all_blogs['COUNT(blog_id)'];?></div>
</div>
</div>




<div class="col-4" >

<?php

$user_result=$database->count_users();


if ($user_result->num_rows>0) {
  $count_all_data=mysqli_fetch_assoc($user_result);



}


$pending='pending';

$pending_users=$database->count_users_with_conditions($pending);


if ($pending_users->num_rows>0) {
  $count_all_pending=mysqli_fetch_assoc($pending_users);



}

$approved='Approved';

$approved_users=$database->count_users_with_conditions($approved);


if ($approved_users->num_rows>0) {
  $count_all_approved=mysqli_fetch_assoc($approved_users);



}



$rejected='Rejected';

$rejected_users=$database->count_users_with_conditions($rejected);


if ($rejected_users->num_rows>0) {
  $count_all_rejected=mysqli_fetch_assoc($rejected_users);



}




$active='Active';

$active_users=$database->count_users_with_conditions_active_inactive($active);

if ($active_users->num_rows>0) {
  $count_all_user_active=mysqli_fetch_assoc($active_users);



}


$InActive='InActive';

$InActive_users=$database->count_users_with_conditions_active_inactive($InActive);

if ($InActive_users->num_rows>0) {
  $count_all_user_InActive=mysqli_fetch_assoc($InActive_users);



}




?>



<div class="card border-dark mb-3 rounded-4  " style="max-width: 18rem; border: 15px solid ;border-style: groove;">
  <div class="card-header bg-dark text-warning ">ALL USERS   <?php echo $count_all_data['COUNT(user_id)'];?></div>
  <div class="card-body bg-warning text-dark ">
    <h5 class="card-title">  <a href="pending-users.php">  PENDING USERS</a> = <?php  echo $count_all_pending['COUNT(user_id)'] ;  ?></h5>

    <h5 class="card-title"> <a href="all-users.php">  APPROVED USERS =</a> <?php  echo $count_all_approved['COUNT(user_id)'] ;  ?></h5>
    

    <h5 class="card-title"> REJECTED USERS = <?php  echo $count_all_rejected['COUNT(user_id)'] ;  ?></h5>


    
    <h5 class="card-title"> <a href="all-users.php">  ACTIVED USERS</a> = <?php  echo $count_all_user_active['COUNT(user_id)'] ;  ?></h5>
     


    <h5 class="card-title"> <a href="all-users.php">  DEACTIVED USERS</a> = <?php  echo $count_all_user_InActive['COUNT(user_id)'] ;  ?></h5>
  </div>
  <div class="card-header bg-dark text-warning "><?php echo $count_all_data['COUNT(user_id)'];?> USERS</div>
</div>
</div>




<div class="col-4" >

<?php

$count_all_post=$database->count_posts();

if ($count_all_post->num_rows>0) {
  
$all_post_number=mysqli_fetch_assoc($count_all_post);

}

$post_active='Active';

$count_post_with_status =$database->count_post_with_conditions_active_inactive($post_active);

if ($count_post_with_status->num_rows>0) {
  
  $count_post_active=mysqli_fetch_assoc($count_post_with_status);

}


$post_InActive='InActive';

$count_post_with_InActive =$database->count_post_with_conditions_active_inactive($post_InActive);

if ($count_post_with_InActive->num_rows>0) {
  
  $count_post_InActive=mysqli_fetch_assoc($count_post_with_InActive);

}



?>


<div class="card border-dark mb-3 rounded-4  " style="max-width: 18rem; border: 15px solid ;border-style: groove;">
  <div class="card-header bg-dark text-warning "> TOTAL POSTS  <?php echo $all_post_number['COUNT(post_id)']  ?>   </div>
  <div class="card-body bg-warning text-dark ">
    <h3 class="card-title"> NUMBER OF  ACTIVE POST =  <?php echo   $count_post_active['COUNT(post_id)']  ?> </h3>
    <h3 class="card-title"> NUMBER OF  InActive POST =  <?php echo   $count_post_InActive['COUNT(post_id)']  ?> </h3>
  </div>
  <div class="card-header bg-dark text-warning ">  <?php echo $all_post_number['COUNT(post_id)']  ?>  POSTS</div>
</div>
</div>

  


<!-- 
row end -->
</div>
<!-- 
second row start -->




<div class="row"  >

<!-- row starte -->
<center>

<h1 class="text-warning bg-dark  rounded-5" > REJECTED USERS </h1>

  <table id="example" class="display bg-warning text-dark "  cellpadding="5px" style="font-size: 20px;width: 80%" >
<thead>
        <tr style="font-size: 15px;" >
            <th>PROFILE IMAGE</th>
            <th>SR</th>
            <th>Name</th>
           
            <th>email</th>
           
            <th>gender</th>
            <th>STATUS</th>
            
      
        </tr>
    </thead>
    <tbody>
    <?php
   
$sr=0;



// $result2 = $database->show_users_approved($limit,$end_limit);

$result2=$database->select_users_rejected();

// $result2 = $database->show_all_approvde_users();

    while ($data=mysqli_fetch_assoc($result2)) { 
$sr++;

    ?>  
        <tr  class="my-2" >
            <td><img  class="rounded-pill" style="width:40px;height: 40px "  src="../<?php echo $data['user_image']  ?>"></td>

            <td><?php echo $sr; ?></td>
            <td><?php echo $data['first_name']." ".$data['last_name']  ?></td>
            <td><?php echo $data['email']  ?></td>
            
            <td><?php echo $data['gender']  ?></td>

            <td class="bg-danger text-light" ><?php echo $data['is_approved']  ?></td>
          
           
        </tr>
    <?php
    }
    ?>
    </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
            <th>PROFILE IMAGE</th>
            <th>SR</th>
            <th>Name</th>
           
            <th>email</th>
           
            <th>gender</th>
            <th>STATUS</th>
       
        </tr>
    </tfoot>



</table>
</center>

<!-- 
row end -->
</div>

<!-- 
second row end -->





<!-- body work end -->


</div>


</div>

<!-- total blog start end -->



</div>
</div>
</div>

<!-- footer start -->

<div class="container-fluid" >
  
<div class="row  bg-dark text-warning  mt-2 "  id="contact_us"   >  


<?php    

include("main-side-bar/footer.php");


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



$error_msg="<li>PLZ LOGIN FIRST ...!</li>";

 header("location:../index.php?msg=$error_msg");

}




?>