
<?php

session_start();

if (  isset($_SESSION['role_id']) && $_SESSION['role_id']=='1') {

header("location:admin/admin.php");

}
elseif ( isset($_SESSION['role_id']) &&  $_SESSION['role_id']=='2') {

header("location:user/user.php");

}



require_once("database_connection/connection.php");


?>

<!DOCTYPE html>
<html>
<head>
	<title>FLAYING BLOGS</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">



</head>



<body class="bg-warning" >

<!-- nav bar starte -->
<?php


 require_once("header.php");


?>

<!-- body start -->

<div class="contaier-fluid" style="margin-top: 105px"  >
  <!-- image slider -->
  <div  class="row" >

<div  class="col-12" >
  

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/blog2.jpg" class="d-block w-100" alt="..." style="width: 100%;height: 400px" >
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/blog3.jpg" class="d-block w-100" alt="..."  style="width: 100%;height: 400px" >
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/blog5.jpg" class="d-block w-100" alt="..." style="width: 100%;height: 400px" >
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
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
    </div>
<!-- image slider end -->







<!-- blogs   -->

<div class="row  my-2 "   >
  <!-- blogs recent 5   -->




<div class="col-4  "  id="recent_blogs" >

<h1  class="my-3 bg-dark text-warning rounded-start-5 " style="margin-left: 30px;text-align: center;width: 400px;height: 70px" > RECENT POSTS </h1>



<?php  

$query="  
  SELECT * FROM post
WHERE post.`post_status`='Active'  
  
ORDER BY post_id DESC
LIMIT 5;";

$result=mysqli_query($connection,$query);

if ($result->num_rows>0) {
  


  while ($data=mysqli_fetch_assoc($result)) {
    

?>


<!--   first blog -->
<div class="card my-3  bg-dark text-warning " style="width: 22rem;margin-left: 40px;border: 15px solid black;border-style: groove;">
        <img src="./<?php echo $data['featured_image']  ?>" class="img-fluid rounded-start" alt="...">
  <div class="card-body">
    <h5 class="card-title"> TITLE:  <?php  echo $data['post_title'] ?></h5>
<!--     <p class="card-text"><?php echo $data['post_description']  ?></p> -->
  </div>
  <ul class="list-group list-group-flush   ">
    <li class="list-group-item  bg-warning text-dark "> SUMARY :  <?php echo $data['post_summary']  ?></li>
    <li class="list-group-item bg-warning text-dark ">CREATED AT:  <?php  echo $data['created_at'] ?></li>
  </ul>
  <div class="card-body">
   <a class="bg-warning text-dark rounded-pill " style="text-decoration: none;" href="visitor_post_detail.php?post_id=<?php echo $data['post_id']  ?>" target="_blank" ><?php echo $data['post_title'] ?></a>    
  </div>
</div>
<!--   first blog end -->



<?php







  }
}



?>




</div>
  <!-- blogs recent 5 end  -->



<div class="col-7  "  style="margin-left: 80px"   >
  <div class="row   " >

<h1 style="text-align: center;" class="bg-dark text-warning rounded-pill " >NEWS FEED</h1>

<?php


$query2="  
SELECT * FROM post
WHERE post.`post_status`='Active'  
ORDER BY post_id DESC
";

$result2=mysqli_query($connection,$query2);

if ($result2->num_rows>0) {

while ($data2=mysqli_fetch_assoc($result2)) {

?>

<div class="card mb-3 my-5  bg-dark text-warning"   >
  <img src="./<?php echo $data2['featured_image']  ?>"  style="height: 500px;border: 15px solid black;border-style: groove;" class="card-img-top" alt="...">
  <div class="card-body  ">


    <p class="card-text text-warning "  > CREATED AT : <?php echo $data2['created_at'] ?></p>
    <h5 class="card-title text-warning ">  TITLE:  <?php echo $data2['post_title'];  ?></h5>
        <p class="card-text"> SUMMARY :<?php  echo  $data2['post_summary'] ?></p>
    <p class="card-text">  Lorem ipsum dolor sit amet consectetur adipisicing elit. Non cumque exercitationem, itaque minus ipsum facere rem nemo. Modi possimus itaque magnam repellat ad, dignissimos praesentium omnis perspiciatis harum porro totam. <?php echo $data2['post_description'] ?></p>

       <a class="bg-warning text-dark rounded-pill " style="text-decoration: none;" href="visitor_post_detail.php?post_id=<?php echo $data2['post_id']  ?>" target="_blank" ><?php echo $data2['post_title'] ?></a>

  </div>
</div>



<?php


}

}


?>







</div>
</div>



</div>
<!-- blogs  end  -->



</div>



<!-- body end -->

<!-- footer start -->
<?php
 require_once("footer.php");
?>
  
<!-- footer end -->


<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>



<?php



if (isset($_GET['msg'])) {

?>


  <script>
  // Display alert message without reloading the page
  alert("<?php echo $_GET['msg']; ?>");
</script>
  
  <?php
/*echo $_GET['msg'];*/


/*echo" <script>

alert('" . $_GET['msg'] . "');

</script>
 ";
*/



  ?>


<?php


}

?>


</body>
</html>