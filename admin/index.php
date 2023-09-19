<?php
require_once "../includes/dbconfig.php";
if (!isset($_SESSION["permission"]) && $_SESSION["permission"] != 'admin') {
    header("location: ../index.php");
    exit();
}


//count of users
$allusers = "SELECT * FROM users";
$result_allusers = $conn->prepare($allusers);
$result_allusers->execute();
$usercount = $result_allusers->rowCount();

//count of tickets
$alltickets = "SELECT * FROM contact";
$result_alltickets = $conn->prepare($alltickets);
$result_alltickets->execute();
$ticketcount = $result_alltickets->rowCount();

?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <!-- js -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <!-- icon -->
    <script src="js/all.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 admin-menu text-center bg-light py-3">
            <?php
            include ("menu.php");
            ?>
        </div>
        <div class="col-10 admin-content text-right py-3">
            <h4>داشبورد کاربری</h4>
            <span class="text-muted">به پنل مدیریت خوش آمدید</span>
            <hr>
            <div class="row pb-4">
                <div class="col-6">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد کاربران</p>
                            <h4 class="font-weight-bold"><?=$usercount?></h4>
                            <span>نفر</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <p class="text-right">تعداد پیام ها</p>
                            <h4 class="font-weight-bold"><?=$ticketcount?></h4>
                            <span>مورد</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>