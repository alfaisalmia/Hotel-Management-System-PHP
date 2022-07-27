
 <?php
        $d = new Database();
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
                            <h1><span>Add Room Type</span></h1>
                        </div>
                         <?php
                        
                        if(isset($_POST['save'])){
                            
                             $ext1 = extension($_FILES['pic1']['name']);
                             $ext2 = extension($_FILES['pic2']['name']);
                             $ext3 = extension($_FILES['pic3']['name']);
                             //echo $ext;
                             
                            $data = array(
                                "name" => $d->VD($_POST['rmt']),
                                 "picture1" => $ext1,
                                 "picture2" => $ext2 ,
                                 "picture3" => $ext3
                            );
                            if($d->insert("roomtype", $data)){
                                echo $d->Id;
                                echo "Ami";
                               //echo "<p style='color : blue;'>Save Succesfully</p>";
                            if ($ext1 & $ext2 & $ext3) {
                                    move_uploaded_file($_FILES['pic1']['tmp_name'], "images/room/upload/pic1/". $d->Id . ".$ext1");
                                    move_uploaded_file($_FILES['pic2']['tmp_name'], "images/room/upload/pic2/" . $d->Id . ".$ext2");
                                    move_uploaded_file($_FILES['pic3']['tmp_name'], "images/room/upload/pic3/" . $d->Id . ".$ext3");
                                }
                                echo "<p style='color : blue;'>Save Succesfully</p>";
                            } else {
                                echo $d->error;
                            }
                        }
                        ?>
                <!-- Form start -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group"><br/>
                                <input type="text" name="rmt" class="input-text" placeholder="Enter Room Type">
                            </div>
                       
                             <div class="form-group input-text">Picture1:
                                <label class="radio-inline">
                                    <input type="file" name="pic1" id="inlineRadio1">
                                </label>
                            </div>
                            <div class="form-group input-text">Picture2:
                                <label class="radio-inline">
                                    <input type="file" name="pic2" id="inlineRadio1">
                                </label>
                            </div>
                            <div class="form-group input-text">Picture3:
                                <label class="radio-inline">
                                    <input type="file" name="pic3" id="inlineRadio1">
                                </label>
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