<?php
session_start();
include("header.php");
include("config.php");

?>


<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
    <h5>Χρήστες</h5>
    <?php
        $sql="SELECT * FROM user  ORDER BY user_id ASC; ";
        $data = $conn->query($sql);

    ?>
    <table id="myTable" class="show" >
    <thead>
            <tr class="text">
            <th>user_id</th>
            <th onclick="sortTable(1)" style="cursor: pointer;">Όνομα</th>
            <th onclick="sortTable(2)" style="cursor: pointer;">Επίθετο</th>
            <th onclick="sortTable(3)" style="cursor: pointer;">Email</th>
            <th>Τηλέφωνο</th>
            <th onclick="sortTable(5)" style="cursor: pointer;">Ρόλος</th>
            <th onclick="sortTable(6)" style="cursor: pointer;">Διεύθυνση</th>
            <th onclick="sortTable(7)" style="cursor: pointer;">register_number</th>
            <th>Επεξεργασία</th>
            <th>Διαγραφή</th>
            </tr>
            </thead>
        <?php while($row = $data->fetch()): ?>
            
            <tbody>
        <tr class="coloredtext">
            <td><?=$row['user_id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['lastname']?></td>
            <td><?=$row['Email']?></td>
            <td><?=$row['mobile']?></td>
            <td><?=$row['role']?></td>
            <td><?=$row['address']?></td>
           <td><?=$row['register_number']?></td>
           <td><a href="updateuser.php?user_id=<?=$row['user_id']?>"><i class="fa fa-pencil"></i></a></td>
           <td><button onclick="myFunction()"><i class="fa fa-trash"></i></button></td>
           <script>
function myFunction() {
  
  var r = confirm("Εϊστε σίγουροι?");
  if (r == true) {
      
    document.location="deleteuser.php?user_id=<?=$row["user_id"];?>";
  } else {
     
    document.location="showusers.php";
  }
  
}
</script>
        </tr>
            </tbody>
        <?php endwhile ?>
    </table>
    <!---------ενα script για να διαλεγουμε εμφανιση με αλφαβητικη σειρά σε στήλες του πίνακα----->
    <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  
  dir = "asc"; 
 
  while (switching) {
    
    switching = false;
    rows = table.rows;
    
    for (i = 1; i < (rows.length - 1); i++) {
      
      shouldSwitch = false;
     
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
    
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
         
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      
      switchcount ++;      
    } else {
      
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
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