<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Software Development Wing <Penta Head Private Ltd.>
 */

 use Dompdf\Dompdf;  
class Pentaheads extends Controller{

    public function __construct() {
       // echo 'Agents construct';
        $this->school = $this->model('Pentahead');
        $todaysDate = null;
    }

    public function adminLogmeIn()
    {
        $data=$this->school->getCourseDetails();
        $adata = $this->totalStudentAndCourseCount();
        $this->view('admission/dashboard',$data,$adata);
      
    } 
    
    public function logmein()
    {
        $adata = $this->school->getswipeImageForHomePage();
        $mdata = $this->school->getNoticeToBeDisplay();
        $data = $this->school->getCourseDetailForHomePage();
        $this->view('pentahead/main',$data,$adata,$mdata);
    } 

    public function navform(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['home'])){  
                $data=$this->school->getCourseDetails();
                $this->view('admission/home',$data);
            }
            else if(isset($_POST['dash'])){
                $data=$this->school->getCourseDetails();
                $adata = $this->totalStudentAndCourseCount();
                $this->view('admission/dashboard',$data,$adata);

            }
            // else if(isset($_POST['courses'])){
            //     $data=$this->school->getCourseDetails();
            //     $this->view('admission/course_detail',$data);
            // }
            // else if(isset($_POST['batch'])){
            //     $data=$this->school->getCourseDetails();
            //     $this->view('admission/addbatch',$data);
            // }
            else if(isset($_POST['feebtn'])){
                $data=$this->school->getCourseDetails();
                $this->view('admission/feestable',$data);
            }
            else if(isset($_POST['swip'])){
                $this->view('admission/add_swiper');
            }
            else if(isset($_POST['notice'])){
                $this->view('admission/add_notice');
            }
            else if(isset($_POST['request'])){
                $this->view('admission/add_notice');
            }
        }
    }

    public function usernavform(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['home'])){
                $adata = $this->school->getswipeImageForHomePage();
                $mdata = $this->school->getNoticeToBeDisplay();
                $data = $this->school->getCourseDetailForHomePage();
                $this->view('pentahead/main',$data,$adata,$mdata);
            }
            else if(isset($_POST['courses'])){
                $data = $this->school->getCourseDetailForHomePage();
                $this->view('pentahead/courses_page',$data);
            }
            else if(isset($_POST['dashboard'])){
                $userId = $_SESSION['userid'];
                $data = $this->school->getEnrollCourseOfUser($userId);
                $adata = $this->school->getUserProfileData($userId);
                $this->view('pentahead/my_courses',$data,$adata);
            }
           
            else if(isset($_POST['logout'])){
                $this->logout();
                $this->view('pentahead/login');
            }
        }
    }
    // ---------------------------------------------login start---------------------------------------

    public function agentsLogin() {
        //    echo 'i am in agentsLogin';
            $adata['message'] = null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(isset($_POST['loginagent'])){
                    $data = [
                        'userid' => trim($_POST['email']),
                        'password' => trim($_POST['password'])
                    ];
                    $matched = $this->school->login_verification($data);
                    if($matched == true && $data['userid'] !='admin@admin.com'){
                        $this->createUserSession($data['userid']);
                        $adata = $this->school->getswipeImageForHomePage();
                        $mdata = $this->school->getNoticeToBeDisplay();
                        $data = $this->school->getCourseDetailForHomePage();
                        $this->view('pentahead/main',$data,$adata,$mdata);
                    }else if($matched == true && $data['userid'] =='admin@admin.com'){
                        $this->view('pentahead/bundles');
                    }
                    else{
                        // echo 'not matched';
                        $adata['message']="Password Invalid";
                        $this->view('pentahead/login',$data,$adata);
                    }
                }
            }
    }


    public function checkRegisteredEmail() {
      
        $adata['message'] = null;
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['register'])){     
                $email = trim($_POST['email']); 
                $matched = $this->school->email_verification($email);
                if($matched == true){
                    $adata['message']="User already exist please try again with different email id !!";
                    $this->view('pentahead/login',$data,$adata,$mdata);    
                }
                else
                {
                    $this->userRegistration();
                   
                }
            }
        }
    }

    public function totalStudentAndCourseCount(){
        $data = $this->school->getAllStudent();
        $count1 = count($data);
        $adata['tStudent'] = $count1;
        $store = $this->school->getAllStudentWithDueFee();
        $count2 = count($store);
        $adata['pStudent'] = $count2;
        return $adata;
    }

    public function dashboard(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['home'])){ 
                $data=$this->school->getCourseDetails();
                $this->view('admission/home',$data);
            }
            else if(isset($_POST['student'])){ 
                $data = $this->school->getAllStudent();
                $this->view('admission/total_student',$data);
            }
            else if(isset($_POST['totalstudent'])){
                $data = $this->school->getAllStudentDetailWithDueFee();
                $this->view('admission/pending_student',$data);
            }
            else if(isset($_POST['courses'])){
                $data=$this->school->getCourseDetails();
                $this->view('admission/course_detail',$data);
            }
            $totalcount = trim($_POST['totalcount']);
            for($count=0; $count<=$totalcount; $count++) {
                if(isset($_POST['editcourse'.$count])){
                    $course_id = trim($_POST['course_id'.$count]);
                    $data = $this->school->getCourseDetailByCourseId($course_id);
                    $this->view('admission/edit_course',$data);
                }
                else if(isset($_POST['seestudentList'.$count])){
                    $course_id = trim($_POST['course_id'.$count]);
                    $data = $this->school->getCourseAndStudenCount($course_id);
                    $this->view('admission/total_student',$data);
                }
                else if(isset($_POST['seestudentPendingFeeList'.$count])){
                    $course_id = trim($_POST['course_id'.$count]);
                    // echo"wfredv".$course_id;
                    $data = $this->school->getStudentDueFeeCOunt($course_id);
                    $this->view('admission/pending_student',$data);
                }
            }
        }

    }

    public function buycourseonline(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['start'])){    
                $courseId =  trim($_POST['course_id']);
                $price =  trim($_POST['price']);
                // $id =  $this->school->insertStudentDetails($name,$userId,$phone_no,$image,$createdTs);
            }
            $this->view('pentahead/payment');
        }
    }

    public function userRegistration()
    {
        $data['message'] = null;
        if(isset($_POST['register']))
        {
            $name =  trim($_POST['username']);
            $pasword =  trim($_POST['password']);
            $userId =  trim($_POST['email']);
            $phone_no =  trim($_POST['no']);
            $createdTs= $this->getCurrentTs();
            $createdBy = 'user';
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy = 'user';
            $targetDir = "uploads/"; 
            $allowTypes = array('jpg','png','jpeg'); 
              
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $image = array_filter($_FILES['image']['name']); 
            if(!empty($image)){ 
                foreach($_FILES['image']['name'] as $key=>$val){ 
                     // File upload path 
                     $image = basename($_FILES['image']['name'][$key]); 
                     $targetFilePath = $targetDir . $image; 
                      
                     // Check whether file type is valid 
                     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     if(in_array($fileType, $allowTypes)){ 
                         // Upload file to server 
                         if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
                             // Image db insert sql 
                             $insertValuesSQL .= "('".$image."', NOW()),"; 
                             $Id = $this->school->insertUserLoginData($pasword, $userId,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
                             $id = $this->school->insertStudentDetails($name,$userId,$phone_no,$image,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
                            if ($userId==true){
                                 $data['message']="Data added successfully !!";
                            }
                            else{
                                 $data['message']="Failed to add data, please try again !!";
                            } 
                        }
                    } 
                } 
            }
        }
        $this->view('pentahead/login',$data);
    }
    // ---------------------------------------------login end-----------------------------------------------

    // -------------------------------------------Student Details start----------------------------------
    public function studentDetails(){
        $data['message'] = null;
        if(isset($_POST['add_student'])){
            
            $admissionNo ='ADDM'.mt_rand(10000,99999).mt_rand(10,99);
            $studentName=trim($_POST['student_name']);
            $fatherName=trim($_POST['father_name']);
            $dob=trim($_POST['dob']);
            $gender=trim($_POST['gender']);
            $email=trim($_POST['email']);
            $phoneNo=trim($_POST['phone_no']);
            $fullAddress=trim($_POST['full_address']);
            $state=trim($_POST['state']);
            $city=trim($_POST['city']);
            $thana=trim($_POST['thana']);
            $district=trim($_POST['district']);
            $pincode =trim($_POST['pincode']);
            $matricBoard=trim($_POST['matric_board']);
            $matricMarks=trim($_POST['matric_marks']);
            $matricPercentage=trim($_POST['matric_percentage']);
            $higherQualification=trim($_POST['higher_qualification']);
            $board=trim($_POST['board']);
            $marks=trim($_POST['marks']);
            $totalPercentage=trim($_POST['total_percentage']);
            $courseId=trim($_POST['course_id']);
            // $courseName=trim($_POST['course_name']);
            $allowvideo = trim($_POST['video']);
            $allowpdf = trim($_POST['pdf']);
            $liveaccess = trim($_POST['live']);
            $createTs=$this->getCurrentTs();
            $createdBy ='admin';
            $lastUpdatedTs=$this->getCurrentTs();
            $lastUpdatedBy='admin';

            $targetDir = "uploads/"; 
            $allowTypes = array('jpg','png','jpeg'); 
              
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $image = array_filter($_FILES['image']['name']); 
            if(!empty($image)){ 
                foreach($_FILES['image']['name'] as $key=>$val){ 
                     // File upload path 
                     $image = basename($_FILES['image']['name'][$key]); 
                     $targetFilePath = $targetDir . $image; 
                      
                     // Check whether file type is valid 
                     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     if(in_array($fileType, $allowTypes)){ 
                         // Upload file to server 
                         if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
                             // Image db insert sql 
                             $insertValuesSQL .= "('".$image."', NOW()),"; 
                             $studentId = $this->school->insertStudentDetailsForAdmission($admissionNo,$studentName,$fatherName,$dob,$image,$gender,$email,$phoneNo,$fullAddress,$state,$city,$district,$pincode,$matricBoard,$matricMarks,$matricPercentage,$higherQualification,$board,$marks,$totalPercentage,$courseId,$allowvideo,$allowpdf,$liveaccess,$createTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
                             if($studentId != null){
                                $data['message']  = "Data is added Successfully !!" ;
                             }
                            else{
                                 $data['message']="Failed to add data, please try again !!";
                            } 
                        }
                    } 
                } 
            }    
        }
        $this->view('admission/home',$data);
    }

    public function editUserProfile(){
        $adata['message'] = null;
        if(isset($_POST['edit'])){
            $name = trim($_POST['username']);
            $password = trim($_POST['password']);
            $lastUpdatedTs=$this->getCurrentTs();
            $lastUpdatedBy='user';
            $userId = $_SESSION['userid'];
            $targetDir = "uploads/"; 
            $allowTypes = array('jpg','png','jpeg'); 
              
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $image = array_filter($_FILES['image']['name']); 
            if(!empty($image)){ 
                foreach($_FILES['image']['name'] as $key=>$val){ 
                     // File upload path 
                     $image = basename($_FILES['image']['name'][$key]); 
                     $targetFilePath = $targetDir . $image; 
                      
                     // Check whether file type is valid 
                     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     if(in_array($fileType, $allowTypes)){ 
                         // Upload file to server 
                         if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
                             // Image db insert sql 
                             $insertValuesSQL .= "('".$image."', NOW()),"; 
                             $studentId = $this->school->updateUserProfile($name,$lastUpdatedTs,$lastUpdatedBy,$userId,$image);
                             $id = $this->school->updatePassword($password,$lastUpdatedTs,$lastUpdatedBy,$userId);
                             if($studentId == true ||  $id == true){
                                $adata['message']  = "Profile is Successfully !!" ;
                             }
                            else{
                                 $adata['message']="Failed to add data, please try again !!";
                            } 
                        }
                    } 
                }
            }
            $userId=$_SESSION['userid']; 
            $data = $this->school->getUserData($userId);
            $this->view('pentahead/edit_profile',$data,$adata);
        } 
    }

    public function updatestudentDetails(){
        $adata['message'] = null;
        if(isset($_POST['updatestudentbtn'])){ 
        $studentId=trim($_POST['student_id']);
        $studentName=trim($_POST['student_name']);
        $fatherName=trim($_POST['father_name']);
        $dob=trim($_POST['dob']);
        $gender=trim($_POST['gender']);
        $email=trim($_POST['email']);
        $phoneNo=trim($_POST['phone_no']);
        $fullAddress=trim($_POST['full_address']);
        $state=trim($_POST['state']);
        $city=trim($_POST['city']);
        // $thana=trim($_POST['thana']);
        $district=trim($_POST['district']);
        $pincode =trim($_POST['pincode']);
        $matricBoard=trim($_POST['matric_board']);
        $matricMarks=trim($_POST['matric_marks']);
        $matricPercentage=trim($_POST['matric_percentage']);
        $higherQualification=trim($_POST['higher_qualification']);
        $board=trim($_POST['board']);
        $marks=trim($_POST['marks']);
        $totalPercentage=trim($_POST['total_percentage']);
        $courseId=trim($_POST['course_id']);
        // $courseName=trim($_POST['course_name']);
        $lastUpdatedTs=$this->getCurrentTs();
        $lastUpdatedBy='admin';
        $result = $this->school->updatestudentDetailsById($studentId,$studentName,$fatherName,$dob,$gender,$email,$phoneNo,$fullAddress,$state,$city,$district,$pincode,$matricBoard,$matricMarks,$matricPercentage,$higherQualification,$board,$marks,$totalPercentage,$courseId,$lastUpdatedTs,$lastUpdatedBy);
        if($result == true){
            $adata['message']  = "Student Data is updated Successfully !!" ;
        }
        $data=$this->school->editStudentDetailsBySid($studentId); //stusent details in table
        // $data=$this->school->getCourseDetails();
        // print_r($data);
        $this->view('admission/editstudentdetails',$data,$adata);
        }
    }
