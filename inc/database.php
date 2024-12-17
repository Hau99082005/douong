<?php 
include('config/connect.php');
session_start();

class cart {
    public $id, $name, $image, $price, $quantity;
    function __construct($id, $name, $image, $price, $quantity) {
      $this->id = $id;
      $this->name = $name;
      $this->image = $image;
      $this->price = $price;
      $this->quantity = $quantity;

    }
}
function _header($title) {
    $s = '
     <!DOCTYPE html>
      <html lang="zxx">

    <head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>'.$title.'</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="boottrap/css/bootstrap.min.css">
    <script src="boottrap/js/bootstrap.bundle.js"></script>
    <script src="boottrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="assets/icon/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="assets/icon/favicon-16x16.png">
    <link rel="manifest" href="assets/icon/site.webmanifest">
     </head>
   <body>
    
    ';
    echo $s;
}

function _navbar() {
    if(isset($_GET['id_product']))addtoCartProduct($_GET['id_product']);
    if(isset($_GET['clear']))unset($_SESSION['cart']);
    $s = '
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__item">
                <a href="cart.php"><img src="img/icon/cart.png" alt=""> <span>';
                                    if(!isset($_SESSION['cart'])) $s.= '0';
                                    else $s .= count($_SESSION['cart']);
                                    $s.= '</span></a>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="index.php"><img src="assets/icon/logo.jpg" alt="" width="80px" height="80px"></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
          <ul>';
                                    if (isset($_SESSION['user'])) {
                                        $s .= '<li><i class="fa fa-user"></i>
                                            <span class="arrow_carrot-down" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">
                                                Chào, '.splitName($_SESSION['user']['name']).'
                                            </span>
                                        </li>
                                        <li>
                                            <a href="dangxuat.php"><i class="fa fa-sign-out"></i></a>
                                        </li>';
                                    } else {
                                        $s .= '<li>
                                            <a href="dangnhap.php"><i class="fa fa-user"></i> Đăng nhập</a>
                                        </li>';
                                    }
                            $s .= '</ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                       <ul>';
                                    if (isset($_SESSION['user'])) {
                                        $s .= '<li><i class="fa fa-user"></i>
                                            <span class="arrow_carrot-down" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">
                                                Chào, '.splitName($_SESSION['user']['name']).'
                                            </span>
                                        </li>
                                        <li>
                                            <a href="dangxuat.php"><i class="fa fa-sign-out"></i></a>
                                        </li>';
                                    } else {
                                        $s .= '<li>
                                            <a href="dangnhap.php"><i class="fa fa-user"></i> Đăng nhập</a>
                                        </li>';
                                    }
                            $s .= '</ul>
                            </div>
                            <div class="header__logo">
                                <a href="index.php"><img src="assets/icon/logo.jpg" alt="" width="75px" height="75px"></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__cart">
                                    <a href="cart.php"><img src="img/icon/cart.png" alt=""> <span>';
                                    if(!isset($_SESSION['cart'])) $s.= '0';
                                    else $s .= count($_SESSION['cart']);
                                    $s.= '</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="index.php">trang chủ</a></li>
                            <li><a href="shop.php">Cửa Hàng</a>
                                <ul class="dropdown">';
                                $q = Database::query("SELECT * FROM `categories`");
                                while($r = $q->fetch_array()) {
                                    $s .= '<li><a href="shop.php?id_category= '.$r['id'].'">'.$r['name'].'</a></li>';
                                }
                                $s .= '</ul>
                            </li>
                            <li><a href="baiviet.php">Bài viết</a></li>
                            <li><a href="lienhe.php">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    ';
    echo $s;
}

function _hero() {
    $s = '
        <section class="hero">
        <div class="hero__slider owl-carousel">
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
           <div class="carousel-inner">';
           $q = Database::query("SELECT * FROM `banner`");
           while($r = $q->fetch_array()) {
             $s .= '<div class="carousel-item active" data-bs-interval="5000">
               <img src="assets/images/'.$r['image'].'" class="d-block w-100" alt="..." style="max-width: 50%; margin: 0 auto;">
            </div>';
           }
        $s .= '</div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
       </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
   </button>
    </div>
        </div>
    </section>
    
    ';
    echo $s;
}

