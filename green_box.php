<!DOCTYPE html>
<html lang="en">
    <head>
        <script>
            function deleteRow(i) {
                mainform = document.getElementById("mainform");
                mainform.rowToDelete.value = i;
                mainform.submit();
            }
            function updateRow(i) {
                updateform = document.getElementById("Updateform");
                updateform.rowToUpdate.value = i;
                updateform.submit();
            }
        </script>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <?php include('header/header.php');?>

<?php
$db = new mysqli('localhost', 'root', '', 'test');


if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['green_box_id'])){
    $first_name = $_POST ["first_name"];
    $last_name = $_POST ["last_name"];
    $green_box_id = $_POST ["green_box_id"];
    $d = strtotime("+6 days");
    $return_date = date("Y-m-d", $d);
    $sql = "UPDATE students_2024 SET green_box_id=$green_box_id , return_date='$return_date' WHERE first_name='$first_name'";
    echo $sql;
    $db->query($sql);
    }


?>


<table id="student_menu">
    <?php
        echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Last Name</th>";
                echo "<th>First Name</th>";
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


<form id = "Updateform" action="green_box.php"  method="post" >
    Updating Form <br>
    first name: <input type="text" name="first_name"  placeholder="first name ..."  required> <br>
    last name:  <input type="text" name="last_name" placeholder="last_name ... " required> <br>
    green box id: <input type="text" name="green_box_id" placeholder="green box ... " required> <br>
    <input type="submit" name= "submit2">
</form>

</body>
</html>
