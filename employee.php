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
                                <h1 class="h4 text-gray-900 mb-4">Employee Registration Form!</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="fname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="pass" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="cPass" placeholder="Repeat Password" required>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" name="btnSubmit" id="">

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


<?php
// connection file 
include 'connection.php';

if (isset($_POST['btnSubmit'])) {

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

    if ($email_rows > 0) {
?>
        <script>
            alert('This Email is Already Registered')
        </script>
        <?php
    } else {
        if ($pass === $cPass) {

            $insert_query = " INSERT INTO `employeerecord`(`Fname`, `Lname`, `Email`, `Password`, `Confirm Password`) VALUES ('$fname','$lname','$email','$pass_hash','$cPass_hash') ";

            $query_insert = mysqli_query($con, $insert_query);

            if ($insert_query) {
        ?>
                <script>
                    alert('Account Create SuccessFully')
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