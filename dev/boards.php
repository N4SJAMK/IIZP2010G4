<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
require "database.php";

define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collection2 = new MongoCollection($db, 'board');
$collection3 = new MongoCollection($db, 'ticket');

function haeTaulut() {
global $collection2;	
$cursor = $collection2->find();
return $cursor;
}

function tiketit($board) {
global $collection3;
$query = array('board' => new MongoId($board));	
$cursor = $collection3->find($query);
return $cursor;
}

function tiketit2Html($cursor) {
	$text="";
	foreach ($cursor as $doc)
		$text = $text . " Content: {$doc["content"]} 
			   Color: {$doc["color"]}  <a href='muokkaa.php?ticket={$doc['_id']}&do=remove'>Remove</a> <br> ";
return $text;			   
}

function mongoResult2Html($cursor)
	{		
		foreach ($cursor as $doc) {						
			echo "<tr>";
			echo "<td> {$doc["name"]} </td>";
			echo "<td> {$doc["description"]} </td>";			
			echo "<td> {$doc["createdBy"]} </td>";
			echo "<td> {$doc["accessCode"]} </td>";
			echo "<td> {$doc["background"]} </td>";
			echo "<td><button type='button' class='btn btn-default' data-toggle='collapse' data-target='#{$doc['_id']}'>Show tickets</button></td>";
			echo "<td><form action='muokkaa.php?board={$doc['_id']}' method='post'>
				<input type='submit' value='Remove board' name ='killMe'>			
				</form>
				</td>";
			echo "</tr>";
			echo "<tr class='collapse out' id='{$doc["_id"]}'><td colspan='7'>
				".tiketit2Html(tiketit($doc['_id']))."			
				</td></tr>";
		}
	}
?>
<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
	Users
</div>
		
<div class="Data" id="data">

	
	<p>
		<label for="search">
			<strong>Enter keyword to search </strong>
		</label>
		<input type="text" id="search"/>
	</p>
	<hr>
	<table id="Table" class="table table-striped" >
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Created by</th>
				<th>AccesCode</th>
				<th>Background</th>
				<th>Tickets</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stmt = haeTaulut();
			mongoResult2Html($stmt);
			?>
		</tbody>
	</table>
</div>