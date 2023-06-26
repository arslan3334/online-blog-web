<?php

session_start();


$id=$_SESSION['user_id'];


  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);

date_default_timezone_set('Asia/karachi');

$time=date('Y-m-d H:i:s');


extract($_FILES);
extract($_REQUEST);


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "create_page"){

if ($blog_title !="" && $post_per_page!="" && $bg_img!="") {
	
$realname = $bg_img['name'];
     
     $temp_name = $bg_img['tmp_name'];
    
    $servername = time()."_".$realname;

  
   $background_image_path="/admin/images/".$servername;

move_uploaded_file($temp_name, "../admin/images/".$servername);

$status="Active";

$result = $database->insert_page($id, $blog_title, $post_per_page, $background_image_path,  $status, $time);


if ($result) {
  
echo "PAGE CREATED SUCCESSFULLY";



} else {
    
echo "PAGE CREATION FAILED";


}


}
else{

echo"please fill all fields ";

}



}


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "create_catagory"){

  $category_title = $_REQUEST['category_title'];
  $category_description = $_REQUEST['category_description'];
  
  if ($category_title !="" && $category_description!="" ) {
  
    $result = $database->insert_category($category_title, $category_description, $time);
  
    if ($result) {
      echo "category added SUCCESSFULLY";
    }
    else{
      echo "category add failed";
    }
  
  }
  else{
    echo "please fill all fields";
  }
}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_catagories"){

$result=$database->select_catagory();


if ($result->num_rows>0) {

?>
    <thead>
        <tr style="font-size: 15px;" >
            <th>SR</th>
            <th>CATAGORY TITLE</th>
           
            <th>CATAGORY DESCRIPTION</th>
            <th>STATUS</th>
            <th>Action</th>
            <th>EDIT CATAGORY </th>
            
        </tr>
    </thead>
    <tbody>
    <?php
   
$sr=0;







    while ($data=mysqli_fetch_assoc($result)) { 
$sr++;

    ?>  
        <tr>
            

            <td><?php echo $sr; ?></td>
            <td><?php echo $data['category_title']?></td>
            <td><?php echo $data['category_description']  ?></td>
            <td><?php echo $data['category_status']  ?></td>
            
            
            
        
          
                        <td>
              <?php if ($data['category_status']=="Active"): ?>

 <button onclick="deactivate_category(<?php echo $data['category_id'] ?>)" class="bg-danger" id="inactive" >DEACTIVE</button>

<?php elseif ($data['category_status']=="InActive"): ?>
       <button onclick="active_category(<?php echo  $data['category_id'] ?>)" id="active"  class="bg-warning">Activate</button>
<?php endif; ?>


            </td>

            <td><button onclick="edit_category(<?php echo  $data['category_id'] ?>)" id="active"  class="bg-warning">EDIT</button></td>
        </tr>



    <?php
    }
    ?>
    </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
            <th>SR</th>
            <th>CATAGORY TITLE</th>
            <th>CATAGORY DESCRIPTION</th>
            <th>STATUS</th>
            <th>Action</th>
            <th>EDIT CATAGORY </th>
        </tr>
    </tfoot>
<?php
  




}





}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "deactivate_catagory"){


$category_status="InActive";

 $result=$database->operate_category($category_id,$category_status);


 if ($result) {
   echo"CATAGORY DEACTIVATED SUCCESSFULLY ";
 }




}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "activate_catagory"){


$category_status="Active";

 $result=$database->operate_category($category_id,$category_status);


 if ($result) {
   echo"CATAGORY ACTIVATED SUCCESSFULLY ";
 }




}




if (isset($_REQUEST['action']) && $_REQUEST['action'] == "edit_catagory_panel"){

$result=$database->select_catagory_by_id($category_id);
 
 $data=mysqli_fetch_assoc($result);


$show_edit_catagory= new panels;

 $show_edit_catagory->edit_catagory_panel($data['category_id'],$data['category_title'],$data['category_description']);


}





if (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_catagory"){

$result = $database->update_category($category_id,$category_title,$category_description,$time);


if ($result) {
  
echo"CATEGORY UPDATED SUCCESSFULLY";

}


}


