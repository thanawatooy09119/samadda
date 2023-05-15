<?php session_start();
if(!$_SESSION['login']){
echo '<link rel="stylesheet" href="../style.css" type="text/css">';
echo '<meta http-equiv="refresh" content="3;URL=login.php" />  ';
echo '<div class="result">Please wait</div>';
echo '<div class="loader"></div>';
exit();
}
 ?>
<?php
//echo '<script language="javascript">alert();</script>';
// start
//$_ran_name = rand();
$_ran_name = date('d-m-Y-H-i').rand();
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
  if(trim($_FILES["upl"]["tmp_name"]) != "")
	{
		$images = $_FILES["upl"]["tmp_name"];
		//$new_images = "";
		
		############# Small Image ###################
		$_small_img = "../img/thumbnails_".$_ran_name.".".end(explode(".",$_FILES["upl"]["name"]));
		############# End Small Image ###################
		
		$width=160; //*** Fix Width & Heigh (Autu caculate) ***//
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);
		$type = $size[2];
		//$images_orig = ImageCreateFromJPEG($images);
		switch(strtolower(image_type_to_mime_type($type)))
    {
        case 'image/jpeg':
        $images_orig = ImageCreateFromJPEG($images);
            break;
        case 'image/png':
        $images_orig = ImageCreateFromPNG($images);
            break;
        case 'image/gif':
            $images_orig = ImageCreateFromGIF($images);
            break;
        default:
            return false;
    }
		
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		//ImageJPEG($images_fin,"uploads/".$_ran_name."_".$new_images);
			switch(strtolower(image_type_to_mime_type($type)))
    {
        case 'image/jpeg':
        ImageJPEG($images_fin,$_small_img);
            break;
        case 'image/png':
        //$red = imagecolorallocate($images_fin, 255, 0, 0);
        //$black = imagecolorallocate($images_fin, 0, 0, 0);
        //imagecolortransparent($images_fin, $black);
        //imagefilledrectangle($images_fin, 4, 4, 50, 25, $red);
        ImagePNG($images_fin,$_small_img);
            break;
        case 'image/gif':
            ImageJPEG($images_fin,$_small_img);
            break;
        default:
            return false;
    }

		print $_small_img;
		echo "|";

		ImageDestroy($images_orig);
		ImageDestroy($images_fin);
	}
	
	
		############# Large Image ###################
	$_big_image =  '../img/'.$_ran_name.'.'.end(explode(".",$_FILES["upl"]["name"]));
		############# Large Image ###################
		
		
		
	if(move_uploaded_file($_FILES['upl']['tmp_name'],$_big_image)){
		//echo '{"status":"success"}';

		print $_big_image;
		exit;
	}
}

//echo '{"status":"error"}';
exit;


?>

