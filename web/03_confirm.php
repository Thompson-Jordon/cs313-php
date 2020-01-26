<?php
$thisPage = "";

session_start();

$name    = htmlspecialchars($_POST['name']);
$street  = htmlspecialchars($_POST['street']);
$city    = htmlspecialchars($_POST['city']);
$state   = htmlspecialchars($_POST['state']);
$zip     = htmlspecialchars($_POST['zip']);
$cart    = $_SESSION['cart'];
session_destroy();
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
         <a class="btn btn-primary float-right mr-3" href="03_browse.php">Continue Shopping</a>
         <h1 class="display-3">Drink Shack</h1>
         <p class="lead">Success!!</p>
         <hr class="my-2">
         <p>Your order has been confirmed.</p>
      </div>
      <div class="container table-responsive">
         <h1>Purchased Items</h1>
         <table class="table table-hover">
            <tr>
               <th>Item</th>
               <th>Quantity</th>
               <th>Price</th>
               <th>Total</th>
            </tr>
            <?php
            $total = 0;
            foreach ($cart as $item) {
               $total += ($item['quantity'] * $item['price']);
            ?>
               <tr>
                  <td><?php echo htmlspecialchars($item['name']); ?></td>
                  <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                  <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                  <td>$<?php echo number_format(($item['quantity'] * $item['price']), 2); ?></td>
               </tr>
            <?php } ?>
            <tr>
               <td></td>
               <td></td>
               <th>Total:</th>
               <td>$<?php echo number_format($total, 2); ?></td>
            </tr>
         </table>
      </div>
      <div class="container">
         <h1>Delivery Address</h1>
         <p>Your order will be shipped to:</p>
         <p>
         <?php echo $name; ?><br>
         <?php echo $street; ?><br>
         <?php echo $city; ?>, <?php echo $state; ?>
           <?php echo $zip; ?></p>
      </div>
   </div>

</body>

</html>