

<?php

$host = "localhost";
$dbname = "rigopoulose_std108116";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connection succeeded <br/>";
}catch (PDOException $e){
    echo"Connection failed :".$e->getMessage();
}
  

?>