
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
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </div>
    <div style="padding:150px 0 30px 0;">
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