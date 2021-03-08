<?php 
session_start();
include("config.php");
$user_id=$_GET['user_id'];
$record_id=$_GET['record_id'];

$status=$_GET['status'];

if($status=='Εγγεγραμμενος/η'){
    
    $sql = "UPDATE records SET status='Εγγεγραμμενος/η' WHERE record_id=$record_id";
    $conn->query($sql);

}
 if($status=='Μη Εγγεγραμμενος/η'){
  
    $sql = "UPDATE records SET status='Μη Εγγεγραμμενος/η' WHERE record_id=$record_id ";
    $conn->query($sql);

}

?>
 <script>
document.location="studentrecords.php?user_id=<?=$user_id?>";
</script>"

<?php
?>