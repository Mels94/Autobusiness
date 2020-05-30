<?php use application\components\GlobalData; ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Car Dealer Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $this->getTitle(); ?></title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href="<?= ASSETS ?>fontawesome-5.13/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ASSETS ?>images/favicon.png">
    <link rel="stylesheet" href="<?= ASSETS ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/main.css">
    <!-- Slider Pro Css -->
    <link rel="stylesheet" href="<?= ASSETS ?>css/sliderPro.css">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="<?= ASSETS ?>css/owl-carousel.css">
    <!-- Flat Icons Css -->
    <link rel="stylesheet" href="<?= ASSETS ?>css/flaticon.css">
    <!-- Animated Css -->
    <link rel="stylesheet" href="<?= ASSETS ?>css/animated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"
          integrity="sha256-2bAj1LMT7CXUYUwuEnqqooPb1W0Sw0uKMsqNH0HwMa4=" crossorigin="anonymous"/>
    <!--    chckout & card-->
    <link rel="stylesheet" href="<?= ASSETS ?>css/style.css">
    <script src="<?= ASSETS ?>js/jquery-3.5.0.min.js"></script>
    <script src="<?= ASSETS ?>js/index.js"></script>


</head>
<body>

<div class="preloader">
    <div class="preloader-bounce">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>


<!--<div id="search">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here"/>
        <button type="submit" class="primary-button">Search <i class="fa fa-search"></i></button>
    </form>
</div>-->


<header class="site-header wow fadeIn" data-wow-duration="1s">
    <div id="main-header" class="main-header">
        <div class="container clearfix">
            <a href="/">
                <div class="logo"></div>
            </a>
            <div id='cssmenu'>
                <ul class="dropdown">
                    <li><a href='/'>Homepage</a></li>
                    <li class='drop'><a href='/'>Category</a>
                        <ul class="subItems">
                            <?php foreach (\application\components\GlobalData::allCategory() as $key => $item): ?>
                                <li><a href='/site/category/<?= $item['id']; ?>'><?= $item['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href='/site/product'>Product</a></li>
                    <li><a href='/site/contact'>Contact</a></li>
                    <li><a href='/site/about'>About</a></li>
<!--                    <li>
                        <a href="#search"><i class="fa fa-search"></i></a>
                    </li>-->
                    <li><a href='/'>
                            <i class="fas fa-user" aria-hidden="true"></i>
                        </a>
                        <ul class="account">
                            <?php if (!\application\components\Auth::checkLogged()): ?>
                                <li><a href='/user/register'>Registration</a></li>
                                <li><a href='/user/login'>Login</a></li>
                            <?php else: ?>
                                <li><a href='/user/profile'>My Profile</a></li>
                                <li><a href='/logout'>Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a id="cart"><i class="fa fa-shopping-cart">
                            </i> <sup class="badge"></sup>
                        </a></li>
                </ul>
            </div>
            <!--shopping-cart-->
            <div class="shopping-cart">
                <div class="shopping-cart-header">
                    <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">0</span>
                    <div class="shopping-cart-total">
                        <span class="lighter-text">Total:</span>
                        <span class="main-color-text">0 $</span>
                    </div>
                </div>
                <ul class="shopping-cart-items">

                </ul>
                <a href="/site/cart" class="main-btn cart_btn">View Cart</a>
                <a class="primary-btn cart_btn checkout_modal">Checkout
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

</header>

<?php if (!empty($content) && isset($content)): ?>
    <?php include_once $this->basePath . $content . ".php"; ?>
<?php endif; ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-item">
                    <div class="about-us">
                        <h2>About Us</h2>
                        <p>Irony actually meditation, occupy mumblecore wayfarers organic pickled 90's. Intelligentsia
                            as actually +1 meh photo booth.</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-item">
                    <div class="what-offer">
                        <h2>What We Offer ?</h2>
                        <ul>
                            <li><a href="#">Rent a car now</a></li>
                            <li><a href="#">Search for sale</a></li>
                            <li><a href="#">Try search form</a></li>
                            <li><a href="#">Best daily dealers</a></li>
                            <li><a href="#">Weekly lucky person</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-item">
                    <div class="need-help">
                        <h2>Need Help ?</h2>
                        <ul>
                            <li><a href="#">Modern wheels</a></li>
                            <li><a href="#">Awesome spoilers</a></li>
                            <li><a href="#">Dynamic Enetrior</a></li>
                            <li><a href="#">Save accidents </a></li>
                            <li><a href="#">Recorded Racing</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-item">
                    <div class="our-gallery">
                        <h2>Our Gallery</h2>
                        <ul>
                            <li><a href="/site/single_car/<?= GlobalData::allProduct()[103]['id']; ?>"><img src="<?= UPLOADS.GlobalData::allProduct()[103]['cat_name']; ?>/<?= GlobalData::allProduct()[103]['img_path']; ?>" alt="auto_1"></a>
                            </li>
                            <li><a href="/site/single_car/<?= GlobalData::allProduct()[129]['id']; ?>"><img src="<?= UPLOADS.GlobalData::allProduct()[129]['cat_name']; ?>/<?= GlobalData::allProduct()[129]['img_path']; ?>" alt="auto_2"></a>
                            </li>
                            <li><a href="/site/single_car/<?= GlobalData::allProduct()[131]['id']; ?>"><img src="<?= UPLOADS.GlobalData::allProduct()[131]['cat_name']; ?>/<?= GlobalData::allProduct()[131]['img_path']; ?>" alt="auto_3"></a>
                            </li>
                            <li><a href="/site/single_car/<?= GlobalData::allProduct()[121]['id']; ?>"><img src="<?= UPLOADS.GlobalData::allProduct()[121]['cat_name']; ?>/<?= GlobalData::allProduct()[121]['img_path']; ?>" alt="auto_4"></a>
                            </li>
                            <li><a href="/site/single_car/<?= GlobalData::allProduct()[92]['id']; ?>"><img src="<?= UPLOADS.GlobalData::allProduct()[92]['cat_name']; ?>/<?= GlobalData::allProduct()[92]['img_path']; ?>" alt="auto_5"></a>
                            </li>
                            <li><a href="/site/single_car/<?= GlobalData::allProduct()[112]['id']; ?>"><img src="<?= UPLOADS.GlobalData::allProduct()[112]['cat_name']; ?>/<?= GlobalData::allProduct()[112]['img_path']; ?>" alt="auto_6"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-item">
                    <div class="quick-search">
                        <h2>Quick Search</h2>
                        <input type="text" class="footer-search" name="s" placeholder="Search..." value="">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="sub-footer">
                    <p>Copyright 2020. All rights reserved by: <a href="/">Autobusiness</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!--<script src="<?= ASSETS ?>js/jquery-1.11.0.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Slider Pro Js -->
<script src="<?= ASSETS ?>js/sliderpro.min.js"></script>

<!-- Slick Slider Js -->
<script src="<?= ASSETS ?>js/slick.js"></script>

<!-- Owl Carousel Js -->
<script src="<?= ASSETS ?>js/owl.carousel.min.js"></script>

<!-- Boostrap Js -->
<script src="<?= ASSETS ?>js/bootstrap.min.js"></script>

<!-- Boostrap Js -->
<script src="<?= ASSETS ?>js/wow.animation.js"></script>

<!-- Custom Js -->
<script src="<?= ASSETS ?>js/custom.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ecc1392c75cbf1769ef395c/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>
</html>