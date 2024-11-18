<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opus</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('header.php');?> 
    <h3> Upcoming Work Jobs:</h3>
    <br>
        <?php

        $db = new mysqli("localhost","root", "", "students2024");
                $sql = "SELECT * FROM workjobs";
                $result = $db->query($sql);
                echo "<br><br>";
                    while($row = $result-> fetch_assoc()){
                        echo "<div class='menu'>";
                        echo $row["jobtype"];
                        echo "<br>";
                        echo $row["studentname"];
                        echo "<br>";
                        echo $row["starttime"];
                        echo "<br>";
                        echo $row["date"];
                        echo "<br>";
                        echo $row["supervisor"];
                        echo "</div>";
                    }
            ?>
    <br>
    <h3> Team Weekend:</h3>
    <br>
        <?php

        $db = new mysqli("localhost","root", "", "students2024");
                $sql = "SELECT * FROM teamWeekend";
                $result = $db->query($sql);
                echo "<br><br>";
                            echo "<div class='menu'>";
                                while($row = $result-> fetch_assoc()){
                                    echo "<div id='day'>";
                                    echo $row["day"];
                                    echo "</div>";
                                    echo $row["jobtype"];
                                    echo "<br>";
                                    echo $row["name"];
                                    echo "<br>";
                                }
                            echo "</div>";
        ?>
</body>
</html>