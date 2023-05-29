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
<a class="btn btn-dark mt-4 ms-3" href="<?=site_url('Transaksikuliah/add')?>">Add new Transaksi</a>
    <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>fk_mahasiswa</th>
            <th>fk_perkuliahan</th>
            <th colspan="2">Action</th>
        </tr>
        <?php $i=1; foreach($transaksi as $transaksis) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $transaksis->fk_mahasiswa ?></td>
            <td><?= $transaksis->fk_perkuliahan ?></td>
            <td><a href="<?=site_url('Transaksikuliah/edit/'.$transaksis->id_transaksi)?>" class="btn btn-primary">Edit</a></td> 
            <td><a href="<?=site_url('Transaksikuliah/delete/'.$transaksis->id_transaksi)?>" class="btn btn-danger" onclick="return confirm('Confurm Delete?')" >Delete</a></td>
        </tr>
        <?php } ?>
    </table>
<?php $this->load->view('footer'); ?>