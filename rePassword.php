<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tìm lại mật khẩu || KT-Shop Mirai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="img\favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="css\font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="css\ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="css\linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="css\nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="css\jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="css\jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="css\meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="css\nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="css\owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="css\default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css\responsive.css">

    <!-- Modernizer js -->
    <script src="js\vendor\modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Main Wrapper Start Here -->
    <?php 
        
        include 'connect.php';
        $user = (isset($_SESSION['rEmail']) ? $_SESSION['rEmail']: []);
       
        $error = [];
        
        if(isset($_POST['submit'])){
        	$newPass=$_POST['newPass'];
        	$reNewPass = $_POST['reNewPass'];
        	if(empty($_POST['newPass']) && empty($_POST['reNewPass'])){
        		$error['password'] = 'Bạn chưa nhập mật khẩu';
        	}
        	if(!empty($_POST['newPass']) && strlen($_POST['newPass'])< 6){
        		$error['newPass'] = 'Mật khẩu phải lớn hơn 6 kí tự';
        	}
        	if($_POST['newPass']!=$_POST['reNewPass']){
        		$error['reNewPass'] = 'Nhập lại mật khẩu không đúng';
        	}
        	if(empty($error)){
        		
        		$pass = password_hash($newPass, PASSWORD_DEFAULT);
        		$sql 		= "UPDATE user SET Password= '$pass' WHERE Email = '$user' ";
        		$result 	= mysqli_query($connect, $sql);
        		if($result){
        			unset($_SESSION['user']);
        			header('Location: login.php');
        		}
        	}
        }
     ?>
    <div class="wrapper">
       <!-- Banner Popup Start -->
        <div class="popup_banner">
            <span class="popup_off_banner">×</span>
            <div class="banner_popup_area">
                    <img src="img\banner\pop-banner.jpg" alt="">
            </div>
        </div>
        <!-- Banner Popup End -->        
       <!-- Newsletter Popup Start -->
       <div class="popup_wrapper">
        <div class="test">
            <span class="popup_off">Đóng</span>
            <div class="subscribe_area text-center mt-60">
                <h2>Thông báo</h2>
                <p>Đăng ký theo dõi KT-Shop Mirai để nhận thông tin cập nhật được gửi qua e-mail về hàng mới, ưu đãi đặc biệt và thông tin giảm giá khác.</p>
                <div class="subscribe-form-group">
                    <form action="#">
                        <input autocomplete="off" type="text" name="message" id="message" placeholder="Nhập e-mail của bạn">
                        <button type="submit">Theo dõi</button>
                    </form>
                </div>
                <div class="subscribe-bottom mt-15">
                    <input type="checkbox" id="newsletter-permission">
                    <label for="newsletter-permission">Không hiện thông báo này nữa!</label>
                </div>
            </div>
        </div>
    </div>
        <!-- Newsletter Popup End -->
        <!-- Main Header Area Start Here -->
        <header>
            <!-- Header Top Start Here -->
            <div class="header-top-area">
                <div class="container">
                    <!-- Header Top Start -->
                    <div class="header-top">
                        <ul>
                            <li><a href="#">Miễn phí Ship khi đặt hàng hơn $100</a></li>
                            <li><a href="checkout.html">Thanh Toán</a></li>
                        </ul>
                        <ul>                                          
                            <!-- <li><span>Language</span> <a href="#">English<i class="lnr lnr-chevron-down"></i></a> -->
                                <!-- Dropdown Start -->
                                <!-- <ul class="ht-dropdown">
                                    <li><a href="#"><img src="img\header\1.jpg" alt="language-selector">English</a></li>
                                    <li><a href="#"><img src="img\header\2.jpg" alt="language-selector">Francis</a></li>
                                </ul> -->
                                <!-- Dropdown End -->
                            <!-- </li>
                            <li><span>Currency</span><a href="#"> USD $ <i class="lnr lnr-chevron-down"></i></a> -->
                                <!-- Dropdown Start -->
                                <!-- <ul class="ht-dropdown">
                                    <li><a href="#">&#36; USD</a></li>
                                    <li><a href="#"> € Euro</a></li>
                                    <li><a href="#">&#163; Pound Sterling</a></li>
                                </ul> -->
                                <!-- Dropdown End -->
                            <!-- </li> -->
                            <li><a href="#">Tài khoản của tôi<i class="lnr lnr-chevron-down"></i></a>
                                <!-- Dropdown Start -->
                                <ul class="ht-dropdown">
                                    <li><a href="login.html">Đăng nhập</a></li>
                                    <li><a href="register.html">Đăng ký</a></li>
                                </ul>
                                <!-- Dropdown End -->
                            </li> 
                        </ul>
                    </div>
                    <!-- Header Top End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Top End Here -->
            <!-- Header Middle Start Here -->
            <div class="header-middle ptb-15">
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mb-all-30">
                                <a href="index.html"><img src="img\logo\logo.png" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                            <div class="categorie-search-box">
                                <form action="#">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="poscats">
                                            <option value="0">Tất cả danh mục</option>
                                            <option value="2">Sản phẩm mới</option>
                                            <option value="3">Cameras</option>
                                            <option value="4">Dây và Cáp</option>
                                            <option value="5">Phụ kiện gps</option>
                                            <option value="6">Microphones</option>
                                            <option value="7">Máy phát không dây </option>
                                            <option value="8">GamePad</option>
                                            <option value="9">Game đời sống HD</option>
                                            <option value="10">Túi</option>
                                            <option value="11">Giày</option>
                                            <option value="12">Váy</option>
                                            <option value="13">Phù hợp </option>
                                            <option value="14">Nhà cửa &amp; đời sống</option>
                                            <option value="15">Các thiết bị lớn</option>
                                            <option value="16">Ghế sofa</option>
                                            <option value="17">Giường ngủ</option>
                                            <option value="18">Nệm</option>
                                            <option value="19">Tủ</option>
                                            <option value="20">Các thiết bị nhỏ</option>
                                            <option value="21">Túi đeo chéo </option>
                                            <option value="22">Áo khoác</option>
                                            <option value="23">Kệ</option>
                                            <option value="24">Giày</option>
                                            <option value="25">Điện thoại di động &amp; Tablets</option>
                                            <option value="26">Tablet</option>
                                            <option value="27">Điện thoại di động</option>
                                        </select>
                                    </div>
                                    <input type="text" name="search" placeholder="Tìm kiếm sản phẩm tại đây...">
                                    <button><i class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        <!-- Cart Box Start Here -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart-box mt-all-30">
                                <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                    <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">2</span><span>Giỏ hàng</span></span></a>
                                        <ul class="ht-dropdown cart-box-width">
                                            <li>
                                                <!-- Cart Box Start -->
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="img\products\1.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">X1</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Sản phẩm: Printed Summer Red </a></h6>
                                                        <span class="cart-price">Giá: 27.45</span>
                                                        <span>Size: S</span>
                                                        <span>Màu: Yellow</span>
                                                    </div>
                                                    <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                                </div>
                                                <!-- Cart Box End -->
                                                <!-- Cart Box Start -->
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="img\products\2.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">X1</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Round Neck</a></h6>
                                                        <span class="cart-price">45.00</span>
                                                        <span>Size: XL</span>
                                                        <span>Color: Green</span>
                                                    </div>
                                                    <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                                </div>
                                                <!-- Cart Box End -->
                                                <!-- Cart Footer Inner Start -->
                                                <div class="cart-footer">
                                                   <ul class="price-content">
                                                       <li>Tổng phụ<span>$57.95</span></li>
                                                       <li>Phí Ship<span>$7.00</span></li>
                                                       <li>Thuế<span>$0.00</span></li>
                                                       <li>Tổng<span>$64.95</span></li>
                                                   </ul>
                                                    <div class="cart-actions text-center">
                                                        <a class="cart-checkout" href="checkout.html">Thanh toán</a>
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Yêu</span><span>thích (0)</span></span></a>
                                </ul>
                            </div>
                        </div>
                        <!-- Cart Box End Here -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Middle End Here -->
            <!-- Header Bottom Start Here -->
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                         <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                            <span class="categorie-title">Danh mục</span>
                        </div>                       
                        <div class="col-xl-9 col-lg-8 col-md-12 ">
                            <nav class="d-none d-lg-block">
                                <ul class="header-bottom-list d-flex">
                                    <li class="active"><a href="index.html">Trang chủ<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown">
                                            <li><a href="index.html">Home 1</a></li>
                                            <li><a href="index-2.html">Home 2</a></li>
                                            <li><a href="index-3.html">Home 3</a></li>
                                            <li><a href="index-4.html">Home 4</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="shop.html">shop<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="product.html">Thông tin chi tiết sản phẩm</a></li>
                                            <li><a href="compare.html">Đánh giá sản phẩm</a></li>
                                            <li><a href="cart.html">Giỏ hàng</a></li>
                                            <li><a href="checkout.html">Thanh toán</a></li>
                                            <li><a href="wishlist.html">Yêu thích</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="single-blog.html">Chi tiết blog </a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="#">pages<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="contact.html">Liên hệ</a></li>
                                            <li><a href="register.html">Đăng ký</a></li>
                                            <li><a href="login.html">Đăng nhập</a></li>
                                            <li><a href="forgot-password.html">Quên mật khẩu</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="contact.html">Liên hệ</a></li>
                                    <li><a href="about.html">About us</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">home</a>
                                            <!-- Home Version Dropdown Start -->
                                            <ul>
                                                <li><a href="index.html">Home Version 1</a></li>
                                                <li><a href="index-2.html">Home Version 2</a></li>
                                                <li><a href="index-3.html">Home Version 3</a></li>
                                                <li><a href="index-4.html">Home Version 4</a></li>
                                            </ul>
                                            <!-- Home Version Dropdown End -->
                                        </li>
                                        <li><a href="shop.html">shop</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="product.html">product details</a></li>
                                                <li><a href="compare.html">compare</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="single-blog.html">blog details</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="#">pages</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="register.html">register</a></li>
                                                <li><a href="login.html">sign in</a></li>
                                                <li><a href="forgot-password.html">forgot password</a></li>
                                                <li><a href="404.html">404</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="about.html">about us</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End Here -->
            <!-- Mobile Vertical Menu Start Here -->
            <div class="container d-block d-lg-none">
                <div class="vertical-menu mt-30">
                    <span class="categorie-title mobile-categorei-menu">Danh mục </span>
                    <nav>  
                        <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                            <ul>
                                <li class="has-sub"><a href="#">Automotive & Motorcycle </a>
                                    <ul class="category-sub">
                                        <li class="has-sub"><a href="shop.html">Office chair</a>
                                            <ul class="category-sub">
                                                <li><a href="shop.html">Bibendum Cursus</a></li>
                                                <li><a href="shop.html">Dignissim Turpis</a></li>
                                                <li><a href="shop.html">Dining room</a></li>
                                                <li><a href="shop.html">Dining room</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub"><a href="shop.html">Purus Lacus</a>
                                            <ul class="category-sub">
                                                <li><a href="shop.html">Magna Pellentesq</a></li>
                                                <li><a href="shop.html">Molestie Tortor</a></li>
                                                <li><a href="shop.html">Vehicula Element</a></li>
                                                <li><a href="shop.html">Sagittis Blandit</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">gps accessories</a></li>
                                        <li><a href="shop.html">Microphones</a></li>
                                        <li><a href="shop.html">Wireless Transmitters</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Sports & Outdoors</a>
                                    <ul class="category-sub">
                                        <li class="menu-tile">Cameras</li>
                                        <li><a href="shop.html">Dây và Cáp </a></li>
                                        <li><a href="shop.html">Phụ kiện GPS</a></li>
                                        <li><a href="shop.html">Microphones</a></li>
                                        <li><a href="shop.html">Máy phát không dây</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Nhà cửa & đời sống</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">nhà cửa 1</a></li>
                                        <li><a href="shop.html">nhà cửa 2</a></li>
                                        <li><a href="shop.html">nhà cửa 3</a></li>
                                        <li><a href="shop.html">nhà cửa 4</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Điện thoại & Tablets</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Điện thoại 1</a></li>
                                        <li><a href="shop.html">Tablet 2</a></li>
                                        <li><a href="shop.html">Tablet 3</a></li>
                                        <li><a href="shop.html">Điện thoại 4</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">TV & Video</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">TV thông minh</a></li>
                                        <li><a href="shop.html">Video thực tế</a></li>
                                        <li><a href="shop.html">Microphones</a></li>
                                        <li><a href="shop.html">Máy phát không dây</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li><a href="#">Sắc đẹp</a> </li>
                                <li><a href="#">Thể thao & du lịch</a></li>
                                <li><a href="#">Thịt & hải sản</a></li>
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </nav>
                </div>
            </div>
            <!-- Mobile Vertical Menu Start End -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Categorie Menu & Slider Area Start Here -->
        <div class="main-page-banner home-3">
            <div class="container">
                <div class="row">
                    <!-- Vertical Menu Start Here -->
                    <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                        <div class="vertical-menu mb-all-30">
                            <nav>
                                <ul class="vertical-menu-list">
                                    <li class=""><a href="shop.html"><span><img src="img\vertical-menu\1.png" alt="menu-icon"></span>Ô tô và Xe Máy<i class="fa fa-angle-right" aria-hidden="true"></i></a>

                                        <ul class="ht-dropdown mega-child">
                                            <li><a href="shop.html">Office chair <i class="fa fa-angle-right"></i></a>
                                                 <!-- category submenu end-->
                                                <ul class="ht-dropdown mega-child">
                                                    <li><a href="shop.html">Bibendum Cursus</a></li>
                                                    <li><a href="shop.html">Dignissim Turpis</a></li>
                                                    <li><a href="shop.html">Dining room</a></li>
                                                    <li><a href="shop.html">Dining room</a></li>
                                                </ul>
                                                <!-- category submenu end-->
                                            </li>
                                            <li><a href="shop.html">Purus Lacus <i class="fa fa-angle-right"></i></a>
                                                 <!-- category submenu end-->
                                                <ul class="ht-dropdown mega-child">
                                                    <li><a href="shop.html">Magna Pellentesq</a></li>
                                                    <li><a href="shop.html">Molestie Tortor</a></li>
                                                    <li><a href="shop.html">Vehicula Element</a></li>
                                                    <li><a href="shop.html">Sagittis Blandit</a></li>
                                                </ul>
                                                <!-- category submenu end-->
                                            </li>                                            
                                            <li><a href="shop.html">Sagittis Eget</a></li>
                                            <li><a href="shop.html">Sagittis Eget</a></li>
                                        </ul>
                                        <!-- category submenu end-->
                                    </li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\3.png" alt="menu-icon"></span>Sports & Outdoors<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu first-megamenu">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Cameras</li>
                                                    <li><a href="shop.html">Dây và Cáp </a></li>
                                                    <li><a href="shop.html">Phụ kiện gps </a></li>
                                                    <li><a href="shop.html">Microphones</a></li>
                                                    <li><a href="shop.html">Máy phát không dây </a></li>
                                                </ul>
                                                <ul>
                                                    <li class="menu-tile">GamePad</li>
                                                    <li><a href="shop.html">game HD đời thực</a></li>
                                                    <li><a href="shop.html">game đánh nhau</a></li>
                                                    <li><a href="shop.html">game đua xe</a></li>
                                                    <li><a href="shop.html">game xếp hình</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Camera kĩ thuật số</li>
                                                    <li><a href="shop.html">Camera 1</a></li>
                                                    <li><a href="shop.html">Camera 2</a></li>
                                                    <li><a href="shop.html">Camera 3</a></li>
                                                    <li><a href="shop.html">Camera 4</a></li>
                                                </ul>
                                                <ul>
                                                    <li class="menu-tile">Kính thực tế ảo</li>
                                                    <li><a href="shop.html">Kính thực tế ảo 1</a></li>
                                                    <li><a href="shop.html">Kính thực tế ảo 2</a></li>
                                                    <li><a href="shop.html">Kính thực tế ảo 3</a></li>
                                                    <li><a href="shop.html">Kính thực tế ảo 4</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Megamenu Image Start -->
                                            <li class="megamenu-img">
                                                <a href="shop.html"><img src="img\vertical-menu\sub-img1.jpg" alt="menu-image"></a>
                                                <a href="shop.html"><img src="img\vertical-menu\sub-img2.jpg" alt="menu-image"></a>
                                                <a href="shop.html"><img src="img\vertical-menu\sub-img3.jpg" alt="menu-image"></a>
                                            </li>
                                            <!-- Single Megamenu Image End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\6.png" alt="menu-icon"></span>Thời trang<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu megamenu-two">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Thời trang nam</li>
                                                    <li><a href="shop.html">Áo cộc tay</a></li>
                                                    <li><a href="shop.html">Giày</a></li>
                                                    <li><a href="shop.html">Quần</a></li>
                                                    <li><a href="shop.html">Áo</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Thời trang nữ</li>
                                                    <li><a href="shop.html">Túi</a></li>
                                                    <li><a href="shop.html">Giày</a></li>
                                                    <li><a href="shop.html">Váy</a></li>
                                                    <li><a href="shop.html">Trang sức</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\7.png" alt="menu-icon"></span>Nhà cửa & đời sống<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu megamenu-two">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Các thiết bị lớn</li>
                                                    <li><a href="shop.html">Ghế sofa</a></li>
                                                    <li><a href="shop.html">Giường ngủ</a></li>
                                                    <li><a href="shop.html">Nệm</a></li>
                                                    <li><a href="shop.html">Tủ</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Các thiết bị nhỏ</li>
                                                    <li><a href="shop.html">Túi đeo chéo</a></li>
                                                    <li><a href="shop.html">Áo khoác </a></li>
                                                    <li><a href="shop.html">Kệ </a></li>
                                                    <li><a href="shop.html">Giày</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End --> 
                                    </li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\4.png" alt="menu-icon"></span>Điện thoại & Tablets<i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu megamenu-two">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Tablet</li>
                                                    <li><a href="shop.html">tablet 1</a></li>
                                                    <li><a href="shop.html">tablet 2</a></li>
                                                    <li><a href="shop.html">tablet 3</a></li>
                                                    <li><a href="shop.html">tablet 4</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Smartphone</li>
                                                    <li><a href="shop.html">phone 1</a></li>
                                                    <li><a href="shop.html">phone 2</a></li>
                                                    <li><a href="shop.html">phone 3</a></li>
                                                    <li><a href="shop.html">phone 4</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\6.png" alt="menu-icon"></span>TV & Video<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu megamenu-two">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Gaming Desktops</li>
                                                    <li><a href="shop.html">Alpha Desktop</a></li>
                                                    <li><a href="shop.html">Del Desktop</a></li>
                                                    <li><a href="shop.html">MSI Desktop </a></li>
                                                    <li><a href="shop.html">Beta desktop</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            <!-- Single Column Start -->
                                            <!-- <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">Women’s Fashion</li>
                                                    <li><a href="shop.html">3D-Capable</a></li>
                                                    <li><a href="shop.html">Clearance</a></li>
                                                    <li><a href="shop.html">Free Shipping Eligible</a></li>
                                                    <li><a href="shop.html">On Sale</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- Single Column End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                     <li><a href="shop.html"><span><img src="img\vertical-menu\5.png" alt="menu-icon"></span>Sức khỏe & sắc đẹp</a>
                                    </li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\8.png" alt="menu-icon"></span>Trái cây & rau củ</a></li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\9.png" alt="menu-icon"></span>Máy tính & Laptop</a></li>
                                    <li><a href="shop.html"><span><img src="img\vertical-menu\10.png" alt="menu-icon"></span>Thịt & hải sản</a></li>
                                    <!-- More Categoies Start -->
                                    <li id="cate-toggle" class="category-menu v-cat-menu">
                                        <ul>
                                            <li class="has-sub"><a href="#">Thêm danh mục</a>
                                                <ul class="category-sub">
                                                    <li><a href="shop.html"><span><img src="img\vertical-menu\11.png" alt="menu-icon"></span>Phụ kiện</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- More Categoies End -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Vertical Menu End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->           
        </div>
        <!-- Categorie Menu & Slider Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="register.html">Tài khoản</a></li>
                        <li class="active"><a href="rePassword.html">Đặt lại mật khẩu</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Register Account Start -->
             <div class="Lost-pass ptb-100 ptb-sm-60">
            <div class="container">
                <div class="register-title">
                    <h3 class="mb-10 custom-title">Đặt lại mật khẩu</h3>
                    <p class="mb-10">Nhập mật khẩu mới cho tài khoản của bạn</p>
                </div>
                <form class="password-forgot clearfix" method="post" action="">
                    <fieldset>
                        <legend>Thông tin cá nhân</legend>
                        <div class="form-group d-md-flex">
                            <label class="control-label col-md-2" for="email"><span class="require">*</span>Nhập mật khẩu mới</label>
                            <div class="col-md-10 error" >
                                <input type="password" class="form-control" name="newPass" value="" id="pass" placeholder="Nhập mật khẩu mới">
                            	<span><?php echo (isset($error['newPass'])) ? $error['newPass'] : '' ?></span>
                            </div>
                        </div>
                        <div class="form-group d-md-flex pad">
                            <label class="control-label col-md-2" for="email"><span class="require">*</span>Nhập lại mật khẩu</label>
                            <div class="col-md-10 error" >
                                <input type="password" class="form-control" name="reNewPass" value="" id="pass" placeholder="Nhập lại mật khẩu">
                            	<span><?php echo (isset($error['reNewPass'])) ? $error['reNewPass'] : '' ?></span>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-md-10 error">
                    	<span><?php echo (isset($error['password'])) ? $error['password'] : '' ?></span>
                    </div>
                    <div class="buttons newsletter-input">
                        <div class="float-right float-sm-right">
                            <input type="submit" name="submit" value="Tiếp tục" class="return-customer-btn">
                        </div>
                    </div>
                </form>
            </div>
            <!-- Container End -->
        </div>
        <!-- Register Account End -->
        <!-- Support Area Start Here -->
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Quà tặng tuyệt vời</h6>
                            <span>Nhiều chương trình ưu đãi với những phần quà hấp dẫn.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Giao hàng toàn quốc</h6>
                            <span>KT-Shop giao hàng toàn quốc giúp cho khách hàng có những trải nghiệm mua sắm đơn giản, thuận tiện hơn.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Thanh toán an toàn</h6>
                            <span>Nếu bạn muốn tìm mua những dòng sản phẩm chính hãng, uy tín, KT-Shop Mail chính là sự lựa chọn lí tưởng dành cho bạn.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Tin cậy</h6>
                            <span>KT-Shop có chứng nhận của Bộ Công Thương. Cam kết đổi trả sản phẩm khi có hư hại.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Trung tâm hỗ trợ 24/7</h6>
                            <span>Đội ngũ hỗ trợ online 24/7 sẵn sàng phục vụ khách hàng.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Support Area End Here -->
        <!-- Footer Area Start Here -->
        <footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">
                    <!-- Signup Newsletter Start -->
                    <div class="row mb-60">
                         <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                            <div class="news-desc text-center mb-30">
                                 <h3>Đăng ký để nhận thông báo mới</h3>
                                 <p>Đăng ký ngay để trở thành người đầu tiên nhận được thông báo ngay trong hôm nay.</p>
                             </div>
                             <div class="newsletter-box">
                                 <form action="#">
                                      <input class="subscribe" placeholder="Nhập địa chỉ E-mail" name="email" id="subscribe" type="text">
                                      <button type="submit" class="submit">Theo dõi</button>
                                 </form>
                             </div>
                         </div>
                    </div> 
                    <!-- Signup-Newsletter End -->                   
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Thông tin</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="#">Thông tin giao hàng </a></li>
                                        <li><a href="#">Chính sách bảo mật </a></li>
                                        <li><a href="contact.html">Điều khoản và điều kiện</a></li>
                                        <li><a href="login.html">FAQs</a></li>
                                        <li><a href="login.html">Chính sách hoàn trả </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Dịch vụ khách hàng</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact.html">Liên hệ</a></li>
                                        <li><a href="#">Trở về</a></li>
                                        <li><a href="#">Lịch sử giao dịch</a></li>
                                        <li><a href="wishlist.html">Danh sách mong muốn</a></li>
                                        <li><a href="#">Site Map</a></li>
                                        <li><a href="#">Phiếu quà tặng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Bổ sung</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Thông báo mới</a></li>
                                        <li><a href="#">Nhãn hiệu</a></li>
                                        <li><a href="#">Phiếu quà tặng</a></li>
                                        <li><a href="#">Chi nhánh </a></li>
                                        <li><a href="#">Đặc biệt</a></li>
                                        <li><a href="#">Site map</a></li>      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Tài khoản</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact.html">Liên hệ</a></li>
                                        <li><a href="#">Trở về</a></li>
                                        <li><a href="#">Tài khoản</a></li>
                                        <li><a href="#">Lịch sử giao dịch</a></li>
                                        <li><a href="wishlist.html">Danh sách mong muốn</a></li>
                                        <li><a href="#">Thông báo mới</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Theo dõi</h3>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                        <li><i class="lnr lnr-map-marker"></i> Address: 95 Lý Nam Đế, Phường 8, TP. Đà Lạt</li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#">E-mail: ttkhoa1999@gmail.com </a></li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i> Phone: (+84) 356 384 355
                                        </li>
                                    </ul>
                                    <div class="payment mt-25 bdr-top pt-30">
                                        <h6 class="footer-title">Thanh toán</h6>
                                        <a href="#"><img class="img" src="img\payment\1.png" alt="payment-image"></a>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Middle Start -->
            <div class="footer-middle text-center">
                <div class="container">
                    <div class="footer-middle-content pt-20 pb-30">
                            <ul class="social-footer">
                                <li><a href="https://www.facebook.com/K.Mirai.Death"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://github.com/ttkhoa1999"><i class="fa fa-github"></i></a></li>
                                <li><a href="#"><img src="img\icon\social-img1.png" alt="google play"></a></li>
                                <li><a href="#"><img src="img\icon\social-img2.png" alt="app store"></a></li>
                            </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom pb-30">
                <div class="container">

                     <div class="copyright-text text-center">                    
                        <p>Copyright © 2021 <a target="_blank" href="#">KT-Shop Mirai</a> All Rights Reserved.</p>
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer Area End Here -->
        <!-- Quick View Content Start -->
        <div class="main-product-thumbnail quick-thumb-content">
            <div class="container">
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Main Thumbnail Image Start -->
                                    <div class="col-lg-5 col-md-6 col-sm-5">
                                        <!-- Thumbnail Large Image start -->
                                        <div class="tab-content">
                                            <div id="thumb-1" class="tab-pane fade show active">
                                                <a data-fancybox="images" href="img\products\35.jpg"><img src="img\products\35.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb-2" class="tab-pane fade">
                                                <a data-fancybox="images" href="img\products\13.jpg"><img src="img\products\13.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb-3" class="tab-pane fade">
                                                <a data-fancybox="images" href="img\products\15.jpg"><img src="img\products\15.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb-4" class="tab-pane fade">
                                                <a data-fancybox="images" href="img\products\4.jpg"><img src="img\products\4.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb-5" class="tab-pane fade">
                                                <a data-fancybox="images" href="img\products\5.jpg"><img src="img\products\5.jpg" alt="product-view"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail Large Image End -->
                                        <!-- Thumbnail Image End -->
                                        <div class="product-thumbnail mt-20">
                                            <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                                                <a class="active" data-toggle="tab" href="#thumb-1"><img src="img\products\35.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb-2"><img src="img\products\13.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb-3"><img src="img\products\15.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb-4"><img src="img\products\4.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb-5"><img src="img\products\5.jpg" alt="product-thumbnail"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail image end -->
                                    </div>
                                    <!-- Main Thumbnail Image End -->
                                    <!-- Thumbnail Description Start -->
                                    <div class="col-lg-7 col-md-6 col-sm-7">
                                        <div class="thubnail-desc fix mt-sm-40">
                                            <h3 class="product-header">Printed Summer Dress</h3>
                                            <div class="pro-price mtb-30">
                                                <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span class="price">$15.19</span><span class="saving-price">save 8%</span></p>
                                            </div>
                                            <p class="mb-20 pro-desc-details">Long printed dress with thin adjustable straps. V-neckline and wiring under the bust with ruffles at the bottom of the dress.</p>
                                            <div class="product-size mb-20 clearfix">
                                                <label>Size</label>
                                                <select class="">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                </select>
                                            </div>
                                            <div class="color mb-20">
                                                <label>color</label>
                                                <ul class="color-list">
                                                    <li>
                                                        <a class="orange active" href="#"></a>
                                                    </li>
                                                    <li>
                                                        <a class="paste" href="#"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="box-quantity d-flex">
                                                <form action="#">
                                                    <input class="quantity mr-40" type="number" min="1" value="1">
                                                </form>
                                                <a class="add-cart" href="cart.html">add to cart</a>
                                            </div>
                                            <div class="pro-ref mt-15">
                                                <p><span class="in-stock"><i class="ion-checkmark-round"></i> IN STOCK</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Description End -->
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="custom-footer">
                                <div class="socila-sharing">
                                    <ul class="d-flex">
                                        <li>share</li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View Content End -->
    </div>
    <!-- Main Wrapper End Here -->

    <!-- jquery 3.2.1 -->
    <script src="js\vendor\jquery-3.2.1.min.js"></script>
    <!-- Countdown js -->
    <script src="js\jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="js\jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="js\jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="js\jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="js\jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="js\jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="js\jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="js\owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="js\popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js\bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="js\plugins.js"></script>
    <!-- Main activaion js -->
    <script src="js\main.js"></script>
</body>

</html>