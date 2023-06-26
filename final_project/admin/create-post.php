<?php


session_start();

if (isset($_SESSION['user_id'])) {



$id=$_SESSION['user_id'];


  require_once("oop_work/database_setting.php");
  require_once("oop_work/databse_class.php");

  $database = new Database($hostname, $username, $password, $database);


?>


<!DOCTYPE html>
<html>
<head>

   <link rel="stylesheet" type="text/css" href="tablemodule/jquery.dataTables.min.css">
	<title> CREATE POST</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">

<!-- <link href="sample/../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<link href="sample/sidebars.css" rel="stylesheet">

<script type="text/javascript" src="tablemodule/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="tablemodule/jquery.dataTables.min.js"></script>
  
<!-- <script type="text/javascript">
    
    $(document).ready(function () {
      //$('#example').DataTable();
  });

 

  </script> -->


<script type="text/javascript" defer="defer">
$(document).ready(function() {
    /*$("table[id^='example']").DataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "searching": false,
        "paging": false
    } );*/
} );
</script>





	<style type="text/css">
		
::placeholder {
  color: orange;
  opacity: 1; /* Firefox */
}

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
<body class="bg-warning" >



<!-- nav start -->

<div class="container-fluid">
<div class=" row  " >
	
<div class="col-3 bg-dark  " >

<?php    

require_once("main-side-bar/side bar.php");


?>


<!-- side nave end dash board -->
</div>



<!-- horizintal nav start -->

<div class="col-9" >
<nav class="navbar navbar-expand-lg bg-dark  ">
  <div class="container-fluid  ">

    <a class="navbar-brand  text-warning " href="#">   <img  class="rounded-5" src="../<?php echo $_SESSION['profile']; ?>" style="height: 80px;width:80px "  >  <?php echo $_SESSION['admin_name'];  ?></a>
      </div>
</nav>

<!-- nav end -->

<!-- crete post -->
<center>
<div class="container" >
	

<div class="row my-5  " >
	
<div class="text-dark" >
  
  <h1 id="msg" style="display: none;"  ></h1>
</div>

<div class="col-12 " id="show_post_panel"  > 


<fieldset class="bg-dark text-warning" style=" width: 800px"   >
  
<legend  >Create Post</legend>

  
<table>
  
<tr>
  <th>POST TITLE</th>
  <td> <input class="rounded bg-secondary text-warning " type="text" id="post-title" required=""  placeholder="Enter post title" >  </td>

</tr>


<tr>
  <th>POST  SUMMARY</th>
  <td> <input type="text" class="rounded bg-secondary text-warning " id="post-summary" required=""  placeholder="Enter Post summary" >  </td>

</tr>

<tr>
  <th>POST DESCRIPTION</th>
  <td> <textarea  class="rounded bg-secondary text-warning " id="post-description" required="" placeholder="Enter post description"  style="width: 500px;height: 250px"></textarea>  </td>

</tr>



<tr>
  <th>POST IMAGE</th>
  <td> <input type="file" id="post-img"  required="" >  </td>
  <br>

</tr>


<tr  class="bg-secondary text-warning my-4 ">
  <th>ATTACHMENT</th> 
  <!-- <td> <input type="file" id="post-attach-file"  required="" ></td> -->
    <td> <input type="file" id="post-attach-file"  required="" multiple="" ></td>

  <br>

</tr>


<tr>
  <th>POST catagory</th>
  <td> 

  <select id="post-catagory" class="bg-secondary text-warning rounded " >
    <option value="">--SELECT CATEGORY</option>
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

<td><select id="comment-permission"  class="bg-secondary text-warning   rounded">
  <option value="" >--SELECT PERMISSION--</option>
<option value="1" >Yes</option>
<option value="2" >No</option>

</select> </td>

</tr>




<tr>
  
<th>SELECT PAGE</th>

<td>
  
<select class=" bg-secondary text-warning rounded" id="post-page" >
  <option value="">--SELECT PAGE--</option>

<?php

$result= $database->select_blog_by_user_id($id);


if ($result->num_rows>0) {
  

while ($data=mysqli_fetch_assoc($result)) {
  
?>

<option value="<?php echo $data['blog_id']; ?>"  ><?php echo  $data['blog_title'];  ?></option>


<?php


}


}









?>


</select>

</td>



</tr>


<tr><td>
  
<input type="submit" onclick="addpost()" id="create-page" value="create"  class="bg-warning  rounded"  style="width: 100px;margin-left: 150px;margin-top: 30px;"  > 
</td></tr>

</table>

</fieldset>


</div>


</div>

</div>
</center>




<!-- crete post end -->



<!-- all users start -->


<center>
<div class="container-fluid  ">

  <div id="edit_post_panel" >
    

  </div>

<div class="row  bg-dark  text-warning  mt-5 ">
<div class="col-12" >


<div id="comment_panel" >
<table id="example_comments" class="display  "  style="width:50%">




</table>
</div>


<h1   class=" bg-warning text-dark my-5 " >ALL YOUR POSTS </h1>
	
<table id="example" class="display"  style="width:80%">


</table>



<div id="attach" class="my-4"  >
  


</div>



</div>
</div>

  </div>
</center>


</div>




<!-- all users end -->














<!-- footer start -->

<div class="container-fluid" >
  
<div class="row  bg-dark text-warning  mt-2 "  id="contact_us"   >  


<?php    

require_once("main-side-bar/footer.php");


?>

  </div>

</div>
  

 




<!-- footer end -->

<!-- <script src="sample/../assets/dist/js/bootstrap.bundle.min.js"></script> -->

      <script src="sample/sidebars.js"></script>


<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>




<script type="text/javascript">



  show_post();
  
  


function show_post(){


  var fd = new FormData();
  fd.append('action', 'show_post');


  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('example').innerHTML = obj.responseText;



  $('#example').DataTable({
            // searching: true,
            stateSave: true,
            "bDestroy": true
          });






$("table[id^='#example']").DataTable( {
       
        searching: true,

        stateSave: true,
            "bDestroy": true
    } );


    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}


function remove_value(){


   document.getElementById('post-title').value="";
  document.getElementById('post-description').value="";
  document.getElementById('post-summary').value="";
   document.getElementById('post-img').value="";
   document.getElementById('post-attach-file').value="";
   document.getElementById('post-catagory').value="";
   document.getElementById('post-page').value="";
   document.getElementById('comment-permission').value="";



}



function deactivate_post(post_id){


var post_id = post_id

  var fd = new FormData();
  fd.append('action', 'deactivate_post');
fd.append('post_id', post_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

show_post();

    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}





function active_post(post_id){


var post_id = post_id

  var fd = new FormData();
  fd.append('action', 'activate_post');
fd.append('post_id', post_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

show_post();

    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}



function edit_post(post_id){



var post_id = post_id

  var fd = new FormData();
  fd.append('action', 'edit_post');
fd.append('post_id', post_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('edit_post_panel').innerHTML = obj.responseText;

show_post();

    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);





}


/*function addpost(){
  
  var post_title = document.getElementById('post-title').value;
  var post_description = document.getElementById('post-description').value;
  var post_summary = document.getElementById('post-summary').value;




if (document.getElementById('post-img').files[0]==null) {


var bg_img="";

}
else{


  var bg_img = document.getElementById('post-img').files[0];
}

  // var bg_img = document.getElementById('post-img').files[0];

if (document.getElementById('post-attach-file').files[0]==null) {


var attach="";

}
else{


  // var attach = document.getElementById('post-attach-file').files[0];


   var attach = document.getElementById('post-attach-file').files;


 
}

  // var attach = document.getElementById('post-attach-file').files[0];
  var post_catagory_id = document.getElementById('post-catagory').value;
  var post_blog_id = document.getElementById('post-page').value;
  var post_comment_id = document.getElementById('comment-permission').value

if (post_title==""|| post_description=="" ||bg_img=="" ||attach=="" ||post_catagory_id==""||post_blog_id==""||post_comment_id=="") {

alert("ALL FIELDS ARE REQUIRED KINDLY FILL ALL");


return ;

  }

  var fd = new FormData();

 for (var i = 0; i < attach.length; i++) {
    fd.append('post_attach_file[]', attach[i]);
  }


  fd.append('action', 'add_post');
  fd.append('post_title', post_title);
  fd.append('post_description', post_description);
  fd.append('post_summary', post_summary);
  fd.append('post_img', bg_img);
  // fd.append('post_attach_file', attach);
  fd.append('post_catagory_id', post_catagory_id);
  fd.append('post_blog_id', post_blog_id);
  fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;
alert("POST ADDED SUCCESS FULLY");

remove_value();
show_post();


    }
  };

  obj.open("POST", "create_page_process.php",true);

  

  obj.send(fd);
}
*/

// real function end





function addpost(){
  
  var post_title = document.getElementById('post-title').value;
  var post_description = document.getElementById('post-description').value;
  var post_summary = document.getElementById('post-summary').value;


 var fd = new FormData();

if (document.getElementById('post-img').files[0]==null) {


var bg_img="";

}
else{


  var bg_img = document.getElementById('post-img').files[0];
}

  // var bg_img = document.getElementById('post-img').files[0];

if (document.getElementById('post-attach-file').files[0]==null) {


var attach="";

 fd.append('action', 'add_post_without_file');

}
else{


  // var attach = document.getElementById('post-attach-file').files[0];


   var attach = document.getElementById('post-attach-file').files;

 fd.append('action', 'add_post');
 
}

  // var attach = document.getElementById('post-attach-file').files[0];
  var post_catagory_id = document.getElementById('post-catagory').value;
  var post_blog_id = document.getElementById('post-page').value;
  var post_comment_id = document.getElementById('comment-permission').value

if (post_title=="" || post_description=="" ||bg_img==""||post_catagory_id==""||post_blog_id==""||post_comment_id=="") {

alert("ALL FIELDS ARE REQUIRED KINDLY FILL ALL");


return ;

  }

 

 for (var i = 0; i < attach.length; i++) {
    fd.append('post_attach_file[]', attach[i]);
  }


 
  fd.append('post_title', post_title);
  fd.append('post_description', post_description);
  fd.append('post_summary', post_summary);
  fd.append('post_img', bg_img);
  // fd.append('post_attach_file', attach);
  fd.append('post_catagory_id', post_catagory_id);
  fd.append('post_blog_id', post_blog_id);
  fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;
alert("POST ADDED SUCCESS FULLY");

remove_value();
show_post();


    }
  };

  obj.open("POST", "create_page_process.php",true);

  

  obj.send(fd);
}





function update_post(post_id){
  
  var post_id = post_id
  var post_title = document.getElementById('update-post-title').value;
  var post_description = document.getElementById('update-post-description').value;
  var post_summary = document.getElementById('update-post-summary').value;


 var fd = new FormData();

if (document.getElementById('update-post-img').files[0]==null) {

 fd.append('action', 'update_post_without_image');

var bg_img="";



}
else{


  var bg_img = document.getElementById('update-post-img').files[0];

  fd.append('action', 'update_post_filled');

}

  // var bg_img = document.getElementById('post-img').files[0];

if (document.getElementById('update-post-attach-file').files[0]==null) {


var attach="";

 fd.append('action', 'update_post_without_file');

}
else{

  // var attach = document.getElementById('post-attach-file').files[0];


   var attach = document.getElementById('update-post-attach-file').files;

 // fd.append('action', 'update_post_filled');
 
}



if (document.getElementById('update-post-img').files[0]==null && document.getElementById('update-post-attach-file').files[0]==null ) {

fd.append('action', 'update_post_without_file_and_image');



}

  // var attach = document.getElementById('post-attach-file').files[0];
  var post_catagory_id = document.getElementById('update-post-catagory').value;
  var post_blog_id = document.getElementById('update-post-page').value;
  var post_comment_id = document.getElementById('update-comment-permission').value

 

 for (var i = 0; i < attach.length; i++) {
    fd.append('post_attach_file[]', attach[i]);
  }


 fd.append('post_id', post_id);
  fd.append('post_title', post_title);
  fd.append('post_description', post_description);
  fd.append('post_summary', post_summary);
  fd.append('post_img', bg_img);
  // fd.append('post_attach_file', attach);
  fd.append('post_catagory_id', post_catagory_id);
  fd.append('post_blog_id', post_blog_id);
  fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;
// alert("POST UPDATED SUCCESS FULLY");

 var text=obj.responseText
alert(text);

remove_edit_panel()
show_post();


    }
  };

  obj.open("POST", "create_page_process.php",true);

  

  obj.send(fd);
}

