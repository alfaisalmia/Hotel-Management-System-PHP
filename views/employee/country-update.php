<?php
if (!isset($title)) {
    header("Location: index.html");
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
                            <h1>Update<span> Your Country</span></h1>
                        </div>
                        <?php
                        $d = new Database();
                        if (isset($_POST['save'])) {
                            $data = array(
                                "name" => $d->VD($_POST['country']),
                            );

                            if ($d->update("country", $data, array("id" => $_GET['id']))) {
                                $_POST['country'] = "";

                                echo "<p style='color : blue;'>Update Succesfully</p>";
                                //Redirect("index.php?e=country-views");
                            }
                        }
                        ?>

                        <!-- ##################     To catch the value  ##################-->
                        <?php
                        $where = array("id" => $_GET['id']);
                        $data = $d->view("country", array("id", "desc"), $where, "", "");
                        while ($value = $data->fetch_object()) {
                            ?>
                            <form action="" method="post">
                                <div class="form-group"><br/>
                                    <input type="text" name="country" class="input-text" value="<?php echo $value->name ?>" placeholder="Update Country Name">
                                </div>


                                <div class="form-group">
                                    <button type="submit" name="save" class="button-md button-theme ">Update</button>                                <a href="index.php?e=country-views" class="button-md button-theme ">View</a>  

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