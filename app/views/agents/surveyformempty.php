<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
    <div class="container mt-2 mb-10">
      <div class="text-center">
       <span class="badge text-center rounded-pill  text-dark fs-6" style="background-color:rgb(229, 148, 17);">Today's Total Entry: <span class="badge text-center rounded-pill bg-danger text-dark fs-6"><?php echo $data->application_count?></span></span>

     </div>
     <br>
      <div class="card" style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px; padding: 2%">
      <form method="post" action="<?php echo URLROOT; ?>agents/agentshome" onsubmit='disableButton()'>
        <input type="hidden" name="agentid" value="<?php echo $data->login_id?>">
        <!-- <input type="text" name="countvalue" value="<?php echo $data->application_count?>"> -->
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row">
          <div class="col">
            <label class="form-label fw-bold" for="family_name"
              >Name of Family Member (as per Aadhar)</label
            >
            <div class="form-outline">
              <input
                type="text"
                id="family_name"
                name="family_name"
                class="form-control" required onkeypress="return onlyAlphabets(event,this);"
              />
            </div>
          </div>
          <label class="form-label fw-bold" for="family_no"
            >Total no of family Member
          </label>
          <div class="form-outline">
            <input
              type="number"
              id="family_no"
              name="family_no"
              class="form-control" required min="1" max="125"
            />
          </div>
        </div>

        <div class="row">
          <label class="form-label fw-bold" for="aadhar_no">Aadhar Number</label>
          <div class="form-outline">
            <input
              type="number"
              id="aadhar_no"
              name="aadhar_no"
              class="form-control" required  max="999999999999"
            />
          </div>
          <label class="form-label fw-bold" for="contact_no">Mobile no</label>
          <div class="form-outline">
            <input
              type="number"
              id="contact_no"
              name="contact_no"
              class="form-control" required min="1000000000" max="9999999999"
            />
          </div>
        </div>
            <input
              type="hidden"
              id="st"
              name="st"
              class="form-control" value='<?php echo $data->stateid; ?>'
            />
            <input
              type="hidden"
              id="district"
              name="district"
              class="form-control" value=<?php echo $data->districtid; ?>
            />
            <input
              type="hidden"
              id="block"
              name="block"
              class="form-control" value=<?php echo $data->blockid; ?>
            />

        <!-- Village Pincode-->
        <div class="row">
          <label class="form-labe fw-bold" for="village">Village</label>
          <div class="form-outline">
            <input
              type="text"
              id="village"
              name="village"
              class="form-control" required
            />
          </div>
          <label class="form-label fw-bold" for="pin_code">Pincode</label>
          <div class="form-outline">
            <input
              type="number"
              id="pin_code"
              name="pin_code"
              class="form-control" required min="100000" max="999999"
            />
          </div>
        </div>
        <div class="row">
          <label class="form-label fw-bold" for="address">Full Address</label>
          <div class="form-outline">
            <input
              type="text"
              id="address"
              name="address"
              class="form-control" required
            />
          </div>
        </div>
        <!-- Gas Connection-->
        <div class="row mt-2">
          <div class="col-sm-6 col-md-6 col-6  ">
            <span class='fw-bold'>Gas Connection</span>
            <input type="radio" name="gasconn" <?php if (isset($gasconn) && $gasconn=="Yes") echo "checked";?>value="Yes" required>Yes
            <input type="radio" name="gasconn" <?php if (isset($gasconn) && $gasconn=="No") echo "checked";?>value="No" required>No
          </div>
          <!-- Bpl Registerd-->
          <div class="col-sm-6 col-md-6 col-6">
            <span class='fw-bold'>BPL Registerd</span>
            <input type="radio" name="bplreg" <?php if (isset($bplreg) && $bplreg=="Yes") echo "checked";?>value="Yes" required>Yes
            <input type="radio" name="bplreg" <?php if (isset($bplreg) && $bplreg=="No") echo "checked";?>value="No" required>No
          </div>
        </div>

        <!-- Submit button -->
        <br />
      <br />

        <div>
          <div class="row">
           <input type="submit" class='btn btn-info' name="applformsubmit" id="applformsubmit" value="Upload" />
           <input type="submit" class='btn btn-info' name="applformsubmitposting" id="applformsubmitposting" value="Posting.." style="display: none;" />
          </div>
        </div>
      </form>
      <br />
      <br />

    </div>
    </div>

<script>
    function disableButton() {
        var btn1 = document.getElementById('applformsubmit');
        var btn2 = document.getElementById('applformsubmitposting');
        btn1.style.display = 'none';
        btn2.style.display = 'inline';
    }
</script>
   
  <?php require APPROOT . '/views/inc/footer.php'; ?>