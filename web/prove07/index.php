<?php
session_start();

// check to see if post contains logout
if (isset($_POST['logout'])) {
   unset($_SESSION['logged_in']);
}

// If already logged in go to wo page
if (isset($_SESSION['logged_in']) && $_SESSION = ['logged_in'] == true && !isset($_POST['logout'])) {
   header("Location: workorder.php");
   die();
}

// get database
require('connectdb.php');
$db = get_db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['login'])) {
      //set variables

      $username = htmlspecialchars($_POST['username']);
      $password = htmlspecialchars($_POST['password']);

      try {
         $stmt = $db->prepare("SELECT id, username, password, first_name, last_name, is_admin FROM account WHERE username=:username");
         $stmt->bindValue(':username', $username, PDO::PARAM_STR);
         $stmt->execute();

         if ($stmt->rowCount() == 0 && !password_verify($password, $user['password'])) { // User doesn't exist
            // CREATE AN ERROR MESSAGE
            $message = "Username or password is incorrect!";
            echo "<script type='text/javascript'>alert('$message');</script>";
         } else { // User exists
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set session vars
            $_SESSION['username'] = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['is_admin'];

            // set state to logged_in
            $_SESSION['logged_in'] = true;

            // go to workorder page
            header("Location: workorder.php");
         }
      } catch (PDOException $ex) {
         echo "Error with DB. Details: $ex";
         die();
      }
   }
}

?>
<!DOCTYPE html>
<html>

<head>
   <?php require(".././util/def_library.php"); ?>
   <title>Work Order Login</title>
</head>

<body>
   <div id="login" class="container pt-5">
      <div id="login-row" class="row justify-content-center align-items-center">
         <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
               <form id="login-form" class="form" action="index.php" method="post">
                  <h3 class="text-center text-info">Work Order Login</h3>
                  <div class="form-group">
                     <label for="username" class="text-info">Username:</label><br>
                     <input type="text" name="username" id="username" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="password" class="text-info">Password:</label><br>
                     <input type="password" name="password" id="password" class="form-control" required>
                  </div>
                  <div id="register-link" class="text-right">
                     <a href="sign_up.php" class="text-info">Register here</a>
                  </div>
                  <div class="form-group">
                     <input type="submit" name="login" class="btn btn-info btn-md" value="Login">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>