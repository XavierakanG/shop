<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;  
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>水果王國</title>
    <meta charset="UTF-8">
    <!-- 響應式網站 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js' integrity='sha512-jKxp7JHEN6peEmzmg6a7XJBORNTB0ITD2Pi+6FUkc16PCaNAJX2ahZ1ejn1p1uY37Pxyirn/0OMNZbITbEg3jw==' crossorigin='anonymous'></script>
    <!-- Boostrap 導入程式 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light container">
        <div class="container-fluid">
            <a class="navbar-brand" href="shopping.php">水果王國</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="register.html">註冊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">登入</a>
                    </li>
                </ul>

                <form style="width:300px;" class="input-group">
                    <input class="form-control me-2" type="search" placeholder="搜尋" aria-label="搜尋">
                    <button class="btn btn-success" type="submit">搜尋</button>
                </form>
            </div>



        </div>


    </nav>
    <div class="container">
    <form class="container" action="login.php" method="post">

        <fieldset>
            <legend>會員登入</legend>

            <label>電子信箱:</label>
            <input type="email" name="email" id="email" placeholder="請輸入XXXX@XXX.com" size="40" required>
            <br>
            <br>

            <label>密碼:</label>
            <input type="password" name="password" id="password" placeholder="請輸入密碼" size="40" required>
            <br>
            <br>

            <input type="submit" value="登入" name="login">
            <br>
            <br>
            <a href="register.html">還沒有帳號？現在就註冊！</a>

    </form>
    </div>
    <div class="footer bg-light container">

        <br>

        <div class="row container">
            <div class="col-6 col-md">
                <ul class="list-unstyled text-small">
                    <li class=" fs-2 mx-3 ">水果王國</li>
                </ul>
            </div>
            <div class="col-5 col-md ">
                <h5>關於水果王國</h5>
                <ul class="list-unstyled ">
                    <li class="mb-1"><a class="link-dark ">起源</a></li>
                    </li>
                </ul>
            </div>
            <div class="col-5 col-md ">
                <h5>顧客權益</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-1"><a class="link-dark ">聯絡我們</a></li>
                    <li class="mb-1"><a class="link-dark ">防詐騙宣導</a></li>
                </ul>
            </div>
            <div class="col-5 col-md ">
                <h5>其他服務</h5>
                <ul class="list-unstyled">
                    <li class="mb-1"><a class="link-dark ">常見Q&A</a></li>
                </ul>
            </div>

        </div>
        <br>
        <div class="text-center ">本網站產品已投保xxx產物產品責任保險$xxxxxxxxxxx元。保險證號：xxxx字第xxxxxxxxxxxxxxx號</div>
        <br>
        <div class="text-center ">© 2022 Company, Inc</div>
    </div>


</body>

</html>