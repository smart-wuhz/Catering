<?php
$dirname='E:\wamp\www\Yii2\backend\web\js';
function ListDir($directory,$str ='') {  
    global $str;    
    if(file_exists($directory)) {                            
        if($dir_handle = @opendir($directory)) {              
            while($filename = readdir($dir_handle)) {          
                if($filename != "." && $filename != "..") {   
                    $subFile = $directory."/".$filename;    
                    if(is_dir($subFile)) {                     
                        ListDir($subFile);                  
                    }    
                    if(is_file($subFile)){
                        $subFile=str_replace('E:\wamp\www\Yii2\backend\web', '', $subFile);
                        $str .=$subFile ."',\r\n";
                    }    
                }
            }
            closedir($dir_handle);                          
        }
    }
}
$str ='';
ListDir($dirname,$str); 
file_put_contents('./a.txt', var_export($str,true));      