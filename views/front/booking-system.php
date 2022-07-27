<style>
    .cancel_booking{
        background-color: greenyellow;
    }
    .black{
        color:black;
    }
</style>
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Booking Details</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Booking System</li>
            </ul>
        </div>
    </div>

    <!-- Top header start -->

</div>

<!-- Sub Banner end -->
<?php
$d = new Database();
$id = $_SESSION['bookid'];
$roomid = $_SESSION['bookid'];
$checkin = $_SESSION['checkin'];
$checkout = $_SESSION['checkout'];
?>
<?php
$where = array("id" => $id);
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

    <!-- Booking flow start -->
    <div class="booking-flow content-area-10">
        <div class="container">
            <section>
                <div class="wizard">


                    <!--                    <form id="contact_form" method="post">-->
                    <div class="tab-content">


                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="">

                                <div class="">
                                    <div class="booling-details-box col-sm-6">
                                        <h3 class="booking-heading-2">Booking Details</h3>


                                        <!-- Rooms detail slider end -->
                                        <?php
                                        $date1 = new DateTime($checkin);
                                        $date2 = new DateTime($checkout);

                                        $diff = $date2->diff($date1)->format("%a");
                                        ?>


                                        <ul>
                                            <li>
                                                <span class="pull-left">Check In:</span> <?php echo $_SESSION['checkin'] ?>  <span class="pull-right">Check Out: <?php echo $_SESSION['checkout'] ?></span>
                                            </li>
                                            <li>
                                                <span class="pull-left">Room Type: </span><?php echo $a['roomtype_name'] ?>  <span class="pull-right">Roomsize:<?php echo $a['size'] ?> sq. feet </span>
                                            </li>
                                            <li>
                                                <span>Total Days for Booking: </span><?php echo $diff ?> days
                                            </li>
                                            <li>
                                                <span class="pull-left">Adult: </span><?php echo $a['adult'] ?>   <span class="pull-right">Child: <?php echo $a['child'] ?></span>
                                            </li>
                                            <li>
                                                <span>Price: </span><?php echo $a['price'] ?>
                                            </li>
                                            <hr>
                                            <li>
                                                <span>Total Price: </span><?php echo $a['price'] ?> X <?php echo $diff ?> = <span class="pull-right"><?php echo $totalprice = ($a['price'] * $diff) ?></span>
                                            </li>
                                            <li>
                                                <span>VAT: </span><?php echo $a['vat'] ?>% = <span class="pull-right"><?php echo $totalvat = round($a['price'] * ($a['vat'] / 100)) ?> </span>
                                            </li>
                                            <hr>
                                            <li>
                                                <span>In Total Price: </span>= <span class="pull-right"><?php echo $intotal = round($totalprice + $totalvat) ?></span>
                                            </li>
                                            <li>
                                                <span>Discount <?php
                                                    if ($a['discount']) {
                                                        echo $a['discount']
                                                        ?>% of Intotal:</span> = <span class="pull-right">(-)<?php
                                                        echo $discount = round($totalprice * ($a['discount'] / 100));
                                                    }
                                                    ?></span>
                                            </li><hr>
                                            <li>
                                                <span>Sub Total</span> = <span class="pull-right"><?php echo $subtotal = ($intotal - $discount) ?> </span>
                                            </li>

                                            <li>

                                                <div class="form-group">write coupon  <i><b>AD302 </b></i>  for discount.<br>
                                                    <form method="post">

                                                        <label>Coupon:</label>
                                                        <input type="text" name="coupon" class="black" value="">
                                                        <input type="submit" name="check" class="btn search-button" value="Apply" >
                                                    </form>
                                                </div>

                                            </li>


                                            <hr>
                                            <li>
                                                <span>Sub Total</span> = <span class="pull-right"><?php echo $subtotal = ($intotal - $discount) ?> </span>
                                                <?php
                                                $coupon = 0;
                                                if (isset($_POST['check'])) {
//                                                        $_SESSION['couponid'] = $_POST['coupon'];
                                                    $where = array("code" => $_POST['coupon']);
                                                    $coupondata = $d->view("coupon", array(), $where);
                                                    $coupon = array();
                                                    while ($test = $coupondata->fetch_assoc()) {
                                                        $coupon[] = $test;
                                                    }
                                                    foreach ($coupon as $c) {
                                                        $coupon = $c['id'];
                                                    }

                                                    if ($c['code'] == $_POST['coupon'] && date("Y-m-d") <= $c['date']) {
                                                        echo '<li>
                                                        <span>Coupon Discount</span> = <span class = "pull-right">';
                                                        echo $coupon = round(($subtotal * $c['percentage']) / 100);
                                                        echo "</span></li>";
                                                        $coupon = $c['id'];
                                                    } else {
                                                        $coupon = 1;
                                                        echo '<p style="color: red; ">Wrong Coupon</p>';
                                                    }
                                                }
                                                ?>
                                            </li>
                                            <li>

                                            </li>


                                            <hr>
                                            <div class="price">
                                                Grand Total: <span class="pull-right"><?php echo $grandtotal = round($subtotal - $coupon) ?></span>
                                            </div>
                                        </ul>
                                        <?php
