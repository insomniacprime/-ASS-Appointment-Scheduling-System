 <?php 
    session_start(); 
    include('setDB.php');

    $sql = "SELECT * FROM asa.useradmin WHERE admin = '"."1"."'";

    $result = $con->query($sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Appointment Scheduling Appp</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include('nav.php') ?>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $_SESSION["fname"]; ?></h1>

                </div>
                <!-- /.col-lg-12 -->

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Set Appointments
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form role="form" method="post" action="addappointment.php">
                                        <div class="form-group">
                                            <label>Appointment with...</label>
                                            <select class="form-control" name="appwith">
                                            <?php
                                                if($result->num_rows >0)
                                                {
                                                    while($row = $result->fetch_assoc())
                                                    {
                                                        echo "<option value='". $row['id'] ."'>". $row['fname']. "</option>";
                                                    }
                                                }
                                            ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Purpose</label>
                                            <input class="form-control" name="purpose" >
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Date [yyyy-mm-dd]</label>
                                            <input class="form-control" name="appdate" />
                                        </div>
                                        <div class="form-group">
                                            <label>Time [hh:mm AM/PM]</label>
                                            <input class="form-control" name="apptime">
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Save Appointment">
                                        <input type="reset" class="btn btn-warning" value="Reset">
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
    </div>

    <!-- jQuery -->

    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
