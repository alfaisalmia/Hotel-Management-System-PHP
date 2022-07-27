
<br><br><br><br>
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
                            <h1><span>Payment</span> Gateway</h1><br/>

                            <a href="index.php?e=payment-view" class="button-md button-theme btn-block">View</a> <br/>
                        </div>


                        <?php
                        $d = new Database();
                        if (isset($_POST['payment'])) {
                            $ext = extension($_FILES['pic']['name']);
                            $data = array(
                                "name" => $d->VD($_POST['name']),
                                "picture" => $ext
                            );

                            if ($d->insert("payment", $data)) {
                                move_uploaded_file($_FILES['pic']['tmp_name'], "images/payment/" . $d->Id . ".$ext");
                                echo "<p style='color : blue;'>Save Succesfully</p>";
                            } else {
                                echo $d->Error;
                            }
                        }
                        ?>
                        <!-- Form start -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="name" class="input-text" placeholder="Enter Method Name">
                            </div>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="file" name="pic" id="inlineRadio1">
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="save" name="payment" class="button-md button-theme btn-block">


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
