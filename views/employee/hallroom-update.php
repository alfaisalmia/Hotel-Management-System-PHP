<br /><br /><br /><br /><br /><br /><br /><br />
<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1><span>Update</span></h1>
            <a href="index.php?e=hallroom" class="btn btn-info">New</a>
            <a href="index.php?e=hallroom-view" class="btn btn-info">View</a>
        </div>
        <?php
        $d = new Database();
        if (isset($_GET['id'])) {
            $data = $d->view("hallroom", "", array("id" => $_GET['id']));
            $data = $data->fetch_object();
            //print_r($data);
            //echo $data->name;
        }

        $ids = $_GET['id'];
        $old_ext1 = $_GET['p1'];
        $old_ext2 = $_GET['p2'];
        $old_ext3 = $_GET['p3'];

        if (isset($_POST['reg'])) {

            unlink("images/room/hallroom/pic1/$ids.$old_ext1");
            unlink("images/room/hallroom/pic2/$ids.$old_ext2");
            unlink("images/room/hallroom/pic3/$ids.$old_ext3");

            /* ---picture---start-- */
            $ext1 = extension($_FILES['pic1']['name']);
            $ext2 = extension($_FILES['pic2']['name']);
            $ext3 = extension($_FILES['pic3']['name']);
            /* ---picture---end-- */



            $data = array(
                "code" => $d->VD($_POST['code']),
                "description" => $d->VD($_POST['des']),
                "price" => $d->VD($_POST['price']),
                "discount" => $d->VD($_POST['discount']),
                "vat" => $d->VD($_POST['vat']),
                "size" => $d->VD($_POST['size']),
                "picture1" => $ext1,
                "picture2" => $ext2,
                "picture3" => $ext3
            );
            if ($d->update("hallroom", $data, array("id" => $_GET['id']))) {
                if ($ext1 & $ext2 & $ext3) {
                    move_uploaded_file($_FILES['pic1']['tmp_name'], "images/room/hallroom/pic1/" . $ids . ".$ext1");
                    move_uploaded_file($_FILES['pic2']['tmp_name'], "images/room/hallroom/pic2/" . $ids . ".$ext2");
                    move_uploaded_file($_FILES['pic3']['tmp_name'], "images/room/hallroom/pic3/" . $ids . ".$ext3");
                    Redirect("index.php?e=hallroom-view");
                }
                echo "<p style='color : green;'>Update Succesfully</p>";
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="code" class="input-text" value="<?php if(isset($_GET['id'])) echo $data->code; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="des" class="input-text" value="<?php if(isset($_GET['id'])) echo $data->description; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="price" class="input-text" value="<?php if(isset($_GET['id'])) echo $data->price; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="discount" class="input-text" value="<?php if(isset($_GET['id'])) echo $data->discount; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="vat" class="input-text" value="<?php if(isset($_GET['id'])) echo $data->vat; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="size" class="input-text" value="<?php if(isset($_GET['id'])) echo $data->size; ?>">
            </div>
            <div class="form-group">
                <input type="file" name="pic1" class="input-text" placeholder="Picture1">
            </div>
            <div class="form-group">
                <input type="file" name="pic2" class="input-text" placeholder="Picture2">
            </div>
            <div class="form-group">
                <input type="file" name="pic3" class="input-text" placeholder="Picture3">
            </div>
            <div class="form-group">
                <button type="submit" class="button-md button-theme btn-block" name="reg">Update</button>
            </div>
        </form>
    </div>
</div>





