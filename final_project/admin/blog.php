
<?php
session_start();


if (isset($_SESSION['user_id'])) {


$id=$_SESSION['user_id'];


if (isset($_GET['blog_id'])) {

// echo $_GET['blog_id'] ;


$blog_id = $_GET['blog_id'];

}
  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BLOG PAGE</title>

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
<body class="bg-warning text-warning"  style="background-image: url('../<?php  echo $background_image; ?>'); 
background-repeat: no-repeat ;  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; " >
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




<div  class="row mt-3 ">

<?php

$result4=$database->select_blog_data_by_blog_id($blog_id);

// var_dump($result4);

if ($result4->num_rows>0) {
	
	$data_blog=mysqli_fetch_assoc($result4);

}
?>


	
<div class="col-9 " >
	
<h1 class="bg-dark  rounded-4"  style="text-align: center;height: 100px " > TITLE: <?php echo $data_blog['blog_title']   ?></h1>




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
      <img src="../<?php echo $post_data2['featured_image']?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $post_data2['post_title'] ;  ?></h5>
        <p class="card-text"><?php echo $post_data2['post_summary'] ;  ?></p>
        <p class="card-text"><small class="text-body-secondary"> Last updated  <?php echo $post_data2['updated_at']  ?></small></p>
       <a href="post_detail.php?post_id=<?php echo $post_data2['post_id']  ?>">Detail</a>
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

    <a class="page-link  bg-dark text-warning " href="blog.php?page=<?php echo $page - 1; ?>&blog_id=<?php echo $blog_id; ?>"  >PREVIOUS</a> 
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

 <a class="page-link bg-warning text-dark  " href="blog.php?page=<?php echo $i; ?>&blog_id=<?php echo $blog_id; ?>"><?php echo $i; ?></a>

    </li>
<!-- 

        <div style="text-align: center; display: inline-block;">
            <a href="blog.php?page=<?php echo $i; ?>&blog_id=<?php echo $blog_id; ?>"><p style="display: inline-block;font-size:30px;color: red;"><?php echo $i; ?></p></a>
        </div>  -->
        <?php
    } else {
        ?>


    <li class="page-item active" aria-current="page">

            <a class="page-link bg-warning text-dark  " href="blog.php?page=<?php echo $i; ?>&blog_id=<?php echo $blog_id; ?>"><?php echo $i; ?></a></li>
    
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
      
    <a class="page-link bg-dark text-warning  " href="blog.php?page=<?php echo $page + 1; ?>&blog_id=<?php echo $blog_id; ?>">NEXT</a>
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

 </ul>
</nav>



</div>

<div class="col-3   rounded-5  bg-dark text-warning "   >
	
<table>
<tr>
		
		
		
		 <td  style=""><img class="rounded-pill"  style="width: 120px;height: 120px; " src="../<?php echo $data_blog['user_image']?>"></td>
	</tr>

	<tr  >
		
		<th>AUTHOR NAME</th>

		<td  style="font-size: 20px" >(<?php echo $data_blog['first_name']." ". $data_blog['last_name']   ?>)</td> 
	</tr>

	<tr  ><td  >
		

<?php

$result=$database->select_following_blog($id,$blog_id);

if ($result->num_rows>0) {
  


  $data=mysqli_fetch_assoc($result);


if ($data['status']=="Followed") {

	?>
    <div  id="update_btn" class="mt-5  "  >
     <button id="update_follow_btn" onclick="Update_follow_blog(<?php echo $blog_id;?>,<?php echo $id;?>)"  class="bg-warning text-dark rounded-5 " style="float: right;height:40px;font-size: 25px" >UnFollow</button>  </div>
     <?php
	
}
else{

?>
    <div  id="update_btn" class="mt-5"  >
     <button id="update_follow_btn" onclick="Update_unfollow_blog(<?php echo $blog_id;?>,<?php echo $id;?>)"  class="bg-warning text-dark rounded-5 " style="float: right;height:40px;font-size: 25px" >Follow</button>  </div>
     <?php


}

    
    
}
else{


?>

  <div id="follow_btn" class="mt-5" > 
<button  id="change_btn" onclick="follow_blog(<?php echo $blog_id;  ?> , <?php echo $id;?> )"  class="bg-warning text-dark rounded-5 " style="float: right;height:40px;font-size: 25px" >FOLLOW </button>
</div> 


<?php




}






?>


	</td></tr>



</table>

</div>


</div>



<br>

<div class="row my-2 " >



<div class="col-12">



<tr >

  <th ><h1 style=" background-color:  black;border-radius: 10px;height: 80px;padding:20px" >Search POSTS BY CATAGORY</h1>   </th>
  <td>
    
<select  id="post-category" onchange="show_post_by_category(<?php  echo $blog_id; ?>)"  >

  <option value="" >--SELECT CATEGORY--</option>
<?php
 $result_category= $database->select_catagory_by_active();

if ($result_category->num_rows>0) {
  

  while ($category=mysqli_fetch_assoc($result_category)) {
   

?>

<option value="<?php echo $category['category_id'] ?>" >  <?php echo $category['category_title'];  ?> </option>


<?php


  }

}



?>

</select>

  </td>

</tr>



    
 <div id="post_by_catgeory" >
  

  
</div>      


 

<div id="msg" >
  


</div>

<!-- <button  class="bg-warning text-dark rounded-pill " style="float: right;height:40px" > FOLLOW</button> -->






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
  



  
 function follow_blog(blog_id , user_id ){

var blog_id = blog_id

var user_id = user_id

var fd = new FormData();
  fd.append('action', 'follow_blog');
  fd.append('blog_id', blog_id);

fd.append('user_id', user_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;


alert("page followed");
remove_btn();

  // $('#example').DataTable({
  //           // searching: true,
  //           stateSave: true,
  //           "bDestroy": true
  //         });

    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}




 function  Update_follow_blog(blog_id,user_id){


var blog_id = blog_id

var user_id = user_id

var fd = new FormData();
  fd.append('action', 'Unfollow_blog');
  fd.append('blog_id', blog_id);

fd.append('user_id', user_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;


alert("page Unfollowed");

remove_unfollowbtn();
  // $('#example').DataTable({
  //           // searching: true,
  //           stateSave: true,
  //           "bDestroy": true
  //         });

    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);






 }


 function Update_unfollow_blog(blog_id,user_id){




var blog_id = blog_id

var user_id = user_id

var fd = new FormData();
  fd.append('action', 'Update_Unfollow_blog');
  fd.append('blog_id', blog_id);

fd.append('user_id', user_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;


alert("page followed");

remove_unfollowbtn();
  // $('#example').DataTable({
  //           // searching: true,
  //           stateSave: true,
  //           "bDestroy": true
  //         });

    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);



 }

 function remove_btn(){

 	document.getElementById('change_btn').style.display="none"
 }

 function remove_unfollowbtn(){

 	document.getElementById('update_follow_btn').style.display="none"
 }





 function show_post_by_category(blog_id){


var blog_id= blog_id;

if (document.getElementById('post-category').value=="") {

var category_id='0'

}
else{

var category_id = document.getElementById('post-category').value

}



var fd = new FormData();
  fd.append('action', 'show_post_by_category');
  fd.append('category_id', category_id);
  fd.append('blog_id', blog_id);
  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('post_by_catgeory').innerHTML = obj.responseText;

  // $('#example').DataTable({
  //           // searching: true,
  //           stateSave: true,
  //           "bDestroy": true
  //         });

    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);



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