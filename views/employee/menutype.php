

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
                            <h1>Add Your<span> Menutype</span></h1>
                        </div>
                        <?php
                        $d = new Database();
                        if (isset($_POST['save'])) {
                            if ($_POST['mtypenm'] !== "") {
                                $data = array(
                                    "name" => $d->VD($_POST['mtypenm']),
                                );
                                if ($value = $d->insert("menutype", $data)) {
                      
                                    echo "<h5 style='color : blue;'>"; echo  $_POST['mtypenm']; echo " is saved Succesfully</h5>";
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
                                        <input type="text" name="mtypenm" class="input-text" placeholder="Menutype">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" name="save" class="button-md button-theme ">Save</button>                                <a href="index.php?e=menutype-views" class="button-md button-theme ">View</a>  

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