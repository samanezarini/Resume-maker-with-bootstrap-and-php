<?php

require_once 'includes/dbconfig.php';
if(isset($_GET['id'])){
    $userid = intval($_GET['id']);
}
$users = $conn->query("SELECT *,(SELECT `name` FROM `area` WHERE `code`=`user_area`) as `user_area` FROM `users` WHERE `user_id`='$userid'");
$urows = $users->fetch();
$user_count = $users->rowCount();
$media = $conn->query("SELECT * FROM `socialmedia` WHERE `userid`='$userid'");
$mrows = $media->fetch();
$media_count = $media->rowCount();
$edu = $conn->query("SELECT * FROM `education` WHERE `userid`='$userid'");
$erows = $edu->fetch();
$edu_count = $edu->rowCount();
$jobs = $conn->query("SELECT * FROM `jobs` WHERE `userid`='$userid'");
$jrows = $jobs->fetch();
$jobs_count = $jobs->rowCount();
$lang = $conn->query("SELECT * FROM `language` WHERE `userid`='$userid'");
$lrows = $lang->fetch();
$langs_count = $lang->rowCount();
$expertise = $conn->query("SELECT * FROM `expertise` WHERE `userid`='$userid'");
$exrows = $expertise->fetch();
$ex_count = $expertise->rowCount();
$evidence = $conn->query("SELECT * FROM `evidence` WHERE `userid`='$userid'");
$evrows = $evidence->fetch();
$ev_count = $evidence->rowCount();
$projects = $conn->query("SELECT * FROM `projects` WHERE `userid`='$userid'");
$prorows = $projects->fetch();
$pro_count = $projects->rowCount();
$representative = $conn->query("SELECT * FROM `representative` WHERE `userid`='$userid'");
$reprows = $representative->fetch();
$rep_count = $representative->rowCount();
$honors = $conn->query("SELECT * FROM `honors` WHERE `userid`='$userid'");
$horows = $honors->fetch();
$honor_count = $honors->rowCount();
$research = $conn->query("SELECT * FROM `researches` WHERE `userid`='$userid'");
$resrows = $research->fetch();
$res_count = $research->rowCount();
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
$pdf->Write(0, 1, '', 0, 'R', true, 0, false, false, 0);
// کل محتوا اینجا به صورت کامل
$html = '<section>';

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
ob_end_flush()
?>
