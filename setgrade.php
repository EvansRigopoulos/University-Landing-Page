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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
</body>
</html>