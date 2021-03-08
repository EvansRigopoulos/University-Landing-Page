
<?php
session_start();
include("Professorheader.php");
include("config.php");

// Initialize the session
$name = $_SESSION['login_user'];
$user_id = 	$_SESSION['user_id'];

 $sql = "SELECT * From lessons  where user_id=$user_id";
 $data =$conn -> query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Λίστα Μαθημάτων</title>
</head>
<body>
    <h5>Λίστα Μαθημάτων</h5>
    <table class="show"> 
    <thead>
            <tr class="text">
                <th>Εξάμηνο</th>
                <th>Τίτλος Μαθήματος</th>
                <th>Ects</th>
                <th>Είδος</th>
                <th>Βαθμολόγηση</th>

            </tr>
        </thead>




        <tbody>
            
                <?php while( $row = $data->fetch()):  ?>
                    <tr>
                <td ><?=$row['semester']?></td>
                <td><?=$row['title']?></td>
                <td ><?=$row['ects']?></td>
                <td ><?=$row['type']?></td>
                <td><a href="setgrade.php?lesson_id=<?=$row['lesson_id'] ?> ">Βαθμολόγηση</a></td>


                        <?php endwhile ?>
                </tbody>
    </table>

</body>
</html>