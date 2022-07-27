

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
                            <h1>Update Your<span> Designation</span></h1>
                        </div>
                        <?php
                        $d = new Database();
                        if (isset($_POST['save'])) {
                            if ($_POST['design'] !== "") {
                                $data = array(
                                    "name" => $d->VD($_POST['design']),
                                );
                                if ($d->update("designation", $data, array("id" => $_GET['id']))) {
                                     echo "<p style='color : blue;'>"; echo $_POST['design']; echo " is update succesfully</p>";
                                }
                            } else {
                                echo "<p style='color : red;'>Invalid Name</p>";
                            }
                        }
                        ?>
                        <!-- Form start -->

                        <?php
                        $where = array("id" => $_GET['id']);
                        $data = $d->view("designation", array("id", "desc"), $where, "", "");
                        while ($value = $data->fetch_object()) {
                            ?>
                            <form action="" method="post">
                                <div class="form-group"><br/>
                                    <input type="text" name="design" class="input-text" value="<?php echo $value->name ?>" placeholder="Update Designation">
                                </div>


                                <div class="form-group">
                                    <button type="submit" name="save" class="button-md button-theme ">Update</button>                                <a href="index.php?e=designation-views" class="button-md button-theme ">View</a>  

                                </div>
                            </form>
                            <?php
                        }
                        ?>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->

                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>