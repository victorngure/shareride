<?php
include('auth.php');
include('DBconnect.php');
if (isset($_GET['rideId']) && is_numeric($_GET['rideId'])){
    $id = $_GET['rideId'];
    $sql = "SELECT * FROM rides WHERE rideId='$id'";
    $result = $connection->query($sql);
    if ($result) {
        while($row = $result->fetch_assoc()) { 
            $origin = $row ['origin'];
            $destination = $row ['destination'];
            $availableSeats = $row ['seatsAvailable'];
            $driver = $row ['driver'];
            $fare = $row ['fare'];
            $vehicleType = $row['vehicleType'];
            $time = $row['timestamp'];
        }
    }
}
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
                    <h1 class="page-header">Ride Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th bgcolor="#D3D3D3">Ride Id</th>
                                            <td colspan="2">
                                                <?php echo $id?>
                                            </td>
                                            <td bgcolor="#D3D3D3" colspan="1">
                                                <strong>Origin</strong>
                                            </td>
                                            <td colspan="2 ">
                                                <?php echo $origin ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th bgcolor="#D3D3D3 ">Destination</th>
                                            <td colspan="2 ">
                                                <?php echo $destination ?>
                                            </td>

                                            <td bgcolor="#D3D3D3 " colspan="1 ">
                                                <strong>Vehicle Type</strong>
                                            </td>
                                            <td colspan="2 ">
                                                <?php echo $vehicleType ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th bgcolor="#D3D3D3 ">Available Seats</th>
                                            <td colspan="2 ">
                                                <?php echo $availableSeats ?>
                                            </td>

                                            <td bgcolor="#D3D3D3 " colspan="1 ">
                                                <strong>Driver</strong>
                                            </td>
                                            <td colspan="2 ">
                                                <?php echo $driver ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th bgcolor="#D3D3D3 ">Time of departure</th>
                                            <td colspan="2 ">
                                                <?php echo $time ?>
                                            </td>

                                            <td bgcolor="#D3D3D3 " colspan="1 ">
                                                <strong> Fare </strong>
                                            </td>
                                            <td colspan="2 ">
                                                <?php echo $fare ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="well ">
                                    <h4>
                                        <strong>Passengers</strong>
                                    </h4>
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <?php
                                        include('DBconnect.php');
                                        $userId = $_SESSION['userId'];
                                        $sql = "SELECT u.userName, u.userEmail, u.userId, u.userMobile, p.rideId, p.userId
                                        FROM passengers p
                                        INNER JOIN users u
                                        ON u.userId = p.userId
                                        WHERE p.rideId = $id";
                                        $res = mysqli_query($connection, $sql);
                                        if($result){
                                            if ($res->num_rows > 0){
                                                echo "<thead><th>USER ID</th><th>USER NAME</th><th>EMAIL</th><th>USER MOBILE</th></thead>";
                                                while ($row = $res->fetch_object()){
                                                    echo "<tr>";
                                                    echo "<td>" . $row->userId. "</td>";
                                                    echo "<td>" . $row->userName. "</td>";
                                                    echo "<td>" . $row->userEmail. "</td>";
                                                    echo "<td>" . $row->userMobile. "</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</thead>";
                                            }
                                            else{
                                                echo "No results to display!";
                                            }
                                        }
                                        else{
                                            echo "Error: " . $mysqli->error;
                                        }
                                        $connection->close();
                                        ?>
                                        </table>
                                    </div>
                                </div>

                                <!-- /#wrapper -->

                                <!-- jQuery -->
                                <script src="../vendor/jquery/jquery.min.js "></script>

                                <!-- Bootstrap Core JavaScript -->
                                <script src="../vendor/bootstrap/js/bootstrap.min.js "></script>

                                <!-- Metis Menu Plugin JavaScript -->
                                <script src="../vendor/metisMenu/metisMenu.min.js "></script>

                                <!-- Custom Theme JavaScript -->
                                <script src="../dist/js/sb-admin-2.js "></script>

</body>

</html>