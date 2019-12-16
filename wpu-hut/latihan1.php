<?php 
$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

$menu = $menu['menu'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Belajar Rest API-JSON</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <img src="img/logo.png" width="120px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">All Menu</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container"> 
      <div class="row mt-3">
        <div class="col">
          <h1>All Menu</h1>
        </div>
      </div>
      <div class="row">
        <?php
        foreach ($menu as $row) :
          $harga = $row['harga'];
        ?>
        
        <div class="col-md-4">  
          <div class="card mb-3" style="">
            <img class="card-img-top" src="img/menu/<?= $row['gambar'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?= $row['nama'] ?></h5>
              <p class="card-text"><?= $row['deskripsi'] ?></p>
              <h5 class="card-title"><?="Rp. ".number_format((float)"$harga",0,",","."); ?></h5>
              <a href="#" class="btn btn-primary">Pesan Sekarang</a>
            </div>
          </div>
        </div>

        <?php 
        endforeach;
        ?>
      </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>