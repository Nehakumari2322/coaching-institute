<?php

class Pentahead {

    private $db;

    public function __construct() {

        $this->db = new Database;
       
    }


    public function email_verification($data){

        $this->db->query('SELECT 1 FROM user where login_id = :email');
        $this->db->bind(':email', $data);
    
        if($row = $this->db->single()){
               
            return true;
        }
        else{
              
            return false;
        }
    }

    public function login_verification($data){
        
        $this->db->query('SELECT * FROM user where login_id = :user_id and password = :password');
            $this->db->bind(':user_id', $data['userid']);
            $this->db->bind(':password', $data['password']);

            if($row = $this->db->single()){
               
                return true;
            }
            else{
              
                return false;
            }
           
        // echo 'i am in logmein model'.$user .$password ;
    }

    public function insertUserLoginData($pasword, $userId,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){

        $this->db->query('INSERT INTO user( id,login_id,password,created_ts,created_by,last_update_ts,last_updated_by) '
                        . ' VALUES ( 0,:userId,:password,:createdTs,:createdBy,:lastUpdatedTs,:lastUpdatedBy)');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':password',$pasword);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':createdBy', $createdBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        if($this->db->execute()){
            $userId = $this->db->insertId();
            return true;

        }
        else {
            return false;
        }
    }

    public function insertCourseNotes($pdf,$course_id,$title,$pdf_no,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        // echo "retgfv";
        $this->db->query('INSERT INTO notes_details(notes_id,course_id,pdf_no,title,pdf_path,created_ts,created_by, '
                .        ' last_updated_ts, last_updated_by) '
                .        ' VALUES(0,:course_id,:pdf_no,:title,:pdf,:createdTs,:createdBy,:lastUpdatedTs,:lastUpdatedBy) ');
        $this->db->bind(':pdf_no',$pdf_no);
        $this->db->bind(':course_id',$course_id);
        $this->db->bind(':pdf',$pdf);
        $this->db->bind(':title',$title);
        $this->db->bind(':createdTs',$createdTs);
        $this->db->bind(':lastUpdatedTs',$lastUpdatedTs);
        $this->db->bind(':createdBy',$createdBy);
        $this->db->bind(':lastUpdatedBy',$lastUpdatedBy);
        // echo"astrew";
        if($this->db->execute()){
            $Id = $this->db->insertId();
            // echo"ergfh";
            return $Id;
        }
        else {
            return false;
        }
    }

    public function insertCallRequest($name,$email,$phone,$course,$createdTs,$createdBy){
        $this->db->query('INSERT INTO user_request(id, name, email, phone_no, course, created_ts, created_by) '
                .       ' VALUES(0,:name,:email,:phone,:course,:createdTs,:createdBy)');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':course', $course);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':createdBy', $createdBy);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            // echo"ergfh";
            return $Id;
        }
        else {
            return false;
        }
    }

    public function uploadLifeLink($course_id,$link,$status,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('INSERT INTO life_link(id, course_id, life_link, status, created_ts, created_by, last_updated_ts, '
                    .    ' last_updated_by) VALUES (0,:course_id,:link,:status,:created_ts,:created_by,:last_updated_ts,:last_updated_by)');
        $this->db->bind(':course_id', $course_id);
        $this->db->bind(':link',$link);
        $this->db->bind(':status', $status);
        $this->db->bind(':created_ts', $createdTs);
        $this->db->bind(':created_by', $createdBy);
        $this->db->bind(':last_updated_ts', $lastUpdatedTs);
        $this->db->bind(':last_updated_by', $lastUpdatedBy);
        if($this->db->execute()){
            $userId = $this->db->insertId();
            return true;

        }
        else {
            return false;
        }          
    }

    public function insertStudentDetails($name,$userId,$phone_no,$image,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        
        $this->db->query('INSERT INTO student_details(student_id ,student_name, image,email, phone_no,create_ts, created_by, '
                    .    ' last_update_ts, last_update_by) VALUES (0,:name,:image,:userId,:phone_no,:createdTs,:createdBy, '
                    .    ' :lastUpdatedTs,:lastUpdatedBy)');
        $this->db->bind(':name',$name);
        $this->db->bind(':image',$image);
        $this->db->bind(':userId', $userId);
        $this->db->bind(':phone_no',$phone_no);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':createdBy', $createdBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        if($this->db->execute()){
            $userId = $this->db->insertId();
            return true;

        }
        else {
            return false;
        }              
    }

    public function insertswiperimage($status,$image,$createdTs){
        $this->db->query('INSERT INTO swip(id, image, status, created_ts) VALUES (0,:image,:status,:createdTs)');
        $this->db->bind(':status',$status);
        $this->db->bind(':image',$image);
        $this->db->bind(':createdTs', $createdTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;

        }
        else {
            return false;
        }   
    }

    public function insertNoticeToDisplay($status,$notice,$createdTs){
        $this->db->query('INSERT INTO notice(id, notice, status, created_ts) VALUES (0,:notice,:status,:createdTs)');
        $this->db->bind(':status',$status);
        $this->db->bind(':notice',$notice);
        $this->db->bind(':createdTs', $createdTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;

        }
        else {
            return false;
        }   
    }

    public function insertStudentDetailsForAdmission($admissionNo,$studentName,$fatherName,$dob,$image,$gender,$email,$phoneNo,$fullAddress,$state,$city,$district,$pincode,$matricBoard,$matricMarks,$matricPercentage,$higherQualification,$board,$marks,$totalPercentage,$courseId,$allowvideo,$allowpdf,$liveaccess,$createTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('INSERT INTO student_details(student_id, admission_no, student_name, image, father_name, dob, gender, '
                .      ' email, phone_no, full_address, state, city, district, pincode, matric_board, matric_marks, '
                .      ' matric_percentage, higher_qualification, board, marks, total_percentage, course_id, '
                .      ' allow_video, allow_pdf, live_access, create_ts, created_by, last_update_ts, last_update_by)'
                .      ' VALUES (0, :admission_no,:student_name,:image,:father_name,:dob,:gender,:email,:phone_no,:full_address,:state,'
                .      ' :city,:district,:pincode, :matric_board, :matric_marks, :matric_percentage, :higher_qualification,'
                .      ' :board, :marks, :total_percentage,:course_id,:allowvideo,:allowpdf,:liveaccess, '
                .      ' :create_ts, :created_by,:last_update_ts,:last_update_by)');
        $this->db->bind(':admission_no',$admissionNo);
        $this->db->bind(':student_name',$studentName);
        $this->db->bind(':father_name', $fatherName);
        $this->db->bind(':dob',$dob);
        $this->db->bind(':image',$image);
        $this->db->bind(':gender',$gender);
        $this->db->bind(':email',$email);
        $this->db->bind(':phone_no',$phoneNo);
        $this->db->bind(':full_address',$fullAddress);
        $this->db->bind(':state',$state);
        $this->db->bind(':city',$city); 
        // $this->db->bind(':thana',$thana);
        $this->db->bind(':district', $district);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':matric_board',$matricBoard);
        $this->db->bind(':matric_marks',$matricMarks);
        $this->db->bind(':matric_percentage',$matricPercentage);
        $this->db->bind(':higher_qualification',$higherQualification);
        $this->db->bind(':board',$board);
        $this->db->bind(':marks',$marks);
        $this->db->bind(':total_percentage',$totalPercentage);
        $this->db->bind(':course_id',$courseId);
        // $this->db->bind(':course_name',$courseName);
        $this->db->bind(':allowvideo',$allowvideo);
        $this->db->bind(':allowpdf',$allowpdf);
        $this->db->bind(':liveaccess',$liveaccess);
        $this->db->bind(':create_ts',$createTs);
        $this->db->bind(':created_by',$createdBy);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);
        $this->db->bind(':last_update_by',$lastUpdatedBy);

        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;

        }
        else {
            return false;
        }
    }

    public function getEnrollCourseOfUser($userId){
        $this->db->query('SELECT c.course_id, c.course_name, c.image FROM course_details c ,student_details s '
                .        '  WHERE c.course_id = s.course_id AND s.email = :userId');
        $this->db->bind(':userId',$userId);
        $row = $this->db->resultSet();
        return $row;     
    }

    public function getswipeImageForHomePage(){
        $this->db->query('SELECT image FROM swip WHERE status = "active" ');
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getAllSwipImage(){
        $this->db->query('SELECT * FROM swip WHERE 1 = 1');
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getNoticeToBeDisplay(){
        $this->db->query('SELECT notice  FROM notice WHERE  status = "active"');
        $row = $this->db->single();
        return $row;
    }

    public function getNotesOfCourses($courseId){
        $this->db->query('SELECT pdf_path FROM notes_details WHERE course_id = :course_id');
        $this->db->bind(':course_id',$courseId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCourseVideo($courseId){
        $this->db->query('SELECT title,video_path FROM course_videos WHERE course_id = :course_id');
        $this->db->bind(':course_id',$courseId);
        $row = $this->db->resultSet();
        return $row;
    }
    
    public function getCourseAccessOfUser($courseId,$userId){
        $this->db->query('SELECT allow_video ,allow_pdf ,live_access FROM student_details '
                    .    ' WHERE course_id = :courseId AND email = :userId ');
        $this->db->bind(':userId',$userId);
        $this->db->bind(':courseId',$courseId);
        $row = $this->db->single();
        return $row; 
    }

    public function getLinkOfCourse($course_id){
        $this->db->query('SELECT life_link FROM life_link WHERE course_id = :course_id AND status = "active" ');
        $this->db->bind(':course_id',$course_id);
        $row = $this->db->single();
        // print_r($row);
        return $row;
    }

    public function getLifeLink($course_id){
        $this->db->query('SELECT * FROM life_link WHERE course_id = :course_id');
        $this->db->bind(':course_id',$course_id);
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getCourseAndStudenCount($course_id){
        $this->db->query(' SELECT s.student_name,s.image,s.course_id,c.course_name,s.phone_no,s.dob  FROM student_details s , '
                    .    ' course_details c WHERE c.course_id = s.course_id AND s.course_id = :course_id ');
        $this->db->bind(':course_id',$course_id);
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getStudentDueFeeCOunt($course_id){
        $this->db->query(' SELECT s.student_name,s.image,s.course_id,c.course_name,s.phone_no,s.dob,p.due_amt FROM '
                    .    ' student_details s ,course_details c ,payment_details p WHERE c.course_id = s.course_id '
                    .    ' AND s.course_id = :course_id AND s.student_id = p.student_id ');
        $this->db->bind(':course_id',$course_id);
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getCourseDetails(){
        $this->db->query('SELECT course_id,course_name,status FROM course_details ');
        $row = $this->db->resultSet();
        return $row;   
    }

    public function getCourseDetailByCourseId($course_id){
        $this->db->query(' SELECT * FROM course_details WHERE course_id=:course_id ');
        $this->db->bind(':course_id',$course_id);
        $row = $this->db->single();
        return $row; 
    }

    public function getAllStudent(){
        $this->db->query(' SELECT * FROM student_details WHERE 1=1 ');
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getAllStudentWithDueFee(){
        $this->db->query(' SELECT * FROM payment_details WHERE due_amt IS NOT NULL ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getAllStudentDetailWithDueFee(){
        $this->db->query(' SELECT p.due_amt ,s.student_name ,s.phone_no ,s.dob , s.image  FROM payment_details p , student_details s '
                .        ' WHERE due_amt IS NOT NULL AND p.student_id = s.student_id; ');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;
    }

    public function getDetailsForIdCard($userId){
        $this->db->query('SELECT sd.admission_no,sd.student_name,sd.image,sd.phone_no,sd.email,cd.course_name '
                    .    ' FROM student_details sd,course_details cd WHERE email = :userId AND cd.course_id = sd.course_id');
        $this->db->bind(':userId',$userId);
        $row = $this->db->single();
        return $row; 
    }

    public function getUserData($userId){
        $this->db->query('SELECT s.student_name,s.image , u.password FROM student_details s, user u  '
                .       ' WHERE u.login_id= s.email AND s.email= :userId');
        $this->db->bind(':userId',$userId);
        $row = $this->db->single();
        return $row;         
    }

    public function getAllNotice(){
        $this->db->query('SELECT * FROM notice WHERE 1 = 1 ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCourseDetailForHomePage(){
        $this->db->query('SELECT * FROM course_details WHERE  status= "active" ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getvideoByCourseId($course_id){
        $this->db->query('SELECT * FROM course_videos WHERE course_id = :course_id');
        $this->db->bind(':course_id',$course_id);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getNotesByCourseId($course_id){
        $this->db->query('SELECT * FROM notes_details WHERE course_id = :course_id');
        $this->db->bind(':course_id',$course_id);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getUserProfileData($userId){
        $this->db->query('SELECT * FROM student_details WHERE email= :userId');
        $this->db->bind(':userId',$userId);
        $row = $this->db->single();
        return $row;
    }

    public function getVideoDetailsForEditing($course_id,$id){
        $this->db->query('SELECT cv.video_no,cv.title,c.course_name ,cv.id,cv.course_id FROM course_videos cv , course_details c WHERE cv.course_id = c.course_id AND cv.course_id =:course_id AND cv.id = :id');
        $this->db->bind(':course_id',$course_id);
        $this->db->bind(':id',$id);
        $row = $this->db->single();
        return $row;
    }

    public function getDueFeeByCourseId($courseId){
        $this->db->query('SELECT s.admission_no, s.student_name, s.father_name, c.course_name ,c.price,p.due_amt FROM student_details s,course_details c ,payment_details p WHERE s.course_id = c.course_id AND s.student_id = p.student_id AND s.course_id =:course_id AND due_amt IS NOT NULL');
        $this->db->bind(':course_id',$courseId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getStudentName($courseId){
        $this->db->query('SELECT a.student_id,a.admission_no,a.student_name,a.father_name,a.course_id,c.course_name,c.price FROM student_details a,course_details c WHERE c.course_id = a.course_id AND a.course_id = :course_id');
        $this->db->bind(':course_id',$courseId);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getStudentDetailsById($studentId){
        $this->db->query('SELECT a.student_id,a.admission_no,a.student_name,a.father_name,c.course_name,c.price FROM student_details a,course_details c WHERE c.course_id = a.course_id AND a.student_id = :student_id');
        $this->db->bind(':student_id',$studentId);
        $row = $this->db->single();
        return $row;
    }

    public function editStudentDetailsBySid($studentId){
        $this->db->query(' SELECT student_id, admission_no, student_name, father_name, dob, gender, email,phone_no, full_address, '
                        .'state, city, district, pincode, matric_board, matric_marks, matric_percentage, higher_qualification, '
                        .'board, marks, total_percentage, c.course_id, s.create_ts, s.created_by,c.course_name FROM student_details s, '
                        .'course_details c WHERE student_id=:student_id AND c.course_id = s.course_id  ');
        $this->db->bind(':student_id',$studentId);
        $row = $this->db->single();
        return $row;
    }
    public function updatestudentDetailsById($studentId,$studentName,$fatherName,$dob,$gender,$email,$phoneNo,$fullAddress,$state,$city,$district,$pincode,$matricBoard,$matricMarks,$matricPercentage,$higherQualification,$board,$marks,$totalPercentage,$courseId,$lastUpdatedTs,$lastUpdatedBy){
    $this->db->query(' UPDATE student_details SET student_name=:student_name,father_name=:father_name,dob=:dob,'
                .    ' gender=:gender,email=:email, phone_no=:phone_no,full_address=:full_address,state=:state,'
                .    ' city=:city,district=:district,pincode=:pincode, matric_board=:matric_board,matric_marks=:matric_marks,'
                .    ' matric_percentage=:matric_percentage, higher_qualification=:higher_qualification, board=:board,marks=:marks, '
                .    ' total_percentage=:total_percentage,course_id=:course_id,last_update_ts =:last_update_ts, '
                .    ' last_update_by=:last_update_by WHERE student_id=:student_id ');
                        $this->db->bind(':student_id',$studentId);
                        $this->db->bind(':student_name',$studentName);
                        $this->db->bind(':father_name', $fatherName);
                        $this->db->bind(':dob',$dob);
                        $this->db->bind(':gender',$gender);
                        $this->db->bind(':email',$email);
                        $this->db->bind(':phone_no',$phoneNo);
                        $this->db->bind(':full_address',$fullAddress);
                        $this->db->bind(':state',$state);
                        $this->db->bind(':city',$city); 
                        // $this->db->bind(':thana',$thana);
                        $this->db->bind(':district', $district);
                        $this->db->bind(':pincode', $pincode);
                        $this->db->bind(':matric_board',$matricBoard);
                        $this->db->bind(':matric_marks',$matricMarks);
                        $this->db->bind(':matric_percentage',$matricPercentage);
                        $this->db->bind(':higher_qualification',$higherQualification);
                        $this->db->bind(':board',$board);
                        $this->db->bind(':marks',$marks);
                        $this->db->bind(':total_percentage',$totalPercentage);
                        $this->db->bind(':course_id',$courseId);
                        // $this->db->bind(':course_name',$courseName);
                        $this->db->bind(':last_update_ts',$lastUpdatedTs);
                        $this->db->bind(':last_update_by',$lastUpdatedBy);

        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }

    }

    public function updateStudentResult($studentId,$obtMark,$totalMark,$percentage,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('UPDATE student_details SET last_update_ts=:last_update_ts ,last_update_by=:last_update_by, '
                    .'obtained_marks=:obt_mark,total_marks = :total_mark, percentage =:percentage WHERE student_id =:student_id ');
        $this->db->bind(':student_id',$studentId);
        $this->db->bind(':obt_mark',$obtMark);
        $this->db->bind(':total_mark',$totalMark);
        $this->db->bind(':percentage',$percentage);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);
        $this->db->bind(':last_update_by',$lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }
                                     
    }

    public function editLifeLink($id,$status,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('UPDATE life_link SET status=:status ,last_updated_ts=:last_updated_ts ,last_updated_by=:last_update_by  '
                    .    ' WHERE id =:id');
        $this->db->bind(':status',$status);
        $this->db->bind(':id',$id);
        $this->db->bind(':last_updated_ts',$lastUpdatedTs);
        $this->db->bind(':last_update_by',$lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }
    }


    public function updateCourseVideoById($course_id,$id,$video_no,$title,$lastUpdatedTs,$lastUpdatedBy){
    
        $this->db->query('UPDATE course_videos SET video_no =:vdno, title=:title, lastUpdated_ts=:last_updated_ts, '
                .        ' last_update_by = :last_update_by WHERE  course_id =:course_id AND id= :id');
        $this->db->bind(':id',$id);
        $this->db->bind(':vdno',$video_no);
        $this->db->bind(':title',$title);
        $this->db->bind(':course_id',$course_id);
        $this->db->bind(':last_updated_ts',$lastUpdatedTs);
        $this->db->bind(':last_update_by',$lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }
            
    }

    public function editNoticeByStatus($Id,$status){
        $this->db->query('UPDATE notice SET status=:status  WHERE id = :id');
        $this->db->bind(':id',$Id);
        $this->db->bind(':status',$status);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }
    }

    public function updatePassword($password,$lastUpdatedTs,$lastUpdatedBy,$userId){
        $this->db->query('UPDATE user SET password=:password,last_update_ts=:last_update_ts,last_updated_by=:last_update_by '
                .        ' WHERE login_id =:userId ');
        $this->db->bind(':password',$password);
        $this->db->bind(':userId',$userId);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);
        $this->db->bind(':last_update_by',$lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }
    }

    public function updateUserProfile($name,$lastUpdatedTs,$lastUpdatedBy,$userId,$image){
        $this->db->query('UPDATE student_details SET student_name=:name, image =:image,last_update_ts=:last_update_ts , '
                .        'last_update_by = :last_update_by WHERE email = :userId');
        $this->db->bind(':image',$image);
        $this->db->bind(':userId',$userId);
        $this->db->bind(':name',$name);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);
        $this->db->bind(':last_update_by',$lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }
    }
    public function editSwipImage($Id,$status){
        $this->db->query('UPDATE swip SET status=:status  WHERE id = :id');
        $this->db->bind(':id',$Id);
        $this->db->bind(':status',$status);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }
    }

    public function insertCertificate($studentId,$certificate,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('UPDATE student_details SET last_update_ts =:last_update_ts, last_update_by = :last_update_by , '
                .       'certificate=:certificate  WHERE student_id = :student_id ');
        $this->db->bind(':student_id',$studentId);
        $this->db->bind(':certificate',$certificate);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);
        $this->db->bind(':last_update_by',$lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return true;
        }
        else{
            return false; 
        }

    }

    public function editCourseData($coverview,$csyllabus,$tprofile,$duration,$videolink,$course_id,$coursename,$seq_no,$desc,$price,$offer_price,$status){
        // echo"aewrthgbvcxret";
            $this->db->query('UPDATE course_details SET seq_no=:seq_no,course_name=:coursename,description=:desc,'
                    .       ' price=:price,offered_price=:offer_price,status=:status ,course_overview = :coverview, '
                    .       ' course_syllabus = :c syllabus, trainer_profile =:tprofile ,duration =:duration , '
                    .       ' video_link = :videolink WHERE course_id = :course_id');
        $this->db->bind(':course_id',$course_id);
        $this->db->bind(':coursename',$coursename);
        $this->db->bind(':desc', $desc);
        $this->db->bind(':seq_no',$seq_no);
        $this->db->bind(':coverview',$coverview);
        $this->db->bind(':csyllabus',$csyllabus);
        $this->db->bind(':tprofile',$tprofile);
        $this->db->bind(':duration',$duration);
        $this->db->bind(':videolink',$videolink);
        $this->db->bind(':price',$price);
        $this->db->bind(':offer_price',$offer_price);
        $this->db->bind(':status',$status);
        if($this->db->execute()){
            $course_id = $this->db->insertId();
            // echo $course_id;
            return $course_id;
        }
        else{
            return false; 
        }
    }


    public function insertFeeDetails($studentId,$paymentMethod,$transactionId,$notes,$date,$paymentOption,$amtPaid,$amtToBePaid,$dueAmt,$reminderDate,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('INSERT INTO payment_details(id, student_id,payment_method,transaction_id, notes, date, payment_option, amt_paid,'
                        .' amt_to_be_paid, due_amt,reminder_date,created_ts, created_by,last_updated_ts,last_updated_by)' 
                        .' VALUES (0, :student_id,:payment_method,:transaction_id, :notes, :date, :payment_option, :amt_paid, '
                        .' :amt_to_be_paid, :due_amt,:reminder_date,:created_ts, :created_by,:last_updated_ts,:last_updated_by)');

                        $this->db->bind(':student_id',$studentId);
                        $this->db->bind(':payment_method',$paymentMethod);
                        $this->db->bind(':transaction_id',$transactionId);
                        $this->db->bind(':notes', $notes);
                        $this->db->bind(':date',$date);
                        $this->db->bind(':payment_option',$paymentOption);
                        $this->db->bind(':amt_paid',$amtPaid);
                        $this->db->bind(':amt_to_be_paid',$amtToBePaid);
                        $this->db->bind(':due_amt',$dueAmt);
                        $this->db->bind(':reminder_date',$reminderDate);
                        $this->db->bind(':created_ts',$createdTs);
                        $this->db->bind(':created_by',$createdBy); 
                        $this->db->bind(':last_updated_ts',$lastUpdatedTs);
                        $this->db->bind(':last_updated_by', $lastUpdatedBy);
        
     if($this->db->execute()){
        $id = $this->db->insertId();
        return $id;
        // return $studentId;
        }
    else {
        return false;
        }
    }

    public function insertCourse($coverview,$csyllabus,$tprofile,$duration,$videolink,$image,$status,$course_name,$desc,$sl,$price,$offerPrice,$createTs,$lastUpdateTs,$created_by,$last_update_by){
        $this->db->query('INSERT INTO course_details(course_id, seq_no, course_name, description, course_overview, '
                    .    ' course_syllabus, trainer_profile, duration, video_link, price, offered_price, image, status,'
                    .    ' create_ts, last_updated_ts, created_by, last_updated_by) '
                    .    ' VALUES (0, :sl,:course_name, :desc,:coverview,:csyllabus,:tprofile,:duration,:videolink,:price, '
                    .    ' :offerPrice,:image,:status, :createTs,:lastUpdateTs, :created_by, :last_update_by)');
    
        $this->db->bind(':course_name',$course_name);
        $this->db->bind(':desc', $desc);
        $this->db->bind(':image',$image);
        $this->db->bind(':price',$price);
        $this->db->bind(':offerPrice',$offerPrice);
        $this->db->bind(':sl',$sl);
        $this->db->bind(':coverview',$coverview);
        $this->db->bind(':csyllabus',$csyllabus);
        $this->db->bind(':tprofile',$tprofile);
        $this->db->bind(':duration',$duration);
        $this->db->bind(':videolink',$videolink);
        $this->db->bind(':status',$status);
        $this->db->bind(':createTs',$createTs);
        $this->db->bind(':lastUpdateTs',$lastUpdateTs);
        $this->db->bind(':created_by',$created_by);
        $this->db->bind(':last_update_by',$last_update_by);
        if($this->db->execute()){
            $course_id = $this->db->insertId();
            return $course_id;
        }
        else {
            return false;
        }
    }


    public function insertVideo($video,$course_id,$title,$video_no,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('INSERT INTO course_videos(id, video_no, course_id, video_path, '
                    .    ' title, createTs, created_by, lastUpdated_ts, last_update_by) '
                    .    ' VALUES (0, :video_no,:course_id, :video, :title,:createdTs,:createdBy,:lastUpdatedTs,'
                    .    ' :lastUpdatedBy)');
        $this->db->bind(':video',$video);
        $this->db->bind(':course_id',$course_id);
        // $this->db->bind(':desc', $desc);
        // $this->db->bind(':short_desc',$short_desc);
        $this->db->bind(':video_no',$video_no);
        $this->db->bind(':title',$title);
        $this->db->bind(':createdTs',$createdTs);
        $this->db->bind(':lastUpdatedTs',$lastUpdatedTs);
        $this->db->bind(':createdBy',$createdBy);
        $this->db->bind(':lastUpdatedBy',$lastUpdatedBy);
        // $this->db->bind(':notes',$notes);
        if($this->db->execute()){
            $video_id = $this->db->insertId();
            return $video_id;
        }
        else {
            return false;
        }
       
    }

    public function deleteCourseById($course_id){
        $this->db->query('DELETE FROM course_details WHERE course_id  =:course_id');
        $this->db->bind(':course_id',$course_id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteNotesById($id){
        $this->db->query('DELETE FROM notes_details WHERE notes_id = :id');
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteVideoById($id){
        $this->db->query('DELETE FROM course_videos WHERE id= :id');
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function insertbatch($course_id,$name,$duration,$start_time,$end_time,$start_date,$end_date,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy,$live){
        $this->db->query('INSERT INTO batch(batch_id, course_id, name, start_date, end_date, start_time, end_time, duration, '
                    .   'live_access,created_ts, last_updated_ts, created_by, last_updated_by) VALUES (0,:course_id,:name,:start_date, '
                    .   ':end_date,:start_time,:end_time,:duration,:live,:createdTs,:createdBy,:lastUpdatedTs,:lastUpdatedBy)');
        $this->db->bind(':course_id',$course_id);
        $this->db->bind(':name',$name);
        $this->db->bind(':duration',$duration);
        $this->db->bind(':start_time',$start_time);
        $this->db->bind(':end_time',$end_time);
        $this->db->bind(':start_date',$start_date);
        $this->db->bind(':end_date',$end_date);
        $this->db->bind(':live',$live);
        $this->db->bind(':createdTs',$createdTs);
        $this->db->bind(':createdBy',$createdBy);
        $this->db->bind(':lastUpdatedTs',$lastUpdatedTs);
        $this->db->bind(':lastUpdatedBy',$lastUpdatedBy);
        // $this->db->bind(':course_name',$course_name);
        if($this->db->execute()){
            $batch_id = $this->db->insertId();
            return $batch_id;
        }
        else {
            return false;
        }
    }
}

?>