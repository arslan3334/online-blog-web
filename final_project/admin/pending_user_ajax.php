<?php
session_start();
// require_once("../database_connection/connection.php");


if (isset($_SESSION['user_id'])) {




  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

extract($_REQUEST);

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_pending_users") {
?>
    <thead>
        <tr>
            <th>PROFILE IMAGE</th>
            <th>SR NO</th>
            <th> name</th>
           
            <th>email</th>
            
            <th>gender</th>
            <th>ROLE</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
    <?php
    
$sr=0;


$result2 = $database->show_users_pending($limit,$end_limit);

    while ($data=mysqli_fetch_assoc($result2)) { 
$sr++;

    ?>  
        <tr>
            <td ><img class=" rounded-5 "  style="width:90px;height: 90px "  src="../<?php echo $data['user_image']  ?>"></td>


            <td  ><?php echo $sr; ?></td>
            <td><?php echo $data['first_name']."  ".$data['last_name']  ?></td>
            
            <td><?php echo $data['email']  ?></td>
            
            <td><?php echo $data['gender']  ?></td>

            <td><?php 

            if ($data['role_id']=='1') {
               
               echo "admin";
            }else{



                echo "user";
            }








              ?></td>
            
           
          
            
            <td>
                <button onclick="approve_user(<?php echo  $data['user_id'] ?>)" id="approve" value="<?php echo  $data['user_id'] ?>" class="bg-warning">APPROVE</button>
                <button  onclick="reject_user(<?php echo  $data['user_id']?>)" class="bg-danger" id="reject" value="<?php echo  $data['user_id'] ?>">REJECT</button>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
    <tfoot>
        <tr>
            
            <th>PROFILE IMAGE</th>
            <th>SR NO</th>
            <th> name</th>
           
            <th>email</th>
            
            <th>gender</th>
            <th>ROLE</th>
            <th>Action</th>
        </tr>
    </tfoot>
<?php
}



elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "approve_user") {
    
// $query="UPDATE `user` SET is_approved='Approved' WHERE user.`user_id`='{$id}'";

$result = $database->approve_user($id);

       


if ($result) {
        echo "<h1 style='color:green' >ACCOUNT APPROVED  SUCCESSFULLY</h1>";


        $result = $database->select_approve_user($id);

        $data=mysqli_fetch_assoc($result);


$msg="DEAR CUSTOMER ".$data['first_name']." ".$data['last_name']." YOUR USER YOUR ACCOUNT HAS BEEN APPROVED NOW YOU CAN LOGIN IN OUR WEBSITE TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU";

 $approve= new mailing;



$approve->approve_mail($data['email'],$msg);


    }


    else{

        echo "<h1 style='color:red' ACCOUNT APPROVED  FAILED...!</h1>";
    }


}


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "reject_user") {
    
// $query="UPDATE `user` SET is_approved='Rejected' WHERE user.`user_id`='{$id}'";

$result = $database->reject_user($id);

if ($result) {
        echo "<h1 style='color:green' >ACCOUNT Rejected  SUCCESSFULLY</h1>";

        $result = $database->select_approve_user($id);

        $data=mysqli_fetch_assoc($result);

$msg="DEAR CUSTOMER ".$data['first_name']." ".$data['last_name']." YOUR USER YOUR ACCOUNT HAS BEEN REJECTED KINDLY TRY AGAIN WITH DIFFERENT EMAIL TO GET FURTHER DETAILS KINDLY CONTACT US THANKYOU";

 $reject= new mailing;

$reject->approve_mail($data['email'],$msg);

    }


    else{

        echo "<h1 style='color:red' ACCOUNT Rejected  FAILED...!</h1>";
    }


}


if (isset($_REQUEST['action']) && $_REQUEST['action'] =="showdata") {

$result = $database->search_pending_user($data);


if ($result->num_rows>0){


?>
    <thead>
        <tr>
            <th>PROFILE IMAGE</th>
            <th>SR NO</th>
            <th> name</th>
           
            <th>email</th>
            
            <th>gender</th>
            
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
$sr=0;



   
 while ($data=mysqli_fetch_assoc($result)) { 
$sr++;

?>  
        <tr>
            <td ><img class=" rounded-5 "  style="width:90px;height: 90px "  src="../<?php echo $data['user_image']  ?>"></td>


            <td  ><?php echo $sr; ?></td>
            <td><?php echo $data['first_name']."  ".$data['last_name']  ?></td>
            
            <td><?php echo $data['email']  ?></td>
            
            <td><?php echo $data['gender']  ?></td>
            
           
          
            
            <td>
                <button onclick="approve_user(<?php echo  $data['user_id'] ?>)" id="approve" value="<?php echo  $data['user_id'] ?>" class="bg-warning">APPROVE</button>
                <button  onclick="reject_user(<?php echo  $data['user_id']?>)" class="bg-danger" id="reject" value="<?php echo  $data['user_id'] ?>">REJECT</button>
            </td>
        </tr>
    <?php








}



?>
    </tbody>
    <tfoot>
        <tr>
            <th>PROFILE IMAGE</th>
             <th>SR NO</th>
            <th> name</th>
           
            <th>email</th>
            
            <th>gender</th>
            
            <th>Action</th>
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
