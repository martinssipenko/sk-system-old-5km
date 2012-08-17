// The AJAX function...

function AJAX(){
try{
xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
return xmlHttp;
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
return xmlHttp;
}
catch (e){
alert("Your browser does not support AJAX.");
return false;
}
}
}
}

// Timestamp for preventing IE caching the GET request (common function)

function fetch_unix_timestamp()
{
 return parseInt(new Date().getTime().toString().substring(0, 10))
}

////////////////////////////////
//
// Refreshing the DIV HRONOMETRS
//
////////////////////////////////

function refreshdiv_hronometrs(){

// Customise those settings

var seconds = 1;
var divid = "hronometrs";
var url = "rightInfoHronometrs.php";

// Create xmlHttp

var xmlHttp_three = AJAX();

// No cache

var timestamp = fetch_unix_timestamp();
var nocacheurl = url+"?t="+timestamp;

// The code...

xmlHttp_three.onreadystatechange=function(){
if(xmlHttp_three.readyState==4){
document.getElementById(divid).innerHTML=xmlHttp_three.responseText;
setTimeout('refreshdiv_hronometrs()',seconds*1000);
}
}
xmlHttp_three.open("GET",nocacheurl,true);
xmlHttp_three.send(null);
}

// Start the refreshing process

window.onload = function startrefresh(){
setTimeout('refreshdiv_hronometrs()',seconds*1000);
}