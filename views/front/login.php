
<!-- Content area start -->
<?php
$_SESSION['type'] ='';
if(isset($_SESSION['id'])){
        //require "views/front/home.php";
        Redirect("index.php?f=home");
}else{
?>
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box"><br/><br/>
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Login</span></h1>
                        </div>
                        <?php
                        $d = new Database();
                        if (isset($_POST['login'])) {
                            $where = array(
                                "email" => $d->VD($_POST['email']),
                                "password" => $_POST['password']                            );
                            $result = $d->view("users", "", $where);
                            if ($result->num_rows > 0) {
                                while ($value = $result->fetch_object()) {
                                    if ($value->status) {
                                        echo "<span style='color:red;'>Please Verify your Account First</span>";
                                    } else {
                                        $_SESSION['id'] = $value->id;
                                        $_SESSION['type'] = $value->type;
                                        if (isset($_SESSION['url'])) {
                                            Redirect('index.php?f=booking-system');
                                        } 
                                        else if (isset($_SESSION['checkout'])) {
                                            Redirect('index.php?f=checkout');
                                        } 
                                        else {
                                            Redirect('index.php?u=profile');
                                        }
                                    }
                                }
                            } else {
                                echo "<span style='color:red;'>Invalid Email or Password</span>";
                            }
                        }
                        ?>


                        <!-- Form start -->
                        <form action="" method="post">
                            <div class="form-group"><br/>
                                <input type="email" name="email" class="input-text" value="" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" value="" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div>
                                <a href="index.php?f=forgot-password" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="button-md button-theme btn-block">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                          <table class="table table-bordered">
                            <tr>
                                <th colspan="3"  class="text-center">Login Details</th>
                            </tr>
                            <tr>
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                            </tr>
                            <tr>
                                <td>Admin</td>
                                <td>admin@gmail.com</td>
                                <td>admin</td>
                            </tr>
                             <tr>
                                <td>Employee</td>
                                <td>employee@gmail.com</td>
                                <td>employee</td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <td>user@gmail.com</td>
                                <td>user</td>
                            </tr>
                        </table>
                    </div>
                  
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            New to Tempo? <a href="index.php?f=signup">Sign up now</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>

<?php
}
?>

