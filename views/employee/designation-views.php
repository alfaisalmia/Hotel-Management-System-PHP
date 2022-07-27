

<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br/>  <br/>

                <div class="main-title">
                    <h1><span>Designation</span> List</h1>
                </div>
                 <a href="index.php?e=designation"> <button type="submit" name="back" class="button-md button-theme center-block">Add New</button> </a>
                <?php
                $d = new Database();
                if (isset($_GET['id'])) {
                    $del = $d->delete("designation", $_GET['id']);
                }
                ?>
                <table style=""class="table table-striped table-hover" border="1" align="center" width="50%">
                    <tr style="background-color: #979797; color: white">

                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Update/Edit</th>
                        <th style="text-align: center">Delete</th>

                    </tr>
                    <?php
                    // $d = new Database();
                    $data = $d->view("designation", array("id", "asc"));
                    while ($value = $data->fetch_object()) {
                        echo "<tr>";
                        echo "<td style='text-align:center'><a href='#'>$value->name</a></td>";
                        echo "<td style='text-align:center'><a href='index.php?e=designation-update&id={$value->id}' class='btn btn-info'> <span class='glyphicon glyphicon-edit'></span>     &nbsp; Edit</a></td>";
                        echo "<td style='text-align:center'><a href='index.php?e=designation-views&id={$value->id}' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span>  &nbsp; Delete</a></td>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
                
                <!-- Form end -->
            </div>
            <!-- Footer -->

        </div>
        <!-- Form content box end -->
    </div>
</div>
