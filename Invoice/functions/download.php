<?php
/*******************************************************************************
 * Invoice - Version 1.0.20190113.1500
 * Contributors: Jorge V. Rodrigues - developer
 ******************************************************************************/

require "variables.php";

if(file_exists($fileLocation)) {
   header('Content-Description: File Transfer');
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename='.basename($fileLocation));
   header('Content-Transfer-Encoding: binary');
   header('Expires: 0');
   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
   header('Pragma: public');
   header('Content-Length: ' . filesize($fileLocation));
   ob_clean();
   flush();
   readfile($fileLocation);
   exit;
}
