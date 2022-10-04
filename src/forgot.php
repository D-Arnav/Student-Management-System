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
    <div class="transparent-box" style="height:330px">
        <form action="verify.php?type=forgot" method="post">
            <h3>Forgot Password</h3>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">

            <input type="submit" value="Send Email" class="submit">
        </form>
    </div>
</body>
</html>