function remove_edit_panel(){

document.getElementById('edit_post_panel').innerHTML=''

}


// real  update function end



















function update(){
  
  var post_title = document.getElementById('post-title').value;
  var post_description = document.getElementById('post-description').value;
  var post_summary = document.getElementById('post-summary').value;
  if (document.getElementById('post-img').files[0]==null) {


var bg_img="";

}
else{


  var bg_img = document.getElementById('post-img').files[0];
}

  // var bg_img = document.getElementById('post-img').files[0];

if (document.getElementById('post-attach-file').files[0]==null) {


var attach="";

}
else{


  var attach = document.getElementById('post-attach-file').files[0];
}

  // var attach = document.getElementById('post-attach-file').files[0];

  var post_catagory_id = document.getElementById('post-catagory').value;
  var post_blog_id = document.getElementById('post-page').value;
  var post_comment_id = document.getElementById('comment-permission').value

// if (post_title==""|| post_description=="" ||bg_img=="" ||attach=="" ||post_catagory_id==""||post_blog_id==""||post_comment_id=="") {

// alert("ALL FIELDS ARE REQUIRED KINDLY FILL ALL");

// return 0;

//   }

  var fd = new FormData();
  fd.append('action', 'update_post');
  fd.append('post_title', post_title);
  fd.append('post_description', post_description);
  fd.append('post_summary', post_summary);
  fd.append('post_img', bg_img);
  fd.append('post_attach_file', attach);
  fd.append('post_catagory_id', post_catagory_id);
  fd.append('post_blog_id', post_blog_id);
  fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;


remove_value();
show_post();


    }
  };

  obj.open("POST", "create_page_process.php");

  

  obj.send(fd);
}



