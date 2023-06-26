<?php

session_start();

if (isset($_SESSION['user_user_id'])) {


if ($_SESSION['role_id']=='1') {

header("location:../admin/admin.php");

}

$id=$_SESSION['user_user_id'];


if (isset($_GET['post_id'])) {

// echo $_GET['post_id'] ;


$post_id = $_GET['post_id'];

}

  require_once("../admin/oop_work/database_setting.php");
  require_once("../admin/oop_work/databse_class.php");
  $database = new Database($hostname, $username, $password, $database);

$result=$database->select_post_by_post_id_for_blog_page($post_id);

// var_dump($result);

if ($result->num_rows>0) {
  
$data=mysqli_fetch_assoc($result);


}


 $key1='user_font_color';

$theme_data=$database->show_theme_by_user_id($key1,$id);


 $key2='user_background_color';

$theme_bg_color=$database->show_theme_by_user_id($key2,$id);

$key3='user_font_size';

$theme_font_size=$database->show_theme_by_user_id($key3,$id);

$admin_key='admin_font_color';

$admin_font_color=$database->show_theme_by_admin($admin_key);


$admin_key2='admin_background_color';


$admin_bg_color=$database->show_theme_by_admin($admin_key2);



$admin_key3='admin_font_size';

$admin_font_size=$database->show_theme_by_admin($admin_key3);




?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> POST DETAIL</title>
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
<body  style="background-image: url('../<?php echo $data['featured_image']  ?>');  background-repeat: no-repeat ;  background-repeat: no-repeat;
  /*background-attachment: fixed;*/
  background-size: cover; 
    " > 




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

    <a class="navbar-brand  text-warning " href="#"><img src="../<?php echo $_SESSION['user_user_profile']; ?>" style="height: 80px;width:80px " >  <?php echo $_SESSION['user_name'];  ?></a>
   
  </div>
</nav>

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
          <div   style=" color: <?php


if ($theme_data->num_rows>0) {
  

$font_color=mysqli_fetch_assoc($theme_data);

  echo $font_color['setting_value']; 


}

else{


if ($admin_font_color->num_rows>0) {
  
  $admin_font=mysqli_fetch_assoc($admin_font_color);

  echo $admin_font['setting_value'];

}
else{

echo"black";

}


/*
echo "black";*/

}

          ?>




           ;background-color: 
<?php

if ($theme_bg_color->num_rows>0) {
  
$bg_color=mysqli_fetch_assoc($theme_bg_color);

echo $bg_color['setting_value'];
}

else{

if ($admin_bg_color->num_rows>0) {

$admin_bg=mysqli_fetch_assoc($admin_bg_color);

echo $admin_bg['setting_value'];

}
else{



echo"#fcd23b";


}



}


?>



;



            "   >
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
              <div >
                <h1>
                  POST DESCRIPTION
                </h1><h3  style="overflow:auto;height: 400px">
                  <b  style=" font-size: 
<?php
if ($theme_font_size->num_rows>0) {
  $font=mysqli_fetch_assoc($theme_font_size);

  echo $font['setting_value'];

}

else{

if ($admin_font_size->num_rows>0) {
  
$admin_size=mysqli_fetch_assoc($admin_font_size);

echo $admin_size['setting_value']; 

}

else{

echo "18px";

}


}



?>


              " > 
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
                  style="background: #fff;" placeholder="Write comment here" ></textarea>
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
              <button  onclick="add_comment(<?php echo $id ?>,<?php echo$post_id  ?>)"  type="button" class="btn btn-warning btn-sm">Post comment</button>
              <button type="button" class="btn btn-outline-danger btn-warning btn-sm">Cancel</button>



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

    <a  download="" href="../<?php echo $attach_data['post_attachment_path'] ?>" class="btn btn-warning">
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

<script type="text/javascript">
  

function add_comment(user_id,post_id){

var user_id = user_id;

var post_id = post_id;

 

var fd = new FormData();




if (document.getElementById('textAreaExample').value==null) {

var comment =''
}

else{

  var comment =document.getElementById('textAreaExample').value

fd.append('comment', comment);

}

if (comment=='') {


  alert(" please add comment ...!  ");

  return 
}



  fd.append('action', 'add_comment');

  fd.append('post_id', post_id);

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

      text = obj.responseText;

      alert(text);
      remove_value()


    }
  };

  obj.open("POST", "ajax.php");


  obj.send(fd);





}



function remove_value(){

document.getElementById('textAreaExample').value=''


}


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

<?php

}

else{
$error_msg.="<li>PLZ LOGIN FIRST ...! </li>";

 header("location:../index.php?msg=$error_msg");

}


?>