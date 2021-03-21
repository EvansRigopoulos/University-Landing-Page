
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
                    if (!alert ("Το μάθημα διαγράφηκε με επιτυχία")) {
                        document.location="showlessons.php";
                      
                    }
                    </script>';
                
?>