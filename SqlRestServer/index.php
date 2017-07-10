<?php

require 'RestServer.php';
require 'SqlController.php';
require 'SQL.php';



$server = new RestServer('debug');
$server->addClass('SqlController'); //Load Custom REST action
$server->handle(); // Starting REST Server
