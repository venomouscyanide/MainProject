<?php
session_start();
include_once("admin_logs_navbar.php");
?>
<body class="p-3 mb-2 bg-light text-black">

<div class="jumbotron hey2">
<div class="row mx-auto">
		<div class="row md-12 mx-auto">
			<div class="col"><strong><h3>
				Get log data
			</strong><h3></div>		
			</div>
		</div>
		<br>
		<div class="row ">
			<div class="col "><strong><h4>
				Select User
				</strong></h4>
			</div>		
			<div class="col" id="appendList">
				<div class="form-group">		
  					<select class="form-control" id="appendUsers">
    					
  					</select>
				</div> 
			</div>	
		</div>
		<br>
		<div class="row md-12 mx-auto">
			<div class="row mx-auto">
				<div class="col" >
					<button type="button" class="btn btn-primary" id="getLogs">Get Logs</button>	
				</div>
			</div>
		</div>
		<br>	
		<div class="row mx-auto">
			<div class="row mx-auto">
				<div class="col" id="appendLogs">
				</div>	
			</div>
		</div>
</div>
</body>
<script>
var userList=new Array(1000);var w=0;
for(var i=0;i<100;i++)
	{flag=0;
	user=register.getUserByID(i);
	
	for(var j=0;j<100;j++)
		{
		if(userList[j]==user)
			{
			flag=1;
			}
		}
	if(flag==0)
		{
		userList[w++]=user;
		}	
	}
for(var k=0;k<w;k++)
	{
	if(!jQuery.isEmptyObject(userList[k][0]))
	$("#appendUsers").append("<option>"+userList[k]+"</option>");
	}
$("#getLogs").click(function(){
$("#appendLogs").html("");
var email=$("#appendUsers").val();
var count=register.getLogCount(email);
for(var k=0;k<count;k++)
	{var logData=register.getLogDataByCount(email,k);
	$("#appendLogs").append("<br>"+logData);
	}
});
</script>
</html>
