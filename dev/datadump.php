<?php
require "database.php";
define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);
for ($i=0; $i<=20; $i++)
{
$kayttaja = array(
"sposti" => "sahkoposti" . $i . "@sahkoposti.plingplong",
"salasana" => "passu". $i ,
"Bannitty" => "Ei vielä", 
);
//echo $kayttaja;
$db->users->save($kayttaja);
}
for ($i=0; $i<=20; $i++)
{
$board = array(
"id" => $i,
"name" => "name" . $i,
"description" => "description". $i ,
"createdBy" =>  "kayttaja".rand(0,19),
"accessCode" => "",
"background"=> "none"
);
$db->boards->save($board);
}
