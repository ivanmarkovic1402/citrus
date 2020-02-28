<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="index.php">CITRUS</a>
  <div class="form-inline">
        <div class="login-btn">
            <?php 
            if(!isset($_SESSION['user'])){
                echo "<a href='signin.php' class='btn btn-outline-primary my-2 my-sm-0'>Login</a>";
            }else{
                echo "<a href='adminpanel.php' class='btn btn-outline-primary my-2 my-sm-0'>Admin Panel</a>";
                echo "<a href='logout.php' class='btn btn-outline-primary my-2 my-sm-0'>Logout</a>";
            }
            ?>
        </div>

  </div>
</nav>
