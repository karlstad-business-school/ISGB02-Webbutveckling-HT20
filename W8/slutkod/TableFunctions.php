<?php

    function createTable($table) {

        $htmlTable = "<table class='table table-border'>" . PHP_EOL;

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
        $htmlRow = "<tr>";

        $htmlRow .= createTableColumns($oneRow);
        
        $htmlRow .= "</tr>";

        return $htmlRow;

    }

    function createTableColumns($oneRow) {
        
        $htmlColumns = "";

        foreach($oneRow as $column) {
            $htmlColumns .= "<td>$column</td>";
        }

        return $htmlColumns;

    }
