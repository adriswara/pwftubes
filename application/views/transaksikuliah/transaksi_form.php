<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>




<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Form Input matakuliah</h1>
  <p>Isi form untuk input matakuliah pada halaman berikut</p>
</div>
    <!-- <form action="" method="post">
        <table>
            <tr>
                <td>fk_mahasiswa</td>
                <td><input type="text" name="" id=""></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><select name="" id="">
                    <option value="">Choose type</option>
                    <option value="">Domestic</option>
                    <option value="">Angora</option>
                    <option value="">Persia</option>
                </select></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="" id="">Male<input type="radio" name="" id="">Female</td>
            </tr>
            <tr>
                <td>fk_perkuliahan</td>
                <td><input type="text" name="" id=""></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SAVE"></td>
            </tr>
        </table>
    </form> -->

    <?php 
      $fk_mahasiswa='';
      $fk_perkuliahan='';
      $fk_jadwal='';
     
    if (isset($transaksi)) {
      $fk_mahasiswa=$transaksi->fk_mahasiswa;
      $fk_perkuliahan=$transaksi->fk_perkuliahan;
      $fk_jadwal=$transaksi->fk_jadwal; 
    }

    

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('Transaksikuliah/')?>">Cancel</a>

<form action="" method="post">


  <div class="mb-3 mt-3 ms-3">
    <select name="fk_mahasiswa" id="" required>
      <option value="">Choose Mahasiswa</option>
        <?php foreach($mahasiswa as $murid) { ?>
      <option value="<?= $murid->id_mahasiswa; ?>" <?= set_select('fk_mahasiswa',$murid->id_mahasiswa,$fk_mahasiswa==$murid->id_mahasiswa?TRUE:FALSE)?>> <?= $murid->nama; ?> </option>
        <?php } ?>
    </select>
  </div>

  <div class="mb-3 mt-3 ms-3">
    <select name="fk_perkuliahan" id="" required>
      <option value="">Choose Matakuliah</option>
        <?php foreach($jadwal as $matkul) { ?>
      <option value="<?= $matkul->id_jadwal; ?>" <?= set_select('fk_perkuliahan',$matkul->id_jadwal,$fk_perkuliahan==$matkul->id_jadwal?TRUE:FALSE)?>> <?= $matkul->nama_kuliah; ?> </option>
        <?php } ?>
    </select>
  </div>


<!-- 
  <div class="mb-3 mt-3 ms-3">
    <label for="fk_mahasiswa" class="form-label">fk_mahasiswa:</label>
    <input type="text" class="form-control" id="fk_mahasiswa" placeholder="Enter fk_mahasiswa" name="fk_mahasiswa" value="<?= $fk_mahasiswa ?>" required>
  </div>

 
  <div class="mb-3 mt-3 ms-3">
    <label for="fk_perkuliahan" class="form-label">fk_perkuliahan:</label>
    <input type="text" class="form-control" id="fk_perkuliahan" placeholder="Enter fk_perkuliahan" name="fk_perkuliahan" value="<?= $fk_perkuliahan ?>" required>
  </div> -->

  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
