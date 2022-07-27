
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
                <h1>Salary<span> Information</span></h1>
            </div>

            <?php
            $d = new Database();
            if (isset($_POST['save'])) {
                $data = array(
                    "employeeid" => $d->VD($_POST['ourstaff']),
                    "date" => $d->VD(date('Y-m-d', strtotime($_POST['date']))),
                    "salary" => $d->VD($_POST['salary']),
                    "bonus" => $d->VD($_POST['bonus']),
                    
                );
                if ($d->insert("salary", $data)) {
                    echo "<p style='color : blue; text-align:center;'>All information save succesfully !</p>";
                }
            }
            ?>




            <form action="" method="post">

                <div class="col-sm-3">
                    <div class="form-group form-inline">

                        <select class="inputtext" name="ourstaff" id="ourstaff">
                            <option value="0">Select Employee</option>
                            <?php
                            $em = $d->view("employee", array("name", "asc"));
                            while ($value = $em->fetch_object()) {
                                echo "<option value='{$value->id}'>{$value->name}</option>";
                            }
                            ?>
                        </select><span style="color:red" id="employee_error_message"></span>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-inline">
                        <input type="text" name="date" class="inputtext datepicker" placeholder="Date (M- D - Y )"><span style="color:red" id="date_error_message"></span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-inline">
                        <input type="text" id="salary" name="salary" class="inputtext" placeholder="Salary  Tk."><span style="color:red" class="error_address" id="salary_error_message"></span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-inline">
                        <input type="text" id="bonus" name="bonus" class="inputtext" placeholder="Bonus"><span style="color:red" class="error_address" id="bonus_error_message"></span>
                    </div>
                </div>
                <!-- details -->

        </div>
    </div>
</div>

<div class="container">
    <div class="row">     
        <div class="col-sm-3">
            <div class="form-group">
                <button type="submit" name="save" class="button-md button-theme">Save</button>
                <a href="index.php?e=salary-views" class="button-md button-theme">View</a>  
            </div>
            <form>
        </div>
        </form>
    </div>
</div>


















<script src="././assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        //Employee validation
        $("#ourstaff").focusout(function () {
            if ($(this).val() == null || $(this).val() == undefined || $(this).val() == 0) {
                //alert("Salary must be a Number");
                $("#employee_error_message").html("Employee required");
            } else {
                $("#employee_error_message").html("");
            }
        });
        //Date validation
        $("#date").focusout(function () {
            if ($(this).val() == null || $(this).val() == undefined || $(this).val() == "") {
                //alert("Salary must be a Number");
                $("#date_error_message").html("Date required");
            } else {
                $("#date_error_message").html("");
            }
        });

        // Salary Validation
        $("#salary").focusout(function () {
            if ($(this).val() == null || $(this).val() == undefined || $(this).val() == "") {
                //alert("Salary must be a Number");
                $("#salary_error_message").html("Salary required");
            } else {
                $("#salary_error_message").html("");
            }
        });

        //Date validation
        $("#bonus").focusout(function () {
            if ($(this).val() == null || $(this).val() == undefined || $(this).val() == "") {
                //alert("Salary must be a Number");
                $("#bonus_error_message").html("Bonus required");
            } else {
                $("#bonus_error_message").html("");
            }
        });


    });
</script>
