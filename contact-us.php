<?php
require_once 'includes/dbconfig.php';

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $content = $_POST['content'];
    $now = time();
    $q = $conn->prepare("INSERT INTO `contact` (`name`,`email`,`phone`,`content`,`created_at`) VALUES (?,?,?,?,?)");
    $q->bindParam(1,$name);
    $q->bindParam(2,$email);
    $q->bindParam(3,$phone);
    $q->bindParam(4,$content);
    $q->bindParam(5,$now);
    if($q->execute()){
        header('location:contact-us.php?ok');
        exit();
    }
    else{
        header('location:contact-us.php?error');
        exit();
    }
}
if(isset($_GET['ok'])){
    $message = '<div class="alert alert-success">پیام شما با موفقیت ارسال شد</div>';
}
if(isset($_GET['error'])){
    $message = '<div class="alert alert-warning">مشکلی پیش آمده مجدد تلاش نمایید.</div>';
}
$title = 'تماس با ما';
require_once 'includes/header.php';
?>

    <!--about us-->
    <div class="py-5 px-md-5 text-center text-lg-end">
        <div class="center">
            <div class="row gx-lg-5 center">
                <div class="col-lg-12 mb-5 mb-lg-5">
                    <div class="card shadow">
                        <div class="text-center">
                            <h3 class="mt-3 mb-4" style="color: #e15f41;">درباره ما</h3>
                        </div>
                        <div class="me-5 ms-5 mb-5" id="text-about">
                            به وب سایت رزومه سما خوش آمدید. ما یک سایت آنلاین برای ساخت رزومه حرفه ای و جذاب هستیم.
                            هدف ما ارائه یک پلتفرم ساده و کارآمد برای افرادی است که به دنبال ساخت رزومه ای با کیفیت و حرفه ای هستند.
                            وب سایت رزومه به شما اجازه می دهد تا با استفاده از قالب های زیبا و حرفه ای، رزومه خود را بسازید. همچنین، شما می توانید اطلاعات شخصی، تحصیلات، تجربیات کاری، مهارت ها و دیگر اطلاعات مربوط به خود را به راحتی و با سرعت وارد کنید.
                            <br>
                            وب سایت رزومه سما با استفاده از تکنولوژی های پیشرفته، به شما اجازه می دهد تا رزومه خود را به صورت آنلاین به اشتراک بگذارید و به راحتی با کارفرمایان و شرکت های مختلف در ارتباط باشید.
                            رزومه ساز به صورتی طراحی شده که کاربر بسته به نیاز و توانمندی های خود بتواند براحتی رزومه دلخواه خود را ایجاد و با فرمت PDF ذخیره نماید.
                        </div>
                        <div class="center">
                            <img src="images/about.jpg" alt="about resume" class="mb-5 img-fluid rounded-3" style="width:800px; height:500px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--contact us-->
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 text-end p-3 mb-3">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <?=@$message?>
                                <div class="card shadow" id="form-r">
                                    <div class="text-center">
                                        <h3 class="mt-4" style="color: #e15f41;">تماس باما</h3>
                                    </div>
                                    <div class="card-body px-md-4">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">:نام</label>
                                                    <input name="name" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label text-end">:آدرس ایمیل</label>
                                                    <input name="email" type="email" class="form-control text-start" placeholder="email@example.com" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">:شماره تماس</label>
                                                    <input name="phone" type="tel" class="form-control text-start" placeholder="989123456789+" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="exampleFormControlTextarea1" class="form-label">:متن پیام</label>
                                                    <textarea name="content" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="center mt-3">
                                                        <button name="submit" type="submit" class="btn btn-dark mb-4" style="width:150px;">ارسال</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="px-2 py-2 px-md-2 text-lg-end">
                                    <div class="mb-4 mt-4">
                                        <p class="mt-3"></p>
                                        <p>اگر پیشنهاد، درخواست یا سوالی از ما دارید، خوشحال می‌شویم که با ما در میان بگذارید. برای ارتباط با ما، از طریق فرم تماس باما پیام خود را برای ما ارسال کنید. برای ارسال تصویر یا فایل می‌توانید پیام خود را در قالب ایمیل به آدرس <?=$info_rows['email']?> ارسال کنید.</p>
                                        <table>
                                            <tr></tr>
                                            <tr>
                                                <td>تلفن: &nbsp;</td>
                                                <td class="ms-3"><?=$info_rows['tel']?></td>
                                            </tr>
                                            <tr>
                                                <td>آدرس:</td>
                                                <td><?=$info_rows['address']?></td>
                                            </tr>
                                        </table>
                                        <div class="center">
                                            <img src="images/hello.svg" alt="Image" class="img-fluid" style="width: 400px; height: 400px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php' ?>