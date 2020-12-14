<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F8</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style> 
            img {
                width: 15%;
                height: 15%;
                padding-right: 5px;
                padding-bottom: 10px;
            }
        </style>
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

                $dns = "mysql:host=localhost;dbname=demodice;charset=utf8";
                $userName = "root"; //Skapa en egen användare med lösenord!
                $password = "";

                $dbh = new PDO($dns, $userName, $password);

                $sql = "SELECT * FROM nbrofdices;";

                $stmt = $dbh->prepare($sql);

                $stmt->execute();

                while( $row = $stmt->fetch() ) {

                    $id = $row["id"];
                    $one = $row["one"];
                    $six = $row["six"];
                    $timestamp = $row["timestamp"];

                    echo("<p>id: $id, one: $one, six: $six, timestamp: $timestamp</p>");

                }

                $stmt = null;
                $dbh = null;
                  
            ?>

        </main>
        
    </body>

</html>