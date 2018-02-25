<?php
session_start();
include_once("admin_report_navbar.php");
?>
<body class="p-3 mb-2 bg-light text-black">
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
		$("#reportAppend").append("<hr>Report by :<strong>"+report[i][1]+"</strong><br>Content :<strong>"+report[i][3]+"</strong><br><a class='btn btn-primary' href='https://localhost/node_js/admin_report_resolve.php?id="+report[i][0].c[0]+"' style='font-size:15x;'>Resolve</a><hr><br>");	
		}		
	}

</script>
</body>
</html>