function _categories() {
    $s = '
     <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-029-cupcake-3"></span>
                            <h5>Cupcake</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-034-chocolate-roll"></span>
                            <h5>Butter</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-005-pancake"></span>
                            <h5>Red Velvet</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-030-cupcake-2"></span>
                            <h5>Biscuit</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Donut</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Cupcake</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    ';
    echo $s;
}

function _products() {
    $s = '
      <section class="product spad">
        <div class="container">
            <div class="row">';
              $q = Database::query("SELECT * FROM `products`");
              while($r = $q->fetch_array()) {
                $s .= '<div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="assets/images/'.$r['image'].'">
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">'.$r['name'].'</a></h6>
                            <div class="product__item__price">'.$r['price'].'<sup>đ</sup></div>
                            <div class="cart_add">
                                <a href="';
         if(!isset($_SESSION['user']))
         $s .= 'dangnhap.php';
        else 
         $s .= 'shop.php?id_product='.$r['id'];
        $s .= '"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';   
              }
            $s .= '</div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Class Section Begin -->
    <section class="class spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="class__form">';
                        // PHP Form Handling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $name = trim(htmlspecialchars($_POST['name']));
        $message = trim(htmlspecialchars($_POST['message']));

        if (!$email) {
            $s .= "<script>displayNotification('Email không hợp lệ. Vui lòng nhập đúng định dạng!', 'error');</script>";
        } elseif (empty($name) || empty($message)) {
            $s .= "<script>displayNotification('Tên và tin nhắn không được để trống!', 'error');</script>";
        } else {
            $email = Database::getConnection()->real_escape_string($email);
            $name = Database::getConnection()->real_escape_string($name);
            $message = Database::getConnection()->real_escape_string($message);
            $sql = "INSERT INTO contacts (email, message, name) VALUES ('$email', '$message', '$name')";

            if (Database::query($sql) === TRUE) {
                $s .= "<script>displayNotification('Liên hệ đã được gửi thành công! Cảm ơn bạn đã liên hệ.', 'success');</script>";
            } else {
                $s .= "<script>displayNotification('Lỗi khi gửi liên hệ. Vui lòng thử lại sau.', 'error');</script>";
            }
        }
    }
                        $s .= '<div class="section-title">
                            <span>Liên Hệ</span>
                            <h2>Giao Hàng Tận <br />Nhà</h2>
                        </div>
                        <form action="" method="POST">
                            <input type="text" placeholder="Tên" name="name">
                            <input type="text" placeholder="Email của bạn" name="email">
                            <textarea placeholder="Nội dung tin nhắn" name="message" required></textarea>
                            <button type="submit" class="site-btn">Gửi</button>
                        </form>';
                    $s.= '</div>
                </div>
            </div>
            <div class="class__video set-bg">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/5fakDw5WZvM?si=7tIzforoccheqJXx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    ';
    echo $s;
}

function _section() {
    $s = '
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Theo dõi chúng tôi trên instagram</span>
                            <h2>Những khoảnh khắc ngọt ngào được lưu lại làm kỷ niệm.</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">';
                    $q = Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 6");
                    while($r = $q->fetch_array()) {
                        $s .= '<div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="assets/images/'.$r['image'].'" alt="">
                            </div>
                        </div>';
                    }
                    $s .= '</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Map Begin -->
    <div class="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-7">
                    <div class="map__inner">
                        <h6>70 Nguyễn Huệ, TP Huế</h6>
                        <ul>
                            <li>quangbao680@gmail.com</li>
                            <li>0392356687</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="map__iframe">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.353684910666!2d107.58544287460766!3d16.457619228924464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a14771646be3%3A0x2fd0ad0d9227d5b0!2zNzAgTmd1eeG7hW4gSHXhu4csIFbEqW5oIE5pbmgsIEh14bq_LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1733708680967!5m2!1svi!2s" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    ';
    echo $s;
}
function _footer() {
    $s = '
      <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Giờ Làm Việc</h6>
                        <ul>
                            <li>Thứ 2 - Thứ 6: 08:00 am – 11:30 pm</li>
                            <li>Thứ Bảy: 10:00 am – 16:30 pm</li>
                            <li>Chủ Nhật: 10:00 am – 16:30 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="index.php"><img src="assets/icon/logo.jpg" width="80px" height="80px" alt=""></a>
                        </div>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Liên Hệ</h6>
                        <p>Nhận thông tin cập nhật và ưu đãi mới nhất.</p>
                        <form action="#" method="POST">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white"><!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
                          &copy;<script>document.write(new Date().getFullYear());</script> Bản quyền thuộc về <i class="fa fa-heart" aria-hidden="true"></i><a href="index.php" target="_blank">Dream si</a>
                      </p>
                  </div>
            </div>
        </div>
    </div>
    </footer>
    <div class="search-model">
     <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
     </div>
       </div>
       <script src="js/jquery-3.3.1.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/jquery.nice-select.min.js"></script>
       <script src="js/jquery.barfiller.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
       <script src="js/owl.carousel.min.js"></script>
       <script src="js/jquery.nicescroll.min.js"></script>
       <script src="js/main.js"></script>
      </body>
    </html>
    ';
    echo $s;
}

