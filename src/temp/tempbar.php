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
        // This page is used to take attendance of students
        // It has various features to make the process easier:
        // 1. Search bar to search for a student and live filter the results
        // 2. Button to mark all students present and button to mark all students absent
        // 3. Checkbox to mark a student present or absent
        // However, filtering the results causes the checkboxes to be unchecked. To fix this, we will use the jQuery library to store the state of the checkboxes in an array and then restore the state of the checkboxes after filtering the results.

        // Use PhP to get the Students and roll number from database initially
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
                var value = $(this).val().toLowerCase();
                $("#student-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                for(let i = 0; i < students.length; i++){
                    if(students[i]["attendance"] == "P"){
                        $("#check-" + students[i]["roll_no"]).prop("checked", true);
                    }
                }
            });
        });

        // When the checkbox is changed, change the state of the checkbox in the array
        function changeState(roll_no){
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
                    if(students[i]["attendance"] == "P"){
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
            $.ajax({
                url: "submit.php",
                type: "POST",
                data: {
                    students: students
                },
                success: function(response){
                    console.log(response);
                }
            });
        }

    </script>
    <style>
        h1{
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }
        table{
            width:80%;
            table-layout: fixed;
            margin-left: 0px;
            background: rgba(255, 255, 255, 0.1);
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
        }
        .tbl-content{
            height:300px;
            overflow-x:auto;
            margin-top: 0px;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .tbl-container{
            margin: 0 auto;
            width: 50%;
            position: relative;
            top: 80%;
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

        input[type=checkbox]{
            width: 20px;
            height: 20px;
            margin: 0px;
            padding: 0px;
            vertical-align: middle;
        }
        /* The Above CSS Applies style to the table in a container layout */
    </style>
</head>
</body>
    <!-- Take data from database and display names as well as live filter -->
    <input type="text" id="search" placeholder="Search for names..">
    <button onclick="markAllPresent()">Mark All Present</button>
    <button onclick="markAllAbsent()">Mark All Absent</button>
    <button onclick="submitData()">Submit</button>
    <div class="tbl-container">
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Roll Number</th>
                        <th>Name</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table>
                <tbody id="student-table">
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "student management");
                        $sql = "SELECT * FROM student";
                        $result = mysqli_query($conn, $sql);
                        $students = array();
                        while($row = mysqli_fetch_assoc($result)){
                            $students[] = $row;
                        }
                        foreach($students as $student){
                            echo "<tr>";
                            echo "<td>" . $student["roll_no"] . "</td>";
                            echo "<td>" . $student["name"] . "</td>";
                            echo "<td><input type='checkbox' id='check-" . $student["roll_no"] . "' onclick='changeState(" . $student["roll_no"] . ")'></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
    <!-- End of Container -->
</body>