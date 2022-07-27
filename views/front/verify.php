
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
                            <h1><span>Account Verification Status </span>
                                <?php
                                $d = new Database();
                                if (isset($_GET['code']) && strlen($_GET['code']) == 20) {
                                    $data = $d->view("users", "", array("status" => $d->VD($_GET['code'])));
                                    if ($data->num_rows > 0) {
                                        while ($value = $data->fetch_object()) {
                                            $d->update("users", array("status" => ""), array("id" => $value->id));
                                            $_SESSION['id'] = $value->id;
                                            $_SESSION['type'] = $value->type;
                                            Redirect("index.php?u=profile");
                                        }
                                    } else {
                                        echo "Invalid Code";
                                    }
                                } else {
                                    Redirect("index.php");
                                }
                                ?>
                        </div>

                        <div class="footer">
                            <span>
                                I want to <a href="index.php?f=login">return to login</a>
                            </span>
                        </div>
                    </div>

                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->
