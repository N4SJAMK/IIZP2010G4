<link rel="stylesheet" href="styles.css"></link>
<div id="baseHeading">
Baseview;
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
Raah; 
</div>
<div id="usersHeading">
Users;
</div>
<div id="users">
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
      <tr>
         <td>Pekka</td>
         <td>plaa@poo.fi</td>
		 <td>hunter94</td>
		 <td><button type="button" class="btn btn-default" onclick="ban()">Ban me</button></td>
      </tr>
      <tr>
         <td>Raah</td>
         <td>raah@poo.fi</td>
		 <td>salasana</td>
		 <td><button type="button" class="btn btn-default">Ban me</button></td>
      </tr>
   </tbody>
</table>
</div>
<div id="databaseManagementHeading"> 
 Database Management;
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

