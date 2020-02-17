<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION = ['logged_in'] == false) {
   header("Location: index.php");
}
?>

<nav id="navigation" class="navbar sticky-top navbar-expand-sm bg-info navbar-dark">
   <ul class="navbar-nav">
      <li class="nav-item <?php if ($thisPage == "Work Order") echo " active"; ?>"><a class="nav-link" href="workorder.php">Work Orders</a></li>
      <li class="nav-item <?php if ($thisPage == "Locations") echo " active"; ?>"><a class="nav-link" href="locations.php">Locations</a></li>
   </ul>
   <ul class="navbar-nav flex-row ml-md-auto">
      <li class="nav-item <?php if ($thisPage == "Home") echo " active"; ?>"><a class="nav-link" href=".././index.php">CS 313 Home</a></li>
      <form action="index.php" method="post">
         <li class="nav-item">
            <input type="submit" name="logout" value="Logout" class="btn btn-secondary">
         </li>
      </form>
   </ul>
</nav>