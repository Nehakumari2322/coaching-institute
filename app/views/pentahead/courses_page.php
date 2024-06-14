<?php require APPROOT . '/views/inc/cheader.php'; ?>
<?php require APPROOT . '/views/inc/unavbar.php'; ?>
<div class="cours text-center">
     <img src="<?php echo URLROOT."/img/cs.PNG";?>" class="image-fluid " style="max-width:100%;height:auto" alt="">
</div>
<form action="<?php echo URLROOT ;?>admissions/viewCourseDetails" method="post" >
<section style="background:#F7F7F7;">
<div class="container">
    <div class="row text-center  pt-5">
        <?php $count = 0; foreach($data as $dataLine){ ?>
            <input type="hidden" value="<?php echo $dataLine->course_id;?>" name="<?php echo 'course_id'.$count;?>" id="<?php echo 'course_id'.$count;?>">
        <div class="col-sm-3 mb-2">
            <div class="card h-100" style="box-shadow: 0 4px 20px 0 rgb(198 184 184 / 60%),0 4px 20px 0 rgba(219, 219, 219, 0.3);">
                 <img src="<?php echo URLROOT.'/img/'. $dataLine->image;?>" alt="">
                 <div class="row p-1">
                    <div class="col">
                       <p><b> Duration </b></p>
                    </div>
                    <div class="col">
                        <p><u><?php echo $dataLine->duration;?></u></p>
                    </div>
                 </div>
                 <p class="px-2 pt-3" style="font-size:1.3rem"><b><?php echo $dataLine->course_name;?></b></p>
                <div class="card-footer">
                <button class="btn mt-4" type="submit" name="<?php echo 'start'.$count;?>" id="<?php echo 'start'.$count;?>" style="background:#40caf9;width:50%">Explore</button>
                  
                </div>
            </div>
        </div>
        <?php $count++;}?>
        <input type="hidden" name="totalcount" id="totalcount" value="<?php echo $count;?>">
  
    </div>
</div>
</section>
</form>

<?php require APPROOT . '/views/inc/footer.php';?>