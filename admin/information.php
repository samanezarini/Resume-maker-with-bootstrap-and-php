<?php
require_once "../includes/dbconfig.php";
if (!isset($_SESSION["permission"]) && $_SESSION["permission"] != 'admin') {
    header("location: ../index.php");
    exit();
}
$message='';
//get all data from information
$q = $conn->prepare("SELECT * FROM `information`");
$q->execute();
$rows = $q->fetch();
//update information
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];
	$instagram = $_POST['instagram'];
	$whatsapp = $_POST['whatsapp'];
	$telegram = $_POST['telegram'];
	$sql = "UPDATE `information` SET `email` = :email, `tel` = :tel, `mobile` = :mobile,`address` = :address, `instagram` = :instagram,`whatsapp`=:whatsapp,`telegram`=:telegram ";
	$query = $conn->prepare($sql);
    $query->bindParam(":email", $email);
    $query->bindParam(":tel", $tel);
    $query->bindParam(":mobile", $mobile);
    $query->bindParam(":address", $address);
    $query->bindParam(":instagram", $instagram);
    $query->bindParam(":whatsapp", $whatsapp);
    $query->bindParam(":telegram", $telegram);
    $query->execute();
    header('location:information.php?ok');
}
if(isset($_GET['ok'])){
    $message = '<div class="alert alert-success">اطلاعات با موفقیت بروز رسانی شد.</div>';
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
            <h4>اطلاعات تماس</h4>
            <hr>
            <?=$message?>
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-6">
                        <label>تلفن:</label>
                        <input type="text" name="tel" class="form-control" placeholder="تلفن" value="<?=$rows['tel']?>">
                    </div>
                    <div class="col-6">
                        <label>موبایل:</label>
                        <input type="text" class="form-control" placeholder="موبایل" value="<?=$rows['mobile']?>" name="mobile">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label>پست الکترونیک:</label>
                        <input type="text" class="form-control" placeholder="پست الکترونیک" value="<?=$rows['email']?>" name="email">
                    </div>
                    <div class="col-6">
                        <label>آدرس:</label>
                        <input type="text" class="form-control" placeholder="آدرس" value="<?=$rows['address']?>" name="address">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <label>آدرس واتس اپ:</label>
                        <input type="text" class="form-control" value="<?=$rows['whatsapp']?>" name="whatsapp">
                    </div>
                    <div class="col-4">
                        <label>آدرس اینستاگرام:</label>
                        <input type="text" class="form-control" value="<?=$rows['instagram']?>" name="instagram">
						</div>
                    <div class="col-4">
                        <label>آدرس تلگرام:</label>
                        <input type="text" class="form-control" value="<?=$rows['telegram']?>" name="telegram">
                    </div>
                </div>

                <div class="text-left">
                    <button type="submit" class="btn btn-success" name="submit">ویرایش اطلاعات</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>