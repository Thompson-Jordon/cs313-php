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
        <img
          class="img-thumbnail rounded float-left"
          src="./images/Jordon2018.jpg"
          alt="Picture of Jordon"
        />
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
</body>

</html>