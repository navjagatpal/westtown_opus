<!DOCTYPE html>
<html lang="en">
</html>

<?php
$db = new mysqli('localhost', 'root', '', 'test');
?>


<table id="student_menu">
    <?php
        echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Last Name</th>";
                echo "<th>First Name Type</th>";
                echo "<th>Green Box ID</th>";
                echo "<th>Returning Date</th>";
        echo "</tr>";

        $sql = "SELECT * FROM students_2024";
        $result = $db->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>" . $row["person_id"] . "</td>" ;
                echo "<td>" . $row["last_name"]. "</td>";
                echo "<td>". $row["first_name"]. "</td>";
                echo "<td>". $row["green_box_id"]. "</td>";
                echo "<td>". $row["return_date"]. "</td>";
            echo "</tr>";
        }
    ?>
</table>



Green box 
    Create table have  every student name nd collumns of having green box or not 
    Create a form to do that 
    Do CRUD on that table 
    show that table on page 
    Initiate timer for the student to return 
    Send emails/text to student to return after a specific amount of time 
    remove the student and the green box from the table. 
