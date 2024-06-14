<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php if($additionalData['message']){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <div class="admission-form">
            <form action="<?php echo URLROOT; ?>admissions/updatestudentDetails" method="post" enctype="multipart/form-data">
               <div class="login-top"><h3 class="text-center my-4">Admission</h3></div>
                  <input type="hidden" value="<?php echo $data->student_id;?>" name="student_id" id="student_id"> 
                  <div class="row form-label-box">
                     <h4>Personal Details</h4>
                     <div class="col-md-6 form-label">
                        <label>Name of Candidate</label>
                        <input type="text" name="student_name" placeholder="Name of Student" value="<?php echo $data->student_name;?>">
                     </div>
                     <div class="col-md-6 form-label">
                        <label>Father’s Name</label>
                        <input type="text" name="father_name" placeholder="Father’s Name" value="<?php echo $data->father_name;?>">
                     </div>
                     <div class="col-md-6 form-label">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="<?php echo $data->dob;?>">
                     </div>
                     <div class="col-md-6 form-label">
                        <label>Gender</label>
                        <select name="gender" id="gender">
                           <option value="<?php echo $data->gender;?>"><?php echo $data->gender;?></option>  
                        </select>
                     </div>
                                 <!--  -->
                     <div class="col-md-6 form-label">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Email Address" value="<?php echo $data->email;?>">
                     </div>
                     <div class="col-md-6 form-label">
                        <label>Mobile Number</label>
                        <input type="number" name="phone_no" min='1111111111' max="9999999999" placeholder="Phone Number" value="<?php echo $data->phone_no;?>">
                     </div>
                                 <!--  -->
                     <h4 class="my-4">Permanent Address</h4>
                                 <!--  -->
                     <div class="col-md-6 form-label">
                        <label>Full Address</label>
                        <input type="text" name="full_address" placeholder="Full Address" value="<?php echo $data->full_address;?>">
                     </div>
                     <div class="col-md-6 form-label">
                        <label>State</label>
                        <input type="text" name="state" placeholder="State" value="<?php echo $data->state;?>">
                     </div>
                                 <!--  -->
                                 <!--  -->
                     <div class="col-md-6 form-label">
                        <label>City</label>
                        <input type="text" name="city" placeholder="City" value="<?php echo $data->city;?>">
                     </div>
                  
                                 <!--  -->
                                 <!--  -->
                     <div class="col-md-6 form-label">
                        <label>District</label>
                        <input type="text" name="district" placeholder="District" value="<?php echo $data->district;?>">
                     </div>
                     <div class="col-md-6 form-label">
                        <label>Pin Code</label>
                        <input type="number" name="pincode" min='111111' max="999999" placeholder="Pin Code" value="<?php echo $data->pincode;?>">
                     </div>
                                 <!--  -->
                     <h4 class="my-4">Educational Details</h4>

                                 <!-- 10th class -->
                     <div class="row">                              
                        <div class="col-md-4 form-label">
                        <label>10th/Matric Class Board</label>
                        <input type="text" name="matric_board" placeholder="10th/Matric Class Board" value="<?php echo $data->matric_board;?>">
                     </div>
                                 <!--  -->
                                 <!--  -->
                     <div class="col-md-4 form-label">
                        <label>Marks</label>
                        <input type="number" name="matric_marks" placeholder="Marks" value="<?php echo $data->matric_marks;?>">
                     </div>
                                 <!--  -->
                                 <!--  -->
                     <div class="col-md-4 form-label">
                        <label>Total marks in percentage</label>
                        <input type="number" name="matric_percentage" placeholder="Total marks in percentage" value="<?php echo $data->matric_percentage;?>">
                     </div>
                  </div>
                                 <!-- 10th class end  -->
                                  <!-- Higher Qualification -->
                  <div class=" row">
                     <div class="col-md-3 form-label">
                        <label>Higher Qualification</label>
                        <input type="text" name="higher_qualification" placeholder="Higher Qualification" value="<?php echo $data->higher_qualification;?>">
                     </div>
                     <div class="col-md-3 form-label">
                        <label>Board/University</label>
                        <input type="text" name="board" placeholder="Board/University" value="<?php echo $data->board;?>">
                     </div>
                                 <!--  -->
                                 <!--  -->
                     <div class="col-md-3 form-label">
                        <label>Marks</label>
                        <input type="number" name="marks" placeholder="Marks" value="<?php echo $data->marks;?>">
                     </div>
                                 <!--  -->
                                 <!--  -->
                     <div class="col-md-3 form-label">
                        <label>Total marks in %</label>
                        <input type="number" name="total_percentage" placeholder="Total marks in percentage" value="<?php echo $data->total_percentage;?>">
                     </div>

                     <h4 class="my-4">Course Details</h4>
                     <div class="row">
                     <div class="col-md-12 form-label">
                        <label>Course Name</label>
                        <select id="course_id" name="course_id">
                           <option value="<?php echo $data->course_id;?>"><?php echo $data->course_name;?></option>
                        </select>
                     </div>
                

                                 <!--  -->
                     <div class="d-grid gap-2 col-6 mx-auto form-submit">
                        <input type="submit" class="btn" name="updatestudentbtn" id="updatestudentbtn" value="Submit" style="background:#424242;color:white;border-radius:30px">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>  
   </div>
 </div>
 <?php require APPROOT . '/views/inc/footer.php'; ?>
