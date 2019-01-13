<?php
/*******************************************************************************
 * Invoice - Version 1.0.20190113.1500
 * Contributors: Jorge V. Rodrigues - developer
 ******************************************************************************/

  /* SESSION */
  session_start();
  $_SESSION['fileGenerated'];

  /* INFO FILE/LOGS */
  $fileLocation = '../file-queries/file_queries_generated.txt';
  $logsLocation = '../logs/SystemOut.log';

  /* INFO OUTPUT JOB */
  $phraseElement = "INVBR_CREATE=";
  $modelElement = '0000-00-00 00:00:00.000000';
