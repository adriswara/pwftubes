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
  <h1>Daftar Jadwal</h1>
  <?= $this->session->flashdata('msg'); ?>
  <p>Berikut daftar jadwal yang tersedia</p>
</div>
<?php if($this->session->userdata('role') == "admin") {?>

    <a class="btn btn-dark mt-4 ms-3" href="<?=site_url('Jadwal/add')?>">Add new Jadwal</a>
    <?php } ?> 

    <hr>
  	<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr class="table-primary">
            <th>No</th>
            <th>Matakuliah</th>
            <th>Dosen</th>
            <th>Shift Kelas</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Lokasi</th>
            <th>Periode Akademik</th>
            <?php if($this->session->userdata('role') == "admin") {?>
            <th colspan="2">Action</th>
            <?php } ?> 

        </tr>
        <?php $i=1; foreach($jadwals as $jadwal) { ?>
        <tr class="table-warning">
            <td><?= $i++ ?></td>
            <td><?= $jadwal->nama_kuliah ?></td>
            <td><?= $jadwal->nama_dosen ?></td>
            <td><?= $jadwal->shift_kelas ?></td>
            <td><?= $jadwal->hari ?></td>
            <td><?= $jadwal->jam ?></td>
            <td><?= $jadwal->lokasi ?></td>
            <td><?= $jadwal->periode_akademik ?></td>
            <?php if($this->session->userdata('role') == "admin") {?>
            <td> <a href="<?=site_url('Jadwal/edit/'.$jadwal->id_jadwal)?>" class="btn btn-primary">Edit</a> </td>
            <td> <a href="<?=site_url('Jadwal/delete/'.$jadwal->id_jadwal)?>" class="btn btn-danger" onclick="return confirm('Confurm Delete?')" >Delete</a></td>
            <?php } ?> 
          </tr>
        <?php } ?>
    </table>
    </div>
  
  
<?php $this->load->view('footer'); ?>