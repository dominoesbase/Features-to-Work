<?php
  /*******************************************************************************
   * Invoice - Version 1.0
   * Contributors: Jorge V. Rodrigues - developer
   ******************************************************************************/

  require "functions/variables.php";

  $stateFile = '';
  $actionButton = '<button type="submit" class="btn btn-primary first_button">GENERATE SQL</button>';
  $textAreaVisible = '';

  if(file_exists(str_replace('../', '', $fileLocation)) && $_SESSION['fileGenerated'] == 1) {
    $stateFile = '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        Queries generated successfully! <a href="index.php">Generate again</a>.
      </div>';
      $actionButton = "<a class='btn btn-success' href='functions/download.php'>DOWNLOAD QUERIES</a>";
      $textAreaVisible = 'style="display:none;"';
      $_SESSION['fileGenerated'] = 0;
  } else if($_SESSION['fileGenerated'] == 2) {
    $stateFile = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        There was an error generating the queries!
    </div>';
    $_SESSION['fileGenerated'] = 0;
  }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Generate SQL - PAXinvoice2</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/custom/css/custom.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Generate SQL - Invoice</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        </div>
      </div>
    </nav>

    <!-- Info -->
    <?php echo $stateFile; ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">Generate SQL to Invoice</h1>
          <p class="lead">Insert <strong>Invoice Job</strong> OUTPUT to generate SQL queries</p>
          <form id ="myForm">
            <div class="form-group">
              <textarea class="form-control" id="paxError" rows="3" <?php echo $textAreaVisible; ?>></textarea>
            </div>
            <?php echo $actionButton; ?>
          </form>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
      <div class="footer-copyright text-center py-3">Invoice -
        <a href="https://twitter.com/jorgedominoes"> Jorge V. Rodrigues</a>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/js/footer-fixed.js"></script>
    <script>
      $('.first_button').click(function() {
        var paxError = jQuery('#paxError').val();
      $.ajax({
          type: "POST",
          url: "functions/analyse.php",
          data: {stringError: paxError}
        }).done(function( msg ) {
          // will not be used
         });
      });
    </script>
  </body>
</html>
