<?php
require 'Pdo_methods.php';
class Date_time {



// First function checkSubmit for addNote.php class to add notes    

public function checkSubmit($datetime, $note) {
    if(isset($_POST["addnote"])) {
        $message = "";
        if(!$datetime || !$note) {
            $message .= "You must enter a date, time, and note";
        } else {
            $timestamp = strtotime($datetime);

            $pdo = new PdoMethods();

            $sql = "INSERT INTO date_plus_note (date, note) VALUES (:date, :note)";

            $bindings = [
                [':date', $timestamp, 'int'],
                [':note', $note, 'str']
            ];

            $records = $pdo->otherBinded($sql, $bindings);

                if($records === 'error') {
                    return 'There was an error adding the note';
                }
                else {
                    $message .= "Note has been added";
                }
            
            
        }
        return $message;
    }

}



// Second function displayNotes for displayNote.php class to display notes

public function displayNotes($begDate, $endDate, $getNotes) {

if(isset($getNotes)) {    

    $output = "";

    $pdo = new PdoMethods();
    
    $begTimestamp = strtotime($begDate);
    $endTimestamp = strtotime($endDate);

    $sql = "SELECT * FROM date_plus_note WHERE date BETWEEN '$begTimestamp' AND '$endTimestamp' ORDER BY date DESC";

    $records = $pdo->selectNotBinded($sql);

    if($records) {    
    
            $output = "<style>
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
            }
            
            th, td {
                text-align: left;
                padding: 16px;
            }
            
            tr:nth-child(even) {
                background-color: #f2f2f2
            }
            </style>";

        $output .= "<table border='1'>";
        $output .= "<tr><th>Date and Time</th><th>Note</th></tr>";
        
        foreach($records as $row) {
            $convertedDate = date("j/d/Y h:i A", $row['date']);
            $output .= "<tr><td>" . $convertedDate . "</td><td>" .  $row['note'] . "</td></tr>";
        }

        $output .= "</table>";

    } else {
        $output = "No notes found for the date range selected";
    } 
    
    return $output;

  }


}

}

?>
