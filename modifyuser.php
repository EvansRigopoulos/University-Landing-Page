



<?php
session_start();
if($_SESSION['role'] == "Administrator"){
include("header.php");
}elseif($_SESSION['role'] == "Student"){
    include("studentheader.php"); 
}elseif($_SESSION['role'] == "Professor"){
    include("Professorheader.php");
}
include("config.php");

// Initialize the session
$name =  $_SESSION['login_user'];





 $sql="SELECT * FROM user WHERE Email= '".$name."'  ";  
        
        $result =$conn -> query($sql);
            while($row = $result -> fetch())  
            {  
            $user_id=$row['user_id'];
            $name =$row['name'];
            $lastname=$row['lastname']; 
            $email=$row['Email']; 
            $password=$row['Password'];
            $role=$row['role']; 
            $mobile=$row['mobile'];  
            $address = $row['address'];
            $birth_date=$row['birth_date'];
            } 
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
    <title></title>
</head>

<body>
<div class="page-header">
        <h4>Τροποποίηση στοιχείων</h4>

    </p>

    <div >
        
    <table class="user" style="padding-left:150px;">
    <form class="form" action="" onsubmit="return validateForm()" method="POST">
    <tbody>
        <tr class="coloredtext">
            <td><b>Κωδικος Χρήστη</b><td><?php echo $user_id ?></td>
        </tr>
        <tr class="text">
            <td><b>Όνομα</b><td><?php echo $name ?><br></td>
        </tr>
        <tr class="coloredtext">
            <td><b>Επίθετο</b><td><?php echo $lastname ?></td>
        </tr>
        <tr class="text">
            <td><b>Κωδικός</b><td><input type="password" id="password" name="password" value="<?php echo $password ?> "><i class="fa fa-eye" onclick="showpass()"></i><br></td>
            <script src="app.js"></script>
          </tr>
        <tr class="coloredtext">
            <td><b>Email</b><td><?php echo $email ?></td>
        </tr>
        <tr class="text">
            <td><b>Κινητό</b><td><input type="tel" id="mobile" name="mobile" value="<?php echo $mobile ?>"></td>
        </tr>
        <tr class="coloredtext">
            <td><b>Διεύθυνση</b><td><input type="text" id="address" name="address" value="<?php echo $address ?>"></td>
        </tr>
        <tr class="text">
            <td><b>Ημερομηνία Γέννησης</b><td><input type="date" id="birth_date" name="birth_date" value="<?php echo date("j F Y", strtotime($birth_date)); ?>"></td>
        </tr>
      
    </tbody>
    <tr>
        <td></td>
        <td><button type="submit">Υποβολή</button></td>
      

       
  </tr>
  <?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo $_POST['birth_date'];
    $birth_date =date('Y-m-d',strtotime($_POST['birth_date'])); 
  try{
   
 $sql= "UPDATE user SET Password = '".$_POST['password']."', mobile ='".$_POST['mobile']."',address = '".$_POST['address']."',birth_date ='".$birth_date."'  WHERE name='".$name."'" ;
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 if($stmt->execute()){
    echo   '<script language="javascript" type="text/javascript">
if (!alert ("Update succesfull")) {
    
    document.location="modifyuser.php";
}
</script>';}


  }catch(PDOException $e){
    echo "query failed" . $e;

  }
  

}

?> 
    </form>
    </table>
    </div>
    <script src="validate.js"></script>
    <div style="padding-left:30px;">
    <p  style="font-size:15px;">
    <span class="text">e-mail Μητρώου:</span>
    <span class="text"> <a href="#">plh@eap.gr</a></span>
</p>
    </div>

  

</body>
<?php
    include("footer.php"); 
    ?>
    
</html>