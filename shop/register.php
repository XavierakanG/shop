<?php
//建立資料連線
$conn=require_once("config.php");



if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $name= @$_POST["name"];
    $email= @$_POST["email"];
    $password= @$_POST["password"];
    $gender= @$_POST["gender"];
    $birthday= @$_POST["birthday"];
    $area= @$_POST["area"];
    $area2= @$_POST["area2"];
    $phone= @$_POST["phone"];
  
    $check="SELECT * FROM shop WHERE email='".$email."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO shop (name, email, password, gender, birthday, area, area2, phone)
            VALUES('".$name."','".$email."','".$password."','".$gender."','".$birthday."','".$area."','".$area2."','".$phone."')";
        
        if(mysqli_query($conn, $sql)){
         
            function_alert1("註冊成功!回登入頁面");
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
     
        function_alert("電子郵件已有人使用!");
    }
}


mysqli_close($link);

function function_alert($message) { 
      
  
    echo "<script>alert('$message');
     window.location.href='register.html';
    </script>"; 
    
    return false;
} 

function function_alert1($message1) { 
       
    echo "<script>alert('$message1');
     window.location.href='index.php';
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
?>
