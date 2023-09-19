<?php
require_once 'includes/dbconfig.php';
$message='';
if(isset($_SESSION['user_id'])){
    header('location:index.php');
    exit();
}
//submit data
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $q = $conn->prepare("SELECT * FROM `users` WHERE `user_email`=? AND `user_password`=? ");
    $q->bindParam(1,$email);
    $q->bindParam(2,$password);
    $q->execute();
    $rows = $q->fetch();
    $count = $q->rowCount();
    if($count){
        $_SESSION['user_id'] = $rows['user_id'];
        $_SESSION['name'] = $rows['user_name'].' '.$rows['user_family'];
        $_SESSION['permission'] = $rows['user_permission'];
        if($rows['user_permission']=='admin'){
            header('location:admin/index.php?ok');
            exit();
        }
        else {
            header('location:index.php?ok');
            exit();
        }
    }
    else{
        header('location:login.php?op=error');
        exit();
    }
}
if(isset($_GET['op'])){
    switch($_GET['op']){
        case 'ok':
            $message = '<div class="alert alert-success text-right">ثبت نام با موفقیت انجام شد</div>';
            break;
        case 'error':
            $message = '<div class="alert alert-danger text-right">اطلاعات وارد شده صحیح نمی باشد.</div>';
            break;
    }
}
$title = 'ورود به سایت';
require_once 'includes/header.php';
?>


    <!--login form-->
    <div class="px-5 py-5 px-md-5 text-center text-lg-end">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-md-6 text-end p-3 mb-3">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="card shadow" id="form-r">
                                <div class="text-center">
                                    <h3 class="mt-4" style="color: #e15f41;">ورود به حساب</h3>
                                </div>
                                <div class="card-body px-md-4">
                                    <form action="" method="post">
                                        <div class="form-outline mb-4">
                                            <label class="form-label">:آدرس ایمیل</label>
                                            <input name="email" type="email" class="form-control text-start" placeholder="email@example.com" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label">:رمز عبور</label>
                                            <input name="password" type="password" id="form2Example2" class="form-control" />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7" style="direction: rtl; text-align: right;">
                                                <input class="form-check-input mt-2" type="checkbox">
                                                <label class="me-2" for="form2Example31">مرا به خاطر بسپار</label>
                                            </div>
                                            <div class="col-md-5">
                                                <a href="#">فراموشی رمز عبور؟</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="center mt-3">
                                                    <button name="submit" type="submit" class="btn btn-dark mb-4" style="width:150px;">ورود</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p>عضو نیستید؟ &nbsp; <a href="sign-up.php">ثبت نام</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <img src="images/Tablet login-pana.svg" class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>
