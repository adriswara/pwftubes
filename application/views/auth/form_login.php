<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>

<body>
    <h1>STUPOR</h1>
    <h3>LOGIN</h3>
    <hr>
    <div style="color: red;"><?= validation_errors(); ?></div>
    <?=$this->session->flashdata('msg')?>
        <div style="color: red;"><?=validation_errors()?></div>
        <form action="" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" name="username" id="form1Example13" placeholder="Username" class="form-control form-control-lg" />
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form1Example23" placeholder="Password" class="form-control form-control-lg"/>
            </div>
  
            <!-- Submit button -->
            <!-- <div class="d-grip gap-2 col-6 mx-auto"> -->
                <input type="submit" value="Sign in" name="login" class="btn w-100 btn-lg btn-primary">
            </div>
        </form>
</body>