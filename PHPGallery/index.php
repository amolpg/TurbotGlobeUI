<?php
// disable warnings
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('classes/CMySQL.php'); // include service classes to work with database and comments
require_once('classes/CMyComments.php');

if ($_POST['action'] == 'accept_comment') {
    echo $GLOBALS['MyComments']->acceptComment();
    exit;
}

// prepare a list with photos
$sPhotos = '';
$aItems = $GLOBALS['MySQL']->getAll("SELECT * FROM s281_photos;"); // get photos info
foreach ($aItems as $i => $aItemInfo) {
    $sPhotos .= '<div class="photo"><img src="../images/thumb_'.$aItemInfo['filename'].'" id="'.$aItemInfo['id'].'" /><p>'.$aItemInfo['title'].' item</p><i>'.$aItemInfo['description'].'</i></div>';
}

?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8" />
    <title>Photo gallery with comments</title>

    <!-- Link styles -->
    <link href="css/main.css" rel="stylesheet" type="text/css" />

    <!-- Link scripts -->
    <script src="https://www.google.com/jsapi"></script>
    <script>
        google.load("jquery", "1.7.1");
    </script>
    <script src="js/script.js"></script>
</head>
<body>
    <header>
    </header>
	<div  class="container">
	<input name="uploads[]" type="file" multiple="multiple" />  
		<input type='submit' value="Upload File" onclick="<?php saveImages(); ?>" />  
	</div>

    <!-- Container with last photos -->
    <div class="container">
        <h1>
		
		</h1>
		<div class="photo"><img src="../images/thumb_photo1.jpg" id="1" /><p>Item #1 item</p><i>Description of Item #1</i></div>
		<div class="photo"><img src="../images/thumb_photo2.jpg" id="2" /><p>Item #2 item</p><i>Description of Item #2</i></div>
		<div class="photo"><img src="../images/thumb_photo3.jpg" id="3" /><p>Item #3 item</p><i>Description of Item #3</i></div>
		<div class="photo"><img src="../images/thumb_photo4.jpg" id="4" /><p>Item #4 item</p><i>Description of Item #4</i></div>
		<div class="photo"><img src="../images/thumb_photo5.jpg" id="5" /><p>Item #5 item</p><i>Description of Item #5</i></div>
		<div class="photo"><img src="../images/thumb_photo6.jpg" id="6" /><p>Item #6 item</p><i>Description of Item #6</i></div>
		<div class="photo"><img src="../images/thumb_photo7.jpg" id="7" /><p>Item #7 item</p><i>Description of Item #7</i></div>
		<div class="photo"><img src="../images/thumb_photo8.jpg" id="8" /><p>Item #8 item</p><i>Description of Item #8</i></div>
		<div class="photo"><img src="../images/thumb_photo9.jpg" id="9" /><p>Item #9 item</p><i>Description of Item #9</i></div>
        
    </div>

    <!-- Hidden preview block -->
    <div id="photo_preview" style="display:none">
        <div class="photo_wrp">
            <img class="close" src="../images/close.gif" />
            <div style="clear:both"></div>
            <div class="pleft">test1</div>
            <div class="pright">test2</div>
            <div style="clear:both"></div>
        </div>
    </div>
</body></html>

<?php

function saveImages()
{
	//moving uploaded files to a folder.


	$files = array(); 
	$fdata = $_FILES["uploads"]; 


	if (is_array($fdata["name"])) 
	{
		//This is the problem 
		for ($i = 0; $i < count($fdata['name']); ++$i) { 
			$files[] = array( 
				'name' => $fdata['name'][$i], 
				'tmp_name' => $fdata['tmp_name'][$i], 
				); 
		} 
	} else { 
		$files[] = $fdata; 
	} 

	foreach ($files as $_FILES) { 
		// uploaded location of file is $file['tmp_name'] 
		
		$uploaded=0;
		$ext="";

		//generate unique file name using time:
		$newfilename= md5(rand() * time());

		
		$filename =strtolower(basename($_FILES['name']));

		$ext = substr($filename, strrpos($filename, '.') + 1);

		if (($ext == "jpg")||($ext == "JPG")) 
		{
			//Determine the path to which we want to save this file
			$ext=".".$ext;
			$newname = dirname(__FILE__).'/upload/'.$newfilename.$ext;

			if ((move_uploaded_file($_FILES['tmp_name'],$newname)))
			{
				echo "File uploaded successfully!";
				$uploaded=1;
			}
			else
			{
				echo "Error:!";
				print('<p><a href="upload_file.php?">Back</a></p>');
			}
		} else {
			echo "Error: Only .jpg files is allowed less than 500Kb";
		}
	} 
}

?>







	
	





