<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT ;?>admissions/uploadlink" method="post" enctype="multipart/form-data">
<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
  <?php } ?>
<section class="change" style="margin-top:0;color:black;">
<input type="hidden" value="<?php echo $data->course_id;?>" name="course_id" id="course_id">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5" style="background:none;border:none">
                <div class="row">
                    <div class="col-sm-10">
                        <h1 class="text-center mb-4 ">Add Live Link</h1>
                    </div> 
                    
                    <div class="col-sm-1">
                        <button class="btn" type="submit" name="editlink" id="editlink"><img src="<?php echo URLROOT."/img/edit.png";?>" height="20px" width="20px"  alt=""></button>
                    </div>
                </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="video_no" class="form-label ">Course Name</label>
                                <input type="text"  class="form-control" name="course_name" id="course_name"  value="<?php echo $data->course_name;?>"  readonly/>
                            </div>

                            <div class="col-sm-7 ">
                                <label for="video" class="form-label">Life Link</label>
                                <input type="text" class="form-control" id="link" name="link" aria-describedby="emailHelp">
                            </div>

                            <div class="col-sm-2 mt-4">
                            <select name="status" id="status" class="form-control " style="margin-top:0;width: 100%;padding: 10px; margin: 5px 0 22px 0; border: none; background: #f1f1f1;  ">
                                <option value="" selected>Select Status</option>
                                <option value="Active" >Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            </div>

                        </div>
                       

                        <button class='btn text-center effect mb-4' type="submit" name="uploadlive" id="uploadlive" style=" border-radius: 50px; width:60%; border:2px solid black; background:#424242;color:white; margin:auto;display:block">Submit</button>
               
                </div>
            </div>
           
        </div>
        
    </div>
</section>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

<?php require APPROOT . '/views/inc/footer.php';?>