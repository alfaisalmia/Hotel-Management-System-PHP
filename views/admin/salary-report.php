<?php
$d = new Database();
$table = "salary, employee, designation";
$order = array("salary.id", "desc");
$select = "employee.name ename, designation.name dname, salary.salary, salary.bonus, salary.paidmonth, salary.payingdate";
$rel = array("salary.employeeid" => "employee.id", "employee.designationid" => "designation.id" );
$data = $d->view($table, $order, "", $select, $rel);
?>
<!-- Content area start -->
<div class="content-area">
    <div class="content-area">
        <div class="container">
            <div class="row">
                <div class="main-title">
                    <h1>Salary<span> Information</span></h1>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="col-sm-2">
                            <div class="form-group form-inline">
                                <input type="text" name="from" id="from" class="btn-default datepicker" data-date-format="yyyy-mm-dd"  placeholder="Start Date">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group form-inline">
                                <input type="text" name="to" id="to" class="btn-default datepicker" data-date-format="yyyy-mm-dd"  placeholder="End Date">
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="form-group form-inline">
                                <button type="button" name="search" id="search" class="btn btn-info search">Search</button>

                            </div>
                        </div>
                    </form>
                </div>
                <div id="salary_details">
                    <table id="order_data" border="1" align="center" class="table table-striped table-hover">
                        <tr style="background-color: #979797;color: white">
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Designation</th>
                            <th style="text-align: center">Salary</th>
                            <th style="text-align: center">Bonus</th>
                            <th style="text-align: center">Month</th>
                            <th style="text-align: center">Pay Date</th>

                        </tr>
                        <?php
                            while($row = $data->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $row["ename"];?></td>
                                    <td><?php echo $row["dname"];?></td>
                                    <td><?php echo $row["salary"];?></td>
                                    <td><?php echo $row["bonus"];?></td>
                                    <td><?php echo date('F', strtotime($row["paidmonth"]));?></td>
                                    
                                    <td><?php echo $row["payingdate"];?></td>
                                    
                                </tr>
                                <?php
                            }
                        ?>


                    </table> 
                </div>
            </div>
        </div>

    </div>
</div>


