<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>




<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Form Input Kategori</h1>
  <p>Isi form untuk input kategori pada halaman berikut</p>
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
                <td>description</td>
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
      $cate_name='';
      $description='';
     
    if (isset($categori)) {
      $cate_name=$categori->cate_name;
      $description=$categori->description;
     
      
    }

    

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('Categori/')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="cate_name" class="form-label">Nama:</label>
    <input type="text" class="form-control" id="cate_name" placeholder="Enter cate_name" name="cate_name" value="<?= $cate_name ?>" required>
  </div>

 
  <div class="mb-3 mt-3 ms-3">
    <label for="description" class="form-label">Deskripsi:</label>
    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?= $description ?>" required>
  </div>

  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
