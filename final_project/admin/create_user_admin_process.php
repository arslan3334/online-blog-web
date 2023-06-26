<?php

session_start();

$admin_id=$_SESSION['user_id'];

if (isset($_SESSION['user_id'])) {

  // require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  // $database = new Database($hostname, $username, $password, $database);

  require_once("../database_connection/connection.php");

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');



extract($_FILES);
extract($_REQUEST);



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "create_user"){




 $realname = $img['name'];
     
     $temp_name = $img['tmp_name'];
    
    $servername = time()."_".$realname;

  
  $profile_path="/user_profiles/".$servername;




$query_check="SELECT *FROM `user` WHERE user.`email`= '{$email}'";

$result=mysqli_query($connection,$query_check);

if ($result->num_rows>0) {
  

echo"EMAIL ALREADY TAKEN TRY WITH ANOTHER EMAIL";

}

else{

move_uploaded_file($temp_name, "../user_profiles/".$servername);

require_once("FPDF/fpdf.php");



$is_approved="Approved";
$is_active="Active";

$query="INSERT INTO `user`(role_id,first_name,last_name,email,`password`,gender,date_of_birth,user_image,address,created_at,updated_at,is_approved,is_active) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ";

$stmt=mysqli_prepare($connection,$query);

mysqli_stmt_bind_param($stmt,"issssssssssss",$role,$first_name,$last_name,$email,$create_password,$gender,$birth,$profile_path,$address,$time,$time,$is_approved,$is_active);

$result= mysqli_stmt_execute($stmt);

if ($result) {

$msg="DEAR USER YOUR ACCOUNT HAS BEEN MADE BY THE ADMIN ".$_SESSION['admin_name']." the details of your account is  EMAIL =  ".$email."Password =  ".$create_password." NAME =  ".$first_name." ".$last_name." GENDER = ".$gender."DATE OF BIRTH =  ".$birth." ADDRESS =  ".$address." CREATING TIME =  ".$time." YOU ARE already APPROVED AND ACTIVE SO YOU CAN USE OUR WEBSITE WITH OUT ANY HURDLE ";


$mail= new mailing;
$mail->approve_mail($email,$msg);

echo"USER CREATED SUCCESS FULLY EMAIL SENT WITH DETAILS";



}




}

}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_admin"){

$query="SELECT * FROM user where is_approved='Approved' AND user_id='{$id}'";

