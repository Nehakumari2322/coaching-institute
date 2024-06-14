<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT ;?>admissions/uploadvideo" method="post" enctype="multipart/form-data">
<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php } ?>
<section class="change" style="margin-top:0;color:black;">
<input type="hidden" value="<?php echo $data->course_id;?>" name="course_id" id="course_id">
<!-- <?php echo $data->course_id;?> -->
    <div class="container">
        <form action="" method="post" enctype ="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="card mt-5" style="background:none;border:none"> 
                <div class="row">
                    <div class="col-sm-10">
                        <h1 class="text-center mb-4 ">Upload Class Video</h1> 
                    </div>
                    <div class="col-sm-2">
                        <button class="btn" type="submit" name="<?php echo 'editvideo'?>" id="<?php echo 'editvideo'?>"><img src="<?php echo URLROOT."/img/edit.png";?>" height="20px" width="20px"  alt=""></button>
                    </div>
                </div>
                   
                       
                   
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="video_no" class="form-label ">Course Name</label>
                                <input type="text"  class="form-control" name="course_name" id="course_name"  value="<?php echo $data->course_name;?>" />
                            </div>
                            <div class="col-sm-3">
                                <label for="video_no" class="form-label ">video no.</label>
                                <input type="number" class="form-control" id="video_no" name="video_no" aria-describedby="emailHelp">
                            </div>

                            <div class="col-sm-3">
                                <label for="video" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                            </div>

                            <div class="col-sm-3">
                                <label for="video" class="form-label ">Select the video</label>
                                <input type="file" class="form-control" id="video[]" name="video[]" accept="video/*" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col">
                                <label for="sdesc" class="form-label ">Short Description</label>
                                <textarea class="form-control editor" id="sdesc" name="sdesc" rows="20" placeholder="Write a description....."></textarea>
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="desc" class="form-label ">Description</label>
                                <textarea class="form-control editor1" id="desc" name="desc" rows="20" placeholder="Write a description....."></textarea>
                            </div>
                        </div> -->

                       
                      

                        <button class='btn text-center effect mb-4' type="submit" name="upload" id="upload" style=" border-radius: 50px; width:60%; border:2px solid black; background:#424242;color:white; margin:auto;display:block">Submit</button>
                      
                    </form>
                </div>
            </div>
           
        </div>
        
    </div>
</section>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
	<script>
    ClassicEditor
            .create( document.querySelector( '.editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
     </script>
     <script>
    ClassicEditor
            .create( document.querySelector( '.editor1' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
     </script>
<?php require APPROOT . '/views/inc/footer.php';?>