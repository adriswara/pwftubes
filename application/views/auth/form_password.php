<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>

<body>
    <h1>STUDENT PORTAL</h1>
    <h3>Change Password</h3>
    <hr>
    <?=$this->session->flashdata('msg')?>
      <div style="color: red;"><?=validation_errors()?></div>
        <form action="" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="password" name="oldpassword" id="form1Example13" placeholder="Old Password" class="form-control form-control-lg"/>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="newpassword" id="form1Example23" placeholder="New Password" class="form-control form-control-lg"/>
          </div>
          
          <!-- Submit button -->
          <!-- <div class="d-grip gap-2 col-6 mx-auto"> -->
          <input type="submit" value="Change Password" name="change" class="btn w-100 btn-lg btn-primary">
          </div>
        </form>
      </div>
</body>