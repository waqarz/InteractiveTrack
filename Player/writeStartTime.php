<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$startTime=$_POST['startTime'];



$fp= fopen("startTime.txt", "w")  or die("can't open file");
fwrite($fp, $startTime);
fclose($fp);
echo "StartTime written to file";


?> 
