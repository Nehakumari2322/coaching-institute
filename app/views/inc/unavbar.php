<form action="<?php echo URLROOT ;?>admissions/usernavform" method="post" style="margin-bottom:0">

<nav class="navbar navbar-expand-lg bg-light"  style="padding-top:0;padding-bottom:0">
  <div class="container-fluid">
    <button class="navbar-brand btn" type="submit" name="home" id="home" style="color:blue"><img src="<?php echo URLROOT."/img/logoo.png";?>" height="50px" alt=""><?php echo INSTITUTENAME?></button>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <img src="<?php echo URLROOT."/img/nav.png";?>" height="35px" alt="">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <button class="nav-link active btn " aria-current="page" type="submit" name="home" id="home">Home</button>
        </li>
        <li class="nav-item">
            <button class="nav-link active btn" aria-current="page"  type="submit" name="courses" id="courses">Course</button>
        </li>
        <?php $userId=$_SESSION['userid'];
        if($userId == null){?>
        
       <?php }
       else{?>
       <li class="nav-item">
          <button class="nav-link active btn " aria-current="page"  type="submit" name="dashboard" id="dashoard">Dashboard</button>
       </li>
        <?php }?>
      
        <li class="nav-item">
            <button class="nav-link active btn px-3" aria-current="page"  type="submit" name="logout" id="logout" style="background:#40caf9;border-radius:100px;color:white;">
            <?php if($_SESSION['userid'] == null){
                              echo "Login";
                            }
                            else{
                              echo "Logout";  
                              }
                      ?>
            </button>
        </li>
       
      </ul>
     
    </div>
  </div>
</nav>
</form> 
