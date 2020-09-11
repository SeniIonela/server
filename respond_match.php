<?php

if(!isset($_GET['match']) || !isset($_GET['match_id'])){
  echo json_encode([
    'message' => "Missing param : user_id | match | match_id",
    'status' => 400,
    'data' => []
  ]);
  exit();
}

$user_id = $_GET['user_id'];
$match_id = $_GET['match_id'];
$match = $_GET['match'];

require_once "db_connect.php";

$sql = "UPDATE user_matches set `match` = {$match} where id = $match_id and `match` is null";
$res = $conn->query($sql);

print_r($res);

echo json_encode([
  'message' => "Match Succes",
  'status' => 200,
  'data' => []
]);
exit();

?>
