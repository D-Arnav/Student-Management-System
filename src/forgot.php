<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/background.js" defer></script>
</head>
<body>
    <a href="index.php" class="back">Back</a>
    <div class="transparent-box" style="height:670px">
        <form action="change.php" method="post">
            <h3>Forgot Password</h3>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">

            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">New Password</label>
            <input type="password" id="password" name="password">

            <label for="password">Confirm Password</label>
            <input type="password" id="password-cf" name="password-cf">
            
            <?php
                if (isset($_GET['link']) && $_GET['link'] == 'fail') {
                    echo "<p class='error'>Account does not exist</p>";
                } else if (isset($_GET['link']) && $_GET['link'] == 'error') {
                    echo "<p class='error'>Passwords do not match</p>";
                } else {
                    echo "<p class='error'>&nbsp;</p>";
                }
            ?>
            <input type="submit" value="Reset Password" class="submit">
        </form>
    </div>
</body>
</html>