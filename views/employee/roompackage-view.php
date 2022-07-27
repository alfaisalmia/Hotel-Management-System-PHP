<br/><br/><br/>
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h1><span>Room Package</span> View</h1>
                </div>
                <!-- Form content box start -->
                <a href="index.php?e=room-package"> <button type="submit" name="back" class="button-md button-theme center-block">Back To Add Page</button> </a> <br/>

                <?php
                $d = new Database();
                if (isset($_GET['id'])) {
                    $ids = $_GET['id'];
                    if ($d->delete("roompackage", "", $_GET['id'])) {
                        unlink("description/roompackage/$ids.txt");
                        echo "Successfull";
                    } else {
                        echo $d->Error;
                    }
                }
                ?>


                <table border="1" align="center" class="table table-striped table-hover">
                    <tr style="background-color: #979797;color: white">

                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Description</th>

                        <th style="text-align: center">Price</th>
                        <th style="text-align: center">Discount</th>
                        <th style="text-align: center">Vat</th>
                        <th style="text-align: center">Start Date</th>
                        <th style="text-align: center">End Date</th>
                        <th style="text-align: center">Update/Edit</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                    <?php
                    $data = $d->view("roompackage");
                    while ($value = $data->fetch_object()) {
                        echo "<tr>";

                        echo "<td style='text-align: center'>$value->name</td>";
                        echo "<td style='text-align: center'>" . read_file("description/roompackage/{$value->id}.txt") . "</td>";

                        echo "<td style='text-align: center'>$value->price</td>";
                        echo "<td style='text-align: center'>$value->discount</td>";
                        echo "<td style='text-align: center'>$value->vat</td>";
                        echo "<td style='text-align: center'>$value->starttime</td>";
                        echo "<td style='text-align: center'>$value->endtime</td>";

                        echo "<td style='text-align: center'><a href='index.php?e=roompackage-update&id={$value->id}' class='btn btn-info'>Update</a></td>";
                        echo "<td  style='text-align: center'><a href='index.php?e=roompackage-view&id={$value->id}' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <!-- Form content box end -->
    </div>
</div>

