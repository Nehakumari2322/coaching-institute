<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT; ?>admissions/studentDetailsByCourseId" method="post" >

<div class="container">
    <div class="row">
        <div class="col pt-3">
            <label  for="input">Select the course</label>
            <select id="course_id" name="course_id">
                <option value="">Select Course</option>
                <?php $count=0; foreach($data as $dataline){ ?> 
                <option value="<?php echo $dataline->course_id;?>"><?php echo $dataline->course_name;?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col mt-4 pt-3">
          <button class="btn bdd"  type="submit" name="allstudent" id="allstudent">Show All Student</button>
        </div>
        <div class="col mt-4 pt-3">
          <button class="btn bdd"  type="submit" name="pendingstudent" id="pendingstudent">Show Pending Fee Student</button>
        </div>
        
    </div>
</div>

<div class="container">
    <div class="row">
    <table class="table table-sm table-striped table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">SN</th>
          <th scope="col">Registration No</th>
            <th scope="col">Student Name</th>
            <th scope="col">Fathers Name</th>
            <th scope="col">Course</th>
            <th scope="col">Fee</th>
            <th scope="col">Due</th>
            <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
      <!-- <?php  echo "gfgfgghjhj"; print_r($additionalData); echo "gfgfgghjhj"; ?> -->
      
      <?php $count=0; foreach($additionalData as $dataline){ ?>
      <tr>
      
        <td ><?php echo $count?> </td>
          
       <td ><?php echo $dataline->admission_no; ?></td>
        <td ><?php echo $dataline->student_name;?></td>
        <td ><?php echo $dataline->father_name;?></td>
        <td ><?php echo $dataline->course_name;?></td>
        <td ><?php echo $dataline->price;?></td>
        <td >Not Now</td>
        <input type="hidden" value="<?php echo $dataline->student_id;?>" name="<?php echo 'student_id'.$count;?>">
        <!-- <?php echo 'test..'.$dataline->student_id?> -->
        <td> 
        <button class="btn" type="submit" name="<?php echo 'editbtn'.$count;?>" id="<?php echo 'editbtn'.$count;?>"><img src="<?php echo URLROOT."/img/ed.png";?>" height="30px" width="30px"  alt=""></button>
        <button class="btn" type="submit" name="<?php echo 'makepaymentbtn'.$count;?>" id="<?php echo 'makepaymentbtn'.$count;?>"><img src="<?php echo URLROOT."/img/money.png";?>" height="30px" width="30px"  alt=""></button>
        <button class="btn" type="submit" name="<?php echo 'certficate'.$count;?>" id="<?php echo 'certficate'.$count;?>"><img src="<?php echo URLROOT."/img/certificate.png";?>" height="30px" width="30px"  alt=""></button>
        <button class="btn" type="submit" name="<?php echo 'result'.$count;?>" id="<?php echo 'result'.$count;?>"><img src="<?php echo URLROOT."/img/result.png";?>" height="30px" width="30px"  alt=""></button>
        </td>
      </tr>
        <?php  $count++;} ?>
        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">


        <?php $count=0; foreach($moreData as $dataline){ ?>
      <tr>
      
        <td ><?php echo $count?></td>
          
       <td ><?php echo $dataline->admission_no; ?></td>
        <td ><?php echo $dataline->student_name;?></td>
        <td ><?php echo $dataline->father_name;?></td>
        <td ><?php echo $dataline->course_name;?></td>
        <td ><?php echo $dataline->price;?></td>
        <td ><?php echo $dataline->due_amt;?></td>
        <input type="hidden" value="<?php echo $dataline->student_id;?>" name="<?php echo 'student_id'.$count;?>">
        <!-- <?php echo 'test..'.$dataline->student_id?> -->
        <td> 
        <button class="btn" type="submit" name="<?php echo 'editbtn'.$count;?>" id="<?php echo 'editbtn'.$count;?>"><img src="<?php echo URLROOT."/img/ed.png";?>" height="30px" width="30px"  alt=""></button>
        <button class="btn" type="submit" name="<?php echo 'makepaymentbtn'.$count;?>" id="<?php echo 'makepaymentbtn'.$count;?>"><img src="<?php echo URLROOT."/img/money.png";?>" height="30px" width="30px"  alt=""></button>
        <button class="btn" type="submit" name="<?php echo 'certficate'.$count;?>" id="<?php echo 'certficate'.$count;?>"><img src="<?php echo URLROOT."/img/certificate.png";?>" height="30px" width="30px"  alt=""></button>
        <button class="btn" type="submit" name="<?php echo 'result'.$count;?>" id="<?php echo 'result'.$count;?>"><img src="<?php echo URLROOT."/img/result.png";?>" height="30px" width="30px"  alt=""></button>
        </td>
      </tr>
        <?php  $count++;} ?>
        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
        <!-- <?php echo "totalcount".$count;?> -->
        </tbody>
      </table>
    </div>
</div>



</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>