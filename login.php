<?php
session_start();
    include 'connect.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login page</title>
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
                    <h3>Login Form</h3>
                </div>
                <div class="content-error">
                    <div class="hpanel">
                        <div class="login-body">
                            <form action="" name="form" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="username">Username</label>
                                    <input type="text" name="username" placeholder="Username" title="Please enter your username" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password" title="Please enter your password" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-success btn-lock loginbtn">Login</button>
                                <a class="btn btn-default btn-lock" href="register.php">Register</a>
                                <div class="alert alert-danger" id="failed" style="margin-top:10px; display:none;">
                                    <strong>Doesnot Match!</strong> Invalid Username or Password.
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    if (isset($_POST['login'])) {
        $count = 0;

        
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        
        $query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
        $res = mysqli_query($link, $query);
        $count = mysqli_num_rows($res);

        if ($count == 0) {
            ?>
            <script type="text/javascript">
                document.getElementById("failed").style.display = "block";
            </script>
            <?php
        } else {
            // Set session variables
            $_SESSION["username"] = $username;
            $_SESSION["accesstime"] = time(); // Setting access time as session variable

            // Set cookie that expires in 1 hour
            setcookie("username", $username, time() + 3600, "/"); // Cookie for username
            setcookie("accesstime", time(), time() + 3600, "/"); // Cookie for access time

            // Redirect to select_exam.php
            ?>
            <script type="text/javascript">
                window.location = "select_exam.php";
            </script>
            <?php
        }
    }
?>
</body>
</html>
