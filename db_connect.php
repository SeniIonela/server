<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proiect_app_mobile";

echo $servername;
exit();

//creaza conecxiune in baza de date
$conn = new mysql($servername , $username , $password, $dbname);
//verificam daca a existat vreo erroare la conexiune
if($conn->connect_error){
  //daca exista erroare se afiseaza mesajul de erorare
  $response = [
    "status" => 500,
    "message" => $conn->connect_error,
    "data" => []
   ];
   echo json_encode($response);
   exit();

}


 ?>
