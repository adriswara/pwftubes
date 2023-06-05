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
                <td>Nama</td>
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
                <td>sks</td>
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
      $nama_kuliah='';
      $sks='';
     
    if (isset($categori)) {
      $nama_kuliah=$categori->nama_kuliah;
      $sks=$categori->sks;
     
      
    }

    

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('Categori/')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="nama_kuliah" class="form-label">Nama:</label>
    <input type="text" class="form-control" id="nama_kuliah" placeholder="Enter nama_kuliah" name="nama_kuliah" value="<?= $nama_kuliah ?>" required>
  </div>

 
  <div class="mb-3 mt-3 ms-3">
    <label for="sks" class="form-label">SKS:</label>
    <input type="text" class="form-control" id="sks" placeholder="Enter sks" name="sks" value="<?= $sks ?>" required>
  </div>

  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
