<br><br><br><br><br><br>
<?php


if (isset($_POST['save'])) {
$d = new Database();
    $data = array(
        "name" => $d->VD($_POST['name']),
        "price" => $d->VD($_POST['price']),
        "discount" => $d->VD($_POST['discount']),
        "vat" => $d->VD($_POST['vat']),
        "starttime" => $d->VD($_POST['startdate']),
        "endtime" => $d->VD($_POST['enddate']),
    );

    if ($d->insert("roompackage", $data)) {
        $id = $d->Id;
        new_file("description/roompackage/{$id}.txt", $_POST['description']); //description save code as a text file
        echo "Successfully Inserted";
    } else {
        echo "Room Package Already Exist";
    }
}
?>
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Add Room Package</span></h1>
                        </div>
                        <!-- Form start-->
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="input-text" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <textarea name="description" class="input-text rdescription" placeholder="Room Package Description"></textarea>
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

                            <div class="form-group col-lg-6">
                                <input type="datepicker" name="startdate" id="form_dob"class="input-text datepicker" placeholder="Start Date"><span style="color:red" class="error_dob" id="date_error_message"></span>
                            </div>

                            <div class="form-group col-lg-6">
                                <input type="datepicker" name="enddate" id="form_dob"class="input-text datepicker" placeholder="End Date"><span style="color:red" class="error_dob" id="date_error_message"></span>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="save" class="button-md button-theme">Save</button>
                                <a href="index.php?e=roompackage-view" class="button-md button-theme">View</a>
                            </div>
                        </form>
                        <!-- Form end-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->