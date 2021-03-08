<?php
session_start();
include("header.php");
include("config.php");
        $username=$lastname=$user_id=array();
    $sql = "SELECT user_id,name,lastname FROM user where role = 'Professor' ";
    $result =$conn -> query($sql);
    while($row = $result -> fetch()){
        $user_id[] = $row['user_id'];
        $username[]=$row['name'];
        $lastname[]=$row['lastname'];

        
        
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
    <title>New Lesson</title>
</head>
<body>
    <h5>Προσθήκη Νέου Μαθήματος</h5>

    <div class="wrapper fadeInDown">
        <div id="formContent">

   <form  name="form"action="" onsubmit="" method="post">
       <label for="title">Τίτλος</label><br>
       <div>
       <input type="text" id="title" name="title">
       </div><br>
       <div>
        <label for="description">Περιγραφή</label><br>
       <textarea name="description" rows="5" cols="30"></textarea>
       </div>
       <label for="ects">Διδακτικές Μονάδες</label><br>
       <div>
       <input type="text" id="ects" name="ects" value="5" readonly>
       </div><br>
       <div>
       <label for="type">Τύπος</label>
       <select  name="type" id="=type"><br>
        <option value="Υποχρεωτικό">Υποχρεωτικό</option>
        <option value="Επιλογής">Επιλογής</option>
       </select>
       </div><br>
       <div>
       <label for="Professor">Διδάσκων Καθηγητής</label>
      <select  name="Professor">
       <?php for($i = 0; $i < count($username); ++$i): ?>
    <option value="<?=$user_id[$i]?> " ><?=$username[$i]." ".$lastname[$i]?></option>
            <?php endfor ?>
    
       </select>
       </div><br>
        <div >
        <label for="Semester">Επιλέξτε εξάμηνο</label>
<select  name="semester">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  
</select>
</div>
<hr>
<div><button name="login" type="submit"  class="fadeIn first">Υποβολή</button><br><hr>
        </div>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
     $title = $_POST['title'];
     $ects = $_POST['ects'];
     $user_id= $_POST['Professor'];
     $type = $_POST['type'];
     $semester= $_POST['semester'];
     $description= $_POST['description'];
    
 if(!empty($_POST['title']) && !empty($_POST['ects']) && !empty($_POST['Professor'] ) && !empty($_POST['type'] ) && !empty($_POST['semester'])){
   try{
      
        
         $sql= "INSERT INTO lessons (user_id,title,type,semester,ects,description) VALUES(?,?,?,?,?,?) ";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array($user_id , $title , $type,$semester,$ects,$description));
        
        echo   '<script language="javascript" type="text/javascript">
        if (!alert ("Lesson added succesfully")) {
                document.newlesson.reset();
          
        }
        </script>';

       
    }catch(PDOException $e){
        echo "query failed" . $e;
    
      }$stmt=null;

}$conn=null;}
    
?>
   </form>
        </div>
    </div>
    </div>
    <div style="padding-left:30px;">
    <p  style="font-size:15px;">
    <span class="text">e-mail Μητρώου:</span>
    <span class="text"> <a href="#">plh@eap.gr</a></span>
</p>
    </div>
</body><hr>
<?php
    include("footer.php"); 
    ?>
</html>