// -------------------------------------------Student Details end----------------------------------

    // -------------------------------------------Course Details start----------------------------------

    public function main(){
      
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data['message'] = null;
        if(isset($_POST['add_course'])){
            $course_name = trim($_POST['course']);
            $desc = ($_POST['desc']);
            $sl = trim($_POST['sl']);
            $coverview = ($_POST['overview']);
            $csyllabus = ($_POST['syllabus']);
            $tprofile = ($_POST['profile']);
            $duration = trim($_POST['duration']);
            $videolink = trim($_POST['videolink']);
            $price = trim($_POST['price']);
            $offerPrice = trim($_POST['oprice']);
            $status= trim($_POST['status']);
            $createTs =$this->getCurrentTs();
            $lastUpdateTs =$this->getCurrentTs();
            $created_by = 'Admin';
            $last_update_by = 'Admin';

            $targetDir = "img/"; 
            $allowTypes = array('jpg','png','jpeg'); 
              
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $image = array_filter($_FILES['image']['name']); 
            if(!empty($image)){ 
                foreach($_FILES['image']['name'] as $key=>$val){ 
                     // File upload path 
                     $image = basename($_FILES['image']['name'][$key]); 
                     $targetFilePath = $targetDir . $image; 
                      
                     // Check whether file type is valid 
                     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     if(in_array($fileType, $allowTypes)){ 
                         // Upload file to server 
                         if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
                             // Image db insert sql 
                             $insertValuesSQL .= "('".$image."', NOW()),"; 
                             $Course_id = $this->school->insertCourse($coverview,$csyllabus,$tprofile,$duration,$videolink,$image,$status,$course_name,$desc,$sl,$price,$offerPrice,$createTs,$lastUpdateTs,$created_by,$last_update_by);
                             if($Course_id != null){
                                $data['message']  = "Course is added Successfully !!" ;
                            }
                            else{
                                 $data['message']="Failed to add data, please try again !!";
                            } 
                        }
                    } 
                } 
            }
            
            $this->view('admission/addcourse',$data);
            }
        }
    }
    // -------------------------------------------Course Details end----------------------------------

    public function addswiper(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['list'])){
                $data = $this->school->getAllSwipImage();
                $this->view('admission/swip_image_list',$data);
            }
            else if(isset($_POST['add_swiper'])){
                $status= trim($_POST['status']);
                $createdTs =$this->getCurrentTs();
                $targetDir = "img/"; 
                $allowTypes = array('jpg','png','jpeg'); 
                  
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                $image = array_filter($_FILES['image']['name']); 
                if(!empty($image)){ 
                    foreach($_FILES['image']['name'] as $key=>$val){ 
                         // File upload path 
                         $image = basename($_FILES['image']['name'][$key]); 
                         $targetFilePath = $targetDir . $image; 
                          
                         // Check whether file type is valid 
                         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                         if(in_array($fileType, $allowTypes)){ 
                             // Upload file to server 
                             if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
                                 // Image db insert sql 
                                 $insertValuesSQL .= "('".$image."', NOW()),"; 
                                 $id = $this->school->insertswiperimage($status,$image,$createdTs);
                                 if($id != null){
                                    $data['message']  = "image is added Successfully !!" ;
                                }
                                else{
                                     $data['message']="Failed to add data, please try again !!";
                                } 
                            }
                        } 
                    } 
                }
                $this->view('admission/add_swiper',$data);
            }
        }
    }


    public function addnotice(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['message'] = null;
            if(isset($_POST['add_notice'])){
                $notice = trim($_POST['notice']);
                $status = trim($_POST['status']);
                $createdTs =$this->getCurrentTs();
                $id = $this->school->insertNoticeToDisplay($status,$notice,$createdTs);
                if($id != null){
                    $data['message']  = "Notice is added Successfully !!" ;
                }
                $this->view('admission/add_notice',$data);
            }
            else if(isset($_POST['list'])){
                $data = $this->school->getAllNotice();
                $this->view('admission/notice_list',$data);
            }
        }

    }

    public function editnotice(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $adata['message'] = null;
            $totalcount = trim($_POST['totalcount']);
            for($count=0; $count<=$totalcount; $count++) {
                if(isset($_POST['editbtn'.$count])){
                    $Id=trim($_POST['id'.$count]);
                    $status = trim($_POST['status'.$count]);
                    // echo"eefdv".$status;
                    $data1 = $this->school->editNoticeByStatus($Id,$status);
                    if($data1 == true){
                        $adata['message'] = "updated successfully";
                    }
                    $data = $this->school->getAllNotice();
                    $this->view('admission/notice_list',$data,$adata); 
    
                }
            }
        }
    }

    public function editswiper(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $adata['message'] = null;
            $totalcount = trim($_POST['totalcount']);
            for($count=0; $count<=$totalcount; $count++) {
                if(isset($_POST['editbtn'.$count])){
                    $Id=trim($_POST['id'.$count]);
                    $status = trim($_POST['status'.$count]);
                    // echo"eefdv".$status;
                    $data1 = $this->school->editSwipImage($Id,$status);
                    if($data1 == true){
                        $adata['message'] = "updated successfully";
                    }
                    $data = $this->school->getAllSwipImage();
                    $this->view('admission/swip_image_list',$data,$adata); 
    
                }
            }
        }
    }


    public function studentDetailsByCourseId(){        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $courseId=trim($_POST['course_id']);
            if(isset($_POST['allstudent'])){
                $data=$this->school->getCourseDetails();                  
                $courseId=trim($_POST['course_id']);
                $aData=$this->school->getStudentName($courseId);
                // print_r($aData);
                $this->view('admission/feestable',$data,$aData);
            }
            else if(isset($_POST['pendingstudent'])){
                $data=$this->school->getCourseDetails();                  
                // $courseId=trim($_POST['course_id']);
                $mdata=$this->school->getDueFeeByCourseId($courseId);
                // print_r($mdata);
                $this->view('admission/feestable',$data,$adata,$mdata);
            }
            $totalcount = trim($_POST['totalcount']);
            for($count=0; $count<=$totalcount; $count++) {
                if(isset($_POST['editbtn'.$count])){
                    $studentId=trim($_POST['student_id'.$count]);
                    $data=$this->school->editStudentDetailsBySid($studentId);
                    $this->view('admission/editstudentdetails',$data); 
    
                }
                else if(isset($_POST['makepaymentbtn'.$count])){
                    $studentId=trim($_POST['student_id'.$count]);
                    // echo "kks".$studentId;
                    $data=$this->school->getStudentDetailsById($studentId);
                    // print_r($data);
                    $this->view('admission/paymentdetails',$data); 
                }
                else if(isset($_POST['certficate'.$count])){
                    $studentId=trim($_POST['student_id'.$count]);
                    $data=$this->school->editStudentDetailsBySid($studentId);
                    $this->view('admission/uploadcertificate',$data);

                }
                else if(isset($_POST['result'.$count])){
                    $studentId=trim($_POST['student_id'.$count]);
                    $data=$this->school->editStudentDetailsBySid($studentId);
                    $this->view('admission/updateresult',$data);

                }
            }
        }
    }

    public function feeDetails(){
        if(isset($_POST['feesubmitbtn'])){
            $adata['message'] = null;
            $studentId=trim($_POST['student_id']);
            $paymentMethod=trim($_POST['payment_method']);
            $transactionId=trim($_POST['transaction_id']);
            $notes=trim($_POST['notes']);
            $date=trim($_POST['date']);
            $paymentOption=trim($_POST['payment_option']);
            $amtPaid=trim($_POST['amt_paid']);
            $amtToBePaid=trim($_POST['amt_to_be_paid']);
            $dueAmt=trim($_POST['due_amt']);
            $reminderDate=trim($_POST['reminder_date']);
            $createdTs=$this->getCurrentTs();
            $createdBy='admin';
            $lastUpdatedTs=$this->getCurrentTs();
            $lastUpdatedBy='admin';

            $id = $this->school->insertFeeDetails($studentId,$paymentMethod,$transactionId,$notes,$date,$paymentOption,$amtPaid,$amtToBePaid,$dueAmt,$reminderDate,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
            if($id != null){
                $adata['message']= "payment updated successfully";
            }
            $data = $this->school->getStudentDetailsById($studentId);
            $this->view('admission/paymentdetails',$data,$adata); 
        }


        elseif(isset($_POST['backbtn'])){
            $this->view('admission/feestable');  
        }
    }

    public function uploadcertificate(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $adata['message'] = null;
                if(isset($_POST['upload'])){
                    $studentId = trim($_POST['student_id']);
                    $lastUpdatedTs=$this->getCurrentTs();
                    $lastUpdatedBy='admin';
                    $targetDir = "certificates/"; 
                    $allowTypes = array('jpg','png','jpeg','pdf'); 
                    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                    $certificate = array_filter($_FILES['image']['name']); 
                    if(!empty($certificate)){ 
                        foreach($_FILES['image']['name'] as $key=>$val){ 
                             // File upload path 
                             $certificate = basename($_FILES['image']['name'][$key]); 
                             $targetFilePath = $targetDir . $certificate; 
                              
                             // Check whether file type is valid 
                             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                             if(in_array($fileType, $allowTypes)){ 
                                 // Upload file to server 
                                 if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
                                     // Image db insert sql 
                                     $insertValuesSQL .= "('".$certificate."', NOW()),"; 
                                     $certificate_id = $this->school->insertCertificate($studentId,$certificate,$lastUpdatedTs,$lastUpdatedBy);
                                    //  echo"wergf";
                                     if($certificate_id == true){
                                        $adata['message']  = "Certificate is added Successfully !!" ;
                                    }
                                    else{
                                         $adata['message']="Failed to add, please try again !!";
                                    } 
                                }
                            } 
                        } 
                    }
                    // $studentId=trim($_POST['student_id'.$count]);
                    $data=$this->school->editStudentDetailsBySid($studentId);
                    $this->view('admission/uploadcertificate',$data,$adata);

                }
            }

    }
    
    public function uploadresult(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $adata['message'] = null;
            // echo"fsdgb";
                if(isset($_POST['upload'])){
                    $studentId = trim($_POST['student_id']);
                    $obtMark = trim($_POST['obt_mark']);
                    $totalMark = trim($_POST['total_mark']);
                    $percentage = trim($_POST['percentage']);
                    $lastUpdatedTs = $this->getCurrentTs();
                    $lastUpdatedBy = 'admin';
                    $id = $this->school->updateStudentResult($studentId,$obtMark,$totalMark,$percentage,$lastUpdatedTs,$lastUpdatedBy);
                    if($id == true){
                        $adata['message'] = "result added successfully";
                    }
                    $data=$this->school->editStudentDetailsBySid($studentId);
                    $this->view('admission/updateresult',$data,$adata);
                }
            }

    }

    public function uploadpdf(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adata['message'] = null;
            if(isset($_POST['editpdf'])){
                $course_id = trim($_POST['course_id']);
                $data =$this->school->getCourseDetailByCourseId($course_id);
                $adata =$this->school->getNotesByCourseId($course_id);
                $this->view('admission/pdflist',$data,$adata);  
            }
            else if(isset($_POST['uploadpdf'])){
                // echo"esdfg";
                $course_id = trim($_POST['course_id']);
                $course_name = trim($_POST['course_name']);
                $title = trim($_POST['title']);
                // $desc = ($_POST['desc']);
                // $short_desc = ($_POST['sdesc']);
                $pdf_no = trim($_POST['pdf_no']);
                $createdTs=$this->getCurrentTs();
                $createdBy='admin';
                $lastUpdatedTs=$this->getCurrentTs();
                $lastUpdatedBy='admin';
                $targetDir = "notes/"; 
                $allowTypes = array('pdf','pdf/a','pdf/e','pdf/x'); 
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                $pdf = array_filter($_FILES['pdf']['name']); 
                if(!empty($pdf)){ 
                    foreach($_FILES['pdf']['name'] as $key=>$val){ 
                         // File upload path 
                         $pdf = basename($_FILES['pdf']['name'][$key]); 
                         $targetFilePath = $targetDir . $pdf; 
                          
                         // Check whether file type is valid 
                         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                         if(in_array($fileType, $allowTypes)){ 
                             // Upload file to server 
                             if(move_uploaded_file($_FILES["pdf"]["tmp_name"][$key], $targetFilePath)){ 
                                 // Image db insert sql 
                                 $insertValuesSQL .= "('".$pdf."', NOW()),"; 
                                 $notes_id = $this->school->insertCourseNotes($pdf,$course_id,$title,$pdf_no,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
                                //  echo"wergf";
                                 if($notes_id != null){
                                    $adata['message']  = "Notes is added Successfully !!" ;
                                }
                                else{
                                     $adata['message']="Failed to add, please try again !!";
                                } 
                            }
                        } 
                    } 
                }
                $course_id = trim($_POST['course_id']);
                $data=$this->school->getCourseDetailByCourseId($course_id);
                $this->view('admission/addpdf',$data,$adata);
            }   
        }
    }

    public function editvideo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $adata['message'] = null;
            if(isset($_POST['upload'])){
                $course_id = trim($_POST['course_id']);
                $id = trim($_POST['id']);
                $video_no = trim($_POST['video_no']);
                $title = trim($_POST['title']);
                $lastUpdatedTs=$this->getCurrentTs();
                $lastUpdatedBy='admin';
                $data1 = $this->school->updateCourseVideoById($course_id,$id,$video_no,$title,$lastUpdatedTs,$lastUpdatedBy);
                if($data1 == true){
                    $adata['message'] = "Video Updated successfully";
                }
                $data =$this->school->getCourseDetailByCourseId($course_id);
                $adata =$this->school->getvideoByCourseId($course_id);
                $this->view('admission/videolist',$data,$adata);  

            }
        }
    }

    public function uploadvideo(){
        // echo ' Inside navbar';
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adata['message'] = null;
        if(isset($_POST['editvideo'])){
            $course_id = trim($_POST['course_id']);
            $data =$this->school->getCourseDetailByCourseId($course_id);
            $adata =$this->school->getvideoByCourseId($course_id);
            $this->view('admission/videolist',$data,$adata);  
        }
        else if(isset($_POST['upload'])){
            $course_id = trim($_POST['course_id']);
            $course_name = trim($_POST['course_name']);
            $title = trim($_POST['title']);
            // $desc = ($_POST['desc']);
            // $short_desc = ($_POST['sdesc']);
            $video_no = trim($_POST['video_no']);
            $createdTs = $this->getCurrentTs();
            $createdBy = 'admin';
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy = 'admin';
            $targetDir = "video/"; 
            $allowTypes = array('mp4','mov','avi','webm'); 
              
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $video = array_filter($_FILES['video']['name']); 
            if(!empty($video)){ 
                foreach($_FILES['video']['name'] as $key=>$val){ 
                     // File upload path 
                     $video = basename($_FILES['video']['name'][$key]); 
                     $targetFilePath = $targetDir . $video; 
                      
                     // Check whether file type is valid 
                     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     if(in_array($fileType, $allowTypes)){ 
                         // Upload file to server 
                         if(move_uploaded_file($_FILES["video"]["tmp_name"][$key], $targetFilePath)){ 
                             // Image db insert sql 
                             $insertValuesSQL .= "('".$video."', NOW()),"; 
                             $video_id = $this->school->insertVideo($video,$course_id,$title,$video_no,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
                             if($video_id != null){
                                $adata['message']  = "video is added Successfully !!" ;
                            }
                            else{
                                 $adata['message']="Failed to add, please try again !!";
                            } 
                        }
                    } 
                } 
            }
            $course_id = trim($_POST['course_id']);
            $data=$this->school->getCourseDetailByCourseId($course_id);
            $this->view('admission/addvideo',$data,$adata);
        }
      }
    }

    public function addBatch(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data['message'] = null;
        if(isset($_POST['add_batch'])){
            $course_id = trim($_POST['course_id']);
            $name = trim($_POST['name']);
            $duration = trim($_POST['duration']);
            $start_time = trim($_POST['start']);
            $end_time = ($_POST['end']);
            $start_date = ($_POST['start_date']);
            $end_date = trim($_POST['end_date']);
            $createdTs = $this->getCurrentTs();
            $createdBy = 'admin';
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy = 'admin';
            $live = trim($_POST['live']);
            $batch_id = $this->school->insertbatch($course_id,$name,$duration,$start_time, $end_time,$start_date,$end_date,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy,$live);

            if($batch_id != null){
                $data['message']  = "Batch is added Successfully !!" ;
            }
            else{
                 $data['message']="Failed to add, please try again !!";
            } 
            $this->view('admission/addbatch',$data);
        }

    }
}
    
    public function course_details(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $adata['message'] = null;
            if(isset($_POST['addcoursebtn'])){
                $this->view('admission/addcourse');
            }
           
                $totalcount = trim($_POST['totalcount']);
                for ($count=0; $count<=$totalcount; $count++)
                {
                    if(isset($_POST['editcourse'.$count])){
                        $course_id = trim($_POST['course_id'.$count]);
                        $data = $this->school->getCourseDetailByCourseId($course_id);
                        $this->view('admission/edit_course',$data);
                    }
                    else if(isset($_POST['deletcourse'.$count])){
                        $course_id = trim($_POST['course_id'.$count]);
                        $data = $this->school->deleteCourseById($course_id);
                        $data=$this->school->getCourseDetails();
                        $this->view('admission/course_detail',$data);
                    }
                    else if(isset($_POST['addpdf'.$count])){
                        $course_id = trim($_POST['course_id'.$count]);
                        $data = $this->school->getCourseDetailByCourseId($course_id);
                         $this->view('admission/addpdf',$data);
                    }
                    else if(isset($_POST['addvideo'.$count])){
                        $course_id = trim($_POST['course_id'.$count]);
                        $data = $this->school->getCourseDetailByCourseId($course_id);
                        $this->view('admission/addvideo',$data);

                    }

                    else if(isset($_POST['live'.$count])){
                        $course_id = trim($_POST['course_id'.$count]);
                        $data = $this->school->getCourseDetailByCourseId($course_id);
                        $this->view('admission/addlivelink',$data);

                    }
                }
                 
            
            }
        }

    public function video_details(){
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++)
        {
            if(isset($_POST['deletevideo'.$count])){
                $id = trim($_POST['id'.$count]);
                $course_id = trim($_POST['course_id'.$count]);
                $result = $this->school->deleteVideoById($id);
                $data =$this->school->getCourseDetailByCourseId($course_id);
                $adata =$this->school->getvideoByCourseId($course_id);
                $this->view('admission/videolist',$data,$adata);  
                // $this->view('admission/videolist',)
            }
            else if(isset($_POST['editcourse'.$count])){
                $course_id = trim($_POST['course_id'.$count]);
                $id = trim($_POST['id'.$count]);
                $data = $this->school->getVideoDetailsForEditing($course_id,$id);
                $this->view('admission/edit_video',$data);
            }
        }
    }

    public function pdf_details(){
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++)
        {
            if(isset($_POST['deletevideo'.$count])){
                $id = trim($_POST['id'.$count]);
                $course_id = trim($_POST['course_id'.$count]);
                $result = $this->school->deleteNotesById($id);
                $data =$this->school->getCourseDetailByCourseId($course_id);
                $adata =$this->school->getNotesByCourseId($course_id);
                $this->view('admission/pdflist',$data,$adata);  
            }
           
        }
    }

    public function uploadlink(){
        $adata['message'] = null;
        if(isset($_POST['editlink'])){
            $course_id = trim($_POST['course_id']);
            $data = $this->school->getLifeLink($course_id);
            $this->view('admission/editlivelink',$data);
        }
        else if(isset($_POST['uploadlive'])){
            $course_id = trim($_POST['course_id']);
            $link = trim($_POST['link']);
            $status = trim($_POST['status']);
            $createdTs = $this->getCurrentTs();
            $createdBy = 'admin';
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy = 'admin';
            $id = $this->school->uploadLifeLink($course_id,$link,$status,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
            if($id == true){
                $adata['message'] = 'link is added successfully!';
            }

            $data=$this->school->getCourseDetailByCourseId($course_id);
            $this->view('admission/addlivelink',$data,$adata);
        }

    }

    public function updateLinkStatus(){
        $adata['message'] = null;
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<$totalcount; $count++) {
            if(isset($_POST['editbtn'.$count])){
            $id = trim($_POST['id'.$count]);
            $status = trim($_POST['status'.$count]);
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy = 'admin';
            $update_id = $this->school->editLifeLink($id,$status,$lastUpdatedTs,$lastUpdatedBy);
            if($update_id == true){
                $adata['message'] = "updated successfully !!";
            }
            $course_id = trim($_POST['course_id'.$count]);
            $data = $this->school->getLifeLink($course_id);
            $this->view('admission/editlivelink',$data,$adata);
            }
        }
    }

    public function editCourse(){
        if(isset($_POST['edit_course'])){
            $course_id = trim($_POST['course_id']);
            $coursename = trim($_POST['coursename']);
            $seq_no = trim($_POST['sl']);
            $coverview = ($_POST['overview']);
            $csyllabus = ($_POST['syllabus']);
            $tprofile = ($_POST['profile']);
            $duration = trim($_POST['duration']);
            $videolink = trim($_POST['videolink']);
            $desc = ($_POST['desc']);
            $price = trim($_POST['price']);
            $offer_price = trim($_POST['oprice']);
            $status = trim($_POST['status']);
            // echo"regf";
            $course_id = $this->school->editCourseData($coverview,$csyllabus,$tprofile,$duration,$videolink,$course_id,$coursename,$seq_no,$desc,$price,$offer_price,$status);
            // echo"rthgnb".$course_id;
            $data=$this->school->getCourseDetails();
            $this->view('admission/course_detail',$data);
            
        }
        
    }

    public function viewCourseDetails(){
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<$totalcount; $count++) {
            if(isset($_POST['start'.$count])){
                $course_id= trim($_POST['course_id'.$count]);
                $data = $this->school->getCourseDetailByCourseId($course_id);
                $this->view('pentahead/course_details',$data);
            }
        }
    }

    public function userHomePage(){
        if(isset($_POST['viewall'])){
            $data = $this->school->getCourseDetailForHomePage();
            $this->view('pentahead/courses_page',$data);
        }
        else if(isset($_POST['submit'])){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $course = trim($_POST['course']);
            $createdTs = $this->getCurrentTs();
            $createdBy = 'admin';
            $id = $this->school->insertCallRequest($name,$email,$phone,$course,$createdTs,$createdBy);
            $adata = $this->school->getswipeImageForHomePage();
            $mdata = $this->school->getNoticeToBeDisplay();
            $data = $this->school->getCourseDetailForHomePage();
            $this->view('pentahead/main',$data,$adata,$mdata);
           
        }
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<$totalcount; $count++) {
            if(isset($_POST['start'.$count])){
                $course_id=trim($_POST['course_id'.$count]);
                $data = $this->school->getCourseDetailByCourseId($course_id);
                $this->view('pentahead/course_details',$data);
            }
        }
    }


    public function viewCourseVideoAndPdf()
    {

        if(isset($_POST['edit'])){
            // echo"fdv";
            $userId=$_SESSION['userid']; 
            $data = $this->school->getUserData($userId);
            $this->view('pentahead/edit_profile',$data);
        }
        else if(isset($_POST['print'])){
            $userId=$_SESSION['userid']; 
            $htmlText = $this->buildHTMLTextForPDFReport($userId);
            // echo"yughjkm".$htmlText;
            $this->buildHTMLToPDF($htmlText);

        }
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<$totalcount; $count++) {
            
             if(isset($_POST['view'.$count])){
                echo"DEWfdv";
               $adata['message']=null;
               $ndata['message']=null;
               $course_id=trim($_POST['course_id'.$count]);
               $userId=$_SESSION['userid'];  
            //    echo"asdfg".$userId;     
               $data1 = $this->school->getCourseAccessOfUser($course_id,$userId);
               print_r($data1);
               echo"ergf".is_null($data1->allow_pdf). "erfggb".is_null($data1->live_access);
                if($data1->allow_video == 'Y' && $data1->allow_pdf == null && $data1->live_access =='Y'){
                    echo"allow video";
                    $data = $this->school->getCourseVideo($course_id);
                    $adata['message']= "Access of Notes is not given to you";
                    $rdata = $this->school->getLinkOfCourse($course_id);
                    $this->view('pentahead/course_acces',$data,$adata,$mData,$ndata,$rdata);
                } 
                else if($data1->allow_video == 'Y' && is_null($data1->allow_pdf) && is_null($data1->live_access)){
                    echo"allow video not life";
                    $data = $this->school->getCourseVideo($course_id);
                    $adata['message']= "Access of Notes is not given to you";              
                    $this->view('pentahead/course_acces_for_video_pdf',$data,$adata,$mData,$ndata);
                }     
               else if($data1->allow_video == null && $data1->allow_pdf == 'Y' && $data1->live_access =='Y'){
                echo"allow pdf";
                    $mData = $this->school->getNotesOfCourses($course_id);
                    $ndata['message']= "Access of Videos is not given to you";
                    $rdata = $this->school->getLinkOfCourse($course_id);
                    $this->view('pentahead/course_acces',$data,$adata,$mData,$ndata,$rdata);
                  
               }
               else if($data1->allow_video == 'Y' && $data1->allow_pdf == 'Y'  &&  $data1->live_access =='Y'){
                echo"both";
                    $data = $this->school->getCourseVideo($course_id);
                    $mData = $this->school->getNotesOfCourses($course_id);
                    $rdata = $this->school->getLinkOfCourse($course_id);
                    $this->view('pentahead/course_acces',$data,$adata,$mData,$ndata,$rdata);
               }
               else if($data1->allow_video == null && $data1->allow_pdf == null && $data1->live_access =='Y'){
                echo"allow life only";
                    $userId = $_SESSION['userid'];
                    $adata['message']= "Access of Notes is not given to you";
                    $ndata['message']= "Access of Videos is not given to you";
                    $rdata = $this->school->getLinkOfCourse($course_id);
                    $this->view('pentahead/course_acces',$data,$adata,$mData,$ndata,$rdata);
               }
               
                else if($data1->allow_video == null && $data1->allow_pdf == 'Y' && $data1->live_access == null){
                    echo"allow pdf not life";
                    $mData = $this->school->getNotesOfCourses($course_id);
                    $ndata['message']= "Access of Videos is not given to you";
                    
                    $this->view('pentahead/course_acces_for_video_pdf',$data,$adata,$mData,$ndata);
                } 
                else if($data1->allow_video == 'Y' && $data1->allow_pdf == 'Y'  &&  $data1->live_access == null){
                    echo"allow both not life";
                    $data = $this->school->getCourseVideo($course_id);
                    $mData = $this->school->getNotesOfCourses($course_id);
                    $this->view('pentahead/course_acces_for_video_pdf',$data,$adata,$mData,$ndata);
                }
               else if($data1->allow_video == null && $data1->allow_pdf == null && $data1->live_access == null){
                // echo"allow  not life";
                    $userId = $_SESSION['userid'];
                    $data = $this->school->getEnrollCourseOfUser($userId);
                    $adata = $this->school->getUserProfileData($userId);
                    $this->view('pentahead/my_courses',$data,$adata);
                }
               
            }
        }
    }

    

    public function buildHTMLTextForPDFReport($userId){
      
        $data = $this->school->getDetailsForIdCard($userId);
        // print_r($data);
        $html1=' <!DOCTYPE html>
         <html lang="en">
         <head>
             <meta charset="UTF-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Details Pdf</title>
             <style>
             th, td,tr {
                border:none;
              }
             </style>
         </head>
         <body>
    
        
          
             
            <br><br>
            
             <table  width="50%"  style="margin-left: auto;margin-right: auto;border:2px solid #40caf9;border-radius:10px">
               <thead >
               <br>
               <tr >
                    
                    <th colspan="2"> <img src=" '. URLROOT.'/uploads/'. $data->image.' " height="100px" width="100px" style="margin-left: auto;margin-right: auto; display: block;border:50%  "></th>
                      
               </tr>
               
               <tr> 
                    <th colspan="2">'.$data->student_name.'</th>
               </tr>
               
               <tr> 
                    <th colspan="2">'.$data->course_name.'<br> <br>  <hr style="background-color:#40caf9">  </th>
                    
               </tr>
                <br>
                <tr>    
                    <th><b>Addmission number:</b></th>
                    <td>'.$data->admission_no.'</td>
                     
                </tr>
                <tr>
                    <th><b>Name:</b></th>
                    <td>'.$data->student_name.'</td>
                </tr>
                <tr>
                    <th><b>Phone number:</th>
                    <td>'.$data->phone_no.'</td>
                </tr>
                <tr>
                    <th><b>Email:</b></th>
                    <td>'.$data->email.'</td>
                </tr>
                <br> 
               </thead>';

       
           
            $html2='        </table>
                        </body>
                    </html> ';
        
        $html=$html1.$html2;
        return $html;
    } 

    public function buildHTMLToPDF($htmlText){
        $dompdf = new Dompdf();
        $html = $htmlText;
        // $html = file_get_contents('../app/views/maintainbooks/details_pdf.php');
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        // $dompdf->stream('details_pdf1.pdf',['Attachment'=>false]);
        $dompdf->stream("new file", array('Attachment'=>0));
        // $dompdf->stream("file.pdf");
    }

    // -------------------------------------session------------------------------------------

    public function createUserSession($user){
        session_start();
         // Taking current system Time
         $_SESSION['start'] = time(); 
  
         // Destroying session after 1 minute
         $_SESSION['expire'] = $_SESSION['start'] + (1 * 240) ; 
       // echo " in session: userid is ". $user;
       $_SESSION['loggedin'] = "YES";
       $_SESSION['userid'] = $user;
       return $user;
    }
    
    public function logout(){

        unset($_SESSION['userid']);
        unset($_SESSION['loggedin']);
        session_destroy();
        // redirect('users/login');
    }
}