// check add post start

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "add_post"){




$realname = $post_img['name'];
$temp_name = $post_img['tmp_name'];

    
    $servername = time()."_".$realname;

  
   $background_image_path="/admin/images/".$servername;




$status="Active";

$result = $database->insert_post($post_blog_id,$post_title,$post_summary,$post_description,$background_image_path,$post_comment_id,$status,$time);



if ($result) {
  
  move_uploaded_file($temp_name, "../admin/images/".$servername);

   $fileCount = count($_FILES['post_attach_file']['name']);


 // $last_insert_id = $database->last_insert_id;

 //  $result2=$database->insert_post_attch_file($last_insert_id, $real_file_name, $post_file_path,$status, $time);
//   }

$successCount = 0;

for ($i = 0; $i < $fileCount; $i++) {
  $real_file_name = $_FILES['post_attach_file']['name'][$i];
  $temp_file_name = $_FILES['post_attach_file']['tmp_name'][$i];
  $file_servername = time() . "_" . $real_file_name;
  $post_file_path = "/admin/post_attchement/".$file_servername;

  if (move_uploaded_file($temp_file_name, "../admin/post_attchement/".$file_servername)) {
    $successCount++;

     $last_insert_id = $database->last_insert_id;

   $result2=$database->insert_post_attch_file($last_insert_id, $real_file_name, $post_file_path,$status, $time);


     if ($successCount > 0) {
        echo "{$successCount} files uploaded and inserted successfully.";
    } else {
        echo "No files uploaded.";
    }
}


}


 $last_insert_id2 = $database->last_insert_id;

$result3=$database->insert_post_catagory($last_insert_id2,$post_catagory_id,$time);


 $result_follower=$database->fetch_follower_by_blog_id($post_blog_id);

 if ($result_follower->num_rows>0) {
   

while ($follower=mysqli_fetch_assoc($result_follower)) {
  


$follow_msg="DEAR user ".$follower['first_name']." ".$follower['last_name']." A NEW POST HAS BEEN ADDED ON THE PAGE  ".$follower['blog_title'] ."  THAT YOU FOLLOWED  GO  CHECK THAT POST NOW";

 $follow_email= new mailing;

$follow_email->approve_mail($follower['email'],$follow_msg);



}

 }


}


}





// check add post end


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "add_post_without_file"){

$realname = $post_img['name'];
$temp_name = $post_img['tmp_name'];

    
    $servername = time()."_".$realname;

  
   $background_image_path="/admin/images/".$servername;

$status="Active";

$result = $database->insert_post($post_blog_id,$post_title,$post_summary,$post_description,$background_image_path,$post_comment_id,$status,$time);

if ($result) {
  
    move_uploaded_file($temp_name, "../admin/images/".$servername);
 $last_insert_id2 = $database->last_insert_id;


$result3=$database->insert_post_catagory($last_insert_id2,$post_catagory_id,$time);


if ($result3) {




$result_follower=$database->fetch_follower_by_blog_id($post_blog_id);

 if ($result_follower->num_rows>0) {
   

while ($follower=mysqli_fetch_assoc($result_follower)) {
  


$follow_msg="DEAR user ".$follower['first_name']." ".$follower['last_name']." A NEW POST HAS BEEN ADDED ON THE PAGE  ".$follower['blog_title'] ."  THAT YOU FOLLOWED  GO  CHECK THAT POST NOW";

 $follow_email2= new mailing;

$follow_email2->approve_mail($follower['email'],$follow_msg);

echo"POST ADDED SUCCESSFULLY";

}



}
else{

  echo "added faild ";
}



}


}


}


/*if (isset($_REQUEST['action']) && $_REQUEST['action'] == "add_post"){




$realname = $post_img['name'];
$temp_name = $post_img['tmp_name'];

    
    $servername = time()."_".$realname;

  
   $background_image_path="/admin/images/".$servername;




$status="Active";

// $result = $database->insert_post($post_blog_id,$post_title,$post_summary,$post_description,$background_image_path,$post_comment_id,$status,$time);

$result = $database->insert_post($post_blog_id,$post_title,$post_summary,$post_description,$background_image_path,$post_comment_id,$status,$time);



if ($result) {
  
  move_uploaded_file($temp_name, "../admin/images/".$servername);

$real_file_name = $post_attach_file['name'];
     
     $temp_file_name = $post_attach_file['tmp_name'];
    
    $file_servername = time()."_".$real_file_name;

  
   $post_file_path="/admin/post_attchement/".$file_servername;




 $last_insert_id = $database->last_insert_id;

  $result2=$database->insert_post_attch_file($last_insert_id, $real_file_name, $post_file_path,$status, $time);

if ($result2) {
  
 $last_insert_id2 = $database->last_insert_id;

move_uploaded_file($temp_file_name, "../admin/post_attchement/".$file_servername);

$result3=$database->insert_post_catagory($last_insert_id2,$post_catagory_id,$time);


if ($result3) {

echo"POST ADDED SUCCESSFULLY";


}
else{

  echo "added faild ";
}



}


}


}
*/



elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_post_without_image"){

$fetch=$database->select_post_by_post_id_for_blog_page($post_id);

if ($fetch->num_rows>0) {
 
 $data3=mysqli_fetch_assoc($fetch);

 $feature_image=$data3['featured_image'];


}

 $result_update = $database->update_post($post_id,$post_blog_id,
 $post_title,$post_summary,$post_description,$feature_image,$post_comment_id,$time);

 if ($result_update) {
  
 $status='InActive';

   $result_update_attach_file=$database->update_post_attach($post_id,$status,$time);

   $fileCount2 = count($_FILES['post_attach_file']['name']);


 $successCount2 = 0;

 $status3='Active';
 for ($i = 0; $i < $fileCount2; $i++) {
   $real_file_name = $_FILES['post_attach_file']['name'][$i];
   $temp_file_name = $_FILES['post_attach_file']['tmp_name'][$i];
  $file_servername = time() . "_" . $real_file_name;
   $post_file_path = "/admin/post_attchement/".$file_servername;

   if (move_uploaded_file($temp_file_name, "../admin/post_attchement/".$file_servername)) {
     $successCount2++;

      // $last_insert_id = $database->last_insert_id;

    $result22=$database->insert_post_attch_file($post_id, $real_file_name, $post_file_path,$status3, $time);


     if ($successCount2 > 0) {
         echo "{$successCount2} files uploaded and inserted successfully.";
     } 
     else {
        echo "No files uploaded.";
     }
 }


 }

 }
}//end


// update post with out image end





elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_post_filled"){

$realname = $post_img['name'];
$temp_name = $post_img['tmp_name'];

 $servername = time()."_".$realname;

  
   $background_image_path="/admin/images/".$servername;




$result = $database->update_post($post_id,$post_blog_id, $post_title,$post_summary,$post_description,$background_image_path,$post_comment_id,$time);



if ($result) {
  
  move_uploaded_file($temp_name, "../admin/images/".$servername);

$status='InActive';

  $result_update_attach=$database->update_post_attach($post_id,$status,$time);

   $fileCount = count($_FILES['post_attach_file']['name']);


$successCount = 0;

$status2='Active';
for ($i = 0; $i < $fileCount; $i++) {
  $real_file_name = $_FILES['post_attach_file']['name'][$i];
  $temp_file_name = $_FILES['post_attach_file']['tmp_name'][$i];
  $file_servername = time() . "_" . $real_file_name;
  $post_file_path = "/admin/post_attchement/".$file_servername;

  if (move_uploaded_file($temp_file_name, "../admin/post_attchement/".$file_servername)) {
    $successCount++;

     // $last_insert_id = $database->last_insert_id;

   $result2=$database->insert_post_attch_file($post_id, $real_file_name, $post_file_path,$status2, $time);


     if ($successCount > 0) {
        echo "{$successCount} files uploaded and inserted successfully.";
    } else {
        echo "No files uploaded.";
    }
}


}


 // $last_insert_id2 = $database->last_insert_id;

// $result3=$database->insert_post_catagory($last_insert_id2,$post_catagory_id,$time);
 $result3=$database->update_post_category($post_id,$post_catagory_id,$time);


}


}





elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_post_without_file_and_image"){



$fetch=$database->select_post_by_post_id_for_blog_page($post_id);

if ($fetch->num_rows>0) {
 
 $data=mysqli_fetch_assoc($fetch);

 $feature_image=$data['featured_image'];
}


$result = $database->update_post($post_id,$post_blog_id, $post_title,$post_summary,$post_description,$feature_image,$post_comment_id,$time);


if ($result) {
  

 $result3=$database->update_post_category($post_id,$post_catagory_id,$time);


echo "UPDATED POST WITH OUT FILE AND IMAGE SUCCESFULYY";

}


}
















elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_post_without_file"){


$realname = $post_img['name'];
$temp_name = $post_img['tmp_name'];

    
    $servername = time()."_".$realname;

  
   $background_image_path="/admin/images/".$servername;




