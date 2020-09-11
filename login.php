<?php

if(!isset($_GET["email"]) || !isset($_GET["password"])){
  $response = [
    "status"=> 400,
    "Message" => "eroare ca lipsete un param",
    "data" => []
  ];
  echo json_encode($response);
  exit();

}
$email = $_GET["email"];
$password = $_GET["password"];

require "db_connect.php";

$result = $conn->query("select * from `users` where email = '$email' and password = '$password'");

if($result->num_rows){
  $row = $result->fetch_assoc();


}

$conn->close();

 ?>
