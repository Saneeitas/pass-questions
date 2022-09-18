<nav class="navbar navbar-light rounded" style="background-color:white;">
    <div class="container-fluid">
        <a class="navbar-brand" style="color:#3b7fad;" href="index.php">
            <i class="fas fa-bars"></i>
        </a>
        <div class="d-flex">
            <?php
      if (isset($_SESSION["user"])) {
      ?>
            <a href="logout.php" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i> LOGOUT</a>
            <?php
      } else {
      ?>
            <a href="login.php" class="nav-link  m-1 text-dark">
                <i class="fas fa-sign-in-alt"></i> LOGIN</a>
                <br/>
            <a href="register.php" class="nav-link  m-1 text-dark">
                <i class="fas fa-sign-in-alt"></i> REGISTER </a>
            <?php
      }
      ?>
        </div>
    </div>
</nav>