<?php 
require_once 'action/db_connect.php';
session_start();

if(isset($_POST['sub-button'])){
    $errors = array();
    $user = mysqli_escape_string($connect,$_POST['user']);
    $password = mysqli_escape_string($connect,$_POST['password']);
    

    if(empty($user) or empty($password)){
        $errors[] = "<li>o campo login/senha está vazio</li>";
        
    } 
    else{
        $sql = "SELECT username FROM users WHERE username = '$user'";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result) >= 1){
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$password'";
            $result = mysqli_query($connect,$sql);
            mysqli_close($connect);
            if(mysqli_num_rows($result) == 1){
                $data = mysqli_fetch_array($result);
                $_SESSION['logged-in'] = true;
                $_SESSION['id_user'] = $data['id'];
                header('location: home.php');
            } else{
                $errors[] = "<li>usuário e senha não conferem</li>";
            }
        } else{
            $errors[] = "<li>usuário inexistente</li>";
        }  
    }
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

<?php 
if(!empty($errors)){
    foreach($errors as $error){
        echo $error;
    }
}
?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" placeholder="Usuário" name="user" id=""><br>
        <input type="password" placeholder="Senha" name="password" id=""><br>
        <button type="submit" name="sub-button">Entrar</button>
    </form>
</body>
</html>