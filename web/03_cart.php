<?php
$thisPage = "";;

session_start();

if (filter_input(INPUT_GET, 'action') == 'delete') {
   foreach ($_SESSION['cart'] as $product) {
      // remove item from cart
      unset($_SESSION['cart'][$_GET['id']]);
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
      <div class="container">
         <a class="btn btn-primary float-right mr-3" href="03_browse.php">Back to Products</a>
         <h1 class="display-3">Drink Shack</h1>
         <p class="lead">Shopping Cart</p>
         <hr class="my-2">
         <p>Please review the following items.</p>
      </div>
      <div class="container table-responsive">
         <table class="table table-hover">
            <tr>
               <th>Item</th>
               <th>Quantity</th>
               <th>Price</th>
               <th>Total</th>
               <th>Remove Item</th>
            </tr>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
               $total += ($item['quantity'] * $item['price']);
            ?>
               <tr>
                  <td><?php echo $item['name']; ?></td>
                  <td><?php echo $item['quantity']; ?></td>
                  <td>$<?php echo $item['price']; ?></td>
                  <td>$<?php echo number_format(($item['quantity'] * $item['price']), 2); ?></td>
                  <td class="text-center">
                     <a href="03_cart.php?action=delete&id=<?php echo $item['id']; ?>">
                        <div class="btn btn-danger btn-sm">&#215</div>
                     </a>
                  </td>
               </tr>
            <?php } ?>
            <tr>
               <td></td>
               <td></td>
               <th>Total:</th>
               <td>$<?php echo number_format($total, 2); ?></td>
            </tr>
         </table>

         <a class="btn btn-primary" href="03_checkout.php">Checkout</a>
      </div>
   </div>
</body>

</html>