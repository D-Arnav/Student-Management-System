<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="login-box">
        <form action="auth.php" method="post">
            <h3>Login Here</h3>

            <label for="username">Username</label>
            <input type="text" placeholder="" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" placeholder="" id="password" name="password">
            <?php echo isset($_GET['link']) ? "<p class='error'>Username or password is incorrect</p>" : "<p class='error'>&nbsp;</p>";?>

            <input type="submit" value="Login" id="submit">
            <a href="forgot.php" id="forgot">Forgot Password</a>
            <a href="register.php" id="register">Register</a>
        </form>
    </div>
</body>
<style>
    form *{
        font-family: 'Poppins',sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3{
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
    }

    form label{
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    form input{
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255,255,255,0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }
    
    .login-box{
        height: 520px;
        width: 400px;
        background-color: rgba(255,255,255,0.13);
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.1);
        box-shadow: 0 0 40px rgba(8,7,16,0.6);
        padding: 50px 35px; 
    }

    form a{
        display: inline-block;
        height: 35px;
        width: 150px;
        background-color: rgba(255,255,255,0.27);
        border-radius: 3px;
        text-align: center;
        line-height: 35px;
        font-size: 14px;
        font-weight: 400;
        text-decoration: none;
        color: #ffffff;
        margin-top: 20px;
    }

    #forgot{
        float: right;
    }

    #register{
        float: left;
    }

    #submit{
        margin-top: 40px;
        width: 100%;
        background-color: #ccd6f6;
        color: #080710;
        padding: 5px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }

    .error{
        font-size: 14px;
        font-weight: 400;
        color: #ff3333;
        margin-top: 10px;
    }
</style>
</html>