<?php 
//password for server : M00seCla$$
//Just echoing the javascript
$random_number = RAND(1,10);
/*
$db = new mysqli('localhost', 'adminer', 'M00seCla$$', 'test'); //database

$query = "SELECT * FROM sql1_pictures WHERE id = '$random_number'";
$result = $db->query($query);
$row = $result -> fetch_assoc();
$image_file = "imgs/" . $row["picture_file"] . ".jpg";
$year = $row["year"];
$location = $row["location"];
*/

$query2 = "SELECT * FROM sql1_facts WHERE id = '$random_number'";
$result2 = $db->query($query2);
$row2 = $result2 -> fetch_assoc();
$fact = $row2["fact"];

//get the image database on a random number
?>



<script type='text/javascript'>
    function Appear() {
        let random_number_1 = <?= $random_number ?>;
        let image_file = "<?= $image_file ?>";
        let image_text = "Picture are taken in <?= $year ?> and at <?= $location ?>"
        document.getElementById("img1").src = image_file;
        document.getElementById("description1").innerHTML = image_text;
        document.getElementById("description2").innerHTML = "<?=$fact?>" ;
        document.getElementById('click').setAttribute('onclick', 'location.reload()');
        document.getElementById("click").innerHTML = "Reset";
        document.getElementById("img1").style.visibility = "visible";
        document.getElementById("description2").style.visibility = "visible";
        };
</script>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href ="style.css">
</head>
<body>
    <h1>JERRY HUYNH CS1 PROFILE</h1>
        <button onclick="Appear()" id="click" > GO </button>
        <div id= "parent">
            <div id ="left_side" >
                <img id = "img1" src= "" >
                <div id = "description1"></div>
            </div>
            <div id = "right_side">
                <div id = "description2"></div>
            </div>
        </div>
</body>





