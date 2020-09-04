<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap.min.js"></script>
    <title>App Chat - HOME</title>
</head>
<body>
    <div class="container main-section">
        <div class="row">
             <div class="col-md-3 col-sm-3 col-x-12 left-sidebar">
                 <div class="input-group searchbox">
                     <div class="input-group-btn">
                          <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Agregar nuevo usuario</button></a></center>
                     </div>

                 </div>
                 <div class="left-chat">
                     <ul>
                        <?php include("include/get_user_dta.php"); ?>
                     </ul>

                 </div>

             </div>
             <div class="col-md9 col-sm-9 col-xs-12 right-sidebar">
                 <div class="row">
                     <!-- Tomando la informacion de usuario que esta logeado -->
                     <?php
                         $user = $_SESSION['user_email'];
                         $get_user = "select * from users where user_email='$user'";
                         $run_user = mysqli_query($con, $get_user);
                         $row = mysqli_fetch_array($run_user);

                         $user_id = $row['user_id'];
                         $user_name = $row['user_name'];
                     ?>
                     <!-- Tomando los datos de usuario donde el usuario hace click -->
                     <?php
                         if(isset($GET['user_name'])){

                            global $con;
                             
                            $get_username = $GET['user_name'];
                            $get_user = "select * from users where user_name='$get_username'";

                            $run_user = mysqli_query($con, $get_user);

                            $row_user = mysqli_fetch_array($run_user);

                            $username = $row_user['user_name'];
                            $user_profile_image = $row_user['user_proflie']; 
                         }

                         $total_messages = "select * from users_chats where (sender_username='$user_name' AND receiver_username='$username' OR (receiver_username='$user_name' AND sender_username='$username')";
                         $run_messages = mysqli_query($con, $total_messages);
                         $total = mysqli_num_rows($run_messages);
                     ?>

                     <div class="col-md-12 right-header">
                         <div class="right-header-img">
                             <img src="<?php echo"$user_profile_image"; ?>">
                         </div>
                         <div class="right-header-details">
                             <form method="POST">
                                 <p><?php echo "$username"; ?></p>
                                 <span><?php echo $total; ?> Mensajes</span>&nbsp &nbsp
                                 <button name="logout" class="btn btn-danger">Deslogear</button>
                             </form>
                             <?php 
                                 if(isset($_POST['logout'])){
                                     $update_msg = mysqli_query($con, "UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");
                                     header("Location:logout.php");
                                     exit();
                                 }
                             ?>
                         </div>

                     </div>

                 </div>
                 <div class="row">
                     <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                         <?php
                             
                             $update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status='Leido' WHERE sender_username='$username' AND receiver_username='$user_name'");

                             
                         ?>
                     </div>

                 </div>
             </div>
        </div>

    </div>
</body>
</html>