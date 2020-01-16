<nav id="navigation" class="navbar sticky-top navbar-expand-sm bg-primary navbar-dark">
   <ul class="navbar-nav">
      <li class="nav-item <?php if ($thisPage == "Home") echo " active"; ?>"><a class="nav-link" href="index.php">Home</a></li>
      <li class="nav-item <?php if ($thisPage == "Prove Assignments") echo " active"; ?>"><a class="nav-link" href="proveAssign.php">Prove Assignments</a></li>
      <li class="nav-item <?php if ($thisPage == "Teach Assignments") echo " active"; ?>"><a class="nav-link" href="teachAssign.php">Teach Assignments</a></li>
   </ul>
</nav>