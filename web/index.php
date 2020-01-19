<?php $thisPage = "Home"; ?>
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
  <title>CS470 | Jordon Thompson</title>
</head>

<body>
  <?php include("nav.php"); ?>
  <h1 class="jumbotron">CS470 | Jordon Thompson</h1>
  <script src="./scripts/app.js"></script>
  <div class="row container-fluid align-middle" id="about">
    <div class="col col-5">
      <img class="img-thumbnail rounded float-left" src="./images/Jordon2018.jpg" alt="Picture of Jordon" />
    </div>
    <div class="col my-auto">
      <p class="rounded text-white bg-primary p-3">
        Jordon grew up in Utah and still lives there with his wife and
        children. Jordon is a member of the Church of Jesus Crist of
        Latter-Day Saints and surved a mission in Boston, Massachusetts
        speaking Cambodian.<br>He loves playing sports and enjoys programming
        and development.
      </p>
    </div>
  </div>
  <h2 class="jumbotron text-white bg-secondary">Previous Projects</h2>
  <div class="container-fluid">
    <div class="row">
      <!--Assignment-->
      <div class="card col-xs-12 col-sm-6 col-md-5 m-auto">
        <img class="card-img-top" src="./images/rec.jpg">
        <div class="card-body">
          <h4 class="card-title">CS 371|UX Design</h4>
          <p class="card-text">A website to use the UX Design techniques learned
            Throughout the semester
          </p>
          <a href="https://jordonet.wixsite.com/cs371" class="btn btn-primary">See Project</a>
        </div>
      </div>
      <!--Assignment-->
      <div class="card col-xs-12 col-sm-6 col-md-5 m-auto">
        <img class="card-img-top" src="./images/mobileSPA.jpg">
        <div class="card-body">
          <h4 class="card-title">CIT 261|Mobile SPA</h4>
          <p class="card-text">A mobile web app SPA built with JavaScript from
            scratch. You may have to resize you browser to simulate a mobile device.
            It pulls superheroes from a restAPI and allows you to save your favorites.
          </p>
          <a href="https://thompson-jordon.github.io/cit261/mobileSPA/" class="btn btn-primary">See Project</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>