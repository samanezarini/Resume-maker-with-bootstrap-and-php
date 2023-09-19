<?php
$info = $conn->query("SELECT * FROM `information`");
$info_rows = $info->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?=isset($title)?$title:'سایت رزومه ساز سما'?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="content/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link href="images/icon/logo.png" rel="icon" type="png" />
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-lg-top">
    <div class="container-fluid">
        <img class="img-fluid" src="images/cv-brand1.png" alt="logo" style="width: 3%; height:3%;">
        <a class="navbar-brand fw-bold" href="index.php">رزومه سما</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#my-nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="my-nav">
            <ul class="navbar-nav me-2 mb-lg-0" id="top-menu">
                <li class="nav-item">
                    <div class="nav-item">
                        <a class="nav-link fw-bold mt-2 mb-2" href="resume.php">ایجاد رزومه</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item">
                        <a class="nav-link fw-bold me-3 mt-2 mb-2" href="format.php">قالب ها</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item">
                        <a class="nav-link fw-bold me-3 mt-2 mb-2" href="resume-writing-guide.php">راهنمای نوشتن رزومه</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item">
                        <a class="nav-link fw-bold me-3 mt-2 mb-2" href="property.php">ویژگی ها</a>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="nav-item">
                        <a class="nav-link fw-bold me-3 mt-2 mb-2" href="faq.php">سوالات متداول</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item">
                        <a class="nav-link fw-bold me-3 mt-2 mb-2" href="contact-us.php">تماس باما</a>
                    </div>
                </li>
            </ul>
            <!--<span class="separator"></span>-->
            <div class="d-flex me-auto">
                <?php if(!isset($_SESSION['user_id'])){ ?>
                <a href="login.php"><button class="btn btn-outline-secondary ms-3 mt-2 mb-2" type="button" style="width: 100px;">ورود</button></a>
                <a href="sign-up.php" class="btn btn-reg1 ms-4 mt-2 mb-2" type="button" style="width: 100px;">ثبت نام</a>
                <?php }else{ ?>
                    <a target="_blank" href="template1.php?id=<?=$_SESSION['user_id']?>">
                        <button class="btn btn-reg1 ms-3 mt-2 mb-2" type="button" style="width: 100px;">رزومه من</button>
                    </a>
                    <a target="_blank" href="logout.php">
                        <button class="btn btn-danger ms-3 mt-2 mb-2" type="button" style="width: 100px;">خروج</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>