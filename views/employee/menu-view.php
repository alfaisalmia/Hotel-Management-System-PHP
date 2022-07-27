<br /><br /><br /><br /><br /><br /><br /><br />
<div class="">
    <div class="details">
        <div class="main-title">
            <h1>Menu View</h1><br/>
            <a href="index.php?e=menu" class="btn btn-info">New</a>
            <br/><br/><br/><br/><br/>
            <?php
            $d = new Database();
            if (isset($_GET['id'])) {
                $sql=$d->delete("menu", $_GET['id']);
              echo $sql;
                if($sql > 0){
                    echo "Delete successfull";
                }
                
            }
            ?>
            <table class="table table-striped table-hover">
                <tr>
                    <th>title</th>
                    <th>Description</th>
                    <th>Price(taka)</th>
                    <th>Discount(%)</th>

                    <th>Picture</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                
                $data = $d->view("menu");
                while ($value = $data->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$value->title</td>";
                    echo "<td>$value->description</td>";
                    echo "<td>$value->price</td>";
                    echo "<td>$value->discount</td>";

                    echo "<td>";
                    echo "<img src='images/menu/" . md5("ab-1-" . $value->id . "-idb-project") . ".{$value->picture}' width='100'>";
//                    if ($value->picture && file_exists("images/menu/{$value->id}.{$value->picture}")) {
//                        echo "<img src='images/menu/{$value->id}.{$value->picture}' width='100'>";
//                    }
                    echo "</td>";
                    echo "<td><a href='index.php?e=menu-update&id={$value->id}' class='btn btn-warning'>Update</a></td>";
                    echo "<td><a href='index.php?e=menu-view&id=$value->id' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>




