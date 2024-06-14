<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<form action="<?php echo URLROOT ;?>admissions/editnotice" method="post" enctype="multipart/form-data">
<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container">
    <div class="row">
        <h2>List of Notice</h2>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th scope="col">sn</th>
            <th scope="col">Notice</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count=0; foreach($data as $dataline){ ?>
            <tr>
                <td ><?php echo  $count+1?></td>       
                <td ><?php echo $dataline->notice;?></td>
                <td >
                    <select name="<?php echo 'status'.$count;?>" id="<?php echo 'status'.$count;?>" class="form-control " style="margin-top:0">
                        <option value="<?php echo $dataline->status;?>"><?php echo $dataline->status;?></option>
                        <option value="Active" >Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </td>
       
                <input type="hidden" value="<?php echo $dataline->id;?>" name="<?php echo 'id'.$count;?>">
   
                <td> 
                <button class="btn" type="submit" name="<?php echo 'editbtn'.$count;?>" id="<?php echo 'editbtn'.$count;?>"><img src="<?php echo URLROOT."/img/ed.png";?>" height="30px" width="30px"  alt=""></button>
                </td>
            </tr>
            <?php  $count++;} ?>
            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">

        </tbody>
        </table>
    </div>
</div>
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>