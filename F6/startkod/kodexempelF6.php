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

                //htdocs och localhost.
                //F12 Demonstration av fliken Network med fokus på request och response.

                /*

                    1. Skriv ut allt innehåll i $_POST.
                    2. Använd pre-elementet för utskriften från 1.
                    3. Skriv ut innehållet i antal, max och min.
                    4. Använd p-elementet utskriften från 3 och lägg dessutom till en text innan och 
                    eventuellt en eller flera css-egenskaper.
                    5. Kontrollera om användaren har klickat på "skicka"-knappen!
                    6. Kontrollera om stränglängden för antal, max eller min är lika med noll (0).
                    7. Kontrollera om strängen i antal, max och min är numerisk.
                    8. Slumpa det antalet tal antal innehåller och det mellan min och max.
                    9. I ett p-element skriv ut lika många *-tecken som det framslupade talet innehåller.
                    10. Fundera på hur Du tillfälligt i sidan som sådant skulle kunna spara undan t ex summan av av framslumpade tal.

                */

                //1.
                print_r($_POST);

            ?>
            <form action="kodexempelF6.php" method="post">
                
                    <input type="text" name="antal" />
                    <input type="text" name="min" />
                    <input type="text" name="max" />
                    <input type="reset" name="rensa" value="Rensa" />
                    <input type="submit" name="skicka" value="Skicka" />

            </form>

        </main>

    </body>

</html>