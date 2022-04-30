<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","c952d843","dummypass","c952d843");

if($mysqli->connect_errno){
     echo "<p>Connection Failed</p>";
     exit();
}

$query = "SELECT SHIPNUM FROM SHIP";



if ($result = $mysqli->query($query)) {
 /* fetch associative array */
     while ($row = $result->fetch_assoc()) {
        echo "<"
     }
 /* free result set */
 $result->free();

?>