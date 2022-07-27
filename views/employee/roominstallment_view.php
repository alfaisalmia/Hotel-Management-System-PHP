<br /><br /><br /><br /><br /><br /><br /><br />
<div class="">
    <div class="details">
        <div class="main-title">
            <h1>Room Installment View</h1><br/>
            <a href="index.php?e=roominstallment" class="btn btn-info">New</a>
            <br/><br/><br/><br/><br/>
            <?php
            $d = new Database();
            
            if (isset($_GET['id'])) {
                $d->delete("roominstallment", $_GET['id']);
                echo "<p style='color : red;'>Succesful</p>";
            }
            ?>
            <table class="table table-striped table-hover" border="1">
                <tr>
                    <th style="text-align: center">Amount</th>
                    <th style="text-align: center">Date</th>
                    <th style="text-align: center">User Name</th>
                    <th style="text-align: center">Payment</th>
                    <th style="text-align: center">Room Price</th>
                    <th style="text-align: center">Update</th>
                    <th style="text-align: center">Delete</th>
                </tr>
                <?php
                $table = "roominstallment, payment, roombooking, users";
                
                $select = "roominstallment.id, roominstallment.amount, roominstallment.date, payment.name pname, roombooking.price rprice, users.name uname";

                $where = array();
                
                $rel = array(
                    "roominstallment.paymentid" => 'payment.id',
                    "roominstallment.roombookingid" => 'roombooking.id',
                    "roominstallment.usersid" => 'users.id'
                );
                
                $order = array("roominstallment.id", "desc");

                $data = $d->view($table, $order, $where, $select, $rel);
                while ($value = $data->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$value->amount</td>";
                    echo "<td>$value->date</td>";
                    echo "<td>$value->uname</td>";
                    echo "<td>$value->pname</td>";
                    echo "<td>$value->rprice</td>";
                    echo "<td><a href='index.php?e=roominstallment_update&id={$value->id}' class='btn btn-warning'>Update</a></td>";
                    echo "<td><a href='index.php?e=roominstallment_view&id={$value->id}' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>




