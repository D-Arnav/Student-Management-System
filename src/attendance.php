<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src="js/background.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        let students = <?php 
            $conn = mysqli_connect("localhost", "root", "", "student management");
            $sql = "SELECT * FROM student";
            $result = mysqli_query($conn, $sql);
            $students = array();
            while($row = mysqli_fetch_assoc($result)){
                $students[] = $row;
            }
            $roll_nos = array();
            foreach($students as $student){
                $roll_nos[] = array("roll_no" => $student["roll_no"], "attendance" => "A");
            }
            echo json_encode($roll_nos);
        ?>;

        // Everytime the search bar is changed, set the checkbox state to the state stored in the array
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                const value = $(this).val().toLowerCase();
                $("#student-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                for(let i = 0; i < students.length; i++){
                    if(students[i]["attendance"] === "P"){
                        $("#check-" + students[i]["roll_no"]).prop("checked", true);
                    }
                }
                
            });
        });

        // When the checkbox is changed, change the state of the checkbox in the array
        function changeState(roll_no){
            console.log('changing state of ' + roll_no);
            for(let i = 0; i < students.length; i++){
                if(students[i]["roll_no"] == roll_no){
                    if(students[i]["attendance"] == "P"){
                        students[i]["attendance"] = "A";
                    }
                    else{
                        students[i]["attendance"] = "P";
                    }
                    break;
                }
            }
        }

        // Function to mark all students present
        function markAllPresent(){
            for(let i = 0; i < students.length; i++){
                students[i]["attendance"] = "P";
            }
            $("input[type=checkbox]").prop("checked", true);
        }

        // Function to mark all students absent
        function markAllAbsent(){
            for(let i = 0; i < students.length; i++){
                students[i]["attendance"] = "A";
            }
            $("input[type=checkbox]").prop("checked", false);
        }

        // Live Search
        let search = document.getElementById("search");
        search.addEventListener("keyup", function() {
            // Set Checkbox State
            let value = $(this).val().toLowerCase();
                $("#student-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                for(let i = 0; i < students.length; i++){
                    if(students[i]["attendance"] === "P"){
                        $("#check-" + students[i]["roll_no"]).prop("checked", true);
                    }
                }
            
            // Filter results
            let filter = search.value.toUpperCase();
            let table = document.getElementsByTagName("table")[0];
            let tr = table.getElementsByTagName("tr");
            for (let i = 0; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    let textvalue = td.textContent || td.innerText;
                    if (textvalue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        });

        // When the submit button is clicked, send the state of the checkboxes to the database
        function submitData(){
            // get current date 
            const now = new Date();
            const date = now.getDate() + "-" + (now.getMonth() + 1) + "-" + now.getFullYear();

            console.log(date);
            $.ajax({
                url: "submit_attendance.php",
                type: "POST",
                data: {
                    students: students,
                    date: date
                },
                success: function(response){
                    const msg = document.getElementById("msg");
                    if (response[11] == 'a'){
                        msg.className = "msg-fail";
                    } else {
                        msg.className = "msg-success";
                    }
                    msg.innerHTML = response;
                }
            });
        }
    </script>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }
        body {
            font-family: 'Rubik', sans-serif;
        }
        h1{
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }
        .container{
            width: 50%;
            height: 500px;
            max-width: 1200px;
            padding: 0 15px;
            margin: 10px auto 0;
        }
        table{
            width:100%;
            table-layout: fixed;
            background: rgba(255, 255, 255, 0.06);
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
        }
        .tbl-content{
            height:300px;
            overflow-x:auto;
            margin-top: 0;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .tbl-container{
            width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .tbl-content::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            border-radius: 10px;
            background-color: rgba(255,255,255,0.3);
        }

        .tbl-content::-webkit-scrollbar
        {
            width: 12px;
            background-color: rgba(255,255,255,0.3);
        }

        .tbl-content::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #000;
        }
        th{
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
        }
        td{
            padding: 15px;
            text-align: left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 12px;
            color: #fff;
            border-bottom: solid 1px rgba(255,255,255,0.1);
        }
        input[type=checkbox]{
            width: 20px;
            height: 20px;
            margin: 0;
            padding: 0;
            vertical-align: middle;
        }
        #search{
            width: 100%;
            height: 40px;
            border: none;
            border-radius: 5px;
            padding: 0 10px;
            font-size: 16px;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .success{
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .msg-fail{
            font-size: 14px;
            font-weight: 400;
            color: #ff3333;
            margin-top: 10px;
        }
        .msg-success{
            font-size: 14px;
            font-weight: 400;
            color: #47ff33;
            margin-top: 10px;
        }
        #msg{
            text-align: center;
        }
        button{
            background: #fff;
            border: 0;
            padding: 10px 15px;
            color: #000;
            width: 200px;
            font-size: 12px;
            text-transform: uppercase;
            border-radius: 2px;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        button:hover{
            background: #efefef;
            color: #111;
        }

        .btn-container{
            display: flex;
            justify-content: space-between;

        }
        h1{
            font-family: 'Rubik', sans-serif;
            font-size: 50px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <a href="welcome.php" class="back">Back</a>
    <!-- Take data from database and display names as well as live filter -->
    <div class="container">
        <h1> Take Attendance </h1>
        <label for="search"></label><input type="text" class="form-control" id="search" placeholder="Search for a student">

        <br>
        <div class="tbl-container">
            <div class="tbl-header">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 20%">Roll Number</th>
                            <th style="width: 40%">Student Name</th>
                            <th style="width: 20%">Attendance</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table id="student-table">
                    <tbody>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "student management");
                            $sql = "SELECT * FROM student";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                        <tr>
                                            <td style="width: 20%">'.$row["roll_no"].'</td>
                                            <td style="width: 40%">'.$row["name"].'</td>
                                            <td style="width: 20%"><input type="checkbox" id="check-'.$row["roll_no"].'" onchange="changeState('.$row["roll_no"].')"></td>
                                        </tr>
                                    ';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="btn-container">
            <button type="button" class="present" onclick="markAllPresent()">Mark All Present</button>
            <button type="button" class="absent" onclick="markAllAbsent()">Mark All Absent</button>
            <button type="button" class="submit-data" onclick="submitData()">Submit</button>
        </div>
        <div class="" id="msg"></div>
    </div>
    <!-- End of Container -->
</body>
</html>
