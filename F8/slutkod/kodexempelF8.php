<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F8</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="container p-2">
        <header class="jumbotron text-center">
            <h1>PHP och databaser</h1>
        </header>

        <main>    

            <?php

                function createTable($table) {

                    $htmlTable = "<table class='table table-border'>" . PHP_EOL;

                    $htmlTable .= createTableHead($table[0]);
                    $htmlTable .= createTableBody($table);

                    $htmlTable .= "</table>" . PHP_EOL;

                    return $htmlTable;
                }

                function createTableHead($oneRow) {

                    $htmlHead = "<thead><tr>" . PHP_EOL;

                    foreach($oneRow as $key => $value) {
                        $htmlHead .= "<th>$key</th>";
                    }

                    $htmlHead .= "</tr></thead>" . PHP_EOL;

                    return $htmlHead;
                }

                function createTableBody($table) {

                    $htmlBody = "<tbody>";

                    foreach($table as $row) {
                        $htmlBody .= createTableRow($row);
                    }

                    $htmlBody .= "</tbody>";

                    return $htmlBody;
                }

                function createTableRow($oneRow) {
                    $htmlRow = "<tr>";

                    $htmlRow .= createTableColumns($oneRow);
                   
                    $htmlRow .= "</tr>";

                    return $htmlRow;

                }

                function createTableColumns($oneRow) {
                    
                    $htmlColumns = "";

                    foreach($oneRow as $column) {
                        $htmlColumns .= "<td>$column</td>";
                    }

                    return $htmlColumns;

                }

                try {
                    $dns = "mysql:host=localhost;dbname=demodice;charset=utf8";
                    $userName = "root"; //Skapa gärna en egen användare med lösenord och viss rättighet.
                    $password = "";
                    $dbhOptions = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

                    $dbh = new PDO($dns, $userName, $password, $dbhOptions);


                    $sql = "SELECT * FROM nbrofdices;";

                    $stmt = $dbh->prepare($sql);

                    $stmt->execute();

                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $htmlTable = createTable($data);
                    echo($htmlTable);

                    
                } catch(PDOException $e) { 
                    echo("<p>" . $e->getMessage() . "</p>");
                }

                $stmt = null;
                $dbh = null;

            ?>

        </main>
        
    </body>

</html>