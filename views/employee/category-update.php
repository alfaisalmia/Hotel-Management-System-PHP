<br /><br /><br /><br /><br /><br /><br /><br />
<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1><span>Update</span></h1>
            <a href="index.php?e=category" class="btn btn-info">New</a>
            <a href="index.php?e=category-view" class="btn btn-info">View</a>
        </div>
        <?php
        $d = new Database();
        if (isset($_GET['id'])) {
            $data = $d->view("category", "", array("id" => $_GET['id']));
            $data = $data->fetch_object();
            //echo $data->name;
        }
        if (isset($_POST['reg'])) {
            $data = array(
                "name" => $d->VD($_POST['ctgname'])
            );
            if ($d->update("category", $data, array("id" => $_GET['id']))) {
                echo "<p style='color : green;'>Update Succesfully</p>";
                Redirect("index.php?e=category-view");
            }
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="ctgname" class="input-text" placeholder="Insert Category" value="<?php if (isset($_GET['id'])) echo $data->name; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="button-md button-theme btn-block" name="reg">Update</button>
            </div>
        </form>
    </div>
</div>



