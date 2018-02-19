<?php
session_start();
include_once("admin_loggedin_navbar.php");
$id=$_GET['id'];
$activity=$_GET['activity'];
?>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <!-- Numeric JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.min.js"></script>

<body class="p-3 mb-2 bg-light text-black">

<div class="jumbotron">

	<div class="row">
		<div class="col "><h6><strong><a href="http://localhost/node_js/admin_loggedin.php">
		Election-Info /		
		</a>More info</strong></h4></div>
	</div>
	<!-- copy paste here -->
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="row-md-12 mx-auto" style="color:black;"><h3><strong>
				List of Candidates		
				</strong></h3>
				</div>
			</div>
			<div class="row">
				<div class="row-md-12 mx-auto" style="color:black;"><h4>
				<table class="table table-striped table-dark table-hover">
					<thead>	
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Candidate Name</th>
							
						</tr>
					</thead>
					<tbody id="appendCandidate">
						
					</tbody>	
						
				</table>	
				</h4>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="row-md-12 mx-auto" style="color:black;"><h3><strong>
				List of Participants		
				</strong></h3>
				</div>
			</div>
			<div class="row">
				<div class="row-md-12 mx-auto" style="color:black;"><h4>
				<table class="table table-striped table-dark table-hover">
					<thead>	
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Participant Name</th>
							
						</tr>
					</thead>
					<tbody id="appendParticipant">
						
					</tbody>	
						
				</table>	
				</h4>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row mx-auto" id="activity">
			<div class="col" id="electionStatus">		
			</div>		
		</div>
		
		
	</div>
	<br><br>
		<div class="row mx-auto">
		<div class="row mx-auto" id="activity">
			<div class="col" id="stats">		
			</div>		
		</div>
		</div>
	
</div>
<!-- modal for showing the pie chart of election result-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><strong>Election Statistics</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<div class="modal-body" id="chartContainer">
        
		</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>
<script>

var candidates=new Array(1000);var participants= new Array(1000);
var activity=<?php echo $activity;?>;var sum=new Array(1000).fill(0);
var d=1;var c=1;var electionID=<?php echo $id;?>;
var voteIndex;var largest=0;var winner;
if(activity==0)
{$("#electionStatus").html("");}
for(var k=1;k<=50;k++)
	{
		flag=register.returnParticipantList(electionID,k);	
		participants[d++]=flag;
		//console.log(participants[d]);d++;
			
	}
	for(var k=1;k<=50;k++)
	{
		flag=register.returnCandidateList(electionID,k);	
		candidates[c++]=flag;
		//console.log(candidates[c]);c++;
			
	}
	for(var k=1;k<c;k++)
	{
	if(!jQuery.isEmptyObject(participants[k][0]))	
		{
		$("#appendParticipant").append("<tr><th scope='row'>"+k+"</th><td>"+participants[k]+"</td></tr>");
		}	
	}
	for(var k=1;k<d;k++)
	{
	if(!jQuery.isEmptyObject(candidates[k][0]))	
		{
		$("#appendCandidate").append("<tr><th scope='row'>"+k+"</th><td>"+candidates[k]+"</td></tr>");
		}	
	}
if(activity==1)
	{
		$("#electionStatus").html("<strong>Election is still going on. Results will be available after commencement.</strong>");	
	}
else

	{	$("#electionStatus").append("<h4><strong>This election is over and below are the results of the same.</h4></strong><table class='table table-striped table-dark table-hover'><thead><tr><th scope='col'>#</th><th scope='col'>Candidate Name</th><th scope='col'>Number of votes secured</th></tr></thead><tbody id='appendResults'></tbody></table><h4><strong><div class='row' id='winner' style='padding-left:20px;'></h4></strong><div>");
		for(var k=1;k<d;k++)
		{
			voteIndex=register.testing(electionID,k);
			if((voteIndex.c[0]!=999)&&(voteIndex.c[0]!=0))
				{sum[voteIndex.c[0]]=sum[voteIndex.c[0]]+1;
				//console.log(sum[voteIndex.c[0]]);
				}
		}	
		for(var k=1;k<c;k++)
		{
		if(!jQuery.isEmptyObject(candidates[k][0]))
			{
			$("#appendResults").append("<tr><th scope='row'>"+k+"</th><td>"+candidates[k]+"</td><td>"+sum[k]+"</td></tr>");
			if(sum[k]>=largest)
				{
				largest=sum[k];
				winner=k;			
				}			
			}		
		}
		
		$("#winner").append("The winning candidate is:"+candidates[winner]);
		$("#stats").append("<br><br><button class='btn btn-primary' type='button' data-target='#myModal' data-toggle='modal'>Get Election Stats.</button>");
		var data = [{
  			values: [],
  			labels: [],
  			type: 'pie'
		}];
		var totalCount=0;
		for(var k=1;k<c;k++)
		{
		if(!jQuery.isEmptyObject(candidates[k][0]))
			{
			totalCount=totalCount+sum[k];		
			}		
		}
		console.log(totalCount);
		var graphCount=0;var percentage;var sum;
		for(var m=1;m<c;m++)
			{
			if(!jQuery.isEmptyObject(candidates[m][0]))
				{
				if(sum[m]!=0)
					percentage=(sum[m]/totalCount)*100;
				else
					percentage=0;
				console.log(percentage);
				data[0].values[graphCount]=percentage;
				data[0].labels[graphCount]=candidates[m];
				graphCount++;
				//console.log(data[0].values[0]);
				//console.log(data[0].labels[0]);				
				}			
			}		
		console.log(data);

		Plotly.newPlot('chartContainer', data);
	
	}

</script>


</body>
</html>
