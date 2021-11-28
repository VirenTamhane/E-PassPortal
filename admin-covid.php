<?php include "Resource/db.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="Resource/CSS/style.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- sidebar -->
                    <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">

                        <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">
                            <h4>E-Pass</h4>
                        </a>
                        <div class="bottom-border pb-3">
                            
                            <a href="#" class="text-white">ADMIN</a>
                        </div>

                        <ul class="navbar-nav flex-column mt-4">
                            <li class="nav-item"><a href="admin.php" class="nav-link text-white p-3 mb-2 current"><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="collapse" data-target="#services"><i class="fas fa-user text-light fa-lg mr-3"></i>Applications<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="services" class="collapse">
                                    <li class="flex-column mt-2 bass">
                                        <a href="admin-interstate.php" class="text-white ml-5">Inter-State</a><br>
                                        <hr>
                                        <a href="admin-interdistrict.php" class="text-white ml-5">Inter-District</a>
                                        <hr>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="admin-search.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-search text-light fa-lg mr-3"></i>Search</a></li>

                            <li class="nav-item"><a href="admin-covid.php" class="nav-link text-white p-3 mb-2 sidebar-link" ><i class="fas fa-file text-light fa-lg mr-3"></i>Covid-19</a></li>

                            <li class="nav-item"><a href="admin-contact.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-phone text-light fa-lg mr-3"></i>Contact Us</a></li>

                        </ul>
                    </div>
                    <!-- end of sidebar -->

                    <!-- top-nav -->
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="text-light text-uppercase mb-0">Covid</h4>
                            </div>
                            <div class="col-md-2 ml-auto">
                                <ul class="navbar-nav">
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a></li>
                                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a></li>
                                    <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of top-nav -->
                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- modal -->
    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press logout to leave
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->
    
    <!-- Table -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-12 col-md-8 ml-auto">
                    <div class="row pt-md-5 mt-md-3 mb-5">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Patients</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
            <?php
                                
                                
                                    $query = "select * from covid19";
                                    $covid_connection = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($covid_connection)) {
                                        $state = $row['state'];
                                        $patient_count = $row['patient_count'];

                                        echo"<tr>";
                                            echo"<td>{$state}</td>";
                                            echo"<td>{$patient_count}</td>";
                                            ?>
                                            
                                            <td><form action="" method="post" enctype="multipart/form-data">
                                            
                                            <input type="text" name="patients">
                                            <input type="submit" name="submit" value="Edit" id="submit"></form></td>
                                            
                                            <?php
                                        echo"</tr>";
                                    }   
                                if(isset($_POST['submit'])) {
                                $patients = $_POST['patients'];
                                    
                                $query = "update covid19 set patient_count = {$patients} where state = '{$state}'";
                                $edit_query = mysqli_query($connection,$query);
                            }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!----------->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>
