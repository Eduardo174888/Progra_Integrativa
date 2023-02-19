<?php

if (isset($_POST["submit"])) {
    
    $nickname = $_POST["Nickname"];
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["Apellido"];
    $email = $_POST["Email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pswRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($nickname, $nombre, $apellido, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../login_signup.php?error=emptyinput");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../login_signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $nickname, $email) !== false) {
        header("location: ../login_signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $nickname, $nombre, $apellido, $email, $pwd);

}
else {
    header("location: ../login_signup.php");
}