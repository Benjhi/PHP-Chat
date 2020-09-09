<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");

if(!isset($_SESSION['user_email'])){
    header("location: signin.php");
}
else { ?>
<html>
<head>
        <title>Cambiar imagen de perfil</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<style>
body{
    overflow-x: hidden;
}
</style>
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/form-dta">
                <table class="table table-bordered table-hover">
            <tr align="center">
                <td colspan="6" class="active"><h2>Cambiar contraseña</h2></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Contraseña actual</td>
                <td>
                    <input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="Contraseña actual"/>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Nueva constraseña</td>
                <td>
                    <input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="Nueva contraseña"/>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Confirmar contraseña</td>
                <td>
                    <input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="Confirmar contraseña"/>
                </td>
            </tr>
            <tr align="center">
                <td colspan="6">
                    <input type="submit" name="change" value="Cambiar" class="btn btn-info"/>
                </td>
            </tr>
                </table>
        </form>
        <?php 
        
            if(isset($_POST['change'])){

                $c_pass = $_POST['current_pass'];
                $pass1 = $_POST['u_pass1'];
                $pass2 = $_POST['u_pass2'];

                $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email='$user'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);
        
                $user_password = $row['user_pass'];

                if($c_pass !== $user_password){
                    echo"
                        <div class='alert alert-danger'>
                        <strong>Tu vieja contraseña no coincide</strong>
                        </div>
                    ";
                }

                if($pass1 != $pass2){
                    echo"
                        <div>
                            <strong>Tu nueva contraña no coincide</strong>
                        </div>
                    ";
                }

                if (strlen($pass1) < 9){
                    echo"
                    <div>
                        <strong>La contraseña debe tener al menos 9 caracteres</strong>
                    </div>
                ";
                }
                
                if ($pass1 == $pass2 AND $c_pass == $user_password AND strlen($pass1) > 9){
                    $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
                    echo"
                        <div>
                            <strong>Contraseña cambiada exitosamente!</strong>
                        </div>
                ";
                }
            }

        ?>
        </div>
            <div class="col-sm-2">

            </div>
    </div>
    
</body>
</html>
<?php  } ?>