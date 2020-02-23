<?php

/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 17/02/2020
 * Time: 09:42 PM
 */
$user = htmlspecialchars($_POST['user']);
$pass = htmlspecialchars($_POST['password']);
$verifypass = htmlspecialchars($_POST['verifypassword']);

$regex = "/^(?=.*\d).{7,}$/";

$valid_password = preg_match($regex, $pass);

if ($valid_password) {

    if ($user == "" or $pass == "") {
        header("Location: singup.php?answer=-1");
        die();
    }
    if ($pass != $verifypass) {
        header("Location: singup.php?answer=-2");
        die();
    }

    include('connectDB.php');
    $conn = get_db();

    try
    {
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $query = $conn->prepare("insert into public.userslogin(use_username,use_password) values(:user,:password)");
    $query->bindValue(':user', $user, PDO::PARAM_STR);
    $query->bindValue(':password', $passHash, PDO::PARAM_STR);
    $query->execute();


    }
    catch (Exception $ex)
    {
        header("Location: singup.php");
        /**
        echo "Error with DB. Details: $ex";
        */
        die();
    }

    session_start();
    $_SESSION['myusername'] = $user;
    header("Location: index.php");

} else {
    header("Location: singup.php?answer=-3");
    die();
}