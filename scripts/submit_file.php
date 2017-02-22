<?php
/*
* This code is from CS 4WW3 workshop 10, i updated it to link to my S3 bucket
*/

if (!isset($_FILES['profilepic']['error']) || ($_FILES['profilepic']['error'] != UPLOAD_ERR_OK)) {
	echo 'Error uploading file.';
	return;
}

$finfo = new finfo(FILEINFO_MIME_TYPE);
if ($finfo->file($_FILES['profilepic']['tmp_name']) === "image/jpeg") {
	$fileextension = "jpg";
} else {
	echo 'Uploaded file was not a valid image.';
	return;
}

$filehash = sha1_file($_FILES['profilepic']['tmp_name']);
$filename = $filehash . "." . $fileextension;

// move_uploaded_file($_FILES['profilepic']['tmp_name'], "/tmp/" . $filehash . ".jpg");

$awsAccessKey = "AKIAI7734REREN35W25A";
$awsSecretKey = "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";
$bucketName = "besteatuploads";

require("S3.php");

$s3 = new S3($awsAccessKey, $awsSecretKey);
$ok = $s3->putObjectFile($_FILES['profilepic']['tmp_name'], $bucketName, $filename, S3::ACL_PUBLIC_READ);
if ($ok) {
	// $url = 'http://' . $bucketName . '.s3-website-us-east-1.amazonaws.com/' . $filename;
	$url = 'https://s3.amazonaws.com/' . $bucketName . '/' . $filename;
	echo '<p>File upload successful: <a href="' . $url . '">' . $url . '</a></p><img src="' . $url . '" />';
} else {
	echo 'Error uploading file.';
}

?>