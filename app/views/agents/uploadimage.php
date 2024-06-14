<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container text-center fw-bold mb-0 pb-0">
  <img src="<?php echo URLROOT.'/img/logo.png';?>" style="height:150px;">
  <div class="row">
  
  <small>National Federation of Tourism Transport Co-operatives of India Ltd. 
                <br>Channel Partner - <u>ENGITECH INFRAMED</u></small>
</div>
  <span class="text-warning text-decoration-underline h5">Cook Stop Survey Form</span>
  

    <div class="container mt-2 mb-10">
      <div class="card" style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px; padding: 2%">
      <form method="post" action="<?php echo URLROOT; ?>agents/agentshome" enctype="multipart/form-data">
<div class="alert alert-secondary text-center" role="alert">
  <b class="text-danger fs-5">!! Please upload Aadhar Image !!</b>
</div>
  <h1>Upload Aadhar Image - Mandatory* </h1>

  <input type="hidden" name="applicantid" value="<?php echo $data['applicantId'];?>">

  <div class="form-group">
   <input type="file" name="imagename" id="imagename" multiple required>
  </div> 
  <br>
  <div class="form-group"> 
   <input type='submit' name='uploadimg' id='uploadimg' value='Upload Image' class="btn btn-primary" >
  </div>  
      </form>
    </div>
    </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>