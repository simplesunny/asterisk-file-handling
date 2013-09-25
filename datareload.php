 <?php
	//include.php

 
 $socket = fsockopen("localhost","5038", $errno, $errstr, $timeout); 
 fputs($socket, "Action: Login\r\n"); 
 fputs($socket, "UserName: admin\r\n"); 
 fputs($socket, "Secret: password\r\n\r\n"); 

 fputs($socket, "Action: Command\r\n"); 
 fputs($socket, "Command: reload\r\n\r\n"); 
 $wrets=fgets($socket,128); 

 header("Location: http://IP/asterisk/file.php?filename=". $_GET['filename']);
?> 