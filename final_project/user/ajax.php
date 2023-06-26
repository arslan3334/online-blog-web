<?php


session_start();


$user_id=$_SESSION['user_user_id'];


  require_once("../admin/oop_work/database_setting.php");
  require_once("../admin/oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');


extract($_FILES);
extract($_REQUEST);







if (isset($_REQUEST['action']) && $_REQUEST['action'] == "follow_blog"){

$status="Followed";

$result=$database->follow_blog($user_id,$blog_id,$status,$time);

if ($result) {


   echo "SUCCESSFULLY followed";


}


}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "Unfollow_blog"){

$status="Unfollowed";

$result=$database->operate_follow_page($blog_id,$user_id,$status,$time);

if ($result) {


   echo "SUCCESSFULLY Unfollowed";


}


}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "Update_Unfollow_blog"){

$status="Followed";

$result=$database->operate_follow_page($blog_id,$user_id,$status,$time);

if ($result) {


   echo "SUCCESSFULLY followed";


}



}





if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_post_by_category"){



$result=$database->show_post_by_category($category_id,$blog_id);

if ($result->num_rows>0) {



while ($data=mysqli_fetch_assoc($result)) {

?>


<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../<?php  echo $data['featured_image']; ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $data['post_title']   ?></h5>
        <p class="card-text"><?php echo $data['post_summary']  ?> </p>

       <a href="user_post_detail.php?post_id=<?php echo $data['post_id']  ?>"  >Detail</a>
      </div>
    </div>
  </div>
</div>

<?php




}



}
else{

echo"<h1  class='bg-dark text-warning' > NO POST AVAILABLE ON THIS PAGE WITH THIS CATEGORY</h1>";

}


}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "add_comment"){


$result=$database->add_comment_to_post($post_id,$user_id,$comment);

if ($result) {
  
echo"Comment ADDEDD SUCCESS FULLY";

}
else{

  echo"commen add failed";
}



}






if (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_user_with_image"){




 $realname = $img['name'];
     
     $temp_name = $img['tmp_name'];
    
    $servername = time()."_".$realname;

  
  $profile_path="/user_profiles/".$servername;
/*
move_uploaded_file($temp_name, "../user_profiles/".$servername);*/


$result=$database->update_user_by_user($user_id,$first_name,$last_name,$profile_path,$birth,$address,$gender,$email,$create_password,$time);

if ($result) {


move_uploaded_file($temp_name, "../user_profiles/".$servername);
  
  echo "USER UPDATED WITH PROFILE SUCCESSFULLY";
}
else{

  echo"USER UPDATE FAILED";
}


}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_user_without_image"){


$result2=$database->select_user_to_update($user_id);


if ($result2->num_rows>0) {

$selected_data=mysqli_fetch_assoc($result2);

$profile_path=$selected_data['user_image'];

}



$result=$database->update_user_by_user($user_id,$first_name,$last_name,$profile_path,$birth,$address,$gender,$email,$create_password,$time);

if ($result) {

  
  echo "USER UPDATED WITHOUT PROFILE SUCCESSFULLY";
}
else{

  echo"USER UPDATE FAILED";
}


}





if (isset($_REQUEST['action']) && $_REQUEST['action'] == "user_feedback"){



$result=$database->select_users_approved($user_id);


if ($result->num_rows>0) {


$data=mysqli_fetch_assoc($result);


$user_name= $data['first_name']." ".$data['last_name'];


$result2=$database->insert_feedback($data['user_id'],$feedback,$user_name,$data['email'],$time);

if ($result2) {
  
echo"feedback given";

}



}








}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "set_user_theme"){


$result=$database->select_theme_by_user_id($user_id);



if ($result->num_rows>0) {

  $key1='user_font_color';
  
$update_font_color=$database->operate_theme_by_user_id($key1,$font_color,$user_id);


if ($update_font_color) {

  $key2='user_font_size';
  
$update_font_size=$database->operate_theme_by_user_id($key2,$font_size,$user_id);


if ($update_font_size) {

  $key3='user_background_color';

$update_bg_color=$database->operate_theme_by_user_id($key3,$background_color,$user_id);


if ($update_bg_color) {
 
echo"THEME UPDATE SUCCESSFULLY";

}

}

}



}

else{


$insert_theme=$database->insert_theme_by_user($user_id,$font_size,$font_color,$background_color,$time);

if ($insert_theme) {
  
echo "THEME INSERTED SUCCESSFULLY";

}



}





}





if (isset($_REQUEST['action']) && $_REQUEST['action'] == "deactivate_theme"){


$status='InActive';

$result=$database->theme_status($theme_id,$status);

if ($result) {
  
echo "THEME DEACTIVATED";

}



}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "activate_theme"){


$status='Active';

$result=$database->theme_status($theme_id,$status);

if ($result) {
  
echo "THEME ACTIVATED";

}



}





if (isset($_REQUEST['action']) && $_REQUEST['action'] == "user_show_theme"){



$all_user_themes=$database->select_theme_by_user_id($user_id);


if ($all_user_themes->num_rows>0) {
  
?>
<h1>MANAGE YOUR THEMES</h1>


<table  class="bg-dark text-warning" cellpadding="20px" >

<tr>
  
<th>
  
SR
</th>
<th>THEME NAME</th>

<th>THEME VALUE</th>
<th>STATUS</th>

<th>ACTION</th>
</tr>

<?php

$sr=0;

while ($data=mysqli_fetch_assoc($all_user_themes)) {
  
$sr++;
  ?>
<tr>
  <td><?php echo $sr; ?></td>


  <td><?php echo $data['setting_key']; ?></td>


  <td><?php echo $data['setting_value']; ?></td>

  <td><?php  echo $data['setting_status'] ?></td>


  <td>
    
<?php

if ($data['setting_status']=='Active') {
  
  ?>

<button  class="bg-danger text-light" onclick="deactivate_theme(<?php  echo  $data['setting_id']; ?>)"  >DEACTIVATE</button>
  <?php



}
else{

?>

<button  class="bg-warning text-dark" onclick="activate_theme(<?php echo  $data['setting_id']; ?>)"  >ACTIVATE</button>
  <?php



}


?>


  </td>


</tr>


  <?php




}

?>

</table>
<?php

}




}







?>