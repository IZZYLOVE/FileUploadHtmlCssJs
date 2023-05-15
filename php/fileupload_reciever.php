<?php


include_once 'db_connect.php'; 
include_once 'function.php';	 


global $file;
global $imagename1; global $imagetmp1; global $imagesize1; global $BASE_NAME1; global $target_file1;


$target_dir = "../TempUploads";

 global $uploadok;
		$uploadok=0;
global $uptime;
$uptime= htmlspecialchars($_POST['uptime1']); 



  $imgcount=1;
  

  
global $bee;
if($imgcount){
	 
	 
$target_dir = "TempUploads";

if($imgcount== 1){
	$target_file1 = $target_dir . basename($_FILES["img1"]["name"]);
$BASE_NAME1=basename($_FILES["img1"]["name"]);
$imagesize1 = $_FILES["img1"]["size"];
$imagetmp1=$_FILES["img1"]["tmp_name"];
$imagename1=$_FILES["img1"]["name"];

	
$target_file = $target_file1;
$BASE_NAME=$BASE_NAME1;
$imagesize = $imagesize1;
$imagetmp= $imagetmp1;
$imagename=$imagename1;

$imagename1; $imagetmp1; $imagesize1; $BASE_NAME1; $target_file1;

echo "<br/>Upload: " . $_FILES["img1"]["name"] . "<br />";
       echo "Type: " . $_FILES["img1"]["type"] . "<br />";
       echo "Size: " . ($_FILES["img1"]["size"] / 1024) . " Kb<br />";
       echo "Temp file: " . $_FILES["img1"]["tmp_name"] . "<br />";

}



$uploadOk = 1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
 // Check if image file is a actual image or fake image
/*
    $check = getimagesize($_FILES["img2"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
*/




// Check file size



// Allow certain file formats
if($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "png"  && $imageFileType != "JPEG" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "GIF" && $imageFileType != "WEBP"  && $imageFileType != "webp" ) {
    echo "Sorry, only JPG, JPEG, PNG, WEBP & GIF (jpg, jpeg, png, webp & gif ) files are allowed.";
    $uploadOk = 0;	
}

if($uploadOk != 0){
	global $email; global $date;
	global $currentyear; 
	global $currentdate;
	global $date;
        $currentyear = new DateTime();
		$DATE=$currentdate->format('Y/m/d H:i:s');
		$date=$currentdate->format('Y/m/d');
		$YEAR=$currentdate->format('Y');
		$MONTH=$currentdate->format('m');
		$DAY=$currentdate->format('d');
		if($MONTH==1){$REGMONTH="January";}
		else if ($MONTH==2){$REGMONTH="February";}
		else if ($MONTH==3){$REGMONTH="March";}
		else if ($MONTH==4){$REGMONTH="April";}
		else if ($MONTH==5){$REGMONTH="May";}
		else if ($MONTH==6){$REGMONTH="June";}
		else if ($MONTH==7){$REGMONTH="July";}
		else if ($MONTH==8){$REGMONTH="August";}
		else if ($MONTH==9){$REGMONTH="September";}
		else if ($MONTH==10){$REGMONTH="October";}
		else if ($MONTH==11){$REGMONTH="November";}
		else if ($MONTH==12){$REGMONTH="December";}
		
		$regday=$REGMONTH."_".$DAY; 

           // Check if directory exists if not create it 
            if(!is_dir("../TempUploads")) {
               mkdir("../TempUploads");
             }
    	if(!is_dir("../TempUploads"."/".$YEAR)) {
               mkdir("../TempUploads"."/".$YEAR);
             }
		if(!is_dir("../TempUploads"."/".$YEAR."/". $REGMONTH)) {
               mkdir("../TempUploads"."/".$YEAR."/". $REGMONTH);
             }
			 
		if(!is_dir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday)) {
               mkdir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday);
             }
		 
	
	 	if(!is_dir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday."/"."img")) {
               mkdir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday."/"."img");
             }
	
	
	
	global $filename;
	
	
	$filename=$imagename;
	
	$ext2=explode(".",$filename);
	
	$extension=end($ext2);
	$yu=$email.time();
	
	  $mod_ext=".png;,";  
if($extension !== 'png' and strpos($filename, $mod_ext)==true){
$extension='png'; $imagename=$imagename.'.png';
}
	
	
$newfilename="FT$imgcount".$YEAR.$MONTH.$DAY.$yu.'.'.$extension;


 
            $moveto01="../TempUploads"."/".$YEAR."/".$REGMONTH."/".$regday."/"."img";

			$moveto02="TempUploads"."/".$YEAR."/".$REGMONTH."/".$regday."/"."img";
	
 	
	
	
	
	
	
	
	
	
		
	

global $filename;
 
  $targetWidth =800;
	
	if($imgcount == 1){
    $fileNewName=$newfilename;
	$folderPath=$moveto01;
	 
$image1=$moveto01."/".$newfilename;
	}
