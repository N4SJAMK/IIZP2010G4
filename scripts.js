//path has to be changed to 
var path= "http://student.labranet.jamk.fi/~H3408/IIZP2010G4/content.php";
function databaseManagement(){
$("#data").load(path + " #databaseManagement"); 
// load funktio ei toimi ellei käytä linkkiä kohteeseen
$("#heading").load(path +" #databaseManagementHeading"); 
};
function userManagement(){
$("#data").load(path + " #users"); 
// load funktio ei toimi ellei käytä linkkiä kohteeseen
$("#heading").load(path + " #usersHeading"); 
};
function statisticManagement(){
$("#data").load(path + " #statistics"); 
// load funktio ei toimi ellei käytä linkkiä kohteeseen
$("#heading").load(path + " #statisticsHeading"); 
};