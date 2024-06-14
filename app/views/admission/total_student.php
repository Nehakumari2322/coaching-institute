<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="container">
    <div class="row">
    
        <h2 class="text-center mt-2">List of Total Student</h2>
</div>
        <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">image</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=0; foreach($data as $dataline){ ?>
                <tr>
                    <td ><?php echo  $count+1?></td>        
                    <td ><?php echo $dataline->student_name;?></td>
                    <td ><?php echo $dataline->phone_no;?></td>
                    <td ><?php echo $dataline->dob;?></td>
                    <td ><img src="<?php echo URLROOT.'/uploads/'.$dataline->image;?>" height="50px" width="100px" alt=""></td>
                </tr>
                <?php  $count++;} ?>
                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">

            </tbody>
        </table>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>