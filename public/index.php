<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 10/10/18
 * Time: 6:31 PM
 */

main::start();

class main {

    static public function start(){
        $records = csv::getRecords();
        $table = html::generateTable($records);
        system::printPage($table);
    }
}

/** Read the file */
class csv {

    static public function getRecords() {

        $records = 'test111';

        return $records;

    }

}
 /** Make the table */
class html {

    static public function generateTable($records) {

        $table = $records;

        return $table;

    }

}
/** Print the table with file data */
class system {

    static public function printPage($page) {

        echo $page;

    }

}

