<?phpdefined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
	$this->load->view('head');
?>
<body>
	<?php
		$this->load->view('navbar');
	?>
    <div class="container-md w-75">
    <H1 class="text-center">Student Portal</H1>
    <h3 class="text-center">APPS MENU</h3>
	<center><h6>Welcome <?=$this->session->userdata('fullname')?>, you are login as <?=$this->session->userdata('usertype')?></h6></center>
    <hr>
   
    <div class="row gy-3">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Manage Cats</h5>
                    <p class="card-text">Untuk mengatur mahasiswa baru ataupun mengupdate mahasiswa bahkan menghapus mahasiswa yang ada di cat list</p>
                    <a href="<?= site_url('cats067') ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Manage Categories</h5>
                    <p class="card-text">Mengatur penambahan category mahasiswa yang akan muncul pada penambahan type di manage cats.</p>
                    <a href="<?= site_url('categories067') ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
		<?php if ($this->session->userdata('usertype')=='Manager') { ?>
        <div class="col-sm-4 ">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">Mengatur user yang mengoprasikan aplikasi ini.</p>
                    <a href="<?= site_url('users067') ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sales Report</h5>
                    <p class="card-text">Menampilkan laporan dari hasil penjualan mahasiswa.</p>
                    <a href="<?= site_url('cats067/sales')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
		<?php } ?>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Logout</h5>
                    <p class="card-text">Untuk keluar dari akun yang di pakai.</p>
                    <a href="<?=site_url('auth067/logout')?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
		<hr>
    </div>
</div>
</div>

	<?php
		$this->load->view('footer');
	?>
</body>
</html>
