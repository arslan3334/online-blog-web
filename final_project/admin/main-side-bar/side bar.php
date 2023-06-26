<?php
?>

<main class="d-flex flex-nowrap">
  <h1 class="visually-hidden">Sidebars examples</h1>

<div class="b-example-divider b-example-vr  "></div>

  <div class="flex-shrink-0 p-3  " style="width: 280px;">
    <a href="" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
     <img src="images/1683824263_logo.png" style="height: 60px;width:50px; " > <span class="fs-5 fw-semibold text-warning ">FLYING BLOGS</span>
    </a>
    <ul class="list-unstyled ps-0  ">




      <li class="mb-1">


        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-warning " data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          MANAGE ACCOUNTS
        </button>
        <div class="collapse show" id="home-collapse">


          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">



<li><a href="admin.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >HOME</a></li>

            <li><a href="create-user-admin.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded  text-warning "  >CREATE USER AND EDIT ACCOUNT</a></li>
            <li><a href="pending-users.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >PENDING USERS ACCOUNTS</a></li>
            <li><a href="all-users.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >ALL USERS</a></li>

<li><a href="see_feedbacks.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >FEEDBACKS</a></li>



          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-warning" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
         MANAGE POSTS
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="create-post.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >CREATE POST</a></li>
           <!--  <li><a href="all-admin-posts.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >ALL YOUR POSTS</a></li> -->
           
           
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-warning" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          MANAGE BLOG
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="create-page.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >CREATE BLOG</a></li>
            <li><a href="all-admin-pages.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >ALL YOUR BLOGS</a></li>
            <li><a href="all-pages-admin-view.php"  class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning">ALL PAGES BLOGS</a></li>
          
          </ul>
        </div>
      </li>


<li class="mb-1">

      
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-warning " data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          MANAGE THEME
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
<!--             <li><a href="theme-manage.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded  text-warning "  >SET THEME FILEDS</a></li> -->
            <li><a href="set theme.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded text-warning"  >SET THEME</a></li>
            <!--  <li><a href="all-theme-fields.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded  text-warning "  >SET THEME ALL FIELDS</a></li> -->
          </ul>
        </div>
      </li>



      <li class="border-top my-3"></li>
      <li class="mb-1">



        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-warning" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
         MANAGE CATAGORY
        </button>


        <!--  <button href="logout.php" class="bg-warning rounded my-2 "  style="margin-left: 80px"  >
        LOGOUT
        </button> -->
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="add-catagories.php" class="link-dark d-inline-flex text-decoration-none rounded text-warning "  >CREATE CATAGORY</a></li>
          
                     
          </ul>
        </div>


      </li>
    </ul>
    <a    class="bg-warning rounded text-dark"style="margin-left:80px;padding: 10px;margin-top:40px;text-decoration:none;"   href="logout_admin.php"> LOGOUT </a>
  </div>
</main>





<?php
