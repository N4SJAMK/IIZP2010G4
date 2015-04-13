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
			echo "<td class='email'> {$doc["sposti"]} </td>";
			echo "<td> {$doc["salasana"]} </td>";
			echo "<td><button type='button' class='btn btn-default' data-toggle='collapse' data-target='#{$doc["name"]}'>show more data</button></td>";
			echo "<td><button type='button' class='btn btn-default' onclick='ban()'>Ban me</button></td>";
			echo "<td class='name'> {$doc["Bannitty"]} </td>";
			echo "</tr>";
			echo "<tr class='collapse out' id='{$doc["name"]}'><td colspan='5'> raah </td></tr>";
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
	<script>
	$(document).ready(function()
	{
		$('#search').keyup(function()
		{
			searchTable($(this).val());
		});
	});

	function searchTable(inputVal)
	{
		var table = $('#Table');
		table.find('tr').each(function(index, row)
		{
			var allCells = $(row).find('td');
			if(allCells.length > 0)
			{
				var found = false;
				allCells.each(function(index, td)
				{
					var regExp = new RegExp(inputVal, 'i');
					if(regExp.test($(td).text()))
					{
						found = true;
						return false;
					}
				});
				if(found == true)$(row).show();else $(row).hide();
			}
		});
	}
	
	</script>
</div>