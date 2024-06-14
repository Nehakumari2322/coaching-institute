<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
    <div class="container mt-2 mb-10">
      <div class="card" style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px; padding: 2%">
      <form method="post" action="<?php echo URLROOT; ?>agents/agentshome">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row">
          <div class="col">
            <label class="form-label" for="family_name"
              >Name of Family Member as per Aadhar</label
            >
            <div class="form-outline">
              <input
                type="text"
                id="family_name"
                name="family_name"
                class="form-control"
              />
            </div>
          </div>
          <label class="form-label" for="family_no"
            >Total no of family Member
          </label>
          <div class="form-outline">
            <input
              type="number"
              id="family_no"
              name="family_no"
              class="form-control"
            />
          </div>
        </div>

        <div class="row">
          <label class="form-label" for="aadhar_no">Aadhar Number</label>
          <div class="form-outline">
            <input
              type="number"
              id="aadhar_no"
              name="aadhar_no"
              class="form-control"
            />
          </div>
          <label class="form-label" for="contact_no">Mobile no</label>
          <div class="form-outline">
            <input
              type="number"
              id="contact_no"
              name="contact_no"
              class="form-control"
            />
          </div>
        </div>
        <!-- State & Districts -->
 <!--        <div class="row">
          <label class="form-label" for="st">State</label>
          <div class="form-outline">
            <div class="row form-control" style="margin-left: 0.2%">
              <select
                class="ui dropdown"
                id="st"
                name="st"
                style="border: none"
              >
                <option value="">Select State</option>
                <option value="1">Bihar</option>
                <option value="2">Jharkhand</option>
              </select>
            </div>
          </div>

          <label class="form-label" for="district">District</label>
          <div class="form-outline">
            <div class="row form-control" style="margin-left: 0.2%">
              <select
                class="ui dropdown"
                id="district"
                name="district"
                style="border: none"
              >
                <option value="">Slect District</option>
                <option value="1">Darbhanga</option>
              </select>
            </div>
          </div>
        </div> -->
            <input
              type="hidden"
              id="st"
              name="st"
              class="form-control" value='<?php echo $data->stateid ?>'
            />
            <input
              type="hidden"
              id="district"
              name="district"
              class="form-control" value=<?php echo $data->districtid ?>
            />
            <input
              type="hidden"
              id="block"
              name="block"
              class="form-control" value=<?php echo $data->blockid ?>
            />

        <!-- Village Pincode-->
        <div class="row">
          <label class="form-label" for="village">Village</label>
          <div class="form-outline">
            <input
              type="text"
              id="village"
              name="village"
              class="form-control"
            />
          </div>
          <label class="form-label" for="pin_code">Pincode</label>
          <div class="form-outline">
            <input
              type="number"
              id="pin_code"
              name="pin_code"
              class="form-control"
            />
          </div>
        </div>
        <div class="row">
          <label class="form-label" for="address">Full Address</label>
          <div class="form-outline">
            <input
              type="text"
              id="address"
              name="address"
              class="form-control"
            />
          </div>
        </div>
        <!-- Gas Connection-->
        <div class="row mt-2">
          <div class="col-sm-6 col-md-6 col-6">
            Gas Connection
            <input type="radio" name="gasconn" <?php if (isset($gasconn) && $gasconn=="Yes") echo "checked";?>value="Yes">Yes
            <input type="radio" name="gasconn" <?php if (isset($gasconn) && $gasconn=="No") echo "checked";?>value="No">No
          </div>
          <!-- Bpl Registerd-->
          <div class="col-sm-6 col-md-6 col-6">
            Bpl Registerd
            <input type="radio" name="bplreg" <?php if (isset($bplreg) && $bplreg=="Yes") echo "checked";?>value="Yes">Yes
            <input type="radio" name="bplreg" <?php if (isset($bplreg) && $bplreg=="No") echo "checked";?>value="No">No
          </div>
        </div>
        <!-- Uplaod image-->
        <!-- <div class="col-sm-6">

      <div class="mb-3 mt-3" >
  <form action="#" method="POST" enctype="multipart/form-data">
        <input type ="file" name="uploadfile">
        <input type="submit" name="submit" value="upload File" >
        </div>
    </form>
</div> -->

        <!-- Submit button -->
        <br />
      <br />
      <br />
      <br />
        <div>
          <div class="row">
           <input type="submit" class='btn btn-success' name="applformsubmit" id="applformsubmit" value="Upload" />
          </div>
        </div>
      </form>
      
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
    </div>
    </div>

   
  <?php require APPROOT . '/views/inc/footer.php'; ?>