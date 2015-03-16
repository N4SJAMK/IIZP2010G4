var path= "http://student.labranet.jamk.fi/~H3408/IIZP2010G4/content.php";
function base() {
$("#data").load(path + " #base");
$("#heading").load(path +" #baseHeading");  
};
function databaseManagement(){
$("#data").load(path + " #databaseManagement"); 
$("#heading").load(path +" #databaseManagementHeading"); 
};
function userManagement(){
$("#data").load(path + " #users"); 
$("#heading").load(path + " #usersHeading"); 
};
function statisticManagement(){
$("#data").load(path + " #statistics"); 
$("#heading").load(path + " #statisticsHeading"); 
};
function getFile() {
document.getElementById('exportFile').click();
};
function ban() {
;
console.log($($(this).closest('tr').find('td.name').text()));
};

