<?php 
session_start();
include("Professorheader.php");
include("config.php");
$record_id=$_GET['record_id'];
$grade=$_POST['grade'];

try{
$sql="UPDATE records SET grade='$grade' where record_id='$record_id'  ";
$conn->query($sql);
if($grade>5){
    $sql1 = "UPDATE records SET status='Μη Εγγεγραμμενος/η' WHERE record_id='$record_id' ";
    $conn->query($sql1);
}
}catch(PDOException $e){
    echo "Update unsuccesful ".$e; 

}echo '<script language="javascript" type="text/javascript">
if (!alert ("Update succesfull")) {
    document.location="registeredlessons.php";
}
</script>';

?>