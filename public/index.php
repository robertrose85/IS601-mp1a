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

        $make = 'Mazda';
        $model = 'CX-5';
        $car = AutomobileFactory::create($make, $model);

        $records[] = $car;

        print_r($records);

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

class Automobile {

    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {

        $this->vehicleMake = $make;
        $this->vehicleModel = $model;

    }

    public function getMakeAndModel() {

        return $this->vehicleMake . ' ' . $this->vehicleModel;
    }
}

class AutomobileFactory {

    public static function create($make, $model){

        return new Automobile($make, $model);
    }
}