$result = $database->update_post($post_id,$post_blog_id, $post_title,$post_summary,$post_description,$background_image_path,$post_comment_id,$time);


  

if ($result) {
  
   move_uploaded_file($temp_name, "../admin/images/".$servername);


$result3=$database->update_post_category($post_id,$post_catagory_id,$time);

echo "UPDATED POST WITH OUT FILE";

}



}
//end





















if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_post"){


$result=$database->select_post_by_user_id($id);


if ($result->num_rows>0) {


?>
    <thead>
        <tr style="font-size: 15px;" >
               <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>STATUS</th>
            <th>COMMENT PERMISSION</th>
            
            <th>Action</th>
            <th>EDIT POST </th>
            <th>GO TO POST </th>
            <th>MANAGE COMENTS </th>
            <th>MANAGE ATTACHMENTS</th>
        </tr>
    </thead>
    <tbody>
    <?php
   
$sr=0;



while ($data=mysqli_fetch_assoc($result)) {




$sr++;

    ?>  
        <tr>
            

            <td><?php echo $sr; ?></td>
            <!-- <td><?php echo $data['featured_image']?></td> -->
            <td>  <img  style="width:50px;height: 50px " src="../<?php echo $data['featured_image']?>"> </td>
            <td><?php echo $data['post_title']?></td>
            <td><?php echo $data['post_summary']  ?></td>


            <td><?php echo $data['post_status']  ?></td>
            <td><?php

            if ($data['is_comment_allowed']=="1") {
              

              echo "YES";
            }
            else{

              echo "NO";
            }





             ?></td>
             
            
          
                        <td>
              <?php if ($data['post_status']=="Active"): ?>

 <button onclick="deactivate_post(<?php echo $data['post_id'] ?>)" class="bg-danger text-light rounded-pill " id="inactive" >DEACTIVE</button>

<?php elseif ($data['post_status']=="InActive"): ?>
       <button onclick="active_post(<?php echo  $data['post_id'] ?>)" id="active"  class="bg-warning  rounded-pill ">Activate</button>
<?php endif; ?>


            </td>

            <td><button style="padding: 10px" onclick="edit_post(<?php echo  $data['post_id'] ?>)" id="active"  class="bg-warning  rounded-pill "  >EDIT</button></td>

 <td><!-- <a style="text-decoration: none;" class="bg-warning text-dark rounded "href="blog.php?blog_id=<?php echo $data['blog_id']; ?>">GO</a> -->
   
<?php

                if ($data['post_status']=="Active") {
                   

                   ?>
                     <a href="blog.php?blog_id=<?php echo  $data['blog_id'];  ?>" class="bg-warning text-dark  rounded-pill  " style="text-decoration: none;padding: 10px"    >GO </a>


                   <?php
                }
                else{

                    ?>
                      <a class="bg-danger rounded-pill text-light " style="text-decoration: none;color:white;font-size: 12px;padding: 10px;">DEACTIVATED</a>
                    <?php
                }


                ?>






 </td>

 <td>   <button  onclick="show_comments(<?php echo $data['post_id'];  ?>  )" class="bg-warning text-dark rounded-4"  >COMMENTS</button> </td>


 <td>   <button  onclick="show_attchments(<?php echo $data['post_id'];  ?>  )" class="bg-warning text-dark rounded-4"  >ATTACHMENTS</button> </td>
        </tr>



    <?php



}


?>
    </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
            <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>STATUS</th>
            <th>COMMENT PERMISSION</th>
            
            <th>Action</th>
            <th>EDIT POST </th>
            <th>GO TO POST </th>

            <th>MANAGE COMENTS </th>
            <th>MANAGE ATTACHMENTS</th>
        </tr>
    </tfoot>
<?php




}

}


