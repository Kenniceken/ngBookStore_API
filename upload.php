<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, PATCH, DELETE, HEAD, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Authorization, Content-Type, Accept");


if ($_POST) {

  // include Database Connection here///
  include 'config/dbConnect.php';

  try {
  $id = $_POST['id'];
  $avatar = $_FILES['avatar']['name'];
  $avatar_tmp = $_FILES['avatar']['tmp_name'];

  $tmp_dir = $_FILES['avatar']['tmp_name'];
  $avatarSize = $_FILES['avatar']['size'];

  if ($avatar) {

    $upload_dir = 'avatar/';
     $avatarExt = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));
     $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
     $avatar = rand(1000, 1000000) . "." . $avatarExt;

     move_uploaded_file($tmp_dir, $upload_dir.$avatar);
  }
  $updt_avatar = $DBCon->prepare("UPDATE books SET avatar = :avatar WHERE book_id = :id ");
  $updt_avatar->bindParam(':avatar', $avatar);
  $updt_avatar->bindParam(':id', $id);

  if($updt_avatar->execute()) {
    echo json_encode(array('result'=>'success'));
  } else {
    echo json_encode(array('result'=>'fail'));
  }
}
// Catch PDO error
catch(PDOException $exception){
  die('ERROR: ' . $exception->getMessage());
}

}


?>
