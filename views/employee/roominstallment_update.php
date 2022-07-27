<br /><br /><br /><br /><br /><br /><br /><br />

<?php
$d = new Database();
if (isset($_GET['id'])) {
    $data = $d->view("roominstallment", "", array("id" => $_GET['id']));
    $value = $data->fetch_object();
}

if (isset($_POST['sub'])) {
    $ddd = $_POST['date'];
    $date = date("Y:m:d", strtotime($ddd));
    $data = array(
        "amount" => $d->VD($_POST['amount']),
        "date" => $d->VD($_POST['date']),
        "usersid" => $d->VD($_POST['usersid']),
        "paymentid" => $d->VD($_POST['paymentid']),
        "roombookingid" => $d->VD($_POST['roombookingid'])
    );
    $d->update("roominstallment", $data, array("id" => $_GET['id']));
    echo "<p style='color : green;'>Update Succesfully</p>";
    Redirect("index.php?e=roominstallment_view");
}
?>

<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1><span>Room Installment</span></h1>
            <a href="index.php?e=roominstallment" class="btn btn-info">New</a>
            <a href="index.php?e=roominstallment_view" class="btn btn-info">View</a>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="amount" class="input-text" value="<?php if (isset($_GET['id'])) echo $value->amount ?>">
            </div>

            <div class="form-group">
                <label for="users">Users</label>
                <select name="usersid" class="form-group input-text">
                    <option value="0">Choose An User</option>
                    <?php
                    $allusers = $d->view("users", array("name", "asc"));

                    while ($users = $allusers->fetch_object()) {
                        if ($allusers->id = $_GET['id']) {
                            echo"<option selected value='$users->id'>$users->name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="payment">Payment Method</label>
                <select name="paymentid" class="form-group input-text">
                    <option value="0">Choose Payment Method</option>
                    <?php
                    $allpayment = $d->view("payment", array("name", "asc"));

                    while ($payment = $allpayment->fetch_object()) {
                        if ($allpayment->id = $_GET['id']) {
                            echo"<option selected value='$payment->id'>$payment->name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="date" name="date" class="input-text" placeholder="Date" value="<?php if (isset($_GET['id'])) echo $value->date; ?>">
            </div>
            <div class="form-group">
                <label for="roombooking">Room Booking</label>
                <select name="roombookingid" class="form-group input-text">
                    <option value="0">Choose Roombooking</option>
                    <?php
                    $allroombooking = $d->view("roombooking", array("price", "asc"));

                    while ($roombooking = $allroombooking->fetch_object()) {
                        if ($allroombooking->id = $_GET['id']) {
                            echo"<option selected value='$roombooking->id'>$roombooking->price</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="button-md button-theme btn-block " name="sub">Update</button>
            </div>
        </form>
    </div>
</div>




