<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
require "database.php";

define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collection = new MongoCollection($db, 'user');
$collection2 = new MongoCollection($db, 'board');

function haeHenkilot() {	
global $collection;
$cursor = $collection->find();
return $cursor;
}

function haeTaulut($kayttaja) {
global $collection2;
$query = array('createdBy' => new MongoId($kayttaja));	
$cursor = $collection2->find($query);
return $cursor;
}

function KirjoitaTiedot($cursor){
$text = "User has made:";
$number = 0;
foreach ($cursor as $doc){
 $number++;
}
$text = $text . " ". $number . " Table(s).";
return $text;
}

function mongoResult2Html($cursor)
	{		
		foreach ($cursor as $doc) {						
			echo "<tr>";
			echo "<td class='email'> {$doc["sposti"]} </td>";
			echo "<td> {$doc["salasana"]} </td>";
			echo "<td><button type='button' class='btn btn-default' data-toggle='collapse' data-target='#{$doc["_id"]}'>Show</button></td>";
			echo "<td class='name'> {$doc["Bannitty"]} </td>";
			echo "</tr>";
		    echo "<tr class='collapse out' id='{$doc["_id"]}'>
			<td colspan='4'>
			".KirjoitaTiedot(haeTaulut($doc['_id']))." 
			<br>
			<a href='muokkaa.php?user={$doc['_id']}&do=ban'>Ban</a>   <a href='muokkaa.php?user={$doc['_id']}&do=unBan'>Unban</a>
			<br>
			<a href='muokkaa.php?user={$doc['_id']}&do=reset'>Reset password</a>
			<br>			
			<form action='muokkaa.php?user={$doc['_id']}&do=change' method='post' name='{$doc['_id']}' >
			<input type='text' name='newPassword'>
			<input type='submit' value='Change Password'>
			</form>
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
				<th>Email/ Username</th>
				<th>Password</th>
				<th>Data / options</th>
				<th>Banned?</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stmt = haeHenkilot();
			mongoResult2Html($stmt);
			?>
		</tbody>
	</table>
</div>