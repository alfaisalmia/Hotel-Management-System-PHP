

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
                            <h1>Add<span> Country</span></h1>
                        </div>
                         <?php
                        $d = new Database();
                        if(isset($_POST['save'])){
                            $data = array(
                                "name" => $d->VD($_POST['country']),
                            );
                            if($d->insert("country", $data)){
                               echo "<p style='color : blue;'>Save Succesfully</p>";
                            }
                        }
                        ?>
                <!-- Form start -->
                        <form action="" method="post">
                            <div class="form-group"><br/>
                                <input type="text" name="country" class="input-text" placeholder="Country Name">
                            </div>
                       
                           
                            <div class="form-group">
                                <button type="submit" name="save" class="button-md button-theme ">Save</button>                                <a href="index.php?e=country-views" class="button-md button-theme ">View</a>  

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