<?php
require_once "../includes/dbconfig.php";
if (!isset($_SESSION["permission"]) && $_SESSION["permission"] != 'admin') {
    header("location: ../index.php");
    exit();
}

$users = $conn->query("SELECT * FROM `users` ORDER BY `user_date`");

if(isset($_GET['delete']) && !empty($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = $conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $query->bindParam(':user_id', $id);
        $query->execute();
        $success = "کاربر مورد نظر حذف شد.";
    }
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
    <!-- js sweetalert2 -->
    <script src="js/sweetalert2@11.js"></script>
    <!-- icon -->
    <script src="js/all.js"></script>
</head>
<body>
<?php
if (isset($success)) {
    ?>
    <script>
        swal.fire({
            title: 'موفق',
            text: "<?php echo $success?>",
            icon: 'success',
            confirmButtonText: 'باشه'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "all-users.php";
            } else {
                window.location = "all-users.php";
            }
        })
    </script>
    <?php
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 admin-menu text-center bg-light py-3">
            <?php
            include("menu.php");
            ?>
        </div>
        <div class="col-10 admin-content text-right py-3">
            <h4>کل کاربران</h4>
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>کد</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>شماره تلفن</th>
                    <th>عنوان شغلی</th>
                    <th>دسترسی</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $id=1; while($rows = $users->fetch()){?>
                        <tr>
                            <td><?php echo $id++ ?></td>
                            <td><?php echo $rows['user_name'] ?></td>
                            <td><?php echo $rows['user_family'] ?></td>
                            <td><?php echo $rows['user_email'] ?></td>
                            <td><?php echo $rows['user_phone'] ?></td>
                            <td><?php echo $rows['user_job'] ?></td>
                            <td><?php
                                switch ($rows['user_permission']) {
                                    case NULL:
                                        echo "کاربر";
                                        break;
                                    case "admin":
                                        echo "ادمین";
                                        break;
                                } ?></td>
                            <td>
                                <?=$rows['user_permission']=='admin'?'-':'<a href="all-users.php?delete='.$rows['user_id'].'"
                                   class="btn btn-sm btn-danger">حذف</a>'?>
                            </td>

                        </tr>
                        <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>