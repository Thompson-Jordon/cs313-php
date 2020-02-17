<?php $thisPage = "Prove Assignments"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="./styles/style.css">
  <!--For jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--For Bootstrap-->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>CS470 | Prove Assignments</title>
</head>

<body>
  <?php include("nav.php"); ?>
  <h1 class="jumbotron">CS470 | Prove Assignments</h1>
  <div class="container-fluid">
    <div class="row">
      <!--Assignment-->
      <div class="card col-xs-12 col-sm-6 col-md-3 m-auto">
        <img class="card-img-top" src="./images/shoppingcart.svg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Shopping Cart</h4>
          <p class="card-text">This project is a simple ecomerce site that allows you to
            add drinks to your cart and then complete the order.
          </p>
          <a href="03_browse.php" class="btn btn-primary">See Project</a>
        </div>
      </div>
      <!-- END-->
      <!--Assignment-->
      <div class="card col-xs-12 col-sm-6 col-md-3 m-auto">
        <img class="card-img-top" src="./images/databaseERD.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Database Design</h4>
          <p class="card-text">This page contains the database ERD and sql.</p>
          <a href="04_prove.php" class="btn btn-primary">See Project</a>
        </div>
      </div>
      <!-- END-->
      <!--Assignment-->
      <div class="card col-xs-12 col-sm-6 col-md-3 m-auto">
        <img class="card-img-top" src="./images/workorder.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Word Order Week05</h4>
          <p class="card-text">This week I built a few pages to give the initial structure
            of the work order program.
          </p>
          <a href="prove05/workorder.php" class="btn btn-primary">See Project</a>
        </div>
      </div>
      <!-- END-->
      <!--Assignment-->
      <div class="card col-xs-12 col-sm-6 col-md-3 m-auto">
        <img class="card-img-top" src="./images/workorder.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Word Order Week06</h4>
          <p class="card-text">This week I made it so that the user could create new
          work order, devices, areas, and locations. 
          </p>
          <a href="prove06/workorder.php" class="btn btn-primary">See Project</a>
        </div>
      </div>
      <!-- END-->
      <!--Assignment-->
      <div class="card col-xs-12 col-sm-6 col-md-3 m-auto">
        <img class="card-img-top" src="./images/workorder.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">Word Order Week07</h4>
          <p class="card-text">This week I added a login as well as cleaned up various 
          pages. 
          </p>
          <a href="prove07/index.php" class="btn btn-primary">See Project</a>
        </div>
      </div>
      <!-- END-->
    </div>
  </div>
  <script src="./scripts/app.js"></script>
</body>

</html>