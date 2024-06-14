<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>


<form action="<?php echo URLROOT ;?>admissions/pdf_details" method="post" >
<div class="container">
    <div class="row mt-4 text-center">
        <div class="col">
                <h2><span style="font-size:2rem;font-weight:600">video List </span></h2>
        </div>
       
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label for="video_no" class="form-label ">Course Name</label>
            <input type="text" id="form3Example3" class="form-control" name="course_name" id="course_name"  value="<?php echo $data->course_name;?>" readonly/>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                    <table class="table table-striped text-center  table-hover" >
                        <thead>
                            <tr>
                            <th scope="col">SR.NO.</th>
                            <th scope="col">pdf</th>
                            <th scope="col">title</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach($additionalData as $dataline){ ?>
                            <tr>
                            <input type="hidden" name="<?php echo 'id'.$count;?>" id="<?php echo 'id'.$count;?>"  value="<?php echo $dataline->notes_id;?>">
                            <input type="hidden" name="<?php echo 'course_id'.$count;?>" id="<?php echo 'course_id'.$count;?>"  value="<?php echo $dataline->course_id;?>">
                            <td><?php echo $count+1;?></th>
                            <input type="hidden" name="<?php echo 'pdf_no'.$count;?>" id="<?php echo 'pdf_no'.$count;?>"  value="<?php echo $dataline->pdf_no;?>">
                            <td><?php echo $dataline->pdf_path;?></td>
                            <td><?php echo $dataline->title;?></td>
                            <td>
                             <!-- <button class="btn" type="submit" name="<?php echo 'editcourse'.$count;?>" id="<?php echo 'editcourse'.$count;?>"><img src="<?php echo URLROOT."/img/edit.png";?>" height="20px" width="20px"  alt=""></button> -->
                             <button class="btn"  type="submit" name="<?php echo 'deletevideo'.$count;?>" id="<?php echo 'deletevideo'.$count;?>"><img src="<?php echo URLROOT."/img/delete.png";?>" height="20px" width="20px"  alt=""></button>
                            </td>
                            </tr>
                            <?php $count++;}?>
                            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>