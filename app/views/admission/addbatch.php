<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT ;?>admissions/addBatch" method="post" >
<?php if($data['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $data['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<section>
<div class="container">
        <h2 class="mt-3"
          style="text-align: center;font-family: 'Times New Roman', Times, serif;color:black">
          Add batch
        </h2>
    <div class="row">
        <div class="col-md-4 form-label">
            <label>Course Name</label>
            <select id="course_id" name="course_id">
                <option value="course_name">Course</option>
                <?php $count=0; foreach($data as $dataline){ ?> 
                <option value="<?php echo $dataline->course_id;?>"><?php echo $dataline->course_name;?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <label>Batch Name</label>
            <input type="text" name="name" id="name" placeholder="Batch Name" required>
        </div>
        <div class="col-md-4">
            <label>Duration</label>
            <input type="text" name="duration" id="duration" placeholder="Duration" required>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>Start Timing</label>
            <input type="time" name="start" id="start" placeholder="Start Timing" required>
        </div>
        <div class="col-sm-6">
            <label>End Timing</label>
            <input type="time" name="end" id="end" placeholder="End Timing" required>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>Start Date</label>
            <input type="date" name="start_date" id="start_date" placeholder="Start Date" required>
        </div>
        <div class="col-sm-6">
            <label>End Date</label>
            <input type="date" name="end_date" id="end_date" placeholder="End Date" required>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Live Access : </label>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="live" id="live" value="Y">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="live" id="live1" value="N">
            <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
            
        </div>
    </div>

    <button type="submit" class="btn mt-5 mb-4 effect" name="add_batch" id="add_batch" style=" border-radius: 50px; width:70%; color:white;margin:auto;display:block;background:#424242">Submit</button>
</div>
</section>  

<?php require APPROOT . '/views/inc/footer.php'; ?>