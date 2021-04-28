<?php
session_start();

include("config.php");

?>

<?php


$sql="SELECT name,lastname,count(grade),avg(grade) FROM user Left Join semester on user.user_id = semester.user_id Left Join records on user.user_id = records.user_id WHERE  semester = '".$_POST['semester']."' AND grade>4 group by lastname ";
$data = $conn->query($sql);

$imp = new DOMImplementation;
$dtd = $imp->createDocumentType('studentList','','studentList.dtd');

$xml = $imp->createDocument("","",$dtd);
$xml->encoding = 'UTF-8';
$xml->formatOutput = true;

// Δημιουργούμε το στοιχείο - ρίζα και το προσθέτουμε στο xml.
$studentList = $xml->createElement("studentList");
$xml->appendChild($studentList);
while($row=$data->fetch()){
    $name=$row['name'];
    $lastname= $row['lastname'];
    $lessons=$row['count(grade)'];
    $avg=$row['avg(grade)'];
    $semester=$_POST['semester'];

    $student=$xml->createElement("student");
    $studentList->appendChild($student);

    $Sname=$xml->createElement("name",$name);
    $student->appendChild($Sname);

    $Slastname=$xml->createElement("lastname",$lastname);
    $student->appendChild($Slastname);

    $Slessons=$xml->createElement("lessons",$lessons);
    $student->appendChild($Slessons);

    $Savg=$xml->createElement("avg",$avg);
    $student->appendChild($Savg);

    $Ssemester=$xml->createElement("semester",$semester);
    $student->appendChild($Ssemester);
}
$sql2="SELECT name,lastname,count(grade),avg(grade) FROM user Left Join semester on user.user_id = semester.user_id Left Join records on user.user_id = records.user_id WHERE  semester = '".$_POST['semester']."' AND grade>4 group by lastname Order BY avg(grade) DESC limit 2 ";
$data2 = $conn->query($sql2);
while($row2=$data2->fetch()){
    $name2 = $row2['name'];
    $lastname2= $row2['lastname'];
    $lessons2=$row2['count(grade)'];
    $avg2=$row2['avg(grade)'];

    $highaverage=$xml->createElement("highaverage");
    $studentList->appendChild($highaverage);

    $Sname2=$xml->createElement("Sname",$name2);
    $highaverage->appendChild($Sname2);

    $Slastname2=$xml->createElement("Slastname",$lastname2);
    $highaverage->appendChild($Slastname2);

    $Slessons2=$xml->createElement("Slessons",$lessons2);
    $highaverage->appendChild($Slessons2);

    $Savg2=$xml->createElement("Savg",$avg2);
    $highaverage->appendChild($Savg2);

}


$xml->saveXML();
$xml->save("studentList".$_POST['semester'].".xml");




?>

<?php 

$xml_filename = "studentList".$_POST['semester'].".xml";
$xsl_filename = "studentList.xsl";
$xml = new DOMDocument();
$xml->load($xml_filename);
$xsl = new DOMDocument();
$xsl->load($xsl_filename);


if (!$xml->validate()) {
        	    
    echo "<p>Το XML αρχείο δεν είναι έγκυρο σύμφωνα με το DTD. ";
}else
$proc = new XSLTProcessor();

$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);


    ?>
   