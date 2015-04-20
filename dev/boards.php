<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
@session_start();
if($_SESSION['logged']==false)
header("Location: login.php");
else{	
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

function mongoResult2Html($cursor, $luku)
	{				
		foreach ($cursor as $doc) {						
			echo "<tr>
			 <td> {$doc["name"]} </td>
			<td> {$doc["description"]} </td>		
			<td> {$doc["createdBy"]} </td>
			<td> {$doc["accessCode"]} </td>
			<td> {$doc["background"]} </td>
			<td><button type='button' class='btn btn-default' data-toggle='collapse' data-target='#{$doc['_id']}'>Show tickets</button></td>
			<td><form action='muokkaa.php?board={$doc['_id']}' method='post'>
				<input type='submit' class='btn btn-default' value='Remove board' name ='killMe'>			
				</form>
				</td>
			</tr>
			<tr class='collapse out tablesorter-childRow' id='{$doc["_id"]}'><td colspan='7'>
				".tiketit2Html(tiketit($doc['_id']))."			
				</td></tr>";
		}
	}

?>
<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
	Boards
</div>
		
<div class="Data" id="data">	
	<div id="pager" class="pager">
		<form>
		<img src="../js/icons/first.png" class="first"/>
		<img src="../js/icons/prev.png" class="prev"/>
		<span class="pagedisplay"></span>
		<img src="../js/icons/next.png" class="next"/>
		<img src="../js/icons/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
		</form>
	</div>
	<hr>
	<table id="Table" class="table tablesorter" >
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
			@mongoResult2Html(haeTaulut());
			?>
		</tbody>
	</table>
</div>
<?php } ?>