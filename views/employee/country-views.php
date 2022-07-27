

<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><br/>
                <div class="main-title">
                    <h1 style="text-align: center">All<span> Countries</span></h1>
                </div>
                <a href="index.php?e=country"> <button type="submit" name="back" class="button-md button-theme center-block">Back To Add Page</button> </a>


                <?php
                $d = new Database();
                $wrong = "Sorry ! We can not delete this country. You can only add and update only";

                if (isset($_GET['id'])) {
                    $del = $d->delete("country", $_GET['id']);
                    echo "<p style='color:red; text-align:center;'> Sorry ! Country can't be deleted</p>";   
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
                    $data = $d->view("country", array("id", "asc"));
                    while ($value = $data->fetch_object()) {

                        echo "<tr>";
                        echo "<td style='text-align:center'><a href='#'>$value->name</a></td>";
                        echo "<td style='text-align:center'><a href='index.php?e=country-update&id={$value->id}' class='btn btn-info'> <span class='glyphicon glyphicon-edit'></span>     &nbsp; Edit</a></td>";
                        echo "<td style='text-align:center'><a href='index.php?e=country-views&id={$value->id}' class='btn btn-danger' id='delete'><span class='glyphicon glyphicon-trash'></span>  &nbsp; Delete</a></td>";

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
<script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#sorry").hide();
        $("#delete").click(function () {
            $("#sorry").show();
         $("#sorry").fadeIn('slow').delay(100000).fadeOut('slow');

        });
    });
</script>
<!---Using Modal--

<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
        <p>Some text in the modal.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

