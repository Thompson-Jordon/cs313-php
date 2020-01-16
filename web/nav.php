<nav id="navigation" class="navbar navbar-expand-sm bg-primary navbar-light">
   <ul class="navbar-nav">
      <li class="nav-item" <?php if ($thisPage == "Home") echo " id=\"currentpage\""; ?>><a class="nav-link" href="index.php">Home</a></li>
      <li class="nav-item" <?php if ($thisPage == "Teach Assignments") echo " id=\"currentpage\""; ?>><a class="nav-link" href="teachAssign.php">Teach Assignments</a></li>
      <li class="nav-item" <?php if ($thisPage == "Prove Assignments") echo " id=\"currentpage\""; ?>><a class="nav-link" href="proveAssign.php">Prove Assignments</a></li>
   </ul>
</nav>