<?php

session_start();
include("Professorheader.php");
include("config.php");

$lesson_id=$_GET['lesson_id'];

$sql="SELECT * FROM user INNER JOIN records on user.user_id=records.user_id INNER JOIN semester on semester.user_id=user.user_id where lesson_id=$lesson_id AND status='Εγγεγραμμένος/η'  order by semester ASC";
$data= $conn->query($sql);

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
    <title>Βαθμολόγηση Φοιτητών</title>
</head>
<body>
<h5>Βαθμολόγηση Φοιτητών</h5>
<table class="show">
<thead>
            <tr class="text">
                <th>Εξάμηνο</th>
                <th>Ονοματεπώνυμο</th>
                <th>Email</th>
                <th>Αρ.Μητρώου</th>
                <th>Βαθμός</th>
                <th>Ενέργεια</th>
                

            </tr>
        </thead>
<tbody>
<?php  while( $row = $data->fetch()):  ?>
                    <tr >
                <td ><?=$row['semester']?></td>
                <td ><?=$row['name']?> <?=$row['lastname']?></td>
                <td ><?=$row['Email']?></td>
                <td><?=$row['register_number']?></td>
                <form method="POST" action="grade.php?record_id=<?=$row['record_id']?>">
                <td>
                <select name="grade" id="">
                    <option><?=$row['grade']?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                   
                </select>

               </td>
                <td><button>Αποθήκευση</button></td>
                </form>
                <?php endwhile ?>
                
</tbody>
</table>
</div>
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