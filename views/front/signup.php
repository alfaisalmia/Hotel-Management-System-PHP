<?php
$d = new Database();
$allCnt = $d->view("country", array("name", "asc"));
$allCt = $d->view("city", array("name", "asc"));
?>

<!-- Content area start -->
<?php
if(isset($_SESSION['id'])){
        //require "views/front/home.php";
        Redirect("index.php?f=home");
}else{
?>
<br/><br/><br/>
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
                            <h1><span>Signup</span></h1>
                        </div>

                        <?php
                        //Sign Up Form Validation with PHP start from here
                        if (isset($_POST['submit'])) {

                            $ext = extension($_FILES['pic']['name']);

                            $data = array(
                            "name" => $d->VD($_POST['fullname']),
                            "email" => $d->VD($_POST['email']),
                            "password" => $_POST['password'],
                            "address" => $d->VD($_POST['addr']),
                            "gender" => $d->VD($_POST['gender']),
                            "contact" => $d->VD($_POST['cont']),
                            "dateofbirth" => $d->VD($_POST['dob']),
                            "cityid" => $d->VD($_POST['cityid']),
                            "passport" => $d->VD($_POST['passport']),
                            "nid" => $d->VD($_POST['nid']),
                            "picture" => $ext,
                            "type" => 1,
                            "status" => RandStr(20)
                            );
                            if ($d->insert("users", $data)) {
                                if ($ext) {
                                    move_uploaded_file($_FILES['pic']['tmp_name'], "images/users/picture/" . md5("ab-" . $d->Id . "-idb-bisew") . ".$ext");
                                }
                                $headers = "From: sales@rupantarbd.com\r\n";
                                $headers .= "Reply-To: sales@rupantarbd.com\r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                                $message = "<html><body>For activate your account, <a href='http://localhost/hotel-alpha/index.php?f=verify&code={$data['status']}'>Click Here</a></body></html>";
                          echo $message;
                                mail($data['email'], "Account Verification", $message, $headers);
                                //Redirect("index.php?f=cong");
                                echo "<p style='color : green;'>Save Succesfully and check your email please verify your account </p>";
                            } else {
                                echo "$d->ERROR";
                            }
                        }
                        ?>




                        <!-- Form start-->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="fullname" id="form_fname" class="input-text" placeholder="Full Names"><span style="color:red" class="error_fname" id="fname_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="form_email" class="input-text" placeholder="Email Address"><span style="color:red" class="error_email" id="email_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="form_password" class="input-text" placeholder="Password"><span style="color:red" class="error_password" id="password_error_message"></span>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar" role="progressbar"  style="width: 0%;"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="password" id="form_retype_password" name="confirm_Password" class="input-text" placeholder="Confirm Password"><span style="color:red" class="error_repassword" id="retype_password_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" id="form_address" name="addr" class="input-text" placeholder="Address"><span style="color:red" class="error_address" id="address_error_message"></span>
                            </div>
                            <div class="form-group input-text" id="form_gender">Gender:
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="inlineRadio1 form_gender" value="1">Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="inlineRadio2" value="2">Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="inlineRadio3" value="3">Other
                                </label>
                            </div><span style="color:red" class="error_gender" id="gender_error_message"></span>
                            <div class="form-group">
                                <input type="text" name="cont" id="form_contact" class="input-text" placeholder="Contact No:"><span style="color:red" class="error_contact" id="contact_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="dob" id="form_dob"class="input-text datepicker" placeholder="Date of Birth"><span style="color:red" class="error_dob" id="dob_error_message"></span>
                            </div>

                            <div class="form-group">
                                <select class="input-text" name="cntid">
                                    <option value="0">Chosse Your Country</option>
                                    <?php
                                    while ($cnt = $allCnt->fetch_object()) {
                                        echo " <option value='{$cnt->id}'>{$cnt->name}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="input-text" name="cityid">
                                    <option value="0">Choose Country First</option>
                                    <?php
                                    if (isset($_POST['cityid']) && $_POST['cntid'] > 0) {
                                        $allCt = $d->view("city", array("name", "asc"), array("countryid" => $_POST['cntid']));
                                        while ($ct = $allCt->fetch_object()) {
                                            if ($ct->id == $_POST['cityid']) {
                                                echo "<option selected value='$ct->id'>$ct->name</option>";
                                            } else {
                                                echo "<option value='$ct->id'>$ct->name</option>";
                                            }
                                        }
                                    } else {
                                        echo '<option value="0">Choose Country First</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="passport" id="form_passport" class="input-text" placeholder="Passport No"><span style="color:red" class="error_passport" id="passport_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nid" id="form_nid" class="input-text" placeholder="NID Card No"><span style="color:red" class="error_nid" id="nid_error_message"></span>
                            </div>
                            <div class="form-group input-text">Picture:
                                <label class="radio-inline">
                                    <input type="file" name="pic" id="inlineRadio1">
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="button-md button-theme btn-block">Signup</button>
                            </div>
                        </form>
                        <!-- Form end-->
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

<?php
}
?>
<!-- Content area end -->

<?php
$allCnt = $d->view("country", array("name", "asc"));
?>
<script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="assets/js/formvalid.js"></script>
<script>
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email.toLowerCase());
    }

    $(document).ready(function () {
        $("#form_password").focus(function () {
            $(".progress").show();
        });
        $("#form_password").blur(function () {
            $(".progress").hide();
        });
        $("#form_password").keyup(function () {
            var score = 0;
            var p = $(this).val();
            if (p.length > 8) {
                score++;
            }
            if (p.match(/[a-z]/) && p.match(/[A-Z]/)) {
                score++;
            }
            if (p.match(/[0-9]/)) {
                score++;
            }
            if (p.match(/[!,@,#,$,%,^]/)) {
                score++;
            }

            $(".progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-info progress-bar-success");
            $(".progress-bar").css({"width": "0%"});
            $(".progress-bar").text("");

            if (score == 1) {
                $(".progress-bar").addClass("progress-bar-danger");
                $(".progress-bar").css({"width": "25%"});
                $(".progress-bar").text("Very Weak");
            } else if (score == 2) {
                $(".progress-bar").addClass("progress-bar-warning");
                $(".progress-bar").css({"width": "50%"});
                $(".progress-bar").text("Weak");
            } else if (score == 3) {
                $(".progress-bar").addClass("progress-bar-info");
                $(".progress-bar").css({"width": "75%"});
                $(".progress-bar").text("Average");
            } else if (score == 4) {
                $(".progress-bar").addClass("progress-bar-success");
                $(".progress-bar").css({"width": "100%"});
                $(".progress-bar").text("Strong");
            }
        });
    });
    $(document).ready(function (e) {
        $("input[name='fullname', name='email']").focus(function (e) {
            $("input[name='fullname']").css("border", "1px solid green");
        });
        $("input[name='fullname']").keydown(function (e) {
            if ($("input[name='fullname']").val().length > 0) {
                $("input[name='fullname']").css("border", "1px solid green");
            }
        });
        $("input[name='fullname']").blur(function (e) {

            if ($("input[name='fullname']").val().length >= 1) {

                $("input[name='fullname']").css("border", "1px solid green");
            } else {
                $("input[name='fullname']").css("border", "1px solid red");
            }
        });
    });

    $("select[name='cntid']").change(function () {
        $("select[name='cityid']").html("");
        var cnt = $(this).val();
        if (cnt == 0) {
            $("select[name='cityid']").append("<option value='0'>Choose Country\n\
First</option>");
        }
<?php
while ($cnt = $allCnt->fetch_object()) {
    echo "else if (cnt == $cnt->id) {";
    $allCt = $d->view("city", array("name", "asc"), array("countryid" => $cnt->id));
    while ($ct = $allCt->fetch_object()) {
        echo "$(\"select[name=cityid]\").append(\"<option value='$ct->id'>{$ct->name}</option>\");";
    }
    echo "}";
}
?>
    });


</script>