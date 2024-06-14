<?php require APPROOT . '/views/inc/cheader.php'; ?>
<?php require APPROOT . '/views/inc/unavbar.php'; ?>
<form action="<?php echo URLROOT ;?>admissions/editUserProfile" method="post" enctype="multipart/form-data">
<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<section style="">
    <div class="container">
        <div class="row p-4">
            <div class="col" >
                <div class="card mt-5 " style="width:50%;display:block;margin:auto;box-shadow: 0 4px 20px 0 rgb(198 184 184 / 60%),0 4px 20px 0 rgba(219, 219, 219, 0.3);">
                    <div class="text-center mt-2">
                        <img src="<?php echo URLROOT."/uploads/".$data->image;?>" class="image-fluid mb-2  text-center" style="width:200px; height:180px;border-radius:50%" alt="">
                    </div>
                    <div class="mb-3 px-4">
                        <label for="image" class="form-label">Update Profile Picture :</label><br>
                        <input for="image"  type="file" name="image[]" id="image[]" accept="image/*"  />
                    </div>

                    <div class="mb-3 px-4">
                        <label for="username" class="form-label">Update Name:</label>
                        <input type="text"  name="username" id="username" class="form-control" value="<?php echo $data->student_name;?>" >
                    </div>
                    <div class="mb-3 px-4">
                        <label for="password" class="form-label">Change Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?php echo $data->password;?> ">
                    </div>

                    <button class="btn mt-4 mb-2" type="submit" name="edit" id="edit" style="width:70%;background: #ffc104;margin:auto;display:block;border-radius:10px">Update Profile</button>
                </div>
            </div>
        </div>
    </div>
</section>