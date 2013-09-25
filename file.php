<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>by Sunny Khetarpal</title>
 <link rel="stylesheet" href="stylesheets/app.css">

<script type="text/javascript">
<!--
function confirmation(filename) {
	
	
	var answer = confirm("Are your Sure you want to save " + filename +"?")
	if (answer){
	
	     return true;
	}
	else
	{
		return false;
	}
	
}
//-->
</script>
<script type="text/javascript">
        function HideButtons()
        {
            
			document.getElementById('submit').style.visibility = 'visible';
          
           
        }
		function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
    </script>


<style type="text/css"><!--

div {
 margin: 1px;
 height: 20px;
 padding: 1px;
 border: 1px solid #000;
 width: 275px;
 background: #fff;
 color: #000;
 float: left;
 clear: right;
 top: 38px;
 z-index: 9
}

.percents {
 background: #FFF;
 border: 1px solid #CCC;
 margin: 1px;
 height: 20px;
 position:absolute;
 width:275px;
 z-index:10;
 left: 10px;
 top: 38px;
 text-align: center;
}

.blocks {
 background: #EEE;
 border: 1px solid #CCC;
 margin: 1px;
 height: 20px;
 width: 10px;
 position: absolute;
 z-index:11;
 left: 12px;
 top: 38px;
 filter: alpha(opacity=50);
 -moz-opacity: 0.5;
 opacity: 0.5;
 -khtml-opacity: .5
}

-->
</style>

</head>

<body  bgcolor="#333333">
<span id='ct' style="background-color: #FFFF00"></span>

<?php
include('inc/function.php');


$url = 'http://IP/asterisk/';
$confurl='/etc/asterisk/';
$file = $confurl.$_GET['filename'];
$filename = $_GET['filename'];
$filetemp = $confurl.'tmp/'.$_GET['filename'];
$fileori = $confurl.'ori/'.$_GET['filename'];
$path='/etc/asterisk';
$path2=$confurl.'ori';
$temppath=$confurl.'tmp';
if(isset($_POST['submit']))
{
if (isset($_POST['text']))
{
	
	
    insertdata($temppath,$filename,$_POST['text']);
	unset($_POST);
	copyfile2($path,$filename,$path2);
	//sleep(10);
    copyfile($temppath,$filename,$path);
	 //header(sprintf('Location: %s', $url));
     //header(sprintf('Location: %s', 'file.php?filename='.$file));
	//printf('<a href="%s"><strong><font color="#FFFFFF">DONE</font</strong></a>', htmlspecialchars($url));


header("Location: http://IP/asterisk/datareload.php?filename=".$filename);
?>
	<?php 
	//sleep(10);

    //exit();
		
}
}
if(isset($_POST['rev']))
{
revertlastsaved($path2,$filename,$path);
	unset($_POST);	
	header("Location: http://IP/asterisk/datareload.php?filename=".$filename);
}

if (isset($_POST['rev']))
	
{ 
	
}
$text = file_get_contents($file);
$texttemp = file_get_contents($filetemp);
$textori = file_get_contents($fileori);
echo '<a class="buttontop" href="http://IP/asterisk/#'.$filename.'">'.$filename.'</a>';
$file = '/etc/asterisk/'.$filename;
if (file_exists($file)) {
    echo '<font style="color:white;">Last modified: ' . date ("M d Y @ H:i:s", filemtime($file)) .'</font>';
}
?>

<form action="" method="post" >
<table><tr><td>
<textarea name="text" rows="40" cols="150" style="color: white; background-color: black" onclick="showDiv()"  ><?php echo htmlspecialchars($text) ?></textarea><br>

<input type="reset" class="buttonreset" /><input type="submit" class="buttonrevert" name="rev" id="rev" value="Revert" onClick="return confirm('Are your Sure you want to Revert');" />
<input type="button" name="cancel" id="cancel" value="Back" class="buttonback" onClick="document.location.href='http://IP/asterisk';" /> 
<div id="welcomeDiv"  style="display:none; background-color:#333333; width:auto;">
<input type="submit" name="submit" id="submit" value="Submit" class="button"  onClick="return confirmation('<?php echo $filename;?>');" />
</div>
</td><td><!--TEMP
<textarea name="texttemp" rows="25" cols="50" style="color: white; background-color: black"><?php echo htmlspecialchars($texttemp) ?></textarea><br>
</td><td>ORI
<textarea name="textori" rows="25" cols="50" style="color: white; background-color: black"><?php echo htmlspecialchars($textori) ?></textarea><br>-->
</td></tr></table>
</form>

</body>
</html>