//                                            if (isset($_SESSION['couponid'])) {
//                                                echo "<div class='price'>";
//                                                echo "Grand Total: ";
//                                                $aftercoupon = ($total * $c['percentage']) / 100;
//                                                echo $grand = round($total - $aftercoupon);
//                                                echo "</div>";
//                                            }
                                        ?>

                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="contact-form sidebar-widget">
                                        <div class=" mrg-btm-30">
                                            <h3 class="booking"> PAYMENT INFORMATION </h3>
                                            <br/><label>Payable Amount : </label> <b><?php echo $grandtotal ?></b>
                                            <h5 class="booking--2">Select Your Payment Method</h5>
                                            <div class="form-check form-check-inline">
                                                <form method="post">
                                                    <div class="form-group form-inline col-sm-6">
                                                        <select class="input-text" name="payment" id="payment">
                                                            <option value="0">Select Payment</option>
                                                            <?php
                                                            $dg = $d->view("payment", array("name", "asc"));
                                                            while ($value = $dg->fetch_object()) {
                                                                if ($value->id == $_POST['payment']) {
                                                                    echo "<option id='{$value->name}' selected value='{$value->id}'>{$value->name}</option>";
                                                                    echo $paymentid = $_POST['payment'];
                                                                } else {
                                                                    echo "<option id='{$value->name}' value='{$value->id}'>{$value->name}</option>";
                                                                }
                                                            }

                                                            //  echo $paymentid = $_POST['payment'];
                                                            ?>
                                                        </select>
                                                        <?php
                                                        if (isset($_POST['confirm'])) {
                                                            $error_payment = "";
                                                            if ($_POST['payment'] == 0) {
                                                                $error_payment = "<p style=\"color:red;\">Please select payment method</p>";
                                                            }

                                                            //$paymentid = $_POST['payment'];
                                                        }
                                                        ?>



                                                        <div class=" transaction" id="transaction" >
                                                            <label>Transaction ID</label>
                                                            <div class="form-group">
                                                                <input type="text" name="transaction" id="" class="input-text" placeholder="">
                                                            </div>

                                                        </div><br/>
                                                    </div>

                                                    <div class="col-sm-12" id="cardinfo">
                                                        <div clas="col-sm-6">
                                                            <div class="form-group form-inline">
                                                                <input type="text" name="card-number" id="" class="input-text" placeholder="Card Number"></div>
                                                        </div>
                                                        <div clas="col-sm-6">
                                                            <div class="form-group form-inline">
                                                                <input type="text" name="cvv" id="" class="input-text" placeholder="CVV Code"></div>
                                                        </div>
                                                        <div clas="col-sm-6">
                                                            <div class="form-group form-inline">
                                                                <select class="input-text" name="month">
                                                                    <option>Select Expire Month</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                    <option>11</option>
                                                                    <option>12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div clas="col-sm-6">
                                                            <div class="form-group">
                                                                <select class="input-text" name="Country">
                                                                    <option>Select Expire Year</option>
                                                                    <option>2026</option>
                                                                    <option>2025</option>
                                                                    <option>2024</option>
                                                                    <option>2023</option>
                                                                    <option>2022</option>
                                                                    <option>2021</option>
                                                                    <option>2020</option>
                                                                    <option>2019</option>
                                                                    <option>2018</option>
                                                                </select><br/>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <?php
                                        $where = array(
                                            "roomid" => $roomid,
                                            "userid" => $_SESSION['id'],
                                            "startdate" => $checkin,
                                            "enddate" => $checkout
                                        );
                                        $dataaa = $d->view("roombooking", array(), $where);
