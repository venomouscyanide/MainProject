<?php
session_start();
include_once("admin_report_navbar.php");
?>
<body class="p-3 mb-2 bg-light text-black">
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page">Report</li>
	</ol>
</nav>
	<br>
	<div class="container rounded" style="background-color:rgb(232,236,239);">		
		<div class="row">
			<div class="row mx-auto">
				<h2><strong> List of reports</strong><h2>			
			</div>
		</div>	
		<div class="row" >
			<div class="col" id="reportAppend">
			</div>
		</div>
	
	</div>

</div>
<script>
//script for showing the reports
var report=new Array(100);
var count=new Array(100).fill(0);

for(var i=0;i<100;i++)
	{
	report[i]=register.getReport(i);
	if((report[i][1].length>0)&&(report[i][2].c[0]==0))	
		count[i]=1;
	}

//console.log(report[1][0].c[0]);//the id
//console.log(report[0][2].c[0]);//active or no

for(i=0;i<100;i++)
	{
	if(count[i]==1)
		{
		$("#reportAppend").append("<hr><div class='row'><div class='col'>Report by :<strong>"+report[i][1]+"</strong></div></div><div class='row'><div class='col'> Content :<strong>"+report[i][3]+"</strong></div></div><div class='row'><div class='col'><a class='btn btn-primary' href='http://localhost/node_js/admin_report_resolve.php?id="+report[i][0].c[0]+"' style='font-size:15x;'>Resolve</a><button type='button' class='btn btn-outline-danger' data-id="+i+" >Report spam</div></div></div><hr><br>");	
		}		
	}
$('#reportAppend').on('click', function(event) {
    var id1 = $(event.target).closest('button').data('id');
	var show=register.deactivateReport(report[id1][1],id1);
	alert("Marked as spam!");	
	window.location.reload();
	console.log(show);
});

</script>
</body>
</html>
