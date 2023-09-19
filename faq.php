<?php
require_once 'includes/dbconfig.php';
$title = 'سوالات متداول';
require_once 'includes/header.php';
?>

    <!--faq-->
    <div class="px-5 py-5 px-md-5 text-center text-lg-end center">
        <div class="container-fluid">
            <div class="row gx-lg-5 center">
                <div class="col-lg-11 mb-5 mb-lg-5">
                    <div class="card shadow">
                        <div class="text-center">
                            <h3 class="mt-5" style="color: #e15f41;">سوالات متداول</h3>
                        </div>
                        <div class="accordion accordion-flush px-5 py-5">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        چگونه می‌توانم در سایت رزومه سما یک رزومه بسازم؟
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        برای این منظور ابتدا در سایت ثبت نام کنید. پس از ورود به سایت، به صفحه رزومه ساز هدایت می شوید و می توانید رزومه خود را تکمیل کنید.
                                        در صورتی که قبلا رزومه خود را تکمیل کرده‌اید، وارد بخش رزومه من شوید، سپس با استفاده از گزینه "ویرایش رزومه" نسبت به ویرایش بخش‌های مختلف رزومه خود اقدام کنید.
                                        <br>
                                        به یاد داشته باشید در صورتی که قبلا برای سازمان‌ها رزومه ارسال کرده باشید، پس از ویرایش، رزومه جدید شما در اختیار کارفرما قرار می‌گیرد و نیازی به ارسال مجدد رزومه نیست.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        چه اطلاعاتی باید در رزومه‌ام قرار دهم؟
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        در رزومه‌تان باید اطلاعات شخصی، سوابق تحصیلی، تجربیات شغلی، مهارت‌ها و دانش فنی، دوره‌های آموزشی و مدارک حرفه‌ای، افتخارات و جوایز، زبان‌های مسلط و همچنین علاقه‌مندی‌های شخصی خود را قرار دهید.
                                        همچنین بهتر است از قالب‌های استاندارد و حرفه‌ای که در سایت رزومه سما وجود دارد برای ساخت رزومه استفاده کنید.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        بهترین نوع رزومه کدام است؟
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        نوع رزومه‌ای که برای شما مناسب باشد، به میزان تجربه و تخصص شما بستگی دارد. اما رزومه‌هایی که طراحی ساده و حرفه‌ای دارند و اطلاعات مرتب و مهم در آن‌ها قرار داده شده باشد، معمولاً مورد توجه قرار می‌گیرند.
                                        همچنین، رزومه‌هایی که به صورت شخصی‌سازی شده و به نیازهای شخصی شما و شرایط شغلی مورد نظرتان پاسخ می‌دهند، می‌توانند بسیار موثر باشند.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        چگونه می‌توانم رزومه‌ام را به یک فرمت قابل قبول تبدیل کنم؟
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        برای تبدیل رزومه به یک فرمت قابل قبول، می‌توانید رزومه خود را طبق قالب‌های موجود در رزومه سما طراحی کرده و سپس آن را به فرمت PDF ذخیره کنید.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                        آیا باید در رزومه‌ام از کلمات کلیدی استفاده کنم؟
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        بله، استفاده از کلمات کلیدی مرتبط با شغل مورد نظر در رزومه شما می‌تواند به بهبود قابلیت جستجوی آن در سایت‌های استخدامی کمک کند. همچنین، استفاده از کلمات کلیدی در مهارت‌ها و توانایی‌های شما نیز می‌تواند به جذب توجه کارفرمایان کمک کند.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                        نوع نگارش رزومه چه تاثیری بر موفقیت یا عدم موفقیت یک فرد دارد؟
                                    </button>
                                </h2>
                                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        ممکن است تا بحال این را تجربه کرده باشید که داستان یک فیلم جذاب است اما خوب روایت نشده است، این مثال در مورد رزومه هم صدق می‌کند.
                                        <br /> یعنی نوع نوشتن رزومه، قالب و نظم و ترتیب قرار دادن مطالب همگی ممکن است در چند ثانیه نظر مخاطب را جلب کند و یا او را از ادامه خواندن رزومه منصرف کند.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>