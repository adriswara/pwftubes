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
                <td>Age</td>
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
    $id='';
      $name='';
      $type='';
      $gender='';
      $age='';
      $price='';
    if (isset($cat)) {
      $id = $cat->id;
      $name=$cat->name;
      $type=$cat->type;
      $gender=$cat->gender;
      $age=$cat->age;
      $price=$cat->price;
      
    }

    ?>

    <a class="btn btn-danger mt-4 ms-3" href="<?=site_url('')?>">Cancel</a>

<form action="" method="post">
  <div class="mb-3 mt-3 ms-3">
    <label for="id" class="form-label">Id:</label>
    <input type="text" class="form-control" id="id" placeholder="Enter id" name="id" value="<?= $id ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="name" class="form-label">name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $name ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="type" class="form-label">Type:</label>
    <input type="text" class="form-control" id="type" placeholder="Enter type" name="type" value="<?= $type ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="price" class="form-label">Price:</label>
    <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="<?= $price ?>" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="name" class="form-label">Customer Name:</label>
    <input type="text" class="form-control" id="customer_name" placeholder="Enter name" name="customer_name" value="" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="name" class="form-label">Customer Address:</label>
    <input type="text" class="form-control" id="customer_address" placeholder="Enter name" name="customer_address" value="" required>
  </div>
  <div class="mb-3 mt-3 ms-3">
    <label for="name" class="form-label">Customer Phone:</label>
    <input type="text" class="form-control" id="customer_phone" placeholder="Enter name" name="customer_phone" value="" required>
  </div>

  
  <button type="submit" class="btn btn-primary ms-3" value="save" name="submit">Submit</button>
</form> 

    <?php $this->load->view('footer'); ?>
