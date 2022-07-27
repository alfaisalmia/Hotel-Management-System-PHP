
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
                <h1><span> Update  </span> Coupon</h1>
            </div>
            <?php
            $d = new Database();
            if (isset($_POST['update'])) {
                $data = array(
                    "code" => $d->VD($_POST['code']),
                    "date" => $d->VD(date('Y-m-d', strtotime($_POST['date']))),
                    "percentage" => $d->VD($_POST['perc'])
                );
                if ($d->update("coupon", $data, array("id" => $_GET['id']))) {


                    echo "<p style='color : blue;text-align:center;'>Update Succesfully</p>";
                    //Redirect("index.php?e=country-views");
                }
            }
            ?>


            <!-- Form content box start -->
            <!-- ##################     To catch the value  ##################-->
            <?php
            $where = array("id" => $_GET['id']);
            $data = $d->view("coupon", array("id", "desc"), $where, "", "");
            while ($value = $data->fetch_object()) {
                $source = $value->date;
                $date = new DateTime($source);
                $dates = $date->format('m-d-Y'); // 07-31-2012
                ?>
                <form action="" method="post">

                    <div class="form-group form-inline">
                        <div class="col-sm-4">                            
                            <label for="code">  Code</label>   
                            <input type="text" name="code" id="code" class="inputtext" value="<?php echo $value->code; ?>" placeholder="Code">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-inline">
                             <label for="code">  Date ( M - D -YYYY ) </label> 
                            <input type="text" name="date" class="inputtext datepicker" value="<?php echo $dates; ?>" placeholder="Date">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-inline">
                             <label for="code"> Percentage ( % )</label> 
                            <input type="text" name="perc" class="inputtext" value="<?php echo $value->percentage; ?>" placeholder="Percentage ( % )">
                        </div>
                    </div>
                    <!-- details -->


                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" name="update" class="button-md button-theme ">Update</button>
                            <a href="index.php?e=coupon-views" class="button-md button-theme ">View</a>  

                        </div>
                    </div>

                </form>
                <?php
            }
            ?>

        </div>
    </div>
</div>
