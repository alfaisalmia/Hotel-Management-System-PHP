

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
                            <h1><span>Update Room Type</span></h1>
                        </div>
                         <?php
                        $d = new Database();
                        if(isset($_POST['save'])){
                            $data = array(
                                "name" => $d->VD($_POST['rmt']),
                            );
                            if($d->update("roomtype", $data, array("id"=>$_GET['id']))){
                               echo "<p style='color : blue;'>Update Succesfully</p>";
                            }
                        }
                        ?>
                <!-- Form start -->
                        <form action="" method="post">
                            <div class="form-group"><br/>
                                <input type="text" name="rmt" class="input-text" placeholder="New Room Type">
                            </div>
                       
                           
                            <div class="form-group">
                                <button type="submit" name="save" class="button-md button-theme ">Save</button>                                <a href="index.php?e=roomtype-views" class="button-md button-theme ">View</a>  

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

