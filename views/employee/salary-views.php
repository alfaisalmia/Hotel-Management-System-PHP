<?php
$d = new Database();
?>

<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br/>  

                <div class="main-title">
                    <?php
                    $table = "employee, salary";
                    $select = "employee.id, employee.name, salary.salary, salary.bonus, salary.payingdate";
                    $rel = array(
                        
                        "employee.id" => 'salary.employeeid'
                    );
                    $where = array(
                                "salary.paidmonth" => date('Y-m-d', mktime(0, 0, 0, date('m') - 1, 1))
                            );
                    $result = $d->view($table, "", $where, $select, $rel);
                    if($result->num_rows > 0){
                       echo "<h1><span>Salary</span>Already Paid</h1>";
                        $monthname = date('F', mktime(0, 0, 0, date('m') - 1, 1));
                        $yearname = date('Y');
                       echo "<h1><span> $monthname </span>, $yearname</h1>";
                       echo "</div>"; 
                          echo " <table style='' class='table table-striped table-hover' border='1' align='center' width='50%'>";
                          echo "<tr style='background-color: #979797; color: white'>";
                          echo "<th style='text-align: center'>Name</th>";
                          echo "<th style='text-align: center'>Bonus</th>";
                          echo "<th style='text-align: center'>Salary</th>";
                          echo "<th style='text-align: center'>Paying Date</th>";
                          echo "</tr>";
                      while ($value = $result->fetch_object()) {
                           echo "<tr>";
                              echo "<td style='text-align:center'><a href='index.php?e=salary-views/$value->id'>$value->name</a></td>";
                              echo "<td style='text-align:center'><a href='#'>$value->bonus</a></td>";
                              echo "<td style='text-align:center'><a href='#'>$value->salary</a></td>";
                              echo "<td style='text-align:center'><a href='#'>$value->payingdate</a></td>";
                           echo "</tr>";
                      }
                        echo "</table>";
                    }
                    else{
                        echo "<h1><span>Pay</span> Salary</h1>";
                        $monthname = date('F', mktime(0, 0, 0, date('m') - 1, 1));
                        $yearname = date('Y');
                    echo "<h1><span> $monthname </span>, $yearname</h1>";

                 echo "</div>";
                 ?>
                
                <?php
                if(isset($_SESSION['one'])){
                    echo "<button class='btn btn-danger bonusremove' value='100'>Remove Bonus</button>";
                }
                else{
                    echo "<a href='#' name='back' id='bonus' data-toggle='modal' data-target='#myModal' class='btn btn-success'>Add Bonus</a>";
                }
                ?>
                
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" id="modalwindow">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                <h4 class="modal-title">Add Bonus</h4>
                            </div>
                            <div class="modal-body">
                                <h5>Add 50% Bonus of Basic Salary</h5><button class="bonusone" value="50">Click Here</button>
                                <h3>Or</h3>
                                <h5>Add 100% Bonus of Basic Salary</h5><button class="bonustwo" value="100">Click Here</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                if(isset($_POST['subbb'])){
                    $table = "employee";
                    $order = array("employee.id", "desc");
                    $where = array();
                    $select = "employee.id eid";
                    
                    $data = $d->view($table, $order, "", $select);
                    $bonus = $_POST['bonus'];
                    $salary = $_POST['salary'];
                    $i = 0;
                    while ($value = $data->fetch_object()) {
                        //echo $value->eid . "-" . $bonus[$i]. "-" . $salary[$i];
                        $arr = array(
                            'employeeid' => $value->eid,
                            'date' => date('Y-m-d', mktime(0, 0, 0, date('m') - 1, 1)),
                            'salary' => $salary[$i],
                            'bonus' => $bonus[$i],
                            'payingdate' => date('Y-m-d')
                        );
                        
                        if($d->insert("salary", $arr)){
                        
                            $i++;
                        unset($_SESSION['one']);    
                        echo "<meta http-equiv='refresh' content='0'>";
                        }
                    }
                   
                }
                ?>
                <form method="post">
                     <table style=""class="table table-striped table-hover" border="1" align="center" width="50%">
                    <tr style="background-color: #979797; color: white">
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Designation</th>
                        <th style="text-align: center">Basic(USD)</th>

                        <th style="text-align: center">MA(5%)</th>
                        <th style="text-align: center">TA(10%)</th>
                        <th style="text-align: center">House Rent(20%)</th>
                        <th style="text-align: center">Bonus (USD)</th>
                        <th style="text-align: center">PF(-5%)</th>
                        <th style="text-align: center">Tax(-15%)</th>
                        <th style="text-align: center">Net Salary</th>

                    </tr>
                        
                 <?php
                    
                    $table = "employee, designation";
                    $order = array("employee.id", "desc");
                    $where = array();
                    $select = "employee.id eid, designation.name dname, employee.name, employee.salary";
                    $rel = array(
                        
                        "designation.id" => 'employee.designationid'
                    );

                    $data = $d->view($table, $order, "", $select, $rel);
                    $totalamount = 0;
                    $bonus = 0;
                    while ($value = $data->fetch_object()) {
                        
                        
                        echo "<tr>";

                        echo "<td style='text-align:center'><a href='#' id= 'name-{$value->eid}'>$value->name</a></td>";
                        echo "<td style='text-align:center'><a href='#'>$value->dname</a></td>";
                        echo "<td style='text-align:center'><a href='#'>$value->salary</a></td>";

                        $medical = $value->salary * (5 / 100);
                        echo "<td style='text-align:center'><a href='#'>$medical</a></td>";
                        $transport = $value->salary * (10 / 100);
                        echo "<td style='text-align:center'><a href='#'>$transport</a></td>";
                        $hrent = $value->salary * (20 / 100);
                        echo "<td style='text-align:center'><a href='#'>$hrent</a></td>";

                        if (isset($_SESSION['one'])) {
                            $bonus = $value->salary * (50 / 100);
                            echo "<td style='text-align:center' id= 'bonus-{$value->eid}'><a href='#'>$bonus</a></td>";
                            echo "<input type='hidden' name='bonus[]' value='{$bonus}' />";
                        } else if (isset($_SESSION['two'])) {
                            $bonus = $value->salary * (100 / 100);
                            echo "<input type='hidden' name='bonus[]' value='{$bonus}' />";
                            echo "<td style='text-align:center' id= 'bonus-{$value->eid}'><a href='#'>$bonus</a></td>";
                        } else {
                            echo "<td style='text-align:center'><a href='#' id= 'bonus-{$value->eid}'>$bonus</a></td>";
                            echo "<input type='hidden' name='bonus[]' value='{$bonus}' />";
                        }
                        $pfund = $value->salary * (5 / 100);
                        echo "<td style='text-align:center'><a href='#'>$pfund</a></td>";
                        $tax = $value->salary * (15 / 100);
                        echo "<td style='text-align:center'><a href='#'>$tax</a></td>";
                        $totalsalary = $value->salary + $medical + $transport + $hrent + $bonus - $pfund - $tax;
                        echo "<td style='text-align:center'><a href='#'  id= 'salary-{$value->eid}'>$totalsalary</a></td>";
                        echo "<input type='hidden' name='salary[]' value='{$totalsalary}'/>";


                        echo "</td>";

                        echo "</tr>";


                        $totalamount += $totalsalary;
                    }

                    echo "<td colspan='9' style='text-align: right;'>Total</td>";

                    echo "<td>=&nbsp $totalamount</td>";
                    ?>
                     </table>
                    <input type="submit" name="subbb" class="btn btn-info pay" value="Click To Pay">
                    
                    </form>
                
                <!-- Form end -->
            </div>
            <!-- Footer -->

                    
                    <?php
                
                    }
                    ?>
                
        </div>
        <!-- Form content box end -->
    </div>
</div>
