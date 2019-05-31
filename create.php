<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, PATCH, DELETE, HEAD, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Authorization, Content-Type, Accept");


if ($_POST) {
  // include Database Connection here///
  include 'config/dbConnect.php';

  try {
	  
	  // Form Values
    $author_name = $_POST['author_name'];
    $author_email = $_POST['author_email'];
    $author_phone = $_POST['author_phone'];
    $author_bio = $_POST['author_bio'];
    $book_title = $_POST['book_title'];
    $book_desc = $_POST['book_desc'];
    $book_price = $_POST['book_price'];
	
    // PDO prepared Statement
    $stmt = $DBCon->prepare("INSERT INTO books (author_name, author_email, author_phone, author_bio, book_title, book_desc, book_price) VALUES (:author_name, :author_email, :author_phone, :author_bio, :book_title, :book_desc, :book_price) ");
    

    // Bind Params
    $stmt->bindParam(':author_name', $author_name);
    $stmt->bindParam(':author_email', $author_email);
    $stmt->bindParam(':author_phone', $author_phone);
    $stmt->bindParam(':author_bio', $author_bio);
    $stmt->bindParam(':book_title', $book_title);
    $stmt->bindParam(':book_desc', $book_desc);
    $stmt->bindParam(':book_price', $book_price);

    // Execute PDO prepared Statement
    if($stmt->execute()) {
      echo json_encode(array('result'=>'success'));
    } else {
      echo json_encode(array('result'=>'fail'));
    }


  } catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}

}





?>
