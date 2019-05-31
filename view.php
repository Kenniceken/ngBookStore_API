<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, PATCH, HEAD, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Authorization, Content-Type, Accept");

// include Database Connection here///
include 'config/dbConnect.php';


//Select All Boosts
$stmt = $DBCon->prepare("SELECT book_id, author_name, author_email, author_phone, author_bio, book_title, book_desc, book_price, avatar FROM books ORDER BY book_id DESC");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;



?>
