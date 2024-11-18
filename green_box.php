<!DOCTYPE html>
<html lang="en">
    <head>
    <script>
            function deleteRow(i) {
                Returnform = document.getElementById("Returnform");
                Returnform.green_box_id.value = i;
                Returnform.submit();
            }
            function updateRow(i) {
                updateform = document.getElementById("Updateform");
                updateform.rowToUpdate.value = i;
                updateform.submit();
            }
        </script>
    </head>
</html>

<?php
$db = new mysqli('localhost', 'root', '', 'test');

if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['green_box_id'])){
    $first_name = $_POST ["first_name"];
    $last_name = $_POST ["last_name"];
    $green_box_id = $_POST ["green_box_id"];
    $d = strtotime("+2 days");
    $return_date = date("Y-m-d", $d);
    #$sql = "UPDATE students_2024 SET green_box_id=$green_box_id , return_date='$return_date' WHERE first_name='$first_name'";
    $sql = "INSERT INTO students_2024 (green_box_id, return_date, first_name, last_name) VALUES ('$green_box_id','$return_date', '$first_name', '$last_name') ";
    echo $sql;
    $db->query($sql);
    }



else if(isset($_POST['green_box_id'])){
    $green_box_id = $_POST ["green_box_id"];
    #$sql = "UPDATE students_2024 SET green_box_id=$green_box_id , return_date='$return_date' WHERE first_name='$first_name'";
    $sql = "DELETE FROM students_2024  WHERE green_box_id = $green_box_id ";
    echo $sql;
    $db->query($sql);
    }

else if (isset($_POST['search_first_name']) && isset($_POST['search_last_name'])){

    echo "------------------This is the search result-------------------------------";
    echo "<table>";
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Last Name</th>";
        echo "<th>First Name</th>";
        echo "<th>Green Box ID</th>";
        echo "<th>Returning Date</th>";
        echo "<th>Returned</th>";
    echo "</tr>";
    $search_first_name = $_POST['search_first_name'];
    $search_last_name = $_POST['search_last_name'];
    $sql = "SELECT * FROM students_2024 WHERE first_name = '$search_first_name' ";
    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
                echo "<td>" . $row["person_id"] . "</td>" ;
                echo "<td>" . $row["last_name"]. "</td>";
                echo "<td>". $row["first_name"]. "</td>";
                echo "<td>". $row["green_box_id"]. "</td>";
                echo "<td>". $row["return_date"]. "</td>";
                echo "<td >". "<button id='row_button' type='button' onclick=deleteRow(". $row["green_box_id"].")></button>". "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>


<table id="students_returning_today">
    ----------------------Table of Students that need to Return today--------------------------
    <?php
    $today_date = date("Y-m-d");
        echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Last Name</th>";
                echo "<th>First Name</th>";
                echo "<th>Green Box ID</th>";
                echo "<th>Returning Date</th>";
                echo "<th>Returned</th>";
        echo "</tr>";

        $sql = "SELECT * FROM students_2024";
        $result = $db->query($sql);

        while($row = $result->fetch_assoc()) {
            if ($today_date == $row["return_date"]) {
                echo "<tr>";
                    echo "<td>" . $row["person_id"] . "</td>" ;
                    echo "<td>" . $row["last_name"]. "</td>";
                    echo "<td>". $row["first_name"]. "</td>";
                    echo "<td>". $row["green_box_id"]. "</td>";
                    echo "<td>". $row["return_date"]. "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>


<table id="students_green_box">
    ------------------------------Table of Every Students that need to Return the green box----------------------------------
    <?php
        echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Last Name</th>";
                echo "<th>First Name</th>";
                echo "<th>Green Box ID</th>";
                echo "<th>Returning Date</th>";
                echo "<th>Returned</th>";
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
                echo "<td >". "<button id='row_button' type='button' onclick=deleteRow(". $row["green_box_id"].")></button>". "</td>";
            echo "</tr>";
        }
    ?>
</table>



<form id = "Updateform" action="green_box.php"  method="post" >
    Updating Form <br>
    first name: <input type="text" name="first_name"  placeholder="first name ..."  required> <br>
    last name:  <input type="text" name="last_name" placeholder="last_name ... " required> <br>
    green box id: <input type="text" name="green_box_id" placeholder="green box ... " required> <br>
    <input type="submit" name = "submit2"> 
</form>
<form id = "Returnform" action="green_box.php"  method="post" style="display: none" >
    Returning Form <br>
    green box id: <input type="text" name="green_box_id" placeholder="green box ... " required> <br>
    <input type="submit" name = "submit2" > 
</form>
<form id = "Searchform" action= "green_box.php" method = "post" >
    Search first name <input type = "text" name= "search_first_name" placeholder="first name ..."> <br>
    Search last name <input type = "text" name= "search_last_name" placeholder="last name ..."> <br>
    <input type= "submit" > 
</form>

