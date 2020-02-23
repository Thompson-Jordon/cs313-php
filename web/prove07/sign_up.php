<?php
$password_is_invalid = false;

// if (isset($_GET['answer'])) {
//     $answer = $_GET['answer'];
//     if ($answer == -1) {
//         echo '<script>alert("Please fill in all fields");</script>';
//     } else
//     if ($answer == -2) {
//         echo '<script>alert("Passwords do not match");</script>';
//     } elseif ($answer == -3) {
//         $password_is_invalid = true;
//     }
// }

?>
<!DOCTYPE html>
<html>

<head lang="en">
    <?php require(".././util/def_library.php"); ?>
    <title>Work Order Registration</title>
</head>

<body>
    <div id="register" class="container pt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h3 class="text-center text-info">Work Order Registration</h3>
                    <form method="post" action="register.php">
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fname" class="text-info">First Name:</label><br>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="text-info">Last Name:</label><br>
                            <input type="text" name="lname" id="lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br><span class="error"></span>
                            <input type="password" name="password" id="password" class="form-control" required onkeypress="submitCheck(this.value)">
                        </div>
                        <div class="form-group required-field">
                            <label for="verify" class="text-info">Verify Password:</label><br><span class="error"></span>
                            <input type="password" name="verify" id="verifypassword" class="form-control" required onkeypress='passwordsMatch(document.getElementById("password").value, this.value)'>
                        </div> 
                        <br>
                        <input id="submit" type="submit" name="register" class="btn btn-info btn-md" value="Sign Up">
                        <a href="index.php"><input type="button" class="btn btn-secondary btn-md" value="Cancel"></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>