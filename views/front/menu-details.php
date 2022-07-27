<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Menu Details</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Menu Details</li>
            </ul>
        </div>
    </div>

    <!-- Top header start -->

</div>

<!-- Sub Banner end -->
<?php
$d = new Database();
$where = array("id" => $_GET['id']);
$dataaa = $d->view("menu_view", array(), $where);
//session_destroy();
if (isset($_SESSION['menuid'])) {
    print_r($_SESSION['menuid']);
    echo "<br />";
    print_r($_SESSION['qty']);
}

$arr = array();
while ($value = $dataaa->fetch_object()) {
    ?>

    <!-- Rooms detail section start -->
    <div class="content-area rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <!-- Heading courses start -->
                    <div class="heading-rooms  clearfix sidebar-widget">
                        <div class="pull-left">

                            <h3><?php echo $value->title ?></h3>


                            <h3><span style="color: red;">$</span><?php echo round($value->price) ?></h3>
                            <p style="color: #00c2f9;">
                                <?php echo $value->discount ?>0%Discount
                            </p>
                            <div style="">
                                <img src="<?php echo "images/menu/menu-$value->id" . ".{$value->picture}" ?>"  class="thumb-preview" alt="Chevrolet Impala" width="500px" height="500px">
                            </div>
                            <div class="divv">
                                <!-- Title -->
                                <h1><b>Food Description</b></h1>

                                <h3><p><?php echo $value->mname ?></p></h3>
                                <h4><p><?php echo $value->cname ?></p></h4>
                                <!-- paragraph -->
                                <p><?php echo $value->description ?></p><br><br><br>


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <form>
                                            <p><b>Quantity:</b></p>  <input type="number" id="qty" value="1" min="1"/><br><br><br>

                                            <input type="button" class = "btn button-sm button-theme" id="cart" value="Add To Cart"/><br>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- Heading courses end -->

                    <!-- sidebar start -->


                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">


                    <div class="sidebar-widget category-posts">
                        <div class="main-title-2">
                            <h1>Category</h1>
                        </div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Asian</a> <span>(45)</span></li>
                            <li><a href="#">Indian</a> <span>(21)</span></li>
                            <li><a href="#">Chinese</a> <span>(23)</span></li>
                            <li><a href="#">European </a> <span>(19)</span></li>
                            <li><a href="#">Bangladeshi</a> <span>(19)</span></li>
                            <li><a href="#">French  </a> <span>(22)</span></li>
                            <li><a href="#">Pizza  </a> <span>(22)</span></li>
                            <li><a href="#">Seafood  </a> <span>(22)</span></li>
                            <li><a href="#">others  </a> <span>(22)</span></li>
                        </ul>
                    </div>



                    <div class="sidebar-widget category-posts">
                        <div class="main-title-2">
                            <h1>Establishment Type</h1>
                        </div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Restaurants</a></li>
                            <li><a href="#">Dessert</a></li>
                            <li><a href="#">Coffee & Tea</a></li>
                            <li><a href="#">Bakeries </a></li>
                            <li><a href="#">Bars & Pubs</a></li>
                            <li><a href="#">others  </a></li>

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



                </div>
                <!-- Recent comments end-->
            </div>
        </div>
    </div>
    <?php
}
?>
<!-- Rooms detail section end -->

<!-- Partners block start -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->

<script type="text/javascript" src="../../assets/js/google-api-maps.js" ></script>

<script>
    $(document).ready(function () {
        $('body').on('click', '#cart', function () {
            var id = <?php echo $_GET['id']; ?>;
            var qty = $('#qty').val();
            $.ajax({
                type: 'GET',
                url: 'ajax/cart.php',
                data: {
                    gundaaa: id,
                    qty: qty
                },
                success: function (data) {
                    alert('Added To Cart');
                    var items = parseInt($('#items').text()) + 1;
                    $('#items').text(items);
                    $html = '';
                    $html += '<li>';
                    $html += 'Image: <img src="images/menu/menu-' + id + '.' + data['picture'] + ' " width="80" /><br/>';
                    $html += 'Title:' + data['title'] + '<br/>';
                    $html += 'Price:' + data['price'] + '<br/>';
                    $html += 'Quantity:' + qty + '<br/>';
                    $html += 'Total:' + data['stotal'] + '<br/>';
$html += '<input type="button" class="remove" value="del"/>';
                    $html += '</li>';

                    $('.cartlist').append($html);
                }
            });
        });

        
    });
</script>

