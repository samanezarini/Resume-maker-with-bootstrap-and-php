
<?php
ob_start();
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
    <meta charset="utf-8" />
    <link href="Content/bootstrap.min.css" rel="stylesheet" />
    <link href="CSS/style-temp1.css" rel="stylesheet" />
</head>
<body>
<?php require 'tcpdf/tcpdf.php'; ?>
<?php
	$pdf = new TCPDF();
	// add a page
	$pdf->AddPage();
	// set font
	//فونت هاشو باید ببینی فونت خوب انتخاب کنی فعلا همین فونت فارسی رو ساپورت میکنه
	$pdf->SetFont('dejavusans', 'B', 20);
	//عنوان سایت و اینجا بزن
	// مقدار R رو برای راست چین گذاشتم
	$pdf->Write(0, $urows['user_name'].' '.$urows['user_family'], '', 0, 'R', true, 0, false, false, 0);
	// کل محتوا اینجا به صورت کامل
	$html = '<section>
        <div class="container rounded mt-5 mb-5 center">
            <div class="align-items-center bg-light shadow-lg" style="border-radius:25px; width: 1080px;">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div style="border-radius:25px;">
                                        <img src="images/users/'.$urows['user_pic'].'" alt="profile" class="img-thumbnail mt-3" width="180" height="180" style="margin-right:55px;" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h1 class="me-5" style="margin-top:19%;">'.$urows['user_name'].' '.$urows['user_family'].'</h1>
                                </div>
                                <div class="col-md-4">
                                    <h3 style="margin-top:22%;">'.$urows['user_job'].'</h3>
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
                                    <div class="pb-2 text-secondary">'.$urows['user_email'].'</div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="pb-2">تلفن:</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-2 text-secondary">'.$urows['user_phone'].'</div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="pb-2">آدرس:</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-2 text-secondary">'.$urows['user_country'].', '.$urows['name'].', '.$urows['user_city'].', '.$urows['user_address'].'</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h4 class="h4 mb-3 bg-info" style="width:95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/info.png" alt="contacts" style="width:25px; height:25px;" /> درباره من
                            </h4>
                            <p style="width: 585px; margin-right: 10px">'.$urows['user_resume'].'</p>
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
                                    <div class="pb-2 text-secondary" style="margin-right: -60px;">'.$urows['user_marital'].'</div>
                                </div>';
   if ($urows['user_sex'] == 'مرد'){ ?>
    <?php $html .= '<div class="col-sm-8">
                                    <div class="pb-2">وضعیت سربازی:</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="pb-2 text-secondary" style="margin-right: -60px;">'.$urows['user_military'].'</div>
                                </div>';
} ?>
<?php
$html .= '<div class="col-sm-4">
                                    <div class="pb-2">تاریخ تولد:</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="pb-2 text-secondary" style="margin-right: 30px;">'.$urows['user_birthday'].'</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/graduation.png" alt="contacts" style="width:25px; height:25px;" />سوابق تحصیلی
                            </h2>
                            <div class="row">';
?>
<?php
                                $x = json_decode($erows['ed_field'],true);
                                foreach ($x as $r){
                                $html .= '<div class="col-sm-9">
                                    <div class="pb-2 me-4">'.$r['edu_section'].'</div>
                                    <div class="pb-2 text-secondary me-4 mb-4">'.$r['edu_field'].'</div>
                                </div>
                                <div class="col-sm-3">
                                    <p>'.$r['edu_start'].'-'.$r['edu_end'].'</p>
                                </div>';
                                 }  ?>
