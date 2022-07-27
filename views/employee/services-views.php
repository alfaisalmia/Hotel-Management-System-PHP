

<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box"><br/><br/>
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h2><span>Service</span></h2>
                        </div>

                        <!-- Form start -->
                        <?php
                        $d = new Database();
                        if (isset($_GET['id'])) {
                            $del = $d->delete("service", $_GET['id']);
                        }
                        ?>



                    </div>
                    <table class="table table-striped table-hover" cellpadding="1" align="center" cellpadding="5" border="1s">
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Update/Edit</th>
                        <th style="text-align: center">Delete</th>


                        </tr>
                        <?php
                      
                        $data = $d->view("service");
                        while ($value = $data->fetch_object()) {
                            echo "<tr>";

                            echo "<td>$value->name</td>";
                            echo "<td><a href='index.php?e=service-update&id={$value->id}' class='btn btn-info'>Update</a></td>";
                            echo "<td><a href='index.php?e=services-views&id={$value->id}' class='btn btn-danger'>Delete</a></td>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    <a href="index.php?e=service"> <button type="submit" name="back" class="button-md button-theme ">Back To Add Page</button> </a> 
                    <!-- Form end -->
                </div>
                <!-- Footer -->

            </div>
            <!-- Form content box end -->
        </div>
    </div>
</div>
