<Html>
<head>
    <title></title>
    <script src="pdf/js/jquery-2.x-git.min.js"></script>
    <script src="pdf/js/html2canvas.js"></script>

    <style>
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("images/update.gif") center no-repeat #fff;
        }
    </style>

</head>
<body>

<?php
include('pdf/HtmlToJpeg.php');
$html2Jpeg = new HtmlToJpeg();
$html2Jpeg->renderView("temp1.html");
echo $html2Jpeg->output();
?>
</body>
</Html>