
<br/><br/><br/><br/><br/><br/><br/><br/><br/>


<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1>Add Your<span> Room Booking</span></h1>
        </div>
        <?php
        $d = new Database();

        if (isset($_POST['save'])) {

            $data = array(
                "userid " => $d->VD($_POST['user']),
                "roomid" => $d->VD($_POST['room']),
                "price" => $d->VD($_POST['price']),
                "discount" => $d->VD($_POST['discount']),
                "vat" => $d->VD($_POST['price']),
                "startdate" => $d->VD($_POST['sdate']),
                "enddate" => $d->VD($_POST['edate']),
                "advanced" => $d->VD($_POST['advance']),
                "couponid " => $d->VD($_POST['coupon']),
                "paymentid " => $d->VD($_POST['payment']),
            );
            if ($d->insert("roombooking", $data)) {

                echo "<p style='color : blue;'>Save Succesfully</p>";

                //Redirect("index.php?v=congratulate");
            } else {
                echo "<p style='color : red;'>Insert Valid Name</p>";
                echo $d->Error;
            }
        }
        ?>


        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <select class="input-text" name="user">
                    <option value="0">Select User Type</option>
                    <?php
                    $dg = $d->view("users", array("name", "asc"));
                    while ($value = $dg->fetch_object()) {
                        echo "<option value='{$value->id}'>{$value->name}</option>";
                    }
                    ?>
                </select>

            </div>

            <div class="form-group">
                <select class="input-text" name="room">
                    <option value="0">Select Room Type</option>
                    <?php
                    $dg = $d->view("room", array("code", "asc"));
                    while ($value = $dg->fetch_object()) {
                        echo "<option value='{$value->id}'>{$value->code}</option>";
                    }
                    ?>
                </select>

            </div>



            <div class="form-group">
                <input type="text" name="des" class="input-text" placeholder="Description">
            </div>
            <div class="form-group">
                <input type="text" name="price" class="input-text" placeholder="Price">
            </div>
            <div class="form-group">
                <input type="text" name="discount" class="input-text" placeholder="Discount">
            </div>

            <div class="form-group">
                <input type="text" name="vat" class="input-text" placeholder="Vat">
            </div>


            <div class="form-group">
                <input type="date" name="sdate" class="input-text" placeholder="Start Date">
            </div>

            <div class="form-group">
                <input type="date" name="edate" class="input-text" placeholder="End Date">
            </div>

            <div class="form-group">
                <input type="text" name="advance" class="input-text" placeholder="Advanced">
            </div>

            <div class="form-group">
                <select class="input-text" name="coupon">
                    <option value="0">Select coupon</option>
                    <?php
                    $dg = $d->view("coupon", array("code", "asc"));
                    while ($value = $dg->fetch_object()) {
                        echo "<option value='{$value->id}'>{$value->code}</option>";
                    }
                    ?>
                </select>

            </div>

            <div class="form-group">
                <select class="input-text" name="payment">
                    <option value="0">Select Payment</option>
                    <?php
                    $dg = $d->view("payment", array("name", "asc"));
                    while ($value = $dg->fetch_object()) {
                        echo "<option value='{$value->id}'>{$value->name}</option>";
                    }
                    ?>
                </select>

            </div>
            <div class="form-group">
                <button type="submit" name="save" class="button-md button-theme ">Save</button>                 <a href="index.php?e=roomBooking-view" class="button-md button-theme ">View</a>
            </div>
        </form>
    </div>
</div>




