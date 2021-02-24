<?php
session_start();
include("header.php");
include("config.php");

?>


<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
<h5>Μαθήματα</h5>
    <?php
        $sql="SELECT lessons.lesson_id,lessons.user_id,user.name,user.lastname,lessons.title,lessons.description,lessons.type,lessons.semester,lessons.ects FROM lessons  inner join user on lessons.user_id=user.user_id  ORDER BY semester ASC";
        $data = $conn->query($sql);
        
    ?>

    
    <table class="show">
    <thead >
            <tr class="text">
            
            <th>lesson_id</th>
            <th>Professor</th>
            <th>title</th>
            <th>Description</th>
            <th colspan="2">type</th>
            <th colspan="2">semester</th>
            <th colspan="3">Ects</th>
            <th >Τροποποίηση</th>
            <th >Διαγραφή</th>
            
            </tr>
            </thead>
        <?php while($row = $data->fetch()): ?>
            
            <tbody>
        <tr class="coloredtext">
            <td><?=$row['lesson_id']?></td>
            <td><?=$row['name']?> <?=$row['lastname']?></td>
            <td><?=$row['title']?></td>
            <td><?=$row['description']?></td>
            <td colspan="2"><?=$row['type']?></td>
            <td colspan="2"><?=$row['semester']?></td>
            <td colspan="3"><?=$row['ects']?></td>
            <td ><a  href="modifylessons.php?lesson_id=<?php echo $row["lesson_id"]; ?>">Τροποποίηση  </a></td>
            <td ><a  href="" onclick="myFunction()">Διαγραφή  </a></td>
            <script>
function myFunction() {
  
  var r = confirm("Εϊστε σίγουροι?");
  if (r == true) {
    document.location="deletelessons.php?lesson_id=<?php echo $row["lesson_id"]; ?>";
  } else {
    document.location="showlessons.php";
  }
  
}
</script>
        </tr>
            </tbody>
        <?php endwhile ?>
    </table>
    <hr>
</body>
<?php
    include("footer.php"); 
    ?>
</html>