<?php 
if(isset($_POST['sub-button'])){
    echo "clicou";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form  method="POST">
        <input type="text" placeholder="Usuário" name="user" id=""><br>
        <input type="password" placeholder="Senha" name="password" id=""><br>
        <button type="submit" name="sub-button">Entrar</button>












    </form>
</body>
</html>