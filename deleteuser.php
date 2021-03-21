

<?php
session_start();
$user_id=$_GET['user_id'];
echo $user_id;

require 'config.php';

                    $sql="Delete from user where user_id = $user_id  ";
                    $conn->query($sql);
                    
                    $sql1="Delete from semester where user_id=$user_id";
                    $conn->query($sql1);
                    
                    $sql2="Delete from records where user_id=$user_id";
                    $conn->query($sql2);
                    
                    $conn=null;
                    echo   '<script language="javascript" type="text/javascript">
                    if (!alert ("Ο χρήστης διαγράφηκε με επιτυχία")) {
                        document.location="showusers.php";
                      
                    }
                    </script>';
                
?>