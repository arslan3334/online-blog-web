<?php

session_start();

if (  isset($_SESSION['role_id']) && $_SESSION['role_id']=='1') {

header("location:admin/admin.php");

}
elseif ( isset($_SESSION['role_id']) &&  $_SESSION['role_id']=='2') {

header("location:user/user.php");

}



if (isset($_GET['post_id'])) {


$post_id = $_GET['post_id'];

}

  require_once("./admin/oop_work/database_setting.php");
  require_once("./admin/oop_work/databse_class.php");
  $database = new Database($hostname, $username, $password, $database);

$result=$database->select_post_by_post_id_for_blog_page($post_id);


if ($result->num_rows>0) {
  
$data=mysqli_fetch_assoc($result);


}


?>


<!DOCTYPE html>
<html>
<head>
	<title>FLYING BLOGS</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-warning"  style="background-image: url('./<?php echo $data['featured_image']  ?>');  background-repeat: no-repeat ;  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
    "  >
<?php


 require_once("header.php");

?>

<!-- body start -->

<div class="container-fluid" >
	<!-- row start -->
	<div class="row" style="margin-top: 150px"  >
<center>
<div  >
	<h1 class="bg-dark text-warning" >POST DETAIL</h1>

</div>
</center>
<div class="col-12" >
<div class="row" >

<!-- code here  -->
<center>

<div  id="msg" ></div>

  <div class="row" >
    
<div class="col-12 text-danger " >

  <!-- section start -->
<section  style="border-radius: 40px"   >
  <div class="container    my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card" style="width: 1000px;" >
          <div class=" bg-warning text-dark  card-body">
            <div class="d-flex flex-start align-items-center bg-dark ">
             <h1>POST TITLE :</h1>
              <div>
                <h2 class="fw-bold text-warning mb-1"><?php echo $data['post_title'];?></h2>
               
              </div>
            </div>

            <p class="mt-3 mb-4 pb-2">
              <div><h2>POST SUMMARY</h2>
                <?php  echo $data['post_summary']; ?>
              </div>
              <div style="" >
                <h1>
                  POST DESCRIPTION
                </h1><h3  style="overflow:auto;height: 400px"><b>

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et d\
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et d\
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et d\
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <?php echo $data['post_description'];?></b></h3>
                


              </div>

               <p class="text-muted small mb-0  ">
                  <h3 class="text-warning bg-dark" >Shared publicly - <?php echo $data['updated_at'] ?></h3>
                </p>
          
            </p>
          </div>

<?php

if ($data['is_comment_allowed']==1) {
  


?>

          <div class="card-footer py-3 border-0 bg-dark text-warning " style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
       
              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;" placeholder="Write comment here" disabled="" ></textarea>
                <label class="form-label" for="textAreaExample"><h1>Comment HERE </h1></label>
              </div>



            </div>
            <!--  coment section -->

    <div  class="bg-warning text-dark my-3 " id="comment_data"  style="overflow:auto; height: 200px; display: none;" >


              <section style="background-color: #f7f6f6;">
  <div class="container my-5 py-5 text-dark">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="text-dark mb-0">ALL COMMENTS</h4>
          <div class="card">
            <div class="card-body p-2 d-flex align-items-center">
              <h6  class="text-primary fw-bold small mb-0 me-1">Comments "ON"</h6>
              <div class="form-check form-switch">
                <input disabled=""  class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
              </div>
            </div>
          </div>
        </div>



               <?php

              $fetch_comment=$database->show_comment_by_post_id($post_id);

              if ($fetch_comment->num_rows>0) {
                

                while ($comment_data=mysqli_fetch_assoc($fetch_comment)) {
                   
                   ?>




        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="../<?php  echo $comment_data['user_image']?>" alt="avatar" width="40"
                height="40" />
              <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="text-primary fw-bold mb-0">
                    <?php  echo $comment_data['first_name']." ".$comment_data['last_name'];  ?>
                    <span class="text-dark ms-2"><?php  echo $comment_data['comment']?></span>
                  </h6>
                  <p class="mb-0"><?php echo  $comment_data['created_at'];  ?></p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <!-- <p class="small mb-0" style="color: #aaa;">
                    <a href="#!" class="link-grey">Remove</a> •
                    <a href="#!" class="link-grey">Reply</a> •
                    <a href="#!" class="link-grey">Translate</a>
                  </p> -->
                  <div class="d-flex flex-row">
                    <i class="fas fa-star text-warning me-2"></i>
                    <i class="far fa-check-circle" style="color: #aaa;"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




                   <!-- <table>

                    <tr>
                      
                      <th>USER NAME</th>
                      <td><?php  echo $comment_data['first_name']." ".$comment_data['last_name'];  ?></td>
                    </tr>

                    <tr>
                      <th>COMMENT</th>
                      <td><?php  echo $comment_data['comment']?></td>
                    </tr>
                     


                   </table> -->



                   <?php





                  }  





              }




              ?>

               </section>




             </div>

             <!-- comment section end -->




            <div class="float-end mt-2 pt-1">




              <button type="button" onclick="show_comment()" class="btn btn-outline-secondary btn-warning btn-sm">SHOW COMMENTS</button>


              <button type="button" onclick="Hide_comment()" id="hide_btn" class="btn btn-outline-secondary btn-warning btn-sm my-3 " style="display: none;">HIDE COMMENTS</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  </div>

  <?php

}

else{



?>

<section class="bg-secondary "  style="background-color: #f7f6f6;">
  <div class="container my-5 py-5 text-warning">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class=" mb-0"> COMMENTS NOT ALLOWED ON THIS POST </h4>
          <div class="card">
            <div class="card-body bg-dark p-2 d-flex align-items-center" style="width: 150px" >
              <h1  class="text-warning fw-bold small mb-0 me-1">Comments "OFF"</h1>
              <div class="form-check form-switch">
          <input disabled="" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
              </div>
            </div>
          </div>
        </div>
      </section>


<?php



}

  ?>


<div class="col-12" >

  <div class="card bg-dark text-warning ">
  <h5 class="card-header">ATTACHMENTS</h5>
  <div class="card-body">

<?php

$atachments_result=$database->select_post_attachments_by_post_id_($post_id);


if ($atachments_result->num_rows>0) {

  
while ($attach_data=mysqli_fetch_assoc($atachments_result)) {

  ?>

    <a  download="" href="./<?php echo $attach_data['post_attachment_path'] ?>" class="btn btn-warning">
      <?php echo $attach_data['post_attachment_title']?></a>
  <?php
  

}


}

else{


echo "<h1> NO ATTACHMENTS AVAILABLE ON THIS POST </h1>";

}

?>



  </div>
</div>
  

</div>






</center>
 <!-- code here end -->
	

</div>
<!-- inside row end -->
</div>
	
	</div>
	<!-- row end -->

</div>
<!-- body end -->

<!-- footer start -->

<div style="margin-top: 100%" >
<?php
 require_once("footer.php");
?>
  </div>
<!-- footer end -->
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  




function show_comment(){

document.getElementById('comment_data').style.display="block"

document.getElementById('hide_btn').style.display="block"


}

function Hide_comment(){


document.getElementById('comment_data').style.display="none"


document.getElementById('hide_btn').style.display="none"

}



</script>


</body>
</html>