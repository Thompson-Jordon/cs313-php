<?php
if(isset($_GET['answer']))
{
    $answer = $_GET['answer'];
    if($answer == -1)
    {
        echo '<script>alert("incorrect username/password");</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Login page</h1>
<form method="post" action="<?php echo htmlspecialchars('verifyuser.php'); ?>">
    User:<br>
    <input type="text" name="user"><br>
    Password:<br>
    <input type="password" name="password"><br>
    <a href="singup.php">¿Don't have an account? <b>Sign up here!</b></a><br>
    <input type="submit" value="LOGIN">
</form>
</body>
</html>