<?php
$notes = "";
if(count($_POST) > 0){
require_once 'Date_time.php';
$dt = new Date_time();
$notes = $dt->displayNotes($_POST['begDate'], $_POST['endDate'], $_POST['getnotes']);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Display Notes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
  <main class="container">
      <div class="container">
        <h1>Display Notes</h1>
      <form action="displayNote.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <a href=addNote.php>Add Note</a>
        </div>

        <div class = "form-group">
        <label for = "begDate">Beginning Date</label>
        <input type="date" class="form-control" id="begDate" name="begDate">
        </div>

        <div class = "form-group">
        <label for = "endDate">Ending Date</label>
        <input type="date" class="form-control" id="endDate" name="endDate">
        </div>

        <div class = "form-group">
        <input type="submit" name="getnotes" id = "getnotes" class="btn btn-primary" value="Get Notes">
        </div>

        <div class="form-group">
        <?php echo $notes;?>
        </div>
      </div> 
    </form>
  </main>   
  </body>
</html>
