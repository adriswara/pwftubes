<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>




<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Form Input mahasiswa</h1>
  <p>Isi form untuk input mahasiswa pada halaman berikut</p>
</div>
   

    <?php 
      $nama='';
      $role='';
      $ipk='';
      $sks_lulus='';
      $username='';
      $password='';
    if (isset($cat)) {
      $nama=$cat->nama;
      $role=$cat->role;
      $ipk=$cat->ipk;
      $sks_lulus=$cat->sks_lulus;
      $username=$cat->username;
      $password=$cat->password;
    }

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?= $nama ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for=" role" class="form-label"> role</label>
    <input type="text" class="form-control" id="role" placeholder="Role" name="role" value="<?= $role ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="ipk" class="form-label">ipk</label>
    <input type="text" class="form-control" id="ipk" placeholder="IPK" name="ipk" value="<?= $ipk ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for=" sks_lulus" class="form-label"> sks_lulus</label>
    <input type="text" class="form-control" id="sks_lulus" placeholder="SKS lulus" name="sks_lulus" value="<?= $sks_lulus ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for=" username" class="form-label"> username</label>
    <input type="text" class="form-control" id="username" placeholder="SKS lulus" name="username" value="<?= $username ?>" required>
  </div>

  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
