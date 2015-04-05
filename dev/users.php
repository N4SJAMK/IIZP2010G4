<?php
require "database.php";

define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collection = new MongoCollection($db, 'users');
/*
function haeHenkilot($collection, $searcValue) {
$query = array('name' => '$searcValue');	
$cursor = $collection->find($query);
return $cursor;
}
*/
function haeHenkilot($collection) {
$query = array();	
$cursor = $collection->find($query);
return $cursor;
}
function mongoResult2Html($cursor)
	{
		foreach ($cursor as $doc) {
			echo "<tr>";
			echo "<td class='name'> {$doc["name"]} </td>";
			echo "<td class='email'> {$doc["sposti"]} </td>";
			echo "<td> {$doc["salasana"]} </td>";
			echo "<td><button type='button' class='btn btn-default' onclick='ban()'>Ban me</button></td>";
			echo "</tr>";
		}
	}

?>
<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
	Users
</div>
		
<div class="Data" id="data">

<form method='get' action='index.php?page=users'>
Search by username :<br>
<input type='text' name='searcValue' value=''>
<input type='submit' value='search'>
</form>
	<table class="table">
		<thead>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Password</th>
				<th>Ban</th>
			</tr>
		</thead>
		<tbody>
			<?php
			//$searcValue = isset($_GET['searcValue']) ? $_GET['searcValue'] : '';
			//$stmt = haeHenkilot($collection, $searcValue);
			$stmt = haeHenkilot($collection);
			mongoResult2Html($stmt);
			?>
		</tbody>
	</table>	
</div>