<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>


<style>
 /* The Modal (background) */
 .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
} 
/*  */
.container {
  position: relative;
  width: 30%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #04AA6D;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
/*  */
</style>


<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Daftar mahasiswa</h1>
  <?= $this->session->flashdata('msg'); ?>
  <p>Berikut daftar mahasiswa yang tersedia</p>
</div>
    <a class="btn btn-dark mt-4 ms-3" href="<?=site_url('Welcome/add')?>">Add new Mahasiswa</a>
    <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Status mahasiswa</th>
            <th>ipk</th>
            <th>Total SKS Lulus</th>
            <th colspan="2">Action</th>
        </tr>
        <?php $i=1; foreach($cats as $cat) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $cat->nama ?></td>
            <td><?= $cat->role ?></td>
            <td><?= $cat->ipk ?></td>
            <td><?= $cat->sks_lulus ?></td>
            
            <td> <a href="<?=site_url('Welcome/edit/'.$cat->id_mahasiswa)?>" class="btn btn-primary">Edit</a> </td>
            <td><a href="<?=site_url('Welcome/delete/'.$cat->id_mahasiswa)?>" class="btn btn-danger" onclick="return confirm('Confurm Delete?')" >Delete</a></td>
        </tr>
        <?php } ?>
    </table>
    
  
  
<?php $this->load->view('footer'); ?>