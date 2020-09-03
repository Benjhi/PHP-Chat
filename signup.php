<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <title>Crear nueva cuenta</title>
</head>

<body>
    <div class="signup-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Registrarse</h2>
                <p>Completa este formulario y disfruta de AppChat</p>
            </div>
            <div class="form-group">
                <label>Nombre de usuario</label>
                <input type="text" class="form-control" name="user_name" placeholder="Ejemplo: Renzo" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="user_pass" placeholder="Contraseña" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Correo electronico</label>
                <input type="email" class="form-control" name="user_email" placeholder="alguien@gmail.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Pais</label>
                <select class="form-control" name="user_country" require>
                   <option disabled="">Seleccciona un pais</option>
                   <option>Argentina</option> 
                   <option>Chile</option> 
                   <option>Uruguay</option> 
                   <option>Peru</option> 
                   <option>Ecuador</option> 
                   <option>Bolivia</option> 
                   <option>Mexico</option> 
                   <option>España</option> 
                </select>
            </div>
            <div class="form-group">
                <label>Genero</label>
                <select class="form-control" name="user_gender" require>
                   <option disabled="">Seleccciona tu genero</option>
                   <option>Hombre</option> 
                   <option>Mujer</option> 
                   <option>Helicoptero apache de combate</option> 
                   <option>Otro</option> 
                </select>
            </div>
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required>Acepto los<a href="#"> Terminos y condiciones</a></label>
            </div>

    <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up" >Registrar</button>
    </div>
    <?php include("signup_user.php"); ?>
    </form>
    <div class="text-center medium" style="color: white;">¿Ya tienes una cuenta? <a href="signin.php" style="color: blue;">Ingresa aqui</a></div>
    </div>
</body>

</html>