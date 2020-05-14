<?php

session_start();
include '../Classes/User.php';
if (isset($_REQUEST['login'])) {
    $user = new User();
    extract($_REQUEST);
    $login = $user->check_login($username, $password);  //ili ovo
    if ($login) {
        // Registration Success
        header("location: ../home.php");
         echo '<script>window.location = "../home.php"</script>';
        exit();
    } else {
        // Registration Failed
        // echo 'Wrong username or password';
        $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Unable to login</strong>! Wrong username or password.
	</div>';
        header("location: ../index.php");
        exit();
    }
}
