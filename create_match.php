<?php

if(!isset($_GET['user_id']) || !isset($_GET['match_user_id']) || !isset($_GET['match'])){
  echo json_encode([
    'message' => "Missing param : user_id | match | match_id",
    'status' => 400,
    'data' => []
  ]);
  exit();
}

//me
$user_id = $_GET['user_id'];
//user I interacti with
$match_user_id = $_GET['match_user_id'];
//true / false
$match = $_GET['match'];

if($match == 'true'){
  $match = 'null';
}

require_once "db_connect.php";

$sql = "INSERT into `user_matches` (`initiator_user_id`, `match_user_id`, `match`) VALUES ($user_id, $match_user_id, $match)";
$res = $conn->query($sql);

echo json_encode([
]);
exit();

?>
