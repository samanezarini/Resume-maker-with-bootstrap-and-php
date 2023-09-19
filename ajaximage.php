<?php
require_once 'includes/dbconfig.php';
$userid = intval($_SESSION['user_id']);
sleep(2);// For local test

function Upload($file,$tmp,$dir,$size,$ex,$width='500',$height='500')
{

	$rnd = uniqid();
	$file = str_replace(' ','-',trim($file));
	list($w,$h) = @getimagesize($tmp);
	$allowed_filetypes = explode(',',$ex);
    $ext = substr($file, strpos($file,'.'), strlen($file)-1);
		if(!@in_array($ext,$allowed_filetypes))
		{
		  	echo 'پسوند فایل مجاز نمی باشد';
		  	exit;
		}
		if(filesize($tmp) > 10485760000 )
		{
		  echo 'حجم عکس بیشتر از حد مجاز می باشد';
		  exit;
		}
		 if($w > $width || $h > $height )
		{
		  echo 'سایز عکس بیشتر از حد مجاز می باشد';
		  exit;
		}
    if(move_uploaded_file($tmp,$dir.$rnd.$file))
	return $rnd.$file;
	return false;
}

$pic = Upload($_FILES['file']['name'],$_FILES['file']['tmp_name'],'images/users/',$_FILES['file']['size'],'.jpg,.gif,.png,.jpeg,.JPG,.GIF,.PNG,.JPEG',100000,100000);
echo '<img src="images/users/'.$pic.'" class="w-50 rounded-circle img-thumbnail" />';
if($pic){
    $conn->query("UPDATE `users` SET `user_pic`='$pic' WHERE `user_id`='$userid'");
}
?>