$result=mysqli_query($connection,$query);
if ($result->num_rows>0) {

$update_admin_data=mysqli_fetch_assoc($result);



?>
<div class=" bg-dark text-warning my-4 " style="border: 15px solid black ; border-style: groove; padding: 40px "  >
<h1 class="text-warning" >UPDATE YOUR ACCOUNT</h1>


<img class="rounded-pill  my-5"  style="width: 400px;height: 400px"  src="../<?php  echo $update_admin_data['user_image']; ?> ">

<div class="row mb-4">
    <div class="col">


      <div class="form-outline">
        <input type="text" id="admin_form6Example1" value="<?php echo $update_admin_data['first_name'];  ?>"  required name="first_name" class="form-control" />
        <label class="form-label"  for="admin_form6Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="admin_form6Example2"  value="<?php echo $update_admin_data['last_name'];  ?>"  name="last_name" class="form-control" />
        <label class="form-label"  for="admin_form6Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text"   value="<?php echo $update_admin_data['password'];  ?>" name="create_password" id="admin_form6Example3" class="form-control" />
    <label class="form-label" for="admin_form6Example3">PASSWORD</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" value="<?php  echo $update_admin_data['password'] ?>"  name="confirm_password" id="admin_form6Example4" class="form-control" />
    <label class="form-label" for="admin_form6Example4">CONFIRM PASSWORD</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email"  value="<?php echo $update_admin_data['email'];  ?>" name="email" id="admin_form6Example5" class="form-control" />
    <label class="form-label" for="admin_form6Example5">Email</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="date" value="<?php echo $update_admin_data['date_of_birth'] ?>"  name="date_of_birth" id="admin_form6Example6" class="form-control" />
    <label class="form-label" for="admin_form6Example6">DATE OF BIRTH</label>
  </div>


<div class="form-outline mb-4">
    

 <label>
   Male
</label>

<?php  

if ($update_admin_data['gender']=='Male') {
  

?>
   <input type="radio" value="Male" id="admin_male" name="gender" checked="" >
<?php

}

else{

?>

   <input type="radio" value="Male" id="admin_male" name="gender">

<?php


}

    ?>
<!--    <input type="radio" value="Male" id="male" name="gender"> -->
   
   <label>  Female
</label>

<?php

if ($update_admin_data['gender']=='Female') {

?>

    <input type="radio" value="Female" id="admin_female" name="gender" checked="">

<?php


  
}
else{


?>
    
    <input type="radio" value="Female" id="admin_female" name="gender">

<?php

}


?><!-- 
    <input type="radio" value="Female" id="female" name="gender"> -->
<!-- 
    <label class="form-label" for="form6Example9">GENDER</label> -->
  </div>



 <div class="form-outline mb-4">
    <!-- <input type="text" name="confirm_password" id="form6Example10" class="form-control" /> -->
<input  type="file" name="img"   id="admin_form6Example10" class="form-control" required >

    <label class="form-label" for="admin_form6Example10">PROFILE IMAGE</label>
  </div>


  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea name="address"   class="form-control" id="admin_form6Example7" rows="4">
      <?php  echo $update_admin_data['address'] ?>

    </textarea>
    <label class="form-label" for="admin_form6Example7">ADDRESS</label>
  </div>



  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
<!-- 
     <input type="submit" onclick="add_user()" name="create" value="CREATE" class="btn btn-dark btn-block mb-4 " > -->

<button onclick="update_admin(<?php echo $id ?>)" class="btn btn-warning btn-block mb-4 " > UPDATE </button>
<button onclick="cancel_update()" class="btn btn-danger text-light btn-block mb-4  " style="margin-left: 30px" > CANCEL </button>
  </div>




  
<!-- real form start -->

</div>




<?php



}






}





if (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_admin_with_image"){




 $realname = $img['name'];
     
     $temp_name = $img['tmp_name'];
    
    $servername = time()."_".$realname;

  
  $profile_path="/user_profiles/".$servername;
/*
move_uploaded_file($temp_name, "../user_profiles/".$servername);*/


$query="UPDATE `user` SET first_name='{$first_name}', 
last_name='{$last_name}',
 date_of_birth='{$birth}',
 address='{$address}',
  gender='{$gender}' ,user.`user_image`='{$profile_path}',
  user.`updated_at`='{$time}',
  user.`email`='{$email}',
  user.`password`='{$create_password}'
  
  WHERE user.`user_id`='{$admin_update_id}'";





$result=mysqli_query($connection,$query);

if ($result) {


move_uploaded_file($temp_name, "../user_profiles/".$servername);
  
  echo "USER UPDATED WITH PROFILE SUCCESSFULLY";
}
else{

  echo"USER UPDATE FAILED";
}


}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_admin_without_image"){



$query="SELECT * FROM user where is_approved='Approved' AND user_id='{$admin_update_id}'";

$result=mysqli_query($connection,$query);




if ($result->num_rows>0) {

$selected_data=mysqli_fetch_assoc($result);

$profile_path=$selected_data['user_image'];

}



$query2="UPDATE `user` SET first_name='{$first_name}', 
last_name='{$last_name}',
 date_of_birth='{$birth}',
 address='{$address}',
  gender='{$gender}' ,user.`user_image`='{$profile_path}',
  user.`updated_at`='{$time}',
  user.`email`='{$email}',
  user.`password`='{$create_password}'
  
  WHERE user.`user_id`='{$admin_update_id}'";





$result2=mysqli_query($connection,$query2);


/*
$result=$database->update_user_by_user($admin_update_id,$first_name,$last_name,$profile_path,$birth,$address,$gender,$email,$create_password,$time);*/

if ($result2) {

  
  echo "USER UPDATED WITHOUT PROFILE SUCCESSFULLY";
}
else{

  echo"USER UPDATE FAILED";
}


}




}


else{
$error_msg.="<li>PLZ LOGIN FIRST ...! </li>";

 header("location:../index.php?msg=$error_msg");

}




?>