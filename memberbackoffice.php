

<?php
session_start();
include("header.php");
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
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="styles/styles.css">
  

    <title>Welcome</title>
    <hr>
</head>

<body>

<div class="page-header">
        <h4>Hi, <p><?php echo $name." ".$lastname ?>

    </p></h4>

    <div>
        <div>
            <h5 style="padding-left:150px;" >Στοιχεία <?php echo $role ?></h5>
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
        </div>
</body>
<?php
    include("footer.php"); 
    ?>


</html>