/*if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_post"){


$result=$database->select_post_by_user_id($id);


if ($result->num_rows>0) {


?>
    <thead>
        <tr style="font-size: 15px;" >
               <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>STATUS</th>
            <th>COMMENT PERMISSION</th>
            
            <th>Action</th>
            <th>EDIT POST </th>
            <th>GO TO POST </th>
            <th>MANAGE COMENTS </th>
        </tr>
    </thead>
    <tbody>
    <?php
   
$sr=0;



while ($data=mysqli_fetch_assoc($result)) {




$sr++;

    ?>  
        <tr>
            

            <td><?php echo $sr; ?></td>
            <!-- <td><?php echo $data['featured_image']?></td> -->
            <td>  <img  style="width:50px;height: 50px " src="../<?php echo $data['featured_image']?>"> </td>
            <td><?php echo $data['post_title']?></td>
            <td><?php echo $data['post_summary']  ?></td>


            <td><?php echo $data['post_status']  ?></td>
            <td><?php

            if ($data['is_comment_allowed']=="1") {
              

              echo "YES";
            }
            else{

              echo "NO";
            }





             ?></td>
             
            
          
                        <td>
              <?php if ($data['post_status']=="Active"): ?>

 <button onclick="deactivate_post(<?php echo $data['post_id'] ?>)" class="bg-danger" id="inactive" >DEACTIVE</button>

<?php elseif ($data['post_status']=="InActive"): ?>
       <button onclick="active_post(<?php echo  $data['post_id'] ?>)" id="active"  class="bg-warning">Activate</button>
<?php endif; ?>


            </td>

            <td><button onclick="edit_post(<?php echo  $data['post_id'] ?>)" id="active"  class="bg-warning">EDIT</button></td>

 <td><!-- <a style="text-decoration: none;" class="bg-warning text-dark rounded "href="blog.php?blog_id=<?php echo $data['blog_id']; ?>">GO</a> -->
   
<?php

                if ($data['post_status']=="Active") {
                   

                   ?>
                     <a href="blog.php?blog_id=<?php echo  $data['blog_id'];  ?>" class="bg-warning text-dark " style="text-decoration: none;"   >GO </a>


                   <?php
                }
                else{

                    ?>
                      <a class="bg-danger " style="text-decoration: none;color:white;font-size: 12px">DEACTIVATED</a>
                    <?php
                }


                ?>






 </td>

 <td>   <button  onclick="show_comments(<?php echo $data['post_id'];  ?>  )" class="bg-warning text-dark rounded-4"  >COMMENTS</button> </td>
        </tr>



    <?php



}


?>
    </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
            <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>STATUS</th>
            <th>COMMENT PERMISSION</th>
            
            <th>Action</th>
            <th>EDIT POST </th>
            <th>GO TO POST </th>

            <th>MANAGE COMENTS </th>
        </tr>
    </tfoot>
<?php




}

}*/


//{this is usefull to show attachments of post then operate on them
 //(SELECT * FROM post INNER JOIN post_atachment ON post.`post_id`=  post_atachment.`post_id` WHERE post.`post_id`=40)}





  


















if (isset($_REQUEST['action']) && $_REQUEST['action'] == "deactivate_post"){

$status="InActive";

$result=$database->operate_post_by_post_id($post_id,$status);


if ($result) {
  
echo "POST DE ACTIVATED";

}


}




