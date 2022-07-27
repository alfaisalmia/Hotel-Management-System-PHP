<link href="assets/css/fSelect.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="assets/js/fSelect.js"></script>

<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box"><br/><br/>
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Update Room</span></h1>
                        </div>
                        <?php
                        $d = new Database();
                        $ids = $_GET['id'];

                        /* --For-Receiving--Value--In--Input--Field-- */
                        if (isset($_GET['id'])) {

                            $table = "room";
                            $where = array(
                                "id" => $_GET['id']
                            );
                            $data = $d->view($table, "", $where);
                            $value = $data->fetch_object();
                            $roomtypeid = $value->roomtypeid;
                            $old_ext1 = $value->picture1;
                            $old_ext2 = $value->picture2;
                            $old_ext3 = $value->picture3;
                        }
                        /* --For-Receiving--Value--In--Input--Field--End-- */

                        if (isset($_POST['save'])) {

                            unlink("description/room/$ids.txt");

                            /* ---picture---start-- */

                            /* ---picture---end-- */
                            /* --if---picture--selected-- */
                            if ($_FILES['pic1']['name'] && $_FILES['pic2']['name'] && $_FILES['pic3']['name']) {
                                $ext1 = extension($_FILES['pic1']['name']);
                                $ext2 = extension($_FILES['pic2']['name']);
                                $ext3 = extension($_FILES['pic3']['name']);

                                unlink("images/room/upload/pic1/$ids.$old_ext1");
                                unlink("images/room/upload/pic2/$ids.$old_ext2");
                                unlink("images/room/upload/pic3/$ids.$old_ext3");
                            } else {
                                $ext1 = $old_ext1;
                                $ext2 = $old_ext2;
                                $ext3 = $old_ext3;
                            }
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

                            if ($d->update("room", $data, array("id" => $_GET['id']))) {
                                new_file("description/room/{$ids}.txt", $_POST['description']);
                                
                                if ($_FILES['pic1']['name'] && $_FILES['pic2']['name'] && $_FILES['pic3']['name']) {
                                    move_uploaded_file($_FILES['pic1']['tmp_name'], "images/room/upload/pic1/" . $ids . ".$ext1");
                                    move_uploaded_file($_FILES['pic2']['tmp_name'], "images/room/upload/pic2/" . $ids . ".$ext2");
                                    move_uploaded_file($_FILES['pic3']['tmp_name'], "images/room/upload/pic3/" . $ids . ".$ext3");
                                    
                                }
                                /* For--Remove--roomservice */
                                $table = "roomservice";
                                $fid = "roomid";
                                $id = $_GET['id'];

                                $remove_roomservice = $d->delete($table, $fid, $id);

                                /* For--insert--roomservice */
                                if ($_POST['serviceid']) {
                                    foreach ($_POST['serviceid'] as $serviceid) {
                                        $arr = array(
                                            "roomid" => $id,
                                            "serviceid" => $serviceid,
                                        );
                                        $d->insert("roomservice", $arr);
                                    }
                                }
                                Redirect('index.php?e=room-view');
                            }
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="code" class="input-text"  value="<?php echo $value->code ?>">
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="input-text rdescription"><?php echo file_get_contents("description/room/$ids.txt"); ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="adult" class="input-text" value="<?php echo $value->adult ?>">

                            </div>
                            <div class="form-group">
                                <input type="text" name="child" class="input-text" placeholder="Child" value="<?php echo $value->child ?>">

                            </div>
                            <div class="form-group">
                                <input type="text" name="price" class="input-text" placeholder="Price" value="<?php echo $value->price ?>">

                            </div>
                            <div class="form-group">
                                <input type="text" name="discount" class="input-text" placeholder="Discount" value="<?php echo $value->discount ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="vat" class="input-text"  placeholder="Vat" value="<?php echo $value->vat ?>">

                            </div>
                            <div class="form-group">

                                <select name="cntid" class="input-text">
                                    <option value="0">Choose Room Type</option>
                                    <?php
                                    $allCnt = $d->view("roomtype", array("name", "asc"));
                                    while ($cnt = $allCnt->fetch_object()) {
                                        if (isset($roomtypeid) && $roomtypeid == $cnt->id) {
                                            echo "<option selected value='$cnt->id'>$cnt->name</option>";
                                        } else {
                                            echo "<option value='$cnt->id'>$cnt->name</option>";
                                        }
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
                                <input type="text" name="size" class="input-text"  placeholder="Size" value="<?php echo $value->size ?>">

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

                            <div class="form-group">
                                <button type="submit" name="save" class="button-md button-theme">Click To Update</button>


                            </div>


                        </form>
                        <!-- Form end-->
                    </div>
                    <!-- Footer -->

                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>


