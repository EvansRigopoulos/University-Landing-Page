<!DOCTYPE html>
<html lang="en">
<head >
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
    <title>Μεταπτυχιακό Πρόγραμμα Σπουδών</title>
    <div class = "banner">
        <div class="logo">
          <!-----Εδώ είναι το εικονίδιο με αντίστοιχη περιγραφή εικόνας αν δεν ανοίγει σωστά -->
       <img src="images\university.png" alt="Πανεπιστήμιο...">
        </div>
        <!---Περιγραφή σελίδας-->
        <div class="description">
        <h3>ΗΛΕΚΤΡΟΝΙΚΗ ΓΡΑΜΜΑΤΕΙΑ</h3>
        <p>ΜΕΤΑΠΤΥΧΙΑΚΟΥ ΠΡΟΓΡΑΜΜΑΤΟΣ ΣΠΟΥΔΩΝ..........</p>
        <p>TMHMA..........</p>
        <P>ΠΑΝΕΠΙΣΤΗΜΙΟ...........</P>
        </div >
        <!--Link σε μορφή button που μας οδηγεί στη σελίδα login-->
       
        <a class="btn btn-link" onClick href="logout.php" target="_self"> <?php echo $_SESSION['email']."";?> Αποσύνδεση<i class=" fa-sign-in-alt"></i></a>
         
        </div>
       
        <nav>
      <ul>
          <li><a href="memberprofessor.php" > <i class="fa far fa-university"></i>Αρχική</a></li>
          <li><a href="modifyuser.php"><i class="fa fa-books"></i>Τροποποίηση Στοιχείων</a></li>
            <li><a href="registeredlessons.php">Λίστα Μαθημάτων</a></li>
            
          
      </ul>
  </nav>
        
</head>
<body>
    
</body>
</html>