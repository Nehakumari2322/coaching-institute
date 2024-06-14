<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<section>

<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <div class="admission-form">
            <form action="<?php echo URLROOT; ?>admissions/studentDetails" method="post" enctype="multipart/form-data">
               <div class="login-top"><h3 class="text-center my-4">Admission</h3></div>
                  
               <?php if($data['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $data['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       <?php } ?>

                  <div class="row form-label-box">
                     <h4>Personal Details</h4>
                     <div class="col-md-6 form-label">
                     <label>Name of Candidate</label>
                     <input type="text" name="student_name" id="student_name" placeholder="Name of Student" required>
                  </div>
                  <div class="col-md-6 form-label">
                     <label>Father’s Name</label>
                     <input type="text" name="father_name" id="father_name" placeholder="Father's Name" required>
                  </div>
                  <div class="col-md-4 form-label">
                     <label>Date of Birth</label>
                     <input type="date" name="dob" id="dob" >
                  </div>
                  <div class="col-md-4 form-label">
                     <label>Gender</label>
                     <select name="gender" id="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                     </select>
                  </div>
                  <div class="col-md-4 form-label">
                     <label>Upload Image</label>
                     <input type="file" name="image[]" id="image[]" accept="image/*" required/>
                  </div>
                                 <!--  -->
                  <div class="col-md-6 form-label">
                     <label>Email Address</label>
                     <input type="email" name="email" id="email" placeholder="Email Address" required>
                  </div>
                  <div class="col-md-6 form-label">
                     <label>Mobile Number</label>
                     <input type="number" name="phone_no" id="phone_no" placeholder="Phone Number" required min='1111111111' max="9999999999">
                  </div>
                                 <!--  -->
                  <h4 class="my-4">Permanent Address</h4>
                                 <!--  -->
                  <div class="col-md-6 form-label">
                     <label>Full Address</label>
                     <input type="text" name="full_address" id="full_address" placeholder="Full Address" required>
                  </div>
                  <div class="col-md-6 form-label">
                     <label>State</label>
                     <input type="text" name="state" id="state" placeholder="State" required>
                  </div>
                                 <!--  -->
                                 <!--  -->
                  <div class="col-md-6 form-label">
                     <label>City</label>
                     <input type="text" name="city" id="city" placeholder="City" required>
                  </div>
                  <div class="col-md-6 form-label">
                     <label>Thana</label>
                     <input type="text" name="thana" id="thana" placeholder="Thana" required>
                  </div>
                                 <!--  -->
                                 <!--  -->
                  <div class="col-md-6 form-label">
                     <label>District</label>
                     <input type="text" name="district" id="district" placeholder="District" required>
                  </div>
                  <div class="col-md-6 form-label">
                     <label>Pin Code</label>
                     <input type="number" name="pincode" id="pincode" placeholder="Pin Code" required min='111111' max="999999">
                  </div>
                                 <!--  -->
                  <h4 class="my-4">Educational Details</h4>

                                 <!-- 10th class -->
                  <div class="row">                              
                     <div class="col-md-4 form-label">
                     <label>10th/Matric Class Board</label>
                     <input type="text" name="matric_board" id="matric_board" placeholder="10th/Matric Class Board" required>
                  </div>
                                 <!--  -->
                                 <!--  -->
                  <div class="col-md-4 form-label">
                     <label>Marks</label>
                     <input type="number" name="matric_marks" id="matric_marks" placeholder="Marks" required>
                  </div>
                                 <!--  -->
                                 <!--  -->
                  <div class="col-md-4 form-label">
                     <label>Total marks in percentage</label>
                     <input type="number" name="matric_percentage" id="matric_percentage" placeholder="Total marks in percentage" required>
                  </div>
               </div>
                  <div class=" row">
                     <div class="col-md-3 form-label">
                     <label>Higher Qualification</label>
                     <input type="text" name="higher_qualification" id="higher_qualification" placeholder="Higher Qualification" required>
                  </div>
                  <div class="col-md-3 form-label">
                     <label>Board/University</label>
                     <input type="text" name="board" id="board" placeholder="Board/University" required>
                  </div>
                                 <!--  -->
                                 <!--  -->
                  <div class="col-md-3 form-label">
                     <label>Marks</label>
                      <input type="number" name="marks" id="marks" placeholder="Marks" required>
                  </div>
                                 <!--  -->
                                 <!--  -->
                  <div class="col-md-3 form-label">
                     <label>Total marks in %</label>
                     <input type="number" name="total_percentage" id="total_percentage" placeholder="Total marks in percentage" required>
                  </div>

                  <h4 class="my-4">Course Details</h4>
                  <div class="row">
                     <!-- <input type="hidden" name="course_name" id="course_name" valoue="<?php echo $dataline->course_name;?>">  -->
                     <div class="col-md-12 form-label">
                     <label>Course Name</label>
                     <select id="course_id" name="course_id" id="course_id">
                        <option value="course_name">Course</option>
                        <?php $count=0; foreach($data as $dataline){ ?> 
                           <option value="<?php echo $dataline->course_id;?>"><?php echo $dataline->course_name;?></option>
                        <?php } ?>
                        </select>
                  </div>

                  <div class="row">
                     <div class="col">
                        <h4>Allow </h4>
                           <input class="form-check-input" type="checkbox" value="Y" id="video" name="video">&nbsp;Video &nbsp;&nbsp;
                           <input class="form-check-input" type="checkbox" value="Y" id="pdf" name="pdf">&nbsp;PDF &nbsp;&nbsp;&nbsp;
                   
                     </div>
                     <div class="col">
                        <h4>Live Access  </h4>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="live" id="live" value="Y">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="live" id="live1" value="N">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                     </div>
                  </div>
                                 <!--  -->
                  <div class="d-grid gap-2 col-6 mx-auto form-submit">
               
                     <input type="submit" class="btn  mb-4" name="add_student" id="add_student" value="Submit" style="background:#424242;color:white; border-radius: 50px;">
                  </div>
              
            </form>
         </div>
      </div>
   </div>
 </div>
    
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>