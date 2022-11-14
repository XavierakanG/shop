<?php
//建立資料連線
$conn=require_once("config.php");



if(isset($_POST["action1"]) && $_POST["action1"] == 'number'){
    
    
    $password= @$_POST["password"];
    $newpassword= @$_POST["newpassword"];
    $newpassword_check= @$_POST["newpassword_check"];
    $email = $_SESSION["email"];
    $select = mysqli_query($link, "SELECT * FROM shop WHERE email = '$email'");
    $row = mysqli_fetch_array($select);

    $checknum = $row["password"];

    

    if($password == $checknum){
        $sqlll="UPDATE shop SET `password` = '".$newpassword."'  WHERE `email` ='".$email."'";
            
        $result = mysqli_query($conn, $sqlll);
            
        if($result){
            
            function_alert1("修改密碼成功!");
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    } else {

        function_alert("原密碼錯誤!");
    }
}


echo 

mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='member2.php';
    </script>"; 
    
    return false;
} 


function function_alert1($message1) { 
      
    // Display the alert box  
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
