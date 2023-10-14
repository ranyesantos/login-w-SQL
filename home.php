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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>
<body>
    <div class="center-align" >
        <h1>Olá, <?php echo $data['nome'] ?></h1>
        <p class="flow-text">Infelizmente, ainda não há nada por aqui. Mas já estamos trabalhando nisso!</p>
            <div class="row" >
                <a class="btn-floating btn-small cyan pulse"><i class="material-icons">power_settings_new</i></a>
                <a href="action/logout.php">Logout</a>
            </div>
    </div>
</body>
</html>