<?php $html .= '</div>
                        </div>
                        <div class="col-md-4" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/language.png" alt="contacts" style="width:25px; height:25px;" />مهارت ها
                            </h4>
                            <div class="row">';
                                $i=0;
                                $x = json_decode($exrows['ex_data'],true);
                                foreach ($x as $r){ $i++;?>
<?php $html .= '<div class="col-md-3 mt-3">'.$r['ex_name'].'</div>
                                <div class="col-md-8 mt-3">
                                    <div class="col-md-5 progress" style="width: 100%; direction:ltr;">
                                        <div class="progress-bar bg-secondary" style="width:'.($r['ex_level']*20).'%">
                                            '.($r['ex_level']*20).'
                                        </div>
                                    </div>
                                </div>';
                                } ?>
 <?php $html .= '</div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/cv.png" alt="contacts" style="width:25px; height:25px;" />سوابق کاری
                            </h2>
                            <div class="row">';
                                $x = json_decode($jrows['j_data'],true);
                                foreach ($x as $r){?>
<?php $html .= '<div class="col-sm-9">
                                    <div class="pb-2 me-4">'.$r['job_title'].'</div>
                                    <div class="pb-2 text-secondary me-4 mb-4"><li>'.$r['job_place'].'</li></div>
                                </div>
                                <div class="col-sm-3">'; ?>
                                    <?php if($r['job_now']==1){
                                        $html .= '<p>مشغول کار</p>';
                                    }else{
                                        $html .= '<p>'.$r['job_syear'].' '.$r['job_eyear'].'</p>';
                                    } ?>
                                </div>
                                <?php } ?>
    <?php $html .= '</div>
                        </div>
                        <div class="col-md-4 mt-3" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/language.png" alt="contacts" style="width:25px; height:25px;" />زبان
                            </h4>';
                            $i=0;
                            $x = json_decode($lrows['l_data'],true);
                            foreach ($x as $r){ $i++;
                                $html .= '<div class="row">
                                <div class="col-md-3 mt-3">'.$r['lang_title'].'</div>
                                <div class="col-md-8 mt-3">
                                    <div class="col-md-5 progress" style="width: 100%; direction:ltr;">
                                        <div class="progress-bar bg-secondary" style="width:'.($r['lang_level']*20).'%">
                                            '.($r['lang_level']*20).'
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        $html .= '</div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/online-learning.png" alt="contacts" style="width:25px; height:25px;" />دوره های گذرانده شده
                            </h2>
                            <div class="row">';
                                $x = json_decode($evrows['evidence_data'],true);
                                foreach ($x as $r){
                                    $html .= '<div class="col-sm-9">
                                    <div class="pb-2 me-4">'.$r['evidence_name'].'</div>
                                    <div class="pb-2 text-secondary me-4 mb-4">'.$r['evidence_institute'].'</div>
                                </div>
                                <div class="col-sm-3">
                                    '.$r['evidence_year'].'
                                </div>';
                                }
                             $html .= '</div>
                        </div>
                        <div class="col-md-4 mt-3" style="padding: 0% 3% 0% 3%;">
                            <h4 class="bg-info" style="width:95%;">
                                <img class="mt-2 mb-2 ms-2" src="images/icon/social-media.png" alt="contacts" style="width:25px; height:25px;" />شبکه های اجتماعی
                            </h4>
                            <div class="row">';
                                $x = json_decode($mrows['s_data'],true);
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
                                    $html .= '<div class="col-sm-6">
                                    <div class="pb-2">
                                        <a href="https://'.$r['social_id'].'" class="btn btn-logo">
                                            <img src="images/icon/'.$icon.'" alt="'.$r['social_name'].'" style="height:20px; width:20px;" />'.$r['social_name'].'
                                        </a>
                                    </div>
                                </div>';
                                    }
                            $html .= '</div>
                        </div>
                        <div class="col-md-8 mt-3">
                            <h2 class="h4 mb-3 bg-info" style="width: 95%;">
                                <img class="mt-2 mb-2 ms-2 me-2" src="images/icon/skill-development.png" alt="contacts" style="width:26px; height:26px;" />پروژه های انجام شده
                            </h2>
                            <div style="line-height:1cm;">
                                <div class="row pb-2 me-4">';
                                    $x = json_decode($prorows['project_data'],true);
                                    foreach ($x as $r){
                                        $html .= '<div class="col-sm-6">
                                        <li>'.$r['project_name'].'</li>
                                    </div>';
                                     }
    $html .= '</div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>';

	// set UTF-8 Unicode font
	$pdf->SetFont('dejavusans', '', 10);

	// output the HTML content
	// مقدار R رو برای راست چین گذاشتم
	$pdf->writeHTML($html, true, 0, true, true,'R');

	// reset pointer to the last page
	$pdf->lastPage();

	// ---------------------------------------------------------

	//Close and output PDF document
	$pdf->Output(time().'.pdf','I');

	//============================================================+
	// END OF FILE
	//=====

?>
