<?php
//export joka toimi winukka koneella
ini_set('display_errors', '1');
$output = array();
$ret=null;
$cmd="mongoexport --db testi-kanta --collection users --out user.json --journal";
exec($cmd,$output,$ret);
var_dump($output, $ret);
?>