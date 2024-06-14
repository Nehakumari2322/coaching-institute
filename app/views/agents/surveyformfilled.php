<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="container ">
            <form method="post" action="<?php echo URLROOT; ?>agents/agentshome">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <input type="hidden" name="applicant_id" id='applicant_id' value="<?php echo $data->applicant_id; ?>" />
              <input type="hidden" name="agentid" id='agentid' value="<?php echo $data->created_by; ?>" />
              <input type="hidden" name="todaysdate" id='todaysdate' value="">
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
                      class="form-control"
                      value="<?php echo $data->applicant_name;?>" readonly
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
                    class="form-control"
                    value="<?php echo $data->family_member_count; ?>" required min="1" max="125" readonly
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
                    class="form-control"
                    value="<?php echo $data->aadhar_no; ?>" required  max="999999999999" readonly
                  />
                </div>
                <label class="form-label fw-bold" for="contact_no">Mobile no</label>
                <div class="form-outline">
                  <input
                    type="number"
                    id="contact_no"
                    name="contact_no"
                    class="form-control"
                    value="<?php echo $data->mobile_no; ?>" required min="1000000000" max="9999999999" readonly
                  />
                </div>
              </div>
              <!-- State & Districts -->
              <div class="row">
                <label class="form-label fw-bold" for="st">State</label>
                <div class="form-outline">

                    <input
                    type="text"
                    id="st"
                    name="st"
                    class="form-control "
                    value="<?php echo $data->state_name; ?>" readonly
                  />

                </div>

                <label class="form-label fw-bold" for="district">District</label>
                <div class="form-outline">

                    <input
                    type="text"
                    id="district"
                    name="district"
                    class="form-control"
                    value="<?php echo $data->district_name; ?>" readonly
                  />

                </div>
                <label class="form-label fw-bold" for="st">Block</label>
                <div class="form-outline">

                    <input
                    type="text"
                    id="block"
                    name="block"
                    class="form-control"
                    value="<?php echo $data->block_name; ?>" readonly
                  />

                </div>
              </div>
              <!-- Village Pincode-->
              <div class="row">
                <label class="form-label fw-bold" for="village">Village</label>
                <div class="form-outline">
                  <input
                    type="text"
                    id="village"
                    name="village"
                    class="form-control"
                    value="<?php echo $data->village_name; ?>" required readonly
                  />
                </div>
                <label class="form-label fw-bold" for="pin_code">Pincode</label>
                <div class="form-outline">
                  <input
                    type="number"
                    id="pin_code"
                    name="pin_code"
                    class="form-control"
                    value="<?php echo $data->pincode; ?>" required min="100000" max="999999" readonly
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
                    class="form-control"
                    value="<?php echo $data->full_address; ?>" readonly
                  />
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-sm-6 col-md-6 col-6">
                  <span class='fw-bold'>Gas Connection</span>
                  <input type="radio" name="gasconn" value="Yes" <?php if($data->gas_conn_available == '1'){ echo "checked";}?> readonly>Yes
                  <input type="radio" name="gasconn" value="No" <?php if($data->gas_conn_available == '0'){ echo "checked";}?> readonly>No
                </div>
                <!-- Bpl Registerd-->
                <div class="col-sm-6 col-md-6 col-6">
                  <span class='fw-bold'>BPL Registerd</span>
                  <input type="radio" name="bplreg" value="Yes" <?php if ($data->bpl_registered == '1') echo "checked";?> readonly>Yes
                  <input type="radio" name="bplreg" value="No" <?php if ($data->bpl_registered == '0') echo "checked";?> readonly>No
                </div>
              </div>
              <!-- Submit button -->
              <!-- <input type="submit" name="submit" id="submit" value="Submit" /> -->
            
            <br />
          </div>
        </div>
        <!-- <div class="col-sm-6">
          <div class="card">
            <img src="<?php echo URLROOT.'/img/'.$data->aadhar_image_name; ?>" alt="aadharcard" />
          </div>
        </div> -->
        <div class="col-sm-6">
          <div class="img-zoom-container">
            <div class="card">
              <img id="myimage" src="<?php echo URLROOT.'/img/'.$data->aadhar_image_name; ?>" width="100%" height=auto alt="aadharcard">
              <div id="myresult" class="img-zoom-result"></div>
            </div>
          </div>
      </div>
        <!-- <button type="button" class="btn btn-success">Edit</button> -->
        <br>
        <br>
        <input type="submit" class="btn btn-warning" name='applsubmit' id='applsubmit' value='Submit for Approval'></input>
        </form>
      </div>
    </div>
    <br />
    <br />
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var today = new Date();
        // alert(today);
        var now = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        // alert(now);
            $("#todaysdate").val(now);
            });
// Initiate zoom effect:
imageZoom("myimage", "myresult");

</script>

    <?php require APPROOT . '/views/inc/footer.php'; ?>