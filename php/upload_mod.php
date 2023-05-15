<?php
global $upstring;
$uploadstring= htmlspecialchars($_POST['uploadstring']); 
$imagename=$file_name = $_FILES['file']['name']; // getting the file name
$tmp_name = $_FILES['file']['tmp_name']; // getting temp_name of file
$newFileName = $uploadstring.$file_name; //changing the file name
       echo "<br/>Upload: " . $_FILES["file"]["name"] . "<br />";
       echo "Type: " . $_FILES["file"]["type"] . "<br />";
       echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
       echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";


	global $email; global $date;
	global $currentyear; 
	global $currentdate;
	global $date;
        $currentdate = new DateTime();
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
    	// if(!is_dir("../TempUploads"."/".$YEAR)) {
        //        mkdir("../TempUploads"."/".$YEAR);
        //      }
		// if(!is_dir("../TempUploads"."/".$YEAR."/". $REGMONTH)) {
        //        mkdir("../TempUploads"."/".$YEAR."/". $REGMONTH);
        //      }
			 
		// if(!is_dir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday)) {
        //        mkdir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday);
        //      }
		 
	
	 	// if(!is_dir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday."/"."img")) {
        //        mkdir("../TempUploads"."/".$YEAR."/". $REGMONTH."/".$regday."/"."img");
        //      }
	
	
	
	global $filename;
	$filename=$imagename;
	$ext2=explode(".",$filename);
	
	$extension=end($ext2);
	$yu=$email.time();
	
	  $mod_ext=".png;,";  
if($extension !== 'png' and strpos($filename, $mod_ext)==true){
$extension='png'; $imagename=$imagename.'.png';
}
	
// $newfilename="FT".$YEAR.$MONTH.$DAY.$yu.'.'.$extension;
$newfilename=$newFileName;



// $movetofile="../TempUploads"."/".$YEAR."/".$REGMONTH."/".$regday."/"."img";
// $movetotable="TempUploads"."/".$YEAR."/".$REGMONTH."/".$regday."/"."img";
$movetofile="../TempUploads";
$movetotable="TempUploads";

// move_uploaded_file("$tmp_name", "../files/".$newFileName); // moving file to the specified destination, using the new file name
move_uploaded_file("$tmp_name", $movetofile."/".$newfilename); // moving file to the specified destination, using the new file name
