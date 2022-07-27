

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
                            <h1><span>Update Your Service</span></h1>
                        </div>
                         <?php
                        $d = new Database();
                        if(isset($_POST['sav'])){
                            $data = array(
                                "name" => $d->VD($_POST['ser']),
                            );
                            if($d->update("service", $data, array("id"=>$_GET['id']))){
                               echo "<p style='color : blue;'>Update Succesfully</p>";
                            }
                        }
                        ?>

                        <!-- Form start -->
                        <form action="" method="post">
                            <div class="form-group"><br/>
                                <input type="text" name="ser" class="input-text" placeholder="Service Name">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="sav" class="button-md button-theme btn-block">Save</button>
                            </div>
                            <div class="form-group">
                                <a href="index.php?e=services-views" type="submit" name="sav" class="button-md button-theme btn-block">View</a>
                            </div>

                        </form>
                        <!-- Fs-viewsorm end -->
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