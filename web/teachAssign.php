<?php $thisPage = "Teach Assignments"; ?>
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
   <title>CS470 | Teach Assignments</title>
</head>

<body>
   <?php include("nav.php"); ?>
   <h1 class="jumbotron">CS470 | Teach Assignments</h1>
   <div class="container-fluid">
      <div class="row">
         <!--Assignment-->
         <div class="card col-xs-12 col-sm-6 col-md-3 m-auto">
            <img class="card-img-top" src="./images/teach_02.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
               <h4 class="card-title">HTML Review</h4>
               <p class="card-text">A project to review HTML and other front end technologies
                  like JavaScript and CSS as well as learn new ones i.e. Bootstrap and jQuery.
               </p>
               <a href="teach_02.html" class="btn btn-primary">See Project</a>
            </div>
         </div>

      </div>
   </div>
   <script src="./scripts/app.js"></script>
</body>

</html>