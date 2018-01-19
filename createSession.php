<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$sessionId=$_POST['sessionId'];

mkdir("temp/".$sessionId);
//chmod("temp/".$sessionId."/", 0777);
exec("sudo chmod -R 0777 temp/".$sessionId."/");

recurse_copy("InteractiveTrack","temp/".$sessionId."/InteractiveTrack");
recurse_copy("Player/","temp/".$sessionId);
exec("sudo chmod -R 0777 temp/".$sessionId."/");

echo "Session created "."$sessionId";



function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

?>
