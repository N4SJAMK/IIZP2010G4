<?php
require "database.php";
define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

for ($i=0; $i<=20; $i++)
{
$kayttaja = array(
"name" => "kayttaja" . $i,
"sposti" => "sahkoposti" . $i . "@sahkoposti.plingplong",
"salasana" => "passu". $i , 
);
//echo $kayttaja;
$db->users->save($kayttaja);
}
