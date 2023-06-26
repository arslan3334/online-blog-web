<?php

session_start();
// require_once("../database_connection/connection.php");

if (isset($_SESSION['user_id'])) {




$id=$_SESSION['user_id'];


  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');


extract($_REQUEST);
extract($_FILES);

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_pages"){

?>
    <thead>
        <tr style="font-size: 15px;" >
            <th>BACK GROUND IMAGE</th>
            <th>SR</th>
            <th>PAGE TITLE</th>
           
            <th>POSTS PER PAGE</th>
            <th>STATUS</th>
           
            
            
            <th>Action</th>
            <th>EDIT PAGE </th>
            <th>GO TO PAGE </th>
        </tr>
    </thead>
    <tbody>
    <?php
   
$sr=0;



$result2 = $database->select_page($id);



    while ($data=mysqli_fetch_assoc($result2)) { 
$sr++;

    ?>  
        <tr>
            <td><img style="width:50px;height: 50px "  src="../<?php echo $data['blog_background_image']  ?>"></td>

            <td><?php echo $sr; ?></td>
            <td><?php echo $data['blog_title']?></td>
            <td><?php echo $data['post_per_page']  ?></td>
            <td><?php echo $data['blog_status']  ?></td>
            
            
            
        
          
                        <td>
            	<?php if ($data['blog_status']=="Active"): ?>

 <button onclick="deactivate_page(<?php echo $data['blog_id'] ?>)" class="bg-danger" id="inactive" value="<?php echo  $data['blog_id'] ?>">DEACTIVE</button>

<?php elseif ($data['blog_status']=="InActive"): ?>
       <button onclick="active_page(<?php echo  $data['blog_id'] ?>)" id="active" value="<?php echo  $data['blog_id'] ?>" class="bg-warning">Activate</button>
<?php endif; ?>


            </td>
            <td>
            	<button onclick="edit_page(<?php echo  $data['blog_id'] ?>)" class="bg-warning" id="edit" value="<?php echo  $data['blog_id'] ?>">EDIT</button>
            </td>

            <td>

                <?php

                if ($data['blog_status']=="Active") {
                   

                   ?>
                     <a href="blog.php?blog_id=<?php echo  $data['blog_id'];  ?>" class="bg-warning text-dark " style="text-decoration: none;"   >GO </a>


                   <?php
                }
                else{

                    ?>
                      <a class="bg-danger " style="text-decoration: none;color:white"   >DEACTIVATED</a>
                    <?php
                }


                ?>




             
            </td> 

        </tr>
    <?php
    }
    ?>
    </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
            <th>BACK GROUND IMAGE</th>
            <th>SR</th>
            <th>PAGE TITLE</th>
           
            <th>POSTS PER PAGE</th>
            <th>STATUS</th>
           
            
            
            <th>Action</th>
            <th>EDIT PAGE </th>
            <th>GO TO PAGE </th>
        </tr>
    </tfoot>
<?php


}


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "active_page"){


$blog_status='Active';

$result = $database->operate_page($page_id,$blog_status);

if ($result) {
	
	echo"<h1 class='text-success' >PAGE ACTIVATED SUCCESSLY</h1>";
}


}


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "deactive_page"){


$blog_status='InActive';

$result = $database->operate_page($page_id,$blog_status);

if ($result) {
	
	echo"<h1 class='text-success' >PAGE DEACTIVATED SUCCESSLY</h1>";
}


}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "edit_page"){

$result = $database->select_edit_page($id);

if ($result->num_rows>0) {

    $data=mysqli_fetch_assoc($result);

 $show_edit_page= new panels;
 $show_edit_page->edit_page($data['blog_id'],$data['blog_title'],$data['post_per_page']);

       
    }


    else{

        echo " INFORMATION FETCHED FAILED...!";
    }



}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_page"){


$realname = $bg_img['name'];
     
     $temp_name = $bg_img['tmp_name'];
    
    $servername = time()."_".$realname;

  
  $backgrung_image_path="/admin/updated_images/".$servername;

move_uploaded_file($temp_name, "../admin/updated_images/".$servername);

$result = $database->update_page($id,$blog_title,$post_per_page,$backgrung_image_path,$time);

if ($result) {
        echo "<h1 style='color:green'>PAGE UPDATE  SUCCESSFULLY</h1>";



    }



}



elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_page_without_image"){




$fetch=$database->select_blog_by_blog_id($id);


if ($fetch->num_rows>0) {
    
    $fetched_data=mysqli_fetch_assoc($fetch);

$blog_image=$fetched_data['blog_background_image'];

}



$result = $database->update_page($id,$blog_title,$post_per_page,$blog_image,$time);

if ($result) {
        echo "<h1 style='color:green'>PAGE UPDATE  SUCCESSFULLY</h1>";



    }



}



}
else{


$error_msg.="<li>PLZ LOGIN FIRST ...! </li>";

 header("location:../index.php?msg=$error_msg");

}







?>