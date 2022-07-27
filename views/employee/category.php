<br /><br /><br /><br /><br /><br /><br /><br />

<?php
$d = new Database();

if (isset($_POST['reg'])) {

    $data = array(
        "name" => $d->VD($_POST['ctgname'])
    );
    if ($d->insert("category", $data)) {
        echo "<p style='color : green;'>Insert Succesfully</p>";
    } else {
        echo $d->Error;
    }
}
?>

<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1><span>Category</span></h1>
            <a href="index.php?e=category-view" class="btn btn-info">View</a>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="ctgname" class="input-text" placeholder="Category">
            </div>
            <div class="form-group">
                <button type="submit" class="button-md button-theme btn-block" name="reg">Save</button>
            </div>
        </form>
    </div>
</div>


