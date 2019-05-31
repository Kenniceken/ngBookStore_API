<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

  // include Database Connection
include 'config/dbConnect.php';

  try {
    // get Book by ID

    $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Book not Found.');
	
    $stmt = $DBCon->prepare("DELETE FROM books WHERE book_id = ? ");
    $stmt->bindParam(1, $id);

    if($stmt->execute()) {
      // Book Deleted
    echo json_encode(array('result'=>'success'));
    } else {
      echo json_encode(array('result'=>'fail'));
    }
  }
  // Catch PDO error
  catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
  }

?>
