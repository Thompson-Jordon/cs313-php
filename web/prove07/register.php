<?php
   // This is here for some future thime. 
   // https://www.youtube.com/watch?v=Pz5CbLqdGwM
   if (isset($_POST['register'])) {
      // Set session variables 
      $email = htmlspecialchars($_POST['email']);
      $username = htmlspecialchars($_POST['username']);
      $name = htmlspecialchars($_POST['name']);
      $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT));
      $hash = htmlspecialchars(md5(rand(0, 1000)));

      $_SESSION['username'] = $username;
      $_SESSION['name'] = $name;

      // Check to see if user exists
      // $check = $db->prepare('SELECT * FROM account WHERE email=:email');
      // $check->bindValue(':email', $email, PDO::PARAM_STR);
      // $check->execute();
      // $result = $check->fetchAll(PDO::FETCH_ASSOC);
      $result = $db->query('SELECT * FROM account WHERE email=:email');

      // check to see if there is any data
      if ($result->num_rows > 0) {
         $_SESSION['message'] = 'User with this email already exists!';
         header("location: error.php");
      } else {
         $stmt = $db->prepare('INSERT INTO account (email, username, display_name, password, hash) VALUES (:email, :username, :name, :password, :hash)');
         $stmt->bindValue(':email', $email, PDO::PARAM_STR);
         $stmt->bindValue(':username', $username, PDO::PARAM_STR);
         $stmt->bindValue(':name', $name, PDO::PARAM_STR);
         $stmt->bindValue(':password', $password, PDO::PARAM_STR);
         $stmt->bindValue(':hash', $hash, PDO::PARAM_STR);
         $stmt->execute();
      }
   }

?>