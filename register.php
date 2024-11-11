<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput") {
        echo "<h3>Fill in all fields!</h3>";
    }
    if($_GET["error"] == "registertologin") {
        echo "<h3>Register first!</h3>";
    }
    else if ($_GET['error'] == "wronglogin") {
        echo "<h3>Incorrect login information!</h3>";
    }
    else if ($_GET['error'] == "invalidusername") {
        echo "<h3>Choose a proper username!</h3>";
    }
    else if ($_GET['error'] == "invalidemail") {
        echo "<h3>Your email format is wrong!</h3>";
    }
    else if ($_GET['error'] == "passwordmismatch") {
        echo "<h3>Password doesn't match!</h3>";
    }
    else if ($_GET['error'] == "admin") {
        echo "<h3>You have registered as an Admin!</h3>";
    }
    else if ($_GET['error'] == "editor") {
        echo "<h3>You have registered as an Editor!</h3>";
    }
    else if ($_GET['error'] == "emptyrole") {
        echo "<h3>You have not selected role!</h3>";
    }
}
?>

<?php echo'
    <div class="login-form">
        <img src="'.DRL.'images/about1.jpg" alt="">
        <h2>Registration form</h2>
        <form method="post" action="'.userRegister($conn).'" enctype="multipart/form-data">
            <div class="login-details">
                <input type="text" name="user_name" value="" placeholder="Your Username" autocomplete="off">
                <input type="text" name="user_email" value="" placeholder="Your Email" autocomplete="off">
                <select type="text" name="user_role">
                    <option value="" selected disabled>Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Editor">Editor</option>
                    <option value="Users">Users</option>
                </select>
                <input type="password" name="user_password" value="" placeholder="Your Password" autocomplete="off">
                <input type="password" name="confirm_password" value="" placeholder="confirm Password" autocomplete="off">
                <input type="file" name="user_image" value="">
                <input type="submit" name="user_register" value="Register">
                <p><small>Already have an account? </small><a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</div>';