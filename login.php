<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput") {
        echo "<h3>Fill in all fields!</h3>";
    }
    if($_GET["error"] == "registertologin") {
        echo "<h3>There was a problem logging in. Check your username and password or click register below to create an account!</h3>";
    }
    else if ($_GET['error'] == "wronglogin") {
        echo "<h3>Incorrect login information!</h3>";
    }
    else if ($_GET['error'] == "none") {
        echo "<h3>You have Registered successfully, Login to continue!</h3>";
    }
    else if ($_GET['error'] == "wrongdetails") {
        echo "<h3>Wrong details! Check your credentials and try again!</h3>";
    }
    else if ($_GET['error'] == "wrongpass") {
        echo "<h3>Wrong password!</h3>";
    }
}
?>

<?php echo'<div class="login-form">
        <img src="'.DRL.'images/about1.jpg" alt="">
        <h2>Login form</h2>
        <form method="post" action="'.userLogin($conn).'" enctype="multipart/form-data">
            <div class="login-details">
                <input type="text" name="user_name" value="" placeholder="username" autocomplete="off">
                <input type="password" name="user_password" value="" placeholder="password" autocomplete="off">
                <input type="submit" name="user_login" value="Login">
                <p><small>Don\'t have an account? </small><a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</div>';?>