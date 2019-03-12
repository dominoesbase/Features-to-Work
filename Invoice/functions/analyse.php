<?php
  /*******************************************************************************
   * Invoice - 1.0.20190312.1000
   * Last Revision: 2019/03
   * Contributors: Jorge V. Rodrigues - developer
   ******************************************************************************/

  require "logic.php";
  require "variables.php";

  /**
  * Get queries result
  * @param - phraseElement - phrase cronjob
  * @param - modelElement - element model cronjob
  * @param - stringError - cronjob error
  * @param - fileLocation
  */
  getQueries($phraseElement, $modelElement, $_REQUEST['stringError'], $fileLocation, $logsLocation);
