<?php
session_start();
include_once("admin_report_navbar.php");
$id=$_GET['id'];
?>
<body class="p-3 mb-2 bg-light text-black"> 
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="http://localhost/node_js/admin_report.php">Report</a></li>
		<li class="breadcrumb-item active" aria-current="page">Review</li>
	</ol>
</nav>
	<br>
	<div class="container rounded" style="background-color:rgb(232,236,239);">		
		<div class="row">
			<div class="row mx-auto">
				<h2><strong> Report Summary for ID: <?php echo $id;?></strong><h2>			
			</div>
		</div>	
		<div class="row" >
			<div class="col" id="appendReportName">

			</div>
		</div>
		<div class="row" >
			<div class="col" id="appendReportContent">
			
			</div>
		</div>	
		<div class="container-flex" id="appendProfile" style="font-size:20px;font-weight:bold;">
			
		</div>		
		
	</div>
</body>
<script>
var id=<?php echo $id;?>;
var report=register.getReport(id);var admin;var Admin;
var edits = new Array(100).fill(0);
var count=new Array(100).fill(0);
for(var i=0;i<100;i++)
	{
		edits[i]=register.allEdits(i,report[1]);		
		if(!jQuery.isEmptyObject(edits[i][0]))		
			count[i]=1;
			
	}
console.log(edits[1]);
$("#appendReportName").append("<h3>Report by :<strong>"+report[1]+"</strong></h3>");
$("#appendReportContent").append("<h4>"+report[3]+"</h4>");
for(i=0;i<100;i++)
{
	if(count[i]==1)
	{
	var myDate = new Date( edits[i][5].c[0] *1000);
	var date=myDate.toLocaleString()
	admin=edits[i][8].c[0];
	if(admin==1)
		Admin="Yes";
	else
		Admin="No";
	$("#appendProfile").append("<hr><div class='row'><div class='row mx-auto'><h2>Profile Information</h2></div></div><div class='row'><div class='row mx-auto'><img src='"+edits[i][4]+"' alt='Profile Picture' class='img-thumbnail' height=200px width=200px></img></div></div><div class='row offset-md-3'><div class='col'>Name</div><div class='col'>"+edits[i][0]+"</div></div><div class='row offset-md-3'><div class='col'>Email</div><div class='col'>"+report[1]+"</div></div><div class='row offset-md-3'><div class='col'>Address</div><div class='col'>"+edits[i][7]+"</div></div><div class='row offset-md-3'><div class='col'>Password</div><div class='col'>"+edits[i][2]+"</div></div><div class='row offset-md-3'><div class='col'>Age</div><div class='col'>"+edits[i][3].c[0]+"</div></div><div class='row offset-md-3'><div class='col'>Timestamp</div><div class='col'>"+date+"</div></div><div class='row offset-md-3'><div class='col'>Admin</div><div class='col'>"+Admin+"</div></div><div class='row offset-md-3'><div class='col'>Mobile No</div><div class='col'>"+edits[i][6].c[0]+"</div></div><div class='row'><div class='row mx-auto'><button class='btn btn-primary' data-id="+i+">Set as currrent profile</button></div></div><hr><br>");
	}
}
//once button is clicked we will register the person again and deactivate the claim
$('#appendProfile').on('click', function(event) {
    var id1 = $(event.target).closest('button').data('id');
	if(id1>=0)
    	{
		console.log("You clicked on button id:", id1);
		var ID=register.getUserByEmail(report[1]);
		var index=ID[0].c[0];
		//var show=register.registerUser(index,$("#name").val(),$("#email").val(),$("#password").val(),$("#age").val(),$("#address").val(),$("#mobile").val(),1,$("#optionalMessage").val(),url,{gas:400000});
		var hash=register.registerUser(index,edits[id1][0],report[1],edits[id1][2],edits[id1][3].c[0],edits[id1][7],edits[id1][6].c[0],edits[id1][8].c[0],"",edits[id1][4],{gas:400000});		
		console.log(hash);
		var show=register.deactivateReport(report[1],id);
		console.log(show);
		alert("Made selection as active profile!");
		window.location.href="http://localhost/node_js/admin_report.php";
		}
});
</script>
</html>
