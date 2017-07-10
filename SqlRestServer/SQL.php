<?php

//this class handle the SQL / MySql Server interfacing 
class SQL
{
    //TODO : General Insert method support both SQL or MySql server by seting a FLAG
    
public function SqlServer_Insert($PostArray , $hostname , $username , $password , $dbname, $tablename)
{
    //TODO Handle custom PORT
    $serverName = $hostname; //Ex: serverName\instanceName  or IP  or hostname
    $connectionInfo = array( "Database"=>$dbname, "UID"=>$username, "PWD"=>$password);
    // TODO : Handle diffrement maping between the FORM items and the SQl Server Table Columns names
    // need to use the following ext in the PHP.ini ==>>  extension=php_sqlsrv_7_ts_x64.dll
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    $keys = array_keys($PostArray); // Assume the form items names are the same the columns names in the SQL Server
    $values = array_values($PostArray); // Get the values which will be inesrted into the DB
    $Count = count($keys);
    $query3 = array_fill(0, $Count, '?'); //will be used to complete the SQL Query format
    $query3 = implode(",",$query3);
    
    $query1 = implode(",",$keys);
    
    $sqlquery = "INSERT INTO ". $tablename . " (" . $query1 . ") VALUES (" . $query3 .")";
    $params = $values;

   $stmt = sqlsrv_query( $conn, $sqlquery, $params);
   $errors = sqlsrv_errors();
    // TODO : Handle the ERROR
    sqlsrv_close( $conn );
    
    


}

}