function _contact() {
    $s = '
    <section class="contact spad">
        <div class="container">
            <div class="map">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4 col-md-7">
                            <div class="map__inner">
                                <h6>70 Nguyễn Huệ, TP Huế</h6>
                                <ul>
                                    <li>Email: quangbao680@gmail.com</li>
                                    <li>Số điện thoại: 0392356687</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="map__iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.353684910666!2d107.58544287460766!3d16.457619228924464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a14771646be3%3A0x2fd0ad0d9227d5b0!2zNzAgTmd1eeG7hW4gSHXhu4csIFbEqW5oIE5pbmgsIEh14bq_LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1733724894292!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Liên hệ với chúng tôi</h3>
                        <ul>
                            <li>Hỗ trợ khách hàng có sẵn:</li>
                            <li>Thứ Hai - Thứ Sáu: 5:00 AM - 9:00 PM</li>
                            <li>Thứ Bảy - Chủ Nhật: 6:00 AM - 9:00 PM</li>
                        </ul>
                        <img src="img/cake-piece.png" alt="Contact Us">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">';
                    
    // PHP Form Handling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $name = trim(htmlspecialchars($_POST['name']));
        $message = trim(htmlspecialchars($_POST['message']));

        if (!$email) {
            $s .= "<script>displayNotification('Email không hợp lệ. Vui lòng nhập đúng định dạng!', 'error');</script>";
        } elseif (empty($name) || empty($message)) {
            $s .= "<script>displayNotification('Tên và tin nhắn không được để trống!', 'error');</script>";
        } else {
            $email = Database::getConnection()->real_escape_string($email);
            $name = Database::getConnection()->real_escape_string($name);
            $message = Database::getConnection()->real_escape_string($message);
            $sql = "INSERT INTO contacts (email, message, name) VALUES ('$email', '$message', '$name')";

            if (Database::query($sql) === TRUE) {
                $s .= "<script>displayNotification('Liên hệ đã được gửi thành công! Cảm ơn bạn đã liên hệ.', 'success');</script>";
            } else {
                $s .= "<script>displayNotification('Lỗi khi gửi liên hệ. Vui lòng thử lại sau.', 'error');</script>";
            }
        }
    }

    $s .= '<form action="" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Tên của bạn" name="name" required>
                    </div>
                    <div class="col-lg-6">
                        <input type="email" placeholder="Email của bạn" name="email" required>
                    </div>
                    <div class="col-lg-12">
                        <textarea placeholder="Nội dung tin nhắn" name="message" required></textarea>
                        <button type="submit" class="site-btn">Gửi</button>
                    </div>
                </div>
            </form>';

    $s .= '</div>
                </div>
            </div>
        </div>
    </section>';

    echo $s;
}

function _baiviet() {
    if(!isset($_GET['id_blog']))
    $q = Database::query("SELECT * FROM `blog`");
    else 
    $q = Database::query("SELECT * FROM `blog` WHERE id=".$_GET['id']);
    $s = '
        <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Bài Viết</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="index.php">Trang chủ</a>
                        <span>Bài viết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">';
                $q = Database::query("SELECT * FROM `blog`");
                 while($r = $q->fetch_array()) {
                    $s .= '<div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="assets/images/'.$r['image'].'">
                        </div>
                        <div class="blog__item__text">
                            <h2>'.$r['title'].'</h2>
                            <p>'.$r['pagaph'].'</p>
                            <span>'.$r['day'].'</span>
                            <a href="detail.php">Xem Ngay</a>
                        </div>
                    </div>';
                 }
                $s .= '</div>
                <div class="col-lg-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#" method="post">
                                <input type="text" placeholder="Nhập vào từ khoá">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h5>Theo dõi chúng tôi</h5>
                            <div class="blog__sidebar__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h5>Bài viết gần đây</h5>
                            <div class="blog__sidebar__recent">';
                            $q1 = Database::query("SELECT * FROM `blog`");
                            while($r1 = $q1->fetch_array()) {
                                $s .= '<a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="assets/images/'.$r1['image'].'" alt="" width="200px">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h4>'.$r1['title'].'</h4>
                                        <span>'.$r1['day'].'</span>
                                    </div>
                                </a>';
                            }
                            $s .= '</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    ';
    echo $s;
}

