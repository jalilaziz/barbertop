<?php
    session_start();

    //Page Title
    $pageTitle = 'Service Categories';

    //Includes
    include 'connect.php';
    include 'Includes/functions.php'; 
    include 'Includes/header.php';

    //Check If user is already logged in
    if(isset($_SESSION['email_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Service Categories</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a> -->
            </div>

            <!-- Service Categories Table -->
            <?php
                $stmt = $con->prepare("SELECT * FROM service_categories");
                $stmt->execute();
                $rows_categories = $stmt->fetchAll(); 
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Service Categories</h6>
                </div>
                <div class="card-body">

                    <!-- Add New Category Modal -->
                    <div class="modal fade" id="add_new_category" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="category_name">Category name</label>
                                        <input type="text" id="category_name_input" class="form-control" placeholder="Category Name" name="category_name">
                                        <div class="invalid-feedback" id="required_category_name" style="display: none;">
                                            Category name is required!
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-info" id="add_category_bttn">Add Category</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category NAME</th>
                                    
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                foreach($rows_categories as $category)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $category['category_id'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $category['category_name'];
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