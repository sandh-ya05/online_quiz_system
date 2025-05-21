<?php
include "../connect.php";
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <style>
         body  {
            max-width: 500px;
            margin: 0 auto;
            background:#ccc;
            padding: 50px;
            border-radius: 15px;
}
                

.error-pagewrap {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.error-page-int {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 10 5px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
}

.header h3 {
    font-size: 25px;
    margin-bottom: 30px;
    text-align: center;
}

.login-body {
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.control-label {
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.btn-success {
    background-color: #5cb85c;
    color: #fff;
}

.btn-default {
    background-color: #fff;
    color: #333;
    margin-left: 10px;
}

.alert {
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
}

.alert-danger {
    background-color: #f2dede;
    color: #a94442;
    border: 1px solid #ebccd1;
}

        </style>
    </head>
    <body>
        <div class="error-pagewrap">
            <div class="error-page-int">
                <div class="header">
                    <h3>Admin Login</h3>
                </div>
                <div class="content-error">
                    <div class="hpanel">
                        <div class="login-body">
                        <form name="form1" action="" method="POST">
                        <div class="form-group">
                            <label>Username</label><br>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                            <div class="form-group">
                                <label>Password</label><br>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                       <br> <div class="alert alert-danger" id="errormsg" style="margin-top:10px; display:none">
  <strong>INVALID</strong> Username or Password  
</div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
<?php
if (isset($_POST["submit1"])) {
    // Initialize count and sanitize input
    $count = 0;
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);

    // Query the database to check the login credentials
    $res = mysqli_query($link, "SELECT * FROM admin_login WHERE username='$username' AND password='$password'");
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        // Display error message if credentials are incorrect
        ?>
        <script type="text/javascript">
            document.getElementById("errormsg").style.display = "block";
        </script>
        <?php
    } else {
        // Set session variables
        $_SESSION["username"] = $username;
        $_SESSION["accesstime"] = time(); // Setting access time as a session variable

        // Set cookies that expire in 1 hour
        setcookie("username", $username, time() + 3600, "/"); // Set cookie for username
        setcookie("accesstime", time(), time() + 3600, "/"); // Set cookie for access time

        // Redirect to demo.php
        ?>
        <script type="text/javascript">
            window.location = "demo.php";
        </script>
        <?php
    }
}
?>
