<?php
// Initialize the session
require_once "../resources/util.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: ../login/login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="./view-profile.php" class="btn btn-info">View Your Profile</a>
        <a href="./update-profile.php" class="btn btn-success">Update Your Profile</a>
        <a href="../login/change-password.php" class="btn btn-warning">Change Your Password</a>
        <a href="../login/logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        <a href="./index.html" class="btn btn-primary">Back to Main Page</a>
    </p>
    <p>
        <a href="../login/delete-account.php" class="btn btn-danger">DELETE Your Account</a>
    </p>
    <?php
        if (hasPermission($conn, "ADMINISTRATOR")) {
            echo '<a href="../admin/dashboard.php" class="btn btn-danger">Admin dashboard</a>';
        }
    ?>
</body>
</html>