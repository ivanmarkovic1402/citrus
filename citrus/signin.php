<?php
    include ('inc.php');
    include ('parts/header.php');
    include ('parts/navbar.php');

?>

<div class="container">
    <div class="offset-md-4 col-md-4">
        <div class="form-group">
            <form action="processing/processingLogin.php" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                <button type="submit" class="btn btn-success" name="btnSubmit">Sign In</button>
            </form>
        </div>
    </div>    
</div>