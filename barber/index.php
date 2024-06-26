<?php 
	session_start();

	//Check If user is already logged in
	if(isset($_SESSION['email_barbertop']) && isset($_SESSION['password_barbertop']))
	{
        //Page Title
        $pageTitle = 'Dashboard';

        //Includes
        include 'connect.php';
        include 'Includes/functions.php'; 
        include 'Includes/header.php';

?>
	<!-- Begin Page Content -->
	<div class="container-fluid">
		
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Barber Dashboard</h1>
			<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				<i class="fas fa-download fa-sm text-white-50"></i>
				Generate Report
			</a> -->
		</div>

		<!-- Content Row -->
		<div class="row">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
				  		<div class="row no-gutters align-items-center">
							<div class="col mr-2">
					  			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
					  				Total Clients
					  			</div>
					  			<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countItems("client_id","clients")?></div>
							</div>
							<div class="col-auto">
					  			<i class="bs bs-boy fa-2x text-gray-300"></i>
							</div>
				  		</div>
					</div>
			  	</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
				  		<div class="row no-gutters align-items-center">
							<div class="col mr-2">
					  			<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
					  				Total Services
					  			</div>
					  			<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countItems("service_id","services")?></div>
							</div>
							<div class="col-auto">
					  			<i class="bs bs-scissors-1 fa-2x text-gray-300"></i>
							</div>
				  		</div>
					</div>
			  	</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
				  		<div class="row no-gutters align-items-center">
							<div class="col mr-2">
					  			<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
					  				Employees
					  			</div>
					  			<div class="row no-gutters align-items-center">
									<div class="col-auto">
						  				<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo countItems("employee_id","employees")?></div>
									</div>
					  			</div>
							</div>
							<div class="col-auto">
					  			<i class="bs bs-man fa-2x text-gray-300"></i>
							</div>
				  		</div>
					</div>
			  	</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
				  		<div class="row no-gutters align-items-center">
							<div class="col mr-2">
					  			<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
					  				Appointments
					  			</div>
					  			<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo countItems("appointment_id","appointments")?></div>
							</div>
							<div class="col-auto">
					  			<i class="fas fa-calendar fa-2x text-gray-300"></i>
							</div>
				 		</div>
					</div>
			  	</div>
			</div>
		</div>

		<!-- Appointment Tables -->
        <div class="card shadow mb-4">
            <div class="card-header tab" style="padding: 0px !important;background: #4e453e!important">
            	<button class="tablinks active" onclick="openTab(event, 'Upcoming')">
            		Upcoming Bookings
            	</button>
                
            </div>
            <div class="card-body">
            	<div class="table-responsive">
                	<table class="table table-bordered tabcontent" id="Upcoming" style="display:table" width="100%" cellspacing="0">
                  		<thead>
                                <tr>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        Booked Services
                                    </th>
                                    <th>
                                        End Time Expected
                                    </th>
                                    <th>
                                        Client
                                    </th>
                                    <th>
                                        Employee
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                
                                    $stmt = $con->prepare("SELECT * 
                                                    FROM appointments a , clients c
                                                    where start_time >= ?
                                                    and a.client_id = c.client_id
                                                    and canceled = 0
                                                    order by start_time;
                                                    ");
                                    $stmt->execute(array(date('Y-m-d H:i:s')));
                                    $rows = $stmt->fetchAll();
                                    $count = $stmt->rowCount();
                                    
                                    

                                    if($count == 0)
                                    {

                                        echo "<tr>";
                                            echo "<td colspan='5' style='text-align:center;'>";
                                                echo "List of your upcoming bookings will be presented here";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    else
                                    {

                                        foreach($rows as $row)
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row['start_time'];
                                                echo "</td>";
                                                echo "<td>";
                                                    $stmtServices = $con->prepare("SELECT service_name
                                                            from services s, services_booked sb
                                                            where s.service_id = sb.service_id
                                                            and appointment_id = ?");
                                                    $stmtServices->execute(array($row['appointment_id']));
                                                    $rowsServices = $stmtServices->fetchAll();
                                                    foreach($rowsServices as $rowsService)
                                                    {
                                                        echo "- ".$rowsService['service_name'];
                                                        if (next($rowsServices)==true)  echo " <br> ";
                                                    }
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row['end_time_expected'];
                                            
                                                echo "</td>";
                                                echo "<td>";
                                                    echo "<a href = clients.php>";
                                                        //  echo $row['client_id'];
                                                    $stmtClients = $con->prepare("SELECT first_name,last_name
                                                            from clients e, appointments a
                                                            where e.client_id = a.client_id
                                                            and a.appointment_id = ?");
                                                    $stmtClients->execute(array($row['appointment_id']));
                                                    $rowsClients = $stmtClients->fetchAll();
                                                    foreach($rowsClients as $rowsclient)
                                                    {
                                                        echo $rowsclient['first_name']." ".$rowsclient['last_name'];
                                                        
                                                    }
                                                    echo "</a>";
                                                echo "</td>";
                                                echo "<td>";
                                                    $stmtEmployees = $con->prepare("SELECT first_name,last_name
                                                            from employees e, appointments a
                                                            where e.employee_id = a.employee_id
                                                            and a.appointment_id = ?");
                                                    $stmtEmployees->execute(array($row['appointment_id']));
                                                    $rowsEmployees = $stmtEmployees->fetchAll();
                                                    foreach($rowsEmployees as $rowsEmployee)
                                                    {
                                                        echo $rowsEmployee['first_name']." ".$rowsEmployee['last_name'];
                                                        
                                                    }
                                                echo "</td>";
                                                
                                            echo "</tr>";
                                        }
                                    }

                                ?>

                            </tbody>
                	</table>
                	<table class="table table-bordered tabcontent" id="All" width="100%" cellspacing="0">
                  		<thead>
                            <tr>
                                <th>
                                    Start Time
                                </th>
                                <th>
                                    Booked Services
                                </th>
                                <th>
                                    End Time Expected
                                </th>
                                <th>
                                    Client
                                </th>
                                <th>
                                    Employee
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $stmt = $con->prepare("SELECT * 
                                                FROM appointments a , clients c
                                                where a.client_id = c.client_id; 
                                                ORDER BY `start_time` DESC
                                                "); //order by start_time
                                $stmt->execute(array());
                                $rows = $stmt->fetchAll();
                                $count = $stmt->rowCount();

                                if($count == 0)
                                {

                                    echo "<tr>";
                                        echo "<td colspan='5' style='text-align:center;'>";
                                            echo "List of your all bookings will be presented here";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                else
                                {

                                    foreach($rows as $row)
                                    {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo $row['start_time'];
                                            echo "</td>";
                                            echo "<td>";
                                                $stmtServices = $con->prepare("SELECT service_name
                                                        from services s, services_booked sb
                                                        where s.service_id = sb.service_id
                                                        and appointment_id = ?");
                                                $stmtServices->execute(array($row['appointment_id']));
                                                $rowsServices = $stmtServices->fetchAll();
                                                foreach($rowsServices as $rowsService)
                                                {
                                                    echo $rowsService['service_name'];
                                                    if (next($rowsServices)==true)  echo " + ";
                                                }
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['end_time_expected'];
                                        
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['last_name'];
                                            echo "</td>";
                                            echo "<td>";
                                                $stmtEmployees = $con->prepare("SELECT first_name,last_name
                                                        from employees e, appointments a
                                                        where e.employee_id = a.employee_id
                                                        and a.appointment_id = ?");
                                                $stmtEmployees->execute(array($row['appointment_id']));
                                                $rowsEmployees = $stmtEmployees->fetchAll();
                                                foreach($rowsEmployees as $rowsEmployee)
                                                {
                                                    echo $rowsEmployee['first_name']." ".$rowsEmployee['last_name'];
                                                    
                                                }
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                	</table>
                	<table class="table table-bordered tabcontent" id="Canceled" width="100%" cellspacing="0">
                  		<thead>
                            <tr>
                                <th>
                                    Start Time
                                </th>
                                <th>
                                    Client
                                </th>
                                <th>
                                    Cancellation Reason
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $stmt = $con->prepare("SELECT * 
                                                FROM appointments a , clients c
                                                where canceled = 1
                                                and a.client_id = c.client_id
                                                ");
                                $stmt->execute(array());
                                $rows = $stmt->fetchAll();
                                $count = $stmt->rowCount();

                                if($count == 0)
                                {

                                    echo "<tr>";
                                        echo "<td colspan='5' style='text-align:center;'>";
                                            echo "List of your canceled bookings will be presented here";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                else
                                {

                                    foreach($rows as $row)
                                    {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo $row['start_time'];
                                            echo "</td>";
                                            echo "<td>";
                                                echo $row['last_name'];
                                            echo "</td>";
                                            echo "<td>";
                                                
                                                echo $row['cancellation_reason'];
                                                    
                                            echo "</td>";
                                        echo "</tr>";
                                    }
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
