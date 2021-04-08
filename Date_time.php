<?php
require 'Pdo_methods.php';
class Date_time {

public function checkSubmit($datetime, $note) {
$message = "";
    if(isset($_POST['addnote'])) {
        if(!isset($datetime)) {
            $message .= "You must enter a date.";
        } else {
            $timestamp = strtotime($datetime);

            $pdo = new PdoMethods();

            $sql = "INSERT INTO datenote (date, note) VALUES (:date, :note)";

            $bindings = [
                [':date', $timestamp, 'int'],
                [':note', $note, 'str']
            ];

            $records = $pdo->otherBinded($sql, $bindings);

            if($records === 'error') {
                return 'There was an error adding the note';
            }
            else {
                $message .= "<a href=displayNote.php>Display Notes</a>";
            }
        }

    }
return $message;

}

public function displayNotes() {

    $pdo = new PdoMethods();

    $sql = "SELECT * FROM datenote ORDER BY date DESC";

    $records = $pdo->selectNotBinded($sql);

    $output = "<table border='1'>";
    foreach($records as $row) {
        $output .= "<tr><td>" . $row['date'] . "</td><td>" . $row['note'] . "</td></tr>";
    }
    $output .= "</table>";

return $output;
}

}

?>