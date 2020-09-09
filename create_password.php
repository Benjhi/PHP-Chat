<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400, 700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Accede a tu cuenta</title>
</head>
<body>
    <div class="signin-form">
    <form action="" method="post">
    <div class="form-header">
    <h2>Crear nueva contraseña</h2>
    <p>AppChat</p>
    </div>
    <div class="form-group">
    <label>Ingresa tu Contraseña</label>
    <input type="password" class="form-control" name="pass1" placeholder="Contraseña" autocomplete="off" required>
    </div>
    <div class="form-group">
    <label>Confirmar Contraseña</label>
    <input type="password" class="form-control" name="pass2" placeholder="Contraseña" autocomplete="off" required>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary btn btn-block btn-lg" name="change">Cambiar</button>
    </div>
    </form>
    </div>

    <?php 
    
    session_start();

    include("include/connection.php");

    if(isset($_POST['change'])){
        $user = $_SESSION['user_email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if($pass1 != $pass2){
            echo"
                <div class='alert alert-danger'>
                    <strong>Tu nueva contraña no coincide</strong>
                </div>
            ";
        }

        if (strlen($pass1) < 9){
            echo"
            <div class='alert alert-danger'>
                <strong>La contraseña debe tener al menos 9 caracteres</strong>
            </div>
        ";
        }

        if($pass1 == $pass2){
            $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
            session_destroy();

            echo"
            <script>alert('Continua y logeate!')</script>";
            echo"<script>window.open('signin.php', '_self')</script>";
        }
    }
    
    ?>
</body>
</html>