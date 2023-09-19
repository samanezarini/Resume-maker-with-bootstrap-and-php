
<footer class="py-5 px-2 bg-light" id="footer" style="font-size:95%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-3">
                <div class="mb-3">
                    <div class="h4">رزومه سما</div>
                    <p class="text-muted">به سرعت و با کیفیتی بالا رزومه خود را بسازید و به راحتی به جستجوی شغل مورد نظر بپردازید.</p>
                    <div class="social-nav">
                        <nav role="navigation">
                            <div class="mt-4">
                                <a type="button" class="btn btn-logo">
                                    <img src="images/icon/logo-twitter.svg" alt="twitter" style="height:20px; width:20px;" />
                                </a>
                                <a type="button" class="btn btn-logo">
                                    <img src="images/icon/logo-linkedin.svg" alt="linkedin" style="height:20px; width:20px;" />
                                </a>
                                <a type="button" class="btn btn-logo">
                                    <img src="images/icon/logo-instagram.svg" alt="instagram" style="height:20px; width:20px;" />
                                </a>
                                <a type="button" class="btn btn-logo">
                                    <img src="images/icon/logo-facebook.svg" alt="facebook" style="height:20px; width:20px;" />
                                </a>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-3">
                <div class="text-uppercase mb-2">راهنما</div>
                <div class="nav flex-column">
                    <a class="nav-link px-0 link-fo" href="cv.php">رزومه چیست؟</a>
                    <a class="nav-link px-0 link-fo" href="resume-writing-guide.php">راهنمای ساخت رزومه</a>
                    <a class="nav-link px-0 link-fo" href="resume.php">ساخت یک رزومه</a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-3">
                <div class="text-uppercase mb-2">لینک های مفید</div>
                <div class="nav flex-column">
                    <a class="nav-link px-0 link-fo" href="format.php">قالب ها</a>
                    <a class="nav-link px-0 link-fo" href="standard-cv.php">رزومه استاندارد</a>
                    <a class="nav-link px-0 link-fo" href="best.php">برترین ها</a>                    </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-3">
                <div class="text-uppercase mb-2">پشتیبانی</div>
                <div class="nav flex-column">
                    <a class="nav-link px-0 link-fo" href="contact-us.php">تماس با ما</a>
                    <a class="nav-link px-0 link-fo" href="terms.php">قوانین و مقررات</a>
                    <a class="nav-link px-0 link-fo" href="faq.php">سوالات متداول</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="text-uppercase mb-2">با ما تماس بگیرید</div>
                <div class="text-small">
                    <address class="text-muted">
                        ایران
                        همدان، همدان
                        دانشکده فنی و حرفه ای زینب کبری <br>
                    </address>
                    <div class="mb-1"><strong>تلفن:</strong>&nbsp; <?=$info_rows['mobile']?></div>
                    <div class="mb-1"><strong>ایمیل:</strong> &nbsp; <?=$info_rows['email']?></div>
                </div>
            </div>

            <div class="text-center mt-2">
                © 1402 - تمامی حقوق برای سایت <a class="text-dark fw-bold link-fo" href="#">رزومه سما</a>‌ محفوظ است.
            </div>

        </div>
    </div>
</footer>

<script src="scripts/jquery-3.5.1.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        $(".next").click(function(){
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });
        $(".previous").click(function(){
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            previous_fs.show();
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });
        $(".submit").click(function(){
            return false;
        })

    });
</script>
<script type="text/javascript" >
    $(document).ready(function() {
        $('#file').change(function(){
            $("#preview").html('<img src="images/update.gif" alt="Uploading...."/>');
            var fd = new FormData();
            var files = $(this)[0].files;
            fd.append('file',files[0]);
            $.ajax({
                url: 'ajaximage.php',
                type: 'POST',
                data:fd,
                //dataType: 'json',
                contentType: false,
                processData: false,
                success: function(result) {
                    $('#preview').html(result);
                },
            });
            return false;
        });
    });
