<div id="baseHeading">
<?php 
echo "Baseview";
?>
</div>
<div id="base">
<p>
Select what data you want to see, or wait till someone updates this
to show something; 
</P>
</div>
<div id="statisticsHeading">
<?php 
echo "Statistics";
?>
</div>
<div id="statistics">
<?php
echo "Raah"; 
//jtn koodia millä statistiikkaa näkyviin
?>
</div>
<div id="usersHeading">
<?php 
echo "Users";
?>
</div>
<div id="users">
<?php
echo "Pöö"; 
//jtn koodia millä käyttäjät näkyviin
?>
</div>
<div id="databaseManagementHeading">
<?php 
echo "Database Management";
?>
</div>
<div id="databaseManagement">
<?php 
//Tänne jotain hienoa php koodia
?>
<button>Snapshot</button>
<button onclick= "getFile()"> Export </button> 
<input type="file" id="exportFile" value="exportFileValue">
<!--Nyt todennäköisesti saa GETillä exportFileValuella sen filun kiinni
	ja varmasti saa getElementBy id:llä-->
</div>

