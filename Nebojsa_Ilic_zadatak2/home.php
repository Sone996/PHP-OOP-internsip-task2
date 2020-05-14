<?php
session_start();
include 'Classes/User.php';
include 'Classes/Firma.php';
$user = new User();
$firma = new Firma();
$id = $_SESSION['id'];
if (!$user->get_session()) {
    header("location:Singup.php");
    exit();
}
if (isset($_GET['q'])) {
    $user->user_logout();
    header("location:Singup.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <style>
            #singup_form
            {
                width:500px;
                min-height:330px;
                margin-top:100px;
                background-color:#585858;
                border-radius:3px;
                box-shadow:0px 0px 10px 0px #424242;
                padding:10px;
                box-sizing:border-box;
                font-family:helvetica;
                visibility:hidden;
                display:none;
            }
            #singup_form #close_singup
            {
                margin-left:-5px;
                margin-top:10px;
                width:250px;
                height:40px;
                border:none;
                border-radius:3px;
                color:#E6E6E6;
                background-color:grey;
                font-size:20px;
            }
            #singup_form p
            {
                margin-top:40px;
                font-size:22px;
                color:#E6E6E6;
            }
            #singup_form #naziv
            {
                width:250px;
                height:40px;
                border:2px solid silver;
                border-radius:3px;
                padding:5px;
            }
            #singup_form #drzava
            {
                margin-top:5px;
                width:250px;
                height:40px;
                border:2px solid silver;
                border-radius:3px;
                padding:5px;
            }
            #singup_form #br_zap
            {
                margin-top:5px;
                width:250px;
                height:40px;
                border:2px solid silver;
                border-radius:3px;
                padding:5px;
            }
            #singup_form #kreator
            {
                margin-top:5px;
                width:250px;
                height:40px;
                border:2px solid silver;
                border-radius:3px;
                padding:5px;
            }
        </style>



    </head>
    <body>
        <!-- Logout -->
        <header>
            <div class="jumbotron text-center">
                <h2>Hello <small><?php $user->get_username($id); ?>!</small></h2>
                <a class="btn btn-primary btn-md" href="login.php">LOGOUT</a>
            </div>
        </header>
        <main>
            <!--FIRME-->

            <div class="container" style>
                <?php
                $obj = new Firma();
                $obj->get_firme("firme");
                ?>
            </div>
            <!--ADD-->
            <?php include "js/add_firma.js"; ?>
            <?php include "new_firma.php"; ?>
        </main>
        <footer class="footer page-footer font-small blue pt-4" style="background-color: black;">
            <div class="text-center">
                <h2>Bye</h2>
                <a class="btn btn-primary btn-md" href="login.php">LOGOUT</a>
            </div>
        </footer>



    </body>
</html>
