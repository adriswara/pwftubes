<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url()?>">
	<img src="<?=base_url('./assets/l1.png')?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
	Student Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar" >
      <ul class="navbar-nav me-auto ">
        <li class="nav-item">
			<a class="nav-link" href="<?= site_url('cats') ?>">Student List</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= site_url('categori') ?>">Matakuliah List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Link</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=base_url('./assets/g1.jpg')?>" alt="Los Angeles" class="d-block w-100" style="max-height:500px;">
      <div class="carousel-caption">
        <h3>Student Portal UNLA</h3>
        <p>Make Your Dream Come True Here</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('./assets/g2.jpg')?>" alt="Chicago" class="d-block w-100" style="max-height:500px;">
      <div class="carousel-caption">
         <h3>Student Portal UNLA</h3>
        <p>Make Your Dream Come True Here</p>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('./assets/g3.jpg')?>" alt="New York" class="d-block w-100" style="max-height:500px;">
      <div class="carousel-caption">
		<h3>Student Portal UNLA</h3>
        <p>Make Your Dream Come True Here</p>
      </div>  
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

