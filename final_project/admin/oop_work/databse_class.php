<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;

require_once('PHPMailer/src/PHPMailer.php');
require 'PHPMailer/src/SMTP.php';

require 'PHPMailer/src/Exception.php';



class database{

       public $hostname 	= NULL;
		public $username 	= NULL;
		public $password 	= NULL;
		public $database 	= NULL;
		public $connection  = NULL;
		public $query 		= NULL;
		public $result 		= NULL;
// function start
		public function __construct($hostname,$username, $password, $database){

		 global $connection;
			$this->hostname = $hostname;		
			$this->username = $username;		
			$this->password = $password;		
			$this->database = $database;		
		
			mysqli_report(FALSE);
			$this->connection = mysqli_connect($this->hostname, $this->username,$this->password, $this->database);

			if(mysqli_connect_errno()){
				echo "<p style='color:red'>Database Connection Problem <b>Errro No:</b> ".mysqli_connect_errno()." Errro Message: ".mysqli_connect_error()."</p>";
			}

		}


public function show_users_approved($limit,$end_limit,$user_id){

  global $connection;
      $this->query = " SELECT * FROM `user` WHERE user.`is_approved`='Approved' 
       AND user.`role_id`='2' OR user.`user_id`='{$user_id}' LIMIT {$limit},{$end_limit};";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }

  // check function end


public function select_users_approved($user_id){

  global $connection;
      $this->query = "SELECT * FROM `user` WHERE user.`is_approved`='Approved' AND user.`user_id`='{$user_id}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


   public function select_users_rejected(){

  global $connection;
      $this->query = "SELECT * FROM `user` WHERE user.`is_approved`='rejected'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    } 



public function select_user_to_update($user_id){

  global $connection;
      $this->query = "SELECT * FROM `user` WHERE user.`is_approved`='Approved' AND user.`user_id`='{$user_id}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }



    public function insert_feedback($user_id,$feedback,$user_name,$user_email,$time){

  global $connection;
      $this->query = "INSERT INTO user_feedback (user_feedback.`user_id`,user_feedback.`feedback`,user_feedback.`user_name`,user_feedback.`user_email`,user_feedback.`created_at`,user_feedback.`updated_at`)

VALUES('{$user_id}','{$feedback}','{$user_name}','{$user_email}','{$time}','{$time}')";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function show_feedback(){

  global $connection;
      $this->query = "SELECT * FROM  user_feedback";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }



    public function count_users_with_conditions($status){

  global $connection;
      $this->query = "SELECT COUNT(user_id)
FROM `user`
WHERE  user.`is_approved`='{$status}';";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


   public function count_users_with_conditions_active_inactive($status){

  global $connection;
      $this->query = "SELECT COUNT(user_id)
FROM `user`
WHERE  user.`is_active`='{$status}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }




    public function count_users(){

  global $connection;
      $this->query = "SELECT COUNT(user_id)
FROM `user`";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


    public function count_blogs(){

  global $connection;
      $this->query = "SELECT COUNT(blog_id)
FROM `blog`";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }

      public function count_blog_with_conditions_active_inactive($status){

  global $connection;
      $this->query = "SELECT COUNT(blog_id)
FROM `blog`
WHERE  blog.`blog_status`='{$status}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


        public function count_posts(){

  global $connection;
      $this->query = "SELECT COUNT(post_id)
FROM `post`";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


 public function count_post_with_conditions_active_inactive($status){

  global $connection;
      $this->query = "SELECT COUNT(post_id)
FROM `post`
WHERE  post.`post_status`='{$status}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }

// public function show_users_pending(){

//   global $connection;
//       $this->query = "SELECT * FROM `user` WHERE user.`is_approved`='Pending';";

//       return $this->result = mysqli_query($this->connection,$this->query);
    
//     }



// function second end




// function third start

public function approve_user($id){

	global $connection;
		 	$this->query = "UPDATE USER SET is_approved = 'Approved', is_active = 'Active' WHERE user_id ='{$id}';";

		 	return $this->result = mysqli_query($this->connection,$this->query);
		
		}



// function third end

// function third start

public function reject_user($id){

	global $connection;
		 	$this->query = "UPDATE `user` SET is_approved='Rejected' WHERE user.`user_id`='{$id}'";

		 	return $this->result = mysqli_query($this->connection,$this->query);
		
		}



// function third end



// function fourth start

public function show_users_pending($limit,$end_limit){

  global $connection;
      $this->query = "SELECT * FROM `user` WHERE user.`is_approved`='Pending' LIMIT {$limit},{$end_limit};";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


// function fourth end

// function fifth start
public function inactive_user($id){

	global $connection;
		 	$this->query = "UPDATE `user` SET is_active='InActive' WHERE user.`user_id`='{$id}'";

		 	return $this->result = mysqli_query($this->connection,$this->query);
		
		}

		public function active_user($id){

	global $connection;
		 	$this->query = "UPDATE `user` SET is_active='Active' WHERE user.`user_id`='{$id}'";

		 	return $this->result = mysqli_query($this->connection,$this->query);
		
		}
// function fifth end

// function sixth  start


public function edit_user($id){

	global $connection;
		 	$this->query = "SELECT * FROM `user` WHERE user_id='{$id}'";

		 	return $this->result = mysqli_query($this->connection,$this->query);
		
		}

	


// function sixth end
		// function seventh start


public function update_user($user_id,$first_name,$last_name,$user_image,$birth,$address,$gender,$role_id,$time){

  global $connection;
      $this->query = "UPDATE `user` SET first_name='{$first_name}', 
last_name='{$last_name}',
 date_of_birth='{$birth}',
 address='{$address}',
  gender='{$gender}' ,user.`role_id`= '{$role_id}'
  ,user.`user_image`='{$user_image}',user.`updated_at`='$time'
  WHERE user.`user_id`='{$user_id}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function update_user_by_user($user_id,$first_name,$last_name,$user_image,$birth,$address,$gender,$email,$pass,$time){

  global $connection;
      $this->query = "UPDATE `user` SET first_name='{$first_name}', 
last_name='{$last_name}',
 date_of_birth='{$birth}',
 address='{$address}',
  gender='{$gender}' ,user.`user_image`='{$user_image}',
  user.`updated_at`='{$time}',
  user.`email`='{$email}',
  user.`password`='{$pass}'
  
  WHERE user.`user_id`='{$user_id}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }



/*check update user function with form data end*/

// function seventh end



public function select_approve_user($id){

	global $connection;
		 	$this->query = "SELECT * FROM `user` WHERE user_id='{$id}' ";

		 	return $this->result = mysqli_query($this->connection,$this->query);
		
		}		


public function search_pending_user($data){

  global $connection;
      $this->query = "SELECT * FROM `user` WHERE (first_name LIKE '%{$data}%' OR last_name LIKE '%{$data}%'
 OR email LIKE '%{$data}%'  OR gender LIKE '%{$data}%') AND user.`is_approved`='Pending'
 ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function search_approved_user($data){

  global $connection;
      $this->query = "SELECT * FROM `user` WHERE (first_name LIKE '%{$data}%' OR last_name LIKE '%{$data}%'
 OR email LIKE '%{$data}%'  OR gender LIKE '%{$data}%') AND user.`is_approved`='Approved'
 ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }
// insert page function start





public function insert_page($user_id, $page_title, $post_per_page, $background_path, $status, $time){

  global $connection;
$this->query = " INSERT INTO `blog`(user_id, blog_title, post_per_page, blog_background_image, blog_status, created_at, updated_at)
VALUES('{$user_id}','{$page_title}','{$post_per_page}','{$background_path}','{$status}','{$time}','{$time}')";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }   





// insert page function end




public function select_page($id){

  global $connection;
      $this->query = "SELECT * FROM `blog` WHERE user_id='{$id}' ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    } 

// select page function end


public function operate_page($id,$blog_status){

  global $connection;
      $this->query = "UPDATE blog SET blog.`blog_status`='{$blog_status}' WHERE blog.`blog_id`='{$id}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }
// function end

public function select_edit_page($id){

  global $connection;
      $this->query = "SELECT * FROM `blog` WHERE blog_id='{$id}' ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }
// function end

  public function update_page($id,$page_title,$post_per_page,$background_path,$updated_time){

  global $connection;
      $this->query = " UPDATE blog SET blog.`blog_title`='{$page_title}',blog.`post_per_page`='{$post_per_page}',blog.`blog_background_image`='{$background_path}',
 blog.`updated_at`='{$updated_time}' WHERE blog.`blog_id`='{$id}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }

public function select_blog_by_blog_id($id){

  global $connection;
      $this->query = "SELECT * FROM `blog` WHERE blog_id='{$id}' ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function select_all_page(){

  global $connection;
      $this->query = "SELECT * FROM `blog` WHERE blog_status='Active' ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function insert_category( $category_title, $category_desc,$time){

  global $connection;
$this->query = " INSERT INTO `category`(category_title,category_description,category_status,created_at,updated_at)
VALUES('{$category_title}','{$category_desc}','Active','{$time}','{$time}')";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }   




public function select_catagory(){

  global $connection;
      $this->query = "SELECT * FROM `category`  ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }

public function operate_category($category_id,$category_status){

  global $connection;
      $this->query = "UPDATE category SET category.`category_status`='{$category_status}' WHERE category.`category_id`='{$category_id}'";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }

public function select_catagory_by_id($catagory_id){

  global $connection;
      $this->query = "SELECT * FROM `category` WHERE category_id='{$catagory_id}'  ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function update_category($category_id,$category_title,$category_description,$updated_time){

  global $connection;
      $this->query = "UPDATE category SET category.`category_title`='{$category_title}',category.`category_description`='{$category_description}',category.`updated_at`='{$updated_time}'WHERE category.`category_id`='{$category_id}';";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }

public function select_catagory_by_active(){

  global $connection;
      $this->query = "SELECT * FROM `category` WHERE category_status ='Active' ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function select_blog_by_user_id($id){

  global $connection;
      $this->query = "SELECT * FROM `blog` WHERE blog.`user_id`={$id} AND blog.`blog_status`='Active' ";

      return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function insert_post(
  $blog_id, $post_title, $post_summary,$post_description,$featured_image_path,$comment_permission,$status, $time
){

  global $connection;
$this->query = " INSERT INTO post
(post.`blog_id`,post.`post_title`,
post.`post_summary`,post.`post_description`,post.`featured_image`,
post.`is_comment_allowed`,post.`post_status`,post.`created_at`,
post.`updated_at`)
VALUES ('{$blog_id}','{$post_title}','{$post_summary}','{$post_description}','{$featured_image_path}',
'{$comment_permission}','{$status}','{$time}','{$time}')";

  $this->result = mysqli_query($this->connection,$this->query);
  $this->last_insert_id = mysqli_insert_id($this->connection);
  
  return $this->result;
    }








public function insert_post_attch_file($post_id, $post_attachment_title, $attachment_file_path,$status, $time){

  global $connection;
$this->query = "INSERT INTO post_atachment 
  (post_id, post_attachment_title, post_attachment_path, is_active, created_at, updated_at) 
  VALUES ('$post_id', '$post_attachment_title', '$attachment_file_path', '$status', '$time', '$time')";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function insert_post_catagory($post_id,$post_catagory_id,$time){

  global $connection;
$this->query = "INSERT INTO post_category (post_category.`post_id`,post_category.`category_id`,post_category.`created_at`,post_category.`updated_at`)
VALUES('{$post_id}','{$post_catagory_id}','{$time}','{$time}')";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function select_post_by_user_id($user_id){

  global $connection;
$this->query = "SELECT * FROM post INNER JOIN blog ON 
post.`blog_id`=blog.`blog_id`
INNER JOIN  `user` ON blog.`user_id`=user.`user_id`
WHERE user.`user_id`='{$user_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function operate_post_by_post_id($post_id,$status){

  global $connection;
$this->query = "UPDATE post SET post_status ='{$status}' 
WHERE post_id ='{$post_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function select_post_by_post_id($post_id){

  global $connection;
$this->query = "SELECT * FROM post INNER JOIN post_category ON post.`post_id`= post_category.`post_id` INNER JOIN category ON post_category.`category_id`=category.`category_id`
WHERE post.`post_id`='{$post_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function select_following_blog($user_id,$blog_id){

  global $connection;
$this->query = " SELECT * FROM `following_blog` WHERE following_blog.`follower_id`='{$user_id}' AND following_blog.`blog_following_id`={$blog_id}";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function follow_blog($user_id,$blog_id,$status,$time){

  global $connection;
$this->query = " 
INSERT INTO `following_blog` ( follower_id ,blog_following_id,`status`,created_at,updated_at)
VALUES ('{$user_id}','{$blog_id}','{$status}','{$time}','{$time}')";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }
   

public function operate_follow_page($blog_id,$user_id,$status,$time){

  global $connection;
$this->query = "UPDATE `following_blog` SET following_blog.`status`='{$status}', following_blog.`updated_at`='{$time}' WHERE following_blog.`blog_following_id`={$blog_id} AND following_blog.`follower_id`='{$user_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function select_blog_data_by_blog_id($blog_id){

global $connection;
$this->query ="SELECT * FROM `user` INNER JOIN blog ON user.`user_id`=blog.`user_id` WHERE  blog.`blog_id`='{$blog_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function select_post_by_blog_id($blog_id){

global $connection;
$this->query ="SELECT *,  (SELECT COUNT(*) FROM post WHERE post.`blog_id` = '{$blog_id}') AS post_count
FROM post p
INNER JOIN blog b ON p.`blog_id` = b.`blog_id`
WHERE p.`blog_id` = '{$blog_id}'
ORDER BY p.`post_id` DESC
;";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function select_post_by_blog_id_order_by_descending($blog_id,$starting,$limit){

global $connection;
$this->query ="SELECT * 
FROM post 
WHERE post.`blog_id` = '{$blog_id}'
ORDER BY post.`post_id` DESC
LIMIT $starting, $limit;
";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function select_post_by_post_id_for_blog_page($post_id){

global $connection;
$this->query ="SELECT * FROM post WHERE post.`post_id`='{$post_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function update_post($post_id,$blog_id, $post_title, $post_summary,$post_description,$featured_image_path,$comment_permission, $time){

  global $connection;
$this->query = "UPDATE post SET post.`blog_id`='{$blog_id}',
post.`post_title`='{$post_title}',
post.`post_summary`='{$post_summary}',post.`post_description`='{$post_description}',
post.`featured_image`='{$featured_image_path}',
post.`is_comment_allowed`='{$comment_permission}', post.`updated_at`='{$time}' WHERE post.`post_id`='{$post_id}'";

  $this->result = mysqli_query($this->connection,$this->query);
  
  return $this->result;
    }



public function update_post_attach($post_id,$status,$time){

  global $connection;
$this->query = "UPDATE post_atachment SET post_atachment.`is_active`='{$status}',
post_atachment.`updated_at`='{$time}' WHERE post_atachment.`post_id`='{$post_id}'";

  $this->result = mysqli_query($this->connection,$this->query);
  
  return $this->result;
    }


public function update_post_category($post_id,$category_id,$time){

  global $connection;
$this->query = "UPDATE post_category SET post_category.`category_id`='{$category_id}' ,
post_category.`updated_at`='{$time}'
  WHERE  post_category.`post_id`='{$post_id}'";

  $this->result = mysqli_query($this->connection,$this->query);
  
  return $this->result;
    }



public function add_comment_to_post($post_id,$user_id,$comment){

  global $connection;
$this->query = "INSERT INTO post_comment (post_id,user_id,post_comment.`comment`)
VALUES('{$post_id}','{$user_id}','{$comment}')";

  $this->result = mysqli_query($this->connection,$this->query);
  
  return $this->result;
    }


public function show_comment_by_post_id($post_id){

  global $connection;
$this->query = "
SELECT * FROM `user` INNER JOIN post_comment ON user.`user_id` = post_comment.`user_id` INNER JOIN post ON post_comment.`post_id`=post.`post_id` WHERE post_comment.`post_id`={$post_id}  AND
post_comment.`is_active`='Active'  ";

  $this->result = mysqli_query($this->connection,$this->query);
  
  return $this->result;
    }



public function fetch_follower_by_blog_id($blog_id){

  global $connection;
$this->query = "
SELECT * FROM `user` INNER JOIN following_blog
 ON user.`user_id`= following_blog.`follower_id`
INNER JOIN blog ON following_blog.`blog_following_id`=blog.`blog_id` 
 WHERE following_blog.`blog_following_id`={$blog_id}
";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function select_post_comments_by_post_id_($post_id){

global $connection;
$this->query ="SELECT * FROM post INNER JOIN post_comment ON post.`post_id`= post_comment.`post_id` WHERE post.`post_id`='{$post_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function operate_comment_by_post_id($post_comment_id,$status){

  global $connection;
$this->query = "UPDATE `post_comment` SET `post_comment`.`is_active` ='{$status}' WHERE post_comment.`post_comment_id`='{$post_comment_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function show_post_by_category($category_id,$blog_id){

global $connection;
$this->query ="
SELECT * FROM  blog INNER JOIN  post ON blog.`blog_id`= post.`blog_id`  INNER JOIN post_category ON post.`post_id`=post_category.`post_id` 
INNER JOIN category ON post_category.`category_id`= category.`category_id` WHERE category.`category_id`='{$category_id}' AND blog.`blog_id`='{$blog_id}' ";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }





public function select_post_attachments_by_post_id_($post_id){

global $connection;
$this->query ="SELECT * FROM post_atachment WHERE post_atachment.`is_active`='Active' AND post_atachment.`post_id`='{$post_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }






public function show_post_attachments_by_post_id($post_id){

global $connection;
$this->query ="SELECT * FROM post_atachment WHERE  post_atachment.`post_id`='{$post_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function operate_post_attachments_by_post_attachment_id($post_attachment_id,$status,$time){

global $connection;
$this->query ="UPDATE post_atachment SET post_atachment.`is_active`='{$status}', post_atachment.`updated_at`='{$time}' WHERE post_atachment.`post_atachment_id`='{$post_attachment_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function select_theme_by_setting_key(){

global $connection;
$this->query ="SELECT * FROM setting WHERE setting.`setting_key` LIKE '%admin%'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function delete_theme_by_setting_key(){

global $connection;
$this->query ="DELETE  FROM setting WHERE setting.`setting_key` LIKE '%admin%'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }

    public function insert_theme_by_admin($user_id,$font_size,$font_color,$background_color,$time){

global $connection;
$this->query ="INSERT INTO setting (user_id,setting_key,setting_value,setting_status,created_at,updated_at )
VALUES ('{$user_id}','admin_font_color','{$font_color}','Active','{$time}','{$time}'),
 ('{$user_id}','admin_font_size','{$font_size}','Active','{$time}','{$time}'),
 ('{$user_id}','admin_background_color','{$background_color}','Active','{$time}','{$time}')";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function select_theme_by_user_id($user_id){

global $connection;
$this->query ="SELECT * FROM setting WHERE user_id='{$user_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function insert_theme_by_user($user_id,$font_size,$font_color,$background_color,$time){

global $connection;
$this->query ="INSERT INTO setting (user_id,setting_key,setting_value,setting_status,created_at,updated_at )
VALUES ('{$user_id}','user_font_color','{$font_color}','Active','{$time}','{$time}'),
 ('{$user_id}','user_font_size','{$font_size}','Active','{$time}','{$time}'),
 ('{$user_id}','user_background_color','{$background_color}','Active','{$time}','{$time}')";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function operate_theme_by_user_id($key,$value,$user_id){

global $connection;
$this->query ="UPDATE setting SET setting.`setting_value`='{$value}' WHERE setting.`setting_key`='{$key}' AND setting.`user_id`='{$user_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function show_theme_by_user_id($key,$user_id){

global $connection;
$this->query ="SELECT * FROM setting WHERE  setting.`setting_key`='$key' AND setting.`setting_status`='Active' AND user_id='{$user_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }


public function show_theme_by_admin($key){

global $connection;
$this->query ="SELECT * FROM setting WHERE setting_key ='{$key}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



public function theme_status($theme_id,$status){

global $connection;
$this->query ="UPDATE setting SET setting.`setting_status`='{$status}',setting.`updated_at`='2023' WHERE setting.`setting_id`='{$theme_id}'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }




public function show_active_post_user(){

global $connection;
$this->query ="SELECT * FROM post where post_status='Active'";

  return $this->result = mysqli_query($this->connection,$this->query);
    
    }



}

class panels{



// function edit panel end



public function edit_form($first_name,$last_name,$birth,$address,$gender,$user_id,$role_id,$user_image){
?>
<h1 class="text-dark" >UPDATE USER HERE</h1>
<img  class="  rounded-pill " style=" height: 400px ;width: 400px; "  src="../<?php echo $user_image  ?>">

<div class="row g-3 needs-validation bg-dark  my-2 " novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $first_name ?>" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $last_name ?>" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">DATE OF BIRTH</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">DATE</span>
      <input type="date" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $birth ?>" required>
      <div class="invalid-feedback">
        Please choose a date.
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">ADDRESS</label>
    <input type="text" class="form-control" id="validationCustom03"value="<?php echo $address ?>" required>

    <div class="invalid-feedback">
      Please provide a valid address
    </div>
  </div>
  <div class="col-md-3 mt-4  bg-warning text-dark rounded-pill  " style="margin-left: 20px;" >
    <label for="validationCustom04" class="form-label">Gender</label>
   
<br>
<label for="validationCustom04" class="form-label" >
   Male
</label>

<?php

if ($gender=="Male") {
   ?>
<input type="radio"  id="male" value="Male" name="gender" checked>
   <?php
}

else{

    ?> <input type="radio"  id="male" value="Male" name="gender">   <?php
}
?>
   
 
   <label for="validationCustom04" class="form-label">  Female
</label>

<?php

if($gender=="Female") {
   ?>
<input type="radio" value="Female" id="female" name="gender" checked>
   <?php
}

else{

    ?> <input type="radio" id="female" value="Female" name="gender">   <?php
}
?>



    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>

   <div class="col-12">

 <label  >IMAGE</label>
 <input  type="file" name="img" id="updated_bg_img"  > 


  <label>ROLE</label>
  
  <select name="role" id="Update_role" >
    <option value="<?php echo $role_id;?>">
      
<?php
if ($role_id=='1') {
  echo 'Admin';
}

else{

  echo'user';
}

?>

    </option>
<option value="1" >Admin</option>
<option value="2" >User</option>
    </select>
<br>
    <button onclick="update_user(<?php  echo $user_id; ?>)"  class="btn btn-warning my-3 " type="submit">update</button>
  </div>
</div>



<?php



}






// function check edit panel with form data end







public function create_user_by_admin(){
?>
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" required name="first_name" class="form-control" />
        <label class="form-label"  for="form6Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" name="last_name" class="form-control" />
        <label class="form-label"  for="form6Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text"  name="create_password" id="form6Example3" class="form-control" />
    <label class="form-label" for="form6Example3">PASSWORD</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" name="confirm_password" id="form6Example4" class="form-control" />
    <label class="form-label" for="form6Example4">CONFIRM PASSWORD</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">Email</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="date" name="date_of_birth" id="form6Example6" class="form-control" />
    <label class="form-label" for="form6Example6">DATE OF BIRTH</label>
  </div>


<div class="form-outline mb-4">
    

 <label>
   Male
</label>
   <input type="radio" value="Male" id="male" name="gender">
   
   <label>  Female
</label>
    <input type="radio" value="Female" id="female" name="gender">
<!-- 
    <label class="form-label" for="form6Example9">GENDER</label> -->
  </div>



 <div class="form-outline mb-4">
    <!-- <input type="text" name="confirm_password" id="form6Example10" class="form-control" /> -->
<input  type="file" name="img" id="form6Example10" class="form-control" required >

    <label class="form-label" for="form6Example10">PROFILE IMAGE</label>
  </div>


  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea name="address"   class="form-control" id="form6Example7" rows="4"></textarea>
    <label class="form-label" for="form6Example7">ADDRESS</label>
  </div>


<div class="form-outline mb-4">
  <!-- 
<input  type="file" name="img" id="form6Example10" class="form-control" required > -->


<select name="role" id="form6Example11"  class="form-control"  >
    <option value="">--SELECT ROLE--</option>
<option value="1" >Admin</option>
<option value="2" >User</option>

  </select>

    <label class="form-label" for="form6Example10">USER ROLE</label>
  </div>




  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
<!-- 
     <input type="submit" onclick="add_user()" name="create" value="CREATE" class="btn btn-dark btn-block mb-4 " > -->

<button onclick="add_user()" class="btn btn-warning btn-block mb-4 " > create </button>
  </div>








<?php

}
// function create_user_by_admin end

public function create_page(){


?>
<fieldset class="bg-dark text-warning"  >
  
<legend   >Create Page</legend>



  
<table cellpadding="20px" style="font-size: 20px" >
  
<tr>
  <th>PAGE TITLE</th>
  <td> <input type="text" name="page_title" id="page_title" required="" style="width: 300px"  placeholder="Enter page title" class="rounded" >  </td>

</tr>


<tr>
  <th>POST Per PAGE</th>
  <td> <input type="number" name="post_per_page" id="post_per_page" required=""  placeholder="Enter Post per page" class="rounded" >  </td>

</tr>


<tr>
  <th>PAGE BACKGROUND IMAGE</th>
  <td> <input type="file" name="bg_img" id="bg_img" required=""  class="rounded"  >  </td>
  <br>

</tr>


<tr><td>
  
<!-- <input type="submit" name="create_page" value=" create"  class="bg-warning rounded " style="width: 100px; margin-left: 200px;" > -->

<button id="create_page" onclick="create_page_by_admin()" class="bg-warning rounded " style="width: 100px; margin-left: 200px;" > CREATE  </button>

</td></tr>

</table>





</fieldset>






<?php




}
// function create_page end

public function edit_page($blog_id,$blog_title,$post_per_page){


?>
<fieldset class="bg-dark text-warning "  >
  
<legend   >EDIT Page</legend>



  
<table cellpadding="20px" style="font-size: 20px" >
  
<tr>
  <th>PAGE TITLE</th>
  <td> <input type="text" name="page_title" id="page_title"  style="width: 400px" value="<?php echo $blog_title ?>" placeholder="Enter page title" class="rounded" >  </td>

</tr>


<tr>
  <th>POST Per PAGE</th>
  <td> <input type="number" name="post_per_page" id="post_per_page" value="<?php echo $post_per_page; ?>"  placeholder="Enter Post per page" class="rounded" >  </td>

</tr>


<tr>
  <th>PAGE BACKGROUND IMAGE</th>
  <td> <input type="file" name="bg_img" id="bg_img"   class="rounded"  >  </td>
  <br>

</tr>


<tr><td>
  
<button onclick="update_page(<?php echo $blog_id; ?>)" class="bg-warning" id="edit" value="">UPDATE</button> 
</td></tr>

</table>





</fieldset>






<?php




}
 

 // catagory panel

public function create_catagory(){
?>
<fieldset class="bg-dark text-warning"  >
  
<div id="msg" class="text-warning" ></div>

<legend   >Create CATAGORY</legend>

  
<table cellpadding="20px" >
  
<tr>
  <th>CATAGORY TITLE</th>
  <td> <input type="text" name="catagory-title" id="catagory-title" required=""  placeholder="Enter catagory title" class="rounded" >  </td>
   
</tr>

<tr>
  <th>CATAGORY DESCRIPTION</th>  
   <td> <input type="text" name="catagory-description" id="catagory-description" required=""  placeholder="Enter catagory title" class="rounded" >  </td>

</tr>






<tr><td>
  
<input type="submit"  onclick="create_catagory()" name="create-catagory" value=" create"  class="bg-warning rounded " style="width: 100px; margin-left: 200px;" >  
</td></tr>

</table>





</fieldset>






<?php







}







public function edit_catagory_panel($update_id, $category_title,$category_description ){
?>
<fieldset class="bg-dark text-warning my-4 "  >
  
<div id="msg" class="text-warning" ></div>

<legend   >EDIT CATAGORY</legend>

  
<table cellpadding="20px" >
  
<tr>
  <th>CATAGORY TITLE</th>
  <td> <input type="text" name="catagory-title" id="category_title" required="" value="<?php echo $category_title;  ?>"  placeholder="Enter catagory title" class="rounded" >  </td>
   
</tr>

<tr>
  <th>CATAGORY DESCRIPTION</th>  
   <td> <input  type="text" name="catagory-description" id="category_description" required="" value="<?php echo $category_description ?>"  placeholder="Enter catagory title" class="rounded" >  </td>

</tr>






<tr><td>
  
  <button onclick="update_category(<?php echo $update_id ?>)" value=" create"  class="bg-warning rounded " style="width: 100px; margin-left: 200px;"  >  UPDATE   </button>
<!-- <input type="submit"  onclick="create_catagory()" name="create-catagory" value=" create"  class="bg-warning rounded " style="width: 100px; margin-left: 200px;" >  --> 
</td></tr>

</table>





</fieldset>






<?php



}






}

class mailing{

// aprove function start
public function approve_mail($email,$msg){

$mail = new PHPMailer();

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;


$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->SMTPAuth = true;

$mail->Username = 'dummyacc19233@gmail.com';


$mail->Password = 'zfhadzoooxsuhxhr';


$mail->setFrom('dummyacc19233@gmail.com', 'MY ACTION');



$mail->addAddress($email, 'MY ACTION');

$mail->Subject = "ACCOUNT ACTIVITY";

$mail->msgHTML($msg);

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;


} else {
    $msg ='<h1 style="color:green;">Message sent!</h1>';

   
}


}
// aprove function end




}



?>