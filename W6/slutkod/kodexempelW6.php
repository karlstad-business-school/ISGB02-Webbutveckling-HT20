<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F6</title>
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
            <h1>PHP F1</h1>
        </header>

        <main>    
            <?php

                /*
                    Bilder på tärningar (1-6):

                    <img src="https://openclipart.org/download/282132/Die6.svg" />
                    <img src="https://openclipart.org/download/282131/Die5.svg" />
                    <img src="https://openclipart.org/download/282130/Die4.svg" />
                    <img src="https://openclipart.org/download/282129/Die3.svg" />
                    <img src="https://openclipart.org/download/282128/Die2.svg" />
                    <img src="https://openclipart.org/download/282127/Die1.svg" />
                    
                    1. Slumpa ett tal mellan 1 och 6 och skriv ut resultatet.
                    2. Skriv ut resultatet från punkt 1 i ett p-element.
                    3. Med iteration slumpa 6 tal mellan 1 och 6 och skriv ut varje framslumpat tal i 
                        ett eget p-element.
                    4. Summera alla framslumpade tal och skriv ut summan i ett eget p-element.
                    5. Kontrollera om submit-knappen (tryckt på den) och flytta koden från punkt 3 och 4 till innanför selektionen.
                    6. För varje framslupat tal mellan 1 och 6 skriv ut ett img-element som pekar
                        (använd src-attributet) på en bild som matchar en tärning (se ovan).
                    7. Till formuläret lägg till ett gömt fält och namnge det summa.
                    8. Skrivut summan från alla tärningar till värdet (value) för det gömda fältet summa.
                    9. Till formuläret lägg till en submit-knapp som ni namnger rensa.
                    10. Till formuläret lägg till ett gömt fält och namge det antal.
                    11. Skriv ut antalet gånger användaren har tryck på skicka-knappen till värdet (value) för det gömda fältet antal.
                    12. Om användaren har tryck på submit-knappen som du namnget rensa skriv ut en nolla till båda gömda fälten.
                    
                */

                //1.
                /*
                $slumtal = rand(1, 6);
                echo($slumptal);
                */

                //2.
                /*
                echo("<p>$slumptal</p>"); 
                echo("<p>" . $slumptal . "</p>");
                */
                //4.
                /*
                $summa = 0;
                //3.
                for($i = 1; $i <= 6; $i++) {
                     $slumptal = rand(1, 6);
                    echo("<p>$slumptal</p>"); 
                    echo("<p>" . $slumptal . "</p>");
                    
                    //4. 
                    $summa += $slumptal;
                }
                echo("<p>Summan blev: $summa</p>");
                */

                //5.
                /*
                if( isset( $_POST["skicka"] ) ) {

                    //4.
                    $summa = 0;
                    //3.
                    for($i = 1; $i <= 6; $i++) {
                        $slumptal = rand(1, 6);
                        echo("<p>$slumptal</p>"); 
                        echo("<p>" . $slumptal . "</p>");
                        
                        //4. 
                        $summar += $slumptal;
                    }
                    echo("<p>Summan blev: $summa</p>");

                }
                */

                //6.
                define("IMG", "<img src='https://openclipart.org/download/2821");

                //4.
                $summa = 0; //12.
                $antal = 0;

                //
                if( isset( $_POST["skicka"] ) ) {

                    $summa = $_POST["summa"];
                    $antal = $_POST["antal"];
                    
                    //3.
                    for($i = 1; $i <= 6; $i++) {
                        $slumptal = rand(1, 6);
                        
                        echo(IMG . (26 + $slumptal) . "/Die" . $slumptal . ".svg' alt='Tärning " . $slumptal . "' />");
                        
                        //4. 
                        $summa += $slumptal;

                    }

                    $antal++; //11.
                    echo("<p>Summan blev: $summa</p>");
                    echo("<p>Antalet gånger du kastat de 6 tärningarna är: $antal");
                    
                }


            ?>
            <form action="kodexempelW6.php" method="post">
                <input type="submit" name="skicka" value="Skicka" />
                <!-- 9. -->
                <input type="submit" name="rensa" value="Rensa" />
                <!-- 7. -->
                <input type="hidden" name="summa" value="<?php echo($summa); //8. ?>" />
                <!-- 10. -->
                <input type="hidden" name="antal" value="<?php echo($antal); //11 ?>" />
            </form>

        </main>

    </body>

</html>