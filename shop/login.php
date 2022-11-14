<?php

$conn=require_once "config.php";


if (isset($_POST['login'])) {
    $email = @$_POST['email'];
    $password = @$_POST['password'];
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    $select = mysqli_query($link, "SELECT * FROM shop WHERE email = '$email' AND `password` = '$password' ");
    $row = mysqli_fetch_array($select);

    if (is_array($row)) {
        $_SESSION["loggedin"]= true;
        $_SESSION["email"] = $row['email'];
        $_SESSION["password"] = $row['password'];
    } else {
        echo '<script type = "text/javascript">';
        echo 'alert("電子郵件或密碼錯誤");';
        echo 'window.location.href = "index.php" ';
        echo '</script>';
    }
}

if (isset($_SESSION["email"])) {
    header("location:welcome.php");
}

    // 關閉連線
    mysqli_close($link);

?>