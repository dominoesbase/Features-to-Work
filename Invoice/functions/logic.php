<?php
  /*******************************************************************************
   * Invoice - 1.0.20190312.1000
   * Last Revision: 2019/03
   * Contributors: Jorge V. Rodrigues - developer
   ******************************************************************************/

   /**
   * Get queries result
   * @param - phraseElement - phrase cronjob
   * @param - modelElement - element model cronjob
   * @param - stringError - cronjob error
   * @param - fileLocation
   */
   function getQueries($phraseElement, $modelElement, $stringError, $fileLocation, $logsLocation)
   {
    $occurrences = array();
    $currentYear = date('Y');
    $explodedString = explode($phraseElement, $stringError);
    $lineCount = 0;
    $myfile = fopen($fileLocation, "w");

    foreach($explodedString as $elementExploded) {
      if(strpos($elementExploded, 'Exception') == true && substr($elementExploded, 0, 4) == $currentYear) {
          fwrite($myfile,  "UPDATE TBCLIDOC SET MAIL = 'gtrt@email.com' WHERE INVBR_CREATE = TO_TIMESTAMP('". str_replace(" ", "", substr($elementExploded, 0, strlen($modelElement)))
         ."', 'YYYY-MM-DD HH24.MI.SS,FF9');");
          fwrite($myfile, PHP_EOL);
      }
    }

    $readFile = fopen($fileLocation, "r");

    while(!feof($readFile)){
      $lineCount++;
      $line = fgets($readFile);
    }

    if($lineCount == 1) {
      printLogTerminal("File not generated!");
      printLogFile("File not generated!", $logsLocation);
      $_SESSION['fileGenerated'] = 2;
    } else {
      printLogTerminal("File generated successfully!");
      printLogFile("File generated successfully!", $logsLocation);
      $_SESSION['fileGenerated'] = 1;
    }
   }

  /**
  * Print log info - console
  * @param - info - log information
  */
  function printLogTerminal($info)
  {
    error_log($info, 0);
  }

  /**
  * Print log info - SystemOut.log
  * @param - info - log information
  * @param - logsLocation - log location
  */
  function printLogFile($info, $logsLocation)
  {
    error_log('[ ' . date("Y.m.d") .'##' .
    date("h:i:sa") . ' ] - STATE:  '. $info .PHP_EOL, 3, $logsLocation);
  }
