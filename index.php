<!doctype html>
<html><head>
<meta charset="utf-8">
<title>by Sunny Khetarpal</title>
<style>
a:hover {
    background: #FFDD00;
    color: #AAAAAA;
}
 
</style>

  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">
   <script src="JS/modernizr.foundation.js"></script>
</head>

<body>
<?php
//TESTING	
function read_folder_directory($dir)

    {
        $listDir = array();
        if($handler = opendir($dir)) {
            while (($sub = readdir($handler)) !== FALSE) {
                if ($sub != "." && $sub != ".."  && strtolower(substr($sub, strrpos($sub, '.') + 1)) == 'conf') {
                    if(is_file($dir."/".$sub)) {
                        $listDir[] = $sub;
                    }elseif(is_dir($dir."/".$sub)){
                        $listDir[$sub] = ReadFolderDirectory($dir."/".$sub);
                    }
                }
            }
            closedir($handler);
        }
        return $listDir;
    }
?>



<?php
$files = read_folder_directory('/etc/asterisk');

if ($files)
{
	
//$files = array("Ts.conf","adtranvofr.conf","func_odbc.conf"); 
$files = array_map('strtolower', $files);
sort($files);
echo '<div class="twelve columns">
          <div class="row">';
foreach ($files as $f) {
	
     //echo '<table border="0"><tr><td background="img/spacerd.jpg"></td><td>Last modified: ' . date ("d-M-y (m:i:s)",filemtime($f)).'    <div align="center" class="floatLeft"><a   style="text-decoration:none" href="file.php?filename='.$f.'">'.$f.'</a></div></td></tr><td></td></table>'; <a href="#" data-reveal-id="exampleModal" class="button"></a><div id="exampleModal" class="reveal-modal">GO</div>
	 echo '<div class="three mobile-two columns">
                <div class="panel"><a name='.$f.' style="text-decoration:none" href="file.php?filename='.$f.'">'.$f.'</a><br>
				<font style="font-size:10px;">' . date ("M d Y @H:i", filemtime('/etc/asterisk/'.$f)) .'</font>
				
				</div>
            </div>';
	
} 
echo '</div></div>';
}
?>
  <!-- Included JS Files (Compressed)
  <script src="JS/foundation.min.js"></script>
  
  
  <script src="JS/app.js"></script>

  
    <script>
    $(window).load(function(){
      $("#featured").orbit();
    });
    </script>  -->
</body>
</html>
