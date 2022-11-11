<?php
    // Get the data from the ajax request
    $students = $_POST['students'];
    $date = date("Y-m-d");

    // Create connection to the database
    $conn = mysqli_connect("localhost","root","","student management");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if attendance already exists for the date
    $query = "SELECT * FROM attendance WHERE attendance_date = '$date'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if($row){
        echo "Attendance already exists for the date";
    } else {

        // Insert the attendance into the database
        foreach($students as $student){
            $roll_no = $student['roll_no'];
            $attendance = $student['attendance'];
            $query = "INSERT INTO attendance (roll_no, attendance_date, attendance_status) VALUES ('$roll_no', '$date', '$attendance')";
            $result = mysqli_query($conn, $query);
        }
        echo "Attendance submitted successfully";
    }
?>