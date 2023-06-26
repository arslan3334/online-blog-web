<?php

?>


<main class="d-flex flex-nowrap">
  <h1 class="visually-hidden">Sidebars examples</h1>

<div class="b-example-divider b-example-vr  "></div>

  <div class="flex-shrink-0 p-3  " style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
     <img src="images/logo.png" style="height: 60px;width:50px; " > <span class="fs-5 fw-semibold text-warning ">FLYING BLOGS</span>
    </a>
    <ul class="list-unstyled ps-0  ">




      <li class="mb-1">


        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-warning " data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          DASHBOARD
        </button>


        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

            <li><a href="user.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded  text-warning "  >HOME</a></li>
            <li><a href="update_account.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded  text-warning "  >UPDATE ACCOUNT</a></li>
           
            <li><a href="all-pages-user-view.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >ALL PAGE</a></li>
            <li><a href="user_set_theme.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >SET THEME</a></li>
          </ul>
        </div>



<a href="logout_user.php">   
          <button class="bg-warning rounded my-4 " style="margin-left: 80px;" >
          LOGOUT
        </button>
      </a>
      </li>
       




          </ul>









          
  </div>





</main>



<?php




?>