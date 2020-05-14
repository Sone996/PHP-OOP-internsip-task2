<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
//if (!defined("BASE_PATH"))
//    define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'], 0, -1 * strlen($_SERVER['SCRIPT_NAME'])));
include 'connection.php';
class User {

    public $db;

    /*     * * for registration process ** */

    public function reg_user($username, $password) {
        $conn = db();
        //$password = md5($password);
        $sql = "SELECT * FROM user WHERE username='$username'";
//checking if the username is available in db
        $check = $conn->query($sql);
        $count_row = $check->num_rows;
//if the username is not in db then insert to the table
        if ($count_row == 0) {
            $sql = "INSERT INTO user SET username='$username', password='$password'";
            // $sql= "INSERT INTO user(username) VALUES('$username')";   ALTERNATIVE
            $result = $conn->query($sql);
            return $result;
        } else {
            return false;
        }
    }

    /*     * * for login process ** */

    public function check_login($username, $password) {
        $conn = db();
        //$password = md5($password);
        $sql = "SELECT id FROM user WHERE username='$username' AND password='$password'";
//checking if the username is available in the table
        $result = $conn->query($sql);
        $user_data = $result->fetch_assoc();
        $count_row = $result->num_rows;
        if ($count_row == 1) {
// this login variable will use for the session 
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            return true;
        } else {
            return false;
        }
    }

    /*     * * for showing the username ** */

    public function get_username($id) {
        $conn = db();
        $sql = "SELECT username FROM user WHERE id = $id";
        $result = $conn->query($sql);
        $user_data = $result->fetch_assoc();
        echo $user_data['username'];
    }

    /*     * * starting the session ** */

    public function get_session() {
        return $_SESSION['login'];
    }

    public function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

}
