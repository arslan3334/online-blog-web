<?php 

session_start();

require_once("database_connection/connection.php");


if (  isset($_SESSION['role_id']) && $_SESSION['role_id']=='1') {

header("location:admin/admin.php");

}
elseif ( isset($_SESSION['role_id']) &&  $_SESSION['role_id']=='2') {

header("location:user/user.php");

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>PAGES</title>
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
<body class="bg-warning" >
<?php


 require_once("header.php");




?>
<!-- body start -->
<div class="container-fluid" > 
<div class="row"  style="margin-top: 200px"  >
	
<div class="col-12 text-dark " >
<div class="row" >
<!-- col start -->	

<center>
<div class="col-md-12 text-warning " > 

<div class="row my-2 " style="margin-left: 20px;color: black;border: 18px solid black  ;border-style: groove;" >
  
<!-- code here -->

<table  id="example" class="display text-warning bg-dark  " style="width:50%"  style="color: black" >



<thead class="text-dark" >
        <tr style="font-size: 15px;" >
            <th>ALL BLOGS</th>
            
        </tr>
    </thead>
    <tbody style="text-align: center;" >


<?php


$query="
SELECT * FROM blog WHERE blog.`blog_status`='Active' ORDER BY blog_id DESC";

$result=mysqli_query($connection,$query);


if ($result->num_rows>0) {
  
while ($data=mysqli_fetch_assoc($result)) {
  
 ?>
 
<tr  >
  
<td  >
  <div class="card text-bg-dark" style="width:600px " >
  <img  style="height: 200px;width: 100%"  src="./<?php echo $data['blog_background_image'];  ?>"   class="card-img" alt="..."  >
  <div class="card-img-overlay">
    <h5 class="card-title"><?php echo $data['blog_title'];   ?></h5>
    <p class="card-text"></p>
    <p class="card-text  text-warning "><small><?php echo $data['created_at'] ?></small></p>

   <a style="padding: 10px;text-decoration: none;" target="_blank" href="visitor_blog.php?blog_id=<?php echo  $data['blog_id'];  ?>" class="bg-warning  text-dark rounded ">   <?php echo $data['blog_title'];   ?> </a>
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

<!-- row end -->






</div>

</div>

 </div>
<!-- body end -->




<!-- footer start -->
<?php
 require_once("footer.php");
?>
  
<!-- footer end -->

<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>