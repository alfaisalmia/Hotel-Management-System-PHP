<style>
    .inputtext{
        width: 100%;
        padding: 10px 15px;
        font-size: 13px;
        height: 44px;
        border: 1px solid #efefef;
        background: #efefef;
        outline: none;
        color: black;
        border-radius: 3px;
    }


</style>
<br/><br/>

<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="main-title">
                <h1><span> Add </span> Coupon</h1>
            </div>
            <?php
            $d = new Database();
            if (isset($_POST['save'])) {
                if ($_POST['code'] !== "" && $_POST['date'] !== "" && $_POST['perc'] !== "") {
                    $data = array(
                        "code" => $d->VD($_POST['code']),
                        "date" => $d->VD(date('Y-m-d', strtotime($_POST['date']))),
                        "percentage" => $d->VD($_POST['perc'])
                    );
                    if ($d->insert("coupon", $data)) {
                        echo "<p style='color : blue; text-align:center;'>Save Succesfully</p>";
                    }
                } else {
                    echo "<p style='color : red;'>Invalid Insert</p>";
                }
            }
            ?>


            <!-- Form content box start -->
            <form action="" method="post">
                <div class="col-sm-4">
                    <div class="form-group form-inline">
                        <input type="text" name="code" class="inputtext" placeholder="Code">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-inline">
                        <input type="text" name="date" class="inputtext datepicker" placeholder="Date (M- D - Y )">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-inline">
                        <input type="text" name="perc" class="inputtext" placeholder="Percentage ( % )">
                    </div>
                </div>
                <!-- details -->


                <div class="col-sm-4">
                    <div class="form-group">
                        <button type="submit" name="save" class="button-md button-theme">Save</button>
                        <a href="index.php?e=coupon-views" class="button-md button-theme">View</a>  

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
