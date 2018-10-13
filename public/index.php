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
}

class html
{
    public static function generateTable($records)
    {
        $count = 0;

        foreach ($records as $record) {
            if($count == 0){

                $array = $record->returnArray();
                $fields = array_keys($array);
                $values = array_values($array);
                print_r($fields);
                print_r($values);

            } else{
                $array = $record->returnArray();
                $values = array_values($array);

                print_r($values);
            }
            $count++;
        }
    }
}
/** Read the file */

class csv {

    static public function getRecords($filename)
    {
        /** Passes the file name in, returns the records */
        $fileRead = fopen("$filename","r");
        $fieldNames = array();
        $count = 0;

        while(!feof($fileRead))
        {
            $record = fgetcsv($fileRead);
            if($count == 0){
                $fieldNames = $record;
            }
            else {
                /* creates an array for each record in the csv using the recordFactory object */
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }
        //print_r($fieldNames); // Does not work
        //print_r($records); // Does not work
        fclose($fileRead);
        return $records;

    }
}

class record
{
    public function __construct(Array $fieldNames = null, $values = null)
    {
        /* $record is the array coming in from the recordFactory object */

        $record = array_combine($fieldNames, $values);

        foreach($record as $property => $value)
        {
            $this->createProperty($property, $value);
        }
        //print_r($this);
    }

    public function returnArray(){
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
    public static function create(Array $fieldNames = null, Array $values = null)
    {
        $record = new record($fieldNames, $values);
        //print_r($record); // this works
        return $record;
    }
}