else if($imgcount == 2){
       $fileNewName=$newfilename;
	$folderPath=$moveto01;
	
$image2=$moveto01."/".$newfilename;
	}	
	
	else if($imgcount == 3){
       $fileNewName=$newfilename;
	$folderPath=$moveto01;
	
	$image3=$moveto01."/".$newfilename;

	}	
	
	else if($imgcount == 4){
       $fileNewName=$newfilename;
	$folderPath=$moveto01;
	 
$image4=$moveto01."/".$newfilename;
	}	
	else {
    
	 global $no0;
		$no0=1;

	}	
	
	
	if($imagesize){
	
	
	
	

  // echo "<br>Resize prog $imgcount initiated.";
	$file=$imagetmp;
	 
	// echo "<br>file name is: " . $file;
		

    if(!empty($file)) {


       
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $sourceProperties = getimagesize($file);

list($width,$height)=getimagesize($file);
		//echo "<br> width =".$width;
		//echo "<br> height =".$height;
		
        $extx = pathinfo($imagename, PATHINFO_EXTENSION);
        $ext = strtolower($extx);
		
		// echo "<br> ext =".$ext;
       

       

            if($ext == 'jpg'){
				
             $imageResourceId = imagecreatefromjpeg($file); 

                $targetLayer = imageResize1($imageResourceId,$width,$height);

                imagejpeg($targetLayer,$folderPath."/".$fileNewName);
		
		// echo "<br>Image $imgcount Resized ok.";
	 global $uploadok;
		$uploadok=1;

			}

else if($ext == 'bmp'){
				
             $imageResourceId = imagecreatefrombmp($file); 

                $targetLayer = imageResize1($imageResourceId,$width,$height);

                imagebmp($targetLayer,$folderPath."/".$fileNewName);
		
		//echo "<br>Image $imgcount Resized ok.";
	 global $uploadok;
		$uploadok=1;
			}


           else if($ext == 'png'){

                $imageResourceId = imagecreatefrompng($file); 

                $targetLayer = imageResize1($imageResourceId,$width,$height);

                imagepng($targetLayer,$folderPath."/".$fileNewName);
		// echo "<br>Image $imgcount Resized ok.";
		 global $uploadok;
		$uploadok=1;

			}


         
else if($ext == 'gif'){
                $imageResourceId = imagecreatefromgif($file); 

                $targetLayer = imageResize1($imageResourceId,$width,$height);

                imagegif($targetLayer,$folderPath."/".$fileNewName);
			// echo "<br>Image $imgcount Resized ok.";	
			 global $uploadok;
		$uploadok=1;

}


         
else if($ext == 'jpeg'){
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = imageResize1($imageResourceId,$width,$height);
                imagejpeg($targetLayer,$folderPath."/".$fileNewName);
		//echo "<br>Image $imgcount Resized ok.";
		global $uploadok;
		$uploadok=1;

}
else if($ext == 'webp'){
                $imageResourceId = imagecreatefromwebp($file); 
                $targetLayer = imageResize1($imageResourceId,$width,$height);
                imagejpeg($targetLayer,$folderPath."/".$fileNewName);
		//echo "<br>Image $imgcount Resized ok.";
		
 global $uploadok;
		$uploadok=1;

}
else{
            

             //   echo "<br>Invalid Image $imgcount type.";

                exit;

}

        }


    // move_uploaded_file($file, $folderPath. $fileNewName);

      //  echo "<br>Image $imgcount Resized Successfully.";
$ResizedOk = 1;



	
// echo "<br>Resize prog $imgcount end.";	 

 imagedestroy($imageResourceId);		
 imagedestroy($targetLayer);
 
 
 
 
 
}









}











	
// echo "<br><b>file $imgcount end ... !</b><p>";
}

function imageResize1($imageResourceId,$width,$height) {
$targetWidth =800;

  
$targetHeight=($height/$width)*$targetWidth;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);

    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
	
	

}
global $deltime;
$deltime= time();
if($uploadok === 1){
 $selectcom1 = "SELECT  s_n  FROM  tempfileupload  WHERE email='$email' and device='$loginString' and uptime='$uptime' ORDER BY s_n DESC ";

		 $retvalcom1 = mysqli_query($mysqli, $selectcom1);	
		$feedcom1=mysqli_num_rows($retvalcom1);

if(	$feedcom1 == 0){
	   
	  $comm1_stmt = "INSERT INTO tempfileupload( email, device, date, image1, uptime, deltime) VALUES('$email','$loginString', '$date','$image1', '$uptime', '$deltime')";
$retvalcomm1=mysqli_query($mysqli, $comm1_stmt); 
	 if (! $retvalcomm1) { echo "Image1 upload: Failed"; } else { echo "Image1 upload: Ok"; }
}else{
	   
	   $selectdel2 = "SELECT  image1  FROM  tempfileupload  WHERE email='$email' and device='$loginString' and uptime='$uptime' ORDER BY s_n DESC ";

		 $retvaldel2 = mysqli_query($mysqli, $selectdel2);	
		while($rowx = mysqli_fetch_assoc($retvaldel2)){ $deletefile = $rowx['image1'];
  if(!empty($deletefile)){$profimopath1=$deletefile; if (file_exists($profimopath1)){  unlink($profimopath1);}}

		}
	  
	   
	   
	$changecom1="UPDATE tempfileupload	SET	image1='$image1' WHERE email='$email' and device='$loginString' and uptime='$uptime'";
	$retvalnmcom1=mysqli_query($mysqli, $changecom1 );
	    if (!$retvalnmcom1) { echo "Image1 upload: Failed"; } else { echo "Image1 upload: Ok"; }
	    
	
}
	  
	  
}




?>
