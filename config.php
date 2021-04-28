

<?php
//Συνδεση στη βαση δεδομενων
$host = "localhost";
$dbname = "rigopoulose_std108116";
$username = "root";
$password = "";

try{
     $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
}catch (PDOException $e){
    echo"Connection failed :".$e->getMessage();
}
  
//το αρχειο αυτο το περιλαμβανουμε με include σε καθε αλλο αρχειο
?>