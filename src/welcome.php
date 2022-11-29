<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src="js/background.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <img src="img/hex.png" alt="hexagon" class="hexagon" width="32px" height="32px">
        <div class="welcome-message">
            Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';?>
            <div class="account-type">
                <?php echo isset($_SESSION['type']) ? $_SESSION['type'] : 'Guest';?> Account
            </div>
        </div>
        <a class="logout" href="index.php">Logout</a>
    </div>
    <div class="link-box-container">
        <a class="link-box" href="student.php">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="external-link"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" font-family="none" font-size="none"
                                      stroke="none" stroke-dasharray=""
                                      stroke-dashoffset="0" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                      stroke-width="1" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M114.9175,0c-1.89469,0.17469 -3.29219,1.86781 -3.1175,3.7625c0.17469,1.89469 1.86781,3.29219 3.7625,3.1175h44.6125l-71.81,71.9175c-1.02125,0.83313 -1.49156,2.16344 -1.19594,3.45344c0.29562,1.27656 1.30344,2.28438 2.58,2.58c1.29,0.29563 2.62031,-0.17469 3.45344,-1.19594l71.9175,-71.81v44.6125c-0.01344,1.23625 0.63156,2.39188 1.70656,3.02344c1.075,0.61813 2.39187,0.61813 3.46687,0c1.075,-0.63156 1.72,-1.78719 1.70656,-3.02344v-56.4375h-56.4375c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM6.88,34.4c-1.80062,0 -3.64156,0.63156 -4.945,1.935c-1.30344,1.30344 -1.935,3.14438 -1.935,4.945v123.84c0,1.80063 0.63156,3.64156 1.935,4.945c1.30344,1.30344 3.14438,1.935 4.945,1.935h123.84c1.80063,0 3.64156,-0.63156 4.945,-1.935c1.30344,-1.30344 1.935,-3.14437 1.935,-4.945v-103.2c0.01344,-1.23625 -0.63156,-2.39187 -1.70656,-3.02344c-1.075,-0.61813 -2.39187,-0.61813 -3.46687,0c-1.075,0.63156 -1.72,1.78719 -1.70656,3.02344v103.2h-123.84v-123.84h103.2c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656z"></path></g></g></svg>
            <h2>Student Details</h2>
            <h4>
                Get the all details of a particular student. Search by name or roll number.
            </h4>
        </a>
        <a class="link-box" href="class.php">
             <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="external-link"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" font-family="none" font-size="none"
                                      stroke="none" stroke-dasharray=""
                                      stroke-dashoffset="0" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                      stroke-width="1" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M114.9175,0c-1.89469,0.17469 -3.29219,1.86781 -3.1175,3.7625c0.17469,1.89469 1.86781,3.29219 3.7625,3.1175h44.6125l-71.81,71.9175c-1.02125,0.83313 -1.49156,2.16344 -1.19594,3.45344c0.29562,1.27656 1.30344,2.28438 2.58,2.58c1.29,0.29563 2.62031,-0.17469 3.45344,-1.19594l71.9175,-71.81v44.6125c-0.01344,1.23625 0.63156,2.39188 1.70656,3.02344c1.075,0.61813 2.39187,0.61813 3.46687,0c1.075,-0.63156 1.72,-1.78719 1.70656,-3.02344v-56.4375h-56.4375c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM6.88,34.4c-1.80062,0 -3.64156,0.63156 -4.945,1.935c-1.30344,1.30344 -1.935,3.14438 -1.935,4.945v123.84c0,1.80063 0.63156,3.64156 1.935,4.945c1.30344,1.30344 3.14438,1.935 4.945,1.935h123.84c1.80063,0 3.64156,-0.63156 4.945,-1.935c1.30344,-1.30344 1.935,-3.14437 1.935,-4.945v-103.2c0.01344,-1.23625 -0.63156,-2.39187 -1.70656,-3.02344c-1.075,-0.61813 -2.39187,-0.61813 -3.46687,0c-1.075,0.63156 -1.72,1.78719 -1.70656,3.02344v103.2h-123.84v-123.84h103.2c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656z"></path></g></g></svg>
            <h2>Class Details</h2>
            <h4>
                Get the statistics of the entire class such as CGPA, Assignment submissions and Attendance
            </h4>
        </a>
        <a class="link-box" href="assignment.php">
             <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="external-link"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" font-family="none" font-size="none"
                                      stroke="none" stroke-dasharray=""
                                      stroke-dashoffset="0" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                      stroke-width="1" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M114.9175,0c-1.89469,0.17469 -3.29219,1.86781 -3.1175,3.7625c0.17469,1.89469 1.86781,3.29219 3.7625,3.1175h44.6125l-71.81,71.9175c-1.02125,0.83313 -1.49156,2.16344 -1.19594,3.45344c0.29562,1.27656 1.30344,2.28438 2.58,2.58c1.29,0.29563 2.62031,-0.17469 3.45344,-1.19594l71.9175,-71.81v44.6125c-0.01344,1.23625 0.63156,2.39188 1.70656,3.02344c1.075,0.61813 2.39187,0.61813 3.46687,0c1.075,-0.63156 1.72,-1.78719 1.70656,-3.02344v-56.4375h-56.4375c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM6.88,34.4c-1.80062,0 -3.64156,0.63156 -4.945,1.935c-1.30344,1.30344 -1.935,3.14438 -1.935,4.945v123.84c0,1.80063 0.63156,3.64156 1.935,4.945c1.30344,1.30344 3.14438,1.935 4.945,1.935h123.84c1.80063,0 3.64156,-0.63156 4.945,-1.935c1.30344,-1.30344 1.935,-3.14437 1.935,-4.945v-103.2c0.01344,-1.23625 -0.63156,-2.39187 -1.70656,-3.02344c-1.075,-0.61813 -2.39187,-0.61813 -3.46687,0c-1.075,0.63156 -1.72,1.78719 -1.70656,3.02344v103.2h-123.84v-123.84h103.2c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656z"></path></g></g></svg>
            <h2>Assignments</h2>
            <h4>
                Create Assignments and set the deadlines, Enter questions and deadline, and click on Submit to start the Assignment.
            </h4>
        </a>
        <a class="link-box" href="attendance.php">
             <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="external-link"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" font-family="none" font-size="none"
                                      stroke="none" stroke-dasharray=""
                                      stroke-dashoffset="0" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                      stroke-width="1" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M114.9175,0c-1.89469,0.17469 -3.29219,1.86781 -3.1175,3.7625c0.17469,1.89469 1.86781,3.29219 3.7625,3.1175h44.6125l-71.81,71.9175c-1.02125,0.83313 -1.49156,2.16344 -1.19594,3.45344c0.29562,1.27656 1.30344,2.28438 2.58,2.58c1.29,0.29563 2.62031,-0.17469 3.45344,-1.19594l71.9175,-71.81v44.6125c-0.01344,1.23625 0.63156,2.39188 1.70656,3.02344c1.075,0.61813 2.39187,0.61813 3.46687,0c1.075,-0.63156 1.72,-1.78719 1.70656,-3.02344v-56.4375h-56.4375c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM6.88,34.4c-1.80062,0 -3.64156,0.63156 -4.945,1.935c-1.30344,1.30344 -1.935,3.14438 -1.935,4.945v123.84c0,1.80063 0.63156,3.64156 1.935,4.945c1.30344,1.30344 3.14438,1.935 4.945,1.935h123.84c1.80063,0 3.64156,-0.63156 4.945,-1.935c1.30344,-1.30344 1.935,-3.14437 1.935,-4.945v-103.2c0.01344,-1.23625 -0.63156,-2.39187 -1.70656,-3.02344c-1.075,-0.61813 -2.39187,-0.61813 -3.46687,0c-1.075,0.63156 -1.72,1.78719 -1.70656,3.02344v103.2h-123.84v-123.84h103.2c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656z"></path></g></g></svg>
            <h2>Attendance</h2>
            <h4>
                Take attendance for the class. Enter roll numbers of students that are present or absent.
            </h4>
        </a>
    </div>
