<?php 


session_start();

require_once("database_connection/connection.php");




if (  isset($_SESSION['role_id']) && $_SESSION['role_id']=='1') {

header("location:admin/admin.php");

}
elseif ( isset($_SESSION['role_id']) &&  $_SESSION['role_id']=='2') {

header("location:user/user.php");

}




if (isset($_GET['blog_id'])) {




$blog_id = $_GET['blog_id'];

}




require_once("./admin/oop_work/database_setting.php");
  require_once("./admin/oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);



$result = $database->select_blog_by_blog_id($blog_id);

if ($result->num_rows>0) {
  
$blog_data=mysqli_fetch_assoc($result);

$background_image=$blog_data['blog_background_image'];


}





?>


<!DOCTYPE html>
<html>
<head>
  <title>BLOG</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="admin/tablemodule/jquery.dataTables.min.css">
  <script type="text/javascript" src="admin/tablemodule/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="admin/tablemodule/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function () {
      $('#example').DataTable();
  });
  </script>

</head>
<body class="bg-warning"   style="background-image: url('./<?php  echo $background_image; ?>'); 
background-repeat: no-repeat ;  
  background-attachment: fixed;
  background-size: cover; " >
<?php


 require_once("header.php");




?>
<!-- body start -->
<div class="container-fluid" > 
<div class="row"  style="margin-top: 200px"  >
  
<div class="col-12 text-dark " >
<div class="row" >


<?php

$result4=$database->select_blog_data_by_blog_id($blog_id);

// var_dump($result4);

if ($result4->num_rows>0) {
  
  $data_blog=mysqli_fetch_assoc($result4);

}
?>


  
<div class="col-9 " >
  
<h1 class="bg-dark text-warning rounded-4"  style="text-align: center;height: 100px " > TITLE: <?php echo $data_blog['blog_title']   ?></h1>




<?php
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}

$page = $_GET['page'];


$totalp = 0;


$result_post = $database->select_post_by_blog_id($blog_id);


if ($result_post->num_rows > 0) {
   

$totalp =$result_post->num_rows ;

   while ($post_data = mysqli_fetch_assoc($result_post)) {
      


// $totalp = $post_data['post_count'];

$post_per_page=$post_data['post_per_page'];

    } 
 // Get the total number of posts

$starting= ($page - 1) * $post_per_page;

$result2 =$database->select_post_by_blog_id_order_by_descending($blog_id,$starting,$post_per_page);



if ($result2->num_rows>0) {

while ($post_data2=mysqli_fetch_assoc($result2)) {
  
  ?>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="./<?php echo $post_data2['featured_image']?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $post_data2['post_title'] ;  ?></h5>
        <p class="card-text"><?php echo $post_data2['post_summary'] ;  ?></p>
        <p class="card-text"><small class="text-body-secondary"> Last updated  <?php echo $post_data2['updated_at']  ?></small></p>
       <a href="visitor_post_detail.php?post_id=<?php echo $post_data2['post_id']  ?>" target="blank" >Detail</a>
      </div>
    </div>
  </div>
</div> 


  <?php



}



}


$per_page = ceil($totalp /$post_per_page );

$total_links = $per_page;

?>

<nav aria-label="...">
  <ul class="pagination">


<?php
if ($page > 1) {
    ?>
<!-- pagination boot tsrap start  -->

    <li class="page-item disabled">

    <a class="page-link  bg-dark text-warning " href="visitor_blog.php?page=<?php echo $page - 1; ?>&blog_id=<?php echo $blog_id; ?>"  >PREVIOUS</a> 
    </li>
    
    

<!-- pagination boot tsrap end  -->

<!-- 
    <a href="blog.php?page=<?php echo $page - 1; ?>&blog_id=<?php echo $blog_id; ?>">PREVIOUS</a>  -->

    <?php
}

for ($i = 1; $i <= $total_links; $i++) {
    if ($page == $i) {
        ?>
<li class="page-item active" aria-current="page">

 <a class="page-link bg-warning text-dark  " href="visitor_blog.php?page=<?php echo $i; ?>&blog_id=<?php echo $blog_id; ?>"><?php echo $i; ?></a>

    </li>
<!-- 

        <div style="text-align: center; display: inline-block;">
            <a href="blog.php?page=<?php echo $i; ?>&blog_id=<?php echo $blog_id; ?>"><p style="display: inline-block;font-size:30px;color: red;"><?php echo $i; ?></p></a>
        </div>  -->
        <?php
    } else {
        ?>


    <li class="page-item active" aria-current="page">

            <a class="page-link bg-warning text-dark  " href="visitor_blog.php?page=<?php echo $i; ?>&blog_id=<?php echo $blog_id; ?>"><?php echo $i; ?></a></li>
    
<!-- 
        <div style="text-align: center; display: inline-block;">
            <a href="blog.php?page=<?php echo $i; ?>&blog_id=<?php echo $blog_id; ?>"><p style="display: inline-block;"><?php echo $i; ?></p></a>
        </div>  -->
        <?php
    }
}

if ($page < $i - 1) {
    ?>
 

<li class="page-item">
      
    <a class="page-link bg-dark text-warning" href="visitor_blog.php?page=<?php echo $page + 1; ?>&blog_id=<?php echo $blog_id; ?>">NEXT</a>
    </li>
 
 <!-- 
    <a href="blog.php?page=<?php echo $page + 1; ?>&blog_id=<?php echo $blog_id; ?>">NEXT</a> --> 
    <?php
}



}

else{


  // echo"NO POST ON THIS PAGE";


?> 

<h2 class=" bg-dark text-warning rounded-3 my-3 " style="width:700px;height: 130px;padding: 30px" > NO POST ON AVAILABLE THIS  PAGE RIGHT NOW </h2>


    <?php

}





?>









</div>

<!-- row end -->

<div class="col-3   rounded-5  bg-dark text-warning "   >
  
<table>
<tr>
    
    
    
     <td  style=""><img class="rounded-pill"  style="width: 120px;height: 120px; " src="./<?php echo $data_blog['user_image']?>"></td>
  </tr>

  <tr  >
    
    <th>AUTHOR NAME</th>

    <td  style="font-size: 20px" >(<?php echo $data_blog['first_name']." ". $data_blog['last_name']   ?>)</td> 
  </tr>




</table>

</div>





</div>

</div>

 </div>
<!-- body end -->




<!-- footer start -->

<div class="container-fluid" >

  <div class="row" style="margin-top: 100%"  >

<?php
 require_once("footer.php");
?>

</div>
  </div>
<!-- footer end -->

<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>