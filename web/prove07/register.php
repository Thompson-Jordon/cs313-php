<?php
require('connectdb.php');
$db = get_db();

// This is here for some future thime. 
// https://www.youtube.com/watch?v=Pz5CbLqdGwM
if (isset($_POST['register'])) {
   // Set session variables 
   $username = htmlspecialchars($_POST['username']);
   $fname = htmlspecialchars($_POST['fname']);
   $lname = htmlspecialchars($_POST['lname']);
   $password = htmlspecialchars($_POST['password']);
   $verify = htmlspecialchars($_POST['verify']);

   // check to see if passwords match
   if ($password == $verify) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
   } else {
      echo "<script>alert('Passwords do not match!');</script>";
      header("Location: sign_up.php");
      die();
   }

   try {
      // Check to see if user exists
      $qry = $db->prepare("SELECT username FROM account WHERE username=:username");
      $qry->bindValue(':username', $username, PDO::PARAM_STR);
      $qry->execute();
   } catch (PDOException $ex) {
      echo "Error: $ex";
   }
   echo "after check user";
   // check to see if there is any data
   if ($qry->rowCount() > 0) {
      echo "<script>alert('User Already Exists');</script>";
      header("Location: sign_up.php");
      die();
   } else {
      try {
         echo "In add user statement";
         $stmt = $db->prepare('INSERT INTO account (username, password, first_name, last_name, is_admin, is_active) VALUES (:username, :password, :fname, :lname, false, true)');
         $stmt->bindValue(':username', $username, PDO::PARAM_STR);
         $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
         $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
         $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
         $stmt->execute();
      } catch (PDOException $ex) {
         echo "Error: $ex";
         die();
      }
      // get user id
      $getID = $db->prepare("SELECT id, is_admin FROM account WHERE username=:username");
      $getID->bindValue(':username', $username, PDO::PARAM_STR);
      $getID->execute();
      $row = $getID->fetch(PDO::FETCH_ASSOC);

      // Set session vars
      $_SESSION['username'] = $username;
      $_SESSION['first_name'] = $fname;
      $_SESSION['last_name'] = $lname;
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['is_admin'] = $row['is_admin'];

      // set state to logged_in
      $_SESSION['logged_in'] = true;

      // go to workorder page
      header("Location: workorder.php");
   }
}
