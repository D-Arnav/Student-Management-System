<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/background.js" defer></script>
</head>
<body>
    <a href="index.php" class="back">Back</a>
    <div class="transparent-box" style="height:490px">
        <form action="index.php?link=success" method="post">
            <h3>New Password Here</h3>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <label for="password">Confirm Password</label>
            <input type="password" id="password-cf" name="password-cf">
            <?php echo "<p>&nbsp;</p>"?>

            <input type="submit" value="Confirm" class="submit">
        </form>
    </div>
</body>
</html>

<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordcf = $_POST['password-cf'];
    $email = $_POST['email'];

    $conn = mysqli_connect("localhost", "root", "", "login");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['username'] == $username && $row['email'] == $email) {
        if ($password == $passwordcf) {
            $sql = "UPDATE users SET password='$password' WHERE username='$username' AND email='$email'";
            $result = mysqli_query($conn, $sql);
            header("Location: index.php?link=success");
        } else {
            echo "Password does not match";
        }
    } else {
        echo "Username or Email is incorrect";
    }
?>