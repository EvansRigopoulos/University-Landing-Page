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
<link rel="stylesheet" href="styles\styles.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Μαθήματα</title>
</head>
<body>
<h5>Μαθήματα</h5>
    <?php
        $sql="SELECT lessons.lesson_id,lessons.user_id,user.name,user.lastname,lessons.title,lessons.description,lessons.type,lessons.semester,lessons.ects FROM lessons  inner join user on lessons.user_id=user.user_id ";
        $data = $conn->query($sql);
        
    ?>

<form action="" method="POST">
    <div>
    <table class="show"  >
    
    <thead>
            <tr class="text">
            <th>lesson_id</th>
            <th>Professor</th>
            <th>title</th>
            <th>Description</th>
            <th>type</th>
            <th>semester</th>
            <th>Ects</th>
            <th></th>
            <th></th>
            <th></th>
            </tr>
            </thead>
        <?php while($row = $data->fetch()): $lesson_id=$row['lesson_id']; ?>
                
            <tbody>
        
        <tr class="coloredtext" aria-rowspan="2">
            
            <td><?=$row['lesson_id']?></td>
            <td><select  name="Professor" >
            <option value="<?=$row['user_id']?>" selected><?=$row['name']." ".$row['lastname']?></option>
       <?php for($i = 0; $i < count($username); ++$i): ?>
    <option value="<?=$user_id[$i]?> " ><?=$username[$i]." ".$lastname[$i]?></option>
            <?php endfor ?>
    
       </select></td>
           
            
            <td ><input type="text" id="title" name="title" value="<?=$row['title']?>"></td>
            <td><textarea name="description" rows="1" cols="10"><?=$row['description']?></textarea></td>
            
            
           
            <td><select  name="type" id="=type">
            <option value="<?=$row['type']?>"><?=$row['type']?></option>
        <option value="Υποχρεωτικό">Υποχρεωτικό</option>
        <option value="Επιλογής">Επιλογής</option>
       </select></td>
           
            <td><select  name="semester">
                <option value="<?=$row['semester']?>" selected><?=$row['semester']?></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  
</select></td>
<td><select  name="ects">
                <option value="<?=$row['ects']?>" selected><?=$row['ects']?></option>
  <option value="5">5</option>
  
  
</select></td>

<td></td>
<td><button type="submit" name="modify" value="Update">Update</button></td>
           <td><button type="submit" name="modify"  value="Delete" >Delete</button></td>
            
        </tr>
        
        
        <?php endwhile?>
            </tbody>
       
    
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch($_REQUEST['modify']){
        case "Update":
            if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST['title'];
        $ects = $_POST['ects'];
        $user_id= $_POST['Professor'];
        $type = $_POST['type'];
        $semester= $_POST['semester'];
        $description= $_POST['description'];
        
            try{
               
                 
                  $sql= "UPDATE lessons SET user_id='$user_id' ,title= '$title',type='$type',semester='$semester',ects='$ects',description='$description' where lesson_id='$lesson_id '";

                  $stmt = $conn->prepare($sql);

                  
                  $stmt->execute();
                  echo $_POST['title'];
                  echo $_POST['Professor']." ";
                  echo $_POST['semester'];
                  echo "   Update succesful";
                 echo   '<script language="javascript" type="text/javascript">
                 if (!alert ("Update succesful") ) {
                         
                   
                 }
                 </script>';
         
                
             }catch(PDOException $e){
                 echo "query failed" . $e;
             
               }$stmt=null;
         
         }$conn=null;
        
            break;
    case "Delete" :
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $sql="Delete from lessons where lesson_id = '$lesson_id ' ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $stmt=null;
                    $conn=null;
                    echo   '<script language="javascript" type="text/javascript">
                    if (!alert ("Update succesful")) {
                           
                      
                    }
                    </script>';
                    break;
        }
        }
    }
    ?>
    </table>
   </div>
    </form>
    <hr>
</body>
<?php
    include("footer.php"); 
    ?>
</html>