if (isset($_REQUEST['action']) && $_REQUEST['action'] == "activate_post"){

$status="Active";

$result=$database->operate_post_by_post_id($post_id,$status);


if ($result) {
  
echo "POST  ACTIVATED";

}


}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "edit_post"){


$result=$database->select_post_by_post_id($post_id);

if ($result->num_rows>0) {
  

  $data1= mysqli_fetch_assoc($result);


}




?>
<fieldset class="bg-dark text-warning" style=" width: 800px"   >
  
<legend  >UPDATE POST</legend>

  
<table>
  
<tr>
  <th>POST TITLE</th>
  <td> <input class="rounded bg-secondary text-warning " type="text" id="update-post-title" required="" value="<?php echo $data1['post_title'];?>"  placeholder="Enter post title" > </td>

</tr>


<tr>
  <th>POST  SUMMARY</th>
  <td> <input type="text" class="rounded bg-secondary text-warning " id="update-post-summary" required="" value="<?php echo $data1['post_summary'];?>" placeholder="Enter Post summary" >  </td>

</tr>

<tr>
  <th>POST DESCRIPTION</th>
  <td> <textarea  class="rounded bg-secondary text-warning " id="update-post-description"  required=""  placeholder="Enter post description"  style="width: 500px;height: 250px"> <?php  echo $data1['post_description']; ?>   </textarea>  </td>

</tr>



<tr>
  <th>POST IMAGE</th>
  <td> <input type="file" id="update-post-img" >  </td>
  <br>

</tr>


<tr>
  <th>ATTACHMENT</th>
  <td> <input type="file" id="update-post-attach-file"  multiple="" >  </td>
  <br>

</tr>


<tr>
  <th>POST catagory</th>
  <td> 

  <select    id="update-post-catagory"  class="bg-secondary text-warning rounded " >
    <option value=" <?php echo $data1['category_id'] ?> ">
      <?php echo $data1['category_title'];  ?>
        
      </option>
    <?php

$result= $database->select_catagory_by_active();


if ($result->num_rows>0) {
  

while ($data=mysqli_fetch_assoc($result)) {
  
?>

<option value="<?php echo $data['category_id'];?>"  ><?php echo  $data['category_title'];  ?></option>


<?php


}


}



    ?>

  </select> 
  </td>

</tr>



<tr>
  
<th>comment Permission</th>

<td><select id="update-comment-permission"  class="bg-secondary text-warning   rounded">
  <option value="<?php echo $data1['is_comment_allowed']  ?>" >
  
<?php

if ($data1['is_comment_allowed']==1) {
  
  echo "YES";
}
else{

  echo "NO";
}

?>

</option>
<option value="1" >Yes</option>
<option value="2" >No</option>

</select> </td>

</tr>




<tr>
  
<th>SELECT PAGE</th>

<td>
  
<select class=" bg-secondary text-warning rounded" id="update-post-page" >
  <option value="<?php echo $data1['blog_id'] ?>">CURRENT SELECTED PAGE</option>

<?php

$result= $database->select_blog_by_user_id($id);


if ($result->num_rows>0) {
  

while ($data=mysqli_fetch_assoc($result)) {
  
?>

<option value="<?php echo $data['blog_id']; ?>"  ><?php echo $data['blog_title'];  ?></option>


<?php


}


}









?>


</select>

</td>



</tr>


<tr><td>
  
<input type="submit" onclick="update_post(<?php echo $data1['post_id'] ?>)" id="update-post" value="UPDATE"  class="bg-warning  rounded   "  style="width: 100px;margin-left: 150px;margin-top: 30px;"  > 
</td></tr>

</table>

</fieldset>





<?php

// UPDATE POST STILL REMAINS
}

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




if (isset($_REQUEST['action']) && $_REQUEST['action'] == "add_comment"){


$result=$database->add_comment_to_post($post_id,$user_id,$comment);

if ($result) {
  
echo"Comment ADDEDD SUCCESS FULLY";

}
else{

  echo"commen add failed";
}



}







if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_comments"){
  

$result=$database->select_post_comments_by_post_id_($post_id);


if ($result->num_rows>0) {




?>

    <thead>
        <tr style="font-size: 15px;" >
               <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>COMMENT</th>
            <th>COMMENT STATUS</th>
            
            
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
            

            <td><?php echo $sr; ?></td>
            <!-- <td><?php echo $data['featured_image']?></td> -->
            <td>  <img  style="width:50px;height: 50px " src="../<?php echo $data['featured_image']?>"> </td>
            <td><?php echo $data['post_title']?></td>
            <td><?php echo $data['post_summary']  ?></td>


            
            <td><?php echo $data['comment']  ?></td>
            <td><?php echo $data['is_active']  ?></td> 
            
          
                        <td>
             <!--  <?php if ($data['is_active']=="Active"): ?>

 <button onclick="deactivate_comment(<?php echo $data['post_comment_id'] ?>)" class="bg-danger" id="inactive" >DEACTIVE</button>

<?php elseif ($data['is_active']=="InActive"): ?>
       <button onclick="active_comment(<?php echo  $data['post_comment_id'] ?>)" id="active"  class="bg-warning">Activate</button>
<?php endif; ?> -->

<!-- check buttons -->

 <?php if ($data['is_active']=="Active"): ?>

 <button onclick="deactivate_comment(<?php echo $data['post_comment_id'] ?>,<?php  echo $post_id   ?>)" class="bg-danger" id="inactive" >DEACTIVE</button>

<?php elseif ($data['is_active']=="InActive"): ?>
       <button onclick="active_comment(<?php echo  $data['post_comment_id'] ?>,<?php echo $post_id   ?>)" id="active"  class="bg-warning">Activate</button>
<?php endif; ?>


            </td>

 
<!--  <td>   <button  onclick="hide_comments()" class="bg-warning text-dark rounded-4"  >HIDE COMMENTS</button> </td> -->
        </tr>



    <?php

}


?>
    </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
            <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>COMMENT</th>
            <th>COMMENT STATUS</th>
            <th>Action</th>
        </tr>
    </tfoot>
