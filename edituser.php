 <?php 
    session_start(); 
    include('setDB.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM asa.useradmin WHERE id ='$id'";

    $result = $con->query($sql);

    if($result->num_rows >0)
    {
        $row = $result->fetch_assoc();
    }

    $uname = $row['username'];
    $pword = $row['password'];
    $fullname = $row['fname'];
    $ad = $row['admin'];

    // echo $sql;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Appointment Scheduling App</title>

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
                            Add User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form role="form" method="post" action="edituserproc.php">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" value="<?php echo $uname ?>" disabled>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type = "password" name="password" value="<?php echo $pword ?>" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input class="form-control" name="fname" value="<?php echo $fullname ?>">
                                            <input class="form-control" type = "hidden" name="uid" value="<?php echo $id ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Admin</label>
                                            <select class="form-control" name="admin">
                                                <?php
                                                    if($row['admin']==1)
                                                    {
                                                        echo "<option value='1' selected='selected'>YES</option>";
                                                        echo "<option value='0'>NO</option>";        
                                                    }
                                                    else
                                                    {
                                                        echo "<option value='1'>YES</option>";
                                                        echo "<option value='0' selected = 'selected'>NO</option>";
                                                    }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Save User">
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
