<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_cf = $_POST['password-cf'];
    $email = $_POST['email'];

    if ($password != $password_cf) {
        header("Location: register.php?link=error");
    } else {
        $conn = mysqli_connect("localhost", "root", "", "login");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['username'] == $username) {
            header("Location: register.php?link=exists");
        } else {
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            $result = mysqli_query($conn, $sql);
            header("Location: index.php?link=success&$password=$password_cf");
        }
    }
?>