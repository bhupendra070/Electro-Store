<?php
    session_start();
?>
<html lang="zxx">

    <head>
        <title>Electro Store Checkout</title>
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
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- //page -->
        <!-- checkout page -->
        <div class="privacy py-sm-5 py-4">
            <div class="container py-xl-4 py-lg-2">
                <!-- tittle heading -->
                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                    <span>C</span>art
                </h3>
                <!-- //tittle heading -->
                <div class="checkout-right">
                    <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                        <span>3 Products</span>
                    </h4>
                  <?php
                    require 'connection.php';
                    
                    if (isset($_GET['id']))
                    {
                        $id = $_GET['id'];

                        unset($_SESSION['productcard'][$id]);
                        unset($_SESSION['qtycard'][$id]);
                    }

                    if (isset($_SESSION['productcard']) && !empty($_SESSION['productcard'])) 
                    {
                  ?>
                        <div class="table-responsive">
                            <table class="timetable_sub">
                                <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Product</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $i = 0;
                                    $grandtotal = array();
                                    foreach ($_SESSION['productcard'] as $key => $value)
                                    {
                                        $i++;
                                        $q = mysqli_query($connect, "select * from tbl_product where product_id='{$value}' ") or die(mysqli_error($connect));
                                        $row = mysqli_fetch_array($q);
                                        $qty = $_SESSION['qtycard'][$key];
                                        $subtotal = $row['product_price'] * $qty;
                                        echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td><img src='{$row['product_image']}' style:height='150px' width='100px'></td>";
                                        echo "<td>{$row['product_name']}</td>";

                                        echo "<td>{$row['product_price']}</td>";
                                        echo "<td>$qty</td>";
                                        echo "<td>$subtotal</td>";
                                        echo "<td> <a href='?id=$key'>Remove</a> </td>";
                                        echo "</tr>";
                                        $grandtotal[] = $subtotal;
                                    }
                                    $finaltotal = array_sum($grandtotal);
                                    echo "<tr>";
                                    echo "<td colspan='5'>Grand Total</td>";
                                    echo "<td>$finaltotal</td>";
                                    echo "</tr>";
                  ?>
                                </tbody>
                            </table><br/>
                            <a href='home.php'>
                                <button class="submit check_out btn">Buy Products</button>
                            </a>
                  <?php
                    } 
                    else 
                    {
                        echo "Card is Empty.";
                        echo '<a href="home.php">
                                <button class="submit check_out btn">Buy Products</button>
                            </a>';
                    }

                    if (isset($_SESSION['userid']))
                    {
                        echo '<a href="checkout.php">';
                            echo '<button class="submit check_out btn">CheckOut</button>';
                        echo '</a>';
                    } 
                    else 
                    {
                        header("location:login.php");
                    }
                  ?>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- //checkout page -->

        <!-- middle section -->
        
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

        <!-- quantity -->
        <script>
            $('.value-plus').on('click', function () {
                var divUpd = $(this).parent().find('.value'),
                        newVal = parseInt(divUpd.text(), 10) + 1;
                divUpd.text(newVal);
            });

            $('.value-minus').on('click', function () {
                var divUpd = $(this).parent().find('.value'),
                        newVal = parseInt(divUpd.text(), 10) - 1;
                if (newVal >= 1)
                    divUpd.text(newVal);
            });
        </script>
        <!--quantity-->
        <script>
            $(document).ready(function (c) {
                $('.close1').on('click', function (c) {
                    $('.rem1').fadeOut('slow', function (c) {
                        $('.rem1').remove();
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function (c) {
                $('.close2').on('click', function (c) {
                    $('.rem2').fadeOut('slow', function (c) {
                        $('.rem2').remove();
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function (c) {
                $('.close3').on('click', function (c) {
                    $('.rem3').fadeOut('slow', function (c) {
                        $('.rem3').remove();
                    });
                });
            });
        </script>
        <!-- //quantity -->

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