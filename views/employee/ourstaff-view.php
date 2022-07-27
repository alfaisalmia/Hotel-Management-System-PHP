
<br/><br/><br/>
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
             <div class="main-title">
                    <h1><span>Our</span> Staff</h1>
                    <a href="index.php?e=ourstaff"> <button type="submit" name="back" class="button-md button-theme center-block">Back To Add Page</button> </a>
                </div>
           
                
               
                <!-- Form content box start -->
                
                    
                        <?php
                          $d = new Database();
                          if(isset($_GET['id'])){
                              $del=$d->delete("employee", $_GET['id']);  
                          }
                        ?>

                   
                    <table border="1" align="center" class="table table-striped table-hover">
                        <tr style="background-color: #979797;color: white">

                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Designation</th>
                            <th style="text-align: center">Salary</th>
                            <th style="text-align: center">Bankaccount</th>
                            <th style="text-align: center">Date</th>
                            <th style="text-align: center">Date of Birth</th>
                            <th style="text-align: center">Gender</th>
                            <th style="text-align: center">Contact</th>
                            <th style="text-align: center">City</th>
                            <th style="text-align: center">NID Card No</th>
                            <th style="text-align: center">Picture</th>
                            <th style="text-align: center">Update/Edit</th>
                            <th style="text-align: center">Delete</th>
                        </tr>
                        <?php
                        
                        $data = $d->view("employee");
                        while ($value = $data->fetch_object()) {
                            echo "<tr>";

                            echo "<td style='text-align: center'>$value->name</td>";
                            echo "<td style='text-align: center'>$value->email</td>";
                            echo "<td style='text-align: center'>$value->designationid</td>";
                            echo "<td style='text-align: center'>$value->salary</td>";
                            echo "<td style='text-align: center'>$value->bankaccount</td>";
                            echo "<td style='text-align: center'>$value->date</td>";
                            echo "<td style='text-align: center'>$value->dateofbirth</td>";
                            echo "<td style='text-align: center'>$value->gender</td>";
                            echo "<td style='text-align: center'>$value->contact</td>";
                            echo "<td style='text-align: center'>$value->cityid</td>";
                            echo "<td style='text-align: center'>$value->nid</td>";
                            echo "<td style='text-align: center'>";
                            echo "<img src='images/staff/{$value->id}.{$value->picture}' width=''  class='img-responsive' />";//
                            
                            echo "</td>";
                            echo "<td style='text-align: center'><a href='index.php?e=ourstaff-update&id={$value->id}' class='btn btn-info'>Update</a></td>";
                            echo "<td  style='text-align: center'><a href='index.php?e=ourstaff-view&id={$value->id}' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                   
                </div>
                <!-- Footer -->

            </div>
            <!-- Form content box end -->
        </div>



