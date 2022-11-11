<?php
    $term = $_POST["term"];
    $query = "SELECT * FROM student WHERE name LIKE '%$term%'";
    $connection = mysqli_connect("localhost", "root", "", "student management");
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["roll_no"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><input type="checkbox" name="attendance" onclick="mark('<?php echo $row["roll_no"] ?>')"></td>
        </tr>
        <?php 
    }
?>