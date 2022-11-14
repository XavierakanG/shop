<?php
$conn=require_once("config.php");
$email = $_SESSION["email"];
$select = mysqli_query($link, "SELECT * FROM shop WHERE email = '$email'");
$row = mysqli_fetch_array($select);

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


    <script src="https://mwt.tw/lib/js/jquery-2.2.3.min.js"></script>
    <script src="https://mwt.tw/lib/js/bootstrap.min.js"></script>
    <script src="myCart.js"></script>


</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light container">
        <div class="container-fluid">
            <a class="navbar-brand" href="shopping.php">購物網站</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <ul class="navbar-nav me-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="member.php">會員專區</a>
                    </li>
                    <li class="nav-item d-flex ">
                        <p>歡迎<?php echo $_SESSION['email']; ?></p>
                        <a href="logout.php"> 登出</a>
                    </li>

                </ul>

                <form style="width:300px;" class="input-group">
                    <input class="form-control me-2" type="search" placeholder="搜尋" aria-label="搜尋">
                    <button class="btn btn-success" type="submit">搜尋</button>
                </form>
            </div>



        </div>


    </nav>
    <!-- header -->
    <header class="py-2 mb-3 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">水果大特賣，全館8折</span>
            </a>

        </div>

    </header>
    <!-- 會員資料 -->
    <form class="container" name="memberForm" action="member_finsh.php" method="post">
        
            <legend>會員資料</legend>
            <label>姓名:</label>
            <?php echo $row['name']?>
            <br>
            <br>

            <label>電子信箱:</label>
            <?php echo $_SESSION["email"]?>

            <br>
            <br>       

            <label>性別:</label>
            <?php echo $row["gender"]?>
          
            <br>
            <br>

            <label>生日:</label>
            <?php echo $row["birthday"]?>
            <br>
            <br>

            <label>住址:</label>
            <?php echo $row["area"]?><?php echo $row["area2"]?>
           
            <br>
            <br>

            <label>手機電話:</label>
            <?php echo $row["phone"]?>
            <br>
            <br>



            <a href="member1.php">修改會員資料</a>
            <a href="member2.php">修改密碼</a>
            <br>
            <br>
       
    </form>



    <!-- footer -->
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