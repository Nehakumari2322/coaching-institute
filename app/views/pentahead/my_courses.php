<?php require APPROOT . '/views/inc/cheader.php'; ?>
<?php require APPROOT . '/views/inc/unavbar.php'; ?>
<form action="<?php echo URLROOT ;?>admissions/viewCourseVideoAndPdf" method="post" >
<div class="container mb-3 ">

<div class="row">
    
    <div class="col-sm-3" style="display:block;margin:auto">
        <h2 class="text-center mt-4">Profile</h2>   
        <div class="card  text-center"  style="box-shadow: 0 4px 20px 0 rgb(198 184 184 / 60%),0 4px 20px 0 rgba(219, 219, 219, 0.3);display:block;margi:auto">
        <img class="img-account-profile rounded-circle mb-2 mt-2" src="<?php echo URLROOT.'/uploads/'. $additionalData->image;?>" height="100px" width="100px" alt="" style="display:block;margin:auto">
        <div class="small font-italic text-muted mb-4" style="text-transform: capitalize;">
            <?php echo $additionalData->student_name;?>
        </div>
        <button class="btn mt-4 mb-4" type="submit" name="edit" id="edit" style="width:70%;background: #40caf9;color:white;margin:auto;display:block;border-radius:10px;box-shadow: 0 4px 20px 0 rgb(198 184 184 / 60%),0 4px 20px 0 rgba(219, 219, 219, 0.3);">Edit Profile <img src="<?php echo URLROOT."/img/edit.png";?>" height="20px" width="20px" alt="" ></button>

        <button class="btn mb-4" type="submit" name="print" id="print" style="width:70%;back;background:#40caf9;color:white" onclick="changeFormTarget(this)">print ID card <img src="<?php echo URLROOT."/img/id1.png";?>"  height="30px" alt=""></button>
        </div>
    </div>
  
   
</div>
    <div class="row">
        <div class="col-sm-12 ">
    <h2 class="text-center mt-4">MY COURSES</h2>
    <?php $count = 0; foreach($data as $dataLine){ ?>
        <input type="hidden" value="<?php echo $dataLine->course_id;?>" name="<?php echo 'course_id'.$count;?>" id="<?php echo 'course_id'.$count;?>">
    <div class="row mx-1"  style="border:2px solid #14213D;border-radius:10px">
        <div class="col-sm-3 text-center mt-5">
           <h5><?php echo $dataLine->course_name;?></h5>
        </div>
        <div class="col-sm-3 p-2">
           <img src="<?php echo URLROOT.'/img/'. $dataLine->image;?>" height="150px" width="300px" alt="">
        </div>
        <div class="col-sm-3 mt-5">
            <p>A new way to transform your business.</p>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="width:100%" >
                <button type="button" class="btn p-2" style="border-radius: 30px 0 0px 30px;background:#40caf9;color:white">Specification</button>
                <button type="button" class="btn  p-2" style="border-radius:0 30px  30px 0px;background:#14213D;color:white">Explore</button>
                
            </div>
            <img src="<?php echo URLROOT."/img/star.png";?>" alt="">  <img src="<?php echo URLROOT."/img/star.png";?>" alt="">  <img src="<?php echo URLROOT."/img/star.png";?>" alt="">  <img src="<?php echo URLROOT."/img/star.png";?>" alt="">
        </div>
        <div class="col-sm-3 mt-5">
              <button class="btn mt-4" type="submit" name="<?php echo 'view'.$count;?>" id="<?php echo 'view'.$count;?>" style="width:70%;background:#40caf9;margin:auto;display:block;border-radius:30px;color:white">Launch</button>
           
        </div>
    </div>
    <?php $count++;}?>
    <input type="hidden" name="totalcount" id="totalcount" value="<?php echo $count;?>">
    </div>

    
    </div>  
</div>
</form>
<script>
    function changeFormTarget(el) {
       el.form.setAttribute('target', '_blank')
    }
</script>
<?php require APPROOT . '/views/inc/footer.php';?>