 
<?php
session_start();
require 'helpers/amader-helper.php';
require 'models/database.php';
require 'views/title.php';
$items = 0;

if (isset($_SESSION['menuid'])) {
    $items = count($_SESSION['menuid']);
}
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <!-- External CSS libraries -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-submenu.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" type="text/css" href="assets/fonts/linearicons/style.css">
        <link rel="stylesheet" type="text/css"  href="assets/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" type="text/css"  href="assets/css/bootstrap-datepicker.min.css">

        <!-- Custom stylesheet -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">

        <!-- Favicon icon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" >

        <!-- Google fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
        <link rel="stylesheet" type="text/css" href="assets/css/ie10-viewport-bug-workaround.css">
        <link rel="stylesheet" type="text/css" href="assets/css/fSelect.css">

        <script type="text/javascript" src="assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="assets/js/html5shiv.min.js"></script>
        <script type="text/javascript" src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Top header start -->
        <header class="top-header top-header-2 top-header-3 top-header-4 hidden-xs" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                        <div class="list-inline">
                            <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>Need Support? 1-8X0-666-8X88</a>
                            <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>info@themevessel.com</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                        <ul class="social-list clearfix pull-right">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-rss"></i>
                                </a>
                            </li>
                            <li>
                                <?php
                                if (isset($_SESSION['id'])) {
                                    ?>
                                    <a href = "index.php?f=logout" class = "sign-in<?php if ($act == 'logout') echo " active" ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out </a>
                                    <a href="index.php?u=profile" tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false" class="sign-in<?php if ($act == 'profile') echo " active" ?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>

                                    <?php
                                }
                                else {
                                    ?>
                                    <a href = "index.php?f=login" class = "sign-in<?php if ($act == 'login') echo " active" ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In </a>
                                    <a href="index.php?f=signup" class="sign-in<?php if ($act == 'signup') echo " active" ?>"><i class="fa fa-user-plus"></i> Sign Up</a>
                                    <?php
                                }
                                ?>


                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Top header end -->

        <!-- Main header start -->
        <header class="main-header main-header-2 main-header-3">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="logo">
                            <img src="images/logos/logo.png" alt="logo">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown <?php if ($act == 'home') echo "active" ?>">
                                <a href="index.php" tabindex="0" data-submenu="" aria-expanded="false">
                                    Home
                                </a>

                            </li>
                            <?php
                           if (isset($_SESSION['id']) && ($_SESSION['type'] == 2 || $_SESSION['type'] == 3 )) {
                           }else{
                              ?>
                            <li class="dropdown">
                                <a href="index.php?f=gallery">Gallery</a>
                                  
                            </li>
                            <li class="dropdown">
                                <a href="index.php?f=faq">Faq</a>
                                  
                            </li>
                           
                            <li class="dropdown">
                                <a href="index.php?f=contact">Contact</a>
                                  
                            </li>
                             <li class="dropdown">
                                <a href="index.php?f=blog">Blog</a>
                                  
                            </li>
                           
                            <?php
                              }
                            if (isset($_SESSION['id']) && ($_SESSION['type'] == 2 || $_SESSION['type'] == 3 )) {
                                ?>
                                <li class="dropdown">
                                    <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                        Management<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a tabindex="0">Employee Panel</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="index.php?e=designation">Designation</a></li>
                                                <li><a href="index.php?e=ourstaff">Our Staff</a></li>
                                                <li><a href="index.php?e=salary-insert">Salary</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index.php?e=country">Country</a></li>

                                        <li class="dropdown-submenu">
                                            <a tabindex="0">Room Panel</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="index.php?e=roomtype">Room Type</a></li>
                                                <li><a href="index.php?e=room">Room</a></li>
                                                <li><a href="index.php?e=roominstallment">Room Installment</a></li>
                                                <li><a href="index.php?e=room-package">Room Package</a></li>   
                                                <li><a href="index.php?e=hallroom">Hall Room</a></li>
                                                <li><a href="index.php?e=menu">Menu</a></li>
                                                <li><a href="index.php?e=roombooking">Room Booking</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index.php?e=payment">Payment</a></li>

                                        <li><a href="index.php?e=category">Category</a></li>

                                        <li><a href="index.php?e=services">Services</a></li>
                                        <li><a href="index.php?e=coupon">Coupon</a></li>

                                        <li><a href="index.php?e=menutype">Menu Type</a></li>



                                    </ul>
                                </li>

                                <?php
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['id']) && $_SESSION['type'] == 3) {
                                ?>
                                <li class="dropdown">
                                    <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                        Report of <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">

                                        <li><a href="index.php?a=salary-report">Employee Salary</a></li>
                                        <li><a href="index.php?f=booking-cancel">Booking Details</a></li>


                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['id']) && ($_SESSION['type'] == 1)) {
                                ?>
                                <li class="dropdown">
                                    <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                        Setting<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href = "index.php?f=booking-cancel">Booking Details</a></li>
                                        
                                    </ul>
                                </li>

                                <?php
                            }
                            ?>
                        
                             <li><a href="#" class="cart"><i class="fa fa-cart-plus" ></i><span id="items"><?php echo $items; ?></span></a>

                                <ul class="dropdown-menu cartlist">
                                    <?php
                                    $total = 0;
                                    if (isset($_SESSION['price'])) {

                                        foreach ($_SESSION['price'] as $key => $price) {
                                            $total = ($_SESSION['qty'][$key] * $_SESSION['price'][$key]);
                                            ?>
                                            <li>
                                                image: <img src="images/menu/menu-<?php echo "{$_SESSION['menuid'][$key]}.{$_SESSION['picture'][$key]}"; ?>" width="80" /><br/>
                                                <b>Title:</b> <?php echo $_SESSION['title'][$key]; ?><br/>
                                                <b>Price:</b> <?php echo $_SESSION['price'][$key]; ?><br/>
                                                <b>Quantity:</b> <?php echo $_SESSION['qty'][$key]; ?><br/>
                                                <b>Total:</b> $<?php echo $total; ?><br>
                                                <input type="button" class="btn btn-danger remove" id="<?php echo $_SESSION['menuid'][$key]; ?>" value="del"/>

                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <a href = "index.php?f=checkout" class = "btn button-sm button-theme">Checkout</a>
                                </ul>
                            </li>
                                
                        </ul>
                        <?php
                        if (isset($_SESSION['id']) && ($_SESSION['type'] == 3)) {
                            ?>
                            <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs col-sm-1 pull-right">
                                <li><figure>
                                        <img src="images/staff/admin.jpg" class="center-block admin_pic" width="50">
                                        <figcaption style="color:#E49755; font-weight: 600; text-align: center"> Admin </figcaption>
                                    </figure>

                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['id']) && ($_SESSION['type'] == 2)) {
                            ?>
                            <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs col-sm-1 pull-right">
                                <li><figure>
                                        <img src="images/staff/employee.jpg" class="center-block admin_pic" width="50">
                                        <figcaption style="color:white; font-weight: 500">Employee</figcaption>
                                    </figure>

                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- /.navbar-collapse -->
                    <!-- /.container -->
                </nav>
            </div>
        </header>
        <!-- Main header end -->

        <?php
        require 'controllers/controller.php';
        ?>

        <?php
        if (isset($_SESSION['id']) && ($_SESSION['type'] == 2) || ($_SESSION['type'] == 3)) {
            ?>
        
         <div class="copy-right">
            <div class="container">
                &copy;  2017 Trademarks and brands are the property of their respective owners.
            </div>
        </div>
        <?php
        }else{
        ?>
        <!-- Footer start -->
        <footer class="main-footer clearfix">
            <div class="container">
                <!-- Footer info-->
                <div class="footer-info">
                    <div class="row">
                        <!-- About us -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item">
                                <div class="footer-logo">
                                    <a href="index.php">
                                        <img src="images/logos/footer-logo.png" alt="footer-logo">
                                    </a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam.</p>
                            </div>
                        </div>
                        <!-- Contact Us -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item">
                                <div class="main-title-2">
                                    <h1>Contact Us</h1>
                                </div>
                                <ul class="personal-info">
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        Address: 44 New Design Street,
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        Email:<a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        Phone: <a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-fax"></i>
                                        Fax: +0477 85X6 552
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <ul class="social-list">
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Gallery -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item gallery">
                                <div class="main-title-2">
                                    <h1>Gallery</h1>
                                </div>
                                <ul>
                                    <li>
                                        <a href="gallery-3column.php">
                                            <img src="images/room/small-img-2.jpg" alt="small-img-2">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery-3column.php">
                                            <img src="images/room/small-img-4.jpg" alt="small-img-4">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery-3column.php">
                                            <img src="images/room/small-img-5.jpg" alt="small-img-5">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery-3column.php">
                                            <img src="images/room/small-img-3.jpg" alt="small-img-3">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery-3column.php">
                                            <img src="images/room/small-img-6.jpg" alt="small-img-6">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery-3column.php">
                                            <img src="images/room/small-img.jpg" alt="small-img">
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Newsletter -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-item newsletter">
                                <div class="main-title-2">
                                    <h1>Newsletter</h1>
                                </div>
                                <div class="newsletter-inner">
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <form action="#" method="GET">
                                        <p><input type="text" class="form-contact" name="email" placeholder="Enter your email"></p>
                                        <p><button type="submit" name="submitNewsletter" class="btn button-small">
                                                Signup
                                            </button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer end -->

        <!-- Copy right start -->
        <div class="copy-right">
            <div class="container">
                &copy;  2017 Trademarks and brands are the property of their respective owners.
            </div>
        </div>
        <?php }?>
        <!-- Copy end right-->
        <script>

            /*For disable inspect element 
             *   document.onkeydown = function (e) {
             if (event.keyCode == 123) {
             return false;
             }
             if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
             return false;
             }
             if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
             return false;
             }
             if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
             return false;
             }
             }
             */

        </script>
        <script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-submenu.js"></script>
        <script type="text/javascript" src="assets/js/jquery.mb.YTPlayer.js"></script>
        <script type="text/javascript" src="assets/js/wow.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="assets/js/jquery.scrollUp.js"></script>
        <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.filterizr.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/fSelect.js"></script>


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script type="text/javascript" src="assets/js/ie10-viewport-bug-workaround.js"></script>


        <script>
            $(document).ready(function () {

                $(function () {
                    $("#from").datepicker();
                    $("#to").datepicker();
                });
                $('.search').click(function () {
                    var From = $('#from').val();
                    var to = $('#to').val();
                    if (From != '' && to != '')
                    {
                        $.ajax({
                            url: "ajax/fetch.php",
                            method: "POST",
                            data: {From: From, to: to},
                            success: function (data)
                            {
                                $('#salary_details').html(data);
                            }
                        });
                    } else
                    {
                        alert("Please Select the Date");
                    }
                });


                $('.pay').click(function () {
                    location.reload();
                });
                $('.bonusremove').click(function () {
                    var bonusremove = $(this).val();
                    $.ajax({
                        type: "GET",
                        data: {
                            "bonusremove": $(this).val()
                        },
                        url: "ajax/salary-pay.php",
                        success: function (result) {

                            if (result == 1) {
                                location.reload();
                            } else {
                                alert("Not ok");
                            }

                        }
                    });
                });
                $('.bonusone').click(function () {
                    var halfbonus = $(this).val();
                    $.ajax({
                        type: "GET",
                        data: {
                            "halfbonus": $(this).val()
                        },
                        url: "ajax/salary-pay.php",
                        success: function (result) {
                            if (result == 50) {
                                location.reload();
                            } else {
                                alert("Not ok");
                            }
                        }
                    });
                    $('.modal.in').modal('hide');
                    return false;
                });
                $('.bonustwo').click(function () {
                    var fullbonus = $(this).val();
                    $.ajax({
                        type: "GET",
                        data: {
                            "fullbonus": $(this).val()
                        },
                        url: "ajax/salary-pay.php",
                        success: function (result) {
                            if (result == 100) {
                                location.reload();
                            } else {
                                alert("Not ok");
                            }
                        }
                    });
                    $('.modal.in').modal('hide');
                    return false;
                });
            });

        </script>
        <style>

    .basket{
        width: 100px;
        background: #FFF;
        height: 250px;
    }
</style>
<script>
            $(document).on('click', '.remove', function () {
                var did = $(this).attr('id');
                var remove = $(this).parent();
                if (did != '') {
                    $.ajax({
                        type: 'GET',
                        url: 'ajax/menu-delete.php',
                        data: {
                            did: did
                        },
                        success: function (data)
                        {
                            remove.remove();
                            alert(JSON.stringify(data['total']));

                            var items = parseInt($('#items').text()) - 1;
                            $('#items').text(items);
                            //$("#gtotal").text(data['total']);

                            //$('#medicinelist').fadeIn();
                            //$('#medicinelist').html(data);
                        }

                    });

                }
                //alert(did);
            });
</script>


<!-- <script>
    $(document).ready(function () {
        $("#name_error_msg").hide();

        var error_checkin = false;
        var error_checkout = false;

        $("#checkin").focusout(function () {
            check_checkin();
        });

        $("#checkout").focusout(function () {
            check_checkout();
        });
        function check_checkin() {
            if (!$("#checkin").change()) {
                $("#checkin_error_msg").html("CheckIn Date should not be blanked");
                $("#checkin_error_msg").show();
                error_checkin = true;
            } else {
                $("#checkin_error_msg").hide();
            }
        }
        function check_checkout() {
            if (!$("#checkout").val()) {
                $("#checkout_error_msg").html("CheckOut Date should not be blanked");
                $("#checkout_error_msg").show();
                error_checkout = true;
            } else {
                $("#checkout_error_msg").hide();
            }
        }
        $("#forvalidation").submit(function () {
            error_checkin = false;
            error_checkout = false;
            check_checkin();
            check_checkout();

            if (error_checkin == false && error_checkout == false) {
                return true;


            } else {
                return false;

            }
        });


    });


</script>
        -->

    </body>
</html>