<br /><br /><br /><br /><br /><br /><br /><br />

<?php
$d = new Database();

if (isset($_POST['reg'])) {

    $ext1 = extension($_FILES['pic1']['name']);
    $ext2 = extension($_FILES['pic2']['name']);
    $ext3 = extension($_FILES['pic3']['name']);

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
    if ($d->insert("hallroom", $data)) {
        if ($ext1 & $ext2 & $ext3) {
            move_uploaded_file($_FILES['pic1']['tmp_name'], "images/room/hallroom/pic1/" . $d->Id . ".$ext1");
            move_uploaded_file($_FILES['pic2']['tmp_name'], "images/room/hallroom/pic2/" . $d->Id . ".$ext2");
            move_uploaded_file($_FILES['pic3']['tmp_name'], "images/room/hallroom/pic3/" . $d->Id . ".$ext3");
            
             Redirect("index.php?e=hallroom-view");
        }
         echo "<p style='color : green;'>Save Succesfully</p>";
    } else {
        echo "$d->ERROR";
    }
}
?>

<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1><span>HallRoom</span></h1>
            <a href="index.php?e=hallroom-view" class="btn btn-info">View</a>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="code" class="input-text" placeholder="Code">
            </div>
            <div class="form-group">
                <input type="text" name="des" class="input-text" placeholder="Description">
            </div>
            <div class="form-group">
                <input type="text" name="price" class="input-text" placeholder="Price">
            </div>
            <div class="form-group">
                <input type="text" name="discount" class="input-text" placeholder="Discount">
            </div>
            <div class="form-group">
                <input type="text" name="vat" class="input-text" placeholder="Vat">
            </div>
            <div class="form-group">
                <input type="text" name="size" class="input-text" placeholder="Size">
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
                <button type="submit" class="button-md button-theme btn-block" name="reg">Save</button>
            </div>
        </form>
    </div>
</div>



