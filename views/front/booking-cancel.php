
<br/><br/><br/>
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="main-title">
                <h1><span>Room Booking </span> Details</h1>

            </div>



            <!-- Form content box start -->


            <?php
            $d = new Database();
            if (isset($_GET['id'])) {
                $del = $d->delete("roombooking", $_GET['id']);
            }
            ?>


            <table border="1" align="center" class="table table-striped table-hover">
                <tr style="background-color: #979797;color: white">
                    <th style="text-align: center">Client Name</th>

                    <th style="text-align: center">Room Code</th>
                    <th style="text-align: center">Discount</th>
                    <th style="text-align: center">Vat</th>
                    <th style="text-align: center">Start Date</th>
                    <th style="text-align: center">End Date</th>
                    <th style="text-align: center">Payment Method</th>
                    <th style="text-align: center">Paid Amount</th>
                    <th style="text-align: center">Cancel</th>
                </tr>


                <?php
                $data = $d->view("roombooking");
                     if ($data->num_rows <= 0) {
                    $userid = 0;
                } else {
                    while ($value = $data->fetch_object()) {
                        $userid = $value->userid;
                    }
                }
// Who can see the cancellation of room only anmin and user
                if ((($_SESSION['id']))) {
                    if ($_SESSION['type'] == 3) {
                        $data = $d->view("room_booking_cancel");
                    } else {
                        $data = $d->view("room_booking_cancel", "", array("userid" => $_SESSION['id']));
                    }
                    if ($userid) {
                        while ($value = $data->fetch_object()) {
                            echo "<tr>";
                            echo "<td style='text-align: center'>$value->name</td>";
                            echo "<td style='text-align: center'>$value->CODE</td>";
                            echo "<td style='text-align: center'>$value->discount</td>";
                            echo "<td style='text-align: center'>$value->vat</td>";
                            echo "<td style='text-align: center'>$value->startdate</td>";
                            echo "<td style='text-align: center'>$value->enddate</td>";
                            echo "<td style='text-align: center'>$value->pname</td>";
                            echo "<td style='text-align: center'>$value->price</td>";
                            echo "<td  style='text-align: center'><a href='index.php?f=booking-cancel&id={$value->id}' class='btn btn-danger cancel_booking'>Cancel</a></td>";
                            echo "</tr>";
                        }
                    } else {

                        echo "<tr style='text-align: center; color:red'> <td colspan='9'>No Reservation at all </td></tr>";
                    }
                }
                ?>
            </table>

        </div>
        <!-- Footer -->

    </div>
    <!-- Form content box end -->
</div>


<script>
    $(document).ready(function () {

        // Cancel Booking ajax
        $(".cancel_booking").click(function () {

            var id = <?php echo $id ?>;

            $.ajax({
                type: 'POST',
                data: {
                    "id": id,
                },
                url: "ajax/ajax_roombooking_cancel.php",
                success: function (data) {
                    alert(data);
                    alert("ami");
                },
            }
        });
        return false;
    });

</script>

