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

                /*
                  1. Lägg till undantagshantering!

                  2. Skapa funktioner för att skriva ut data som en HTML-tabell!

                  3. Lägg till klassen HTMLTable.
                  4. Skapa instansiera ett objekt ur klassen.
                  5. Anropa getHTMLTable() och skrivut returdata från metoden.
                */

                //När ni är klara placera alla funktioner i en extern PHP-fil och inkludera den med
                //include();

                //Funktionerna
                function createTable($table) {

                    $htmlTable = "<table class='table table-border'>" . PHP_EOL;

                    //funktionsanrop...
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
                    //Fortsätter efter lunch på Workshopen!

                }

                function createTableColumns($oneRow) {
                    //Fortsätter efter lunch på Workshopen!
                }


                try {
                    $dns = "mysql:host=localhost;dbname=demodice;charset=utf8";
                    $userName = "root"; //Skapa gärna en egen användare med lösenord och viss rättighet.
                    $password = "";
                    $dbhOptions = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

                    $dbh = new PDO($dns, $userName, $password, $dbhOptions);

                    //echo("Fungerar!");

                    $sql = "SELECT * FROM nbrofdices;";

                    $stmt = $dbh->prepare($sql);

                    $stmt->execute();

                    //Visa data som vi fick i retur från databasen
                    /*
                    while( $row = $stmt->fetch() ) {

                        $id = $row["id"];
                        $one = $row["one"];
                        $six = $row["six"];
                        $timestamp = $row["timestamp"];

                        echo("<p>id: $id, one: $one, six: $six, timestamp: $timestamp</p>");

                    }
                    */
                    //echo("Fungerar!");

                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $htmlTable = createTable($data);
                    echo($htmlTable);

                    
                } catch(PDOException $e) { //Men Exception fungerar också!
                    echo("<p>" . $e->getMessage() . "</p>");
                }

                $stmt = null;
                $dbh = null;

            ?>

        </main>
        
    </body>

</html>