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
    <h5>Χρήστες</h5>
    <?php
        $sql="SELECT * FROM user WHERE role='Administrator' OR role='Professor' ORDER BY user_id ASC; ";
        $data = $conn->query($sql);

    ?>
    <table class="show" >
    <thead>
            <tr class="text">
            <th>user_id</th>
            <th>name</th>
            <th>lastname</th>
            <th>Email</th>
            <th>mobile</th>
            <th>role</th>
            <th>address</th>
            <th>birth_date</th>
            <th>register_number</th>
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
            <td><?=$row['birth_date']?></td>
            <td><?=$row['register_number']?></td>
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