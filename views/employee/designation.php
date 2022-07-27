

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
                            <h1>Add <span> Designation</span></h1>
                        </div>
                        <?php
                        $d = new Database();
                        if (isset($_POST['save'])) {
                            if ($_POST['desig'] !== "") {
                                $data = array(
                                    "name" => $d->VD($_POST['desig']),
                                );
                                if ($d->insert("designation", $data)) {

                                    echo "<p style='color : blue;'>";
                                    echo $_POST['desig'];
                                    echo " is save succesfully</p>";
                                } else {
                                    echo "<p style='color : red;'>"; echo $_POST['desig']; echo " is already exist !</p>";
                                }
                            } else {
                                echo "<p style='color : red;'>Insert Valid Name</p>";
                            }
                        }
                        ?>

                        <div class="form-content-box">
                            <!-- details -->
                            <div class="details">
                                <!-- Main title -->

                                <!-- Form start -->

                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" name="desig" class="input-text" placeholder="Designation">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" name="save" class="button-md button-theme ">Save</button>                                <a href="index.php?e=designation-views" class="button-md button-theme ">View</a>  

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

    </div>
</div>