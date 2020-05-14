<?php

session_start();
include '../Classes/Firma.php';
$firma = new Firma(); // Checking for user logged in or not
if (isset($_REQUEST['register_firma'])) {
    extract($_REQUEST);
    $register_firma = $firma->reg_firma($naziv_firme, $drzava, $br_zap, $napravio);
    if ($register_firma) {
        // Registration Success
        // echo 'Registration successful <a href="login.php">Click here</a> to login';
        $_SESSION['msg'] = '<div class="alert alert-success alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Success</strong>! Registration successful. <a href="login.php">Click here</a> to login.
	</div>';
        header("location: ../home.php");
        exit();
    } else {
        // Registration Failed
        echo 'Registration failed. Username already exits please try again';
        $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Registration failed</strong>! Name already exists.
	</div>';
        header("location: ../home.php");
        exit();
    }
}