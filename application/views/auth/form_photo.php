<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>




<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Form Input Foto</h1>
  <p>Isi form untuk input foto pada halaman berikut</p>
</div>
   
             

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>
<?= $this->session->flashdata('msg') ?>
<div style="color: red;"><?=$error?></div>
<form action="" method="post" enctype="multipart/form-data">
    <table>
    <tr>
         <td>CURRENT PHOTO</td>
         <td><img src="<?= base_url('uploads/users/'.$this->session->userdata('photo')) ?>" alt="" width="128" height="128" /></td>
    </tr>
    <tr>
    <td> NEW PHOTO </td>
    <td><input type="file" name="photo" required></td>
    </tr>
    <tr>
    <td></td>
    <td> <input type="submit" name="upload" value="UPLOAD PHOTO"> </td>
    </tr>
    </table>
</form>
<a class="btn btn-primary mt-4 ms-3"href="<?=base_url()?>"><h6>Back to Home</h6></a>

    <?php $this->load->view('footer'); ?>