function _detail() {
    $s = '
     <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__content">';
                        $s .= '<div class="blog__details__share">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>';
                        $q = Database::query("SELECT * FROM `baiviet`");
                        while($r = $q->fetch_array()) {
                       $s .= '<div class="blog__details__text">
                            <img src="assets/images/'.$r['image'].'" alt="">
                            <h2>'.$r['title'].'</h2>
                            <p>'.$r['pagraph'].'</p>
                        </div>';
                        }
                    $s .= '</div>
                </div>
            </div>
        </div>
    </section>
    ';
    echo $s;
}

function _shop() {
    $s = '';
    $id_category = isset($_GET['id_category']) ? intval($_GET['id_category']) : null;
    $search_query = isset($_GET['search_query']) ? trim($_GET['search_query']) : '';
    $category_query = $id_category
        ? "SELECT * FROM `categories` WHERE id = $id_category"
        : "SELECT * FROM `categories`";
    $categories = Database::query($category_query);

    while ($r = $categories->fetch_array()) {
        $s .= '
            <div class="breadcrumb-option">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="breadcrumb__text">
                                <h2>' . $r['name'] . '</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="breadcrumb__links">
                                <a href="index.php">Trang chủ</a>
                                <span>Cửa Hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="shop spad">
                <div class="container">
                    <div class="shop__option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="shop__option__search">
                                    <form action="shop.php" method="get">
                                        <select name="id_category">';
        $categories_dropdown = Database::query("SELECT * FROM `categories`");
        while ($cat = $categories_dropdown->fetch_array()) {
            $selected = $id_category == $cat['id'] ? 'selected' : '';
            $s .= '<option value="' . $cat['id'] . '" ' . $selected . '>' . $cat['name'] . '</option>';
        }

        $s .= '</select>
                                        <input type="text" placeholder="Tìm Kiếm sản phẩm" name="search_query" value="'.$search_query.'">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">';
        $product_query = "SELECT * FROM `products` WHERE status = true";
        if ($id_category) {
            $product_query .= " AND id_category = $id_category";
        }
        if (!empty($search_query)) {
            $escaped_search_query = Database::getConnection()->real_escape_string($search_query);
            $product_query .= " AND `name` LIKE '%$escaped_search_query%'";
        }
        $products = Database::query($product_query);
        while ($r1 = $products->fetch_array()) {
            $s .= '
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="assets/images/' . $r1['image'] . '"></div>
                        <div class="product__item__text">
                            <h6><a href="#">' . $r1['name'] . '</a></h6>
                            <div class="product__item__price">' . $r1['price'] . '<sup>đ</sup></div>
                            <div class="cart_add">
                                <a href="';

            if (!isset($_SESSION['user'])) {
                $s .= 'dangnhap.php';
            } else {
                $s .= 'shop.php?id_product=' . $r1['id'];
            }

            $s .= '"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
        }

        $s .= '</div>
                </div>
            </section>';
    }

    echo $s;
}

function addtoCartProduct($id_product) {
    $q = Database::query("SELECT * FROM `products` WHERE id =". $id_product);
    $r = $q->fetch_array();
    if(isset($_SESSION['cart'])) {
        $a = $_SESSION['cart'];
        for($i = 0; $i <count($a); $i++) 
            if($r['id']==$a[$i]->id)break;
        if($i<count($a))$a[$i]->quantity++;
        else  $a[count($a)] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
        
    }else {
        $a = array();
        $a[0] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
    }
    $_SESSION['cart'] = $a;
}

