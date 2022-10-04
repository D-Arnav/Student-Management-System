<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/background.js" defer></script>
</head>
<body>
    <a href="index.php" class="back">Back</a>
    <div class="transparent-box" style="height:650px">
        <form action="verify.php?type=register" method="post">
            <h3>Register Here</h3>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <label for="password">Confirm Password</label>
            <input type="password" id="password-cf" name="password-cf">

            <label for="email">Email</label>
            <input type="email" id="email" name="email">

            <input type="submit" value="Send Email" class="submit">
        </form>
    </div>
</body>
</html>