<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php if($additionalData['message']){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<form action="<?php echo URLROOT ;?>admissions/uploadcertificate" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row mt-4">
        <h2>Upload Certificate</h2>
        <input type="hidden" value="<?php echo $data->student_id;?>" name="student_id" id="student_id"> 
        <div class="col">
            <div class="card" style="background:none;border:none">
                <div class="center">
                    <div class="form-input" >
                        <label for="file-ip-1">Upload Image</label>
                        <input type="file" id="file-ip-1" name="image[]" id="image[]" accept="image/*" onchange="showPreview(event);" required/>
                        <div class="preview">
                        <img id="file-ip-1-preview" />
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="upload" name="upload" class="btn mt-3" style="width:50%;display:block;margin:auto;background:#424242;color:white;border-radius:30px">Submit</button>
        </div>
    </div>
</div>
</form>

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
<?php require APPROOT . '/views/inc/footer.php'; ?>