function cart() {
    $total = 0.0;
    // xử lý xoá từng sản phẩm
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $deleteIndex = (int)$_GET['delete'];
        if (isset($_SESSION['cart'][$deleteIndex])) {
            unset($_SESSION['cart'][$deleteIndex]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset index
        }
    }
    // xoá giỏ hàng
    if (isset($_GET['clear']) && $_GET['clear'] === 'OK') {
        unset($_SESSION['cart']);
    }
    // xử lý cập nhật số lượng
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
        foreach ($_POST['quantities'] as $index => $quantity) {
            if (isset($_SESSION['cart'][$index]) && is_numeric($quantity) && $quantity > 0) {
                $_SESSION['cart'][$index]->quantity = (int)$quantity;
            }
        }
    }
    // thêm sản phẩm mới vào giỏ hàng
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
        $product = json_decode($_POST['product']);
        if ($product) {
            $found = false;
            foreach ($_SESSION['cart'] as &$cartItem) {
                if ($cartItem->id === $product->id) {
                    $cartItem->quantity += $product->quantity;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $_SESSION['cart'][] = $product;
            }
        }
    }
    // tính tổng giỏ hàng
    if (isset($_SESSION['cart'])) {
        $a = $_SESSION['cart'];
        foreach ($a as $item) {
            $item_total = $item->quantity * $item->price * 1000;
            $total += $item_total;
        }
    }
    $s = '
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="index.php">Trang Chủ</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shopping-cart spad">
        <div class="container">
            <form method="POST" action="cart.php">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                        <th>Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>';

    if (isset($_SESSION['cart'])) {
        $a = $_SESSION['cart'];
        foreach ($a as $index => $item) {
            $item_total = $item->quantity * $item->price * 1000;
            $s .= '
            <tr>
                <td class="product__cart__item">
                    <div class="product__cart__item__pic">
                        <img src="assets/images/'.$item->image.'" alt="" style="width: 100%; height: 80px;">
                    </div>
                    <div class="product__cart__item__text">
                        <h6>'.$item->name.'</h6>
                        <h5>'.number_format($item->price * 1000, 0, '.', '.').'<sup>đ</sup></h5>
                    </div>
                </td>
                <td class="quantity__item">
                    <div class="quantity">
                        <input type="number" name="quantities['.$index.']" value="'.$item->quantity.'" min="1" style="width: 50px;">
                    </div>
                </td>
                <td class="cart__price">'.number_format($item_total, 0, '.', '.').'<sup>đ</sup></td>
                <td class="close-td first-row">
                    <a href="cart.php?delete='.$index.'" class="fa fa-close" style="background: #F08080; width: 80px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 10px; font-weight: bolder; color: white; font-size: 16px; text-decoration: none;"></a>
                </td>
            </tr>';
        }
    }

    $s .= '
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="continue__btn">
                                    <a href="index.php">Tiếp tục mua sắm</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="continue__btn update__btn">
                                    <button type="submit" name="update_cart" class="primary-btn up-cart">Cập nhật</button>
                                    <a href="cart.php?clear=OK" class="primary-btn up-cart">Xóa giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart__total">
                            <h6>Tổng Giỏ Hàng</h6>
                            <ul>
                                <li>Tổng cộng <span>'.number_format($total, 0, '.', '.').'<sup>đ</sup></span></li>
                            </ul>
                            <a href="checkout.php" class="primary-btn">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>';

    echo $s;
}

function _checkout($title) {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total = 0;
    foreach ($cart as $item) {
        $total += $item->quantity * $item->price * 1000;
    }
    $s = '
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>'.$title.'</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="index.php">Trang chủ</a>
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="process_order.php" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Chi tiết thanh toán</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                           <p>Họ Tên <span>*</span></p>
                                        <input type="text" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                 <p>Địa Chỉ <span>*</span></p>
                                <input type="text" name="address" placeholder="Nhập địa chỉ của bạn" required>
                            </div>
                            <div class="checkout__input">
                               <p>Số điện thoại <span>*</span></p>
                                <input type="text" name="phone" required>
                            </div>
                            <div class="checkout__input">
                                 <p>Ghi chú</p>
                                <input type="text" name="note" placeholder="Ghi chú về đơn hàng (nếu có)">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Đơn Hàng Của Bạn</h6>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng Tiền</span></div>
                                <ul class="checkout__total__products">';
                                foreach ($cart as $item) {
                                    $item_total = $item->quantity * $item->price * 1000;
                                    $s .= '<li>'.$item->name.'x'.$item->quantity.'<span>'.number_format($item_total, 0, '.', '.').'<sup>đ</sup></span></li>';
                                }
                                    $s .= '</ul>
                                <ul class="checkout__total__all">';
                                    $s .= '<li>Tổng Tiền: <span>'.number_format($total, 0, '.', '.').'<sup>đ</sup></span></li>';
                                 $s .= '</ul>
                                <button type="submit" class="site-btn">Đặt Đơn</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    ';
    echo $s;
}

