<?php
session_start();
if(isset($_SESSION['myusername']))
{
    $username = $_SESSION['myusername'];
}
else
{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Welcome <?php echo $username; ?><h1>
<h3><a href="logout.php">LOGOUT</a><h3>
</body>
</html>