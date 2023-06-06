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
      $judul='';
      $tanggal='';
      $isiPengumuman='';
    if (isset($informasis)) {
      $judul=$informasis->judul;
      $tanggal=$informasis->tanggal;
      $isiPengumuman=$informasis->isiPengumuman;
    }

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="judul" class="form-label">judul</label>
    <input type="text" class="form-control" id="judul" placeholder="judul" name="judul" value="<?= $judul ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="tanggal" class="form-label">tanggal</label>
    <input type="date" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="<?= $tanggal ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="isiPengumuman" class="form-label">Isi Pengumuman</label>
    <input type="text" class="form-control" id="isiPengumuman" placeholder="isiPengumuman" name="isiPengumuman" value="<?= $isiPengumuman ?>" required>
  </div>
  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
