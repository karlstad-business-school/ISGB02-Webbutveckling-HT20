<?php

    function openDatabaseConnection() {

        try {
            
            $dns = "mysql:host=localhost;dbname=demodice;charset=utf8";
            $userName = "root"; //Skapa gärna en egen användare med lösenord och viss rättighet.
            $password = "";
            $dbhOptions = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

            $dbh = new PDO($dns, $userName, $password, $dbhOptions); 
            
            return $dbh;

        } catch(PDOException $e) {
            throw $e;
        }

    }

    function fetchDataFromDatabaseConnection($dbh) {

        try {

            $sql = "SELECT * FROM nbrofdices;";

            $stmt = $dbh->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = null;

            return $data;

        } catch(PDOException $e) {
            throw $e;
        }
    
    }

    function closeDatabaseConnection(&$databaskoppling) { //&-tecknet indikerar att det är byref!
        //Denna funktionen kanske inte alls behöver try catch, varför?
        //Var placerar ni anropet till funtionen?

        $databaskoppling = null;
    }