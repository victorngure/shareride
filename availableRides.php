<?php
include('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shareride</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Shareride</a>
            </div>
            <!-- /.navbar-header -->
        
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">


                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php echo $_SESSION['userName'];?> &nbsp
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="logout.php">
                                    <i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <div class="input-group custom-search-form">
                        </div>
                        <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-car"></i> Rides
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="availableRides.php">Available Rides</a>
                                </li>
                                <li>
                                    <a href="myRides.php">My Rides</a>
                                </li>
                                <li>
                                    <a href="addRide.html">Add Ride</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Available Rides</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Displaying all items
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <?php
                                include('DBconnect.php');
                                $userId = $_SESSION['userId'];
                                $query = "SELECT * FROM rides WHERE seatsAvailable > 0";
                                $result = mysqli_query($connection, $query);
                                if($result){
                                    if ($result->num_rows > 0){
                                        echo "<thead><th>ID</th><th>ORIGIN</th><th>DESTINATION</th><th>AVAILABLE SEATS</th><th>FARE</th></thead>";
                                        while ($row = $result->fetch_object()){
                                            echo "<tr>";
                                            echo "<td><a href='rideDetails.php?rideId=" . $row->rideId . "'>". $row->rideId .  "</td>";
                                            echo "<td>" . $row->origin . "</td>";
                                            echo "<td>" . $row->destination . "</td>";
                                            echo "<td>" . $row->seatsAvailable . "</td>";
                                            echo "<td>" . $row->fare . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    else{
                                        echo "No results to display!";
                                    }
                                }
                                else
                                {
                                    echo "Error: " . $mysqli->error;
                                }
                                $connection->close();
                                ?>
                                </thead>

                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="vendor/jquery/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="vendor/metisMenu/metisMenu.min.js"></script>

            <!-- Morris Charts JavaScript -->
            <script src="vendor/raphael/raphael.min.js"></script>
            <script src="vendor/morrisjs/morris.min.js"></script>
            <script src="data/morris-data.js"></script>

            <!-- DataTables JavaScript -->
            <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
            <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
            <!-- Custom Theme JavaScript -->
            <script src="dist/js/sb-admin-2.js"></script>
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
            </script>

</body>

</html>
`