<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome.min.css">

    <style>
    .fonts{
        color:white
    }
    .green{
        
    }
    .yellow{
    }

</style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 mb-3">

                <br>

                <div class="p-2 bg-info rounded-3" style="height: 160px">
                    <div class="inner">
                        <div class="fonts">
                            <br>
                            <h3><?php

                                // This code is related to submitting remarks of terminated scholarship
                                $hostname = 'localhost';
                                $username = 'root';
                                $password = '';
                                $database = 'db_scholar';

                                // Create a database connection
                                $connection = new mysqli($hostname, $username, $password, $database);

                                // Check if the connection was successful
                                if ($connection->connect_error) {
                                    die("Connection failed: " . $connection->connect_error);
                                }


                                $USERID = $_SESSION['USERID'];
								$query = "SELECT staff_address FROM user_acc WHERE USERID = $USERID";
								$result = mysqli_query($connection, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
									$row = mysqli_fetch_assoc($result);
									$staffLocation = $row['staff_address'];


                                $query = "SELECT COUNT(*) as total FROM scholar_info WHERE `graduate` != 'yes' AND address LIKE '%$staffLocation%'";
                                $result = mysqli_query($connection, $query);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $total_scholars = $row['total'];
                                    echo $total_scholars;
                                } else {
                                    echo "Error executing the query";
                                }
                            }
                                
                                ?>
                            </h3>
                            <p>Total Scholars</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="modules/reports/List_of_scholar/index.php" class="btn-info" style="text-decoration:none">More info <i class="fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">

                <br>

                <div class="green">
                    <div class="p-2 bg-success rounded-3" style="height: 70px">
                        <div class="inner">
                            <h3>                        <?php 

                                    $USERID = $_SESSION['USERID'];
                                    $query = "SELECT staff_address FROM user_acc WHERE USERID = $USERID";
                                    $result = mysqli_query($connection, $query);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $staffLocation = $row['staff_address'];


                                    $query = "SELECT COUNT(*) as total FROM scholar_info WHERE program LIKE 'ODSP' AND `graduate` != 'yes' AND address LIKE '%$staffLocation%'";
                                    $result = mysqli_query($connection, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $total_scholars = $row['total'];
                                        echo $total_scholars;
                                    } else {
                                        echo "Error executing the query";
                                    }
                                    }

                               
                                ?></h3>
                            <p>ODSP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                                </div>
                    
                                <div class="">
                    
                                <br>
                                <div class="p-2 bg-success rounded-3" style="height: 70px; width: 230px; margin-right: 100px">
                        <div class="inner">
                            <h3>                        <?php 

                                    $USERID = $_SESSION['USERID'];
                                    $query = "SELECT staff_address FROM user_acc WHERE USERID = $USERID";
                                    $result = mysqli_query($connection, $query);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $staffLocation = $row['staff_address'];


                                    $query = "SELECT COUNT(*) as total FROM scholar_info WHERE program LIKE 'ODSP+' AND `graduate` != 'yes' AND address LIKE '%$staffLocation%'";
                                    $result = mysqli_query($connection, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $total_scholars = $row['total'];
                                        echo $total_scholars;
                                    } else {
                                        echo "Error executing the query";
                                    }
                                    }
                               
                                ?></h3>
                            <p>ODSP+</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                                </div>
                                </div>
                                <div class="col-lg-3 col-6 mb-3">
        

                <br>

                <div class="yellow">
                    <div class="p-2 bg-warning rounded-3" style="height: 70px">
                        <div class="inner">
                            <div class="fonts">
                                <h3><?php 



                                        $USERID = $_SESSION['USERID'];
                                        $query = "SELECT staff_address FROM user_acc WHERE USERID = $USERID";
                                        $result = mysqli_query($connection, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $staffLocation = $row['staff_address'];


                                        $query = "SELECT COUNT(*) as total FROM scholar_info WHERE program LIKE 'EDSP' AND `graduate` != 'yes' AND address LIKE '%$staffLocation%'";
                                        $result = mysqli_query($connection, $query);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $total_scholars = $row['total'];
                                            echo $total_scholars;
                                        } else {
                                            echo "Error executing the query";
                                        }
                                        }
                               
                                ?></h3>
                                <p>EDSP</p>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                                </div>
                    
                                <div class="">
                    <br>
                                <div class="p-2 bg-warning rounded-3" style="height: 70px; width: 230px; margin-right: 100px">
                        <div class="inner">
                            <div class="fonts">
                                <h3><?php 

                                        $USERID = $_SESSION['USERID'];
                                        $query = "SELECT staff_address FROM user_acc WHERE USERID = $USERID";
                                        $result = mysqli_query($connection, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $staffLocation = $row['staff_address'];


                                        $query = "SELECT COUNT(*) as total FROM scholar_info WHERE program LIKE 'EDSP+' AND `graduate` != 'yes' AND address LIKE '%$staffLocation%'";
                                        $result = mysqli_query($connection, $query);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $total_scholars = $row['total'];
                                            echo $total_scholars;
                                        } else {
                                            echo "Error executing the query";
                                        }
                                        }

                               
                                ?></h3>
                                <p>EDSP+</p>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                                </div>
                                </div>
                                <div class="col-lg-3 col-6 mb-3 ">
                
                <br>

                <div class="p-2 bg-danger rounded-3" style="height: 160px">
                    <div class="inner">
                        <br>
                        <h3>                        
                            <?php

                                $USERID = $_SESSION['USERID'];
                                $query = "SELECT staff_address FROM user_acc WHERE USERID = $USERID";
                                $result = mysqli_query($connection, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $staffLocation = $row['staff_address'];


                                $query = "SELECT COUNT(*) as total FROM scholar_info WHERE program LIKE 'ELAP' AND `graduate` != 'yes' AND scholar_region LIKE '%$staffLocation%'";
                                $result = mysqli_query($connection, $query);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $total_scholars = $row['total'];
                                    echo $total_scholars;
                                } else {
                                    echo "Error executing the query";
                                }
                                }
                                ?>
                                </h3>
                        <p>ELAP</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>