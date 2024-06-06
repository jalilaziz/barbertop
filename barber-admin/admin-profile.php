<?php
    ob_start();
    session_start();

    //Page Title
    $pageTitle = 'Admin Profile';

    //Includes
    include 'connect.php';
    include 'Includes/functions.php'; 
    include 'Includes/header.php';

    //Extra JS FILES
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

    //Check If user is already logged in
    if(isset($_SESSION['email_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Admin</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> -->
            </div>

            <?php
                $do = '';

                if(isset($_GET['do']) && in_array($_GET['do'], array('Add','Edit')))
                {
                    $do = htmlspecialchars($_GET['do']);
                }
                else
                {
                    $do = 'Manage';
                }

                if($do == 'Manage')
                {
                    $stmt = $con->prepare("SELECT * FROM barber_admin");
                    $stmt->execute();
                    $rows_admins = $stmt->fetchAll(); 

                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
                            </div>
                            <div class="card-body">
                                
                                <!-- ADD NEW Admin BUTTON -->
                                <a href="admin-profile.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                                    <i class="fa fa-plus"></i> 
                                    Add Admin
                                </a>

                                <!-- Admin Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($rows_admins as $admin)
                                                {
                                                    echo "<tr>";
                                                        echo "<td>";
                                                            echo $admin['username'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $admin['email'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $admin['full_name'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            $delete_data = "delete_admin_".$admin["admin_id"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- EDIT BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                                                <button class="btn btn-success btn-sm rounded-0">
                                                                    <a href="admin-profile.php?do=Edit&admin_id=<?php echo $admin['admin_id']; ?>" style="color: white;">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </button>
                                                            </li>

                                                            <!-- DELETE BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>

                                                                <!-- Delete Modal -->

                                                                <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Delete admin</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure you want to delete this admin?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="button" data-id = "<?php echo $admin['admin_id']; ?>" class="btn btn-danger delete_admin_bttn">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    <?php
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                elseif($do == 'Add')
                {
                    ?>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New admin</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="admin-profile.php?do=Add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['username']))?htmlspecialchars($_POST['username']):'' ?>" placeholder="Username" name="username">
                                            <?php
                                                $flag_add_admin_form = 0;
                                                if(isset($_POST['add_new_admin']))
                                                {
                                                    if(empty(test_input($_POST['username'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Username is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_admin_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['full_name']))?htmlspecialchars($_POST['full_name']):'' ?>" placeholder="Full Name" name="full_name">
                                            <?php
                                                if(isset($_POST['add_new_admin']))
                                                {
                                                    if(empty(test_input($_POST['full_name'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Full Name is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_admin_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="admin_email">E-mail</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['admin_email']))?htmlspecialchars($_POST['admin_email']):'' ?>" placeholder="E-mail" name="admin_email">
                                            <?php
                                                if(isset($_POST['add_new_admin']))
                                                {
                                                    if(empty(test_input($_POST['admin_email'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Email is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_admin_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['password']))?htmlspecialchars($_POST['password']):'' ?>" placeholder="Password" name="password">
                                            <?php
                                                if(isset($_POST['add_new_admin']))
                                                {
                                                    if(empty(test_input($_POST['password'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Email is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_admin_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT BUTTON -->

                                <button type="submit" name="add_new_admin" class="btn btn-primary">Add admin</button>

                            </form>

                            <?php

                                /*** ADD NEW admin ***/

                                if(isset($_POST['add_new_admin']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_add_admin_form == 0)
                                {
                                    $username = test_input($_POST['username']);
                                    $full_name = test_input($_POST['full_name']);
                                    $admin_email = test_input($_POST['admin_email']);
                                    $admin_password = test_input($_POST['password']);
                                    $passwordHash = sha1($admin_password);

                                    try
                                    {
                                        $stmt = $con->prepare("insert into barber_admin (username,email,full_name,password) values(?,?,?,?) ");
                                        $stmt->execute(array($username,$admin_email,$full_name,$passwordHash));
                                        
                                        ?> 
                                            <!-- SUCCESS MESSAGE -->

                                            <script type="text/javascript">
                                                swal("New admin","The new admin has been inserted successfully", "success").then((value) => 
                                                {
                                                    window.location.replace("admin-profile.php");
                                                });
                                            </script>

                                        <?php

                                    }
                                    catch(Exception $e)
                                    {
                                        echo "<div class = 'alert alert-danger' style='margin:10px 0px;'>";
                                            echo 'Error occurred: ' .$e->getMessage();
                                        echo "</div>";
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
                    <?php   
                }
                elseif($do == 'Edit')
                {
                    $admin_id = (isset($_GET['admin_id']) && is_numeric($_GET['admin_id']))?intval($_GET['admin_id']):0;

                    if($admin_id)
                    {
                        $stmt = $con->prepare("Select * from barber_admin where admin_id = ?");
                        $stmt->execute(array($admin_id));
                        $admin = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit admin</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="admin-profile.php?do=Edit&admin_id=<?php echo $admin_id; ?>">
                                        <!-- admin ID -->
                                        <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id'];?>">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" value="<?php echo $admin['username'] ?>" placeholder="Username" name="username">
                                                    <?php
                                                        $flag_edit_admin_form = 0;
                                                        if(isset($_POST['edit_admin_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['username'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Username is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_admin_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="full_name">Full Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $admin['full_name'] ?>"  placeholder="Full Name" name="full_name">
                                                    <?php
                                                        if(isset($_POST['edit_admin_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['full_name'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Full Name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_admin_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label for="admin_email">E-mail</label>
                                                    <input type="text" class="form-control" value="<?php echo $admin['email'] ?>" placeholder="E-mail" name="admin_email">
                                                    <?php
                                                        if(isset($_POST['edit_admin_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['admin_email'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Email is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_admin_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label for="password">Password</label>
                                                    <input type="text" class="form-control" value="<?php 
                                                    echo $admin['password'] 
                                                    ?>" placeholder="Password" name="password">
                                                    <?php
                                                        if(isset($_POST['edit_admin_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['password'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Password is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_admin_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SUBMIT BUTTON -->
                                        <button type="submit" name="edit_admin_sbmt" class="btn btn-primary">
                                            Edit admin
                                        </button>
                                    </form>
                                    <?php
                                        /*** EDIT admin ***/
                                        if(isset($_POST['edit_admin_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_admin_form == 0)
                                        {
                                            $username = test_input($_POST['username']);
                                            $admin_email = test_input($_POST['admin_email']);
                                            $full_name = test_input($_POST['full_name']);
                                            $admin_id = $_POST['admin_id'];
                                            $admin_password = $_POST['password'];
                                            $passwordHash = sha1($admin_password);

                                            try
                                            {
                                                $stmt = $con->prepare("update barber_admin set username = ?, email = ?,full_name = ?, password=? where admin_id = ? ");
                                                $stmt->execute(array($username,$admin_email,$full_name,$admin_id,$passwordHash));
                                                
                                                ?> 
                                                    <!-- SUCCESS MESSAGE -->

                                                    <script type="text/javascript">
                                                        swal("admin Updated","The admin has been updated successfully", "success").then((value) => 
                                                        {
                                                            window.location.replace("admin-profile.php");
                                                        });
                                                    </script>

                                                <?php

                                            }
                                            catch(Exception $e)
                                            {
                                                echo "<div class = 'alert alert-danger' style='margin:10px 0px;'>";
                                                    echo 'Error occurred: ' .$e->getMessage();
                                                echo "</div>";
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                            header('Location: admin-profile.php');
                            exit();
                        }
                    }
                    else
                    {
                        header('Location: admin-profile.php');
                        exit();
                    }
                }
            ?>
        </div>
  
<?php 
        
        //Include Footer
        include 'Includes/footer.php';
    }
    else
    {
        header('Location: login.php');
        exit();
    }

?>