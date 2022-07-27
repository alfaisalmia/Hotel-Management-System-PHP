

<!-- Banner start -->
<div class="banner banner-2">
    <div class="banner-inner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/banner/banner-slider-3.jpg" alt="banner-slider-3">
                    <div class="carousel-caption banner-slider-inner banner-top-align">
                        <div class="text-center">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Welcome to</span> Alpha Hotel</h1>
                            <a href="#" class="btn button-md button-theme" data-animation="animated fadeInUp delay-05s">Get Started Now</a>
                            <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInUp delay-05s">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="images/banner/banner-slider-2.jpg" alt="banner-slider-2">
                    <div class="carousel-caption banner-slider-inner banner-top-align">
                        <div class="text-right">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Best Place</span> To Find Room</h1>
                            <a href="#" class="btn button-md button-theme" data-animation="animated fadeInUp delay-05s">Get Started Now</a>
                            <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInUp delay-05s">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="images/banner/banner-slider-1.jpg" alt="banner-slider-1">
                    <div class="carousel-caption banner-slider-inner banner-top-align">
                        <div class="text-left">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Perfect Place</span> For relax</h1>
                            <a href="#" class="btn button-md button-theme" data-animation="animated fadeInUp delay-05s">Get Started Now</a>
                            <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInUp delay-05s">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>



        <!-- Search area box start -->
        <div class="search-area-box hidden-xs hidden-sm">
            <div class="container">
                <div class="search-contents">
                    <form method="get">
                        <div class="row">
                            <div class="col-md-3 col-pad col-pad-2">
                                <div class="search-your-rooms">
                                    <h3 class="hidden-xs hidden-sm">Search</h3>
                                    <h2 class="hidden-xs hidden-sm">Your <span>Rooms</span></h2>
                                    <h2 class="hidden-lg hidden-md">Search Your <span>Rooms</span></h2>
                                </div>
                            </div>
                            <div class="search-your-details">
                                <div class="col-md-2 col-sm-2 col-xs-6 col-pad">
                                    <div class="form-group">
                                        <input type="text" id="checkin" name="checkin" data-date-start-date="0d" class="btn-default datepicker" placeholder="Check In">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6 col-pad">
                                    <div class="form-group">
                                        <input type="text" id="checkout" name="checkout" data-date-start-date="0d" class="btn-default datepicker" placeholder="Check Out">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-6 col-pad">
                                    <div class="form-group">
                                       <!-- <select class="selectpicker search-fields form-control-2" name="room">
                                            <option>Room</option>
                                            <option>Single Room</option>
                                            <option>Double Room</option>
                                            <option>Deluxe Room</option>-->

                                        <select class="selectpicker search-fields form-control-2 input-text" name="room">
                                            <option>Room</option>
                                            <?php
                                            $d = new Database();
                                            $dg = $d->view("roomtype", array("name", "asc"));
                                            while ($value = $dg->fetch_object()) {
                                                echo "<option value='{$value->id}'>{$value->name}</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-6 col-pad">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="adults">
                                            <option value="0">Adult</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-6 col-pad">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="children">
                                            <option value="0">Child</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6 col-pad">
                                    <div class="form-group">
                                        <input type="submit" class="search-button" name="find" value="Search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Search area box end -->
    </div>
</div>
<!-- Banner end -->

<!-- Search area box 2 start -->
<div class="search-area-box-2 hidden-lg hidden-md">
    <div class="container">
        <div class="search-contents">
            <form method="get">
                <div class="row">
                    <div class="col-md-3 col-pad col-pad-2">
                        <div class="search-your-rooms">
                            <h3 class="hidden-xs hidden-sm">Search</h3>
                            <h2 class="hidden-xs hidden-sm">Your <span>Rooms</span></h2>
                            <h2 class="hidden-lg hidden-md">Search Your <span>Rooms</span></h2>
                        </div>
                    </div>
                    <div class="search-your-details">
                        <div class="col-md-2 col-sm-4 col-xs-6 col-pad">
                            <div class="form-group">
                                <input type="text" name="sdate" class="inputtext datepicker" placeholder="Check In">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 col-pad">
                            <div class="form-group">
                                <input type="text" name="edate" class="inputtext datepicker" placeholder="Check Out">
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-4 col-xs-6 col-pad">
                            <!--                            <div class="form-group">
                                                            <select class="selectpicker search-fields form-control-2" name="room">
                                                                <option>Room</option>
                                                                <option>Single Room</option>
                                                                <option>Double Room</option>
                                                                <option>Deluxe Room</option>
                                                            </select>
                                                        </div>-->
                        </div>
                        <!--   <div class="col-md-1 col-sm-4 col-xs-6 col-pad">
                               <div class="form-group">
                                   <select class="selectpicker search-fields form-control-2" name="">
                                       <option value="0">Adult</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">amia</option>
                                   </select>
                               </div>
                           </div>
                           <div class="col-md-1 col-sm-4 col-xs-6 col-pad">
                               <div class="form-group">
                                   <select class="selectpicker search-fields form-control-2" name="">
                                       <option>Child</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>

                                   </select>
                               </div>
                           </div>-->
                        <div class="col-md-2 col-sm-4 col-xs-6 col-pad">
                            <div class="form-group">


                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search area box 2 end -->

<!-- Hotel section start -->
<div class="container">
    <div class = "row">

        <?php
        $d = new Database();
       if (isset($_GET['find'])) {
            if (empty($_GET['checkin']) && empty($_GET['checkout'])) {
                echo '<p style="text-align:center; color:red;">You must select the Checkin and Checkout Field correctly</p>';
            } else {
                $sdate = date('Y-m-d', strtotime($_GET['checkin']));
                $edate = date('Y-m-d', strtotime($_GET['checkout']));
                $testing = $d->search("$sdate", "$edate", $_GET['adults'], $_GET['children'], $_GET['room']);
                $_SESSION['testing'] = $testing;
                //Redirect("index.php?f=room-search");
//        if ($testing->num_rows > 0) {
//                echo "<div class = 'main-title'><br/>
//            <h1><span>Searching </span> Results</h1>
//        </div>";
//            } else {
//                echo "<img src = 'images/error.png' alt = 'images-6' class = 'img-responsive'>";
//            }
//
             Redirect("index.php?f=room-search&checkin={$_GET['checkin']}&checkout={$_GET['checkout']}&adult={$_GET['adults']}&child={$_GET['children']}&room={$_GET['room']}");
            while ($value = $testing->fetch_object()) {
                echo "
                    <div class = 'col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInLeft delay-04s'>
                <!--Hotel box start -->
                <div class = 'hotel-box'>
                    <!--header -->
                    <div class = 'header clearfix'>
                        <img src = 'images/room/upload/pic1/{$value->id}.{$value->picture1}' alt = 'images-6' class = 'img-responsive'>
                    </div>
                    <!--Detail -->
                    <div class = 'detail clearfix'>
                        <div class = 'price'>
                         Tk. {$value->price}<sub> /Night</sub>
                        </div>

                        <h3>
                            <a href = 'rooms-details.html'>Luxury Room</a>
                        </h3>
                        <ul class = 'rating'>
                            <li>
                                <i class = 'fa fa-star'></i>
                            </li>
                            <li>
                                <i class = 'fa fa-star'></i>
                            </li>
                            <li>
                                <i class = 'fa fa-star'></i>
                            </li>
                            <li>
                                <i class = 'fa fa-star'></i>
                            </li>
                            <li>
                                <i class = 'fa fa-star-half-full'></i>
                            </li>
                        </ul>


                        <p>Discount :  {$value->discount} % <br/>
                        Room No:  {$value->code}<br/>
                        {$value->description}</p>
                        <a href = 'blog-details.html' class = 'btn button-sm button-theme'>View Details</a>
                    </div>
                </div>
                <!--Hotel box end -->
            </div>";
            }
        }
        }
        ?>
    </div>
</div>


<br/>

<!--Food-Section---Start -->
   <div class="container">
    <div class = "row">
        <div class = "main-title">
            <h1><span>Our </span> Best Foods</h1>
        </div>
        
        <?php
        $d = new Database();
           $data = $d->view("menu");
                while ($value = $data->fetch_object()) {
        ?>
        

        <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
            <!--Hotel box start -->
            <div class = "hotel-box">
                <!--header -->
                <div class = "header clearfix">
                    <img src = "<?php echo "images/menu/menu-$value->id" . ".{$value->picture}" ?>" alt = "images-6" class = "img-responsive">
                </div>
                <!--Detail -->
                <div class = "detail clearfix">
                    <div class = "price">
                        $567<sub>.99/Night</sub>
                    </div>
                    <h3>
                        <a href = "<?php echo "index.php?f=menu-details&id={$value->id}" ?>"><?php echo $value->title ?></a>
                    </h3>
                    <ul class = "rating">
                        <li>
                            <i class = "fa fa-star"></i>
                        </li>
                        <li>
                            <i class = "fa fa-star"></i>
                        </li>
                        <li>
                            <i class = "fa fa-star"></i>
                        </li>
                        <li>
                            <i class = "fa fa-star"></i>
                        </li>
                        <li>
                            <i class = "fa fa-star-half-full"></i>
                        </li>
                    </ul>


                    <p><?php echo $value->description ?></p>
                    <a href = "<?php echo "index.php?f=menu-details&id={$value->id}" ?>" class = "btn button-sm button-theme">View Details</a>
                </div>
            </div>
            <!--Hotel box end -->
        </div>
        <?php
                }
        ?>
       
    </div>
</div>
<!--Food--section--end--> 

<!--Our facilties section start -->
<div class = "our-facilties-section content-area-7">
    <div class = "container">
        <!--Main title -->
        <div class = "main-title">
            <h1><span>Our</span> Facilties</h1>
        </div>
        <div class = "row">
            <div class = "col-lg-5 col-md-6">
                <div class = "hotels-detail-slider div-mrg-btm-30 simple-slider">
                    <div id = "carousel-custom" class = "carousel slide" data-ride = "carousel">
                        <div class = "carousel-outer">
                            <!--Wrapper for slides -->
                            <div class = "carousel-inner">
                                <div class = "item">
                                    <img src = "images/facilties/facilties-2.jpg" class = "img-responsive" alt = "facilties-2">
                                </div>
                                <div class = "item active left">
                                    <img src = "images/facilties/facilties-3.jpg" class = "img-responsive" alt = "facilties-3">
                                </div>
                                <div class = "item next left">
                                    <img src = "images/facilties/facilties.jpg" class = "img-responsive" alt = "facilties">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-lg-7 col-md-6">
                <div class = "our-facilties">
                    <ul>
                        <li>
                            <i class = "flaticon-school-call-phone-reception"></i>
                            <span>24-Hour Reception</span>
                        </li>
                        <li>
                            <i class = "flaticon-room-service"></i>
                            <span>Room Service</span>
                        </li>
                        <li>
                            <i class = "flaticon-sedan-car-model"></i>
                            <span>Car Hire</span>
                        </li>
                        <li>
                            <i class = "flaticon-phone-receiver"></i>
                            <span>Wake-up Call</span>
                        </li>
                        <li>
                            <i class = "flaticon-breakfast"></i>
                            <span>Breakfast</span>
                        </li>
                        <li>
                            <i class = "flaticon-wifi-connection-signal-symbol"></i>
                            <span>Free Wi-Fi</span>
                        </li>
                        <li>
                            <i class = "flaticon-weightlifting"></i>
                            <span>Gym</span>
                        </li>
                        <li>
                            <i class = "flaticon-graph-line-screen"></i>
                            <span>Flat Screen TV</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Our facilties section end -->



<!--News popular testimonials start -->
<div class = "news-popular-testimonials-section content-area-7">
    <div class = "container">
        <div class = "row">
            <div class = "col-md-4">
                <div class = "recent-news-section div-mrg-btm-60">
                    <!--Main title -->
                    <div class = "main-title">
                        <h1><span>Recent</span> News</h1>
                    </div>
                    <div class = "recent-news">
                        <div class = "media">
                            <div class = "media-left">
                                <img class = "media-object" src = "images/room/small-img.jpg" alt = "small-img">
                            </div>
                            <div class = "media-body">
                                <h3 class = "media-heading">
                                    <a href = "rooms-details.html">A Standard Blog Post</a>
                                </h3>
                                <p>Nostram virtutem poterimus quoddam praesertim legendos libero</p>
                                <h5>10 October, 2017</h5>
                            </div>
                        </div>
                        <div class = "media">
                            <div class = "media-left">
                                <img class = "media-object" src = "images/room/small-img-2.jpg" alt = "small-img-2">
                            </div>
                            <div class = "media-body">
                                <h3 class = "media-heading">
                                    <a href = "rooms-details.html">A Standard Blog Post</a>
                                </h3>
                                <p>Nostram virtutem poterimus quoddam praesertim legendos libero</p>
                                <h5>10 October, 2017</h5>
                            </div>
                        </div>
                        <div class = "media">
                            <div class = "media-left">
                                <img class = "media-object" src = "images/room/small-img-3.jpg" alt = "small-img-3">
                            </div>
                            <div class = "media-body">
                                <h3 class = "media-heading">
                                    <a href = "rooms-details.html">A Standard Blog Post</a>
                                </h3>
                                <p>Nostram virtutem poterimus quoddam praesertim legendos libero</p>
                                <h5>10 October, 2017</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-md-5">
                <div class = "gallery-section div-mrg-btm-60">
                    <!--Main title -->
                    <div class = "main-title">
                        <h1><span>Popular</span> Places</h1>
                    </div>
                    <!--Photo gallery start -->
                    <div class = "photo-gallery simple-slider">
                        <div id = "carousel-custom-2" class = "carousel slide" data-ride = "carousel">
                            <div class = "carousel-outer">
                                <!--Wrapper for slides -->
                                <div class = "carousel-inner">
                                    <div class = "item">
                                        <img src = "images/popular-places/img-1.jpg" class = "thumb-preview" alt = "Chevrolet Impala">
                                    </div>
                                    <div class = "item active">
                                        <img src = "images/popular-places/img-2.jpg" class = "thumb-preview" alt = "Chevrolet Impala">
                                    </div>
                                    <div class = "item">
                                        <img src = "images/popular-places/img-3.jpg" class = "thumb-preview" alt = "Chevrolet Impala">
                                    </div>
                                </div>
                                <!--Controls -->
                                <a class = "left carousel-control" href = "#carousel-custom-2" role = "button" data-slide = "prev">
                                    <span class = "slider-mover-left no-bg" aria-hidden = "true">
                                        <i class = "fa fa-angle-left"></i>
                                    </span>
                                    <span class = "sr-only">Previous</span>
                                </a>
                                <a class = "right carousel-control" href = "#carousel-custom-2" role = "button" data-slide = "next">
                                    <span class = "slider-mover-right no-bg" aria-hidden = "true">
                                        <i class = "fa fa-angle-right"></i>
                                    </span>
                                    <span class = "sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Photo gallery end -->
                </div>
            </div>
            <div class = "col-md-3">
                <!--Main title -->
                <div class = "main-title">
                    <h1><span>Our</span> Testimonials</h1>
                </div>
                <!--Testimonial secion start -->
                <div class = "testimonial-section testimonial-2">
                    <div class = "row">
                        <div class = "col-lg-12">
                            <div class = "testimonials text-center">
                                <div id = "carouse3-example-generic" class = "carousel slide" data-ride = "carousel">
                                    <!--Indicators -->
                                    <!--Wrapper for slides -->
                                    <div class = "carousel-inner" role = "listbox">
                                        <div class = "item content active clearfix">
                                            <div class = "item-inner">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla</p>
                                                <div class = "testimonials-avatar">
                                                    <img src = "images/testimonial/avatar-2.jpg" alt = "avatar-2">
                                                </div>
                                                <div class = "author-name">
                                                    Karen Paran
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "item content clearfix">
                                            <div class = "item-inner">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla</p>
                                                <div class = "testimonials-avatar">
                                                    <img src = "images/testimonial/avatar-3.jpg" alt = "avatar-3">
                                                </div>
                                                <div class = "author-name">
                                                    David Jackson
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "item content clearfix">
                                            <div class = "item-inner">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla</p>
                                                <div class = "author-name">
                                                    John Doe
                                                </div>
                                                <div class = "testimonials-avatar">
                                                    <img src = "images/testimonial/avatar-4.jpg" alt = "avatar-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Controls -->
                                    <a class = "left carousel-control" href = "#carouse3-example-generic" role = "button" data-slide = "prev">
                                        <span class = "slider-mover-left" aria-hidden = "true">
                                            <i class = "fa fa-angle-left"></i>
                                        </span>
                                        <span class = "sr-only">Previous</span>
                                    </a>
                                    <a class = "right carousel-control" href = "#carouse3-example-generic" role = "button" data-slide = "next">
                                        <span class = "slider-mover-right" aria-hidden = "true">
                                            <i class = "fa fa-angle-right"></i>
                                        </span>
                                        <span class = "sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Testimonial secion end -->
            </div>
        </div>
    </div>
</div>
<!--News popular testimonials end -->

<!--Gallery secion start -->
<div class = "gallery-secion">
    <div class = "container">
        <!--Main title -->
        <div class = "main-title">
            <h1><span>Our</span> Gallery</h1>
        </div>
        <ul class = "list-inline-listing filters filters-listing-navigation">
            <li class = "active btn filtr-button filtr" data-filter = "all">All</li>
            <li data-filter = "1" class = "btn btn-inline filtr-button filtr">Classic</li>
            <li data-filter = "2" class = "btn btn-inline filtr-button filtr">Deluxe</li>
            <li data-filter = "3" class = "btn btn-inline filtr-button filtr">Royal</li>
            <li data-filter = "4" class = "btn btn-inline filtr-button filtr">Luxury</li>
        </ul>
        <div class = "row">
            <div class = "filtr-container">

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "3, 2, 4">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-3.jpg" alt = "images-3" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Luxury Room</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "3, 4, 1">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-2.jpg" alt = "images-2" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Double Room</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "1, 4, 2">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-1.jpg" alt = "images-1" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Single Room</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "2, 3, 1">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-4.jpg" alt = "images-4" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Family Room</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "1, 2, 3">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-5.jpg" alt = "images-5" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Standard</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "4, 2, 1">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-6.jpg" alt = "images-6" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Couple Room</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "1, 4, 2">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-7.jpg" alt = "images-7" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Single Room</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12  filtr-item" data-category = "2, 3, 4">
                    <figure class = "portofolio-thumb">
                        <a href = "#"><img src = "images/room/img-8.jpg" alt = "images-8" class = "img-responsive"></a>
                        <figcaption>
                            <div class = "figure-content">
                                <h3 class = "title">Family Room</h3>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Gallery secion end -->

<!--Counters strat -->
<div class = "counters">
    <h1>Hotel Statistics</h1>
    <div class = "container">
        <div class = "row">
            <div class = "col-md-3 col-sm-6 bordered-right">
                <div class = "counter-box">
                    <h1 class = "counter">967</h1>
                    <h5>Guest Stay</h5>
                </div>
            </div>
            <div class = "col-md-3 col-sm-6 bordered-right">
                <div class = "counter-box">
                    <h1 class = "counter">577</h1>
                    <h5>Book Room</h5>
                </div>
            </div>
            <div class = "col-md-3 col-sm-6 bordered-right">
                <div class = "counter-box">
                    <h1 class = "counter">1398</h1>
                    <h5>Member Stay</h5>
                </div>
            </div>
            <div class = "col-md-3 col-sm-6">
                <div class = "counter-box counter-box-2">
                    <h1 class = "counter">376</h1>
                    <h5>Meals Served</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Counters end -->

<!--Staff section start -->
<div class="staff-section chevron-icon content-area">
    <div class="overlay">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1><span>Our</span> Staff</h1>
            </div>
            <div class="row">
                <div class="carousel our-partners slide" id="ourPartners3">
                    <div class="col-lg-12 mrg-btm-30">
                        <a class="right carousel-control" href="#ourPartners3" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                        <a class="right carousel-control" href="#ourPartners3" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        // $d = new Database();
                        $table = "employee, designation";
                        $order = array("employee.id", "asc");
                        $where = array();
                        $select = "employee.id, employee.name, employee.email, employee.picture, designation.name designation_name";
                        $rel = array(
                            "employee.designationid" => "designation.id"
                        );
                        $data = $d->view($table, $order, "", $select, $rel);
                        $v = $data->num_rows;
                        for ($s = 0; $s <= $v; $s++) {
                            if ($s == $v) {
                                ;
//                        if ($data->num_rows == $v) {
                                while ($value = $data->fetch_object()) {
                                    ?>
                                    <div class="item active">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <!-- Our staff box start -->
                                            <div class="our-staff-box">
                                                <!-- Staff img -->
                                                <a href="staff.html" class="teachers-img">
                                                    <img src="images/staff/<?php echo $value->id ?>.<?php echo $value->picture ?>" alt=<?php echo $value->name ?>" title="<?php echo $value->name ?>" class="img-responsive">

                                                </a>
                                                <!-- Staff content -->
                                                <div class="staff-content">
                                                    <!-- title -->
                                                    <h1 class="title">
                                                        <a href="staff.html"><?php echo $value->name ?></a>
                                                    </h1>
                                                    <!-- Subject -->
                                                    <h2 class="subject"><?php echo $value->designation_name ?></h2>
                                                    <h3 class="subject"><?php echo $value->email ?></h3>
                                                    <!-- paragraph -->
                                                    <p>lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <!-- Social list -->
                                                    <ul class="social-list clearfix">
                                                        <li>
                                                            <a href="#" class="facebook">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="twitter">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="linkedin">
                                                                <i class="fa fa-linkedin"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="google">
                                                                <i class="fa fa-google-plus"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="rss">
                                                                <i class="fa fa-rss"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Our staff box end -->
                                        </div>
                                    </div>
                                    <?php
                                    $sultana = $value->id;
                                    break;
                                }
                            }
                        }
                        // $d = new Database();
                        $table = "employee, designation";
                        $order = array("employee.id", "desc");
                        $where = array();
                        $select = "employee.id, employee.name, employee.email, employee.picture, designation.name designation_name";
                        $rel = array(
                            "employee.designationid" => "designation.id"
                        );
                        $data = $d->view($table, $order, "", $select, $rel);
                        while ($value = $data->fetch_object()) {
                            if ($sultana != $value->id) {
                                ?>
                                <div class="item">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <!-- Our staff box start -->
                                        <div class="our-staff-box">
                                            <!-- Staff img -->
                                            <a href="staff.html" class="teachers-img">
                                                <img src="images/staff/<?php echo $value->id ?>.<?php echo $value->picture ?>" alt=<?php echo $value->name ?>" title="<?php echo $value->name ?>" class="img-responsive">
                                            </a>
                                            <!-- Staff content -->
                                            <div class="staff-content">
                                                <!-- title -->
                                                <h1 class="title">
                                                    <a href="staff.html"><?php echo $value->name ?></a>
                                                </h1>
                                                <!-- Subject -->
                                                <h2 class="subject"><?php echo $value->designation_name ?></h2>
                                                <h3 class="subject"><?php echo $value->email ?></h3>
                                                <!-- paragraph -->
                                                <p>lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <!-- Social list -->
                                                <ul class="social-list clearfix">
                                                    <li>
                                                        <a href="#" class="facebook">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="twitter">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="linkedin">
                                                            <i class="fa fa-linkedin"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="google">
                                                            <i class="fa fa-google-plus"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="rss">
                                                            <i class="fa fa-rss"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Our staff box end -->
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--Staff section end -->
<!--Partners block start -->
<div class = "partners-block">
    <div class = "container">
        <h3>Our Partners</h3>
        <div class = "row">
            <div class = "col-md-12">
                <div class = "carousel our-partners slide" id = "ourPartners">
                    <div class = "carousel-inner">
                        <div class = "item active">
                            <div class = "col-xs-12 col-sm-6 col-md-3">
                                <a href = "#">
                                    <img src = "images/brand/audiojungle.png" alt = "audiojungle">
                                </a>
                            </div>
                        </div>
                        <div class = "item">
                            <div class = "col-xs-12 col-sm-6 col-md-3">
                                <a href = "#">
                                    <img src = "images/brand/themeforest.png" alt = "themeforest">
                                </a>
                            </div>
                        </div>
                        <div class = "item">
                            <div class = "col-xs-12 col-sm-6 col-md-3">
                                <a href = "#">
                                    <img src = "images/brand/tuts.png" alt = "tuts">
                                </a>
                            </div>
                        </div>
                        <div class = "item">
                            <div class = "col-xs-12 col-sm-6 col-md-3">
                                <a href = "#">
                                    <img src = "images/brand/graphicriver.png" alt = "graphicriver">
                                </a>
                            </div>
                        </div>
                        <div class = "item">
                            <div class = "col-xs-12 col-sm-6 col-md-3">
                                <a href = "#">
                                    <img src = "images/brand/codecanyon.png" alt = "codecanyon">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class = "left carousel-control" href = "#ourPartners" data-slide = "prev"><i class = "fa fa-chevron-left icon-prev"></i></a>
                    <a class = "right carousel-control" href = "#ourPartners" data-slide = "next"><i class = "fa fa-chevron-right icon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Partners block end -->

  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#checkin" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#checkout" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );
  </script>