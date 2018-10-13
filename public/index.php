<html>

<!-- Grabbed these from bootstrap homework -->
<title>Robert Rose - Mini Project 1</title>
<!--<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" /> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/stylesheets/main.css" />
<h1>
    IS601 - Mini Project 1
</h1>


</html>

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
                self::getHeader($fields);
                self::getValues($values);
                //print_r($fields);
                //print_r($values);

            } else{
                $array = $record->returnArray();
                $values = array_values($array);

                self::getValues($values);
                //print_r($values);
            }
            $count++;
        }
    }
    public static function getHeader($fields)
    {
        //Took format from bootstrap assignment
       echo '<html><body><table class="table table-striped"><thead class="thead-dark"><tr>';

       $header = count($fields);

       for($x = 0; $x < $header; $x++){
            $fieldHeader = $fields[$x];
            echo '<th>' . $fieldHeader . '</th>';
        }
        echo "</tr></thead>";

    }
    public static function getValues($values)
    {
        echo "<tr>";
        // used in counter for for loop
        $val = count($values);

        for($x = 0; $x < $val; $x++)
        {
            //grabs value at [$x] and passes the data to the row. Not sure if this is the best way.
            $data = $values[$x];
            echo '<td>' . $data . '</td>';
        }
        echo "</tr></body></html>";
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