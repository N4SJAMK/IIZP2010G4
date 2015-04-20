<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");
$date = date("d-m-Y-H-i-s");
require "database.php";

define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collectionusr = new MongoCollection($db, 'user');
$collectionbrd = new MongoCollection($db, 'board');
$collectiontick = new MongoCollection($db, 'ticket');
$collectionstat = new MongoCollection($db, 'statistic');

$usersall = $collectionusr->count();
$boardsall = $collectionbrd->count();
$ticksall = $collectiontick->count();
$userchange =$collectionstat->find();
//$q = array('statistic')
$cursor = $collectionstat->find()->sort(array('_id' =>-1))->limit(1);
foreach($cursor as $doc){
$users =$usersall-$doc["amountofusers"];
$boards = $boardsall-$doc["amountofboards"];
$ticks = $ticksall-$doc["amountoftickets"];
}
if (isset($users) || $users != null)
{
echo $users;
echo $boards;
echo $ticks;


$statisticchange = array(
"amountofusers" =>  $usersall,
"amountofboards" => $boardsall,
"amountoftickets" => $ticksall,
"userschange" => $users,
"boardschange" => $boards,
"ticketschange" => $ticks,
"timestamp" => $date 
);
}
else{
$statisticchange = array(
"amountofusers" =>  $usersall,
"amountofboards" => $boardsall,
"amountoftickets" => $ticksall,
"userschange" => '',
"boardschange" => '',
"ticketschange" => '',
"timestamp" => $date 
);
}
$db->statistic->save($statisticchange);

?>
