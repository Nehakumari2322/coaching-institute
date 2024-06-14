<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT ;?>admissions/dashboard" method="post" >
<div class="container">
    <div class="row mt-4 p-4" style="border:2px solid white">
        <h1 class="text-center">STUDENT <button class="btn" name="home" id="home" type="submit"><img src="<?php echo URLROOT."/img/add.png";?>"  height="33px"  alt=""></button></h1>
        <div class="col-sm-4">
            <button  type="submit" name="student" id="student"  style="border:none;padding:0;  width:100%">
                <div class="card w3-hover-shadow h-100">
                        <h3 class="text-center mt-3">All <img src="<?php echo URLROOT."/img/student.png";?>" height="40px" width="40px"  alt=""></h3>
                        <p class="text-center"><span class="badge rounded-pill bg-secondary"><?php echo $additionalData['tStudent'];?></span></p>
                </div>
            </button>
        </div>

        <div class="col-sm-4">
            <button  type="submit" name="totalstudent" id="totalstudent"  style="border:none;padding:0;  width:100%">
                <div class="card w3-hover-shadow h-100">
                        <h3 class="text-center mt-3">Fee Pending   <img src="<?php echo URLROOT."/img/student.png";?>" height="40px" width="40px"  alt=""></h3>
                        <p class="text-center"><span class="badge rounded-pill bg-secondary"><?php echo $additionalData['pStudent'];?></span></p>
                </div>
            </button>
        </div>

        <div class="col-sm-4">
            <button  type="submit" name="totalstudent" id="totalstudent"  style="border:none;padding:0;  width:100%">
                <div class="card w3-hover-shadow h-100">
                        <h3 class="text-center mt-3">Fee Completed   <img src="<?php echo URLROOT."/img/student.png";?>" height="40px" width="40px"  alt=""></h3>
                        <p class="text-center"><span class="badge rounded-pill bg-secondary"><?php echo $additionalData['pStudent'];?></span></p>
                </div>
            </button>
        </div>

    </div>
</div>

<div class="container">
    <div class="row mt-4 p-4" style="border:2px solid white">
        <h1 class="text-center"> BATCH  <button class="btn" name="courses" id="courses" type="submit"><img src="<?php echo URLROOT."/img/list.png";?>" height="20px" width="20px"  alt=""></button> </h1>
        <?php $count=0; foreach($data as $dataline){
         if($count%4 == 0)?>
            <input type="hidden" value="<?php echo $dataline->course_id;?>" name="<?php echo 'course_id'.$count;?>">
  
        <div class="col-sm-3 mt-4 ">
            <div class="card  w3-hover-shadow " style="padding:20px; border:2px solid white;">
                <div class="card-body text-center">
                    <p style="text-align:center;font-size:1.2rem"><?php echo $dataline->course_name;?> &nbsp; &nbsp;<button class="btn" type="submit" name="<?php echo 'editcourse'.$count;?>" id="<?php echo 'editcourse'.$count;?>"><img src="<?php echo URLROOT."/img/edit.png";?>" height="20px" width="20px"  alt=""></button></p> 
                    
                    <hr>
                    All<img src="<?php echo URLROOT."/img/student.png";?>" height="40px" width="40px"  alt=""><button class="btn" type="submit" name="<?php echo 'seestudentList'.$count;?>" id="<?php echo 'seestudentList'.$count;?>"> <span class="badge rounded-pill bg-secondary mx-5">65</span></button> 
                    Due<img src="<?php echo URLROOT."/img/moneyy.png";?>" height="40px" width="40px"  alt=""><button class="btn" type="submit" name="<?php echo 'seestudentPendingFeeList'.$count;?>" id="<?php echo 'seestudentPendingFeeList'.$count;?>"> <span class="badge rounded-pill bg-secondary mx-5">65</span></button>
                    <!-- <button class="btn " style="color:white;background:#6c89b4;width:100%" type="submit" id="<?php echo 'subcategory'.$count;?>" name="<?php echo 'subcategory'.$count;?>">View SubCategory</button> -->
                   
                </div>
                <hr>
                   <p>This Month Earning <span class="badge rounded-pill bg-secondary mx-5">65</span> </p> 
            </div>
        </div>
       
        <?php $count++;} ?> 
              <!-- <?php echo "totalcount".$count;?> -->
        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">

    </div>
</div>

<br>


</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>