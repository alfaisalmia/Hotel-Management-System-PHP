<?php
$d = new Database();

if (isset($_GET['i'])) {
    if ($d->delete("payment", "", $_GET['i'])) {
        $ids = $_GET['i'];
        $p = $_GET['p'];
        if (file_exists("images/payment/$ids.$p"))
            unlink("images/payment/$ids.$p");
    } else {
        echo $d->Error;
    }
}
?>
<br><br><br>
<!-- Content area start -->

<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Main title -->
                <div class="main-title">
                    <h1><span>Payment</span> View</h1>


                    <a href="index.php?e=payment" class="button-md button-theme btn-block">New</a>



                </div>
                <table border="1" align="center" class="table table-striped table-hover">
                    <tr style="background-color: #979797;color: white">
                        <th style="text-align: center">Method</th>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">Update</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                    <?php
                    $data = $d->view("payment");

                    while ($value = $data->fetch_object()) {

                        echo "<tr>";
                        echo "<td style='text-align: center'>$value->name</td>";

                        echo "<td style='text-align: center'>";
                        if ($value->picture && file_exists("images/payment/{$value->id}.{$value->picture}")) {
                            echo "<img src='images/payment/{$value->id}.{$value->picture}' width= '100'/>";
                        } else {
                            echo "<img src='images/image-not-found.png' width= '100'/>";
                        }
                        echo "</td>";
                        echo "<td style='text-align: center'><a href='index.php?e=payment-update&i=$value->id' class='btn btn-info'>Update</a></td>";
                        echo "<td style='text-align: center'><a href='index.php?e=payment-view&i=$value->id&p=$value->picture' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </table> 

            </div>
        </div>
    </div>
</div>
<!-- Content area end -->
