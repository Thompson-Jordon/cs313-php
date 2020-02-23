<?php
session_start();

$fname = htmlspecialchars($_SESSION['first_name']);
$lname = htmlspecialchars($_SESSION['last_name']);

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
   header("Location: index.php");
}
?>

<nav id="navigation" class="navbar sticky-top navbar-expand-sm bg-info navbar-dark">
   <ul class="navbar-nav">
      <li class="nav-item <?php if ($thisPage == "Work Order") echo " active"; ?>"><a class="nav-link" href="workorder.php">Work Orders</a></li>
      <li class="nav-item <?php if ($thisPage == "Locations") echo " active"; ?>"><a class="nav-link" href="locations.php">Locations</a></li>
   </ul>
   <ul class="navbar-nav flex-row ml-md-auto">
      <li class="nav-item dropdown <?php if ($thisPage == "Profile") echo " active"; ?>">
         <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $fname . " " . $lname; ?></a>
         <!-- <div class="dropdown-menu">
            <a class="dropdown-item" href="change_password.php">Change Password</a>
            <?php if ($_SESSION['is_admin'] == true) { ?>
               <a class="dropdown-item" href="user.php">Users</a>
            <?php } ?>
         </div> -->
      </li>
      <form action="index.php" method="post">
         <li class="nav-item">
            <input type="submit" name="logout" value="Logout" class="btn btn-light">
         </li>
      </form>
   </ul>
</nav>