<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_cf = $_POST['password-cf'];
    $email = $_POST['email'];
    
    if ($password != $password_cf) {
        header("Location: forgot.php?link=error");
    } else {
        $conn = mysqli_connect("localhost", "root", "", "login");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['username'] == $username && $row['email'] == $email && $password == $password_cf) {
            $sql = "UPDATE users SET password='$password' WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            header("Location: index.php?link=success");
        } else {
            header("Location: forgot.php?link=fail");
        }
    }
?>