<?php
function copyfile($temppath,$file,$path)
{
    copy($temppath.'/'.$file, $path.'/'.$file);
}
function copyfile2($path,$file,$path2)
{
    copy($path.'/'.$file, $path2.'/'.$file);
}
function insertdata($temppath,$file,$text)
{
	file_put_contents($temppath.'/'.$file, $text);
}
function revertlastsaved($path2,$file,$path)
{
	copy($path2.'/'.$file, $path.'/'.$file);
}
function timeBetween($start){
    	$time = $time - $start;
    
    	if($time <= 60){
    		return 'one moment ago';
    	}
    	if(60 < $time && $time <= 3600){
    		return round($time/60,0).' minutes ago';
    	}
    	if(3600 < $time && $time <= 86400){
    		return round($time/3600,0).' hours ago';
    	}
    	if(86400 < $time && $time <= 604800){
    		return round($time/86400,0).' days ago';
    	}
    	if(604800 < $time && $time <= 2592000){
    		return round($time/604800,0).' weeks ago';
    	}
    	if(2592000 < $time && $time <= 29030400){
    		return round($time/2592000,0).' months ago';
    	}
    	if($time > 29030400){
    		return date('M d y at h:i A',$start);
    	}
    }   
?>