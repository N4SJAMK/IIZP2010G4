<?php
require "database.php";
define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);
for ($i=0; $i<=200; $i++)
{
$kayttaja = array(
"id" => $i, 
"sposti" => "sahkoposti" . $i . "@sahkoposti.plingplong",
"salasana" => "passu". $i ,
"Bannitty" => 0, 
);
//echo $kayttaja;
$db->user->save($kayttaja);
}
for ($i=0; $i<=20; $i++)
{
$board = array(
"id" => $i,
"name" => "name" . $i,
"description" => "description". $i ,
"createdBy" =>  rand(0,19),
"accessCode" => "",
"background"=> "none"
);
$db->board->save($board);
}

for ($i=0; $i<=20; $i++)
{
$ticket = array(
"id" => $i,
"board" =>  rand(0,19),
"content" => "content". $i ,
"color" => "blue",
);
$db->ticket->save($board);
}

