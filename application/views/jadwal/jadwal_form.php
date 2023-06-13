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
      $fk_matakuliah='';
      $fk_dosen='';
      $shift_kelas='';
      $hari='';
      $jam='';
      $lokasi='';
      $periode_akademik='';

    if (isset($jadwals)) {
      $fk_matakuliah=$jadwals->fk_matakuliah;
      $fk_dosen=$jadwals->fk_dosen;
      $shift_kelas=$jadwals->shift_kelas;
      $hari=$jadwals->hari;
      $jam=$jadwals->jam;
      $lokasi=$jadwals->lokasi;
      $periode_akademik=$jadwals->periode_akademik;
    }

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="fk_matakuliah" class="form-label">id matakuliah</label>
    <input type="text" class="form-control" id="fk_matakuliah" placeholder="fk_matakuliah" name="fk_matakuliah" value="<?= $fk_matakuliah ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="fk_dosen" class="form-label">id dosen</label>
    <input type="text" class="form-control" id="fk_dosen" placeholder="fk_dosen" name="fk_dosen" value="<?= $fk_dosen ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="shift_kelas" class="form-label">Nama Shift</label>
    <input type="text" class="form-control" id="shift_kelas" placeholder="shift_kelas" name="shift_kelas" value="<?= $shift_kelas ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="hari" class="form-label">Hari</label>
    <input type="text" class="form-control" id="hari" placeholder="hari" name="hari" value="<?= $hari ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="jam" class="form-label">Jam</label>
    <input type="text" class="form-control" id="jam" placeholder="jam" name="jam" value="<?= $jam ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="lokasi" class="form-label">Lokasi</label>
    <input type="text" class="form-control" id="lokasi" placeholder="lokasi" name="lokasi" value="<?= $lokasi ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="periode_akademik" class="form-label">Periode</label>
    <input type="text" class="form-control" id="periode_akademik" placeholder="periode_akademik" name="periode_akademik" value="<?= $periode_akademik ?>" required>
  </div>
  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
