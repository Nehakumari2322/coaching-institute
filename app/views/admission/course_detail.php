<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>


<form action="<?php echo URLROOT ;?>admissions/course_details" method="post" >
<div class="container">
    <div class="row mt-4 text-center">
        <div class="col">
                <h2><button class="btn" type="submit" name="addcoursebtn" id="addcoursebtn"><span style="font-size:2rem;font-weight:600">Course List <img src="<?php echo URLROOT."/img/add.png";?>"  height="33px"  alt=""></span></button></h2>
        </div>
       
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                    <table class="table table-striped text-center  table-hover">
                        <thead>
                            <tr>
                            <th scope="col">SR.NO.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach($data as $dataline){ ?>
                            <tr>
                            <td><?php echo $dataline->course_id;?></th>
                            <input type="hidden" name="<?php echo 'course_id'.$count;?>" id="<?php echo 'course_id'.$count;?>"  value="<?php echo $dataline->course_id;?>">
                            <td><?php echo $dataline->course_name;?></td>
                            <td><?php echo $dataline->status;?></td>
                            <td>
                            <button class="btn"  type="submit" name="<?php echo 'addvideo'.$count;?>" id="<?php echo 'addvideo'.$count;?>"><img src="<?php echo URLROOT."/img/video.png";?>" height="20px" width="20px"  alt=""></button>
                            <button class="btn" type="submit" name="<?php echo 'editcourse'.$count;?>" id="<?php echo 'editcourse'.$count;?>"><img src="<?php echo URLROOT."/img/edit.png";?>" height="20px" width="20px"  alt=""></button>
                             <button class="btn" type="submit" name="<?php echo 'addpdf'.$count;?>" id="<?php echo 'addpdf'.$count;?>"><img src="<?php echo URLROOT."/img/pdf.png";?>" height="20px" width="20px"  alt=""></button>
                             <button class="btn"  type="submit" name="<?php echo 'live'.$count;?>" id="<?php echo 'live'.$count;?>"><img src="<?php echo URLROOT."/img/live2.png";?>" height="20px" width="30px"  alt=""></button>
                             <button class="btn"  type="submit" name="<?php echo 'deletcourse'.$count;?>" id="<?php echo 'deletcourse'.$count;?>"><img src="<?php echo URLROOT."/img/delete.png";?>" height="20px" width="20px"  alt=""></button>
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