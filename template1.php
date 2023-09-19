<?php
require_once 'includes/dbconfig.php';
error_reporting(0);
if(isset($_GET['id'])){
    $userid = intval($_GET['id']);
}
else{
    header('location:index.php');
    exit();
}
//users
$users = $conn->query("SELECT *,(SELECT `name` FROM `area` WHERE `code`=`user_area`) as `user_area` FROM `users` WHERE `user_id`='$userid'");
$urows = $users->fetch();
$user_count = $users->rowCount();
//social media
$media = $conn->query("SELECT * FROM `socialmedia` WHERE `userid`='$userid'");
$mrows = $media->fetch();
$media_count = $media->rowCount();
//education
$edu = $conn->query("SELECT * FROM `education` WHERE `userid`='$userid'");
$erows = $edu->fetch();
$edu_count = $edu->rowCount();
//jobs
$jobs = $conn->query("SELECT * FROM `jobs` WHERE `userid`='$userid'");
$jrows = $jobs->fetch();
$jobs_count = $jobs->rowCount();
//language
$lang = $conn->query("SELECT * FROM `language` WHERE `userid`='$userid'");
$lrows = $lang->fetch();
$langs_count = $lang->rowCount();
//expertise
$expertise = $conn->query("SELECT * FROM `expertise` WHERE `userid`='$userid'");
$exrows = $expertise->fetch();
$ex_count = $expertise->rowCount();
//evidence
$evidence = $conn->query("SELECT * FROM `evidence` WHERE `userid`='$userid'");
$evrows = $evidence->fetch();
$ev_count = $evidence->rowCount();
//projects
$projects = $conn->query("SELECT * FROM `projects` WHERE `userid`='$userid'");
$prorows = $projects->fetch();
$pro_count = $projects->rowCount();
//representative
$representative = $conn->query("SELECT * FROM `representative` WHERE `userid`='$userid'");
$reprows = $representative->fetch();
$rep_count = $representative->rowCount();
//honors
$honors = $conn->query("SELECT * FROM `honors` WHERE `userid`='$userid'");
$horows = $honors->fetch();
$honor_count = $honors->rowCount();
//research
$research = $conn->query("SELECT * FROM `researches` WHERE `userid`='$userid'");
$resrows = $research->fetch();
$res_count = $research->rowCount();
//area
$area = $conn->query("SELECT * FROM `area` ORDER BY `name` ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>رزومه <?=$urows['user_name'].' '.$urows['user_family']?></title>
    <meta charset="utf-8" />
    <link href="Content/bootstrap.min.css" rel="stylesheet" />
    <link href="CSS/style-temp1.css" rel="stylesheet" />
</head>
<body >
    <section id="pdf">
        <div class="container rounded mt-5 mb-5 center">
            <div class="align-items-center bg-light shadow-lg" style="border-radius:25px; width: 1080px;">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div style="border-radius:25px;">
                                        <img src="images/users/<?=$urows['user_pic']?>" alt="profile" class="img-thumbnail mt-3" width="180" height="180" style="margin-right:55px;" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h1 class="me-5" style="margin-top:19%;"><?=$urows['user_name'].' '.$urows['user_family']?></h1>
                                </div>
                                <div class="col-md-4">
                                    <h3 style="margin-top:22%;"><?=$urows['user_job']?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/contact-mail.png" alt="contacts" style="width:25px; height:25px;" /> اطلاعات تماس
                            </h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="pb-2">ایمیل:</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-2 text-secondary"><?=$urows['user_email']?></div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="pb-2">تلفن:</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-2 text-secondary"><?=$urows['user_phone']?></div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="pb-2">آدرس:</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-2 text-secondary"><?=$urows['user_country']?>, <?=$urows['user_area']?>, <?=$urows['user_city']?>, <?=$urows['user_address']?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h4 class="h4 mb-3 bg-info" style="width:95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/info.png" alt="contacts" style="width:25px; height:25px;" /> درباره من
                            </h4>
                            <p style="width: 585px; margin-right: 10px"><?=nl2br($urows['user_resume'])?></p>
                        </div>
                        <div class="col-md-4 mt-3" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/info.png" alt="contacts" style="width:25px; height:25px;" />اطلاعات فردی
                            </h4>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="pb-2">وضعیت تاهل:</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="pb-2 text-secondary" style="margin-right: -60px;"><?=$urows['user_marital']?></div>
                                </div>
                                <?php if($urows['user_sex']=='مرد'){?>
                                <div class="col-sm-8">
                                    <div class="pb-2">وضعیت سربازی:</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="pb-2 text-secondary" style="margin-right: -60px;"><?=$urows['user_military']?></div>
                                </div>
                                <?php } ?>
                                <div class="col-sm-4">
                                    <div class="pb-2">تاریخ تولد:</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-2 text-secondary" style="margin-right: 30px;"><?=$urows['user_birthday']?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/graduation.png" alt="contacts" style="width:25px; height:25px;" />سوابق تحصیلی
                            </h2>
                            <div class="row">
                                <?php
                                $x = json_decode($erows['ed_field'],true);
                                if(is_array($x) || is_object($x)){
                                foreach ($x as $r){?>
                                <div class="col-sm-9">
                                    <div class="pb-2 me-4"><?=$r['edu_section']?></div>
                                    <div class="pb-2 text-secondary me-4 mb-4"><?=$r['edu_field']?></div>
                                </div>
                                <div class="col-sm-3">
                                    <p><?=$r['edu_start']?>-<?=$r['edu_end']?></p>
                                </div>
                                <?php } }?>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/language.png" alt="contacts" style="width:25px; height:25px;" />مهارت ها
                            </h4>
                            <div class="row">
                                <?php
                                $i=0;
                                $x = json_decode($exrows['ex_data'],true);
                                if(is_array($x) || is_object($x)){
                                foreach ($x as $r){ $i++;?>
                                <div class="col-md-3 mt-3"><?=$r['ex_name']?></div>
                                <div class="col-md-8 mt-3">
                                    <div class="col-md-5 progress" style="width: 100%; direction:ltr;">
                                        <div class="progress-bar <?=$i%2==0?'bg-secondary':'bg-danger'?>" style="width:<?=($r['ex_level']*20)?>%">
                                            <?=($r['ex_level']*20)?>
                                        </div>
                                    </div>
                                </div>
                                <?php } }?>
                            </div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/cv.png" alt="contacts" style="width:25px; height:25px;" />سوابق کاری
                            </h2>
                            <div class="row">
                                <?php
                                $x = json_decode($jrows['j_data'],true);
                                if(is_array($x) || is_object($x)){
                                foreach ($x as $r){?>
                                <div class="col-sm-9">
                                    <div class="pb-2 me-4"><?=$r['job_title']?></div>
                                    <div class="pb-2 text-secondary me-4 mb-4"><li><?=$r['job_place']?></li></div>
                                </div>
                                <div class="col-sm-3">
                                    <?php if($r['job_now']==1){ ?>
                                        <p>مشغول کار</p>
                                    <?php }else{ ?>
                                        <p><?=$r['job_syear']?><?=$r['job_eyear']?></p>
                                    <?php } ?>
                                </div>
                                <?php } }?>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/language.png" alt="contacts" style="width:25px; height:25px;" />زبان
                            </h4>
                            <?php
                            $i=0;
                            $x = json_decode($lrows['l_data'],true);
                            if(is_array($x) || is_object($x)){
                            foreach ($x as $r){ $i++;?>
                            <div class="row">
                                <div class="col-md-3 mt-3"><?=$r['lang_title']?></div>
                                <div class="col-md-8 mt-3">
                                    <div class="col-md-5 progress" style="width: 100%; direction:ltr;">
                                        <div class="progress-bar <?=$i%2==0?'bg-secondary':'bg-danger'?>" style="width:<?=($r['lang_level']*20)?>%">
                                            <?=($r['lang_level']*20)?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } }?>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/online-learning.png" alt="contacts" style="width:25px; height:25px;" />دوره های گذرانده شده
                            </h2>
                            <div class="row">
                                <?php
                                $x = json_decode($evrows['evidence_data'],true);
                                if(is_array($x) || is_object($x)){
                                foreach ($x as $r){?>
                                <div class="col-sm-9">
                                    <div class="pb-2 me-4"><?=$r['evidence_name']?></div>
                                    <div class="pb-2 text-secondary me-4 mb-4"><?=$r['evidence_institute']?></div>
                                </div>
                                <div class="col-sm-3">
                                    <?=$r['evidence_year']?>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info" style="width:95%;">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/social-media.png" alt="contacts" style="width:25px; height:25px;" />شبکه های اجتماعی
                            </h4>
                            <div class="row">
                                <?php
                                $x = json_decode($mrows['s_data'],true);
                                if(is_array($x) || is_object($x)){
                                foreach ($x as $r){
                                    switch($r['social_name']){
                                        case 'LinkedIn':
                                            $icon = 'logo-linkedin.svg';
                                            break;
                                        case 'Github':
                                            $icon = 'logo-github.svg';
                                            break;
                                        case 'Instagram':
                                            $icon = 'logo-instagram.svg';
                                            break;
                                        case 'Facebook':
                                            $icon = 'logo-facebook.svg';
                                            break;
                                        case 'Twitter':
                                            $icon = 'logo-twitter.svg';
                                            break;
                                        default:
                                            $icon = 'nopic.svg';
                                    }
                                    ?>
                                <div class="col-sm-6">
                                    <div class="pb-2">
                                        <a href="https://<?=$r['social_id']?>" class="btn btn-logo">
                                            <img src="images/icon/<?=$icon?>" alt="<?=$r['social_name']?>" style="height:20px; width:20px;" />
                                            <?=$r['social_name']?>
                                        </a>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/skill-development.png" alt="contacts" style="width:26px; height:26px;" />پروژه های انجام شده
                            </h2>
                            <div style="line-height:1cm;">
                                <div class="row pb-2 me-4">
                                    <?php
                                    $x = json_decode($prorows['project_data'],true);
                                    if(is_array($x) || is_object($x)){
                                    foreach ($x as $r){?>
                                    <div class="col-sm-6">
                                        <li><?=$r['project_name']?></li>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="center h3">
        <a href="resume.php" class="btn-resume btn btn-success mt-2 mb-5">ایجاد رزومه با این قالب</a>
    </div>
    <script src="Scripts/bootstrap.min.js"></script>
</body>
</html>
