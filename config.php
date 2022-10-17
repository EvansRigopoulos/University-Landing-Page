

<?php
//Συνδεση στη βαση δεδομενων
$host = "eu-cdbr-west-03.cleardb.net";
$dbname = "heroku_a30cf02546716bf";
$username = "b650b0789f39fd";
$password = "300f1dea";

try{
     $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password,array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   
  
}catch (PDOException $e){
    echo"Connection failed :".$e->getMessage();
}
  
//το αρχειο αυτο το περιλαμβανουμε με include σε καθε αλλο αρχειο
?>