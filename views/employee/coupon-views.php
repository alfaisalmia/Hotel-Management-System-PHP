

<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br/>  <br/>

                <div class="main-title">
                    <h1><span>Coupon</span> List</h1>
                    <a href="index.php?e=coupon" class="button-md button-theme">Add New</a>
                </div><br/>
                <?php
                $d = new Database();
                if (isset($_GET['id'])) {
                    $del = $d->delete("coupon", $_GET['id']);
                }
                ?>
                <table style=""class="table table-striped table-hover" border="1" align="center" width="50%">
                    <tr style="background-color: #979797; color: white">

                        <th style="text-align: center">Code</th>
                        <th style="text-align: center">Date (D- M- Y) </th>
                        <th style="text-align: center">Percentage ( % )</th>
                        <th style="text-align: center"><span class="glyphicon glyphicon-edit"></span> Update/Edit</th>
                        <th style="text-align: center">Delete</th>

                    </tr>
                    <?php
                    // $d = new Database();
                    $data = $d->view("coupon", array("id", "asc"));
                    while ($value = $data->fetch_object()) {
                        $source = $value->date;
                        $datenew = new DateTime($source);
                        $mainDate = $datenew->format('d-m-Y');
                        echo "<tr>";
                        echo "<td style='text-align:center'><a href='#'>$value->code</a></td>";
                        echo "<td style='text-align:center'><a href='#'>$mainDate</a></td>";
                        echo "<td style='text-align:center'><a href='#'>$value->percentage</a></td>";
                        echo "<td style='text-align:center'><a href='index.php?e=coupon-update&id={$value->id}' class='btn btn-info'><span class='glyphicon glyphicon-edit'></span>     &nbsp; Edit</a></td>";
                        echo "<td style='text-align:center'><a href='index.php?e=coupon-views&id={$value->id}' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span>  &nbsp; Delete</a></td>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    &nbsp;
                </table>

                <!-- Form end -->
            </div>
            <!-- Footer -->

        </div>
        <!-- Form content box end -->
    </div>
</div>
