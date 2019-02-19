<?php
$path = getenv('PATH');
putenv("PATH=$path:/usr/local/bin");
header('Content-Type: application/json;charset=utf-8');
$target_dir = "/Users/jerdFloder/Desktop/SeverMedMind/uploads/";
$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);

// Check if image file is a actual image or fake image

// $command = escapeshellcmd("/Library/Frameworks/Python.framework/Versions/3.7/bin/python3 /Users/panpark/Documents/GitHub/testAPI/NormalClassify.py /Users/panpark/Documents/GitHub/testAPI/testIMG.png") ;
//  $output_thre = shell_exec($command);

$file1 = $_FILES['imageUpload'];
if (is_uploaded_file($file1['tmp_name'])) {
    if (move_uploaded_file($file1['tmp_name'], $target_file)) {
			$command = escapeshellcmd("/Library/Frameworks/Python.framework/Versions/3.7/bin/python3 /Users/jerdFloder/Desktop/SeverMedMind/CheckClassify.py /Users/jerdFloder/Desktop/SeverMedMind/uploads/". basename($_FILES["imageUpload"]["name"])) ;
			$output_thre = exec($command);

			echo $output_thre;
    }
}



?>




