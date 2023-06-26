<?php

session_start();

if (isset($_SESSION['user_id'])) {

$admin_id=$_SESSION['user_id'];

// require_once("../database_connection/connection.php");

  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

  date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');


extract($_FILES);
extract($_REQUEST);


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_approved_users") {
?>
    <thead>
        <tr style="font-size: 15px;" >
            <th>PROFILE IMAGE</th>
            <th>SR</th>
            <th>Name</th>
           
            <th>email</th>
           
            <th>gender</th>
            
            <th>Action</th>
            <th>EDIT USER INFO</th>
        </tr>
    </thead>
    <tbody>
    <?php
   
$sr=0;



// $result2 = $database->show_users_approved($limit,$end_limit);

$result2=$database->show_users_approved($limit,$end_limit,$admin_id);

// $result2 = $database->show_all_approvde_users();

    while ($data=mysqli_fetch_assoc($result2)) { 
$sr++;

    ?>  
        <tr>
            <td><img  class="rounded-pill" style="width:100px;height: 100px "  src="../<?php echo $data['user_image']  ?>"></td>

            <td><?php echo $sr; ?></td>
            <td><?php echo $data['first_name']." ".$data['last_name']  ?></td>
            <td><?php echo $data['email']  ?></td>
            
            <td><?php echo $data['gender']  ?></td>
            
        
          
                        <td>
            	<?php if ($data['is_active']=="Active"): ?>

 <button onclick="inactive_user(<?php echo  $data['user_id'] ?>)" class="bg-danger" id="inactive" value="<?php echo  $data['user_id'] ?>">INACTIVE</button>

<?php elseif ($data['is_active']=="InActive"): ?>
       <button onclick="active_user(<?php echo  $data['user_id'] ?>)" id="active" value="<?php echo  $data['user_id'] ?>" class="bg-warning">Active</button>
<?php endif; ?>


            </td>
            <td>
            	<button onclick="edit_user(<?php echo  $data['user_id'] ?>)" class="bg-warning" id="edit" value="<?php echo  $data['user_id'] ?>">EDIT</button>
            </td>
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
            
            <th>Action</th>
            <th>EDIT USER INFO</th>
        </tr>
    </tfoot>
<?php
}


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "inactive_user") {
    
$result = $database->inactive_user($id);

if ($result) {
        echo "<h1 style='color:green'>ACCOUNT INACTIVATED  SUCCESSFULLY</h1>";

$result = $database->select_approve_user($id);

        $data=mysqli_fetch_assoc($result);


$msg="DEAR CUSTOMER ".$data['first_name']." ".$data['last_name']." YOUR USER YOUR ACCOUNT HAS BEEN DEACTIVATED NOW YOU CAN LOGIN IN OUR WEBSITE TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU";

 $Deactivate= new mailing;



$Deactivate->approve_mail($data['email'],$msg);


    }


    else{

        echo "<h1 style='color:red'> ACCOUNT INACTIVATED FAILED...!</h1>";
    }


}

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "active_user") {
    
$result = $database->active_user($id);

if ($result) {
        echo "<h1 style='color:green'>ACCOUNT ACTIVATED  SUCCESSFULLY</h1>";

$result = $database->select_approve_user($id);

        $data=mysqli_fetch_assoc($result);


$msg="DEAR CUSTOMER ".$data['first_name']." ".$data['last_name']." YOUR USER YOUR ACCOUNT HAS BEEN ACTIVATED NOW YOU CAN LOGIN IN OUR WEBSITE TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU";

 $activate= new mailing;



$activate->approve_mail($data['email'],$msg);


    }


    else{

        echo "<h1 style='color:red'> ACCOUNT ACTIVATED FAILED...!</h1>";
    }


}


// elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_edit_panel") {
//     $edit= new panels;
//  $edit->edit_form();

// }

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "edit_user") {
    
$result = $database->edit_user($id);

if ($result->num_rows>0) {

    $data=mysqli_fetch_assoc($result);

 $edit= new panels;
 $edit->edit_form($data['first_name'],$data['last_name'],$data['date_of_birth'],$data['address'],$data['gender'],$data['user_id'],$data['role_id'],$data['user_image']);

       
    }


    else{

        echo " INFORMATION FETCHED FAILED...!";
    }


}




// real update_user end


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_user") {
    


$realname = $bg_img['name'];
     
     $temp_name = $bg_img['tmp_name'];
    
    $servername = time()."_".$realname;

  
   $user_updated_image_path="/user_profiles/".$servername;

