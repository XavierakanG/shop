<?php
session_start();
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

    <script id="rendered-js">
        $(function() {

            var goToCartIcon = function($addTocartBtn) {
                var $cartIcon = $(".my-cart-icon");
                var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
                    "position": "fixed",
                    "z-index": "999"
                });
                $addTocartBtn.prepend($image);
                var position = $cartIcon.position();
                $image.animate({
                        top: position.top,
                        left: position.left
                    },
                    500, "linear",
                    function() {
                        $image.remove();
                    });
            };

            $('.my-cart-btn').myCart({
                currencySymbol: 'NT$',
                classCartIcon: 'my-cart-icon',
                classCartBadge: 'my-cart-badge',
                classProductQuantity: 'my-product-quantity',
                classProductRemove: 'my-product-remove',
                classCheckoutCart: 'my-cart-checkout',
                affixCartIcon: true,
                showCheckoutModal: true,
                numberOfDecimals: 0,
                clickOnAddToCart: function($addTocart) {
                    goToCartIcon($addTocart);
                },
                afterAddOnCart: function(products, totalPrice, totalQuantity) {
                    console.log("afterAddOnCart", products, totalPrice, totalQuantity);
                },
                clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
                    console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
                },
                checkoutCart: function(products, totalPrice, totalQuantity) {
                    var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
                    checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
                    $.each(products, function() {
                        checkoutString += "\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image;
                    });
                    alert(checkoutString);
                    console.log("購買", products, totalPrice, totalQuantity);
                },
                getDiscountPrice: function(products, totalPrice, totalQuantity) {
                    console.log("折扣計算", products, totalPrice, totalQuantity);
                    return totalPrice * 0.8;
                }
            });


            $("#addNewProduct").click(function(event) {
                var currentElementNo = $(".row").children().length + 1;
                $(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>');
            });
        });
    </script>
    <style>
        h1 {
            text-align: center;
        }



        .badge {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: #777;
            border-radius: 10px
        }


        .badge-notify {
            background-color: red;
            position: relative;
            top: -20px;
            right: 10px;
        }

        .glyphicon-shopping-cart:before {
            content: "\e116";
        }

        .my-cart-icon-affix {
            position: fixed;
            z-index: 999;
        }
    </style>

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
    <!-- 商品 -->
    <div class="page-header">
        <h1>水果商品
            <div style="float: right; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart-fill my-cart-icon" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />

                </svg><span class="badge badge-notify my-cart-badge"></span>
            </div>
        </h1>
    </div>
    <div class="row ">
        <div class="col-sm-6 col-md-4  text-center">
            <img src="img/a.jpg" width="150px" height="150px">
            <br>
            蘋果禮盒 - <strong>300元</strong>
            <br>
            <button class="btn btn-danger my-cart-btn" data-id="1" data-name="蘋果禮盒" data-summary="summary 1" data-price="300" data-quantity="1" data-image="img/a.jpg">加入購物車</button>
            <a href="#" class="btn btn-info">產品內容</a>
        </div>

        <div class="col-sm-6 col-md-4  text-center">
            <img src="img/g.jpg" width="150px" height="150px">
            <br>
            橘子禮盒 - <strong>250元</strong>
            <br>
            <button class="btn btn-danger my-cart-btn" data-id="2" data-name="橘子禮盒" data-summary="summary 2" data-price="250" data-quantity="1" data-image="img/g.jpg">加入購物車</button>
            <a href="#" class="btn btn-info">產品內容</a>
        </div>

        <div class="col-sm-6 col-md-4  text-center">
            <img src="img/o.jpg" width="150px" height="150px">
            <br>
            芭樂禮盒 - <strong>200元</strong>
            <br>
            <button class="btn btn-danger my-cart-btn" data-id="3" data-name="芭樂禮盒" data-summary="summary 3" data-price="200" data-quantity="1" data-image="img/o.jpg">加入購物車</button>
            <a href="#" class="btn btn-info">產品內容</a>
        </div>

    </div>


<!-- 跳出購物車視窗 -->
    <div class="modal fade" id="my-cart-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />

                        </svg></span> 購物車</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>
                <div class="modal-body">
                    <table class="table table-hover table-responsive" id="my-cart-table">
                        <tbody>
                            <tr title="summary 1" data-bs-id="1" data-bs-price="10">
                                <td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_1.png"></td>
                                <td>product 1</td>
                                <td title="Unit Price" class="text-right">$10.00</td>
                                <td title="Quantity"><input type="number" min="1" style="width: 70px;" class="my-product-quantity" value="5"></td>
                                <td title="Total" class="text-right my-product-total">$50.00</td>
                                <td title="Remove from Cart" class="text-center" style="width: 30px;"><a href="javascript:void(0);" class="btn btn-xs btn-danger my-product-remove">X</a></td>
                            </tr>
                            <tr title="summary 2" data-bs-id="2" data-bs-price="20">
                                <td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_2.png"></td>
                                <td>product 2</td>
                                <td title="Unit Price" class="text-right">$20.00</td>
                                <td title="Quantity"><input type="number" min="1" style="width: 70px;" class="my-product-quantity" value="1"></td>
                                <td title="Total" class="text-right my-product-total">$20.00</td>
                                <td title="Remove from Cart" class="text-center" style="width: 30px;"><a href="javascript:void(0);" class="btn btn-xs btn-danger my-product-remove">X</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><strong>總價</strong></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><strong id="my-cart-grand-total">$70.00</strong></td>
                                <td></td>
                            </tr>
                            <tr style="color: red">
                                <td></td>
                                <td><strong>總價 (包含折扣)</strong></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><strong id="my-cart-discount-price">$35.00</strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">關閉</button>
                    <button type="button" class="btn btn-primary my-cart-checkout">購買</button>
                </div>
            </div>
        </div>
    </div>

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