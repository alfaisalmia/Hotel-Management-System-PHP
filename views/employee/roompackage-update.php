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
                            <h1><span>Update Room Package</span></h1>
                        </div>
                        <?php
                       $d = new Database();
                        $ids = $_GET['id'];
                        /* --For-Receiving--Value--In--Input--Field-- */
                        if (isset($_GET['id'])) {
                            $table = "roompackage";
                            $where = array(
                                "id" => $_GET['id']
                            );
                            $data = $d->view($table, "", $where);
                            $value = $data->fetch_object();
                        }
                        /* --For-Receiving--Value--In--Input--Field--End-- */

                        if (isset($_POST['save'])) {
                            unlink("description/roompackage/$ids.txt");

                            $data = array(
                                "name" => $d->VD($_POST['name']),
                                "price" => $d->VD($_POST['price']),
                                "discount" => $d->VD($_POST['discount']),
                                "vat" => $d->VD($_POST['vat']),
                                "starttime" => $d->VD($_POST['startdate']),
                                "endtime" => $d->VD($_POST['enddate']),
                            );

                            if ($d->update("roompackage", $data, array("id" => $_GET['id']))) {
                                new_file("description/roompackage/{$ids}.txt", $_POST['description']);
                                Redirect('index.php?e=roompackage-view');
                            }
                        }
                        ?>
                        <!-- Form start-->
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="input-text"  value="<?php echo $value->name; ?>" placeholder="Name">
                            </div>
                            
                            <div class="form-group">
                                <textarea name="description" class="input-text rdescription"><?php echo file_get_contents("description/roompackage/$ids.txt"); ?></textarea>
                            </div>
                            
                           <div class="form-group">
                                <input type="text" name="price" class="input-text"  value="<?php echo $value->price; ?>" placeholder="Price">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="discount" class="input-text"  value="<?php echo $value->discount; ?>" placeholder="Discount">
                            </div>

                            <div class="form-group">
                                <input type="text" name="vat" class="input-text"  value="<?php echo $value->vat; ?>" placeholder="Vat">
                            </div>

                            <div class="form-group col-lg-6">
                                <input type="datepicker" name="startdate" id="form_dob"class="input-text datepicker"   placeholder="Start Date" value="<?php echo $value->starttime; ?>"><span style="color:red" class="error_dob" id="date_error_message"></span>
                            </div>

                            <div class="form-group col-lg-6">
                                <input type="datepicker" name="enddate" id="form_dob"class="input-text datepicker"  placeholder="End Date" value="<?php echo $value->endtime; ?>"><span style="color:red" class="error_dob" id="date_error_message"></span>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="save" class="button-md button-theme">Save</button>
                                <a href="index.php?e=roompackage-view" class="button-md button-theme">View</a>
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

