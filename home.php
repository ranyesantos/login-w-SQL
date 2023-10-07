<?php 
require_once 'action/db_connect.php';

session_start();

if(!isset($_SESSION['logged-in'])){
    header('Location:index.php');
}

$id = $_SESSION['id_user'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($result);
mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>olá <?php echo $data['nome'] ?></h1>
    <a href="action/logout.php">Logout</a>
</body>
</html>