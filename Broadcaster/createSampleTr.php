<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$timeFromNow=$_POST['timeFromNow'];
$mediaTime=$_POST['mediaTime'];
$imageToDisplay=$_POST['image'];
$launchTime=$_POST['launchTime'];
$nameToDisplay=$_POST['nameToDisplay'];
$linkToDisplay=$_POST['linkToDisplay'];
//Find the exact sample file in the interactive track that needs to be changed.
if($timeFromNow!=0)
{   
    if(file_exists("../startTime.txt"))
        $timeInFile= file_get_contents ("../startTime.txt");
    else
        echo "Start time file not found";     
    
    $mediaTime=$launchTime-$timeInFile+$timeFromNow;
}
//Go to the sample track file and append the new contents into it.
$sampleFrequency=0.5;
$sampleFileNum=$mediaTime/$sampleFrequency;

$sampleFileTobeChanged="../InteractiveTrack/sample".(int)$sampleFileNum.".tr";
if(file_exists($sampleFileTobeChanged))
{
    $fp= fopen($sampleFileTobeChanged, "a")  or die("can't open sample file to be changed\n");
    $string="\n".'rightImageIncoming=1;'." \n".'document.getElementById("img_4").src = "'.$imageToDisplay.'";'."\n". 
	    'document.getElementById("links_4").href ="'. $linkToDisplay.'";' ."\n".
            'document.getElementById("links_text_4").innerHTML = "'.$nameToDisplay.'";';
    fwrite($fp, $string);
    fclose($fp);
    echo ' Sample '.(int)$sampleFileNum.' at Media time '.round($mediaTime,1)." sec\n\n".'document.getElementById("img_4").src = "'.$imageToDisplay.'";'."\n". 
	    'document.getElementById("links_4").href ="'. $linkToDisplay.'";' ."\n".
            'document.getElementById("links_text_4").innerHTML = "'.$nameToDisplay.'";';
    //echo "Sample file ".$sampleFileTobeChanged." changed\n";
    
    //Write to a file , which sample has been changed. Its to revert the change
    //at the end of the video playback.
    $fp_sample= fopen("../sampleChanged.txt", "w")  or die("can't open file to write changed sample number");
    fwrite($fp_sample, $sampleFileNum );
    fclose($fp_sample);
    //echo "Changed sample number written to file";
    
}
else
    echo "Sample file not found"

?>