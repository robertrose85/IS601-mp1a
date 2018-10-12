<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 10/10/18
 * Time: 6:31 PM
 */

main::start("sample.csv");


class main {

    static public function start($filename){

        /** Prints $records */

        $records = csv::getRecords($filename);
        $table = html::generateTable($records);


        }

        /**
        $records = csv::getRecords();
        $table = html::generateTable($records);
        system::printPage($table);
         */
}

class html
{
    public static function generateTable($records)
    {
        foreach ($records as $record) {
            $array = $record->returnArray();
            print_r($array);
        }
    }
}



/** Read the file */

class csv {

    static public function getRecords($filename) {
        /** Passes the file name in, returns the records */

        $fileRead = fopen("$filename","r");

        $fieldNames = array();

        $count = 0;

        while(!feof($fileRead))
        {
            $record = fgetcsv($fileRead, '50');

            if($count == 0){
                $fieldNames = $record;
            } else {
                /* creates an array for each record in the csv using the recordFactory object */
                $row[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }

        fclose($fileRead);
        return $row;

        /**
        $make = 'Mazda';
        $model = 'CX-5';
        $car = AutomobileFactory::create($make, $model);

        $records[] = $car;

        print_r($records);

        return $records;
         */

    }

}

class record
{
    public function __construct(Array $fieldNames = null, $values = null)
    {
        /* $record is the array coming in from the recordFactory object */

        //print_r($fieldNames);
        //print_r($values);
        $record = array_combine($fieldNames, $values);

        foreach($record as $property => $value){
            $this->createProperty($property, $value);
        }

        print_r($this);

    }

    public function returnArray()
    {
        $array = (array) $this;

        return $array;
    }

    public function createProperty($name = 'first', $value = 'bob')
    {
        $this->{$name} = $value;
    }
}
class recordFactory
{
    /* statements says that $array has to be an array and if no data is passed, $array is null */
    public static function create(Array $fieldNames = null, Array $record = null)
    {

        $record = new record($fieldNames, $record);

        return $record;
    }
}





 /** Make the table */
/**
class html {

    static public function generateTable($records) {

        $table = $records;

        return $table;

    }

}
/** Print the table with file data */
/**
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
 */