function show_comments(post_id){


var post_id = post_id

  var fd = new FormData();
  fd.append('action', 'show_comments');
fd.append('post_id', post_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('example_comments').innerHTML = obj.responseText;
$('#example_comments').DataTable({
            // searching: true,
            stateSave: true,
            "bDestroy": true
          });

  show_post();


    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}





/*function deactivate_comment(post_comment_id){


var post_comment_id = post_comment_id

  var fd = new FormData();
  fd.append('action', 'deactivate_comment');
fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

text=obj.responseText;

alert(text);

show_comments();




    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}*/

function deactivate_comment(post_comment_id,post_id){


var post_id=post_id

var post_comment_id = post_comment_id

  var fd = new FormData();
  fd.append('action', 'deactivate_comment');
fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

text=obj.responseText;

alert(text);

show_comments(post_id);


    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}







/*function active_comment(post_comment_id){


var post_comment_id = post_comment_id

  var fd = new FormData();
  fd.append('action', 'activate_comment');
fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

text=obj.responseText;

alert(text);



show_comments();





    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}*/




function active_comment(post_comment_id,post_id){


var post_id=post_id;
var post_comment_id = post_comment_id

  var fd = new FormData();
  fd.append('action', 'activate_comment');
fd.append('post_comment_id', post_comment_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

text=obj.responseText;

alert(text);



show_comments(post_id);


    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}








function show_attchments(post_id){


var post_id = post_id

  var fd = new FormData();
  fd.append('action', 'show_attchments');
fd.append('post_id', post_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('attach').innerHTML = obj.responseText;


  /*show_post();*/


    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}








function deactivate_attachment(post_attachmnet_id,post_id){


var post_id=post_id;
var post_attachmnet_id = post_attachmnet_id

  var fd = new FormData();
  fd.append('action', 'deactivate_attachment');
fd.append('post_attachmnet_id', post_attachmnet_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

text=obj.responseText;

alert(text);

show_attchments(post_id)




    }
  };

  obj.open("POST", "create_page_process.php");


  obj.send(fd);
}





function activate_attachment(post_attachmnet_id,post_id){


var post_id=post_id;
var post_attachmnet_id = post_attachmnet_id

  var fd = new FormData();
  fd.append('action', 'activate_attachment');
fd.append('post_attachmnet_id', post_attachmnet_id);

  var obj;
  if (window.XMLHttpRequest) {
    obj = new XMLHttpRequest();
  } else {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  }

  obj.onreadystatechange = function() {
    if (obj.readyState == 4 && obj.status == 200) {


      document.getElementById('msg').innerHTML = obj.responseText;

text=obj.responseText;

alert(text);

show_attchments(post_id)




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