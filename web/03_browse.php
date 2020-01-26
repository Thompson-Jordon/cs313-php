<?php
$thisPage = "";
session_start();

// create cart array
if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] = array();
}

// check to see if shopping cart exists
if (filter_input(INPUT_POST, 'add_item')) {
   $id = htmlspecialchars($_POST['id']);
   // check if id exists
   if (array_key_exists($id, $_SESSION['cart'])) {
      $_SESSION["cart"][$id]["quantity"] += $_POST["quantity"];
   } else { // add cart item
      $_SESSION['cart'][$id] = array(
         'id'        => $id,
         'name'      => htmlspecialchars($_POST['name']),
         'price'     => htmlspecialchars($_POST['price']),
         'quantity'  => htmlspecialchars($_POST['quantity'])
      );
   }
}
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
      <a type="button" class="btn btn-primary btn-lg float-right mr-3" href="03_cart.php">View Cart <span class="badge badge-light">
            <?php
            $totalCount = 0;
            foreach ($_SESSION['cart'] as $product) {
               $totalCount += $product['quantity'];
            }
            echo $totalCount; ?>
         </span></a>
      <div class="container">
         <h1 class="display-3">Drink Shack</h1>
         <p class="lead">Products</p>
         <hr class="my-2">
         <p>Please select the products you would like to buy</p>
      </div>
      <div class="card-deck p-3">
         <div class="card col-sm-4 col-md-3">
            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <img class="card-img-top img-responsive" src="images/lemonade.png" alt="">
               <div class="card-body">
                  <h4 class="card-title">Lemonade</h4>
                  <p class="card-text">$0.50</p>
                  <input type="hidden" name="id" value="1" />
                  <input type="hidden" name="name" value="Lemonade" />
                  <input type="hidden" name="price" value="0.50" />
                  <input type="text" name="quantity" class="form-control" value="1" />
                  <input type="submit" name="add_item" class="btn btn-warning mt-1" value="Add to cart" />
               </div>
            </form>
         </div>
         <div class="card col-sm-4 col-md-3">
            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <img class="card-img-top img-responsive" src="images/rootbeer.png" alt="">
               <div class="card-body">
                  <h4 class="card-title">Root Beer</h4>
                  <p class="card-text">$0.75</p>
                  <input type="hidden" name="id" value="2" />
                  <input type="hidden" name="name" value="Root Beer" />
                  <input type="hidden" name="price" value="0.75" />
                  <input type="text" name="quantity" class="form-control" value="1" />
                  <input type="submit" name="add_item" class="btn btn-warning mt-1" value="Add to cart" />
               </div>
            </form>
         </div>
         <div class="card col-sm-4 col-md-3">
            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <img class="card-img-top img-responsive" src="images/orangejuice.png" alt="">
               <div class="card-body">
                  <h4 class="card-title">Orange Juice</h4>
                  <p class="card-text">$1.00</p>
                  <input type="hidden" name="id" value="3" />
                  <input type="hidden" name="name" value="Orange Juice" />
                  <input type="hidden" name="price" value="1.00" />
                  <input type="text" name="quantity" class="form-control" value="1" />
                  <input type="submit" name="add_item" class="btn btn-warning mt-1" value="Add to cart" />
               </div>
            </form>
         </div>
         <div class="card col-sm-4 col-md-3">
            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <img class="card-img-top img-responsive" src="images/hotchocolate.png" alt="">
               <div class="card-body">
                  <h4 class="card-title">Hot Chocolate</h4>
                  <p class="card-text">$1.50</p>
                  <input type="hidden" name="id" value="4" />
                  <input type="hidden" name="name" value="Hot Chocolate" />
                  <input type="hidden" name="price" value="1.50" />
                  <input type="text" name="quantity" class="form-control" value="1" />
                  <input type="submit" name="add_item" class="btn btn-warning mt-1" value="Add to cart" />
               </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>