<?php require_once "../includes/dbconfig.php";?>
<img src="img/user.png" class="img-fluid" alt="" width="50" height="50">
<h5 class="font-weight-bold pt-3"><?php echo $_SESSION['name']?></h5>
<hr>
<!-- Menu -->
<nav class="text-right">
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="index.php">داشبورد</a>
        <i class="fas fa-home"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="all-users.php">کاربران</a>
        <i class="fas fa-users"></i>
    </div>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="information.php">اطلاعات تماس</a>
        <i class="fas fa-phone"></i>
    </div>
    <ul class="nav nav-sidebar d-flex justify-content-between p-0" data-widget="treeview">
        <li class="nav-item"><a href="contact.php" class="nav-link px-0">پیام ها</a></li>
        <i class="fas fa-comments"></i>
    </ul>
    <div class="d-flex justify-content-between py-2">
        <a class="d-block" href="logout.php">خروج</a>
        <i class="fas fa-sign-out-alt "></i>
    </div>
</nav>