<br /><br /><br /><br /><br /><br /><br /><br />
<div class="form-content-box">
    <div class="details">
        <div class="main-title">
            <h1>Category View</h1><br/>
            <a href="index.php?e=category" class="btn btn-info">New</a>
            <a href="index.php?e=category-view" class="btn btn-info">View</a>

            <br/><br/><br/><br/><br/>
            <?php
            $d = new Database();

            if (isset($_GET['id'])) {
                $d->delete("category", $_GET['id']);
                echo "<p style='color : red;'>Succesful</p>";
            }
            ?>
            <table class="table table-striped table-hover">
                <tr>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Update</th>
                    <th style="text-align: center;">Delete</th>
                </tr>
                <?php
                $data = $d->view("category");
                while ($value = $data->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$value->name</td>";
                    echo "<td><a href='index.php?e=category-update&id={$value->id}' class='btn btn-warning'>Update</a></td>";
                    echo "<td><a href='index.php?e=category-view&id={$value->id}' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>


