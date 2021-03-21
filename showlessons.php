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
<body>
<h5>Μαθήματα</h5>
    <?php
        $sql="SELECT lessons.lesson_id,lessons.user_id,user.name,user.lastname,lessons.title,lessons.description,lessons.type,lessons.semester,lessons.ects FROM lessons  inner join user on lessons.user_id=user.user_id  ORDER BY semester ASC";
        $data = $conn->query($sql);
        
    ?>

    
    <table class="show">
    <thead >
            <tr class="text">
            
            <th>Εξάμηνο</th>
            
            <th>Τίτλος</th>
            <th>Καθηγητής</th>
            <th>περιγραφή</th>
            <th>Είδος</th>
           
            <th >Ects</th>
            <th colspan="5">Τροποποίηση</th>
            
            <th >Διαγραφή</th>
            
            </tr>
            </thead>
        
            <tbody>
            <?php while($row = $data->fetch()): ?>
            
        <tr class="coloredtext">
         
        <td><?=$row['semester']?></td>
        <td><?=$row['title']?></td>
            <td><?=$row['name']?> <?=$row['lastname']?></td>
            
            <td><?=$row['description']?></td>
            <td><?=$row['type']?></td>
            
            <td ><?=$row['ects']?></td>
            <td colspan="5"><a  href="modifylessons.php?lesson_id=<?php echo $row["lesson_id"]; ?>"><i class="fa fa-pencil"></i> </a></td>
            
            <td  ><button onclick="myFunction()"><i class="fa fa-trash"></i></button></td>
      
        </tr>
            </tbody>
            <script>
function myFunction() {
  
  var r = confirm("Είστε σίγουροι?");
  if (r == true) {
    console.log("hi");
    document.location="deletelessons.php?lesson_id=<?=$row["lesson_id"]; ?>";
  } else {
    document.location="showlessons.php";
  }
  
}
</script>
        <?php endwhile ?>
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