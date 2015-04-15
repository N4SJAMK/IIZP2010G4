<?php
//Tänne pitää laittaa tarkistus jos on kirjautuneena1§
session_start();
error_reporting(E_ALL); ini_set('display_errors', '1');
require "database.php";

define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collection = new MongoCollection($db, 'user');
$collection2 = new MongoCollection($db, 'board');
$collection3 = new MongoCollection($db, 'ticket');


if ($_GET['user']){
	global $collection;
	if($_GET['do'] == 'ban')
	{		
		$collection->update(array("_id" => new MongoId($_GET['user'])), array('$set' =>array("Bannitty" => 1)));		
	}
	if($_GET['do'] == 'unBan')
	{		
		$collection->update(array("_id" => new MongoId($_GET['user'])), array('$set' =>array("Bannitty" => 0)));		
	}
	if($_GET['do'] == 'reset')
	{
		$collection->update(array("_id" => new MongoId($_GET['user'])), array('$set' =>array("salasana" => "foobar")));
	}
	if($_GET['do'] == 'change')
	{
		$collection->update(array("_id" => new MongoId($_GET['user'])), array('$set' =>array("salasana" => $_POST['newPassword'])));
	}	
}
if ($_GET['ticket']){
	global $collection3;
	if($_GET['do'] == 'remove')
	{
		$collection3->remove(array("_id" => new MongoId($_GET['ticket'])));		
	}	
}
if($_POST['killMe'])
{
	global $collection2;
	$collection2->remove(array("_id" => new MongoId($_GET['board'])));
}


header("Location: index.php?page={$_SESSION['page']}");
?>