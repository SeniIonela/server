<?php

if(!isset($_GET['user_id'])){
  echo json_encode([
    'message' => "Missing param : user_id",
    'status' => 400,
    'data' => []
  ]);
  exit();
}

$user_id = $_GET['user_id'];

require_once "db_connect.php";

$sql = "SELECT `match_user_id` from `user_matches` where `initiator_user_id` = {$user_id}";
$res = $conn->query($sql);

$unmatched_users = [];

$user_ids = [$user_id];

if($res->num_rows){
  while($row = $res->fetch_assoc()){
    $user_ids[] = $row['match_user_id'];
  }
}
$sql = "Select * from users where id not in (".implode(',', $user_ids).")";
$res =  $conn->query($sql);

while($row = $res->fetch_assoc()){
  $unmatched_users[] = $row;
}

echo json_encode($unmatched_users);
exit();

?>
