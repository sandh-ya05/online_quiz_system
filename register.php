<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <style>
        body {
            max-width: 500px;
            margin: 0 auto;
            background: #ccc;
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
        input[type="password"],
        input[type="email"] {
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
            background-color: #5cb85c;
            color: #fff;
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

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="header">
                <h3>Register Form</h3>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="login-body">
                        <form action="" name="form1" method="post">
                            <div class="form-group">
                                <label class="control-label" for="firstname">First Name</label>
                                <input type="text" name="firstname" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="lastname">Last Name</label>
                                <input type="text" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" name="username" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label><br>
                                <input type="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" name="password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn">Register</button>
                            </div>
                            <div class="alert alert-success" id="success" style="margin-top:10px; display:none;">
                                <strong>Success!</strong> Account Registered Successfully.
                            </div>
                            <div class="alert alert-danger" id="failed" style="margin-top:10px; display:none;">
                                <strong>Already Exist</strong> The username or email is already taken.
                            </div>
                            <div class="alert alert-danger" id="validation_error" style="margin-top:10px; display:none;">
                                <strong>Error!</strong> <span id="validation_message"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);

        // Validate inputs
        $errors = [];

       

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must be greater than 8 characters.";
        }

        if (count($errors) > 0) {
            ?>
            <script type="text/javascript">
                document.getElementById("validation_error").style.display = "block";
                document.getElementById("validation_message").innerText = "<?php echo implode(' ', $errors); ?>";
            </script>
            <?php
        } else {
            $count = 0;
            $res = mysqli_query($link, "SELECT * FROM student WHERE username='$username' OR email='$email'") or die(mysqli_error($link));
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display = "none";
                    document.getElementById("failed").style.display = "block";
                </script>
                <?php
            } else {
                mysqli_query($link, "INSERT INTO student VALUES(NULL, '$firstname', '$lastname', '$username', '$email', '$password')");
                ?>
                <script type="text/javascript">
                    document.getElementById("failed").style.display = "none";
                    document.getElementById("success").style.display = "block";
                </script>
                <?php
            }
        }
    }
    ?>
</body>
</html>
