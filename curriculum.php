

<?php
$file = file("CVDoctorGalindo.doc");
$file2 = implode("", $file);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=CVDoctorGalindo.doc\r\n\r\n");
header("Content-Length: ".strlen($file2)."\n\n");
echo $file2;
?> 


