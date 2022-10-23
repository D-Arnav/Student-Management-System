
<!-- 
    Path: src\auth.php
    Compare this snippet from src\index.php
-->

<?php
    // Check if the username and password match the database
    // If so, redirect to the welcome.php page, otherwise, redirect to the index.php page
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create connection to the database
    $conn = mysqli_connect("localhost","root","","student management");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Check if the username and password match the database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if($row){
        header("Location: welcome.php");
    }else{
        header("Location: index.php?link=error");
    }
?>