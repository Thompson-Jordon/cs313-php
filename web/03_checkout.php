<?php
$thisPage = "";;

session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
   <title>Drink Shack</title>
</head>

<body>
   <?php include("nav.php"); ?>
   <div class="jumbotron jumbotron-fluid">
      <div class="container">
      <a class="btn btn-primary float-right mr-3" href="03_cart.php">Back to Cart</a>
         <h1 class="display-3">Drink Shack</h1>
         <p class="lead">Checkout</p>
         <hr class="my-2">
         <p>Please enter the following information</p>
      </div>
      <div class="container">
         <form action="03_confirm.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Please Enter Your Name" class="form-control">
            <label for="street">Street</label>
            <input type="text" name="street" placeholder="123 Elm Street" class="form-control">
            <label for="city">City</label>
            <input type="text" name="city" placeholder="Boston" class="form-control">
            <label for="state">State</label>
            <input type="text" name="state" placeholder="MA" class="form-control">
            <label for="zip">Zipcode</label>
            <input type="text" name="zip" placeholder="12345" class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Confirm Order</button>
         </form>
      </div>
   </div>
</body>

</html>