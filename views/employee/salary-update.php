
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
                <h1>Salary<span> Update</span></h1>
            </div>

            <?php
            $d = new Database();
            if (isset($_POST['update'])) {
                $data = array(
                    "employeeid" => $d->VD($_POST['ourstaff']),
                    "date" => $d->VD(date('Y-m-d', strtotime($_POST['date']))),
                    "salary" => $d->VD($_POST['salary']),
                    "bonus" => $d->VD($_POST['bonus'])
                );
                if ($d->update("salary", $data, array("id" => $_GET['id']))) {
                    echo "<p style='color : blue; text-align:center;'>Information is updated succesfully</p>";
                }
            }
            ?>


            <!--            
                        ######################## To Catch the value ###################-->
            <?php
            $table = "salary, employee";
            $order = array("employee.id", "desc");
            $where = array("employee.id" => $_GET['id']);
            $select = "employee.id eid, employee.name, salary.date, salary.salary, salary.bonus";
            $rel = array(
                "salary.employeeid" => 'employee.id'
            );

            $data = $d->view($table, $order, $where, $select, $rel);
            while ($value = $data->fetch_object()) {
                $source = $value->date;
                $date = new DateTime($source);
                $dates = $date->format('m-d-Y'); // 07-31-2012
                $bonus = $value->bonus;
                $salary = $value->salary;
                $ovalue = $value->eid;
                $emname = $value->name;
                ?>

                <form action="" method="post">
                    <div class="col-sm-3">
                        <div class="form-group form-inline">
<label for="date"> Employee Name</label> 
                            <select class="inputtext"  name="ourstaff" id="ourstaff">
                                <?php
                                if (empty($ovalue)) {
                                    echo "<option value='0'>Select Employee</option>";
                                }
                                ?>
                                <?php
                                $em = $d->view("employee", array("name", "asc"));
                                while ($value = $em->fetch_object()) {
                                    if ($value->id == $ovalue) {
                                        echo "<option value='{$value->id}'>{$value->name}</option>";
                                    }
                                }
                                ?>
                            </select><span style="color:red" id="employee_error_message"></span>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-inline">
<label for="date"> Date ( M - D - YYYY)</label>   

                            <input type="text" name="date" class="inputtext datepicker" value="<?php echo $dates; ?>" placeholder="Date (M- D - Y )"><span style="color:red" id="date_error_message"></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-inline">
                            <label for="date"> Salary ( Tk. )</label>  
                            <input type="text" id="salary" name="salary" class="inputtext" value="<?php echo $salary; ?>" placeholder="Salary  Tk."><span style="color:red" class="error_address" id="salary_error_message"></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-inline">
                             <label for="date"> Bonus ( Tk. )</label> 
                            <input type="text" id="bonus" name="bonus" class="inputtext" value="<?php echo $bonus; ?>" placeholder="Bonus Tk."><span style="color:red" class="error_address" id="bonus_error_message"></span>
                        </div>
                    </div><br/><br/><br/><br/><br/>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <button type="submit" name="update" class="button-md button-theme">Update</button>
                            <a href="index.php?e=salary-views" class="button-md button-theme">View</a>  
                        </div>
                    </div>
                </form>
                <?php
            }
            ?>
            <!-- details -->

        </div>
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
