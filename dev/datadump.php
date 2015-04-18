<?php

error_reporting(E_ALL); ini_set('display_errors', '1');
@session_start();
if($_SESSION['logged']==false){
require "database.php";
define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);
	$admin = array(
"name" => "admin",
"salasana" => password_hash("admin123", PASSWORD_DEFAULT)
);
$db->admin->save($admin);
header('Location: index.php');
}
else{



require "database.php";
define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);


for ($i=0; $i<=200; $i++)
{
$kayttaja = array(
"sposti" => "sahkoposti" . $i . "@sahkoposti.plingplong",
"salasana" => password_hash("passu". $i, PASSWORD_DEFAULT),
"Bannitty" => 0, 
);
//echo $kayttaja;
$db->user->save($kayttaja);
}


//taulukoidaan käyttäjien id:t
$collection = new MongoCollection($db, 'user');
$cursor = $collection->find();
$plaa = 0;
foreach ($cursor as $doc){	
	$taulu[$plaa] = $doc['_id'];
	$plaa++;
}

//tehdään taulut ja annetaan käyttäjien id:t
for ($i=0; $i<=2000; $i++)
{
$board = array(
"name" => "name" . $i,
"description" => "description". $i ,
"createdBy" =>  $taulu[rand(0,199)],
"accessCode" => "",
"background"=> "none"
);
$db->board->save($board);
}


$collection = new MongoCollection($db, 'board');
$cursor = $collection->find();
$plaa = 0;
foreach ($cursor as $doc){	
	$taulu[$plaa] = $doc['_id'];
	$plaa++;
}

for ($i=0; $i<=8000; $i++)
{
$ticket = array(
"board" =>  $taulu[rand(0,1999)],
"content" => "content". $i ,
"color" => "blue",
);
$db->ticket->save($ticket);
}
echo "Adding done, returning in 2s";

header('refresh:2; index.php');
}
