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
            <h1>PHP och databaser</h1>
        </header>

        <main>    

            <?php

                /*
                    1. Med phpMyAdmin skapa databasen demodice (utf8_swedish_ci)
                    2. Med phpMyAdmin Skapa tabellen i databasen nbrofdices med attributen (8st):
                        id: int, auto increment, primary
                        one-six: int
                        timestamp: timestamp, default CURRENT_TIMESTAMP 
                    3. Lägg in två poster med testdata (du behöver bara ange värden för kolumnerna one-six)
                    4. Koppla upp webbapplikationern mot MariaDB DBHS, databasen demodice, användarnamn root och lösenord ""
                    5. Skapa SQL-frågan där du söker ut alla attribut och rader i tabellen nbrofdices.
                    6. Förbered frågan för att ställas mot till aktuell databas.
                    7. Skicka frågan till aktuall databas.
                    8. Lista resultatet från SQL-frågan genom att skriva ut ett p-element för varje post (rad) som t ex
                        <p>id: 1, one: 1, two: 1, three: 1, four: 1, five: 1, six: 1, timestamp: 2020-12-08 11:27:27</p>
                    9. Summera kolumn one - six.
                    10 Skriv ut summan i ett eget p-element som t ex
                        <p>Summan av alla tärningar är: 24</p>
                    11. Frigör minnet för SQL-frågas resultat
                    12. Stäng ner databaskopplingen.
                    
                    Extra uppgift på egen hand!
                    Lista resultatet från SQL-frågan genom att presentera det i en HTML-tabell!
                */
                  
            ?>

        </main>
        
    </body>

</html>