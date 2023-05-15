
<?php

global $uptime;
$uptime= htmlspecialchars($_POST['uptime1']); 

global $image11;
 $selectfile1 = "SELECT  image1  FROM  tempfileupload  WHERE email='$email' and device='$loginString' and uptime='$uptime' ORDER BY s_n DESC ";

		 $retvalfile1 = mysqli_query($mysqli, $selectfile1);	
		 
while($row = mysqli_fetch_assoc($retvalfile1)){ $image11= htmlspecialchars($row['image1']);

echo " image11 is .".$image11."<br>";



global $newfilename1;
global $email;
global $currentdate;
        $currentdate = new DateTime();
		
 		global $currentyear;
        $currentyear = new DateTime();
		
		$DATE=$currentdate->format('Y/m/d H:i:s');
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
            if(!is_dir("../bizuploads")) {
               mkdir("../bizuploads");
             }
    	if(!is_dir("../bizuploads"."/".$YEAR)) {
               mkdir("../bizuploads"."/".$YEAR);
             }
	if(!is_dir("../bizuploads"."/".$YEAR."/". $REGMONTH)) {
               mkdir("../bizuploads"."/".$YEAR."/". $REGMONTH);
             }
			 
		if(!is_dir("../bizuploads"."/".$YEAR."/". $REGMONTH."/".$regday)) {
               mkdir("../bizuploads"."/".$YEAR."/". $REGMONTH."/".$regday);
             }
		 
	 	if(!is_dir("../bizuploads"."/".$YEAR."/". $REGMONTH."/".$regday."/"."img")) {
               mkdir("../bizuploads"."/".$YEAR."/". $REGMONTH."/".$regday."/"."img");
             }
	
	
	
	
	$filename=$image11;
	
	$ext2=explode(".",$filename);
	
	$extension=end($ext2);
	$yu=$s_n.time();
	$newfilename1="AS_biz_a".$YEAR.$MONTH.$DAY.$yu.'.'.$extension;


	

 
            $moveto01="../bizuploads"."/".$YEAR."/".$REGMONTH."/".$regday."/"."img";

			$moveto11="bizuploads"."/".$YEAR."/".$REGMONTH."/".$regday."/"."img";
	
 	if (rename($image11,$moveto01."/".$newfilename1)){;
	
$image1=$moveto11."/".$newfilename1;
 global $no1;
	$no1=1;
	
	}
}
	
?>

