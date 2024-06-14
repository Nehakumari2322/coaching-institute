<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT ;?>admissions/addnotice" method="post" enctype="multipart/form-data">
<?php if($data['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $data['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container">
    <h2>Add Notice <button type="submit" class="btn" name="list" id="list"><img src="<?php echo URLROOT."/img/list.png";?>" height="20px" width="20px"  alt=""></button>
    </h2>
    <div class="row">
        <div class="col-sm-8">

            <input type="text" id="notice" name="notice" class="form-control"  placeholder="Notices"/>
        </div>
        <div class="col-sm-4 mt-2">
            <select name="status" id="status" class="form-control " style="margin-top:0">
                <option value="" selected>Select Status</option>
                <option value="Active" >Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn mb-4 effect" name="add_notice" id="add_notice" style=" border-radius: 50px; width:50%; color:white;margin:auto;display:block;background:#424242"> Submit</button>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>