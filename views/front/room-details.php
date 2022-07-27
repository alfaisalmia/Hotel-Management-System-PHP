<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Room Details</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Room Details</li>
            </ul>
        </div>
    </div>

    <!-- Top header start -->

</div>
<br><br><br><br><br><br>
<!-- Sub Banner end -->
<?php
$d = new Database();
$where = array("id" => $_GET['id']);
$dataaa = $d->view("room_details_view", array(), $where);



$arr = array();
while ($value = $dataaa->fetch_assoc()) {
    $arr[] = $value;
}


foreach ($arr as $a) {
    foreach ($arr as $s) {
        //echo $s['svname'] . "<br />";
    }
    //print_r($a);
    ?>

    <!-- Rooms detail section start -->
    <div class="content-area rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <!-- Heading courses start -->
                    <div class="heading-rooms  clearfix sidebar-widget">
                        <div class="pull-left">
                            <h3><?php echo $a['code'] ?></h3>
                            <p>
                                <?php echo $a['roomtype_name'] ?>
                            </p>
                        </div>
                        <div class="pull-right">
                            <h3><span><?php echo $a['price'] ?></span></h3>
                            <h5>/Day & Night</h5>
                        </div>
                    </div>
                    <!-- Heading courses end -->

                    <!-- sidebar start -->
                    <div class="rooms-detail-slider sidebar-widget">
                        <!--  Rooms detail slider start -->
                        <div class="rooms-detail-slider simple-slider mrg-btm-40 ">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item">
                                            <img src="images/room/upload/pic1/<?php echo $a['id'] ?>.<?php echo $a['picture1'] ?>" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="images/room/upload/pic2/<?php echo $a['id'] ?>.<?php echo $a['picture2'] ?>" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="images/room/upload/pic3/<?php echo $a['id'] ?>.<?php echo $a['picture3'] ?>" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="images/room/upload/pic1/<?php echo $a['id'] ?>.<?php echo $a['picture1'] ?>" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="images/room/upload/pic2/<?php echo $a['id'] ?>.<?php echo $a['picture2'] ?>" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="images/room/upload/pic3/<?php echo $a['id'] ?>.<?php echo $a['picture3'] ?>" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item active">
                                            <img src="images/room/upload/pic2/<?php echo $a['id'] ?>.<?php echo $a['picture2'] ?>" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                        <span class="slider-mover-left no-bg" aria-hidden="true">
                                            <i class="fa fa-angle-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                        <span class="slider-mover-right no-bg" aria-hidden="true">
                                            <i class="fa fa-angle-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!-- Indicators -->
                                <ol class="carousel-indicators thumbs visible-lg visible-md">
                                    <li data-target="#carousel-custom" data-slide-to="0" class=""><img src="images/room/upload/pic1/<?php echo $a['id'] ?>.<?php echo $a['picture1'] ?>" alt="Chevrolet Impala"></li>
                                    <li data-target="#carousel-custom" data-slide-to="1" class=""><img src="images/room/upload/pic2/<?php echo $a['id'] ?>.<?php echo $a['picture2'] ?>" alt="Chevrolet Impala"></li>
                                    <li data-target="#carousel-custom" data-slide-to="2" class=""><img src="images/room/upload/pic3/<?php echo $a['id'] ?>.<?php echo $a['picture3'] ?>" alt="Chevrolet Impala"></li>
                                    <li data-target="#carousel-custom" data-slide-to="3" class=""><img src="images/room/upload/pic1/<?php echo $a['id'] ?>.<?php echo $a['picture1'] ?>" alt="Chevrolet Impala"></li>
                                    <li data-target="#carousel-custom" data-slide-to="4" class=""><img src="images/room/upload/pic2/<?php echo $a['id'] ?>.<?php echo $a['picture2'] ?>" alt="Chevrolet Impala"></li>
                                    <li data-target="#carousel-custom" data-slide-to="5" class=""><img src="images/room/upload/pic3/<?php echo $a['id'] ?>.<?php echo $a['picture3'] ?>" alt="Chevrolet Impala"></li>
                                    <li data-target="#carousel-custom" data-slide-to="6" class=""><img src="images/room/upload/pic2/<?php echo $a['id'] ?>.<?php echo $a['picture2'] ?>" alt="Chevrolet Impala"></li>
                                </ol>
                            </div>
                        </div>
                        <!-- Rooms detail slider end -->

                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-lg hidden-md clearfix">
                            <h3>Search Your Rooms</h3>
                            <h1>$260/Night</h1>
                            <div class="search-contents">
                                <form method="GET">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker" placeholder="Check In">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="btn-default datepicker" placeholder="Check Out">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="room">
                                                        <option>Room</option>
                                                        <option>Single Room</option>
                                                        <option>Double Room</option>
                                                        <option>Deluxe Room</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="beds">
                                                        <option>Beds</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="adults">
                                                        <option>Adult</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="children">
                                                        <option>Child</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">

                                                    <a href = "index.php?f=room-details&id=<?php echo $value->id ?>" class = "btn button-sm button-theme">Book</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->

                        <!-- Rooms description start -->
                        <div class="panel-box course-panel-box course-description">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab" aria-expanded="true">Description</a></li>
                                <li class=""><a href="#tab2default" data-toggle="tab" aria-expanded="false">Features</a></li>
                                <li class=""><a href="#tab3default" data-toggle="tab" aria-expanded="false">Advantages</a></li>
                                <li class=""><a href="#tab4default" data-toggle="tab" aria-expanded="false">Our Staff</a></li>
                                <li class=""><a href="#tab5default" data-toggle="tab" aria-expanded="false">Video</a></li>
                            </ul>
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1default">
                                            <div class="divv">
                                                <!-- Title -->
                                                <h3>Rooms Description</h3>
                                                <!-- paragraph -->
                                                <p><?php echo $a['description'] ?></p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade features" id="tab2default">
                                            <!-- Rooms features start -->
                                            <div class="rooms-features">
                                                <h3>Rooms Features</h3>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-air-conditioning"></i>Air conditioning
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-balcony-and-door"></i>Balcony
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-weightlifting"></i>Gym
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-parking"></i>Parking
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-sunbed"></i>Beach View
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-bed"></i>2 Bedroom
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-person-learning-by-reading"></i>Free Newspaper
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-swimming-silhouette"></i>Use of pool
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-graph-line-screen"></i>TV
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-no-smoking-sign"></i>No Smoking
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-room-service"></i>Room Service
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-breakfast"></i>Breakfast
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-phone-receiver"></i>Telephone
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-bed"></i>2 Bedroom
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-wifi-connection-signal-symbol"></i>Free Wi-Fi
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rooms features end -->
                                        </div>
                                        <div class="tab-pane fade technical" id="tab3default">
                                            <!-- Advantages start -->
                                            <div class="advantages">
                                                <h3>Advantages</h3>
                                                <ul>
                                                    <li><span>1</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>2</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>3</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>4</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>5</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                    <li><span>6</span>Lorem ipsum dolor sit amet consectetuer</li>
                                                </ul>
                                            </div>
                                            <!-- Advantages end -->
                                        </div>
                                        <div class="tab-pane fade" id="tab4default">
                                            <!-- Our teachers start -->
                                            <h3>Our staff</h3>
                                            <div class="row">
                                                <div class="our-teachers">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <!-- Teachers box start -->
                                                        <div class="our-staff-box ">
                                                            <!-- Teachers img -->
                                                            <a href="staff.html" class="teachers-img">
                                                                <img src="img/staff/staff-1.jpg" alt="staff-1" class="img-responsive">
                                                            </a>
                                                            <!-- Teachers content -->
                                                            <div class="staff-content">
                                                                <!-- title -->
                                                                <h1 class="title">
                                                                    <a href="staff.html">John Doe</a>
                                                                </h1>
                                                                <!-- Subject -->
                                                                <h3 class="subject">Hotel Manager</h3>
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
                                                        <!-- Teachers box end -->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <!-- Teachers box start -->
                                                        <div class="our-staff-box ">
                                                            <!-- Agent img -->
                                                            <a href="staff.html" class="teachers-img">
                                                                <img src="img/staff/staff-2.jpg" alt="staff-2" class="img-responsive">
                                                            </a>
                                                            <!-- Teachers content -->
                                                            <div class="staff-content">
                                                                <!-- title -->
                                                                <h1 class="title">
                                                                    <a href="staff.html">John Doe</a>
                                                                </h1>
                                                                <!-- Subject -->
                                                                <h3 class="subject">Hotel Manager</h3>
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
                                                        <!-- Teachers box end -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Our teachers end -->
                                        </div>
                                        <div class="tab-pane fade" id="tab5default">
                                            <!-- Inside video start  -->
                                            <div class="inside-video-2">
                                                <h3>Video</h3>
                                                <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                                            </div>
                                            <!-- Inside video end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rooms description end -->
                    </div>
                    <!-- sidebar end -->

                    <!-- Comments section start -->
                    <div class="comments-section sidebar-widget">
                        <!-- Main Title 2 -->
                        <div class="main-title-2">
                            <h1><span>Rooms </span> Reviews</h1>
                        </div>

                        <ul class="comments">
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta.</p>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <a href="#">
                                                    <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                                </a>
                                            </div>

                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <div class="comment-meta-author">
                                                        Jane Doe
                                                    </div>

                                                    <div class="comment-meta-reply">
                                                        <a href="#">Reply</a>
                                                    </div>

                                                    <div class="comment-meta-date">
                                                        <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="comment-body">
                                                    <div class="comment-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Comments section end -->

                    <!-- Contact form start -->
                    <div class="contact-form sidebar-widget">
                        <div class="main-title-2">
                            <h1> <span>Leave</span> a Comment</h1>
                        </div>
                        <form id="contact_form" action="https://storage.googleapis.com/themeforest-hotel-alpha/index.html" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group fullname">
                                        <input type="text" name="full-name" class="input-text" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group enter-email">
                                        <input type="email" name="email" class="input-text" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="input-text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="input-text" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group send-btn">
                                        <button type="submit" class="button-md button-theme">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form end -->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="sidebar">
                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-sm hidden-xs clearfix">
                            <h3>Your Search in Details</h3>
                            <h1><?php echo $a['price'] ?>/Day & Night</h1>
                            <div class="search-contents">
                                <?php
                                if (isset($_POST['booking'])) {
                                    if ($_SESSION['id']) {
                                        Redirect('index.php?f=booking-system');
                                    } else {

                                        $_SESSION['url'] = 'index.php?f=booking-system';

                                        Redirect("index.php?f=login");
                                    }
                                    echo $_SESSION['bookid'] = $_GET['id'];
                                    echo $_SESSION['checkin'] = $_GET['checkin'];
                                    echo $_SESSION['checkout'] = $_GET['checkout'];

                                    //Redirect('index.php?f=booking-system');
                                }
                                ?>

                                <form method="POST">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <span>Check In : </span><?php echo $_GET['checkin'] ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <span>Check Out : </span><?php echo $_GET['checkout'] ?>
                                                    <?php
                                                    $date1 = new DateTime($_GET['checkin']);
                                                    $date2 = new DateTime($_GET['checkout']);

                                                    $diff = $date2->diff($date1)->format("%a");
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <span>Total Days for Booking: </span><?php echo $diff ?> days
                                                </div>
                                                <div class="form-group">
                                                    <span>Status: </span><?php echo "Available" ?>
                                                </div>
                                                <div class="form-group">
                                                    <span>Room Type: </span><?php echo $a['roomtype_name'] ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <span>Roomsize: </span><?php echo $a['size'] ?> sq. feet
                                                </div>
                                                <div class="form-group">
                                                    <span>Adult: </span><?php echo $a['adult'] ?>
                                                </div>
                                                <div class="form-group">
                                                    <span>Child: </span><?php echo $a['child'] ?>
                                                </div>
                                                <div class="form-group">
                                                    <span>Price: </span><?php echo $a['price'] ?>
                                                </div>

                                                <div class="form-group">
                                                    <span>Discount: </span><?php echo $a['discount'] ?>
                                                </div>
                                                <div class="form-group">
                                                    <span>VAT: </span><?php echo $a['vat'] ?>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group mrg-btm-10">
                                                <button type="submit" name="booking" class="search-button"
                                                <?php
                                               
                                                if (isset($_SESSION['id'])) {
                                                    echo "onclick=\"return confirm('Booking Confirm?')\"";
                                                } else {
                                                    echo "onclick=\"return confirm('Booking Confirm?You must login first.')\"";
                                                }
                                                ?>
                                                        >Book Now
                                                </button>
                                                <i style="text-align: center; color: red">For booking you must login first</i>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Search area box 2 end -->

                    <!-- Recent news start -->
                    <div class="sidebar-widget recent-news">
                        <div class="main-title-2">
                            <h1>Recent News</h1>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="img/room/small-img.jpg" alt="small-img">
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">
                                    <a href="rooms-details.html">A Standard Blog Post</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h5>10 October, 2017</h5>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="img/room/small-img-2.jpg" alt="small-img-2">
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">
                                    <a href="rooms-details.html">Wedding David & karen</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h5>10 October, 2017</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Recent news end -->

                    <!-- Category posts start -->
                    <div class="sidebar-widget category-posts">
                        <div class="main-title-2">
                            <h1>Category</h1>
                        </div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Rooms</a> <span>(45)</span></li>
                            <li><a href="#">Promotion</a> <span>(21)</span></li>
                            <li><a href="#">Events</a> <span>(23)</span></li>
                            <li><a href="#">Creative </a> <span>(19)</span></li>
                            <li><a href="#">Design</a> <span>(19)</span></li>
                            <li><a href="#">Other  </a> <span>(22)</span></li>
                        </ul>
                    </div>
                    <!-- Category posts end -->

                    <!-- Social media start -->
                    <div class="social-media sidebar-widget clearfix">
                        <!-- Main Title 2 -->
                        <div class="main-title-2">
                            <h1>Social Media</h1>
                        </div>
                        <!-- Social list -->
                        <ul class="social-list">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                    <!-- Social media end -->

                    <!-- tags box start -->
                    <div class="sidebar-widget tags-box">
                        <div class="main-title-2">
                            <h1>Tags</h1>
                        </div>
                        <ul class="tags">
                            <li><a href="#">Rooms</a></li>
                            <li><a href="#">Promotion</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Video</a></li>
                            <li><a href="#">Audio</a></li>
                        </ul>
                    </div>
                    <!-- tags box end -->

                    <!-- Location start  -->
                    <div class="location sidebar-widget">
                        <div class="map">
                            <!-- Main Title 2 -->
                            <div class="main-title-2">
                                <h1>Location</h1>
                            </div>
                            <div id="map" class="contact-map" style="height: 662px;"></div>
                        </div>
                    </div>
                    <!-- Location end -->

                    <!-- Recent comments start -->
                    <div class="sidebar-widget recent-comments">
                        <div class="main-title-2">
                            <h1>Recent comments</h1>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="img/avatar/avatar-1.jpg" alt="avatar-1">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.
                                    Etiamrisus tortor, accumsan,
                                </p>
                                <span>By <b> John Doe</b></span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="img/avatar/avatar-2.jpg" alt="avatar-1">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.
                                    Etiamrisus tortor,
                                </p>
                                <span>By <b>Karen Paran</b></span>
                            </div>
                        </div>
                    </div>
                    <!-- Recent comments end-->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Rooms detail section end -->
    <?php
    break;
}
?>
<!-- Partners block start -->
<div class="partners-block">
    <div class="container">
        <h3>Our Partners</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel our-partners slide" id="ourPartners">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="img/brand/audiojungle.png" alt="audiojungle">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="img/brand/themeforest.png" alt="themeforest">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="img/brand/tuts.png" alt="tuts">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="img/brand/graphicriver.png" alt="graphicriver">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <a href="#">
                                    <img src="img/brand/codecanyon.png" alt="codecanyon">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#ourPartners" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                    <a class="right carousel-control" href="#ourPartners" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script type="text/javascript" src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->

<script type="text/javascript" src="../../assets/js/google-api-maps.js" ></script>
<script>
    function LoadMap(propertes) {
        var defaultLat = 40.7110411;
        var defaultLng = -74.0110326;
        var mapOptions = {
            center: new google.maps.LatLng(defaultLat, defaultLng),
            zoom: 15,
            scrollwheel: false,
            styles: [
                {
                    featureType: "administrative",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    featureType: 'poi.business',
                    stylers: [{visibility: 'off'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                },
            ]
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng(40.7110411, -74.0110326);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("" +
                        "<div class='map-edu contact-map-content'>" +
                        "<div class='map-content'>" +
                        "<p class='address'>20-21 Kathal St. Tampa, FL</p>" +
                        "<ul class='map-edu-list'> " +
                        "<li><i class='fa fa-phone'></i>  +0477 85X6 552</li> " +
                        "<li><i class='fa fa-envelope'></i>  info@themevessel.com</li> " +
                        "<li><a href='index.html'><i class='fa fa-globe'></i>  http://http://themevessel.com</li></a> " +
                        "</ul>" +
                        "</div>" +
                        "</div>");
                infoWindow.open(map, marker);
            });
        })(marker);
    }
    LoadMap();
</script>
