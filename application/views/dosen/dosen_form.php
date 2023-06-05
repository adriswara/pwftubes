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
      $nama_dosen='';
    if (isset($dosens)) {
      $nama_dosen=$dosens->nama_dosen;
    }

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="nama_dosen" class="form-label">Nama_dosen</label>
    <input type="text" class="form-control" id="nama_dosen" placeholder="Nama_dosen" name="nama_dosen" value="<?= $nama_dosen ?>" required>
  </div>
  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
