<?php
require "database.php";

define("DB_NAME", "testi-kanta");
$db = Database::DB(DB_NAME);

$collection = new MongoCollection($db, 'users');

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
			echo "<td><button type='button' class='btn btn-default' data-toggle='collapse' data-target='#{$doc["name"]}'>show more data</button></td>";
			echo "<td><button type='button' class='btn btn-default' onclick='ban()'>Ban me</button></td>";
			echo "<div id='{$doc["name"]}' class='collapse'>
					Tämän käyttäjän id on:	{$doc["name"]}			
					</div></td>";
			echo "</tr>";

		}
	}
?>
<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
	Users
</div>
		
<div class="Data" id="data">


	<table id="Table" class="table table-striped" >
		<thead>
			<tr>
				<th>Id</th>
				<th>Email / Username</th>
				<th>Password</th>
				<th>Show moar data</th>
				<th>Ban</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stmt = haeHenkilot($collection);
			mongoResult2Html($stmt);
			?>
		</tbody>
	</table>
	
<script type="text/javascript">
$(document).ready(function(){
    $("#Table").dataTable( {
        "order": [[ 0, "asc" ]]
    } );
})
</script>

</div>