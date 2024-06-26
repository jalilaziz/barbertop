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
    if(isset($_SESSION['email_barbertop']) && isset($_SESSION['password_barbertop']))
    {
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clients</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Generate Report
        </a>
    </div> -->

    <!-- Clients Table -->

    <?php
        $employee_id = $_SESSION['employee_id_barbertop'];  
        $stmt = $con->prepare("SELECT * FROM clients WHERE employee_id= $employee_id");
        $stmt->execute();
        $rows_clients = $stmt->fetchAll(); 

    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Clients</h5>
        </div>
        <div class="card-body">

            <!-- clients Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">E-mail</th>

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