<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Using MD5 for hashing the password

    // Query to check user credentials
    $sql = "SELECT * FROM tbladmin WHERE UserName=:username AND Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_OBJ);

    if ($user) {

   
        // Check if the account is active
        if ($user->Status == "1") {
            $_SESSION['userId'] = $user->ID; // Set session variable
            $_SESSION['user'] = $user; // Set session variable
            echo "<script>document.location = 'index.php';</script>";
        } else {
            echo "<script>
            alert('Your account is disabled. Please contact the administrator.');
            document.location = 'index.php';
            </script>";
        }
    } else {
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth p-0">
                <div class="row flex-grow">
                    <div class="col-md-4 p-0">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo" align="center">
                                <img class="img-avatar mb-3" src="assets/img/companyimages/logo.jpg" alt=""><br>
                                <h4 class="text-muted mt-4">
                                    Welcome Administrator!
                                </h4>
                            </div>
                            <form method="post">
                                <div class="form-group first">
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group last">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="login" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="forgot_password.php" class="text-secondary">Forgot Password</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="register.php" class="text-secondary">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 p-0">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1469371670807-013ccf25f16a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8ZXZlbnQlMjBkZWNvcmF0aW9ufGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://hire4event.com/blogs/wp-content/uploads/2019/03/Type-of-events.jpg" alt="Second slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php @include("includes/foot.php"); ?>
</body>

</html>