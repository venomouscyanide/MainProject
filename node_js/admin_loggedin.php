<?php
session_start();
if($_SESSION['email']==NULL)
{
$_SESSION['email']=$_GET['email'];
}
include_once("admin_loggedin_navbar.php");
?>
<script src="static/js/moment.min.js"></script>
<body class="p-3 mb-2 bg-light text-black">
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page">Election-info</li>
	</ol>
</nav>
<div class="jumbotron">
	<div class="row">
			<div class="row-md-12 mx-auto" style="color:black;"><h3><strong>
			List of all elections		
			</strong></h3></div>
	</div>
	<div class="row">
			<div class="row-md-12 mx-auto" style="color:black;"><h4>
			<table class="table table-striped table-dark table-hover">
				<thead>	
					<tr>
						<th scope="col">ID</th>
						<th scope="col">No of candidates</th>
						<th scope="col">No of participants</th>	
						<th scope="col">Start time</th>
						<th scope="col">End time</th>
						<th scope="col">Active/Inactive</th>
						<th scope="col">More info</th>
					</tr>
				</thead>
				<tbody id="appendRow">
					
				</tbody>	
						
			</table>	
			</h4></div>
	</div>	
</div>
<script>
//getting current date
var today = moment().format('MM/DD/YYYY');
var dayCurrentString=today.slice(3,5);var dayCurrentInt=parseInt(dayCurrentString);
var monthCurrentString=today.slice(0,2);var monthCurrentInt=parseInt(monthCurrentString);
var yearCurrentString=today.slice(6,10);var yearCurrentInt=parseInt(yearCurrentString);
//console.log(dayCurrentInt);console.log(monthCurrentInt);console.log(yearCurrentInt);
//var dayCurrentString=today.splice(0,2);var dayCurrentInt=parseInt(dayCurrent);

var electionID= new Array(1000);var flag;var j=0;var countCandidate=0;var countParticipant=0;
var candidates=new Array(1000);var participants= new Array(1000);
for(var i=0;i<50;i++)
	{	
		flag=register.returnElectionID(i);
		if(!jQuery.isEmptyObject(flag[1]))
		{	
			electionID[j++]=register.returnElectionID(i);
		}
	}
//console.log(electionID);
//console.log("j value is "+j);		
for(i=0;i<j;i++)
{
//trying to return the candidate/ participant list

var c=1;var d=1;
	for(var k=1;k<=10;k++)
	{
		flag=register.returnCandidateList(electionID[i][0].c[0],k);	
		candidates[c++]=flag;
		//console.log(candidates[c]);c++;
			
	}		
			
//}
	for(var k=1;k<=10;k++)
	{
		flag=register.returnParticipantList(electionID[i][0].c[0],k);	
		participants[d++]=flag;
		//console.log(candidates[d]);d++;
			
	}
	for(var k=1;k<c;k++)
	{
		if(!jQuery.isEmptyObject(candidates[k][0]))
			{countCandidate++;}	
	}
	for(var k=1;k<d;k++)
	{
		if(!jQuery.isEmptyObject(participants[k][0]))
			{countParticipant++;}	
	}
//getting start dates
var start=electionID[i][1];
var dayStartString=start.slice(3,5);var dayStartInt=parseInt(dayStartString);
var monthStartString=start.slice(0,2);var monthStartInt=parseInt(monthStartString);
var yearStartString=start.slice(6,10);var yearStartInt=parseInt(yearStartString);
//console.log(dayStartInt);console.log(monthStartInt);console.log(yearStartInt);
//comparing the dates. both flags 0 means it is active else not.
var flag1=0;var flag2=0;

if(yearCurrentInt<yearStartInt)
	{
	flag1=1;
	}
else if(yearCurrentInt==yearStartInt)
	{
	if(monthCurrentInt<monthStartInt)
		{flag1=1;}
	else if(monthCurrentInt==monthStartInt)
		{
		if(dayCurrentInt<dayStartInt)
			{flag1=1;}
		else if(dayCurrentInt==dayStartInt)
			{flag1=0;}			
		}
	}

//console.log("flag 1:"+flag1);


//getting end dates
var end=electionID[i][2];
var dayEndString=end.slice(3,5);var dayEndInt=parseInt(dayEndString);
var monthEndString=end.slice(0,2);var monthEndInt=parseInt(monthEndString);
var yearEndString=end.slice(6,10);var yearEndInt=parseInt(yearEndString);
//console.log(dayEndInt);console.log(monthEndInt);console.log(yearEndInt);
if(yearCurrentInt>yearEndInt)
	{
	flag2=1;
	}
else if(yearCurrentInt==yearEndInt)
	{
	if(monthCurrentInt>monthEndInt)
		{flag2=1;}
	else if(monthCurrentInt==monthEndInt)
		{
		if(dayCurrentInt>dayEndInt)
			{flag2=1;}
		else if(dayCurrentInt==dayEndInt)
			{flag2=0;}			
		}
	}

console.log("flag 2:"+flag2);
var active;var activity;
if((flag1==0)&&(flag2==0))
	{
	active="Active";
	activity=1;	
	}
else
	{
	activity=0;
	active="Inactive";
	}
	$("#appendRow").append("<tr><th scope='row'>"+electionID[i][0].c[0]+"</th><td>"+countCandidate+"</td><td>"+countParticipant+"</td><td>"+electionID[i][1]+"</td><td>"+electionID[i][2]+"</td><td>"+active+"</td><td><a href='http://localhost/node_js/admin_election_info.php?id="+electionID[i][0].c[0]+"&activity="+activity+"' class='btn btn-outline-light btn-sm' >More info</a></td></tr>");
countParticipant=0;countCandidate=0;
}
</script>
</body>
</html>
