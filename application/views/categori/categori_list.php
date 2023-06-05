<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>



<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Daftar matakuliah</h1>
  <p>Berikut daftar matakuliah yang tersedia</p>
</div>
<a class="btn btn-dark mt-4 ms-3" href="<?=site_url('Categori/add')?>">Add new Matakuliah</a>
    <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Kuliah</th>
            <th>SKS</th>
            <th colspan="2">Action</th>
        </tr>
        <?php $i=1; foreach($categories as $categori) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $categori->nama_kuliah ?></td>
            <td><?= $categori->sks ?></td>
            <td><a href="<?=site_url('Categori/edit/'.$categori->id_matakuliah)?>" class="btn btn-primary">Edit</a></td> 
            <td><a href="<?=site_url('Categori/delete/'.$categori->id_matakuliah)?>" class="btn btn-danger" onclick="return confirm('Confurm Delete?')" >Delete</a></td>
        </tr>
        <?php } ?>
    </table>
    <div class="row">
  
    <?php $i=1; foreach($categories as $categori) { ?>
    <div class="col-sm-3 mt-5 ms-3">
        <div class="card bg-dark text-white" style="width:400px">
          <div class="card-body">
            <h4 class="card-title"><?= $i++ ?>. <?= $categori->nama_kuliah ?>,</h4>
            <p class="card-text"> <?= $categori->nama_kuliah ?>, <?= $categori->sks ?>.</p>
            <a href="<?=site_url('Categori/edit/'.$categori->id_matakuliah)?>" class="btn btn-primary">Edit</a> 
            <a href="<?=site_url('Categori/delete/'.$categori->id_matakuliah)?>" class="btn btn-danger" onclick="return confirm('Confurm Delete?')" >Delete</a>
          </div>
          <!-- <img class="card-img-bottom" src="assets\img-cat1.png" alt="Card image" style="width:100%"> -->
        </div>
    </div>
    <?php } ?>
  </div>
  
<?php $this->load->view('footer'); ?>