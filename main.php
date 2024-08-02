<?php
spl_autoload_extensions(".php");
spl_autoload_register();
require_once 'vendor/autoload.php';


$obj = \Helpers\RandomGenerator::company();

echo $obj->toString();