<?php

?>


<footer class="bg-dark text-center text-warning" id="contact_us" >


<img  class="mt-3" style="float: left; height:250px;width: 250px; border: 20px solid;border-style: groove;" src="admin/images/1684261450_logo.png">


  <!-- Grid container -->
  <div class="container p-4 ">



    <!-- Section: Social media -->
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <section class="">
          <!--Grid column-->
          <div class="col-auto">


<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#newbt" style="margin-top: 40px" >
 CONTACT US
</button>

<!-- Modal -->
<div class="modal fade" id="newbt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newbtLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header bg-dark text-warning ">
        <h1 class="modal-title fs-5  " id="newbtLabel">GIVE FEEDBACKS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body  bg-dark text-warning">
          
<table>
	

<tr>
	<th>NAME</th>
  <td><input type="text" id="user_name"  name="feedback_name"></td>

</tr>

<tr>
	<th>EMAIL</th>
  <td><input type="text"  id="user_email" name="feedback_email"></td>
    
</tr>
<tr>
	<th>FEEDBACK</th>
  <td><textarea name="feedback" id="feedback" style="width: 300px;height:100px" ></textarea></td>
    
</tr>
	




</table>

      </div>
      <div class="modal-footer  bg-dark text-warning">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
  <button    onclick="give_visitor_feedback()" class="btn btn-warning" >SEND </button>
   <!--      <input type="submit" name=" login" value="SEND" class="btn btn-warning" > -->
       <!--  <button type="button" class="btn btn-primary">Understood</button> -->


       <div style="display: none;" id="feedback_msg" ></div>
        
      </div>
    </div>
  </div>



          <!--Grid column-->
        </div>
        <!--Grid row-->
      
    </section>
    <!-- Section: Form -->

    <!-- Section: Text -->


    <section class="mb-4" >
      <p>
      This is a blogging website here you can create your pages that you want and you can add posts on those pages and you can view comments on your posts here you can share your views on any thing that you want to talk about no harsh posts or blasphmeous posts or comment are allowed

      ENJOY...!
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row" style="margin-left: 400px" >
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase bg-warning text-dark rounded-pill ">GET REGISTERED</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="register.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded  text-warning "  >REGISTER</a>
            </li>
             <li>
              <a href="forgot_password.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded  text-warning "  >FORGOT PASSWORD</a>
            </li>
            
          </ul>
        </div>
        <!--Grid column-->


        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          
          <h5 class="text-uppercase bg-warning text-dark rounded-pill " style="height: 40px" >SEE BLOG</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="blog_page.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >ALL BLOGS</a>
            </li>
           
          
          </ul>
        </div>
        <!--Grid column-->

       
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="#">ARSALAN NISAR 19233</a>
<div id="feedback_msg" ></div>
  </div>
  <!-- Copyright -->
</footer>


<script type="text/javascript">
	



function give_visitor_feedback() {
 
 var user_name=document.getElementById('user_name').value;

 var email = document.getElementById('user_email').value;

  var feedback = document.getElementById('feedback').value;


  var fd = new FormData();  

/* if (feedback=='') {

alert('PLEASE ENTER FEEDBACK');
    return;

}*/

 if (feedback==''|| email==''|| user_name=='') {

alert('PLEASE FILL ALL FIELDS');
    return;

}


  fd.append('user_name', user_name);
  
  fd.append('email', email);

  fd.append('feedback', feedback);
  
  fd.append('action', 'visitor_feedback');

  var obj = new XMLHttpRequest();

  obj.onreadystatechange = function () {
    if (obj.readyState == 4 && obj.status == 200) {
      document.getElementById('feedback_msg').innerHTML = obj.responseText;

      text=obj.responseText;

      alert(text);

      remove_value();
    }
  };

  obj.open('POST', 'ajax.php');
  obj.send(fd);
}

function remove_value(){

document.getElementById('feedback').value='';

document.getElementById('user_name').value='';
 document.getElementById('user_email').value='';



}



</script>



<?php






?>