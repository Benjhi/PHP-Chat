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
    <form action="" methos="post">
    <div class="form-header">
    <h2>Accede a tu cuenta</h2>
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" nombre="email" placeholder="alguien@gmail.com" autocomplete="off" required>
    </div>
    <div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" nombre="pass" placeholder="Contraseña" autocomplete="off" required>
    </div>
    <div class="small">¿Olvidaste tu contraseña? <a href="forgot_pass.php">Click aqui</a></div><br>
    <button type="submit" class="btn btn-primary btn btn-block btn-lg" name="sign_in">Ingresar</button>
    </div>
    <!-- <?php include("signin_user.php"); ?> -->
    </form>
    <div class="text-center medium" style="color: white;">¿No tienes una cuenta? <a href="signup.php" style="color: blue;">Crear cuenta</a></div>
    </div>
</body>
</html>