<?php 
session_start();
$user_id=$_GET['user_id'];
$record_id=$_GET['record_id'];
?>
 <script>
document.location="studentrecords.php?user_id=<?=$user_id?>"+"&record_id=<?=$record_id?>";
</script>"

<?php
?>