$result = $database->update_user($user_id,$first_name,$last_name,$user_updated_image_path,$birth,$address,$gender,$role_id,$time);

if ($result) {

move_uploaded_file($temp_name, "../user_profiles/".$servername);

  
$result = $database->select_approve_user($user_id);

        $data=mysqli_fetch_assoc($result);


$msg="DEAR USER  YOUR ACCOUNT HAS BEEN UPDATED WITH THE DETAILS


FIRST_NAME = ".$data['first_name']."

LAST_NAME = ".$data['last_name']."

DATE OG BIRTH = ".$data['date_of_birth']."

ADDRESS = ".$data['address']."

GENDER = ".$data['gender']."

TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU";

 $update= new mailing;



$update->approve_mail($data['email'],$msg);

      echo "<h1 style='color:green'>ACCOUNT UPDATE  SUCCESSFULLY</h1>";
    }


    else{

        echo "<h1 style='color:red'> ACCOUNT UPDATE FAILED...!</h1>";
    }


}


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_user_with_out_profile_image") {
    




$fetch=$database->select_users_approved($user_id);

if ($fetch->num_rows>0) {
    $fetch_data=mysqli_fetch_assoc($fetch);

$user_updated_image_path=$fetch_data['user_image'];

}


$result = $database->update_user($user_id,$first_name,$last_name,$user_updated_image_path,$birth,$address,$gender,$role_id,$time);

if ($result) {


  
$result = $database->select_approve_user($user_id);

        $data=mysqli_fetch_assoc($result);


$msg="DEAR USER  YOUR ACCOUNT HAS BEEN UPDATED WITH THE DETAILS


FIRST_NAME = ".$data['first_name']."

LAST_NAME = ".$data['last_name']."

DATE OG BIRTH = ".$data['date_of_birth']."

ADDRESS = ".$data['address']."

GENDER = ".$data['gender']."

TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU";

 $update= new mailing;



$update->approve_mail($data['email'],$msg);

      echo "<h1 style='color:green'>ACCOUNT UPDATE  SUCCESSFULLY</h1>";
    }


    else{

        echo "<h1 style='color:red'> ACCOUNT UPDATE FAILED...!</h1>";
    }


}






// check update user with form data end

if (isset($_REQUEST['action']) && $_REQUEST['action'] =="showdata") {

$result = $database->search_approved_user($data);


if ($result->num_rows>0){


?>
    <thead>
        <tr>
              <th>PROFILE IMAGE</th>
            <th>SR</th>
            <th>Name</th>
           
            <th>email</th>
           
            <th>gender</th>
            
            <th>Action</th>
            <th>EDIT USER INFO</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
$sr=0;



   
 while ($data=mysqli_fetch_assoc($result)) { 
$sr++;
?>  
        <tr>
            <td><img style="width:50px;height: 50px "  src="../<?php echo $data['user_image']  ?>"></td>

            <td><?php echo $sr; ?></td>
            <td><?php echo $data['first_name']." ".$data['last_name']  ?></td>
            <td><?php echo $data['email']  ?></td>
            
            <td><?php echo $data['gender']  ?></td>
            
        
          
                        <td>
                <?php if ($data['is_active']=="Active"): ?>

 <button onclick="inactive_user(<?php echo  $data['user_id'] ?>)" class="bg-danger" id="inactive" value="<?php echo  $data['user_id'] ?>">INACTIVE</button>

<?php elseif ($data['is_active']=="InActive"): ?>
       <button onclick="active_user(<?php echo  $data['user_id'] ?>)" id="active" value="<?php echo  $data['user_id'] ?>" class="bg-warning">Active</button>
<?php endif; ?>


            </td>
            <td>
                <button onclick="edit_user(<?php echo  $data['user_id'] ?>)" class="bg-warning" id="edit" value="<?php echo  $data['user_id'] ?>">EDIT</button>
            </td>
        </tr>
    <?php

}



?>
    </tbody>
    <tfoot>
        <tr>
              <th>PROFILE IMAGE</th>
            <th>SR</th>
            <th>Name</th>
           
            <th>email</th>
           
            <th>gender</th>
            
            <th>Action</th>
            <th>EDIT USER INFO</th>
        </tr>
    </tfoot>
<?php

    }


else{
echo"<h1 style='color:red;'> NO RECORD PRESENT <h1>";

}


}


}

else{


$error_msg.="<li>PLZ LOGIN FIRST ...! </li>";

 header("location:../index.php?msg=$error_msg");

}


?>