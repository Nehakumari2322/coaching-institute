<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT ;?>admissions/main" method="post" enctype="multipart/form-data">
<?php if($data['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $data['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       <?php } ?>
       
    <section >
      <div class="container-fliud  " >
      <div class="card" style="border:none;background:none">
        <h2 class="mt-3"
          style="text-align: center;font-family: 'Times New Roman', Times, serif;color:black">
          Add Course
        </h2>
        <div class="center">
          <div class="form-input" >
            <label for="file-ip-1">Upload Image</label>
            <input type="file" id="file-ip-1" name="image[]" id="image[]" accept="image/*" onchange="showPreview(event);" required/>
            <div class="preview">
              <img id="file-ip-1-preview" />
            </div>
          </div>
        </div>
        <!-- Section: Design Block -->
        <section class="text-center">
          <div class="card-body py-5 px-md-5">
            <div class="row d-flex justify-content-center">
              <div class="col-lg-8">

                  <div class="row mb-2">
                    <div class="col-sm-8">
                      <input type="text" id="form3Example3" class="form-control" name="course" id="course"  placeholder="Course Name"/>
                    </div>
                    <div class="col-sm-2">
                      <select name="status" id="status" class="form-control " style="margin-top:0">
                          <option value="" selected>Select Status</option>
                          <option value="Active" >Active</option>
                          <option value="Inactive">Inactive</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <input type="number" id="sl" name="sl" class="form-control"  placeholder="S.No."/>
                    </div>
                    
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label " for="form3Example3" >Course Overview</label>
                    <textarea class="form-control editor" id="overview" name="overview" rows="3" placeholder="Write a description....."></textarea>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label " for="form3Example3" >Course Syllabus</label>
                    <textarea class="form-control editor1" id="syllabus" name="syllabus" rows="3" placeholder="Write a description....."></textarea>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label " for="form3Example3" >Course Description</label>
                    <textarea class="form-control editor2" id="desc" name="desc" rows="3" placeholder="Write a description....."></textarea>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label " for="form3Example3" >Trainer Profile</label>
                    <textarea class="form-control editor3" id="profile" name="profile" rows="3" placeholder="Write a description....."></textarea>
                  </div>
                
                  <div class="row mb-4">
                    <div class="col">
                        <!-- <label for="price" class="form-label">Price</label> -->
                        <input type="number" id="price" name="price" class="form-control"  placeholder="Enter price"/>
                    </div>
                    <div class="col">
                        <!-- <label for="price" class="form-label">Price</label> -->
                        <input type="number" id="oprice" name="oprice" class="form-control"  placeholder=" Offered price"/>
                    </div>   
                  </div>

                  <div class="row mb-4">
                    <div class="col">
                        <label for="price" class="form-label">Duration</label>
                        <input type="text" id="duration" name="duration" class="form-control"  placeholder="Course Duration"/>
                    </div>
                    <div class="col">
                        <label for="price" class="form-label">Video Link</label>
                        <input type="text" id="videolink" name="videolink" class="form-control"  placeholder="Video Link"/>
                    </div>   
                  </div>
                  <!-- Submit button -->
                  <button type="submit" class="btn mb-4 effect" name="add_course" id="add_course" style=" border-radius: 50px; width:70%; color:white;margin:auto;display:block;background:#424242">
                    Submit</button>

                  <!-- Register buttons -->
              </form>
              </div>
            </div>
          </div>
        </section>
        <!-- Section: Design Block -->
      </div>
      </div>
    </section>
   

    <script>
      function showPreview(event) {
        if (event.target.files.length > 0) {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
    }
    </script>
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
     <script>
    ClassicEditor
            .create( document.querySelector( '.editor2' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
     </script>

    <script>
    ClassicEditor
            .create( document.querySelector( '.editor3' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
     </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>