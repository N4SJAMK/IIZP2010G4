<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
@session_start();
if($_SESSION['logged']==false)
header("Location: login.php");
else{
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
$text = "";
$number = 0;
foreach ($cursor as $doc){
 $number++;
}
$text =  "$number";
return $text;
}

function mongoResult2Html($cursor)
	{		
		foreach ($cursor as $doc) {						
			echo "<tr>
			<td class='email'> {$doc["sposti"]} </td>
			<td> {$doc["salasana"]} </td>
		<td> ".KirjoitaTiedot(haeTaulut($doc['_id']))." </td>
			<td><button type='button' class='btn btn-default' data-toggle='collapse' data-target='#{$doc["_id"]}'>Show</button></td>
			<td class='name'> {$doc["Bannitty"]} </td>
			</tr>
		    <tr class='collapse out tablesorter-childRow' id='{$doc["_id"]}'>
			<td colspan='5'>			
			<a href='muokkaa.php?user={$doc['_id']}&do=ban'>Ban</a>   <a href='muokkaa.php?user={$doc['_id']}&do=unBan'>Unban</a>
			<br>
			<a href='muokkaa.php?user={$doc['_id']}&do=reset'>Reset password</a>
			<br>			
			<form action='muokkaa.php?user={$doc['_id']}&do=change' method='post' name='{$doc['_id']}'>
			<input type='text' name='newPassword'>
			<input type='submit' class='btn btn-default' value='Change Password'>
			</form>
			</td></tr>";
		}
	}
?>
<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
	Users
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
				<th>Email/ Username</th>
				<th>Password</th>
				<th>Table Count</th> 
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
<?php } ?>
