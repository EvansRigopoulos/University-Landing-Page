

<?php
session_start();
include("Professorheader.php");
include("config.php");

// Initialize the session
$name = $_SESSION['login_user'];





 $sql="SELECT * FROM user WHERE Email= ? ";  
        
        
        $query = $conn->prepare($sql);
         $query->execute(array($name));
            while($row = $query -> fetch())  
            {  
            $user_id=$row['user_id'];
            $name =$row['name'];
            $lastname=$row['lastname']; 
            $email=$row['Email']; 
            $role=$row['role']; 
            $mobile=$row['mobile'];  
            $address = $row['address'];
            $birth_date=$row['birth_date'];
            } 
            $query=null;
            $conn = null;
 
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
    <title>Welcome</title>
</head>
<body>

<div class="page-header">
        <h4>Γειά σας, <p><?php echo $name." ".$lastname ?>

    </p></h4>

    <div >
        <div>
            <h5 style="padding-left:150px;" ><i class="fa fa-address-card"></i> Στοιχεία <?php echo $role ?></h5>
        </div>
    <table class="user" style="padding-left:150px;">
   
    <tbody>
        <tr class="coloredtext">
            <td><b>Κωδικος Χρήστη</b><td><?php echo $user_id ?></td>
        </tr>
        <tr class="text">
            <td><b>Όνομα</b><td><?php echo $name ?></td>
        </tr>
        <tr class="coloredtext">
            <td><b>Επίθετο</b><td><?php echo $lastname ?></td>
        </tr>
        <tr class="text">
            <td><b>Email</b><td><?php echo $email ?></td>
        </tr>
        <tr class="coloredtext">
            <td><b>Κινητό</b><td><?php echo $mobile ?></td>
        </tr>
        <tr class="text">
            <td><b>Διεύθυνση</b><td><?php echo $address ?></td>
        </tr>
        <tr class="coloredtext">
            <td><b>Ημερομηνία Γέννησης</b><td><?php echo date("j F Y", strtotime($birth_date)); ?></td>
        </tr>
    </tbody>
    </table>
    </div>
    <div style="padding-left:30px;">
    <p  style="font-size:15px;">
    <span class="text">e-mail Μητρώου:</span>
    <span class="text"> <a href="#">plh@eap.gr</a></span>
</p>
    </div>
</div>
  

</body>
<?php
    include("footer.php"); 
    ?>
</html>