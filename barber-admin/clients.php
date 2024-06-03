<?php
    session_start();

     //Page Title
    $pageTitle = 'Clients';

    //Includes
    include 'connect.php';
    include 'Includes/functions.php'; 
    include 'Includes/header.php';

    //Check If user is already logged in
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clients</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> -->
    </div>

    <!-- Clients Table -->
    <?php
                $stmt = $con->prepare("SELECT * FROM clients");
                $stmt->execute();
                $rows_clients = $stmt->fetchAll(); 
            ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
        </div>
        <div class="card-body">

            <!-- Clients Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID#</th>
                            <th scope="col">First and Last Name</th>
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
                                                echo $client['client_id'];
                                            echo "</td>";
                                            echo "<td>";
                                                echo $client['first_name'] . " ". $client['last_name'];;
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
                                    <a href="clients.php?do=Edit&client_id=<?php echo $client['client_id']; ?>"
                                        style="color: white;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </button>
                            </li>

                            <!-- DELETE BUTTON -->

                            <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal"
                                    data-target="#<?php echo $delete_data; ?>" data-placement="top"><i
                                        class="fa fa-trash"></i></button>

                                <!-- Delete Modal -->

                                <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete client</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this client?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="button" data-id="<?php echo $client['client_id']; ?>"
                                                    class="btn btn-danger delete_employee_bttn">Delete</button>
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