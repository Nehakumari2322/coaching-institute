<?php require APPROOT . '/views/inc/cheader.php'; ?>
<?php require APPROOT . '/views/inc/unavbar.php'; ?>
<div> <img src="<?php echo URLROOT."/img/course_page.PNG";?>"class="image-fluid cours" style="max-width:100%;height:auto" alt=""></div>
<form action="<?php echo URLROOT ;?>admissions/buycourseonline" method="post">
<div class="container">
    <div class="row mt-5 mb-3">
        <div class="col-sm-8 " >
            <ul class="nav nav-pills mb-3 p-3" id="pills-tab" role="tablist" style="background:#F2F4F9">
            <li class="nav-item" role="presentation">
                <button class="nav-link active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" style="width:100%;color:gray" aria-selected="true" >Overview</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-syllabus" type="button" role="tab" aria-controls="pills-syllabus" aria-selected="false" style="color:gray">Course Syllabus</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-feature" type="button" role="tab" aria-controls="pills-feature" aria-selected="false" style="color:gray">Key Features</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="color:gray">Trainer Profile</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-video" type="button" role="tab" aria-controls="pills-video" aria-selected="false" style="color:gray">Video</button>
                
            </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                    <h2 style="color:#0f59c3">
                            Overview
                    </h2>
                    <p><?php echo $data->course_overview;?></p>
                </div>
                <div class="tab-pane fade" id="pills-syllabus" role="tabpanel" aria-labelledby="pills-syllabus-tab">
                    <h2 style="color:#0f59c3">
                        Course Syllabus
                    </h2>
                    <p><?php echo $data->course_syllabus;?></p>
                </div>
                <div class="tab-pane fade" id="pills-feature" role="tabpanel" aria-labelledby="pills-feature-tab">
                    <h2 style="color:#0f59c3">
                        Key Features 
                    </h2>
                    <p><?php echo $data->description;?></p>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h2 style="color:#0f59c3">
                        Trainer Profile 
                    </h2>
                    <p><?php echo $data->trainer_profile;?></p>
                </div>
                <div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                    <h2 style="color:#0f59c3">
                       Video 
                    </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <video  id="videoPlayer" height="200px"  controls  controlsList="nodownload" oncontextmenu="return false;">
                            <source src="<?php echo  URLROOT.'/video/'.$data->video_link;?>" type="video/mp4" />
                        </div>
                    </div>
                </div>
            </div>
           


           
                    
        </div>

       
        <div class="col-sm-4 ">
            <div class="card" style="box-shadow: 0 4px 20px 0 rgb(198 184 184 / 60%),0 4px 20px 0 rgba(219, 219, 219, 0.3);width: 22rem;">

            <input type="hidden" value="<?php echo $data->course_id;?>" name="course_id" id="course_id">
            <input type="hidden" value="<?php echo $data->price;?>" name="price" id="price">
                 <img src="<?php echo URLROOT.'/img/'. $data->image;?>" alt="">
                    <p class="text-center" style="color:#0000FF;font-size:2rem"><b>&#8377; &nbsp;<?php echo $data->price;?></b></p>
                    <hr>
                 <div class="row " style="padding-left:20px">
                    <div class="col">
                       <p><i class='bx bx-purchase-tag bx-rotate-90' style='color:#6df6f7' ></i> Course Name</p>
                    </div>
                    <div class="col">
                        <p><?php echo $data->course_name;?></p>
                    </div>
               
                 </div>
                    <!-- <hr> -->
                 <div class="row " style="padding-left:20px">
                    <div class="col" >
                       <p><i class='bx bx-time' style='color:#6df6f7'></i> Duration</p>
                    </div>
                    <div class="col">
                        <p><?php echo $data->duration;?></p>
                    </div>
                 </div>

                 <div class="row " style="padding-left:20px">
                    <div class="col">
                       <p><i class='bx bx-book-open' style='color:#6aeaeb'  ></i> Language</p>
                    </div>
                    <div class="col">
                        <p>English</p>
                    </div>
                 </div>
                 
                
                <button class="btn mt-4 mb-3" type="submit" name="start" id="start" style="background:#0000FF;width:50%;display:block;margin:auto;color:white">Buy Now</button>
                  
               
            </div>
        </div>
    </div>
</div>




<?php require APPROOT . '/views/inc/footer.php';?>