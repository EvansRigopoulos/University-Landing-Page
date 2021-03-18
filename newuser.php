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
    <title>Εισαγωγή Νέου Χρήστη</title>

</head>
<body>
    <h5>Εισαγωγή Νέου Χρήστη</h5>
    <div class="wrapper fadeInDown">
        <div id="formContent">
   <form  name="form"action="" onsubmit="return validateForm()" method="post">
   <i class=" fa fa-user"></i><h5>Εισαγωγή Νέου Χρήστη(Με αστερισκο * τα πεδία που είναι υποχρεωτικά)</h5>
       <label for="name">Όνομα*</label><br>
       
       <input type="text" id="name" name="name" required>
      
       <label for="">Επίθετο*</label><br>
       
       <input type="text" id="lastname" name="lastname" required><br>
       <label for="email">Email*</label><br>
       <input type="email" id="email" name="email" required><br>
       <i class="fa fa-key"></i>
       <label for="password">Κωδικός*</label> <i class="fa fa-eye" onclick="showpass()"></i>
            <script src="app.js"></script>
       <br>
      
       <input type="password" id="password" name="password" required><br>
       <label for="tel">Τηλέφωνο</label><br>
       <input type="tel" id="tel" name="tel"><br>
       <label for="address">Διεύθυνση</label><br>
       <input type="text" id="address" name="address"><br>
       <label for="birth_date">Ημερομηνία γέννησης</label><br>
       <input type="date" id="birth_date" name="birth_date"><br>
       <label for="role">Ρόλος*</label><br>
       <input type="radio" id="Administrator" name="role" value="Administrator"  >
        <label for="role">Administrator</label><br>
        <input type="radio" id="Student" name="role" value="Student" checked>
        <label for="role">Student</label><br>
        <input type="radio" id="Professor" name="role" value="Professor">
        <label for="role">Professor</label><br>
        <div id="semester" ><label  for="semester">Εξάμηνο</label><br>
        <label for="Semester">Επιλέξτε εξάμηνο</label>
<select  name="semester">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  
</select></div><hr><script src="validate.js"></script>
        <Script>
        $(document).ready(function(){
                $("#Administrator").click(function(){
                 $("#semester").hide();
                });
                $("#Student").click(function(){
                $("#semester").show();
                });
                $("#Professor").click(function(){
                $("#semester").hide();
                });
        });
        </Script>
        <div><button name="login" type="submit"  class="fadeIn first">Υποβολή</button><br><hr>
        </div><script src="validate.js"></script>
        </div> <script src="validate.js"></script>
        <?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    $username = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $tel=$_POST['tel'];
    $address=$_POST['address'];
    $birth_date=date('Y-m-d',strtotime($_POST['birth_date'])); 
    $role= $_POST['role'];
    $register_date = date("Y-m-d");
    $register_number = "usr".date("YmdHis");
if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['lastname'] ) && !empty($_POST['password'] ) && !empty($_POST['role'])){
  try{
      if($role === "Student"){
        $semester = $_POST['semester'];
        $sql= "INSERT INTO user (name,lastname,Email,Password,mobile,address,birth_date,role,register_date,register_number) VALUES(?,?,?,?,?,?,?,?,?,?) ";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($username,$lastname,$email,$password,$tel,$address,$birth_date,$role,$register_date,$register_number));
        $sql1="SELECT user_id FROM  user where name = '$username' ";
        $result =$conn -> query($sql1);
        
        while($row = $result -> fetch()) {
            $user_id = $row['user_id'];
            

        $sql2 = "INSERT INTO semester(user_id,semester) VALUES (?,?)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute(array($user_id,$semester));  
        echo "Update succesful";
        echo   '<script language="javascript" type="text/javascript">
        if (!alert ("Update succesful")) {
                document.newuser.reset();
          
        }
        </script>';
        }$stmt=null;  
        $stmt2=null;
        $result=null;
      }else{
            
        $sql= "INSERT INTO user (name,lastname,Email,Password,mobile,address,birth_date,role,register_date,register_number) VALUES(?,?,?,?,?,?,?,?,?,?) ";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($username,$lastname,$email,$password,$tel,$address,$birth_date,$role,$register_date,$register_number));
 
 
        echo   '<script language="javascript" type="text/javascript">
        if (!alert ("Update succesfull")) {
                document.newuser.reset();
           
        }
        </script>';
    }$stmt=null;  
  

  }catch(PDOException $e){
    echo "query failed" . $e;

  }
}else echo "Συμπληρώστε όλα τα πεδία";
$stmt=null;  
$stmt2=null;
$result=null;
}$conn=null;

?> <script src="validate.js"></script>
    </form>
        </div><script src="validate.js"></script>
    </div><script src="validate.js"></script>
   
   
    </div>
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