</script>
<script>
    $(document).ready(function (){
        //research
        $('#resadd').click(function (){
            $('.resrows').last().after('<hr><div class="card-body py-5 px-md-5 resrows">'+
                '<div class="row">'+
                '<div class="col-md-12 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:عنوان</label>'+
                '<input name="research_name[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-4 mb-4">'+
                '<label class="form-label">:ناشر</label>'+
                '<input name="research_publisher[]"type="text" class="form-control" />'+
                '</div>'+
                '<div class="col-md-4 mb-4">'+
                '<label class="form-label">:لینک مرتبط </label>'+
                '<input name="research_link[]" type="text" class="form-control text-start" />'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:تاریخ</label>'+
                '<select name="research_month[]" class="form-select" aria-label="Default select example">'+
                '<option value="" selected=""></option>'+
                '<option value="1">فروردین</option>'+
                '<option value="2">اردیبهشت</option>'+
                '<option value="3">خرداد</option>'+
                '<option value="4">تیر</option>'+
                '<option value="5">مرداد</option>'+
                '<option value="6">شهریور</option>'+
                '<option value="7">مهر</option>'+
                '<option value="8">آبان</option>'+
                '<option value="9">آذر</option>'+
                '<option value="10">دی</option>'+
                '<option value="11">بهمن</option>'+
                '<option value="12">اسفند</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4 mt-2">'+
                '<div class="form-outline">'+
                '<label class="form-label"></label>'+
                '<input name="research_year[]" type="text" class="form-control" placeholder="سال" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-11 mb-4 mt-2">'+
                '<div class="form-outline">'+
                '<label class="form-label">:توضیحات</label>'+
                '<textarea name="research_desc[]" class="form-control" rows="4"></textarea>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>');
        });
        //honor
        $('#honadd').click(function (){
            $('.honorrows').last().after('<hr><div class="card-body py-5 px-md-5 honorrows">'+
                '<div class="row">'+
                '<div class="col-md-8 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:عنوان</label>'+
                '<input name="honor_name[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:تاریخ</label>'+
                '<select class="form-select" aria-label="Default select example">'+
                '<option value="" selected>انتخاب کنید</option>'+
                '<option value="1">فروردین</option>'+
                '<option value="2">اردیبهشت</option>'+
                '<option value="3">خرداد</option>'+
                '<option value="4">تیر</option>'+
                '<option value="5">مرداد</option>'+
                '<option value="6">شهریور</option>'+
                '<option value="7">مهر</option>'+
                '<option value="8">آبان</option>'+
                '<option value="9">آذر</option>'+
                '<option value="10">دی</option>'+
                '<option value="11">بهمن</option>'+
                '<option value="12">اسفند</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4 mt-2">'+
                '<div class="form-outline">'+
                '<label class="form-label"></label>'+
                '<input name="honor_year[]" type="text" class="form-control" placeholder="سال" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-10 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:لینک مرتبط</label>'+
                '<input name="honor_link[]" type="text" class="form-control text-start" />'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>');
        });
        //representative
        $('#repadd').click(function (){
            $('.reprows').last().after('<hr><div class="card-body py-5 px-md-5 reprows">'+
                '<div class="row">'+
                '<div class="col-md-6 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:نام</label>'+
                '<input name="rep_name[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-6 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:موقعیت شغلی و سازمان معرف</label>'+
                '<input  name="rep_org[]" type="text" class="form-control" placeholder="مثال : مدیر مالی شرکت آلفا یا مدیر گروه برق دانشگاه همدان" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-5 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:ایمیل</label>'+
                '<input name="rep_email[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-5 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:تلفن</label>'+
                '<input name="rep_tel[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>');
        });
        //project
        $('#proadd').click(function (){
            $('.prorows').last().after('<hr><div class="card-body py-5 px-md-5 prorows">'+
                '<div class="row">'+
                '<div class="col-md-7 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:عنوان</label>'+
                '<input name="project_name[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-5 mb-4">'+
                '<label class="form-label">:کارفرما/درخواست کننده</label>'+
                '<input name="project_employer[]" type="text" class="form-control" />'+
                '</div>'+
                '<div class="col-md-8 mb-4">'+
                '<label class="form-label">:لینک مرتبط </label>'+
                '<input name="project_link[]"type="text" class="form-control text-start" />'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:تاریخ</label>'+
                '<select name="project_month[]" class="form-select" aria-label="Default select example">'+
                '<option value="" selected>انتخاب کنید</option>'+
                '<option value="1">فروردین</option>'+
                '<option value="2">اردیبهشت</option>'+
                '<option value="3">خرداد</option>'+
                '<option value="4">تیر</option>'+
                '<option value="5">مرداد</option>'+
                '<option value="6">شهریور</option>'+
                '<option value="7">مهر</option>'+
                '<option value="8">آبان</option>'+
                '<option value="9">آذر</option>'+
                '<option value="10">دی</option>'+
                '<option value="11">بهمن</option>'+
                '<option value="12">اسفند</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4 mt-2">'+
                '<div class="form-outline">'+
                '<label class="form-label"></label>'+
                '<input name="project_year[]" type="text" class="form-control" placeholder="سال" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-11 mb-4 mt-2">'+
                '<div class="form-outline">'+
                '<label class="form-label">:توضیحات</label>'+
                '<textarea name="project_desc[]"class="form-control" rows="4"></textarea>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>');
        });
        //evidence
        $('#eviadd').click(function (){
            $('.evirows').last().after('<hr><div class="card-body py-5 px-md-5">'+
                '<div class="row">'+
                '<div class="col-md-12 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:عنوان</label>'+
                '<input name="evidence_name[]" type="text" class="form-control mt-2"/>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-6 mb-4 mt-2">'+
                '<label class="form-label">:موسسه</label>'+
                '<input name="evidence_institute[]" type="text" class="form-control mt-2" placeholder="" />'+
                '</div>'+
                '<div class="col-md-3 mb-4 mt-3">'+
                '<label class="form-label">:تاریخ</label>'+
                '<select name="evidence_month[]" class="form-select" aria-label="Default select example">'+
                '<option value="" selected=""></option>'+
                '<option value="1">فروردین</option>'+
                '<option value="2">اردیبهشت</option>'+
                '<option value="3">خرداد</option>'+
                '<option value="4">تیر</option>'+
                '<option value="5">مرداد</option>'+
                '<option value="6">شهریور</option>'+
                '<option value="7">مهر</option>'+
                '<option value="8">آبان</option>'+
                '<option value="9">آذر</option>'+
                '<option value="10">دی</option>'+
                '<option value="11">بهمن</option>'+
                '<option value="12">اسفند</option>'+
                '</select>'+
                '</div>'+
                '<div class="col-md-2 mb-4 mt-3">'+
                '<label class="form-label"></label>'+
                '<input name="evidence_year[]" type="text" class="form-control mt-2" placeholder="سال" />'+
                '</div>'+
                '</div>'+
                '</div>');
        });
        //exprince
        $('#exadd').click(function (){
            $('.exrows').last().after('<div class="col-lg-6 mb-5 mb-lg-0 exrows">'+
                '<p class="me-1"></p>'+
                '<div class="card shadow" id="form-r">'+
                '<div class="card-body py-5 px-md-5">'+
                '<div class="row">'+
                '<div class="col-md-6 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:نام مهارت</label>'+
                '<input name="ex_name[]"type="text" class="form-control mt-2" placeholder="" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-5 mb-4 mt-2">'+
                '<label class="form-label">:سطح</label>'+
                '<select name="ex_level[]" class="form-select" aria-label="Default select example">'+
                '<option selected="" selected>انتخاب کنید</option>'+
                '<option value="1">مبتدی</option>'+
                '<option value="2">آشنایی نسبی</option>'+
                '<option value="3">متوسط</option>'+
                '<option value="4">پیشرفته</option>'+
                '<option value="5"> مسلط </option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>');
        });
        //eduction
        $('#edadd').click(function (){
            $('.edrows').last().after('<hr><div class="col-md-2 mb-4">'+
                '<label class="form-label">:مقطع</label>'+
                '<select name="section[]" class="form-select" aria-label="Default select example">'+
                '<option value="" selected></option>'+
                '<option value="زیر دیپلم">زیر دیپلم</option>'+
                '<option value="دیپلم">دیپلم</option>'+
                '<option value="کاردانی">کاردانی</option>'+
                '<option value="کارشناسی">کارشناسی</option>'+
                '<option value="کارشناسی ارشد">کارشناسی ارشد</option>'+
                '<option value="دکتری">دکتری</option>'+
                '<option value="فوق دکتری">فوق دکتری</option>'+
                '</select>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:رشته تحصیلی</label>'+
                '<input  name="field[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<label class="form-label">:گرایش/تخصص</label>'+
                '<input name="orination[]" type="text" class="form-control" />'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<label class="form-label">:نوع موسسه</label>'+
                '<select name="edtype[]" class="form-select" aria-label="Default select example">'+
                    '<option selected></option>'+
                    '<option value="دولتی">دولتی</option>'+
                    '<option value="تیزهوشان">تیزهوشان</option>'+
                    '<option value="غیرانتفاعی">غیرانتفاعی</option>'+
                    '<option value="نمونه دولتی">نمونه دولتی</option>'+
                '</select>'+
            '</div>'+
            '<div class="col-md-2 mb-4">'+
                '<label class="form-label">:موسسه آموزشی</label>'+
                '<input name="edname[]" type="text" class="form-control" />'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<label class="form-label">:معدل</label>'+
                '<input name="edavrage[]" type="text" class="form-control" />'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:کشور</label>'+
                '<input name="edcountry[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:استان</label>'+
                '<select name="edarea[]" class="form-select" aria-label="Default select example">'+
                '<option value="" selected>انتخاب کنید</option>'+
                '<option value="اردبیل">اردبیل</option>'+
                '<option value="اصفهان">اصفهان</option>'+
                '<option value="البرز">البرز</option>'+
                '<option value="ایلام">ایلام</option>'+
                '<option value="آذربایجان شرقی">آذربایجان شرقی</option>'+
                '<option value="آذربایجان غربی">آذربایجان غربی</option>'+
                '<option value="بوشهر">بوشهر</option>'+
                '<option value="تهران">تهران</option>'+
                '<option value="چهار محال و بختیاری">چهار محال و بختیاری</option>'+
                '<option value="خراسان جنوبی">خراسان جنوبی</option>'+
                '<option value="خراسان رضوی">خراسان رضوی</option>'+
                '<option value="خراسان شمالی">خراسان شمالی</option>'+
                '<option value="خوزستان">خوزستان</option>'+
                '<option value="زنجان">زنجان</option>'+
                '<option value="سمنان">سمنان</option>'+
                '<option value="سیستان و بلوچستان">سیستان و بلوچستان</option>'+
                '<option value="فارس">فارس</option>'+
                '<option value="قزوین">قزوین</option>'+
                '<option value="قم">قم</option>'+
                '<option value="کردستان">کردستان</option>'+
                '<option value="کرمان">کرمان</option>'+
                '<option value="کرمانشاه">کرمانشاه</option>'+
                '<option value="کهگیلویه و بویراحمد">کهگیلویه و بویراحمد</option>'+
                '<option value="گلستان">گلستان</option>'+
                '<option value="گیلان">گیلان</option>'+
                '<option value="لرستان">لرستان</option>'+
                '<option value="مازندران">مازندران</option>'+
                '<option value="مرکزی">مرکزی</option>'+
                '<option value="هرمزگان">هرمزگان</option>'+
                '<option value="همدان">همدان</option>'+
                '<option value="یزد">یزد</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:شهر</label>'+
                '<input name="edcity[]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-md-3 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:ورود</label>'+
                '<input name="edstart[]" type="text" class="form-control" placeholder="سال" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:فراغت از تحصیل</label>'+
                '<input name="edend[]" type="text" class="form-control" placeholder="سال" />'+
                '</div>'+
                '</div>');
        });
        //jobs
        $('#jobadd').click(function (){
            $('.jobrows').last().after('<hr><div class="col-md-3 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:سِمت شغلی مربوطه</label>'+
                '<input name="job_title[]" type="text" class="form-control"/>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-3 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:عنوان محل کار</label>'+
                '<input name="job_place[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:کشور</label>'+
                '<input name="job_country[]" type="text" class="form-control" />'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:استان</label>'+
                '<select name="job_area[]" class="form-select" aria-label="Default select example">'+
                        '<option value="" selected>انتخاب کنید</option>'+
                        '<option value="اردبیل">اردبیل</option>'+
                        '<option value="اصفهان">اصفهان</option>'+
                        '<option value="البرز">البرز</option>'+
                        '<option value="ایلام">ایلام</option>'+
                        '<option value="آذربایجان شرقی">آذربایجان شرقی</option>'+
                        '<option value="آذربایجان غربی">آذربایجان غربی</option>'+
                        '<option value="بوشهر">بوشهر</option>'+
                        '<option value="تهران">تهران</option>'+
                        '<option value="چهار محال و بختیاری">چهار محال و بختیاری</option>'+
                        '<option value="خراسان جنوبی">خراسان جنوبی</option>'+
                        '<option value="خراسان رضوی">خراسان رضوی</option>'+
                        '<option value="خراسان شمالی">خراسان شمالی</option>'+
                        '<option value="خوزستان">خوزستان</option>'+
                        '<option value="زنجان">زنجان</option>'+
                        '<option value="سمنان">سمنان</option>'+
                        '<option value="سیستان و بلوچستان">سیستان و بلوچستان</option>'+
                        '<option value="فارس">فارس</option>'+
                        '<option value="قزوین">قزوین</option>'+
                        '<option value="قم">قم</option>'+
                        '<option value="کردستان">کردستان</option>'+
                        '<option value="کرمان">کرمان</option>'+
                        '<option value="کرمانشاه">کرمانشاه</option>'+
                        '<option value="کهگیلویه و بویراحمد">کهگیلویه و بویراحمد</option>'+
                        '<option value="گلستان">گلستان</option>'+
                        '<option value="گیلان">گیلان</option>'+
                        '<option value="لرستان">لرستان</option>'+
                        '<option value="مازندران">مازندران</option>'+
                        '<option value="مرکزی">مرکزی</option>'+
                        '<option value="هرمزگان">هرمزگان</option>'+
                        '<option value="همدان">همدان</option>'+
                        '<option value="یزد">یزد</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:شهر</label>'+
                '<input name="job_city[]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<label class="form-label">:شروع</label>'+
                '<select name="job_smonth[]" class="form-select" aria-label="Default select example">'+
                '<option value="" selected=""></option>'+
                '<option value="1">فروردین</option>'+
                '<option value="2">اردیبهشت</option>'+
                '<option value="3">خرداد</option>'+
                '<option value="4">تیر</option>'+
                '<option value="5">مرداد</option>'+
                '<option value="6">شهریور</option>'+
                '<option value="7">مهر</option>'+
                '<option value="8">آبان</option>'+
                '<option value="9">آذر</option>'+
                '<option value="10">دی</option>'+
                '<option value="11">بهمن</option>'+
                '<option value="12">اسفند</option>'+
                '</select>'+
                '</div>'+
                '<div class="col-md-1 mb-4">'+
                '<label class="form-label"></label>'+
                '<input name="job_syear[]" type="text" class="form-control mt-2" placeholder="سال" />'+
                '</div>'+
                '<div class="col-md-2 mb-4">'+
                '<label class="form-label">:اتمام</label>'+
                '<select name="job_emonth[]" class="form-select" aria-label="Default select example">'+
                '<option value="" selected=""></option>'+
                '<option value="1">فروردین</option>'+
                '<option value="2">اردیبهشت</option>'+
                '<option value="3">خرداد</option>'+
                '<option value="4">تیر</option>'+
                '<option value="5">مرداد</option>'+
                '<option value="6">شهریور</option>'+
                '<option value="7">مهر</option>'+
                '<option value="8">آبان</option>'+
                '<option value="9">آذر</option>'+
                '<option value="10">دی</option>'+
                '<option value="11">بهمن</option>'+
                '<option value="12">اسفند</option>'+
                '</select>'+
                '</div>'+
                '<div class="col-md-1 mb-4">'+
                '<label class="form-label "></label>'+
                '<input name="job_eyear[]" type="text" class="form-control mt-2" placeholder="سال"/>'+
                '</div>'+
                '<div class="col-md-2 mt-5 jobrows" style="direction: rtl; text-align: right;">'+
                '<input name="job_now[]" type="checkbox">'+
                    '<label class="me-2 mb-3">مشغول فعالیت هستم</label>'+
            '</div>');
        });
        //social media
        $('#social').click(function (){
            $('.socialrow').last().after('<div class="col-md-3">'+
                '<div class="form-outline">'+
                '<label class="form-label">:شبکه اجتماعی</label>'+
                '<select name="social_name[]" class="form-select">'+
                '<option selected></option>'+
                '<option value="LinkedIn">LinkedIn</option>'+
                '<option value="Twitter">Twitter</option>'+
                '<option value="Facebook">Facebook</option>'+
                '<option value="Instagram">Instagram</option>'+
                '<option value="Telegram">Telegram</option>'+
                '<option value="Github">Github</option>'+
                '<option value="Dribbble">Dribble</option>'+
                '<option value="WhatsApp">Whatsapp</option>'+
                '<option value="Skype">Skype</option>'+
                '<option value="Youtube">Youtube</option>'+
                '<option value="Stackoverflow">StackOverflow</option>'+
                '<option value="ResearchGate">ResearchGate</option>'+
                '<option value="Figma">Figma</option>'+
                '<option value="Pinterest">Pinterest</option>'+
                '<option value="Gitlab">Gitlab</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-3 socialrow">'+
                '<div class="form-outline">'+
                '<label class="form-label">:آیدی مرتبط</label>'+
                '<input name="social_id[]" type="text" class="form-control text-start" />'+
                '</div>'+
                '</div>');
        });
        //language
        $('#langadd').click(function (){
            $('.langrows').last().after('<div class="col-lg-6 mb-5 mb-lg-0 langrows">'+
                '<p >&nbsp;</p>'+
                '<div class="card shadow" id="form-r">'+
                '<div class="card-body py-5 px-md-5">'+
                '<div class="row">'+
                '<div class="col-md-6 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:نام زبان</label>'+
                '<select name="lang_name[]" class="form-select" aria-label="Default select example">'+
                '<option value=""></option>'+
                '<option value="انگلیسی">انگلیسی</option>'+
                '<option value="عربی">عربی</option>'+
                '<option value="آلمانی">آلمانی</option>'+
                '<option value="فرانسوی">فرانسوی</option>'+
                '<option value="اسپانیایی">اسپانیایی</option>'+
                '<option value="روسی">روسی</option>'+
                '<option value="ایتالیایی">ایتالیایی</option>'+
                '<option value="ترکی استانبولی">ترکی استانبولی</option>'+
                '<option value="فارسی">فارسی</option>'+
                '<option value="چینی">چینی</option>'+
                '<option value="عبری">عبری</option>'+
                '<option value="ترکی آذربایجانی">ترکی آذربایجانی</option>'+
                '<option value="ارمنی">ارمنی</option>'+
                '<option value="ژاپنی">ژاپنی</option>'+
                '<option value="گرجی">گرجی</option>'+
                '<option value="کُردی">کُردی</option>'+
                '<option value="فنلاندی">فنلاندی</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="col-md-5 mb-4">'+
                '<div class="form-outline">'+
                '<label class="form-label">:سطح</label>'+
                '<select name="lang_level[]" class="form-select" aria-label="Default select example">'+
                '<option value=""></option>'+
                '<option selected=""></option>'+
                '<option value="1">مبتدی</option>'+
                '<option value="2">آشنایی نسبی</option>'+
                '<option value="3">متوسط</option>'+
                '<option value="4">پیشرفته</option>'+
                '<option value="5"> مسلط </option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>');
        });
    });
</script>
</body>
</html>
