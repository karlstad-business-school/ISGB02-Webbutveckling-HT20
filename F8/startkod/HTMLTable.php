<?php
    /**
    * Klassen HTMLTable skapar en HTMLtabell
    */
    class HTMLTable {

        private $privateHTMLTable = null;

        /**
        * Returnerar den private tabellen.
        */
        public function getHTMLTable() {
            return $this->privateHTMLTable;
        }

        /**
        * Konstruktor
        */
        public function __construct($table) {
            $this->privateHTMLTable = $this->createTable($table);
        }

        /**
        * Skapar tabellen.
        */
        private function createTable($table) {
            $htmlTable = "<table class='table table-striped'>" . PHP_EOL;

            $htmlTable .= $this->createTableHead($table[0]);
            $htmlTable .= $this->createTableBody($table);

            $htmlTable .= "</table>" . PHP_EOL;

            return $htmlTable;
        }
        
        /**
        * Skapar tabellhuvudet.
        */
        function createTableHead($oneRow) {

            $htmlHead = "<thead><tr>" . PHP_EOL;

            foreach($oneRow as $key => $value) {
                $htmlHead .= "<th>$key</th>";
            }
            $htmlHead .= "</tr></thead>" . PHP_EOL;

            return $htmlHead;
        }
        
        /**
        * Skapar tabellkroppen.
        */
        private function createTableBody($table) {
            $htmlBody = "";

            foreach($table as $row) {
                $htmlBody .= $this->createTableRow($row);
            }

            return $htmlBody;
        }

        /**
        * Skapar en tabellrad.
        */
        private function createTableRow($row) {
            $htmlRow = "<tr>";

            $htmlRow .= $this->createTableColumns( $row );

            $htmlRow .= "</tr>";

            return $htmlRow;
        }

        /**
        * Skapar alla kolumner.
        */
        private function createTableColumns($row) {
            $htmlColumns = "";

            foreach($row as $column) {
                $htmlColumns .= "<td>" . $column . "</td>";
            }

            return $htmlColumns;
        }

    }