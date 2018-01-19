<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
 //First get the sample file number which has been changed.
 
if(file_exists("sampleChanged.txt"))
{
    $sample_num=file_get_contents("sampleChanged.txt");
    //Go to the changed sample file and undo the changes done by broadcaster GUI.
    $fileToChange="InteractiveTrack/sample".(int)$sample_num.".tr";
    if(file_exists($fileToChange))
    {
        $contents=file_get_contents($fileToChange);
        $pos_to_replace=strpos($contents,"rightImageIncoming");
        $new_contents=substr($contents,0,$pos_to_replace);
        file_put_contents($fileToChange, $new_contents);
        echo "Reinitialized sample".$sample_num.".tr";
    }
     //Empty the file. Or else there is are chances of deleting lines from the sample files
     //when page is refreshed or the video is completely played without modifying samples using GUI.
    file_put_contents("sampleChanged.txt", "");
    
} 
 


 ?>