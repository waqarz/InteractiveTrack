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
$sampleFrequency=1.0;
$sampleFileNum=$mediaTime/$sampleFrequency;

$sampleFileTobeChanged="../InteractiveTrack/sample".(int)$sampleFileNum.".tr";
if(file_exists($sampleFileTobeChanged))
{
    $fp= fopen($sampleFileTobeChanged, "a")  or die("can't open file");
    $string='rightImageIncoming=1; document.getElementById("img_4").src = "'.$imageToDisplay.'";' ;
	    //.'document.getElementById("links_4").href = "https://www.youtube.com/watch?v=eRsGyueVLvQ";' .
            //'document.getElementById("links_text_4").innerHTML = "Click here";';
    fwrite($fp, $string);
    fclose($fp);
    echo "Sample file ".$sampleFileTobeChanged." changed";
}
else
    echo "Sample file not found"

?>