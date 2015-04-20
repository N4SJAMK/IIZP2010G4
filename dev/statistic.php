<div class="Data" id="data">
<?php 
@session_start();
if($_SESSION['logged']==false)
header("Location: https://www.youtube.com/watch?v=WIKqgE4BwAY");
?>
<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
Statistics
</div>
<div class="Data" id="data">
<?php
require "database.php";
$limit=10;
define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collectionusr = new MongoCollection($db, 'user');
$collectionbrd = new MongoCollection($db, 'board');
$collectiontick = new MongoCollection($db, 'ticket');
$collectionstat = new MongoCollection($db, 'statistic');


echo "<table id='Table' class='table tablesorter' ><th	>amount of users</th><th>amount of tables</th><th>amount of tickets</th>";
echo "<tr><td>";
var_dump($collectionusr->count());
echo "</td><td>";
var_dump($collectionbrd->count());
echo "</td><td>";
var_dump($collectiontick->count());
echo "</td>";
echo "</tr></table>";
$date ='';
if(!isset($_POST['submit'])){
$cursor = $collectionstat->find()->sort(array('_id'=>-1))->limit($limit);
echo "<table id='Table' class='table tablesorter' ><th>user change</th><th>board change</th><th>ticket change</th><th>date</th>";
foreach ($cursor as $doc) {
	$usrchange=$doc['userschange'];
	$tblchange=$doc['boardschange'];
	$tickchange=$doc['ticketschange'];
	$time = $doc['timestamp'];
/*	
if(date("$time")>$date){
	$date = date("$time");
}
*/
	echo "<br>";
	echo $date;
	echo "<tr><td>".$usrchange."</td><td>". $tblchange ."</td><td>". $tickchange ."</td><td>". $time . "</td></tr>";
}
}
else{
$q=array('timestamp' => $_POST['date']);
$cursor = $collectionstat->find($q)->sort(array('_id'=>-1))->limit($limit);
foreach ($cursor as $doc) {
	$usrchange=$doc['userschange'];
	$tblchange=$doc['boardschange'];
	$tickchange=$doc['ticketschange'];
	$time = $doc['timestamp'];
/*	
if(date("$time")>$date){
	$date = date("$time");
}
*/
	echo "<br>";
	echo $date;
	echo "<tr><td>".$usrchange."</td><td>". $tblchange ."</td><td>". $tickchange ."</td><td>". $time . "</td></tr>";
}

}
?>
<form action= 'statistic.php' method = post>
<select name = "date">
<?php
for ($i = 1; $i<30; $i++)
echo '<option value="'.date("d-m-Y-H",strtotime("-".$i."day")).'">'.date("d-m-Y-H",strtotime("-".$i." day")).'</option>';

?>
<option value="1m">1 month</option>;
</select>
<input type='submit' class='btn btn-default' value='select day'>
</div>
