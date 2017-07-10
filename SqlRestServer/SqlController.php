<?php

//Set the REST POST / GET ....etc action

class SqlController {

    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /
     */
    public function test() {
        return "Hello SqlController is running"; //Just for testing
    }

    /**
     * submit : it handles the form submit
     * @url POST /submit
     */
    public function submit() {
        // TODO:  Handle Exception
        $SqlSrv = new SQL();
        // TODO:  Choose SQL or MySql Server
        $SqlSrv->SqlServer_Insert($_POST, "10.0.0.205", "sa", "1234", "TestDB", "dbo.TestTable");

        return array("success" => "");
    }

    
      /**
     * Throws an error
     * 
     * @url GET /error
     */
    public function throwError() {
        throw new RestException(401, "Error");
    }

}
