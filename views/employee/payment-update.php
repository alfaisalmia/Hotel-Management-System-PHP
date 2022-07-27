
<br><br><br><br><br><br>
<!-- Content area start -->

<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Main title -->
                <div class="main-title">
                    <h1><span>Payment</span> Update</h1>

                    <!-- Form content box start -->
                    <div class="form-content-box">
                        <!-- details -->
                        <div class="details">
                            <!-- Main title -->
                            <?php
                            $d = new Database();
                            $ids = $_GET['i'];

                            /* --For-Receiving--Value--In--Input--Field-- */
                            if (isset($_GET['i'])) {

                                $table = "payment";
                                $where = array(
                                    "id" => $_GET['i']
                                );
                                $data = $d->view($table, "", $where);
                                $value = $data->fetch_object();
                                $old_ext = $value->picture;
                            }
                            /* --For-Receiving--Value--In--Input--Field--End-- */

                            if (isset($_POST['payment'])) {
                                
                                if($_FILES['pic']['name']){
                                    $ext = extension($_FILES['pic']['name']);
                                    unlink("images/payment/$ids.$old_ext");
                                }
                                else{
                                    $ext = $old_ext;
                                }
                                
                                
                                $data = array(
                                    "name" => $d->VD($_POST['name']),
                                    "picture" => $ext
                                );
                                if ($d->update("payment", $data, array("id" => $_GET['i']))) {
                                    if($_FILES['pic']['name']){
                                        move_uploaded_file($_FILES['pic']['tmp_name'], "images/payment/" . $ids . ".$ext");
                                    }
                                    Redirect('index.php?e=payment-view');
                                }
                            }
                            ?>


                            <!-- Form start -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="name" class="input-text" placeholder="New Name" value="<?php echo $value->name; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="file" name="pic" id="inlineRadio1">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" name="payment" class="button-md button-theme">
                                    <a href="index.php?e=payment-view" class="button-md button-theme">View</a>

                                </div>

                            </form>

                            <!-- Form end -->
                        </div>

                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content area end -->
