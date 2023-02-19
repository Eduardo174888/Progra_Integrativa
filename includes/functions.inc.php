<?php


function emptyInputSignup($nickname, $nombre, $apellido, $email, $pwd, $pwdRepeat) {
    $result = true;

    if (empty($nickname) || empty($nombre) || empty($apellido) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}


function pwdMatch($pwd, $pwdRepeat) {
    $result = true;

    if($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}


function uidExists($conn, $nickname, $email) {
    $sql = "SELECT * FROM usuarios WHERE Nickname = ? OR Correo = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login_signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $nickname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $nickname, $nombre, $apellido, $email, $pwd) {
    $sql = "INSERT INTO usuarios(Nickname, Nombre, Apellidos, Correo, PWD) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login_signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $nickname, $nombre, $apellido, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login_signup.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd) {
    $result = true;

    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}


function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false) {
        header("location: ../login_signup.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["PWD"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login_signup.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["ID_usuario"] = $uidExists["ID_Usuario"];
        $_SESSION["Nickname"] = $uidExists["Nickname"];

        header("location: ../index.php");
        exit();
    }
}