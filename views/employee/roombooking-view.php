<br /><br /><br /><br /><br /><br /><br /><br />
<div class="">
    <div class="details">
        <div class="main-title">
            <h1>Room Booking View</h1><br/>
            <a href="index.php?e=roomBooking" class="btn btn-info">New</a>
            <br/><br/><br/><br/><br/>
            <?php
            $d = new Database();
            if (isset($_GET['id'])) {
                $sql=$d->delete("roomBooking", $_GET['id']);
              echo $sql;
                if($sql > 0){
                    echo "Delete successfull";
                }
                
            }
            ?>
            <table class="table table-striped table-hover">
                <tr>
                    <th>User Id</th>
                    <th>Room Id</th>
                    <th>Price(taka)</th>
                    <th>Discount(%)</th>
					<th>Vat</th>
                    
                    <th>Start Date</th>
                     <th>End Date</th>
                     <th>Coupon Id</th>
                     <th>Payment Id</th>
                     
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                
                $data = $d->view("roomBooking");
                while ($value = $data->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$value->userid</td>";
                    echo "<td>$value->roomid</td>";
                    echo "<td>$value->price</td>";
                    echo "<td>$value->discount</td>";
					echo "<td>$value->vat</td>";
					echo "<td>$value->startdate</td>";
					echo "<td>$value->enddate</td>";
					echo "<td>$value->advanced</td>";
					echo "<td>$value->couponid</td>";
					echo "<td>$value->paymentid</td>";

                    echo "<td>";
                   
//                    if ($value->picture && file_exists("images/menu/{$value->id}.{$value->picture}")) {
//                        echo "<img src='images/menu/{$value->id}.{$value->picture}' width='100'>";
//                    }
                    echo "</td>";
                    echo "<td><a href='index.php?e=roombooking-update&id={$value->id}' class='btn btn-warning'>Update</a></td>";
                    echo "<td><a href='index.php?e=roombooking-view&id=$value->id' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>




