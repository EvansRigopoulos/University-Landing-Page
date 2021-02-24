<script>
function myFunction() {
  var txt;
  var r = confirm("Press a button!");
  if (r == true) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
<?php
session_start();
$lesson_id=$_GET['lesson_id'];

require 'config.php';

                    $sql="Delete from lessons where lesson_id = '$lesson_id ' ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $stmt=null;
                    $conn=null;
                    echo   '<script language="javascript" type="text/javascript">
                    if (!alert ("Lesson deleted succesfully")) {
                        document.location="showlessons.php";
                      
                    }
                    </script>';
                
?>