<?php

/* Getting file name */
$dir ="../img/";
$rand_name = generateRandomString();
$feature_icon = strtolower($_FILES['file']['name']);
$upload_extension =  explode(".", $feature_icon);
$upload_extension = end($upload_extension);


$filename = $rand_name.'.'.$upload_extension;





/* Location */
$location = $dir.$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png");

/* Check file extension */
if(!in_array(strtolower($imageFileType), $valid_extensions)) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
     echo $location;
   }else{
     echo 0;
   }
}



?>


<?php

function generateRandomString($length = 10) {
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < $length; $i++) {
       $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   return $randomString;
}

?>

