<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Form!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pass" placeholder="Password">
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="btnLogin" id="">

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
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

<!-- employees  -->

<?php
include 'connection.php';

if (isset($_POST['btnLogin'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $email_check_emp = " SELECT * FROM employeerecord WHERE Email = '$email' ";

    $email_query = mysqli_query($con, $email_check_emp);

    $email_row = mysqli_num_rows($email_query);

    if ($email_row) {

        $pass_email_match = mysqli_fetch_assoc($email_query);

        $pass_match_database = $pass_email_match['Password'];

        $_SESSION['uName'] = $pass_email_match['Fname'] . " " . $_SESSION['uName'] = $pass_email_match['Lname'];

        $pass_decode = password_verify($pass, $pass_match_database);

        if ($pass_decode) {
?>
            <script>
                alert('Login Done')

                location.replace('indexDashboard.php')
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Password Incorrect (1) ')
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('Email Incorrect (1) ')
        </script>
        <?php
    }

    #

    $email_check_stu = " SELECT * FROM studentrecord WHERE Email = '$email' ";

    $email_query_stu = mysqli_query($con, $email_check_stu);

    $email_row_stu  = mysqli_num_rows($email_query_stu);

    if ($email_row_stu) {

        $pass_email_match_stu = mysqli_fetch_assoc($email_query_stu);

        $pass_match_database_stu = $pass_email_match_stu['Password'];

        $_SESSION['uName'] = $pass_email_match_stu['Fname'] . " " . $_SESSION['uName'] = $pass_email_match_stu['Lname'];

        $pass_decode_stu  = password_verify($pass, $pass_match_database_stu);

        if ($pass_decode_stu) {
        ?>
            <script>
                alert('Login Done')

                location.replace('indexDashboardStu.php')
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Password Incorrect')
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('Email Incorrect ')
        </script>
<?php
    }
}
?>