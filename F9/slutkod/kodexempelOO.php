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

                include("HTMLTable.php");

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

                    $htmlTableObject = new HTMLTable($data);
                    echo( $htmlTableObject->getHTMLTable() );

                    
                } catch(PDOException $e) { 
                    echo("<p>" . $e->getMessage() . "</p>");
                }

                $stmt = null;
                $dbh = null;

            ?>

        </main>
        
    </body>

</html>