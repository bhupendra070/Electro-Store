<?php
    session_start();
?>
<html lang="zxx">

    <head>
        <title>Card</title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
              />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- //Meta tag Keywords -->

        <!-- Custom-Files -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Main css -->
        <link rel="stylesheet" href="css/fontawesome-all.css">
        <!-- Font-Awesome-Icons-CSS -->
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <!-- pop-up-box -->
        <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
        <!-- menu style -->
        <!-- //Custom-Files -->

        <!-- web fonts -->
        <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
              rel="stylesheet">
        <!-- //web fonts -->

    </head>

    <body>
        <?php
        // <!-- top-header -->
        include './themepart/topheader.php';
        // <!-- log in -->
        
        // <!-- header-bottom-->
        include './themepart/middleheader.php';
        // <!-- navigation -->
        include './themepart/navbar.php';
        ?>

        <!-- banner-2 -->
        <div class="page-head_agile_info_w3l">

        </div>
        <!-- //banner-2 -->
        <!-- page -->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <div class="container">
                    <ul class="w3_short">
                        <li>
                            <a href="home.php">Home</a>
                            <i>|</i>
                        </li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- //page -->

        <!-- Single Page -->
        <div class="banner-bootom-w3-agileits py-5">
            <div class="container py-xl-4 py-lg-2">
                <!-- tittle heading -->
                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                    <span>P</span>roduct
                    <span>D</span>etails</h3>
                <!-- //tittle heading -->
                <div class="row">
                  <?php
                    require 'connection.php';
                    if ($_GET['pid']) {
                        $pid = $_GET['pid'];
                        $q = mysqli_query($connect, "select * from tbl_product where product_id='{$pid}' ") or die(mysqli_error($connect));
                        $count = mysqli_num_rows($q);
                        if ($count < 1) {
                            header("location:home.php");
                        }
                        while ($row = mysqli_fetch_array($q)) 
                        {
                  ?>    
        
                    <div class="col-lg-5 col-md-8 single-right-left ">
                        <div class="grid images_3_of_2">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="thumb-image">
                                            <?php
                                                echo "<img data-i   magezoom='true' class='img-fluid' style:height='50' width='100' src='{$row['product_image']}'>";
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 single-right-left simpleCart_shelfItem product-single-w3l">
                        <h3 class="mb-3">
                            <?php
                                echo $row['product_name'];
                            ?>
                        </h3>
                        <p class="mb-3">
                            <i class="far fa-hand-point-right mr-2"></i>
                            <span class="item_price">
                                
                                <?php
                                   echo $row['product_price'];
                                ?>
                            </span>
                        </p>
                       <div class="single-infoagile">
                            <ul>
                                <li class="mb-3">
                                    Cash on Delivery Eligible.
                                </li>
                                <li class="mb-3">
                                    Shipping Speed to Delivery.
                                </li>
                                <li class="mb-3">
                                    Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
                                </li>
                            </ul>
                        </div>
                        <div class="product-single-w3l">
                            <p class="my-3">
                                <i class="far fa-hand-point-right mr-2"></i>
                                <label>1 Year</label>Manufacturer Warranty</p>
                            <ul>
                                <li class="mb-1">
                                    <?php
                                         echo "<b>Detail : </b>".$row['product_detail'];
                                         
                                    ?>
                                </li>
                            </ul>
                        </div>
                                
                        <div class="occasion-cart">
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <form action="cart-proccess.php" method="get">
                                    <fieldset>
                                        <input type="hidden" name="pid" value="<?php echo $pid ?>"/>
                                        Qty<input type="number" name="qty" min="1" max="10"/>
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php    } //While loop
                  } // if condition
               ?>      
                </div>
            </div>
        </div>
        <!-- //Single Page -->

        <!-- middle section -->
        <div class="join-w3l1 py-sm-5 py-4">
            <div class="container py-xl-4 py-lg-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="join-agile text-left p-4">
                            <div class="row">
                                <div class="col-sm-7 offer-name">
                                    <h6>Smooth, Rich & Loud Audio</h6>
                                    <h4 class="mt-2 mb-3">Branded Headphones</h4>
                                    <p>Sale up to 25% off all in store</p>
                                </div>
                                <div class="col-sm-5 offerimg-w3l">
                                    <img src="images/off1.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-5">
                        <div class="join-agile text-left p-4">
                            <div class="row ">
                                <div class="col-sm-7 offer-name">
                                    <h6>A Bigger Phone</h6>
                                    <h4 class="mt-2 mb-3">Smart Phones 5</h4>
                                    <p>Free shipping order over $100</p>
                                </div>
                                <div class="col-sm-5 offerimg-w3l">
                                    <img src="images/off2.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle section -->

        <!-- footer -->
        <footer>
            <?php
            # include './themepart/secondfooter.php';
            // <!-- footer third section -->
            include './themepart/thirdfooter.php';
            // <!-- footer fourth section -->
            // include './themepart/fourthfooter.php';
            ?>
        </footer>
        <!-- //footer -->
        <!-- copyright -->
        <?php
        include './themepart/footer.php';
        ?>
        <!-- //copyright -->

        <!-- js-files -->
        <!-- jquery -->
        <script src="js/jquery-2.2.3.min.js"></script>
        <!-- //jquery -->

        <!-- nav smooth scroll -->
        <script>
            $(document).ready(function () {
                $(".dropdown").hover(
                        function () {
                            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                            $(this).toggleClass('open');
                        },
                        function () {
                            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                            $(this).toggleClass('open');
                        }
                );
            });
        </script>
        <!-- //nav smooth scroll -->

        <!-- popup modal (for location)-->
        <script src="js/jquery.magnific-popup.js"></script>
        <script>
            $(document).ready(function () {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });

            });
        </script>
        <!-- //popup modal (for location)-->

        <!-- cart-js -->
        <script src="js/minicart.js"></script>
        <script>
            paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

            paypals.minicarts.cart.on('checkout', function (evt) {
                var items = this.items(),
                        len = items.length,
                        total = 0,
                        i;

                // Count the number of each item in the cart
                for (i = 0; i < len; i++) {
                    total += items[i].get('quantity');
                }

                if (total < 3) {
                    alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                    evt.preventDefault();
                }
            });
        </script>
        <!-- //cart-js -->

        <!-- password-script -->
        <script>
            window.onload = function () {
                document.getElementById("password1").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }

            function validatePassword() {
                var pass2 = document.getElementById("password2").value;
                var pass1 = document.getElementById("password1").value;
                if (pass1 != pass2)
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("password2").setCustomValidity('');
                //empty string means no validation error
            }
        </script>
        <!-- //password-script -->

        <!-- imagezoom -->
        <script src="js/imagezoom.js"></script>
        <!-- //imagezoom -->

        <!-- flexslider -->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

        <script src="js/jquery.flexslider.js"></script>
        <script>
            // Can also be used with $(document).ready()
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
        <!-- //FlexSlider-->

        <!-- smoothscroll -->
        <script src="js/SmoothScroll.min.js"></script>
        <!-- //smoothscroll -->

        <!-- start-smooth-scrolling -->
        <script src="js/move-top.js"></script>
        <script src="js/easing.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();

                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <!-- //end-smooth-scrolling -->

        <!-- smooth-scrolling-of-move-up -->
        <script>
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */
                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <!-- //smooth-scrolling-of-move-up -->

        <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- //js-files -->

    </body>

</html>