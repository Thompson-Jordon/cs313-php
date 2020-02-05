<?php
// try
// {
//    $user = 'postgres';
//    $password = 'Subbay89';
//    $db = new PDO('pgsql:host=localhost;dbname=myTestDB', $user, $password);
// 
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch (PDOException $ex)
// {
//    echo 'Error: ' . $ex->getMessage();
//    die();
// }
// 
// 
// echo $db;
try 
{
   $dbURL = getenv('DATABASE_URL');

   $dbOpts = parse_url($dbUrl);

   $dbHost = $dbOpts["host"];
   $dbPort = $dbOpts["port"];
   $dbUser = $dbOpts["user"];
   $dbPassword = $dbOpts["pass"];
   $dbName = ltrim($dbOpts["path"],'/');
 
   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
 
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch (PDOException $ex)
 {
   echo 'Error!: ' . $ex->getMessage();
   die();
 }

?>