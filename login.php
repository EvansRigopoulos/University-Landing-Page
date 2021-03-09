<?php
session_start();


require 'config.php';
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if($_POST['email'] != "" || $_POST['password'] != ""){
  $username = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM user WHERE Email=? AND Password=? ";
  $query = $conn->prepare($sql);
  $query->execute(array($username,$password));
  $row = $query->rowCount();
  $fetch = $query->fetch();
  if($row > 0) {
   
    session_start();
     $_SESSION['login_user'] = $username;
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $fetch['name'];
    $_SESSION['lastname']= $fetch['lastname'];
    $_SESSION['email']=$fetch['Email'];
		$_SESSION['user_id'] = $fetch['user_id'];
    $_SESSION['role'] =$fetch['role'];
      echo $fetch['role'];
    switch ($fetch['role']) {
  case "Student":
    header("Location: memberstudent.php"); 
    break;
  case "Professor":
    header("Location: memberprofessor.php"); 
    break;
  case "Administrator":
    header("Location:memberbackoffice.php"); 
    break;
}
  } 
    else{ echo    '<script language="javascript" type="text/javascript">
    if (!alert ("Τα στοιχεία πρόσβασης είναι λανθασμένα! Προσπαθήστε ξανά.")) {
        history.go (-1);
    }
    </script>';
  }
  
 
}else{ echo    '<script language="javascript" type="text/javascript">
  if (!alert ("Τα στοιχεία πρόσβασης είναι λανθασμένα! Προσπαθήστε ξανά.")) {
      history.go (-1);
  }
  </script>';}



?>
    