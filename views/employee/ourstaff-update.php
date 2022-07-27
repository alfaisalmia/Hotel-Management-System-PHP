<?php
$d = new Database();
if (isset($_GET['id'])) {
    $dg = $d->view("employee", array("name", "asc"), ["id" => $_GET['id']]);
    $value = $dg->fetch_object();
}
?>

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
                            <h1><span>Update Staff </span>Type</h1>
                            <a href="index.php?e=ourstaff-view" class="button-md button-theme ">View</a>
                        </div>
                        <?php
                        $d = new Database();
                        if (isset($_POST['save'])) {
                            $data = array(
                                "name" => $d->VD($_POST['name']),
                                "email" => $d->VD($_POST['email']),
                                "designationid" => $d->VD($_POST['design']),
                                "salary" => $d->VD($_POST['salary']),
                                "bankaccount" => $d->VD($_POST['bankaccount']),
                                "date" => $d->VD($_POST['date']),
                                "dateofbirth" => $d->VD($_POST['dob']),
                                "gender" => $d->VD($_POST['gender']),
                                "contact" => $d->VD($_POST['cont']),
                                "cityid" => $d->VD($_POST['cityid']),
                                "nid" => $d->VD($_POST['nid']),
                                "picture" => $ext
                            );
                            if ($d->update("employee", $data, array("id" => $_GET['id']))) {
                                 if ($ext) {
                                    move_uploaded_file($_FILES['pic']['tmp_name'], "images/staff/" . md5("ab-" . $d->Id . "-idb-bisew") . ".$ext");
                                }
                                echo "<p style='color : blue;'>Update Succesfully</p>";
                            }
                        }
                        ?>
                        <!-- Form start -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="name" id="form_fname" class="input-text" value="<?php if (isset($_GET['id'])) echo "$value->name"; ?>" placeholder="Full Names"><span style="color:red" class="error_fname" id="fname_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="form_email" class="input-text" placeholder="Email Address"><span style="color:red" class="error_email" id="email_error_message"></span>
                            </div>
                            <div class="form-group">
                                <select class="input-text" name="design">
                                    <option value="0">Select Designation</option>
                                    <?php
                                    $dg = $d->view("designation", array("name", "asc"));
                                    while ($value = $dg->fetch_object()) {
                                        echo "<option value='{$value->id}'>{$value->name}</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <input type="text" id="form_address" name="salary" class="input-text" placeholder="Salary"><span style="color:red" class="error_address" id="salary_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" id="form_address" name="bankaccount" class="input-text" placeholder="Bankaccount"><span style="color:red" class="error_address" id="bankaccount_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="date" id="form_dob"class="input-text datepicker" placeholder="Date"><span style="color:red" class="error_dob" id="date_error_message"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="dob" id="form_dob"class="input-text datepicker" placeholder="Date of Birth"><span style="color:red" class="error_dob" id="dob_error_message"></span>
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
                                <select class="input-text" name="cityid">
                                    <option value="0">Choose City</option>
                                    <?php
                                    $ct = $d->view(city);
                                    while ($cit = $ct->fetch_object()) {
                                        echo "<option value='{$cit->id}'>{$cit->name}</option>";
                                    }
                                    ?>

                                </select>
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
                                <button type="submit" name="submit" class="button-md button-theme btn-block">Save</button>  

                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->

                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>



