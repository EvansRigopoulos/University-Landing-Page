
<?php
session_start();
include("header.php");
include("config.php");

// Initialize the session
$name = $_SESSION['login_user'];


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="styles/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <h5>Καρτέλα Φοιτητή</h5>
    <?php
        $user_id = $_GET['user_id'];

        $sql="SELECT name,lastname FROM user WHERE user_id=$user_id";
        $data=$conn->query($sql);
        $row= $data->fetch();
        $name=$row['name'];
        $lastname=$row['lastname'];


        $sql1=" SELECT * FROM lessons LEFT JOIN  user on lessons.user_id=user.user_id LEFT JOIN records on records.lesson_id = lessons.lesson_id WHERE records.user_id=$user_id ";
        $data1 = $conn->query($sql1);
        
        $sql2 = "SELECT * FROM semester where user_id=$user_id";
        $data2 = $conn->query($sql2);
        $row2= $data2->fetch();
        $semester=$row2['semester'];

        $sql3="SELECT count(record_id) FROM records INNER JOIN lessons on records.lesson_id=lessons.lesson_id WHERE grade>5 and records.user_id=$user_id  and type='Υποχρεωτικό' ";
        $data3=$conn->query($sql3);
       $row3=$data3->fetch();
       $passedlessons=$row3['count(record_id)'];

       $sql4="SELECT count(record_id) FROM records INNER JOIN lessons on records.lesson_id=lessons.lesson_id WHERE status='Εγγεγραμμένος/η' and records.user_id=$user_id   ";
       $data4=$conn->query($sql4);
      $row4=$data4->fetch();
      $declaredlessons=$row4['count(record_id)'];

      $sql5="SELECT count(record_id) FROM records INNER JOIN lessons on records.lesson_id=lessons.lesson_id WHERE grade>5 and records.user_id=$user_id  and type='Επιλογής' ";
      $data5=$conn->query($sql5);
     $row5=$data5->fetch();
     $passedlessons2=$row5['count(record_id)'];


     $sql6="SELECT sum(ects) FROM lessons Left JOIN records on lessons.lesson_id=records.lesson_id WHERE records.grade>5 and records.user_id=$user_id   ";
     $data6=$conn->query($sql6);
    $row6=$data6->fetch();
    $ects=$row6['sum(ects)'];

        
    ?>



    <table class="show" id="tableshow">
    
        <thead>
        <h5 style="text-align:center;">Φοιτητής <?php echo $row['name']." " .$row['lastname']  ?></h5>
            <tr class="text">
                <th>Εξάμηνο</th>
                <th>Τίτλος Μαθήματος</th>
                <th>Καθηγητής</th>
                <th>Ects</th>
                <th>Είδος</th>
                <th>Βαθμός</th>
                <th>Εγγραφή</th>

            </tr>
        </thead>




        <tbody>
            
                <?php $i=0; while( $row1 = $data1->fetch()): $i++;  ?>
                    <tr id="row<?=$i?>">
                <td ><?=$row1['semester']?></td>
                <td><?=$row1['title']?></td>
                <td ><?=$row1['name']?> <?=$row1['lastname']?></td>
                <td ><?=$row1['ects']?></td>
                <td ><?=$row1['type']?></td>
                <td><?=$row1['grade']?></td>
                <td id="td<?=$i?>"><?=$row1['status']?></td>
              
                   
            <script>    

                
var row = document.getElementById("row<?=$i?>");
var td=document.getElementById("td<?=$i?>");
     var usersemester = "<?=$semester?>";
     var currentsemester="<?=$row1['semester']?>"
     var status="<?=$row1['status']?>";
     var grade = "<?=$row1['grade']?>";
     var record_id="<?=$row1['record_id']?>";


                    if(status==="Εγγεγραμμενος/η"){
                      
                        td.style.color="darkgreen";
                    }else if(status==="Μη Εγγεγραμμενος/η"){
                        td.style.color="red";
                    }
                      if(grade>5){
                          row.style.backgroundColor="lightgreen";
                          td.innerHTML=null;
                      }if(usersemester<currentsemester){
                          td.innerHTML=null;
                          row.style.backgroundColor="grey"
                      }
</script>
               
            </tr>
           
            <?php endwhile?>
<td colspan="2">Εξάμηνο:<?=$semester?><br>Βασικά Μαθήματα με προβιβάσιμο βαθμό:<?=$passedlessons?><br>Βασικά μαθήματα για πτυχίο:<?=8-$passedlessons?></td>
<td colspan="2">Μαθήματα που έχουν δηλωθεί:<?=$declaredlessons?><br>Μαθήματα Επιλογής με προβιβάσιμο βαθμό:<?=$passedlessons2?><br>Μαθήματα επιλογής για πτυχίο:<?=1-$passedlessons2?></td>
<td colspan="3"><br>Διδακτικές μονάδες:<?=$ects?><br>Διδακτικές μονάδες για πτυχίο:<?=45-$ects?></td>   


</tbody>



    </table>
    <hr>
</body>
<?php
    include("footer.php"); 
    ?>

</html>