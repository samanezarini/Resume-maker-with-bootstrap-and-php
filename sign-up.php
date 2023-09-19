<?php
require_once 'includes/dbconfig.php';
if(isset($_SESSION['user_id'])){
    header('location:index.php');
    exit();
}
$message='';
if(isset($_POST['submit'])){
    $now = time();
    $name = $_POST['name'];
    $family = $_POST['family'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $news = 0;
    if(isset($_POST['news'])){
        $news = 1;
    }

    $q = $conn->prepare("INSERT INTO `users` (`user_name`,`user_family`,`user_email`,`user_password`,`news`,`user_date`) VALUES (?,?,?,?,?,?)");
    $q->bindParam(1,$name);
    $q->bindParam(2,$family);
    $q->bindParam(3,$email);
    $q->bindParam(4,$password);
    $q->bindParam(5,$news);
    $q->bindParam(6,$now);
    if($q->execute()){
        header('location:login.php?ok');
        exit();
    }
    else{
        header('location:sing-up.php?error');
        exit();
    }
}
if(isset($_GET['error'])){
    $message = '<div class="alert alert-danger text-right">مشکلی در ثبت نام به وجود آمده است مجدد سعی نمایید</div>';
}
if(isset($_GET['cv'])){
    $message = '<div class="alert alert-danger text-right">جهت ساخت رزومه ابتدا ثبت نام نمایید</div>';
}
require_once 'includes/header.php';
?>

    <!--sign up form-->
    <div class="px-5 py-5 px-md-5 text-center text-lg-end">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-md-6 text-end p-3 mb-3">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <?=@$message?>
                            <div class="card shadow" id="form-r">
                                <div class="text-center">
                                    <h3 class="mt-4" style="color: #e15f41;">ثبت نام</h3>
                                </div>
                                <div class="card-body px-md-4">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label">:نام</label>
                                                    <input name="name" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label">:نام خانوادگی</label>
                                                    <input name="family" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">:آدرس ایمیل</label>
                                            <input dir="rtl" name="email" type="email" class="form-control  text-start" placeholder="email@example.com" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">:رمز عبور</label>
                                            <input name="password" type="password" class="form-control" />
                                        </div>
                                        <div class="col-md-9" style="direction: rtl; text-align: right;">
                                            <input class="form-check-input mt-2" type="checkbox">
                                            <label name="news" class="me-2" for="form2Example31">عضویت در خبرنامه ما</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="center mt-3">
                                                    <button name="submit" type="submit" class="btn btn-dark mb-4" style="width:150px;">ثبت نام</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p>قبلا در‌ رزومه سما رزومه ساخته اید؟ &nbsp; <a href="login.php">ورود</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <img src="images/Sign up-bro.svg" class="img-fluid" alt="Sample image" style="width:600px;"/>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>