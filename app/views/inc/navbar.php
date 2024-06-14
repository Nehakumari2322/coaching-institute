<form action="<?php echo URLROOT ;?>admissions/navform" method="post" >

<nav class="navbar navbar-expand-lg"  style="background:#FCA311">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:white"><img src="<?php echo URLROOT."/img/logoo.png";?>" height="50px" alt=""><?php echo INSTITUTENAME?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <img src="<?php echo URLROOT."/img/nav.png";?>" height="35px" alt="">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
            <button class="nav-link active btn text-light" aria-current="page"  type="submit" name="dash" id="dash">HOME</button>
        </li>
        <!-- <li class="nav-item">
            <button class="nav-link active btn text-light" aria-current="page" href="#" name="home" id="home" >ADDMISSION</button>
        </li> -->
        <!-- <li class="nav-item">
            <button class="nav-link active btn text-light" aria-current="page"  type="submit" name="courses" id="courses">COURSE</button>
        </li>
        <li class="nav-item">
            <button class="nav-link active btn text-light" aria-current="page"  type="submit" name="batch" id="batch">BATCH</button>
        </li> -->
        <li class="nav-item">
            <button class="nav-link active btn text-light" aria-current="page"  type="submit" name="feebtn" id="feebtn">FEE</button>
        </li>
        <li class="nav-item">
            <button class="nav-link active btn text-light" aria-current="page"  type="submit" name="swip" id="swip">SWIPER</button>
        </li>
        <li class="nav-item">
            <button class="nav-link active btn text-light" aria-current="page"  type="submit" name="notice" id="notice">NOTICE</button>
        </li>
       
      </ul>
     
    </div>
  </div>
</nav>
</form> 
