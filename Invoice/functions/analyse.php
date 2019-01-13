<?php
/*******************************************************************************
 * Invoice - Version 1.0
 * Contributors: Jorge V. Rodrigues - developer
 ******************************************************************************/
 
require "logic.php";
require "variables.php";

getQueries($phraseElement, $modelElement, $_REQUEST['stringError'], $fileLocation, $logsLocation);
