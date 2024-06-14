<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php if($additionalData['message']){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<h3 class="my-4 text-center">Payment Details</h3>
<div class="container">
<form class="row g-3" action="<?php echo URLROOT ;?>admissions/feeDetails" method="post" >
<input type="hidden" value="<?php echo $data->student_id;?>" name="student_id" id="student_id"> 


  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Registration Number</label>
    <input type="text" class="form-control" id="admission_no" name="admission_no" value="<?php echo $data->admission_no;?>" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $data->student_name;?>" readonly>
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Course Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $data->course_name;?>" readonly>
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Course Price</label>
    <input type="number" class="form-control" id="price" value="<?php echo $data->price;?>" readonly>
  </div>


  <div class="col-md-6">
            <div class="inputfield">
              <label for="payment">Mode of Payment :</label>
                <div class="col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="Cash" checked required>Cash
                    </div>
                </div> 

                <div class="col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="Cheque" required>Cheque
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="Online Payment" required>Online Payment
                    </div>
                </div>
        
              </div> 
            </div> 

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Transaction Id</label>
                <input type="text" class="form-control" id="transaction_id" name="transaction_id">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Notes</label>
                <input type="text" class="form-control" id="notes" name="notes">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            

            <div class="col-md-6 form-label">
                     <label>Payment Options :</label>
                     <select id="payment_option" name="payment_option" onclick="disableField()">
                     <option value="Select">Select Payment Opion</option>
                        <option value="Full Payment">Full Payment</option>
                        <option value="Installment">Installment</option>
                     </select>
                  </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Amount Paid</label>
                <input type="number" class="form-control" id="amt_paid" name="amt_paid">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Amount to be paid</label>
                <input type="number" class="form-control" id="amt_to_be_paid" name="amt_to_be_paid">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Due Amount</label>
                <input type="number" class="form-control" id="due_amt" name="due_amt">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Reminder Date</label>
                <input type="date" class="form-control" id="reminder_date" name="reminder_date">
            </div>
            <div class="col-md-6"></div>
            <div class="d-grid gap-2 col-6 mx-auto form-submit">
    <button type="submit" id="feesubmitbtn" name="feesubmitbtn" class="btn" style="background:#424242;border-radius:30px;color:white">Submit</button>
    <button type="submit" id="backbtn" name="backbtn" class="btn" formnovalidate="formnovalidate" style="background:#424242;border-radius:30px;color:white">Back</button>
  </div>
</form>
</div>


<script type="text/javascript">

    function disableField() {
        var state = document.getElementById("payment_option").value === "Full Payment";
        if (state == true) {
            document.getElementById("amt_paid").style.visibility = "hidden";
            document.getElementById("amt_to_be_paid").style.visibility = "hidden";
        }
    };
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>