<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");

if(!isset($_SESSION['user_email'])){
    header("location: signin.php");
}
else { ?>
<head>
        <title>Configurar cuenta</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
    <?php
        $user = $_SESSION['user_email'];
        $get_user = "select * from user where user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];

        $user_name = $row['user_name'];
        $user_pass = $row['user_pass'];
        $user_email = $row['user_email'];
        $user_profile = $row['user_profile'];
        $user_country = $row['user_country'];
        $user_gender = $row['user_gender'];
    ?>

    <div class="col-sm-8">
        <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover">
            <tr align="center">
                <td colspan="6" class="active"><h2>Cambiar configuracion de cuenta</h2></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Cambiar tu nombre de usuario</td>
                <td>
                    <input type="text" name="u_name" class="form-control" required value="<?php echo $user_name;?>" />
                </td>
            </tr>

            <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i> Cambiar perfil</td></tr>

            <tr>
                <td style="font-weight: bold;">Cambiar tu Email</td>
                <td>
                    <input type="email" name="u_email" class="form-control" required value="<?php echo $user_email;?>" />
                </td>
            </tr>

            <tr>
                <td style="font-weight: bold;">Pais</td>
                <td>
                    <select class="form-control" name="u_country">
                        <option><?php echo $user_country; ?></option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>JAPON</option>
                        <option>RUSIA</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="font-weight: bold;">Genero</td>
                <td>
                    <select class="form-control" name="u_gender">
                        <option><?php echo $user_gender; ?></option>
                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Otro</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="font-weight: bold;">Contraseña olvidada</td>
                <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Contraseña Olvidada</button>

                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="recovery.php?id=<?php echo $user_id; ?>" method="post" id="f">
                                        <strong>Quien es tu mejor amigo de la escuela?</strong>
                                        <textarea class="form-cont" cols="83" rows="4" name="content" placeholder="Alguien"></textarea><br>
                                        <input class="btn btn-default" type="submit" name="sub" value="submit" style="width: 100px;"><br><br>
                                        <pre></pre>

                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>

                </td>
            </tr>

        </table>
    </form>

        </form>

    </div>
    </div>
    
</body>
</html>