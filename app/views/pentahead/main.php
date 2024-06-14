<?php require APPROOT . '/views/inc/cheader.php';?>
<?php require APPROOT . '/views/inc/unavbar.php';?>

<form action="<?php echo URLROOT ;?>admissions/userHomePage" method="post" >
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner change">
  <?php $count=0; foreach ($additionalData as $additionalDataLine) {?>
        <div class="carousel-item <?php if($count ==0){echo 'active';}?>">
            <img src="<?php echo URLROOT.'/img/'.$additionalDataLine->image;?>" class="d-block w-100 image-fluid" style="max-width:100%;height:auto"   alt="..."/>
        </div>           
  <?php $count++;} ?>
 
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container-fluid" style="background:#0000FF">
    <div class="row " >
        <div class="col-sm-2 mt-2 text-center">
            <p style="font-size:1.4rem;weight:600;color:#40caf9;">Notice</p>
        </div>
        <div class="col-sm-10 mt-2">
            <marquee style="font-size:1rem;color:#ffff;"><?php echo $moreData->notice;?></marquee>
        </div>
    </div>
</div>
<section style="background:#F7F7F7;">
<div class="container pb-4">
    <p class="text-center mt-2" style="font-size:3rem">Courses</p>
    <div class="row text-center mb-3">
        <?php $count = 0; foreach($data as $dataLine){if($count>= 4)
            {
                    break;
                  }  ?>
        <div class="col-sm-3 mb-2">
        <input type="hidden" value="<?php echo $dataLine->course_id;?>" name="<?php echo 'course_id'.$count;?>" id="<?php echo 'course_id'.$count;?>">
            <div class="card h-100" style="box-shadow: 0 4px 20px 0 rgb(198 184 184 / 60%),0 4px 20px 0 rgba(219, 219, 219, 0.3);">
                 <img src="<?php echo URLROOT.'/img/'. $dataLine->image;?>" alt="">
                 <div class="row p-1">
                    <div class="col">
                       <p><b> Duration </b></p>
                    </div>
                    <div class="col">
                        <p><u><?php echo $dataLine->duration;?> </u></p>
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

    <button class="btn p-2" name="viewall" id="viewall" type="submit" style="background:#0000FF;color:white;display:block;margin:auto;width:20%">VIEW ALL COURSES</button>
</div>
</section>
<section id="about">
    <h1 class="text-center mt-4 mb-3" id="about">About Us</h1>
    <div class="container mb-5">
        <div class="row py-4">
            <div class="col-sm-8">
                <div class="card mt-5" style="background:none;border:none">
                 <h1 class="mb-3"><span style="color:#0000FF"> Welcome to</span>Neha Classes</h1>
                    <p style="font-size:1.3rem; text-align: justify;">Neha Classes is reputed computer Institute in India. Here we deal almost all computer related course. We committed for students satisfaction. In last six years, we created a very friendly learning environment with latest computer software technologies. We only care the Student's Satisfaction. Education is the most powerful weapon which can be used to change the world. This is the only tool to remove the darkness of ignorance from the society. Information Technology has become the backbone off all the productive activities today.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="border:none">
                    <img src="<?php echo URLROOT."/img/new-about-img.png";?>" class="image-fluid" height="300px" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background:#0000FF">
    <div class="container">
        <div class="row py-4">
            <div class="col-sm-6">
                  <p style="font-size:2rem;color:white">Join <span style="font-size:3rem;color:#40caf9;weight:600" class="num" data-val="295314"><b>000000</b> </span> People</p>
            </div>
            <div class="col-sm-6 text-center pt-2">
                <button class="btn p-3 " type="button" style="background:#40caf9;color:white;width:30%">JOIN NOW</button>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6" style="padding-left:0">
                <img src="<?php echo URLROOT."/img/contact-bg1.jpg";?>"  alt="">
        </div>
        <div class="col-sm-6 text-center pt-5" style="background:#F7F7F7">
            <div class="row ">
                <h2 class="text center pt-3 mb-3">Request Call Back</h2>
                <div class="mb-3 " style="width:60%;display:block;margin:auto">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" aria-describedby="emailHelp">   
                </div>
                <div class="mb-3 " style="width:60%;display:block;margin:auto">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" aria-describedby="emailHelp">   
                </div>
                <div class="mb-3 " style="width:60%;display:block;margin:auto">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" aria-describedby="emailHelp">   
                </div>
                <div class="mb-3 " style="width:60%;display:block;margin:auto">
                    <input type="text" class="form-control" id="course" name="course" placeholder="Preferred Course" aria-describedby="emailHelp">   
                </div>
            </div>
           <button class="btn" style="background:#40caf9;width:60%;color:white" name="submit" id="submit"><b>SUBMIT </b> </button>
        </div>
    </div>
</div>
</form>


<script>
    let valueDisplays = document.querySelectorAll(".num");
    let interval = 4000;

    valueDisplays.forEach((valueDisplay) => {
        let startValue = 0;
        let endValue = parseInt(valueDisplay.getAttribute("data-val"));
        let duration = Math.floor(interval / endValue);
        let counter = setInterval(function (){
            startValue += 10;
            valueDisplay.textContent = startValue;
            if(startValue == endValue){
                clearInterval(counter);
            }
        }, duration);
            });
</script>
<?php require APPROOT . '/views/inc/footer.php';?>
  