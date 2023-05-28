<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('head'); ?>

<?php $this->load->view('navbar'); ?>



<body>
<div class="mt-0 p-5 bg-primary text-white">
  <h1>Daftar Sales</h1>
  <?= $this->session->flashdata('msg'); ?>
  <p>Berikut daftar kucing yang tersedia</p>
</div>
    <a class="btn btn-dark mt-4 ms-3" href="<?=site_url('Welcome/add')?>">Add new Item 3</a>
    <hr>
    <table border="1">
        <tr>
            
            <th> id</th>
            <th>name</th>
            <th>tgl</th>
            <th> name</th>
            <th> address</th>
            <th> phone</th>
            <!-- <th colspan="2">Action</th> -->
        </tr>
        <?php $i=1; foreach($sales as $sale) { ?>
        <tr>
         
            <td><?= $sale->sale_id ?></td>
            <td><?= $sale->name ?></td>
            <td><?= tgl($sale->sale_date) ?></td>
            <td><?= $sale->customer_name ?></td>
            <td><?= $sale->customer_address ?></td>
            <td><?= $sale->customer_phone ?></td>
            <!-- <td>Edit</td>
            <td>Delete</td> -->
        </tr>
        <?php } ?>
    </table>
    <div class="row">
    
    <?php $i=1; foreach($sales as $sale) { ?>
    <div class="col-sm-3 mt-5 ms-3">
        <div class="card bg-dark text-white" style="width:400px">
          <div class="card-body">
            <h4 class="card-title"><?= $i++ ?>. ID:  <?= $sale->sale_id ?>, Dibeli TGL: <?= tgl($sale->sale_date) ?>,</h4>
            <p class="card-text"> <?= $sale->name ?> Dibeli oleh <?= $sale->customer_name ?> Yang tinggal di <?= $sale->customer_address ?> dengan nomor telefon <?= $sale->customer_phone ?>.</p>
          </div>
          <!-- <img class="card-img-bottom" src="assets\img-cat1.png" alt="Card image" style="width:100%"> -->
        </div>
    </div>
    <?php } ?>
  </div>
  
<?php $this->load->view('footer'); ?>