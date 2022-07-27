<?php

$d = new mysqli("localhost", "erfapujd_hotel", "bH8]en4T%(6?", "erfapujd_hotel");

if (isset($_POST['From'], $_POST['to'])) {
    $result = '';
    $sql = "select employee.name ename, designation.name dname, salary.salary, salary.bonus, salary.paidmonth, salary.payingdate from salary, employee, designation where salary.employeeid = employee.id AND employee.designationid = designation.id AND paidmonth between '" . $_POST['From'] . "' and '" . $_POST['to'] . "'";
    $test = $d->query($sql);
    $result .= ' <table id="order_data" border="1" align="center" class="table table-striped table-hover">
                        <tr style="background-color: #979797;color: white">
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Designation</th>
                            <th style="text-align: center">Salary</th>
                            <th style="text-align: center">Bonus</th>
                            <th style="text-align: center">Month</th>
                            <th style="text-align: center">Pay Date</th>

                        </tr>';
    if ($test->num_rows > 0) {
        while ($ok = $test->fetch_array()) {
            $date = $ok["paidmonth"];
            $date = date('F', strtotime($date));
            $result .= '
                                    <tr>
                                        <td>' . $ok["ename"] . '</td>
                                        <td>' . $ok["dname"] . '</td>
                                        <td>' . $ok["salary"] . '</td>
                                        <td>' . $ok["bonus"] . '</td>
                                        <td>' . $date . '</td>
                                        <td>' . $ok["payingdate"] . '</td>
                                   </tr>';
        }
    } else {
        $result .= '
		<tr>
		<td colspan="5">No Salary Found</td>
		</tr>';
    }
    $result .= '</table';
    echo $result;
}


