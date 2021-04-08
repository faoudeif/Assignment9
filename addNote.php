<?php
$notes = "";
if(count($_POST) > 0){
require_once 'Date_time.php';
$dt = new Date_time();
$notes = $dt->checkSubmit($_POST['dateTime'], $_POST['note']);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Note</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <h1>Add Note</h1>

        <div class="form-group">
        <p><?php echo $notes;?></p>
        </div>

        <div class = "form-group">
        <label for "dateTime">Date and Time</label>
        <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">
        </div>

        <div class = "form-group">
        <label for "note">Note</label>
        <textarea id = "note" name = "note" cols = "155" rows = "14"></textarea>
        </div>

        <div class = "form-group">
        <input type="button" id="addnote" class="btn btn-primary" value="Add Note">
        </div>

    </div>    
  </body>
</html>