</body>
<style>
    *, *:before, *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Rubik', sans-serif;
    }
    body {
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
    }

    .link-box-container{
        width: 675px;
        height: 630px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .link-box{
        width: 320px;
        height: 300px;
        margin: 8px;
        float: left;
        background-color: rgba(23, 42, 70, 0.8);
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    .link-box:hover{
        cursor: pointer;
        transform: translateY(-5px);
        transition: all 0.2s ease-in-out;
        color: #60f1d2;
        background-color: #172a46;
    }

    .link-box:hover{
        color: #60f1d2;
    }

    .external-link{
        width: 30px;
        height: 30px;
        margin-top: 25px;
        margin-right: 30px;
        float: right;
    }
    
    .sidebar{
        width: 200px;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(23, 42, 70, 0.8);
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    .welcome-message{
        width: 100%;
        height: 60px;
        background-color: rgba(23, 42, 70, 0);
        color: #fff;
        text-align: center;
        padding-top: 20px;
    }

    .account-type{
        margin-top: 10px;
        font-size: 12px;
        color: #fff;
        text-decoration: underline;
    }

    .logout{
        width: 160px;
        height: 30px;
        border: 1px solid #60f1d2;
        border-radius: 5px;
        background-color: rgba(0,0,0,0);
        color: #60f1d2;
        text-align: center;
        line-height: 30px;
    }

    .logout:hover{
        cursor: pointer;
        background-color: rgba(96,241,210,0.1);
    }

    .hexagon{
        margin-left: 40%;
    }

    h2{
        font-size: 24px;
        font-weight: 10;
        margin-top: 27px;
    }

    h4{
        font-size: 15px;
        font-weight: 5;
        margin-top: 20px;
        margin-left: 25px;
        margin-right: 25px;
        text-justify: auto;
        text-align: left;
        color: white;
    }
</style>
</html>