
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start --><br/><br/>
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Forgot</span> Password</h1>
                        </div>
                        <!-- Form start -->
                        <?php
                        $d = new Database();

                        if (isset($_POST['sub'])) {
                            $where = array(
                                "email" => $d->VD($_POST['email'])
                            );
                            $result = $d->view("users", "", $where);
                            if ($result->num_rows > 0) {

                                $temp = array(
                                    "code" => rand(10000, 99999),
                                    "time" => time()
                                );
                                $d->update("users", $temp, array("email" => $d->VD($_POST['email'])));
                                $headers = "From: sales@rupantarbd.com\r\n";
                                $headers .= "Reply-To: sales@rupantarbd.com\r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                                $message = "<html><body> Recovery Password code is : {$temp['code']}. Copy and Paste the code within ten minutes.</body></html>";
                                echo $message;
                                mail($data['email'], "Recovery Password", $message, $headers);
                                Redirect("index.php?f=password-recovery");
                            }
                            else{
                                 echo "<span style = 'color:red;'>Invalid Email</span>";
                            }
                        }
                        ?>





                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="email" class="input-text" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="sub" class="button-md button-theme btn-block">Send Me Email</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            I want to <a href="index.php?f=login">return to login</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->