<?php
$dbHost='localhost';
$dbName = 'ngbookstore';
$dbUser = 'root';
$dbPass = 'root123';

$dsn = "mysql:host=$dbHost;dbname=$dbName";

try{
    $DBCon = new PDO($dsn, $dbUser, $dbPass);

//    if ($DBCon){
//        echo "Connected to the <strong>$dbName</strong> database Successfully!!!";
//    }
}

catch (PDOException $e){
    echo $e->getMessage();
}


?>
