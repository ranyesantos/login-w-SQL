<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "loginv2";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
    echo "falha na conexão:".mysqli_connect_error();
}


?>