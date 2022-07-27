<br><br><br><b<br><br><br><br><br><br>
    <!-- contact -->
    <div>
        <div class="container">
            <h2 class="animated wow fadeInLeft" data-wow-delay=".5s" style="text-align: center; color: #FF7000" b>Checkout</h2>
            <div class=" col-sm-12">

                <div class="container1">

                    <table>
                        <tr>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        $total = 0;
                        $gtotal = 0;
                        $gqty = 0;
                        if (isset($_SESSION['price'])) {

                            foreach ($_SESSION['price'] as $key => $price) {
                                $total = ($_SESSION['qty'][$key] * $_SESSION['price'][$key]);
                                $gtotal += $total;
                                $gqty += $_SESSION['qty'][$key];
                                ?>
                                <tr>
                                    <td><img src="images/menu/menu-<?php echo "{$_SESSION['menuid'][$key]}.{$_SESSION['picture'][$key]}"; ?>" width="150"/></td>
                                    <td><?php echo $_SESSION['title'][$key]; ?></td>

                                    <td><?php echo $_SESSION['price'][$key]; ?></td>
                                    <td><?php echo $_SESSION['qty'][$key]; ?></td>
                                    <td><?php echo $total; ?></td>

                                </tr>

                                <?php
                            }
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

    </div>



    <div class="check-out">	 
        <div class="container">	
            <div class=" cart-total">

                <h2 class="continue" >Cart Total</h2>
                <div class="price-details">
                    <h3>Price Details</h3>

                    <span>Total Amount</span>
                    <span class="last_price" id="gtotal"><?php echo $gtotal; ?></span>
                    <div class="clearfix"></div>
                    <span>Quantity</span>
                    <span class="total1"><?php echo $gqty; ?></span>
                    <div class="clearfix"></div>				 
                </div>	
                <ul class="total_price">
                    <li class="last_price"> <h4>PAY TOTAL</h4></li>	
                    <li class="last_price" id="paytotal"><span><?php echo $gtotal; ?></span></li>
                    <div class="clearfix"></div>
                </ul>

                <?php
                if (isset($_POST['checking'])) {
                    if ($_SESSION['id']) {
                        Redirect('index.php?f=checkout');
                    } else {
                        $_SESSION['checkout'] = 'index.php?f=checkout';
                        Redirect('index.php?f=login');
                    }
                }
                ?>
                <form method="post">
                    <select>
                        <option value="0">Choose Payment Method</option>
                        <?php
                        $d = new Database();
                        $pmethod = $d->view("payment");
                        //print_r($pmethod);
                        while ($value = $pmethod->fetch_object()) {
                            echo "<option value='$value->id'>$value->name</option>";
                        }
                        ?>
                    </select>

                    <input type="submit" class = "btn button-sm button-theme" name="checking" value="Checkout" id="resell" 
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo "onclick=\"return confirm('Confirmed Checkout')\"";
                    } else {
                        echo "onclick=\"return confirm('Confirm Checkout! Please Login first.')\"";
                    }
                    ?>
                           />
                </form>
                
            </div>


        </div>
    </div>


</div>
<script>
    $(document).ready(function () {
        $(document).on('change', '#disc', function () {
            var disc = $('#disc').val();
            var gtotal = $('#gtotal').text();

            var discprice = gtotal * (disc / 100);
            var paytotal = gtotal - discprice;
            $('#total-disc').text(discprice);
            $('#paytotal').text(paytotal);
            //alert(discprice);

        });
        $(document).on('click', '#resell', function () {
            var disc = $('#disc').val();


            $.ajax({
                type: 'GET',
                url: 'ajax/checkout.php',
                data: {
                    disc: disc
                },
                success: function (data)
                {
                    alert(data);
                }

            });
            return false;


        });
        //return false;
    });
</script>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th {
        background-color: #afd9ee;
        height: 100px;
        padding-top: 50px;
        padding-bottom: 80px;
        margin-bottom: 50px;
        margin-top: 50px;
    }

    table, tr{
        padding-top: 50px;
        padding-bottom: 80px;
        margin-bottom: 50px;
        margin-top: 50px; 
    }
    th, td {
        padding-top: 50px;
        padding-bottom: 80px;
        margin-bottom: 50px;
        margin-top: 50px;
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    .container1{
        background-color: #faebcc;
        width: content-box;
    }
    .cart-total {
        float: right;
    }
    .continue {
        font-size: 2em;
        color: #000;
        display: block;
        font-weight: 600;
        margin-bottom: 2em;
        font-family: 'Lato', sans-serif;
    }
    .price-details h3 {
        color: #000;
        font-size: 1.2em;
        margin-bottom: 1em;
    }
    .price-details span {
        width: 50%;
        float: left;
        font-size: 0.8125em;
        color: #000;
        line-height: 1.8em;
    }
    .price-details span {
        width: 50%;
        float: left;
        font-size: 0.8125em;
        color: #000;
        line-height: 1.8em;
    }
    ul.total_price li.last_price {
        width: 50%;
        float: left;
    }
    ul.total_price {
        padding: 0;
        margin: 1em 0 0 0;
        list-style: none;
    }
    .cart-total a {
        color: #fff;
        background: #FF7000;
        text-decoration: none;
        padding: 0.5em 1em;
        font-size: 2em;
        display: inline-block;
        margin-top: 1em;
    }


</style>

<br><br>



