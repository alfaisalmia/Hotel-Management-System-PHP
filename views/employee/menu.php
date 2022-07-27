
<br/><br/><br/><br/><br/>


<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1>Add Your<span> Menu</span></h1>
        </div>
        <?php
        $d = new Database();

        if (isset($_POST['save'])) {

            $ext1 = extension($_FILES['pic1']['name']);

            $data = array(
                "title" => $d->VD($_POST['title']),
                "description" => $d->VD($_POST['des']),
                "menutypeid" => $d->VD($_POST['mtypenm']),
                "categoryid" => $d->VD($_POST['category']),
                "price" => $d->VD($_POST['price']),
                "discount" => $d->VD($_POST['discount']),
                "picture" => $ext1,
            );
            if ($d->insert("menu", $data)) {
                if ($ext1) {
                    move_uploaded_file($_FILES['pic1']['tmp_name'], 
                            "images/menu/" . md5("ab-1-" . $d->Id . "-idb-project") . ".$ext1");
                }
                echo "<p style='color : blue;'>Save Succesfully</p>";

                //Redirect("index.php?v=congratulate");
            } else {
                echo "<p style='color : red;'>Insert Valid Name</p>";
                echo $d->Error;
            }
        }
        ?>


        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" class="input-text" placeholder="Title">
            </div>
            <div class="form-group">
                <input type="text" name="des" class="input-text" placeholder="Description">
            </div>

            <div class="form-group">
                <select class="input-text" name="mtypenm">
                    <option value="0">Select Menu Type</option>
                    <?php
                    $dg = $d->view("menutype", array("name", "asc"));
                    while ($value = $dg->fetch_object()) {
                        echo "<option value='{$value->id}'>{$value->name}</option>";
                    }
                    ?>
                </select>

            </div>

            <div class="form-group">
                <select class="input-text" name="category">
                    <option value="0">Select Category Type</option>
                    <?php
                    $dg = $d->view("category", array("name", "asc"));
                    while ($value = $dg->fetch_object()) {
                        echo "<option value='{$value->id}'>{$value->name}</option>";
                    }
                    ?>
                </select>

            </div>

            <div class="form-group">
                <input type="text" name="price" class="input-text" placeholder="Price">
            </div>
            <div class="form-group">
                <input type="text" name="discount" class="input-text" placeholder="Discount">
            </div>


            <div class="form-group">
                <input type="file" name="pic1" class="input-text" placeholder="Picture1">
            </div><br/><br/>

            <div class="form-group">
                <button type="submit" name="save" class="button-md button-theme ">Save</button>                                <a href="index.php?e=menu-view" class="button-md button-theme ">View</a>  

            </div>
        </form>
    </div>
</div>




