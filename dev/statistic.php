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
//require "vendor/autoload.php";
require "database.php";

define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collection = new MongoCollection($db, 'users');

$cursor = $collection->find();
/*
$i=0;
foreach ($cursor as $doc) {
	var_dump($doc);
	$i++;
	echo "<br>" .$i. "<br>---------------<br>";
}
*/

echo "vittu mitä paskaa";
var_dump($collection->count());
echo "riviä löydetty käyttäjiä";
?>
</div>
