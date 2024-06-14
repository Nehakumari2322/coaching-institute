<?php require APPROOT . '/views/inc/cheader.php'; ?>
<?php require APPROOT . '/views/inc/unavbar.php'; ?>

<div class="container">
    <div class="row mt-4">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry For Inconvenience</strong> Payment Gate is under Maintenance.

  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
</div>
    </div>

    <div class="row">
      <div class="col-sm-8">
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Bank Name</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Account Number</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">IFSC CODE</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">BANK HOLDER NAME</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
           
            <button type="button" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>