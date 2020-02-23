<?php
$thisPage = "Profile";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php require(".././util/def_library.php"); ?>
   <title>Change Password</title>
</head>

<body class="bg-secondary">
   <?php require("nav.php"); ?>
   <div class="container-sm border-info rounded bg-light py-3">
      <form action="change_password.php" method="post">
         <div class="form-group">
            <label for="old_pword">Enter Current Password</label>
            <input type="text" class="form-control" name="old_pword">
         </div>
         <div class="form-group">
            <label for="new_pword1">Enter New Password</label>
            <input type="text" class="form-control" name="new_pword1">
         </div>
         <div class="form-group">
            <input type="text" class="form-control" name="new_pword2">
         </div>
         <input type="submit" class="btn btn-info" value="Submit">
      </form>
   </div>
   <script src="app.js"></script>
</body>

</html>