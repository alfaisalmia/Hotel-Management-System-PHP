
<!-- Banner start -->
<div class="banner banner-2">
    <div class="banner-inner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!--                <div class="item active">
                                    <img src="images/banner/banner-slider-3.jpg" alt="banner-slider-3">
                                    <div class="carousel-caption banner-slider-inner banner-top-align">
                                        <div class="text-center">
                                            <h1 data-animation="animated fadeInDown delay-05s"><span>Welcome to</span> Alpha Hotel</h1>
                                            <a href="#" class="btn button-md button-theme" data-animation="animated fadeInUp delay-05s">Get Started Now</a>
                                            <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInUp delay-05s">Learn More</a>
                                        </div>
                                    </div>
                                </div>-->
                <!--                <div class="item">
                                    <img src="images/banner/banner-slider-2.jpg" alt="banner-slider-2">
                                    <div class="carousel-caption banner-slider-inner banner-top-align">
                                        <div class="text-right">
                                            <h1 data-animation="animated fadeInDown delay-05s"><span>Best Place</span> To Find Room</h1>
                                            <a href="#" class="btn button-md button-theme" data-animation="animated fadeInUp delay-05s">Get Started Now</a>
                                            <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInUp delay-05s">Learn More</a>
                                        </div>
                                    </div>
                                </div>-->
                <div class="item active">
                    <img src="images/banner/1.jpg" alt="banner-slider-1">
                    <div class="carousel-caption banner-slider-inner banner-top-align">
                        <div class="text-left">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Search Again </span> To Find Room</h1>
                            <a href="index.php" class="btn button-md button-theme" data-animation="animated fadeInUp delay-05s">Touch Me </a>
                            <!--                            <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInUp delay-05s">Learn More</a>-->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -
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
            </a>-->
        </div>



        <!-- Search area box start -->

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
                                <input type="text" class="btn-default datepicker" placeholder="Check In">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 col-pad">
                            <div class="form-group">
                                <input type="text" class="btn-default datepicker" placeholder="Check Out">
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

        $sdate = date('Y-m-d', strtotime($_GET['checkin']));
     $edate = date('Y-m-d', strtotime($_GET['checkout']));
       $testing = $d->search("$sdate", "$edate", $_GET['adult'], $_GET['child'], $_GET['room']);
     //    $testing = $_SESSION['testing'];
//         print_r ($testing);
//         die();
      if ($testing->num_rows > 0) {
            echo "<div class = 'main-title'><br/>
            <h1><span>Searching </span> Results</h1>
        </div>";
        } else {
            echo "<img src = 'images/error.png' alt = 'images-6' class = 'img-responsive'>";
        }




        while ($value = $testing->fetch_object()) {
            //print_r($value);
            ?>

            <div class = "col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <!--Hotel box start -->
                <div class = "hotel-box">
                    <!--header -->
                    <div class = "header clearfix">
                        <img src = "images/room/upload/pic1/<?php echo $value->id; echo ".";echo $value->picture1?>" alt = "" class = "img-responsive">
                    </div>
                    <!--Detail -->
                    <div class = "detail clearfix">
                        <div class = "price">
                            Tk. <?php echo $value->price ?><sub> /Night</sub>
                        </div>

                        <h3>
                            <a href = "rooms-details.html"></a>
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


                        <p>Discount :  <?php echo $value->discount ?> % <br/>
                            Room No: <?php echo $value->code ?><br/>
    <?php echo $value->description ?></p>
                        <a href = "index.php?f=room-details&id=<?php echo $value->id ?>&checkin=<?php echo $sdate?>&checkout=<?php echo $edate?>" class = "btn button-sm button-theme">View Details</a>
                    </div>
                </div>
                <!--Hotel box end -->
            </div>
            <?php
        }
        ?>
    </div>
</div>


<br/>
