<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php if($additionalData['message']){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<form action="<?php echo URLROOT ;?>admissions/uploadresult" method="post" >
<div class="container">
    <div class="row mt-4">
    <input type="hidden" value="<?php echo $data->student_id;?>" name="student_id" id="student_id">
        <h2>Upload Results</h2>
        <div class="col-sm-4">
            <label for="inputCity" class="form-label">Obtained Marks</label>
            <input type="number" class="form-control" id="obt_mark" name="obt_mark">
        </div>
        <div class="col-sm-4">
            <label for="inputCity" class="form-label">Total Marks</label>
            <input type="number" class="form-control" id="total_mark" name="total_mark">
        </div>
        <div class="col-sm-4">
            <label for="inputCity" class="form-label">Percentage %</label>
            <input type="number" class="form-control" id="percentage" name="percentage">
        </div>
        <button type="submit" id="upload" name="upload" class="btn mt-3" style="width:50%;display:block;margin:auto;background:#424242;color:white;border-radius:30px">Submit</button>
    </div>
</div>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>