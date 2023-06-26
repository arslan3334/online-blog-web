<?php
?>
<div class="container-fluid" >
	

<div class="row " > 
<div class="col-12  text-center" >
	
<!-- login modal start -->


<!-- Button trigger modal -->





<!-- Modal -->
<div class="modal fade  text-warning " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content  bg-dark ">
      <div class="modal-header  ">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login here
          <?php


      ?>  </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body   text-center">

        <form  action="login_process.php" method="POST">

           <?php

/*if (isset($_GET['msg'])) {
  echo $_GET['msg'];
}*/

          ?>

         <table>

         
<tr>
       <th>Email</th>   
         <td><input type="text" name="email"></td></tr>
         <tr>
         <th>Password</th>
         <td>
         <input type="password" name="login_password"></td></tr>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-warning" data-bs-dismiss="modal">Cancel</button>
        <input type="reset" name="reset" class="bg-secondary text-warning  rounded-2 " >

          <input type="submit" name="login" class="bg-secondary text-warning  rounded-2 " value="Login" > 

      </form>
      </div>
    </div>
  </div>
</div>
<!-- login modal end -->

<nav class="navbar navbar-dark bg-dark fixed-top">
  


 <a class="navbar-brand  text-warning" href="images/logo.png"><img src="images/logo.png" style="height: 80px;width:80px " > FLYING BLOGS	</a>

<a class="navbar-brand text-warning" href="index.php"> Home </a> 
<a class="navbar-brand text-warning" href="blog_page.php"> BLOG PAGES  </a> 
<a class="navbar-brand text-warning" href="#contact_us"> Contact us </a> 

 
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title  text-warning" id="offcanvasDarkNavbarLabel">

<img src="images/logo.png" style="height: 80px;width:80px " >
FLYING BLOGS</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

 <li class="nav-item"  ><a class="navbar-brand text-dark bg-warning rounded  " href="register.php" target="blank" style="margin-top: 0px; width:120px;margin-left: 20px " > Register </a></li>
<li class="nav-item"  >
<button style="margin-top: 10px; width:80px " type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#staticBackdrop"  >
  Login
</button></li>
 <li class="nav-item my-3 "    ><a class="navbar-brand text-dark bg-warning rounded  " href="forgot_password.php" target="blank" style="margin-top: 0px; width:120px;margin-left: 20px " > FORGOT PASSWORD </a></li>




          <li class="nav-item">
            <a class="nav-link active  text-warning" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-warning" href="blog_page.php">Blog-Pages</a>
          </li>

         

          


      </div>
    </div>
  </div>
</nav>

</div>



</div>
<!-- navbar end -->













<?php












?>