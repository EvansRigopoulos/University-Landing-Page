<?php
session_start();
include("header.php");
include("config.php");

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
    <title>Πρόοδος Φοιτητών</title>
</head>
<body>
<h5>Προβολή Φoιτητών</h5>
<?php
        $sql="SELECT * FROM user Inner Join semester on user.user_id=semester.user_id  WHERE role = 'Student' ORDER BY semester,lastname ASC; ";
        $data = $conn->query($sql);

    ?>
   <table class="show" >
    <thead>
            <tr class="text">
            <th>user_id</th>
            <th>Όνομα</th>
            <th>Επίθετο</th>
            <th>Email</th>
            <th>Εξάμηνο</th>
            <th>Ημερομηνία Εγγραφής</th>
            <th>Αρ.Μητρώου</th>
            <th>Προβολή Καρτέλας Φοιτητή</th>
            </tr>
            </thead>
        <?php while($row = $data->fetch()): ?>
            
            <tbody>
        <tr class="coloredtext">
            <td><?=$row['user_id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['lastname']?></td>
            <td><?=$row['Email']?></td>
            <td><?=$row['semester']?></td>
            <td><?=$row['register_date']?></td>
            <td><?=$row['register_number']?></td>
            <td><a href="backofficestudentsstatistics.php?user_id=<?=$row['user_id']?>">Προβολή</a></td>
        </tr>
            </tbody>
        <?php endwhile ?>
    </table>
    </div>
    <div style="padding:100px 0 30px 30px;">
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