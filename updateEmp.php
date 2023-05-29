<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employee Registration Form</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block "></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Employee Update Form!</h1>
                            </div>
                            <form class="user" method="POST">

                                <?php
                                // connection file 
                                include 'connection.php';

                                $fetch_id_values = $_GET['UPDATEid'];

                                $select_data_update = " SELECT * FROM employeerecord WHERE ID = '$fetch_id_values' ";

                                $query_select_update = mysqli_query($con, $select_data_update);

                                $data_save = mysqli_fetch_array($query_select_update);

                                if (isset($_POST['btnLogin'])) {

                                    $id_fetch_update = $_GET['UPDATEid'];

                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $email = $_POST['email'];
                                    $pass = $_POST['pass'];
                                    $cPass = $_POST['cPass'];

                                    $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
                                    $cPass_hash = password_hash($cPass, PASSWORD_BCRYPT);

                                    $email_validate = " SELECT * FROM employeerecord Where Email = '$email' ";

                                    $query_validate_email = mysqli_query($con, $email_validate);

                                    $email_rows = mysqli_num_rows($query_validate_email);

                                    if ($email_rows > 1) {
                                ?>
                                        <script>
                                            alert('This Email is Already Registered')
                                        </script>
                                        <?php
                                    } else {
                                        if ($pass === $cPass) {

                                            $update_query = " UPDATE `employeerecord` SET `Fname`='$fname',`Lname`='$lname',`Email`='$email',`Password`='$pass',`Confirm Password`='$cPass' WHERE ID = '$id_fetch_update' ";

                                            $query_update = mysqli_query($con, $update_query);

                                            if ($update_query) {
                                        ?>
                                                <script>
                                                    alert('Data Updated SuccessFully')
                                                </script>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <script>
                                                alert('Password & Confirm Password Does Not Match')
                                            </script>
                                <?php
                                        }
                                    }
                                }

                                ?>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="fname" value="<?php echo $data_save['Fname'] ?>" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lname" value="<?php echo $data_save['Lname'] ?>" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" value="<?php echo $data_save['Email'] ?>" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="pass" value="<?php echo $data_save['Password'] ?>" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="cPass" value="<?php echo $data_save['Confirm Password'] ?>" placeholder="Repeat Password" required>
                                    </div>
                                </div>

                                <input type="submit" value="Update" class="btn btn-primary btn-user btn-block" name="btnLogin" id="">

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>