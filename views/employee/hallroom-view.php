<br /><br /><br /><br /><br /><br /><br /><br />
<div class="">
    <div class="details">
        <div class="main-title">
            <h1>Hall Room View</h1><br/>
            <a href="index.php?e=hallroom" class="btn btn-info">New</a>
            <br/><br/><br/><br/><br/>
            <?php
            $d = new Database();
            
            if (isset($_GET['id'])) {
                $d->delete("hallroom", $_GET['id']);
                $ids = $_GET['id'];
                $p1 = $_GET['p1'];
                $p2 = $_GET['p2'];
                $p3 = $_GET['p3'];
                unlink("images/room/hallroom/pic1/$ids.$p1");
                unlink("images/room/hallroom/pic2/$ids.$p2");
                unlink("images/room/hallroom/pic3/$ids.$p1");
                echo "<p style='color : red;'>Succesful</p>";
            }
            ?>
            <table class="table table-striped table-hover" border="1">
                <tr>
                    <th style="text-align: center;">Code</th>
                    <th style="text-align: center;">Description</th>
                    <th style="text-align: center;">Price(taka)</th>
                    <th style="text-align: center;">Discount(%)</th>
                    <th style="text-align: center;">Vat(%)</th>
                    <th style="text-align: center;">Size(sft)</th>
                    <th style="text-align: center;">Picture1</th>
                    <th style="text-align: center;">Picture2</th>
                    <th style="text-align: center;">Picture3</th>
                    <th style="text-align: center;">Update</th>
                    <th style="text-align: center;">Delete</th>
                </tr>
                <?php
                
                $data = $d->view("hallroom");
                while ($value = $data->fetch_object()) {
                    echo "<tr>";
                    
                    echo "<td>$value->code</td>";
                    echo "<td>$value->description</td>";
                    echo "<td>$value->price</td>";
                    echo "<td>$value->discount</td>";
                    echo "<td>$value->vat</td>";
                    echo "<td>$value->size</td>";
                    echo "<td>";
                    if ($value->picture1 && file_exists("images/room/hallroom/pic1/{$value->id}.{$value->picture1}")) {
                        echo "<img src='images/room/hallroom/pic1/{$value->id}.{$value->picture1}' width='100' class=''>";
                    }
                    echo "</td>";
                    echo "<td>";
                    if ($value->picture2 && file_exists("images/room/hallroom/pic2/{$value->id}.{$value->picture2}")) {
                        echo "<img src='images/room/hallroom/pic2/{$value->id}.{$value->picture2}' width='100'>";
                    }
                    echo "</td>";
                    echo "<td>";
                    if ($value->picture3 && file_exists("images/room/hallroom/pic3/{$value->id}.{$value->picture3}")) {
                        echo "<img src='images/room/hallroom/pic3/{$value->id}.{$value->picture3}' width='100'>";
                    }
                    echo "</td>";
                    echo "<td><a href='index.php?e=hallroom-update&id={$value->id}' class='btn btn-warning'>Update</a></td>";
                    echo "<td><a href='index.php?e=hallroom-view&id=$value->id&cd={$value->code}&des={$value->description}&pr={$value->price}&dis={$value->discount}&vt={$value->vat}&sz={$value->size}&p1={$value->picture1}&p2={$value->picture2}&p3={$value->picture3}' class='btn btn-danger'>Delete</a></td>";
                    
                    
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>




