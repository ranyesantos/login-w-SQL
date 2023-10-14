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
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <?php 
         if(!empty($errors)){
            foreach($errors as $error){
                echo $error;
            }
        }
        ?>
    <div class="row">
        <div class=" col s6 m12 center push-m5 row"> 
            <form class="col  s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <br>
                <br>
                <div class="row">
                    <div class=" card-action input-field col s2" >
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" name="user" type="text" class="validate">
                    <label for="icon_prefix">First Name</label>
                    </div>
                </div>

                <div class="row" >
                    <div class="input-field col s2" >
                        <i class="material-icons prefix">https</i>
                        <input id="pass_icon_prefix" name="password" type="password" class="validate">
                        <label for="pass_icon_prefix">Senha</label>
                        <button type="submit" class=" cyan waves-effect waves-light btn" name="sub-button">Entrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
        <!--JavaScript at end of body for optimized loading-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>