function _info() {
    $s = '
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Product detail</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Sweet autumn leaves</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img">
                            <img class="big_img" src="img/shop/details/product-big-1.jpg" alt="">
                        </div>
                        <div class="product__details__thumb">
                            <div class="pt__item active">
                                <img data-imgbigurl="img/shop/details/product-big-2.jpg"
                                src="img/shop/details/product-big-2.jpg" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="img/shop/details/product-big-1.jpg"
                                src="img/shop/details/product-big-1.jpg" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="img/shop/details/product-big-4.jpg"
                                src="img/shop/details/product-big-4.jpg" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="img/shop/details/product-big-3.jpg"
                                src="img/shop/details/product-big-3.jpg" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="img/shop/details/product-big-5.jpg"
                                src="img/shop/details/product-big-5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label">Cupcake</div>
                        <h4>SWEET AUTUMN LEAVES</h4>
                        <h5>$26.41</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p>
                        <ul>
                            <li>SKU: <span>17</span></li>
                            <li>Category: <span>Biscuit cake</span></li>
                            <li>Tags: <span>Gadgets, minimalisstic</span></li>
                        </ul>
                        <div class="product__details__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="2">
                                </div>
                            </div>
                            <a href="#" class="primary-btn">Add to cart</a>
                            <a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Previews(1)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                    arrives with a greeting card of your choice that you can personalize online!</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!2
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!3
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Products Section Begin -->
    <section class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related__products__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/shop/product-1.jpg">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Dozen Cupcakes</a></h6>
                                <div class="product__item__price">$32.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/shop/product-2.jpg">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Cookies and Cream</a></h6>
                                <div class="product__item__price">$30.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/shop/product-3.jpg">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Gluten Free Mini Dozen</a></h6>
                                <div class="product__item__price">$31.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/shop/product-4.jpg">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Cookie Dough</a></h6>
                                <div class="product__item__price">$25.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/shop/product-5.jpg">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Vanilla Salted Caramel</a></h6>
                                <div class="product__item__price">$05.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/shop/product-6.jpg">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">German Chocolate</a></h6>
                                <div class="product__item__price">$14.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    ';
    echo $s;
}

