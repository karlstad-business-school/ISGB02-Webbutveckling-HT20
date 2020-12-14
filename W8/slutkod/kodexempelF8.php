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

            
                */

                //När ni är klara placera alla funktioner i en extern PHP-fil och inkludera den med
                //include();

                //Funktionerna



                /*
                    Workshop 20201214
                    1. Placera tabellfunktionerna i en egen PHP-fil, namnge den tabelFunctions.php 
                        och inkludera den i din webbapplikation.

                    2. Skapa en ny PHP-fil och namnge den databaseFunctions.php och inkludera i din webbapplikation.

                    3. I databaseFunctions.php skall du:

                    a). Skapa funktionen openDatabaseConnection() som kopplar webbapplikationen mot databasen och returnerar ett "handtag".
                        Om något går fel skall ett undantag kastas i funktionern och fångas i funktionen för att sedan
                        kastas vidare till "huvudprogrammet"

                        try {



                        } catch(PDOException $e) {
                            throw $e;
                        }

                    b). Skapa funktionen fetchDataFromDatabaseConnection() som tar emot en databaskoppling som byval och 
                        söker ut alla rader och kolumner från nbrofdices samt från funktionen returnernar dessa.
                        Om något går fel skall ett undantag kastas i funktionern och fångas i funktionen för att sedan
                        kastas vidare till "huvudprogrammet".

                    c). Skapa funktionen closeDatabaseConnection() som tar emot en databaskoppling som byref och tilldelar denna null.

                        Om något går fel skall ett undantag kastas i funktionern och fångas i funktionen för att sedan
                        kastas vidare till "huvudprogrammet".
                */

                include("TableFunctions.php");
                include("databaseFunctions.php");

                try {

                    $dbh = openDatabaseConnection();
                   
                    $data = fetchDataFromDatabaseConnection($dbh);

                    //Tillägg för att kontrollera så att inte returen från SELECT:en saknar rader.
                    if(sizeof( $data ) === 0 ) {
                        echo("<p>Ingen data att visa!</p>");
                    } else {
                        $htmlTable = createTable($data);
                        echo($htmlTable);
                    }

                    
                } catch(PDOException $e) { //Men Exception fungerar också!
                    echo("<p>" . $e->getMessage() . "</p>");
                }

                //$stmt = null;
                //$dbh = null;

                /*
                echo("<pre>");
                echo("Före...");
                print_r($dbh);
                echo("</pre>");
                */

                closeDatabaseConnection($dbh);

                /*
                echo("<pre>");
                echo("Efter...");
                print_r($dbh);
                echo("</pre>");
                */

            ?>

        </main>
        
    </body>

</html>