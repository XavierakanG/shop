<?php
//建立資料連線
$conn = require_once("config.php");


if (isset($_POST["action"]) && $_POST["action"] == 'update') {

    $name = @$_POST["name"];
    $email = $_SESSION["email"];
    $password = @$_POST["password"];
    $gender = @$_POST["gender"];
    $birthday = @$_POST["birthday"];
    $area = @$_POST["area"];
    $area2 = @$_POST["area2"];
    $phone = @$_POST["phone"];



    $sqll = "UPDATE shop SET `name` = '" . $name . "' , `gender` = '" . $gender . "', `birthday` = '" . $birthday . "', `area` = '" . $area . "', `area2` = '" . $area2 . "', `phone` = '" . $phone . "'  WHERE `email` ='" . $email . "'";

    $result = mysqli_query($conn, $sqll);

    if ($result) {

        function_alert1("修改成功!");
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}


mysqli_close($conn);


function function_alert1($message1)
{
    echo "<script>alert('$message1');
     window.location.href='member.php';
    </script>";
    
    return false;
} 

















// 註冊資料
// $username = @$_POST['name'] ;
// $email = @$_POST['email'];
// $password = @$_POST['password'];


// $link1= "insert into shop(name, email, password)values('$username','$email','$password')";
//差跳到主頁
// if(mysqli_query($link,$link1)){
//     echo '<script type = "text/javascript">';
//     echo 'alert("註冊成功");';
//     echo 'window.location.href = "shoppinglogin.php" ';
//     echo '</script>';
//    }
   //header("Location: shopping2.php ");
