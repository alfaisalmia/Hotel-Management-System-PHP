
<br/><br/><br/>
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="main-title">
                    <h1><span>Room</span> View</h1>

                </div>
                <!-- Form content box start -->
                <a href="index.php?e=room"> <button type="submit" name="back" class="button-md button-theme center-block">Back To Add Page</button> </a> <br/>

                <?php
                $d = new Database();
                if (isset($_GET['id'])) {

                    if ($d->delete("room", "", $_GET['id'])) {
                        $ids = $_GET['id'];
                        $p1 = $_GET['p1'];
                        $p2 = $_GET['p2'];
                        $p3 = $_GET['p3'];

                        unlink("images/room/upload/pic1/$ids.$p1");
                        unlink("images/room/upload/pic2/$ids.$p2");
                        unlink("images/room/upload/pic3/$ids.$p3");
                        unlink("description/room/$ids.txt");
                        echo "Successfull";
                    } else {
                        echo $d->Error;
                    }
                }
                ?>


                <table border="1" align="center" class="table table-striped table-hover">
                    <tr style="background-color: #979797;color: white">

                        <th style="text-align: center">Room NO.</th>
                        <th style="text-align: center">Description</th>
                        <th style="text-align: center">Adult</th>
                        <th style="text-align: center">Child</th>
                        <th style="text-align: center">Price</th>
                        <th style="text-align: center">Discount</th>
                        <th style="text-align: center">Vat</th>
                        <th style="text-align: center">RoomType ID</th>
                        <th style="text-align: center">Size</th>
                        <th style="text-align: center">Picture1</th>
                        <th style="text-align: center">Picture2</th>
                        <th style="text-align: center">Picture3</th>
                        <th style="text-align: center">Update/Edit</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                    <?php
                    $table = "room, roomtype";
                    $order = array("room.id", "desc");
                    $select = "room.id rid,room.code,room.adult,room.child,room.discount,room.vat,room.size,room.picture1,room.picture2,room.picture3,room.price,roomtype.id rtypeid,roomtype.name";
                    $rel = array("room.roomtypeid" => "roomtype.id");
                    $data = $d->view($table, $order, "", $select, $rel);


                    while ($value = $data->fetch_object()) {
                        echo "<tr>";

                        echo "<td style='text-align: center'>$value->code</td>";
                        echo "<td style='text-align: center'>" . read_file("description/room/{$value->rid}.txt") . "</td>";
                        echo "<td style='text-align: center'>$value->adult</td>";
                        echo "<td style='text-align: center'>$value->child</td>";
                        echo "<td style='text-align: center'>$value->price</td>";
                        echo "<td style='text-align: center'>$value->discount</td>";
                        echo "<td style='text-align: center'>$value->vat</td>";
                        echo "<td style='text-align: center'>$value->name</td>";
                        echo "<td style='text-align: center'>$value->size</td>";
                        echo "<td style='text-align: center'>";
                        if ($value->picture1 && file_exists("images/room/upload/pic1/{$value->rid}.{$value->picture1}")) {
                            echo "<img src='images/room/upload/pic1/{$value->rid}.{$value->picture1}' width= '100'/>";
                        }
                        echo "</td>";
                        echo "<td style='text-align: center'>";
                        if ($value->picture2 && file_exists("images/room/upload/pic2/{$value->rid}.{$value->picture2}")) {
                            echo "<img src='images/room/upload/pic2/{$value->rid}.{$value->picture2}' width= '100'/>";
                        }
                        echo "</td>";
                        echo "<td style='text-align: center'>";
                        if ($value->picture3 && file_exists("images/room/upload/pic3/{$value->rid}.{$value->picture3}")) {
                            echo "<img src='images/room/upload/pic3/{$value->rid}.{$value->picture3}' width= '100'/>";
                        }
                        echo "</td>";
                        echo "<td style='text-align: center'><a href='index.php?e=room-update&id={$value->rid}' class='btn btn-info'>Update</a></td>";
                        echo "<td  style='text-align: center'><a href='index.php?e=room-view&id={$value->rid}&p1={$value->picture1}&p2={$value->picture2}&p3={$value->picture3}' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>

            </div>
            <!-- Footer -->

        </div>
        <!-- Form content box end -->
    </div>
</div>

