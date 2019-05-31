<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, PATCH, DELETE, HEAD, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Authorization, Content-Type, Accept");

// Get Params Values, here the record ID isset() is a PHP function used to verify whether or not there's a Value found
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

// include Database Connection
include 'config/dbConnect.php';

// Fetch and Read Fetched Data(Products)

try {
  // PDO Prepared Statement
  $stmt = $DBCon->prepare( "SELECT book_id, author_name, author_email, author_phone, author_bio, book_title, book_desc, book_price, avatar FROM books WHERE book_id = ? LIMIT 0,1" );

  // We bind the fetched Data
  $stmt->bindParam(1, $id);

  //Execute PDO Query
  $stmt->execute();

  // Store Fetched row to a Variable
  $row_book = $stmt->fetch(PDO::FETCH_ASSOC);
  $json = json_encode($row_book);
  echo $json;
}

// Catch PDO error
catch(PDOException $exception){
  die('ERROR: ' . $exception->getMessage());
}
