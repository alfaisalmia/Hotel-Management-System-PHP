<br><br><br><br><br><br>
<link href="assets/css/fSelect.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="assets/js/fSelect.js"></script>

<?php
$d = new Database();

if (isset($_POST['save'])) {
    /* ---picture---start-- */
    $ext1 = extension($_FILES['pic1']['name']);
    $ext2 = extension($_FILES['pic2']['name']);
    $ext3 = extension($_FILES['pic3']['name']);
    /* ---picture---end-- */

    $data = array(
        "code" => $d->VD($_POST['code']),
        "adult" => $d->VD($_POST['adult']),
        "price" => $d->VD($_POST['price']),
        "discount" => $d->VD($_POST['discount']),
        "vat" => $d->VD($_POST['vat']),
        "roomtypeid" => $d->VD($_POST['cntid']),
        "child" => $d->VD($_POST['child']),
        "size" => $d->VD($_POST['size']),
        "picture1" => $ext1,
        "picture2" => $ext2,
        "picture3" => $ext3
    );

    if ($d->insert("room", $data)) {
        move_uploaded_file($_FILES['pic1']['tmp_name'], "images/room/upload/pic1/" . $d->Id . ".$ext1");
        move_uploaded_file($_FILES['pic2']['tmp_name'], "images/room/upload/pic2/" . $d->Id . ".$ext2");
        move_uploaded_file($_FILES['pic3']['tmp_name'], "images/room/upload/pic3/" . $d->Id . ".$ext3");


        $id = $d->Id;
        new_file("description/room/{$id}.txt", $_POST['description']); //description save code as a text file

        /* ---Room--Service--Insert--Code-- */
        if ($_POST['serviceid']) {
            foreach ($_POST['serviceid'] as $serviceid) {
                $arr = array(
                    "roomid" => $id,
                    "serviceid" => $serviceid,
                );
                $d->insert("roomservice", $arr);
            }
        }
        echo "Room Insert Succesfull";
    } else {
        echo "Room Number Already Exist";
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
                            <h1><span>Add Room</span></h1>
                        </div>
                        <!-- Form start-->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="code" class="input-text" placeholder="Enter Room Number">
                            </div>

                            <div class="form-group">
                                <textarea name="description" class="input-text rdescription" placeholder="Room Description"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" name="adult" class="input-text" placeholder=" Adult">
                            </div>

                            <div class="form-group">
                                <input type="text" name="child" class="input-text" placeholder="Child">
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
                                <select name="cntid" class="input-text">
                                    <option value="0">Choose Room Type</option>
                                    <?php
                                    $allCnt = $d->view("roomtype", array("name", "asc"));
                                    while ($cnt = $allCnt->fetch_object()) {
                                        echo "<option value='$cnt->id'>$cnt->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="selectpicker" multiple="multiple"  name="serviceid[]">
                                    <?php
                                    $roomservices = $d->view("service", array("name", "asc"));
                                    while ($roomservice = $roomservices->fetch_object()) {
                                        echo "<option value='$roomservice->id'>$roomservice->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="size" class="input-text" placeholder="Size">
                            </div>

                            <div class="form-group input-text">Picture 1:
                                <label class="radio-inline">
                                    <input type="file" name="pic1" id="inlineRadio1">
                                </label>
                            </div>

                            <div class="form-group input-text">Picture 2:
                                <label class="radio-inline">
                                    <input type="file" name="pic2" id="inlineRadio1">
                                </label>
                            </div>

                            <div class="form-group input-text">Picture 3:
                                <label class="radio-inline">
                                    <input type="file" name="pic3" id="inlineRadio1">
                                </label>
                            </div>

                            <div class="form-group ">
                                <button type="submit" name="save" class="button-md button-theme">Save</button>
                                <a href="index.php?e=room-view" class="button-md button-theme">View</a>
                            </div>
                        </form>
                        <!-- Form end-->
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->