<?php




}


else{



?>

    <thead>
        <tr style="font-size: 15px;" >
               <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>COMMENT</th>
            <th>COMMENT STATUS</th>
            
            
            <th>Action</th>
           

        </tr>
    </thead>
    <tbody>
    <tr>

      <td>NO DATA</td>
             <td>NO DATA</td>
            <td>NO DATA</td>
            <td>NO DATA</td>
            
            <td>NO DATA</td>
            <td>NO DATA</td>
            
            
            <td>NO DATA</td>
      


    </tr>
    </tbody>
    <tfoot>
        <tr style="font-size: 15px;" >
            <th>SR</th>
             <th>POST IMAGE</th>
            <th>POST TITLE</th>
            <th>POST SUMMARY</th>
            
            <th>COMMENT</th>
            <th>COMMENT STATUS</th>
            <th>Action</th>
        </tr>
    </tfoot>
<?php












 
}

}




if (isset($_REQUEST['action']) && $_REQUEST['action'] == "deactivate_comment"){


$status='InActive';

$result=$database->operate_comment_by_post_id($post_comment_id,$status);

if ($result) {
  

  echo "COMMENT DEACTIVATED";
}




}



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "activate_comment"){


$status='Active';

$result=$database->operate_comment_by_post_id($post_comment_id,$status);

if ($result) {
  

  echo "COMMENT ACTIVATED";
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





if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_attchments"){

$result=$database->show_post_attachments_by_post_id($post_id);

if ($result->num_rows>0) {

$sr=0;

?>

<table cellpadding="20px" >
  <tr>
    <th>SRNO</th>
    <th>post_attachment_title</th>
    <th>STATUS</th>
    <th>CREATION TIME</th>
    <th>ACTION</th>

  </tr>


<?php

while ($data=mysqli_fetch_assoc($result)) {
 
 $sr++
?>

<tr>
  <td><?php    echo $sr;   ?></td>
  <td><?php echo $data['post_attachment_title'] ?></td>
    <td><?php echo $data['is_active'] ?></td>
    <td><?php echo $data['created_at'] ?></td>
<td>
    <?php
if ($data['is_active']=='Active') {
  ?>

<button class=" rounded-4  bg-danger text-light "  onclick="deactivate_attachment(<?php echo $data['post_atachment_id'] ?>,<?php echo $post_id; ?>)" >DEACTIVATE</button>
  <?php
}
else{

  ?>

<button class="  rounded-4 bg-warning text-dark" onclick="activate_attachment(<?php echo $data['post_atachment_id'] ?>,<?php echo $post_id; ?>)" >ACTIVATE</button>
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
else{

echo"</h1>NO ATTACHMENTS FOR THIS POST</h1>";

}



}


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "deactivate_attachment"){


$status='InActive';

$result=$database->operate_post_attachments_by_post_attachment_id($post_attachmnet_id,$status,$time);

if ($result) {
  
echo "ATTACHMENT DEACTIVATED SUCCESSFULLY";

}



}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "activate_attachment"){


$status='Active';

$result=$database->operate_post_attachments_by_post_attachment_id($post_attachmnet_id,$status,$time);

if ($result) {
  
echo "ATTACHMENT ACTIVATED SUCCESSFULLY";

}



}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "set_default_theme"){


$result=$database->select_theme_by_setting_key();

if ($result->num_rows>0) {
  
$delete=$database->delete_theme_by_setting_key();

if ($delete) {
  
$update=$database->insert_theme_by_admin($user_id,$font_size,$font_color,$background_color,$time);

if ($update) {
 
echo "THEME UPDATED SUCCESSFULLY ";

}


}


}


else{

$insert=$database->insert_theme_by_admin($user_id,$font_size,$font_color,$background_color,$time);

if ($insert) {
 
echo "THEME HAS BEEN SETTED";


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

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "show_theme"){




$all_user_themes=$database->select_theme_by_user_id($id);


if ($all_user_themes->num_rows>0) {
  
?>
<h1>MANAGE YOUR THEMES</h1>

<!-- <form> -->
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

<button  class="bg-warning text-dark" onclick="activate_theme(<?php  echo  $data['setting_id']; ?>)"  >ACTIVATE</button>
  <?php



}


?>


  </td>


</tr>


  <?php




}

?>

</table>
<!-- </form> -->
<?php

}



}



?>