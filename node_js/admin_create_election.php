<?php
session_start();
include_once("admin_create_election_navbar.php");
?>
<script>
var data = sessionStorage.getItem('flag5');
if(data==0)
	{
	document.write("<strong style='color:black;font-size:20px;'>Permission Denied!</strong>");
	window.stop();	
	}
</script>
	<link rel="stylesheet" href="../jquery-ui/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<body class="p-3 mb-2 bg-light text-black">

<div class="jumbotron hey2">
			<div class="row mx-auto">
	
				<div class="row md-12 mx-auto">
					<div class="col"><h3><strong>
					Start an election
					</strong></h3></div>		
				</div>
			
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Election ID
					</div>		
					<div class="col">
					<input type="number" id="electionID" placeholder="1"></input>
					</div>	
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Start Date 
					</div>		
					<div class="col">
					<input type="text" id="datepickerStart">
					</div>	
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					End date 
					</div>		
					<div class="col" >
					<input type="text" id="datepickerEnd">
					</div>
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Candidates Standing
					</div>		
					<div class="col" id="appendCandidate">
					
					</div>
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Participants Allowed to vote 
					</div>		
					<div class="col" id="appendParticipant">
					
					</div>
					
			</div>
			<br>
			<div class="row ">
					<div class="row mx-auto">
						<div class="col">
							<button type="button" class="btn btn-primary" id="startElection">Start election </button>
						</div>
					</div>
			</div>

</div>
 <script>
$( function() {
	$( "#datepickerStart" ).datepicker();
	$( "#datepickerEnd" ).datepicker();
});
var flag;var temporary;
var userList=new Array(1000);var user;var w=0;var userID=new Array(100);
for(var i=0;i<100;i++)
	{flag=0;
	user=register.getUserByID(i);
	
	for(var j=0;j<100;j++)
		{
		if(userList[j]==user)
			{//console.log("flag");
			flag=1;
			}
		}
	if(flag==0)
		{
		userList[w]=user;
		temporary=register.getUserByEmail(user);
		userID[w]=temporary[0];
		w=w+1;		
		}	
	}
console.log(w);
console.log(userList);
console.log(userID);
for(var i=0;i<w;i++)
	{
	if(!jQuery.isEmptyObject(userList[i][0]))
		{
		$("#appendCandidate").append("<div class='form-check form-check-inline' style='padding-left:15px;'><input class='form-check-input checkSingle1' type='checkbox' id="+userID[i]+1+" ><label class='form-check-label' for="+userID[i]+1+">"+userList[i]+"</label></div>");
		$("#appendParticipant").append("<div class='form-check form-check-inline' style='padding-left:15px;'><input class='form-check-input checkSingle2' type='checkbox' id="+userID[i]+2+" ><label class='form-check-label' for="+userID[i]+2+">"+userList[i]+"</label></div>");}
	}
$("#appendCandidate").append("<div class='form-check form-check-inline' style='padding-left:15px;'><input class='form-check-input' type='checkbox' id='checkall1' ><label class='form-check-label' for='checkall1'>Select all candidates</label></div>");
$("#appendParticipant").append("<div class='form-check form-check-inline' style='padding-left:15px;'><input class='form-check-input' type='checkbox' id='checkall2' ><label class='form-check-label' for='checkall2'>Select all participants</label></div>");
//now to check all for candidates and for participants
//for candidates
$(document).ready(function() {
  $("#checkall1").change(function(){
    if(this.checked){
      $(".checkSingle1").each(function(){
        this.checked=true;
      })              
    }else{
      $(".checkSingle1").each(function(){
        this.checked=false;
      })              
    }
  });

  $(".checkSingle1").click(function () {
    if ($(this).is(":checked")){
      var isAllChecked = 0;
      $(".checkSingle1").each(function(){
        if(!this.checked)
           isAllChecked = 1;
      })              
      if(isAllChecked == 0){ $("#checkall1").prop("checked", true); }     
    }else {
      $("#checkall1").prop("checked", false);
    }
  });
});
//for participants
$(document).ready(function() {
  $("#checkall2").change(function(){
    if(this.checked){
      $(".checkSingle2").each(function(){
        this.checked=true;
      })              
    }else{
      $(".checkSingle2").each(function(){
        this.checked=false;
      })              
    }
  });

  $(".checkSingle2").click(function () {
    if ($(this).is(":checked")){
      var isAllChecked = 0;
      $(".checkSingle2").each(function(){
        if(!this.checked)
           isAllChecked = 1;
      })              
      if(isAllChecked == 0){ $("#checkall2").prop("checked", true); }     
    }else {
      $("#checkall2").prop("checked", false);
    }
  });
});
//console.log($('#datepickerStart').val());
$('#startElection').click(function(){
var id=$("#electionID").val();
register.addStartStop($("#electionID").val(),$("#datepickerStart").val(),$("#datepickerEnd").val(),{gas:400000});

//console.log(hash);
for(var k=0;k<w;k++)
{	var temp1=userID[k];
	if($("#"+temp1+1+"").prop("checked"))
	{
		//console.log("hey");
		register.addElectionCandidate(id,userList[k],{gas:400000});
	}
}
for(var k=0;k<w;k++)
{	var temp2=userID[k];
	if($("#"+temp2+2+"").prop("checked"))
	{	
		//console.log("bye");
		register.addElectionParticipant(id,userList[k],{gas:400000});
	}
}
alert("Successfully created");
window.location.reload();
});
</script>
</body>
</html>
