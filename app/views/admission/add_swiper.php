<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT ;?>admissions/addswiper" method="post" enctype="multipart/form-data">
<?php if($data['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $data['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container">
    <div class="row">
        <h2 class="text-center">Add Images  <button type="submit" class="btn" name="list" id="list"><img src="<?php echo URLROOT."/img/list.png";?>" height="20px" width="20px"  alt=""></button>
        </h2>
     
        <div class="col">
            <div class="center">
                <div class="form-input" >
                    <label for="file-ip-1">Upload Image</label>
                    <input type="file" id="file-ip-1" name="image[]" id="image[]" accept="image/*" onchange="showPreview(event);" />
                    <div class="preview">
                        <img id="file-ip-1-preview" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
         <div class="col-sm-4"></div>
         <div class="col-sm-4">
            <select name="status" id="status" class="form-control " style="margin-top:0">
                <option value="" selected>Select Status</option>
                <option value="Active" >Active</option>
                <option value="Inactive">Inactive</option>
            </select>
         </div>
         <div class="col-sm-4"></div>
    </div>

     <button type="submit" class="btn mb-4 effect" name="add_swiper" id="add_swiper" style=" border-radius: 50px; width:50%; color:white;margin:auto;display:block;background:#424242"> Submit</button>
</div>

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