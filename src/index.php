<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/background.js" defer></script>
</head>
<body>
    <div class="transparent-box">
        <form action="auth.php" method="post">
            <h3>Login Here</h3>

            <label for="username">Username</label>
            <input type="text" placeholder="" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" placeholder="" id="password" name="password">
            <?php echo isset($_GET['link']) ? "<p class='error'>Username or password is incorrect</p>" : "<p class='error'>&nbsp;</p>";?>

            <input type="submit" value="Login" class="submit">
            <a href="forgot.php" id="forgot">Forgot Password</a>
            <a href="register.php" id="register">Register</a>
        </form>
    </div>
</body>
<style>
    #forgot{
        float: right;
    }
    #register{
        float: left;
    }
    .error{
        font-size: 14px;
        font-weight: 400;
        color: #ff3333;
        margin-top: 10px;
    }
</style>
</html>