<?php
    session_start();

     //Page Title
    $pageTitle = 'Clients';

    //Includes
    include 'connect.php';
    include 'Includes/functions.php'; 
    include 'Includes/header.php';

    //Extra JS FILES
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

    //Check If user is already logged in
    if(isset($_SESSION['admin_email_barbertop']) && isset($_SESSION['password_barbertop']))
    {
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Clients</h1>
         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> 
    </div> -->

    <!-- Clients Table -->

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
                    $stmt = $con->prepare("SELECT * FROM clients");
                    $stmt->execute();
                    $rows_clients = $stmt->fetchAll(); 

                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Clients</h5>
                            </div>
                            <div class="card-body">
                                
                                <!-- ADD NEW client BUTTON -->
                                <a href="clients.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                                    <i class="fa fa-plus"></i> 
                                    Add client
                                </a>

                                <!-- clients Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($rows_clients as $client)
                                                {
                                                    echo "<tr>";
                                                        echo "<td>";
                                                            echo $client['first_name'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $client['last_name'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $client['phone_number'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $client['client_email'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            $delete_data = "delete_client_".$client["client_id"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- EDIT BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                                                <button class="btn btn-success btn-sm rounded-0">
                                                                    <a href="clients.php?do=Edit&client_id=<?php echo $client['client_id']; ?>" style="color: white;">
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
                                                                                <h5 class="modal-title" id="exampleModalLabel">Delete client</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure you want to delete this client?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="button" data-id = "<?php echo $client['client_id']; ?>" class="btn btn-danger delete_client_bttn">Delete</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">Add New client</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="clients.php?do=Add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_fname">First Name</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['client_fname']))?htmlspecialchars($_POST['client_fname']):'' ?>" placeholder="First Name" name="client_fname">
                                            <?php
                                                $flag_add_client_form = 0;
                                                if(isset($_POST['add_new_client']))
                                                {
                                                    if(empty(test_input($_POST['client_fname'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                First name is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_client_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_lname">Last Name</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['client_lname']))?htmlspecialchars($_POST['client_lname']):'' ?>" placeholder="Last Name" name="client_lname">
                                            <?php
                                                if(isset($_POST['add_new_client']))
                                                {
                                                    if(empty(test_input($_POST['client_lname'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Last name is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_client_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_phone">Phone Number</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['client_phone']))?htmlspecialchars($_POST['client_phone']):'' ?>" placeholder="Phone number" name="client_phone">
                                            <?php
                                                if(isset($_POST['add_new_client']))
                                                {
                                                    if(empty(test_input($_POST['client_phone'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Phone number is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_client_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="client_email">E-mail</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['client_email']))?htmlspecialchars($_POST['client_email']):'' ?>" placeholder="E-mail" name="client_email">
                                            <?php
                                                if(isset($_POST['add_new_client']))
                                                {
                                                    if(empty(test_input($_POST['client_email'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Email is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_client_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT BUTTON -->

                                <button type="submit" name="add_new_client" class="btn btn-primary">Add client</button>
                                <a type="button" class="btn btn-secondary" data-dismiss="modal" href="clients.php">Cancel</a>
                                
                            </form>

                            <?php

                                /*** ADD NEW client ***/

                                if(isset($_POST['add_new_client']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_add_client_form == 0)
                                {
                                    $client_fname = test_input($_POST['client_fname']);
                                    $client_lname = $_POST['client_lname'];
                                    $client_phone = test_input($_POST['client_phone']);
                                    $client_email = test_input($_POST['client_email']);

                                    try
                                    {
                                        $stmt = $con->prepare("insert into clients(first_name,last_name,phone_number,client_email) values(?,?,?,?) ");
                                        $stmt->execute(array($client_fname,$client_lname,$client_phone,$client_email));
                                        
                                        ?> 
                                            <!-- SUCCESS MESSAGE -->

                                            <script type="text/javascript">
                                                swal("New client","The new client has been inserted successfully", "success").then((value) => 
                                                {
                                                    window.location.replace("clients.php");
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
                    $client_id = (isset($_GET['client_id']) && is_numeric($_GET['client_id']))?intval($_GET['client_id']):0;

                    if($client_id)
                    {
                        $stmt = $con->prepare("Select * from clients where client_id = ?");
                        $stmt->execute(array($client_id));
                        $client = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit client</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="clients.php?do=Edit&client_id=<?php echo $client_id; ?>">
                                        <!-- client ID -->
                                        <input type="hidden" name="client_id" value="<?php echo $client['client_id'];?>">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_fname">First Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $client['first_name'] ?>" placeholder="First Name" name="client_fname">
                                                    <?php
                                                        $flag_edit_client_form = 0;
                                                        if(isset($_POST['edit_client_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['client_fname'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        First name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_client_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_lname">Last Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $client['last_name'] ?>" placeholder="Last Name" name="client_lname">
                                                    <?php
                                                        if(isset($_POST['edit_client_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['client_lname'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Last name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_client_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="client_phone">Phone Number</label>
                                                    <input type="text" class="form-control" value="<?php echo $client['phone_number'] ?>"  placeholder="Phone number" name="client_phone">
                                                    <?php
                                                        if(isset($_POST['edit_client_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['client_phone'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Phone number is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_client_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label for="client_email">E-mail</label>
                                                    <input type="text" class="form-control" value="<?php echo $client['client_email'] ?>" placeholder="E-mail" name="client_email">
                                                    <?php
                                                        if(isset($_POST['edit_client_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['client_email'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Email is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_client_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SUBMIT BUTTON -->
                                        <button type="submit" name="edit_client_sbmt" class="btn btn-primary">
                                            Edit client
                                        </button>
                                        <a type="button" class="btn btn-secondary" data-dismiss="modal" href="clients.php">Cancel</a>
                                    </form>
                                    <?php
                                        /*** EDIT client ***/
                                        if(isset($_POST['edit_client_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_client_form == 0)
                                        {
                                            $client_fname = test_input($_POST['client_fname']);
                                            $client_lname = $_POST['client_lname'];
                                            $client_phone = test_input($_POST['client_phone']);
                                            $client_email = test_input($_POST['client_email']);
                                            $client_id = $_POST['client_id'];

                                            try
                                            {
                                                $stmt = $con->prepare("update clients set first_name = ?, last_name = ?, phone_number = ?, client_email = ? where client_id = ? ");
                                                $stmt->execute(array($client_fname,$client_lname,$client_phone,$client_email,$client_id));
                                                
                                                ?> 
                                                    <!-- SUCCESS MESSAGE -->

                                                    <script type="text/javascript">
                                                        swal("client Updated","The client has been updated successfully", "success").then((value) => 
                                                        {
                                                            window.location.replace("clients.php");
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
                            header('Location: clients.php');
                            exit();
                        }
                    }
                    else
                    {
                        header('Location: clients.php');
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