function login(){
    if (isset($_POST['emailphone']) && isset($_POST['password'])) {
        if (is_numeric($_POST['emailphone'])) {
            $x = 'phone';
        } else {
            $x = 'email';
        }
        
        $q = Database::query("SELECT * FROM users WHERE $x = '{$_POST['emailphone']}' AND password = '{$_POST['password']}'");
        if ($r = $q->fetch_array()) {
            if ($r['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                $_SESSION['user'] = $r;
                if (isset($_POST['remember_me'])) {
                    setcookie('emailphone', $_POST['emailphone'], time() + (86400 * 30), "/"); 
                    setcookie('password', $_POST['password'], time() + (86400 * 30), "/"); 
                } else {
                    setcookie('emailphone', '', time() - 3600, "/");
                    setcookie('password', '', time() - 3600, "/");
                }
                
                header("Location:  index.php");
            }
        } else {
            $_SESSION['login_fail'] = 'Dữ liệu nhập không chính xác!!!';
            header("Location: dangnhap.php");
        }
    }

    $saved_emailphone = isset($_COOKIE['emailphone']) ? $_COOKIE['emailphone'] : '';
    $saved_password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';

    $s = '
    <section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">';
        $q = Database::query("SELECT * FROM `dangnhap`");
        while($r = $q->fetch_array()) {
        $s .= '<div class="col-md-9 col-lg-6 col-xl-5">
            <img src="assets/images/'.$r['image'].'"
            class="img-fluid" alt="Sample image">
        </div>';
        }
        $s .= '<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="" method="post">
            <h2 style="padding: 40px 0 25px 0">Đăng Nhập</h2>';
           if (isset($_SESSION['login_fail'])) {
               $s .= '<div style="color: red;">'.$_SESSION['login_fail'].'</div>';
               unset($_SESSION['login_fail']); 
           }
           
            $s .= '<!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="emailphone" class="form-control form-control-lg"
                placeholder="Nhập vào số điện thoại của bạn" value="' . htmlspecialchars($saved_emailphone) . '" />
            </div>
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-3">
                <input type="password" name="password" class="form-control form-control-lg"
                placeholder="Nhập vào mật khẩu" id="password" value="' . htmlspecialchars($saved_password) . '" />
                <button type="button" onclick="togglePassword()" class="btn btn-secondary btn-sm mt-2">Hiện/Ẩn mật khẩu</button>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <!-- Remember Me Checkbox -->
                <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" name="remember_me" value="1" id="form2Example3"' . (!empty($saved_emailphone) ? ' checked' : '') . ' />
                    <label class="form-check-label" for="form2Example3">
                        Ghi nhớ mật khẩu    
                    </label>
                </div>
                <a href="#!" class="text-body">Quên mật khẩu?</a>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng Nhập</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="dangky.php"
                    class="link-danger">Đăng ký</a></p>
            </div>
            </form>
        </div>
        </div>
    </div>
    
    </section>

    <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    </script>
    ';

    echo $s;
}

 function splitName($str){
        $rs = NULL;
        $word = mb_split(' ', $str);
        $n = count($word)-1;
        if ($n > 0) {$rs = $word[$n];}

        return $rs;
}
function register(){
    $errName = $errPhone = $errPass = $errRepass = '';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['name'])) {
            $errName = "Vui lòng nhập vào tên của bạn!";
        }
        if (empty($_POST['phone'])) {
            $errPhone = "Cần có 1 số điện thoại!";
        } else {
            if (!preg_match('/^\d{10}$/', $_POST['phone'])) {
                $errPhone = "Số điện thoại phải có đúng 10 chữ số!";
            } else {
                $phoneCheckQuery = "SELECT COUNT(*) FROM users WHERE phone='" . $_POST['phone'] . "'";
                $phoneCheckResult = Database::query($phoneCheckQuery);
                $phoneExists = $phoneCheckResult->fetch_array()[0];

                if ($phoneExists > 0) {
                    $errPhone = "Số điện thoại đã tồn tại!";
                }
            }
        }
        if (empty($_POST['pass'])) {
            $errPass = "Vui lòng nhập mật khẩu!";
        }
        if (empty($_POST['repass'])) {
            $errRepass = "Vui lòng xác nhận mật khẩu!";
        } else {
            if ($_POST['pass'] != $_POST['repass']) {
                $errRepass = "Mật khẩu không khớp!";
            }
        }
        if ($errName == '' && $errPhone == '' && $errPass == '' && $errRepass == '') {
            $insertQuery = "INSERT INTO users(name, phone, password, role) VALUES('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['pass']."', '')";
            Database::query($insertQuery);
            $userQuery = "SELECT * FROM users WHERE phone='" . $_POST['phone'] . "' AND password='" . $_POST['pass'] . "'";
            $userResult = Database::query($userQuery);
            $_SESSION['user'] = $userResult->fetch_array();
            header("location: index.php");
        }
    }

    $s = '
        <section class="vh-80" style="background-color: #eee; border: none; border-radius: none;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-3">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Ký</p>

                        <form class="mx-1 mx-md-4" action="" method="post">

                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-user"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c">Tên của bạn</label>
                            <input type="text" name="name" class="form-control" />
                            <span style="color: red;">'.$errName.'</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-phone"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Số điện thoại của bạn</label>
                            <input type="text" name="phone" class="form-control" />
                            <span style="color: red;">'.$errPhone.'</span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-lock"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Mật Khẩu</label>
                            <input type="password" id="pass" name="pass" class="form-control" />
                            <span style="color: red;">'.$errPass.'</span>
                            <input type="checkbox" onclick="togglePassword(\'pass\')"> Hiển thị mật khẩu
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fa fa-key"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4cd">Xác nhận mật khẩu</label>
                            <input type="password" id="repass" name="repass" class="form-control" />
                            <span style="color: red;">'.$errRepass.'</span>
                            <input type="checkbox" onclick="togglePassword(\'repass\')"> Hiển thị mật khẩu
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Đăng ký</button>
                        </div>

                        </form>

                    </div>';
                    $q = Database::query("SELECT * FROM `dangky`");
                    while($r = $q->fetch_array()) {
                    $s .= '<div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                        <img src="assets/images/'.$r['image'].'"
                        class="img-fluid" alt="Sample image">
                    </div>';
                    }
                   $s .= '</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        
        <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }
        </script>
    ';
    echo $s;
}


?>