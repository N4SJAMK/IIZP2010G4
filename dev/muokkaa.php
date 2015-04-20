<?php
@session_start();
error_reporting(E_ALL); ini_set('display_errors', '1');
if($_SESSION['logged'] == false)
header("Location: login.php");
else{	
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
		$password = password_hash("foobar". $i, PASSWORD_DEFAULT);
		$collection->update(array("_id" => new MongoId($_GET['user'])), array('$set' =>array("salasana" => $password)));
	}
	if($_GET['do'] == 'change')
	{
		$password = password_hash($_POST['newPassword']. $i, PASSWORD_DEFAULT);
		$collection->update(array("_id" => new MongoId($_GET['user'])), array('$set' =>array("salasana" => $password)));
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
	global $collection3;
	//poistetaan tiketit taulusta
	$query = array('board' => new MongoId($_GET['board']));	
	$cursor = $collection3->find($query);
	foreach ($cursor as $doc){
	$collection3->remove(array("board" => new MongoId($_GET['board'])));
	}
	//poistetaan taulut
	$collection2->remove(array("_id" => new MongoId($_GET['board'])));
	$_SESSION['logged'] = false;
}

header("Location: index.php?page={$_SESSION['page']}");
}
?>