<br /><br /><br /><br /><br /><br /><br /><br />

<?php
$d = new Database();

if (isset($_POST['sub'])) {
    $data = array(
        "usersid" => $d->VD($_POST['usersid']),
        "roombookingid" => $d->VD($_POST['roombookingid']),
        "amount" => $d->VD($_POST['amount']),
        "date" => $d->VD($_POST['date']),
        "paymentid" => $d->VD($_POST['paymentid'])
    );
    if ($d->insert("roominstallment", $data)) {
        echo "<p style='color : green;'>Insert Succesfully</p>";
        Redirect("index.php?e=roominstallment_view");
    } else {
        echo $d->Error;
    }
}
?>

<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1><span>Room Installment</span></h1>
            <a href="index.php?e=roominstallment_view" class="btn btn-info">View</a>
        </div>
        <form action="" method="post" enctype="multipart/form-data">


            <div class="form-group">
                <label for="users">Users</label>
                <select name="usersid" class="form-group input-text">
                    <option value="0">Choose An User</option>
                    <?php
                    $allusers = $d->view("users", array("name", "asc"));

                    while ($users = $allusers->fetch_object()) {
                        if (isset($_POST['usersid']) && $_POST['usersid'] == $users->id) {
                            echo"<option selected value='$users->id'>$users->name</option>";
                        } else {
                            echo "<option value='$users->id'>$users->name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="roombooking">Room Booking</label>
                <select name="roombookingid" class="form-group input-text">
                    <option value="0">Choose Roombooking</option>
                    <?php
                    $allroombooking = $d->view("roombooking", array("price", "asc"));

                    while ($roombooking = $allroombooking->fetch_object()) {
                        if (isset($_POST['roombookingid']) && $_POST['roombookingid'] == $roombooking->id) {
                            echo"<option selected value='$roombooking->id'>$roombooking->price</option>";
                        } else {
                            echo "<option value='$roombooking->id'>$roombooking->price</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="amount" class="input-text" placeholder="Amount">
            </div>
            <div class="form-group">
                <input type="date" name="date" class="input-text" placeholder="Date">
            </div>
            <div class="form-group">
                <label for="payment">Payment Method</label>
                <select name="paymentid" class="form-group input-text">
                    <option value="0">Choose Payment Method</option>
                    <?php
                    $allpayment = $d->view("payment", array("name", "asc"));

                    while ($payment = $allpayment->fetch_object()) {
                        if (isset($_POST['paymentid']) && $_POST['paymentid'] == $payment->id) {
                            echo"<option selected value='$payment->id'>$payment->name</option>";
                        } else {
                            echo "<option value='$payment->id'>$payment->name</option>";
                        }
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <button type="submit" class="button-md button-theme btn-block " name="sub">Save</button>
            </div>
        </form>
    </div>
</div>