//                                            echo "<pre>";
//                                            print_r($dataaa);
//                                            echo "</pre>";
                                        if ($_SESSION['type'] == 1) {
                                            if ($dataaa->num_rows > 0) {
                                                echo '<input type="submit" class="btn search-button next-step cancel_booking" name="confirm" id="cancel_booking" onclick=\"return confirm("Cancel Booking? ")\" value="Cancel Booking"/>';
                                            } else {
                                                echo '<input type="submit" class="btn search-button next-step confirm_booking" name="confirm" id="confirm" value="Confirm Booking"/>';
                                            }
                                        } else {
                                            echo '<input type="submit" class="btn search-button next-step confirm_booking" name="confirm" id="confirm" value="Confirm Booking"/>';
                                        }


                                        //For getting Roombooking id for delect
                                        $where = array(
                                            "roomid" => $roomid,
                                            "userid" => $_SESSION['id'],
                                            "startdate" => $checkin,
                                            "enddate" => $checkout
                                        );
                                        $dataaa = $d->view("roombooking", array(), $where);
                                        $arr = array();
                                        while ($value = $dataaa->fetch_assoc()) {
                                            $arr[] = $value;
                                        }
                                        foreach ($arr as $a) {
                                            $id = $a['id'];
                                        }
                                        ?>

                                        </form>

                                    </div>
                                </div>


                            </div>
                            <ul class="list-inline pull-right">

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>



        </div>


        <!--                    </form>-->
    </div>
    </section>
    </div>
    </div>
    <!-- Booking flow end -->
    <?php
    break;
}
?>
<script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>

<script>
    $(document).ready(function () {
        $("#cardinfo").hide();
        $("#transaction").hide();
        $("#bKash").click(function () {
            $("#transaction").show();
            $("#cardinfo").hide();
        });
        $("#Visa, #skrill, #paypal, #payza, #MasterCard").click(function () {
            $("#transaction").hide();
            $("#cardinfo").show();
        });
        
    });
</script>

<script>
    $(document).ready(function () {
        
           if ($("#payment :selected").val() == 0) {
            $(".confirm_booking").attr("disabled", true);
            $(".confirm_booking").prop("title", "Select Payment Method");
            //alert($("#payment :selected").val());
        }
        $('select').on('change', function () {
            
            if ($("#payment :selected").val() == 0) {
                $(".confirm_booking").attr("disabled", true);
                $(".confirm_booking").prop("title", "Select Payment Method");

               // alert($("#payment :selected").val());
            } else {
                $(".confirm_booking").attr("disabled", false);
            }
            //alert(this.value);
        });
        
        $(".confirm_booking").click(function () {
            var grandtotal = <?php echo $grandtotal ?>;
            var discount = <?php if($discount != ''){echo $discount;}else{echo 0;} ?>;
            var totalvat = <?php echo $totalvat ?>;
            var roomid = <?php echo $roomid ?>;
            var checkin = '<?php echo $checkin ?>';
            var checkout = '<?php echo $checkout ?>';
            var userid = <?php echo $_SESSION['id'] ?>;
            var couponid = <?php echo $coupon ?>;
            var paymentid = $("#payment :selected").val();
            $.ajax({
                type: 'POST',
                data: {
                    "price": grandtotal,
                    "discount": discount,
                    "vat": totalvat,
                    "roomid": roomid,
                    "userid": userid,
                    "checkin": checkin,
                    "checkout": checkout,
                    "couponid": couponid,
                    "paymentid": paymentid,
                },
                url: "ajax/ajax_booking_confirm.php",
                success: function (data) {
                    alert(data);
                    $(".confirm_booking").val("Booked");
                    $(".confirm_booking").addClass("cancel_booking");
                    $(".confirm_booking").removeClass("confirm_booking");
                    $(".cancel_booking").attr("disabled", true);
                }
            });
            return false;
        });
        
     
    });
</script>