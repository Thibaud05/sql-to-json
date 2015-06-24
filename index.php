<?php
/*
 * User: TGRA
 * Date: 23/06/15
 * Time: 09:23
 */
require_once 'class/sqlToJson.class.php';

$json = new sqlToJson();

$json->addSql("data","SELECT col1 as data1, col2 FROM demo");
$json->addSql("users","SELECT * FROM user");

$json->get();
?>