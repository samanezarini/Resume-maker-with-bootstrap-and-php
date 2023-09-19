<?php
require_once 'includes/dbconfig.php';
$message='';
$title = 'مدیریت رزومه';
require_once "includes/jdf.php";
error_reporting(0);
if (isset($_SESSION["user_id"])) {
    $userid = $_SESSION["user_id"];
    $sql = "SELECT * FROM users WHERE user_id = :user_id";
    $result = $conn->prepare($sql);
    $result->bindParam(':user_id', $userid);
    $result->execute();
    $rows = $result->fetch();
    $exbirth = explode('/',$rows['user_birthday']);
    $day = @$exbirth[2];
    $month = @$exbirth[1];
    $year = @$exbirth[0];
}
else{
    header('location:sign-up.php?cv');
}
$now = time();
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
//submit data
if(isset($_POST['submit'])){
    //personal information
    $name = $_POST['name'];
    $family = $_POST['family'];
    $job = $_POST['job'];
    $sex = $_POST['sex'];
    $marital = $_POST['marital'];
    $military = $_POST['military'];
    $birthday = $_POST['year'].'/'.$_POST['month'].'/'.$_POST['day'];
    //contact
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $site = $_POST['site'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    //resume
    $resume = $_POST['resume'];
    $personal = $conn->prepare("UPDATE `users` SET `user_name`=?,`user_family`=?,`user_job`=?,`user_sex`=?,`user_marital`=?,`user_birthday`=?,`user_email`=?,`user_phone`=?,`user_mobile`=?,`user_site`=?,`user_area`=?,`user_city`=?,`user_address`=?,`user_country`=?,`user_military`=?,`user_resume`=? WHERE `user_id`=?");
    $personal->bindParam(1,$name);
    $personal->bindParam(2,$family);
    $personal->bindParam(3,$job);
    $personal->bindParam(4,$sex);
    $personal->bindParam(5,$marital);
    $personal->bindParam(6,$birthday);
    $personal->bindParam(7,$email);
    $personal->bindParam(8,$phone);
    $personal->bindParam(9,$mobile);
    $personal->bindParam(10,$site);
    $personal->bindParam(11,$area);
    $personal->bindParam(12,$city);
    $personal->bindParam(13,$address);
    $personal->bindParam(14,$country);
    $personal->bindParam(15,$military);
    $personal->bindParam(16,$resume);
    $personal->bindParam(17,$userid);
    $personal->execute();
    //social media

    if(isset($_POST['social_name'])) {
            $count = count($_POST['social_name']);
            $social_data = '';
            for($i=0;$i<$count;$i++){
                if($_POST['social_name'][$i]!='') {
                    $social_data[$i] = [
                        'social_name' => $_POST['social_name'][$i],
                        'social_id' => $_POST['social_id'][$i]
                    ];
                }
            }
            $sdata = json_encode($social_data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            if ($media_count) {
                $social = $conn->prepare("UPDATE `socialmedia` SET `s_data`=? WHERE `userid`=?");
            } else {
                $social = $conn->prepare("INSERT INTO `socialmedia` (`s_data`,`userid`) VALUES (?,?)");
            }
            $social->bindParam(1, $sdata);
            $social->bindParam(2, $userid);
            $social->execute();
    }
    //education
    if(isset($_POST['section'])){
        $count = count($_POST['section']);
        $edudata = '';
        for($i=0;$i<$count;$i++){
            if($_POST['section'][$i]!='') {
                $edudata[$i] = [
                    'edu_section' => $_POST['section'][$i],
                    'edu_field' => $_POST['field'][$i],
                    'edu_name' => $_POST['edname'][$i],
                    'edu_orination' => $_POST['orination'][$i],
                    'edu_type' => $_POST['edtype'][$i],
                    'edu_avrage' => $_POST['edavrage'][$i],
                    'edu_country' => $_POST['edcountry'][$i],
                    'edu_area' => $_POST['edarea'][$i],
                    'edu_city' => $_POST['edcity'][$i],
                    'edu_start' => $_POST['edstart'][$i],
                    'edu_end' => $_POST['edend'][$i],
                ];
            }
        }
        $edata = json_encode($edudata,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($edu_count){
            $edu = $conn->prepare("UPDATE `education` SET `ed_field`=? WHERE `userid`=?");
        }
        else {
            $edu = $conn->prepare("INSERT INTO `education` (`ed_field`,`userid`) VALUES (?,?)");
        }
            $edu->bindParam(1,$edata);
            $edu->bindParam(2,$userid);
            $edu->execute();
    }
    //jobs
    if(isset($_POST['job_title'])){
        $count = count($_POST['job_title']);
        $jobdata = '';
        for($i=0;$i<$count;$i++){
            if($_POST['job_title'][$i]!='') {
                $jobdata[$i] = [
                    'job_title' => $_POST['job_title'][$i],
                    'job_place' => $_POST['job_place'][$i],
                    'job_country' => $_POST['job_country'][$i],
                    'job_area' => $_POST['job_area'][$i],
                    'job_city' => $_POST['job_city'][$i],
                    'job_smonth' => $_POST['job_smonth'][$i],
                    'job_syear' => $_POST['job_syear'][$i],
                    'job_emonth' => $_POST['job_emonth'][$i],
                    'job_eyear' => $_POST['job_eyear'][$i],
                    'job_now' => isset($_POST['job_now'][$i]) ? 1 : 0,
                ];
            }
        }
        $xx = json_encode($jobdata,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($jobs_count) {
            $jq = $conn->prepare("UPDATE `jobs` SET `j_data`=? WHERE `userid`=?");
        }
        else {
            $jq = $conn->prepare("INSERT INTO `jobs` (`j_data`,`userid`) VALUES (?,?)");
        }
            $jq->bindParam(1,$xx);
            $jq->bindParam(2,$userid);
            $jq->execute();
    }
    //language
    if(!empty($_POST['lang_name'])){
        $count = count($_POST['lang_name']);
        $langdata = '';
        for($i=0;$i<$count;$i++){
            if($_POST['lang_name'][$i]!='') {
                $langdata[$i] = [
                    'lang_title' => $_POST['lang_name'][$i],
                    'lang_level' => $_POST['lang_level'][$i]
                ];
            }
        }
        $ldata = json_encode($langdata,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($langs_count){
            $lq = $conn->prepare("UPDATE `language` SET `l_data`=? WHERE `userid`=?");
        }
        else {
            $lq = $conn->prepare("INSERT INTO `language` (`l_data`,`userid`) VALUES (?,?)");
        }
            $lq->bindParam(1,$ldata);
            $lq->bindParam(2,$userid);
            $lq->execute();
    }
    //expertice
    if(!empty($_POST['ex_name']) && !empty($_POST['ex_level'])){
        $count = count($_POST['ex_name']);
        $exdata = '';
        for($i=0;$i<$count;$i++){
            if($_POST['ex_name'][$i]!='' && $_POST['ex_level'][$i]!='') {
                $exdata[$i] = [
                    'ex_name' => $_POST['ex_name'][$i],
                    'ex_level' => $_POST['ex_level'][$i]
                ];
            }
        }
        $edata = json_encode($exdata,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($ex_count){
            $eq = $conn->prepare("UPDATE `expertise` SET `ex_data`=? WHERE `userid`=?");
        }
        else {
            $eq = $conn->prepare("INSERT INTO `expertise` (`ex_data`,`userid`) VALUES (?,?)");
        }
            $eq->bindParam(1,$edata);
            $eq->bindParam(2,$userid);
            $eq->execute();
    }
    //evidence
    if(!empty($_POST['evidence_name'])){
        $count = count($_POST['evidence_name']);
        $evidata = '';
        for($i=0;$i<$count;$i++){
            if($_POST['evidence_name'][$i]!='') {
                $evidata[$i] = [
                    'evidence_name' => $_POST['evidence_name'][$i],
                    'evidence_institute' => $_POST['evidence_institute'][$i],
                    'evidence_month' => $_POST['evidence_month'][$i],
                    'evidence_year' => $_POST['evidence_year'][$i],
                ];
            }
        }
        $evdata = json_encode($evidata,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($ev_count){
            $eq = $conn->prepare("UPDATE `evidence` SET `evidence_data`=? WHERE `userid`=?");
        }
        else {
            $eq = $conn->prepare("INSERT INTO `evidence` (`evidence_data`,`userid`) VALUES (?,?)");
        }
        $eq->bindParam(1,$evdata);
        $eq->bindParam(2,$userid);
        $eq->execute();
    }
    //project
    if(!empty($_POST['project_name'])){
        $count = count($_POST['project_name']);
        $prodata = '';
        for($i=0;$i<$count;$i++){
            if($_POST['project_name'][$i]!='') {
                $prodata[$i] = [
                    'project_name' => $_POST['project_name'][$i],
                    'project_employer' => $_POST['project_employer'][$i],
                    'project_link' => $_POST['project_link'][$i],
                    'project_month' => $_POST['project_month'][$i],
                    'project_year' => $_POST['project_year'][$i],
                    'project_desc' => $_POST['project_desc'][$i],
                ];
            }
        }
        $pdata = json_encode($prodata,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($pro_count){
            $eq = $conn->prepare("UPDATE `projects` SET `project_data`=? WHERE `userid`=?");
        }
        else {
            $eq = $conn->prepare("INSERT INTO `projects` (`project_data`,`userid`) VALUES (?,?)");
        }
        $eq->bindParam(1,$pdata);
        $eq->bindParam(2,$userid);
        $eq->execute();
    }
    //research
    if(!empty($_POST['research_name'])){
        $count = count($_POST['research_name']);
        $res_data = '';
        for($i=0;$i<$count;$i++){
            if($_POST['research_name'][$i]!='') {
                $res_data[$i] = [
                    'research_name' => $_POST['research_name'][$i],
                    'research_publisher' => $_POST['research_publisher'][$i],
                    'research_link' => $_POST['research_link'][$i],
                    'research_month' => $_POST['research_month'][$i],
                    'research_year' => $_POST['research_year'][$i],
                    'research_desc' => $_POST['research_desc'][$i],
                ];
            }
        }
        $rsdata = json_encode($res_data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($res_count){
            $eq = $conn->prepare("UPDATE `researches` SET `research_data`=? WHERE `userid`=?");
        }
        else {
            $eq = $conn->prepare("INSERT INTO `researches` (`research_data`,`userid`) VALUES (?,?)");
        }
        $eq->bindParam(1,$rsdata);
        $eq->bindParam(2,$userid);
        $eq->execute();
    }
    //honor
    if(!empty($_POST['honor_name'])){
        $count = count($_POST['honor_name']);
        $honor_data = '';
        for($i=0;$i<$count;$i++){
            if($_POST['honor_name'][$i]!='') {
                $honor_data[$i] = [
                    'honor_name' => $_POST['honor_name'][$i],
                    'honor_month' => $_POST['honor_month'][$i],
                    'honor_year' => $_POST['honor_year'][$i],
                    'honor_link' => $_POST['honor_link'][$i],
                ];
            }
        }
        $hdata = json_encode($honor_data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($honor_count){
            $eq = $conn->prepare("UPDATE `honors` SET `honor_data`=? WHERE `userid`=?");
        }
        else {
            $eq = $conn->prepare("INSERT INTO `honors` (`honor_data`,`userid`) VALUES (?,?)");
        }
        $eq->bindParam(1,$hdata);
        $eq->bindParam(2,$userid);
        $eq->execute();
    }
    //representative
    if(!empty($_POST['rep_name'])){
        $count = count($_POST['rep_name']);
        $rep_data = '';
        for($i=0;$i<$count;$i++){
            if($_POST['rep_name'][$i]) {
                $rep_data[$i] = [
                    'rep_name' => $_POST['rep_name'][$i],
                    'rep_org' => $_POST['rep_org'][$i],
                    'rep_email' => $_POST['rep_email'][$i],
                    'rep_tel' => $_POST['rep_tel'][$i],
                ];
            }
        }
        $rpdata = json_encode($rep_data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        if($rep_count){
            $eq = $conn->prepare("UPDATE `representative` SET `rep_data`=? WHERE `userid`=?");
        }
        else {
            $eq = $conn->prepare("INSERT INTO `representative` (`rep_data`,`userid`) VALUES (?,?)");
        }
        $eq->bindParam(1,$rpdata);
        $eq->bindParam(2,$userid);
        $eq->execute();
    }
    header('location:resume.php?op=submited');
}
require_once 'includes/header.php';
?>
<form action="" method="post" id="msform" accept-charset="UTF-8">
    <nav class="mt-5 mb-5">
        <div class="container col-lg-12 text-center rounded-3" style="background-color: #eff8ff;">
            <div class="row" style="height:60px;">
                <ul id="progressbar">
                    <li class="active" id="account"><strong>اطلاعات پایه</strong></li>
                    <li id="education"><strong>سوابق تحصیلی</strong></li>
                    <li id="jobs"><strong>سوابق شغلی</strong></li>
                    <li id="expertice"><strong>مهارت ها</strong></li>
                    <li id="project"><strong>پروژه ها</strong></li>
                    <li id="research"><strong>تحقیقات</strong></li>
                    <li id="confirm"><strong>سایر</strong></li>
                </ul>
            </div>
        </div>
    </nav>

    <fieldset>
        <div class="form-card">
    <!--form info based-->
    <div class="container">
        <div class="row align-items-center center">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <p class="me-1">اطلاعات پایه</p>
                <div class="card shadow" id="form-r">
                        <div class="card-body py-5 px-md-5">
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <span id="preview"><img class="w-50 rounded-circle img-thumbnail" <?=$rows['user_pic']==''?'src="images/user.png"':'src="images/users/'.$rows['user_pic'].'"'?>></span>
                                    <input class="btn btn-success choose-file" type="file" name="file" id="file">
                                    <label for="file" class="upload-file"><i class="fa fa-upload"></i></label>

                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:نام</label>
                                        <input name="name" type="text" class="form-control" value="<?=$rows['user_name']?>" />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:نام خانوادگی</label>
                                        <input name="family" type="text" class="form-control" value="<?=$rows['user_family']?>" />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:عنوان شغلی</label>
                                        <input name="job" type="text" class="form-control" value="<?=$rows['user_job']?>" />
                                    </div>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <label class="form-label">:جنسیت</label>
                                    <select name="sex" class="form-select">
                                        <option selected>انتخاب کنید</option>
                                        <option value="زن" <?=$rows['user_sex']=='زن'?'selected':''?>>زن</option>
                                        <option value="مرد" <?=$rows['user_sex']=='مرد'?'selected':''?>>مرد</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <label class="form-label">:وضعیت تاهل</label>
                                    <select name="marital" class="form-select" aria-label="Default select example">
                                        <option selected>انتخاب کنید</option>
                                        <option <?=$rows['user_marital']=='مجرد'?'selected':''?> value="مجرد">مجرد</option>
                                        <option <?=$rows['user_marital']=='متاهل'?'selected':''?> value="متاهل">متاهل</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <label class="form-label">:سربازی</label>
                                    <select name="military" class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option <?=$rows['user_military']=='مشمول'?'selected':''?> value="مشمول">مشمول</option>
                                        <option <?=$rows['user_military']=='در حال خدمت'?'selected':''?>  value="در حال خدمت">در حال خدمت</option>
                                        <option <?=$rows['user_military']=='پایان خدمت'?'selected':''?>  value="پایان خدمت">پایان خدمت</option>
                                        <option <?=$rows['user_military']=='معاف'?'selected':''?>  value="معاف">معاف</option>
                                        <option <?=$rows['user_military']=='معافیت تحصیلی'?'selected':''?>  value="معافیت تحصیلی">معافیت تحصیلی</option>
                                        <option <?=$rows['user_military']=='معافیت غیرپزشکی'?'selected':''?>  value="معافیت غیرپزشکی">معافیت غیرپزشکی</option>
                                        <option <?=$rows['user_military']=='معافیت پزشکی'?'selected':''?>  value="معافیت پزشکی">معافیت پزشکی</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <label class="form-label">:تاریخ تولد</label>
                                    <select name="day" class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option <?=$day==1?'selected':''?>>1</option>
                                        <option <?=$day==2?'selected':''?>>2</option>
                                        <option <?=$day==3?'selected':''?>>3</option>
                                        <option <?=$day==4?'selected':''?>>4</option>
                                        <option <?=$day==5?'selected':''?>>5</option>
                                        <option <?=$day==6?'selected':''?>>6</option>
                                        <option <?=$day==7?'selected':''?>>7</option>
                                        <option <?=$day==8?'selected':''?>>8</option>
                                        <option <?=$day==9?'selected':''?>>9</option>
                                        <option <?=$day==10?'selected':''?>>10</option>
                                        <option <?=$day==11?'selected':''?>>11</option>
                                        <option <?=$day==12?'selected':''?>>12</option>
                                        <option <?=$day==13?'selected':''?>>13</option>
                                        <option <?=$day==14?'selected':''?>>14</option>
                                        <option <?=$day==15?'selected':''?>>15</option>
                                        <option <?=$day==16?'selected':''?>>16</option>
                                        <option <?=$day==17?'selected':''?>>17</option>
                                        <option <?=$day==18?'selected':''?>>18</option>
                                        <option <?=$day==19?'selected':''?>>19</option>
                                        <option <?=$day==20?'selected':''?>>20</option>
                                        <option <?=$day==21?'selected':''?> >21</option>
                                        <option <?=$day==22?'selected':''?>>22</option>
                                        <option <?=$day==23?'selected':''?>>23</option>
                                        <option <?=$day==24?'selected':''?>>24</option>
                                        <option <?=$day==25?'selected':''?>>25</option>
                                        <option <?=$day==26?'selected':''?>>26</option>
                                        <option <?=$day==27?'selected':''?>>27</option>
                                        <option <?=$day==28?'selected':''?>>28</option>
                                        <option <?=$day==29?'selected':''?>>29</option>
                                        <option <?=$day==30?'selected':''?>>30</option>
                                        <option <?=$day==31?'selected':''?>>31</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <label class="form-label"></label>
                                    <select name="month" class="form-select mt-2" aria-label="Default select example">
                                        <option selected></option>
                                        <option <?=$month==1?'selected':''?> value="1">فروردین</option>
                                        <option <?=$month==2?'selected':''?> value="2">اردیبهشت</option>
                                        <option <?=$month==3?'selected':''?> value="3">خرداد</option>
                                        <option <?=$month==4?'selected':''?> value="4">تیر</option>
                                        <option <?=$month==5?'selected':''?> value="5">مرداد</option>
                                        <option <?=$month==6?'selected':''?> value="6">شهریور</option>
                                        <option <?=$month==7?'selected':''?> value="7">مهر</option>
                                        <option <?=$month==8?'selected':''?> value="8">آبان</option>
                                        <option <?=$month==9?'selected':''?> value="9">آذر</option>
                                        <option <?=$month==10?'selected':''?> value="10">دی</option>
                                        <option <?=$month==11?'selected':''?> value="11">بهمن</option>
                                        <option <?=$month==12?'selected':''?> value="12">اسفند</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-4">
                                    <div class="form-outline mt-2">
                                        <label class="form-label"></label>
                                        <input name="year" value="<?=$year?>" type="text" class="form-control" placeholder="سال" />
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!--form info contact-->
    <div class="container">
        <div class="row align-items-center center mb-5">
            <div class="col-lg-12 mb-5 mb-lg-0 ">
                <p class="mt-5 me-1">اطلاعات تماس</p>
                <div class="card shadow" id="form-r">
                        <div class="card-body py-5 px-md-5">
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:ایمیل</label>
                                        <input name="email" value="<?=$rows['user_email']?>" type="text" class="form-control text-start" placeholder="email@example.com" />
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:موبایل</label>
                                        <input name="mobile" value="<?=$rows['user_mobile']?>" type="text" class="form-control text-start" placeholder="98+" />
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:تلفن</label>
                                        <input name="phone" type="text" value="<?=$rows['user_phone']?>" class="form-control text-start" />
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="form-label">:وب سایت</label>
                                    <input name="site" value="<?=$rows['user_site']?>" type="text" class="form-control text-start" placeholder=".www" />
                                </div>
                                <div class="col-md-2 mb-4">
                                    <label class="form-label">:کشور</label>
                                    <input name="country" value="<?=$rows['user_country']?>" type="text" class="form-control text-start" />
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:استان</label>
                                        <select name="area" class="form-select" aria-label="Default select example">
                                            <option value="" selected>انتخاب کنید</option>
                                            <?php while($area_rows = $area->fetch()){ ?>
                                                <option <?=$rows['user_area']==$area_rows['code']?'selected':''?> value="<?=$area_rows['code']?>"><?=$area_rows['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:شهر</label>
                                        <input value="<?=$rows['user_city']?>" name="city" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">:آدرس</label>
                                        <input value="<?=$rows['user_address']?>" name="address" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!--form Social Networks-->

    <div class="container">
        <div class="row align-items-center center mb-5">
            <div class="col-lg-12 mb-5 mb-lg-0 ">
                <p class="mt-5 me-1">شبکه های اجتماعی</p>
                <div class="card shadow" id="form-r">
                        <div class="card-body py-5 px-md-5">
                            <div class="row">
                            <?php

                            $s_rows = json_decode($mrows['s_data']==''?json_encode([1]):$mrows['s_data'],true);
                            foreach ($s_rows as $r){ ?>
                                <div class="col-md-3">
                                    <div class="form-outline">
                                        <label class="form-label">:شبکه اجتماعی</label>
                                        <select name="social_name[]" class="form-select">
                                            <option selected></option>
                                            <option <?=$r['social_name']=='LinkedIn'?'SELECTED':''?>  value="LinkedIn">LinkedIn</option>
                                            <option <?=$r['social_name']=='Twitter'?'SELECTED':''?> value="Twitter">Twitter</option>
                                            <option <?=$r['social_name']=='Facebook'?'SELECTED':''?> value="Facebook">Facebook</option>
                                            <option <?=$r['social_name']=='Instagram'?'SELECTED':''?> value="Instagram">Instagram</option>
                                            <option <?=$r['social_name']=='Telegram'?'SELECTED':''?> value="Telegram">Telegram</option>
                                            <option <?=$r['social_name']=='Github'?'SELECTED':''?> value="Github">Github</option>
                                            <option <?=$r['social_name']=='Dribbble'?'SELECTED':''?> value="Dribbble">Dribble</option>
                                            <option <?=$r['social_name']=='WhatsApp'?'SELECTED':''?> value="WhatsApp">Whatsapp</option>
                                            <option <?=$r['social_name']=='Skype'?'SELECTED':''?> value="Skype">Skype</option>
                                            <option <?=$r['social_name']=='Youtube'?'SELECTED':''?> value="Youtube">Youtube</option>
                                            <option <?=$r['social_name']=='Stackoverflow'?'SELECTED':''?> value="Stackoverflow">StackOverflow</option>
                                            <option <?=$r['social_name']=='ResearchGate'?'SELECTED':''?> value="ResearchGate">ResearchGate</option>
                                            <option <?=$r['social_name']=='Figma'?'SELECTED':''?> value="Figma">Figma</option>
                                            <option <?=$r['social_name']=='Pinterest'?'SELECTED':''?> value="Pinterest">Pinterest</option>
                                            <option <?=$r['social_name']=='Gitlab'?'SELECTED':''?> value="Gitlab">Gitlab</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 socialrow">
                                    <div class="form-outline">
                                        <label class="form-label">:آیدی مرتبط</label>
                                        <input value="<?=$r['social_id']?>" name="social_id[]" type="text" class="form-control text-start" />
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-3">
                                    <div class="form-outline">
                                        <label class="form-label">:شبکه اجتماعی</label>
                                        <select name="social_name[]" class="form-select">
                                            <option selected></option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Telegram">Telegram</option>
                                            <option value="Github">Github</option>
                                            <option value="Dribbble">Dribble</option>
                                            <option value="WhatsApp">Whatsapp</option>
                                            <option value="Skype">Skype</option>
                                            <option value="Youtube">Youtube</option>
                                            <option value="Stackoverflow">StackOverflow</option>
                                            <option value="ResearchGate">ResearchGate</option>
                                            <option value="Figma">Figma</option>
                                            <option value="Pinterest">Pinterest</option>
                                            <option value="Gitlab">Gitlab</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 socialrow">
                                    <div class="form-outline">
                                        <label class="form-label">:آیدی مرتبط</label>
                                        <input name="social_id[]" type="text" class="form-control text-start" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 text-center" style="margin-top: 31px;">
                                <a id="social" class="social btn mt-2">
                                    <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>

            <!--resume!-->
            <div class="container">
                <div class="row align-items-center center mb-5">
                    <div class="col-lg-12 mb-5 mb-lg-0 ">
                        <p class="mt-5 me-1">خلاصه رزومه</p>
                        <div class="card shadow" id="form-r">
                            <div class="card-body py-5 px-md-5">
                                <div class="row">
                                    <textarea rows="10" name="resume" class="form-control"><?=$rows['user_resume']?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>

    <!--btn next-->
    <a class="next btn btn-primary mt-5  mb-4 text-center" href="#" style="width:120px; height:50px;">
        <p class="mt-0 text-white">بعدی</p>
    </a>
    </fieldset>
    <fieldset>
        <div class="form-card">
        <!--form educational -->
        <div class="container">
            <div class="row align-items-center center">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <p class="me-1">سوابق تحصیلی</p>
                    <div class="card shadow" id="form-r">
                        <?php
                        $e_rows = json_decode($erows['ed_field']==''?json_encode([1]):$erows['ed_field'],true);
                        foreach ($e_rows as $r){ ?>
                            <div class="card-body py-5 px-md-5">
                                <div class="row">
                                    <div class="col-md-2 mb-4">
                                        <label class="form-label">:مقطع</label>
                                        <select name="section[]" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                            <option <?=$r['edu_section']=='زیر دیپلم'?'SELECTED':''?> value="زیر دیپلم">زیر دیپلم</option>
                                            <option <?=$r['edu_section']=='دیپلم'?'SELECTED':''?> value="دیپلم">دیپلم</option>
                                            <option <?=$r['edu_section']=='کاردانی'?'SELECTED':''?> value="کاردانی">کاردانی</option>
                                            <option <?=$r['edu_section']=='کارشناسی'?'SELECTED':''?> value="کارشناسی">کارشناسی</option>
                                            <option <?=$r['edu_section']=='کارشناسی ارشد'?'SELECTED':''?> value="کارشناسی ارشد">کارشناسی ارشد</option>
                                            <option <?=$r['edu_section']=='دکتری'?'SELECTED':''?> value="دکتری">دکتری</option>
                                            <option <?=$r['edu_section']=='فوق دکتری'?'SELECTED':''?> value="فوق دکتری">فوق دکتری</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">:رشته تحصیلی</label>
                                            <input value="<?=$r['edu_field']?>" name="field[]" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <label class="form-label">:گرایش/تخصص</label>
                                        <input value="<?=$r['edu_orination']?>" name="orination[]" type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <label class="form-label">:نوع موسسه</label>
                                        <select name="edtype[]" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                            <option <?=$r['edu_type']=='دولتی'?'SELECTED':''?> value="دولتی">دولتی</option>
                                            <option <?=$r['edu_type']=='تیزهوشان'?'SELECTED':''?> value="تیزهوشان">تیزهوشان</option>
                                            <option <?=$r['edu_type']=='غیرانتفاعی'?'SELECTED':''?> value="غیرانتفاعی">غیرانتفاعی</option>
                                            <option <?=$r['edu_type']=='نمونه دولتی'?'SELECTED':''?> value="نمونه دولتی">نمونه دولتی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <label class="form-label">:موسسه آموزشی</label>
                                        <input value="<?=$r['edu_name']?>" name="edname[]" type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <label class="form-label">:معدل</label>
                                        <input value="<?=$r['edu_avrage']?>" name="edavrage[]" type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">:کشور</label>
                                            <input value="<?=$r['edu_country']?>" name="edcountry[]" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">:استان</label>
                                            <select name="edarea[]" class="form-select" aria-label="Default select example">
                                                <option value="" selected>انتخاب کنید</option>
                                                <option <?=$r['edu_area']=='اردبیل'?'SELECTED':''?> value="اردبیل">اردبیل</option>
                                                <option <?=$r['edu_area']=='اصفهان'?'SELECTED':''?> value="اصفهان">اصفهان</option>
                                                <option <?=$r['edu_area']=='البرز'?'SELECTED':''?> value="البرز">البرز</option>
                                                <option <?=$r['edu_area']=='ایلام'?'SELECTED':''?> value="ایلام">ایلام</option>
                                                <option <?=$r['edu_area']=='آذربایجان شرقی'?'SELECTED':''?> value="آذربایجان شرقی">آذربایجان شرقی</option>
                                                <option <?=$r['edu_area']=='آذربایجان غربی'?'SELECTED':''?> value="آذربایجان غربی">آذربایجان غربی</option>
                                                <option <?=$r['edu_area']=='بوشهر'?'SELECTED':''?> value="بوشهر">بوشهر</option>
                                                <option <?=$r['edu_area']=='تهران'?'SELECTED':''?> value="تهران">تهران</option>
                                                <option <?=$r['edu_area']=='چهار محال و بختیاری'?'SELECTED':''?> value="چهار محال و بختیاری">چهار محال و بختیاری</option>
                                                <option <?=$r['edu_area']=='خراسان جنوبی'?'SELECTED':''?> value="خراسان جنوبی">خراسان جنوبی</option>
                                                <option <?=$r['edu_area']=='خراسان رضوی'?'SELECTED':''?> value="خراسان رضوی">خراسان رضوی</option>
                                                <option <?=$r['edu_area']=='خراسان شمالی'?'SELECTED':''?> value="خراسان شمالی">خراسان شمالی</option>
                                                <option <?=$r['edu_area']=='خوزستان'?'SELECTED':''?> value="خوزستان">خوزستان</option>
                                                <option <?=$r['edu_area']=='زنجان'?'SELECTED':''?> value="زنجان">زنجان</option>
                                                <option <?=$r['edu_area']=='سمنان'?'SELECTED':''?> value="سمنان">سمنان</option>
                                                <option <?=$r['edu_area']=='سیستان و بلوچستان'?'SELECTED':''?> value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                                                <option <?=$r['edu_area']=='فارس'?'SELECTED':''?> value="فارس">فارس</option>
                                                <option <?=$r['edu_area']=='قزوین'?'SELECTED':''?> value="قزوین">قزوین</option>
                                                <option <?=$r['edu_area']=='قم'?'SELECTED':''?> value="قم">قم</option>
                                                <option <?=$r['edu_area']=='کردستان'?'SELECTED':''?> value="کردستان">کردستان</option>
                                                <option <?=$r['edu_area']=='کرمان'?'SELECTED':''?> value="کرمان">کرمان</option>
                                                <option <?=$r['edu_area']=='کرمانشاه'?'SELECTED':''?> value="کرمانشاه">کرمانشاه</option>
                                                <option <?=$r['edu_area']=='کهگیلویه و بویراحمد'?'SELECTED':''?> value="کهگیلویه و بویراحمد">کهگیلویه و بویراحمد</option>
                                                <option <?=$r['edu_area']=='گلستان'?'SELECTED':''?> value="گلستان">گلستان</option>
                                                <option <?=$r['edu_area']=='گیلان'?'SELECTED':''?> value="گیلان">گیلان</option>
                                                <option <?=$r['edu_area']=='لرستان'?'SELECTED':''?> value="لرستان">لرستان</option>
                                                <option <?=$r['edu_area']=='مازندران'?'SELECTED':''?> value="مازندران">مازندران</option>
                                                <option <?=$r['edu_area']=='مرکزی'?'SELECTED':''?> value="مرکزی">مرکزی</option>
                                                <option <?=$r['edu_area']=='هرمزگان'?'SELECTED':''?> value="هرمزگان">هرمزگان</option>
                                                <option <?=$r['edu_area']=='همدان'?'SELECTED':''?> value="همدان">همدان</option>
                                                <option <?=$r['edu_area']=='یزد'?'SELECTED':''?> value="یزد">یزد</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">:شهر</label>
                                            <input value="<?=$r['edu_city']?>" name="edcity[]" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label">:ورود</label>
                                            <input value="<?=$r['edu_start']?>" name="edstart[]" type="text" class="form-control" placeholder="سال" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-4 edrows">
                                        <div class="form-outline">
                                            <label class="form-label">:فراغت از تحصیل</label>
                                            <input value="<?=$r['edu_end']?>" name="edend[]" type="text" class="form-control" placeholder="سال" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-1" style="margin-top:45px;">
                        <a id="edadd" class="btn">
                            <img src="images/plus.png" alt="plus" style="width:30px; height:30px; color:red;" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--btn next-->
        <a class="previous btn btn-primary mt-5 mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
            <p class="mt-0 text-white">قبلی</p>
        <a class="next btn btn-primary mt-5  mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
                <p class="mt-0 text-white">بعدی</p>
        </a>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <!--form job -->
            <div class="container">
                <div class="row align-items-center center">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <p class="me-1">سوابق شغلی</p>
                        <div class="card shadow" id="form-r">
                        <?php
                        $j_rows = json_decode($jrows['j_data']==''?json_encode([1]):$jrows['j_data'],true);
                        foreach ($j_rows as $r){ ?>
                                <div class="card-body py-5 px-md-5">
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:سِمت شغلی مربوطه</label>
                                                <input value="<?=$r['job_title']?>" name="job_title[]" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:عنوان محل کار</label>
                                                <input value="<?=$r['job_place']?>" name="job_place[]" type="text" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:کشور</label>
                                                <input value="<?=$r['job_country']?>"  name="job_country[]" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:استان</label>
                                                <select name="job_area" class="form-select">
                                                    <option value="" selected>انتخاب کنید</option>
                                                    <option <?=$r['job_area']=='اردبیل'?'SELECTED':''?> value="اردبیل">اردبیل</option>
                                                    <option <?=$r['job_area']=='اصفهان'?'SELECTED':''?> value="اصفهان">اصفهان</option>
                                                    <option <?=$r['job_area']=='البرز'?'SELECTED':''?> value="البرز">البرز</option>
                                                    <option <?=$r['job_area']=='ایلام'?'SELECTED':''?> value="ایلام">ایلام</option>
                                                    <option <?=$r['job_area']=='آذربایجان شرقی'?'SELECTED':''?> value="آذربایجان شرقی">آذربایجان شرقی</option>
                                                    <option <?=$r['job_area']=='آذربایجان غربی'?'SELECTED':''?> value="آذربایجان غربی">آذربایجان غربی</option>
                                                    <option <?=$r['job_area']=='بوشهر'?'SELECTED':''?> value="بوشهر">بوشهر</option>
                                                    <option <?=$r['job_area']=='تهران'?'SELECTED':''?> value="تهران">تهران</option>
                                                    <option <?=$r['job_area']=='چهار محال و بختیاری'?'SELECTED':''?> value="چهار محال و بختیاری">چهار محال و بختیاری</option>
                                                    <option <?=$r['job_area']=='خراسان جنوبی'?'SELECTED':''?> value="خراسان جنوبی">خراسان جنوبی</option>
                                                    <option <?=$r['job_area']=='خراسان رضوی'?'SELECTED':''?> value="خراسان رضوی">خراسان رضوی</option>
                                                    <option <?=$r['job_area']=='خراسان شمالی'?'SELECTED':''?> value="خراسان شمالی">خراسان شمالی</option>
                                                    <option <?=$r['job_area']=='خوزستان'?'SELECTED':''?> value="خوزستان">خوزستان</option>
                                                    <option <?=$r['job_area']=='زنجان'?'SELECTED':''?> value="زنجان">زنجان</option>
                                                    <option <?=$r['job_area']=='سمنان'?'SELECTED':''?> value="سمنان">سمنان</option>
                                                    <option <?=$r['job_area']=='سیستان و بلوچستان'?'SELECTED':''?> value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                                                    <option <?=$r['job_area']=='فارس'?'SELECTED':''?> value="فارس">فارس</option>
                                                    <option <?=$r['job_area']=='قزوین'?'SELECTED':''?> value="قزوین">قزوین</option>
                                                    <option <?=$r['job_area']=='قم'?'SELECTED':''?> value="قم">قم</option>
                                                    <option <?=$r['job_area']=='کردستان'?'SELECTED':''?> value="کردستان">کردستان</option>
                                                    <option <?=$r['job_area']=='کرمان'?'SELECTED':''?> value="کرمان">کرمان</option>
                                                    <option <?=$r['job_area']=='کرمانشاه'?'SELECTED':''?> value="کرمانشاه">کرمانشاه</option>
                                                    <option <?=$r['job_area']=='کهگیلویه و بویراحمد'?'SELECTED':''?> value="کهگیلویه و بویراحمد">کهگیلویه و بویراحمد</option>
                                                    <option <?=$r['job_area']=='گلستان'?'SELECTED':''?> value="گلستان">گلستان</option>
                                                    <option <?=$r['job_area']=='گیلان'?'SELECTED':''?> value="گیلان">گیلان</option>
                                                    <option <?=$r['job_area']=='لرستان'?'SELECTED':''?> value="لرستان">لرستان</option>
                                                    <option <?=$r['job_area']=='مازندران'?'SELECTED':''?> value="مازندران">مازندران</option>
                                                    <option <?=$r['job_area']=='مرکزی'?'SELECTED':''?> value="مرکزی">مرکزی</option>
                                                    <option <?=$r['job_area']=='هرمزگان'?'SELECTED':''?> value="هرمزگان">هرمزگان</option>
                                                    <option <?=$r['job_area']=='همدان'?'SELECTED':''?> value="همدان">همدان</option>
                                                    <option <?=$r['job_area']=='یزد'?'SELECTED':''?> value="یزد">یزد</option>
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:شهر</label>
                                                <input value="<?=$r['job_city']?>"  name="job_city[]" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <label class="form-label">:شروع</label>
                                            <select name="job_smonth[]" class="form-select" aria-label="Default select example">
                                                <option value="" selected=""></option>
                                                <option <?=$r['job_smonth']==1?'selected':''?> value="1">فروردین</option>
                                                <option <?=$r['job_smonth']==2?'selected':''?> value="2">اردیبهشت</option>
                                                <option <?=$r['job_smonth']==3?'selected':''?> value="3">خرداد</option>
                                                <option <?=$r['job_smonth']==4?'selected':''?> value="4">تیر</option>
                                                <option <?=$r['job_smonth']==5?'selected':''?> value="5">مرداد</option>
                                                <option <?=$r['job_smonth']==6?'selected':''?> value="6">شهریور</option>
                                                <option <?=$r['job_smonth']==7?'selected':''?> value="7">مهر</option>
                                                <option <?=$r['job_smonth']==8?'selected':''?> value="8">آبان</option>
                                                <option <?=$r['job_smonth']==9?'selected':''?> value="9">آذر</option>
                                                <option <?=$r['job_smonth']==10?'selected':''?> value="10">دی</option>
                                                <option <?=$r['job_smonth']==11?'selected':''?> value="11">بهمن</option>
                                                <option <?=$r['job_smonth']==12?'selected':''?> value="12">اسفند</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 mb-4">
                                            <label class="form-label"></label>
                                            <input value="<?=$r['job_syear']?>" name="job_syear[]" type="text" class="form-control mt-2" placeholder="سال" />
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <label class="form-label">:اتمام</label>
                                            <select name="job_emonth[]" class="form-select" aria-label="Default select example">
                                                <option value="" selected=""></option>
                                                <option <?=$r['job_emonth']==1?'selected':''?> value="1">فروردین</option>
                                                <option <?=$r['job_emonth']==2?'selected':''?> value="2">اردیبهشت</option>
                                                <option <?=$r['job_emonth']==3?'selected':''?> value="3">خرداد</option>
                                                <option <?=$r['job_emonth']==4?'selected':''?> value="4">تیر</option>
                                                <option <?=$r['job_emonth']==5?'selected':''?> value="5">مرداد</option>
                                                <option <?=$r['job_emonth']==6?'selected':''?> value="6">شهریور</option>
                                                <option <?=$r['job_emonth']==7?'selected':''?> value="7">مهر</option>
                                                <option <?=$r['job_emonth']==8?'selected':''?> value="8">آبان</option>
                                                <option <?=$r['job_emonth']==9?'selected':''?> value="9">آذر</option>
                                                <option <?=$r['job_emonth']==10?'selected':''?> value="10">دی</option>
                                                <option <?=$r['job_emonth']==11?'selected':''?> value="11">بهمن</option>
                                                <option <?=$r['job_emonth']==12?'selected':''?> value="12">اسفند</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 mb-4">
                                            <label class="form-label "></label>
                                            <input value="<?=$r['job_eyear']?>" name="job_eyear[]" type="text" class="form-control mt-2" placeholder="سال"/>
                                        </div>
                                        <div class="col-md-2 mt-5 jobrows" style="direction: rtl; text-align: right;">
                                            <input <?=$r['job_now']==1?'checked':''?> name="job_now[]" type="checkbox">
                                            <label class="me-2 mb-3">مشغول فعالیت هستم</label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-1 text-center">
                                <a id="jobadd" class="btn ms-5" style="margin-top:45px;">
                                    <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="previous btn btn-primary mt-5 mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
            <p class="mt-0 text-white">قبلی</p>
        <a class="next btn btn-primary mt-5  mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
            <p class="mt-0 text-white">بعدی</p>
        </a>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <!--form language -->
            <div class="container">
                <div class="row align-items-center center">
                    <p class="me-1">زبان</p>
                    <?php
                    $l_rows = json_decode($lrows['l_data']==''?json_encode([1]):$lrows['l_data'],true);
                    foreach ($l_rows as $r){ ?>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card shadow" id="form-r">
                                <div class="card-body py-5 px-md-5">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:نام زبان</label>
                                                <select name="lang_name[]" class="form-select" aria-label="Default select example">
                                                    <option value=""></option>
                                                    <option <?=$r['lang_title']=='انگلیسی'?'SELECTED':''; ?> value="انگلیسی">انگلیسی</option>
                                                    <option <?=$r['lang_title']=='عربی'?'SELECTED':'';?> value="عربی">عربی</option>
                                                    <option <?=$r['lang_title']=='آلمانی'?'SELECTED':'';?> value="آلمانی">آلمانی</option>
                                                    <option <?=$r['lang_title']=='فرانسوی'?'SELECTED':'';?> value="فرانسوی">فرانسوی</option>
                                                    <option <?=$r['lang_title']=='اسپانیایی'?'SELECTED':''?> value="اسپانیایی">اسپانیایی</option>
                                                    <option <?=$r['lang_title']=='روسی'?'SELECTED':''?> value="روسی">روسی</option>
                                                    <option <?=$r['lang_title']=='ایتالیایی'?'SELECTED':''?> value="ایتالیایی">ایتالیایی</option>
                                                    <option <?=$r['lang_title']=='ترکی استانبولی'?'SELECTED':''?> value="ترکی استانبولی">ترکی استانبولی</option>
                                                    <option <?=$r['lang_title']=='فارسی'?'SELECTED':'' ?> value="فارسی">فارسی</option>
                                                    <option <?=$r['lang_title']=='چینی'?'SELECTED':'' ?> value="چینی">چینی</option>
                                                    <option <?=$r['lang_title']=='عبری'?'SELECTED':''?> value="عبری">عبری</option>
                                                    <option <?=$r['lang_title']=='ترکی آذربایجانی'?'SELECTED':''?> value="ترکی آذربایجانی">ترکی آذربایجانی</option>
                                                    <option <?=$r['lang_title']=='ارمنی'?'SELECTED':''?> value="ارمنی">ارمنی</option>
                                                    <option <?=$r['lang_title']=='ژاپنی'?'SELECTED':''?> value="ژاپنی">ژاپنی</option>
                                                    <option <?=$r['lang_title']=='گرجی'?'SELECTED':'' ?> value="گرجی">گرجی</option>
                                                    <option <?=$r['lang_title']=='کُردی'?'SELECTED':'' ?> value="کُردی">کُردی</option>
                                                    <option <?=$r['lang_title']=='فنلاندی'?'SELECTED':'' ?> value="فنلاندی">فنلاندی</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:سطح</label>
                                                <select name="lang_level[]" class="form-select" aria-label="Default select example">
                                                    <option value=""></option>
                                                    <option selected=""></option>
                                                    <option <?=$r['lang_level']=='1'?'SELECTED':'' ?> value="1">مبتدی</option>
                                                    <option <?=$r['lang_level']=='2'?'SELECTED':'' ?> value="2">آشنایی نسبی</option>
                                                    <option <?=$r['lang_level']=='3'?'SELECTED':'' ?> value="3">متوسط</option>
                                                    <option <?=$r['lang_level']=='4'?'SELECTED':'' ?> value="4">پیشرفته</option>
                                                    <option <?=$r['lang_level']=='5'?'SELECTED':'' ?> value="5"> مسلط </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <?php } ?>
                    <div class="col-lg-6 mb-5 mb-lg-0 py-3 langrows">
                        <div class="card shadow" id="form-r">
                                <div class="card-body py-5 px-md-5">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:نام زبان</label>
                                                <select name="lang_name[]" class="form-select" aria-label="Default select example">
                                                    <option value=""></option>
                                                    <option value="انگلیسی">انگلیسی</option>
                                                    <option value="عربی">عربی</option>
                                                    <option value="آلمانی">آلمانی</option>
                                                    <option value="فرانسوی">فرانسوی</option>
                                                    <option value="اسپانیایی">اسپانیایی</option>
                                                    <option value="روسی">روسی</option>
                                                    <option value="ایتالیایی">ایتالیایی</option>
                                                    <option value="ترکی استانبولی">ترکی استانبولی</option>
                                                    <option value="فارسی">فارسی</option>
                                                    <option value="چینی">چینی</option>
                                                    <option value="عبری">عبری</option>
                                                    <option value="ترکی آذربایجانی">ترکی آذربایجانی</option>
                                                    <option value="ارمنی">ارمنی</option>
                                                    <option value="ژاپنی">ژاپنی</option>
                                                    <option value="گرجی">گرجی</option>
                                                    <option value="کُردی">کُردی</option>
                                                    <option value="فنلاندی">فنلاندی</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:سطح</label>
                                                <select name="lang_level[]" class="form-select" aria-label="Default select example">
                                                    <option value=""></option>
                                                    <option selected=""></option>
                                                    <option value="1">مبتدی</option>
                                                    <option value="2">آشنایی نسبی</option>
                                                    <option value="3">متوسط</option>
                                                    <option value="4">پیشرفته</option>
                                                    <option value="5"> مسلط </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 42px;">
                        <a id="langadd" class="btn" onclick="">
                            <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                        </a>
                    </div>
                </div>
            </div>

            <!--form skils-->
            <div class="container mt-5">
                <div class="row align-items-center center">
                <p class="me-1">مهارت‌ها</p>
                <?php
                $e_rows = json_decode($exrows['ex_data']==''?json_encode([1]):$exrows['ex_data'],true);
                foreach ($e_rows as $r){ ?>
                    <div class="col-lg-6 mb-5 mb-lg-0 py-3">
                        <div class="card shadow" id="form-r">
                                <div class="card-body py-5 px-md-5">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:نام مهارت</label>
                                                <input value="<?=$r['ex_name']?>" name="ex_name[]" type="text" class="form-control mt-2" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label">:سطح</label>
                                                <select name="ex_level[]" class="form-select" aria-label="Default select example">
                                                    <option value="" selected>انتخاب کنید</option>
                                                    <option <?=$r['ex_level']==1?'SELECTED':''?> value="1">مبتدی</option>
                                                    <option <?=$r['ex_level']==2?'SELECTED':''?> value="2">آشنایی نسبی</option>
                                                    <option <?=$r['ex_level']==3?'SELECTED':''?> value="3">متوسط</option>
                                                    <option <?=$r['ex_level']==4?'SELECTED':''?> value="4">پیشرفته</option>
                                                    <option <?=$r['ex_level']==5?'SELECTED':''?> value="5"> مسلط </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-6 mb-5 mb-lg-0 py-3 exrows">
                        <div class="card shadow" id="form-r">
                                <div class="card-body py-5 px-md-5">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:نام مهارت</label>
                                                <input name="ex_name[]"type="text" class="form-control mt-2" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-4 mt-2">
                                            <label class="form-label">:سطح</label>
                                            <select name="ex_level[]" class="form-select" aria-label="Default select example">
                                                <option value="" selected>انتخاب کنید</option>
                                                <option value="1">مبتدی</option>
                                                <option value="2">آشنایی نسبی</option>
                                                <option value="3">متوسط</option>
                                                <option value="4">پیشرفته</option>
                                                <option value="5"> مسلط </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 50px;">
                        <a id="exadd" class="btn">
                            <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                        </a>
                    </div>
                </div>
            </div>


            <!--form Courses and certificates-->
            <div class="container">
                <div class="row align-items-center center">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <p class="me-1 mt-5">گواهینامه ها</p>
                        <div class="card shadow " id="form-r">
                            <?php
                            $rows = json_decode($evrows['evidence_data']==''?json_encode([1]):$evrows['evidence_data'],true);
                            foreach ($rows as $r){ ?>
                                <div class="card-body py-5 px-md-5 evirows">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:عنوان</label>
                                                <input value="<?=$r['evidence_name']?>" name="evidence_name[]" type="text" class="form-control mt-2"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 mt-2">
                                            <label class="form-label">:موسسه</label>
                                            <input value="<?=$r['evidence_institute']?>" name="evidence_institute[]" type="text" class="form-control mt-2" placeholder="" />
                                        </div>
                                        <div class="col-md-3 mb-4 mt-3">
                                            <label class="form-label">:تاریخ</label>
                                            <select name="evidence_month[]" class="form-select" aria-label="Default select example">
                                                <option value="" selected=""></option>
                                                <option <?=$r['evidence_month']==1?'selected':''?> value="1">فروردین</option>
                                                <option <?=$r['evidence_month']==2?'selected':''?> value="2">اردیبهشت</option>
                                                <option <?=$r['evidence_month']==3?'selected':''?> value="3">خرداد</option>
                                                <option <?=$r['evidence_month']==4?'selected':''?> value="4">تیر</option>
                                                <option <?=$r['evidence_month']==5?'selected':''?> value="5">مرداد</option>
                                                <option <?=$r['evidence_month']==6?'selected':''?> value="6">شهریور</option>
                                                <option <?=$r['evidence_month']==7?'selected':''?> value="7">مهر</option>
                                                <option <?=$r['evidence_month']==8?'selected':''?> value="8">آبان</option>
                                                <option <?=$r['evidence_month']==9?'selected':''?> value="9">آذر</option>
                                                <option <?=$r['evidence_month']==10?'selected':''?> value="10">دی</option>
                                                <option <?=$r['evidence_month']==11?'selected':''?> value="11">بهمن</option>
                                                <option <?=$r['evidence_month']==12?'selected':''?> value="12">اسفند</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb-4 mt-3">
                                            <label class="form-label"></label>
                                            <input value="<?=$r['evidence_year']?>" name="evidence_year[]" type="text" class="form-control mt-2" placeholder="سال" />
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6" style="margin-top: 60px;">
                            <a id="eviadd" class="btn">
                                <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="previous btn btn-primary mt-5 mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
            <p class="mt-0 text-white">قبلی</p>
            <a class="next btn btn-primary mt-5  mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
                <p class="mt-0 text-white">بعدی</p>
            </a>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <!--form project -->
            <div class="container">
                <div class="row align-items-center center">
                    <p class="me-1">پروژه‌ها</p>
                    <div class="col-lg-12 mb-5 mb-lg-0 py-3">
                        <div class="card shadow" id="form-r">
                            <?php
                            $rows = json_decode($prorows['project_data']==''?json_encode([1]):$prorows['project_data'],true);
                            foreach ($rows as $r){ ?>
                                <div class="card-body py-5 px-md-5 prorows">
                                    <div class="row">
                                        <div class="col-md-7 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:عنوان</label>
                                                <input value="<?=$r['project_name']?>" name="project_name[]" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-4">
                                            <label class="form-label">:کارفرما/درخواست کننده</label>
                                            <input value="<?=$r['project_employer']?>" name="project_employer[]" type="text" class="form-control" />
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <label class="form-label">:لینک مرتبط </label>
                                            <input value="<?=$r['project_link']?>" name="project_link[]"type="text" class="form-control text-start" />
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:تاریخ</label>
                                                <select name="project_month[]" class="form-select" aria-label="Default select example">
                                                    <option value="" selected>انتخاب کنید</option>
                                                    <option <?=$r['project_month']==1?'selected':''?> value="1">فروردین</option>
                                                    <option <?=$r['project_month']==2?'selected':''?> value="2">اردیبهشت</option>
                                                    <option <?=$r['project_month']==3?'selected':''?> value="3">خرداد</option>
                                                    <option <?=$r['project_month']==4?'selected':''?> value="4">تیر</option>
                                                    <option <?=$r['project_month']==5?'selected':''?> value="5">مرداد</option>
                                                    <option <?=$r['project_month']==6?'selected':''?> value="6">شهریور</option>
                                                    <option <?=$r['project_month']==7?'selected':''?> value="7">مهر</option>
                                                    <option <?=$r['project_month']==8?'selected':''?> value="8">آبان</option>
                                                    <option <?=$r['project_month']==9?'selected':''?> value="9">آذر</option>
                                                    <option <?=$r['project_month']==10?'selected':''?> value="10">دی</option>
                                                    <option <?=$r['project_month']==11?'selected':''?> value="11">بهمن</option>
                                                    <option <?=$r['project_month']==12?'selected':''?> value="12">اسفند</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label"></label>
                                                <input value="<?=$r['project_year']?>" name="project_year[]" type="text" class="form-control" placeholder="سال" />
                                            </div>
                                        </div>
                                        <div class="col-md-11 mb-4 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label">:توضیحات</label>
                                                <textarea name="project_desc[]"class="form-control" rows="4"><?=$r['project_desc']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div><hr>
                            <?php } ?>
                        </div>
                    <div class="col-md-1" style="margin-top:5px;">
                        <a id="proadd" class="btn">
                            <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="previous btn btn-primary mt-5 mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
            <p class="mt-0 text-white">قبلی</p>
            <a class="next btn btn-primary mt-5  mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
                <p class="mt-0 text-white">بعدی</p>
            </a>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <!--form research-->
            <div class="container">
                <div class="row align-items-center center">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <p class="me-1">‌تحقیقات</p>
                        <div class="card shadow" id="form-r">
                        <?php
                        $rows = json_decode($resrows['research_data']==''?json_encode([1]):$resrows['research_data'],true);
                        foreach ($rows as $r){ ?>
                                <div class="card-body py-5 px-md-5 resrows">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:عنوان</label>
                                                <input value="<?=$r['research_name']?>" name="research_name[]" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">:ناشر</label>
                                            <input value="<?=$r['research_publisher']?>" name="research_publisher[]"type="text" class="form-control" />
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">:لینک مرتبط </label>
                                            <input value="<?=$r['research_link']?>"  name="research_link[]" type="text" class="form-control text-start" />
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:تاریخ</label>
                                                <select name="research_month[]" class="form-select">
                                                    <option <?=$r['research_month']==1?'selected':''?> value="1">فروردین</option>
                                                    <option <?=$r['research_month']==2?'selected':''?> value="2">اردیبهشت</option>
                                                    <option <?=$r['research_month']==3?'selected':''?> value="3">خرداد</option>
                                                    <option <?=$r['research_month']==4?'selected':''?> value="4">تیر</option>
                                                    <option <?=$r['research_month']==5?'selected':''?> value="5">مرداد</option>
                                                    <option <?=$r['research_month']==6?'selected':''?> value="6">شهریور</option>
                                                    <option <?=$r['research_month']==7?'selected':''?> value="7">مهر</option>
                                                    <option <?=$r['research_month']==8?'selected':''?> value="8">آبان</option>
                                                    <option <?=$r['research_month']==9?'selected':''?> value="9">آذر</option>
                                                    <option <?=$r['research_month']==10?'selected':''?> value="10">دی</option>
                                                    <option <?=$r['research_month']==11?'selected':''?> value="11">بهمن</option>
                                                    <option <?=$r['research_month']==12?'selected':''?> value="12">اسفند</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label"></label>
                                                <input value="<?=$r['research_year']?>" name="research_year[]" type="text" class="form-control" placeholder="سال" />
                                            </div>
                                        </div>
                                        <div class="col-md-11 mb-4 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label">:توضیحات</label>
                                                <textarea name="research_desc[]" class="form-control" rows="4"><?=$r['research_desc']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-1" style="margin-top: 85px;">
                                <a id="resadd" class="btn">
                                    <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--btn next-->
        <a class="previous btn btn-primary mt-5 mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
            <p class="mt-0 text-white">قبلی</p>
            <a class="next btn btn-primary mt-5  mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
                <p class="mt-0 text-white">بعدی</p>
            </a>
    </fieldset>
    <fieldset>
        <div class="form-card">
            <!--form honors-->
            <div class="container">
                <div class="row align-items-center center">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <p class="me-1">‌افتخارات</p>
                        <div class="card shadow" id="form-r">
                        <?php
                        $rows = json_decode($horows['honor_data']==''?json_encode([1]):$horows['honor_data'],true);
                        foreach ($rows as $r){ ?>
                                <div class="card-body py-5 px-md-5 honorrows">
                                    <div class="row">
                                        <div class="col-md-8 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:عنوان</label>
                                                <input value="<?=$r['honor_name']?>" name="honor_name[]" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:تاریخ</label>
                                                <select name="honor_month[]" class="form-select" aria-label="Default select example">
                                                    <option value="" selected>انتخاب کنید</option>
                                                    <option <?=$r['honor_month']==1?'selected':''?> value="1">فروردین</option>
                                                    <option <?=$r['honor_month']==2?'selected':''?> value="2">اردیبهشت</option>
                                                    <option <?=$r['honor_month']==3?'selected':''?> value="3">خرداد</option>
                                                    <option <?=$r['honor_month']==4?'selected':''?> value="4">تیر</option>
                                                    <option <?=$r['honor_month']==5?'selected':''?> value="5">مرداد</option>
                                                    <option <?=$r['honor_month']==6?'selected':''?> value="6">شهریور</option>
                                                    <option <?=$r['honor_month']==7?'selected':''?> value="7">مهر</option>
                                                    <option <?=$r['honor_month']==8?'selected':''?> value="8">آبان</option>
                                                    <option <?=$r['honor_month']==9?'selected':''?> value="9">آذر</option>
                                                    <option <?=$r['honor_month']==10?'selected':''?> value="10">دی</option>
                                                    <option <?=$r['honor_month']==11?'selected':''?> value="11">بهمن</option>
                                                    <option <?=$r['honor_month']==12?'selected':''?> value="12">اسفند</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4 mt-2">
                                            <div class="form-outline">
                                                <label class="form-label"></label>
                                                <input value="<?=$r['honor_year']?>" name="honor_year[]" type="text" class="form-control" placeholder="سال" />
                                            </div>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:لینک مرتبط</label>
                                                <input value="<?=$r['honor_link']?>" name="honor_link[]" type="text" class="form-control text-start" />
                                            </div>
                                        </div>
                                    </div>
                                </div><hr>
                            <?php } ?>
                            <div class="col-md-1" style="margin-top: 42px;">
                                <a id="honadd" class="btn">
                                    <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--form Id her-->
            <div class="container">
                <div class="row align-items-center center">
                    <div class="col-lg-12 mb-5 mb-lg-0 mt-5">
                        <p class="me-1">‌معرف ها</p>
                        <div class="card shadow" id="form-r">
                        <?php
                        $rows = json_decode($reprows['rep_data']==''?json_encode([1]):$reprows['rep_data'],true);
                        foreach ($rows as $r){ ?>
                                <div class="card-body py-5 px-md-5 reprows">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:نام</label>
                                                <input value="<?=$r['rep_name']?>" name="rep_name[]" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:موقعیت شغلی و سازمان معرف</label>
                                                <input  value="<?=$r['rep_org']?>" name="rep_org[]" type="text" class="form-control" placeholder="مثال : مدیر مالی شرکت آلفا یا مدیر گروه برق دانشگاه همدان" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:ایمیل</label>
                                                <input value="<?=$r['rep_email']?>" name="rep_email[]" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">:تلفن</label>
                                                <input value="<?=$r['rep_tel']?>" name="rep_tel[]" type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-1" style="margin-top: 42px;">
                                <a id="repadd" class="btn">
                                    <img src="images/plus.png" alt="plus" style="width:30px; height:30px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--btn next-->
            <a class="previous btn btn-primary mt-5 mb-4 text-center m-3" href="#" style="width:120px; height:50px;">
                <p class="mt-0 text-white">قبلی</p>
            </a>
           <input name="submit" value="پایان" type="submit" class="btn btn-success mt-5  mb-4 text-center m-3" style="width:120px; height:50px;">
    </fieldset>
</form>
<?php require_once 'includes/footer.php';?>