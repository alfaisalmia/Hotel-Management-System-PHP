

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
                            <h1><span> Enter Security Code</span></h1>
                            <p>Please check your email for a message with your code. Your code is 5 digits long. Enter your code here within 10 minutes.</p>
                        </div>
                        <?php
                        $d = new Database();
                        if (isset($_POST['reg']) && strlen($_POST['code']) == 5) {
                            $where = array(
                                "code" => $d->VD($_POST['code'])
                            );

                            $result = $d->view("users", "", $where);
                            if ($result->num_rows > 0) {
                                while ($value = $result->fetch_object()) {
                                    if ((time() - $value->time) <= 2) {
                                        $temp = array(
                                            "code" => "",
                                            "time" => ""
                                        );
                                        $d->update("users", $temp, array("id" => $value->id));
                                        $_SESSION['id'] = $value->id;
                                        $_SESSION['type'] = $value->type;
                                        $_SESSION['session_code'] = 420;

                                        // Redirect("index.php?f=new-password");
                                    } else {
                                        echo "<span style='color:red;'> Time Out!</span>";
                                    }
                                }
                            } else {
                                echo "<span style='color:red;'>Invalid Code</span>";
                            }
                        }
                        ?>

                        <!-- Form start -->
                        <form action="" method="post">
                            <div class="form-group"><br/>
                                <input type="text" name="code" class="input-text" placeholder="Enter Code">
                            </div>


                            <div class="form-group">
                                <button type="submit" name="reg" class="button-md button-theme btn-block">Submit</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            New to Tempo? <a href="index.php?f=signup">Sign up now</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
