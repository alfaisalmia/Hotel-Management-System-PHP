
<br/><br/><br/>
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="main-title">
                    <h1><span>RoomType</span> View</h1>

                </div>
                <!-- Form content box start -->
                <a href="index.php?e=roomtype"> <button type="submit" name="back" class="button-md button-theme center-block">Back To Add Page</button> </a> <br/>

                <?php
                $d = new Database();
                if (isset($_GET['id'])) {

                    if ($d->delete("roomtype", $_GET['id'])) {
                        $ids = $_GET['id'];
                        $p1 = $_GET['p1'];
                        $p2 = $_GET['p2'];
                        $p3 = $_GET['p3'];
                        unlink("images/room/upload/pic1/$ids.$p1");
                        unlink("images/room/upload/pic2/$ids.$p2");
                        unlink("images/room/upload/pic3/$ids.$p3");
                        echo "Save successful";
                    } 
                    else {
                        echo $d->error;
                    }

                }
                ?>


                <table border="1" align="center" class="table table-striped table-hover">
                    <tr style="background-color: #979797;color: white">

                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Picture1</th>
                        <th style="text-align: center">Picture2</th>
                        <th style="text-align: center">Picture3</th>
                        <th style="text-align: center">Update/Edit</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                    <?php
                    $data = $d->view("roomtype");
                    while ($value = $data->fetch_object()) {
                        echo "<tr>";

                        echo "<td style='text-align: center'>$value->name</td>";
                        echo "<td style='text-align: center'>";
                        if ($value->picture1 && file_exists("images/room/upload/pic1/{$value->id}.{$value->picture1}")) {
                            echo "<img src='images/room/upload/pic1/{$value->id}.{$value->picture1}' width= '100'/>";
                        }
                        echo "</td>";
                        echo "<td style='text-align: center'>";
                        if ($value->picture2 && file_exists("images/room/upload/pic2/{$value->id}.{$value->picture2}")) {
                            echo "<img src='images/room/upload/pic2/{$value->id}.{$value->picture2}' width= '100'/>";
                        }
                        echo "</td>";
                        echo "<td style='text-align: center'>";
                        if ($value->picture3 && file_exists("images/room/upload/pic3/{$value->id}.{$value->picture3}")) {
                            echo "<img src='images/room/upload/pic3/{$value->id}.{$value->picture3}' width= '100'/>";
                        }
                        echo "</td>";
                        echo "<td style='text-align: center'><a href='index.php?e=rt-update&id={$value->id}&name={$value->name}&p1={$value->picture1}&p2={$value->picture2}&p3={$value->picture3}' class='btn btn-info'>Update</a></td>";
                        
                        echo "<td  style='text-align: center'><a href='index.php?e=roomtype-views&id={$value->id}&p1={$value->picture1}&p2={$value->picture2}&p3={$value->picture3}' class='btn btn-danger'>Delete</a></td>";
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

