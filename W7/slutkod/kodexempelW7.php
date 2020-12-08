<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP W7 - Databaskopplingar</title>
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
            <h1>PHP - W7 Databaskopplingar</h1>
        </header>

        <main>    
            <?php

                /*
                    Först till 100 poäng

                    1. Lägg till funktionalitet som avgör om spelaren har nått 100 poäng eller inte.
                    2. Har användaren nått 100 poäng skall du nollställa summa och antal för nytt spel.
                    3. Koppla upp webbapplikationen mot databasen dicegame (se dicegame.sql).
                    4. Skapa en ny INSERT för kolumnerna nickname, points och rounds i tabellen highscore.
                    5. Förbered frågan för exekvering.
                    6. Matcha namngiven behållare med värde.
                    7. Exekvera frågan.
                    8. Stäng ner databaskopplingen.

                */

                define("IMG", "<img src='https://openclipart.org/download/2821");

                $summa = 0; 
                $antal = 0;
                $nickname = "";

                if( isset( $_POST["skicka"] ) ) {

                    $nickname = $_POST["nickname"];

                    if(strlen($nickname) >= 2) {
                        $summa = $_POST["summa"];
                        $antal = $_POST["antal"];
                        
                        for($i = 1; $i <= 6; $i++) {
                            $slumptal = rand(1, 6);
                            echo(IMG . (26 + $slumptal) . "/Die" . $slumptal . ".svg' alt='Tärning " . $slumptal . "' />");
                            $summa += $slumptal;
                        }

                        $antal++;
                        echo("<p>Summan blev: $summa</p>");
                        echo("<p>Antalet gånger du kastat de 6 tärningarna är: $antal");

                        //Observera att lösningen innehåller mycket redundant kod som vi behöver ta hand om på nästa föreläsning!
                        //1.
                        if($summa >= 100) {
                            
                            //3.
                            $dns = "mysql:host=localhost;dbname=dicegame;charset=utf8";
                            $userName = "root"; //Skapa gärna en egen användare med lösenord!
                            $password = "";
            
                            $dbh = new PDO($dns, $userName, $password);

                            //4.
                            $sql = "INSERT INTO highscore(points, rounds, nickname) VALUES(:points, :rounds, :nickname);";
                            
                            //5.
                            $stmt = $dbh->prepare($sql);

                            //6.
                            $stmt->bindValue(":points", $summa);
                            $stmt->bindValue(":rounds", $antal);
                            $stmt->bindValue(":nickname", $nickname);

                            //7.
                            $stmt->execute();

                            //8.
                            $dbh = null;
                            $stmt = null; //Vid insert, update och delete är inte detta något krav men vid select behövs det!

                            //2.
                            $summa = 0;
                            $antal = 0;

                            echo("<p>För nytt spel tryck på 'Skicka'!</p>");
                        }
                        
                    } else {
                        echo("<p>Ange nickname!</p>");
                    }
                }


            ?>
            <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="nickname" value="<?php echo($nickname); ?>" />
                <input type="submit" name="skicka" value="Skicka" />
                <input type="submit" name="rensa" value="Rensa" />
                <input type="hidden" name="summa" value="<?php echo($summa); ?>" />
                <input type="hidden" name="antal" value="<?php echo($antal); ?>" />
            </form>

            <?php

                //Lista innehållet i tabellen highscore som li-element i ett ol-element.
                //När ni gör utsökningen sortera resultatet i fallande ordning efter rounds.

                $dns = "mysql:host=localhost;dbname=dicegame;charset=utf8";
                $userName = "root"; //Skapa gärna en egen användare med lösenord!
                $password = "";

                $dbh = new PDO($dns, $userName, $password);

                $sql = "SELECT id, nickname, points, rounds, date FROM highscore ORDER BY rounds asc, points desc, date asc LIMIT 10;";
                
                $stmt = $dbh->prepare($sql);

                $stmt->execute();

                echo("<ol>" . PHP_EOL);
                while( $row = $stmt->fetch() ) {

                    //$id = $row["id"];
                    $nickname = $row["nickname"];
                    $rounds = $row["rounds"];
                    $points = $row["points"];
                    $date = $row["date"];

                    echo("<li>$nickname $rounds $points $date</li>");
                }
                echo("</ol>" . PHP_EOL);

                $dbh = null;
                $stmt = null; 

            ?>
        </main>

    </body>

</html>