<?php
session_start();
include_once "security1.html";

?>
<script>
var data = sessionStorage.getItem('flag3');
if(data==0)
	{
	document.write("<strong style='color:black;font-size:20px;'>Permission Denied!</strong>");
	window.stop();	
	}
</script>
<script src="static/js/connect.js"></script>
<link rel="stylesheet" href="static/css/mycss.css">
<div class="jumbotron" style="text-align:center;color:white;background-image:url('static/pic/secc.png'); background-repeat: y;">
	<div class="row">		
		<div class="col-sm-12" style="text-align:fill;">			
		<h1 >Security Phase 3</h1>
		</div>		
	</div>
</div>


<script>

//start the loading modal
$( document ).ready(function() {
		    $("#modal").modal("show");
 
	  console.log("document is ready");
});

//stop the loading modal after everything is loaded up
$(window).on("load",function()
{
console.log("the modal should be gone by now");
$("#modal").modal("toggle");
});

</script>
</head>
<body class="p-3 mb-2 bg-light text-white">

<?php
$img_loc=array();
//getting the correct user's graphical password
$img_loc[0]= $_SESSION["url"];
//using unsplash for getting random images related to something
  
  
//unique generation of random numbers
//for loop is not working using individual lines instead
$i=1;

$img_loc[$i++]='https://source.unsplash.com/random?sig=1';
$img_loc[$i++]='https://source.unsplash.com/1600x900/?dog';
$img_loc[$i++]='https://source.unsplash.com/random?sig=3';
$img_loc[$i++]='https://source.unsplash.com/random?sig=4';
$img_loc[$i++]='https://source.unsplash.com/random?sig=5';
$img_loc[$i++]='https://source.unsplash.com/random?sig=7';
$img_loc[$i++]='https://source.unsplash.com/random?sig=6';
$img_loc[$i++]='https://source.unsplash.com/random?sig=8'; 
 
?>


 

<?php
$numbers= range(0,8);
shuffle($numbers);
$i=0;
foreach($numbers as $number)
{

$num[$i]=$number;
$i++;
}
//echo $img_loc[$num[0]];
?>	 

<div class="main-container">
	<div>
	<h4 style="text-align:center;color:black;">Please choose the security image you uploaded. Please note you are given only <span style="font-weight:bold;">one</span> chance</h4>
	</div>
	<div class="row ">

		<div class="col-sm-4 useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">
			
		<a href="#"  id="0">
			<img src="<?php echo $img_loc[$num[0]];?>" class="rounded-circle " width=250 height=250  >
		</a>
		
    </div>

		<div class="col-sm-4  useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="1">
				<img src="<?php echo $img_loc[$num[1]];?>" class="rounded-circle" width=250 height=250>
			</a>	
		</div>

		<div class="col-sm-4  useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="2">
				<img src="<?php echo $img_loc[$num[2]];?>" class="rounded-circle" width=250 height=250>
			</a>	
		</div>
	
	</div>	
	
	<div class="row ">
		<div class="col-sm-4 useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="3">
				<img src="<?php echo $img_loc[$num[3]];?>" class="rounded-circle"  width=250 height=250>
			</a>	
		</div>	

		<div class="col-sm-4  useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="4">
				<img src="<?php echo $img_loc[$num[4]];?>" class="rounded-circle"  width=250 height=250>
			</a>	
		</div>

		<div class="col-sm-4  useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="5">
				<img src="<?php echo $img_loc[$num[5]];?>" class="rounded-circle"  width=250 height=250;">
			</a>	
		</div>
	
	</div>	 

	<div class="row ">
		<div class="col-sm-4 useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="6">
				<img src="<?php echo $img_loc[$num[6]];?>" class="rounded-circle"  width=250 height=250">
			</a>	
		</div>	

		<div class="col-sm-4  useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="7">
				<img src="<?php echo $img_loc[$num[7]];?>" class="rounded-circle"  width=250 height=250>
			</a>	
		</div>

		<div class="col-sm-4  useme" style="border:1px;border-width:thick;border-style:solid;padding:10px;">			
			<a href="#" id="8">
				<img src="<?php echo $img_loc[$num[8]];?>" class="rounded-circle"  width=250 height=250>
			</a>	
		</div>
	
	</div>	
		
</div>
<?php 
for($i=0;$i<=8;$i++)
{
if($img_loc[$num[$i]]==$img_loc[0])
$correct=$i;	//$correct contains the 0th location which will always be used to hold the correct image to pass the test
}
echo $correct;
?>
<script>
 

var that = this;
$('#0,#1,#2,#3,#4,#5,#6,#7,#8').click(function () {
//console.log($(this).attr('id'));
$.ajax( 
{
url:"http://localhost/node_js/graphical.php",
type:"POST",
dataType:"text",
data:{
correct:" <?php echo $correct ?> ",
clicked:$(this).attr('id'),
},
success: function (data) {
					  
				console.log(data);              
				if(data.includes("success"))

				{
				//adding log data to the blockchain
				var currentdate = new Date(); 
				var datetime =currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
				var hash=register.addLogData('<?php echo $_SESSION["email"]; ?>',datetime,{gas:200000});
				console.log(hash);		
				sessionStorage.setItem('flag3','0');
				sessionStorage.setItem('flag4','1');								
				window.location.href="http://localhost/node_js/voting.php"
				}
				else
				{
				alert('Wrong Image Selected. You will now be logged out.');
				window.location.href="http://localhost/node_js/home1.php?logout=1"				
				}
            }

});



});

</script>

<!--this is the modal used to show loading gif -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header mx-auto">
			<p style="color:black;">Loading please wait..</p>		
		</div>
      		<div class="modal-body" style="background: url('static/pic/loader2.gif') 50% 50% no-repeat rgb(249,249,249);">
			<br><br><br><br><br><br><br><br>
     	 </div>
    </div>
  </div>
</div>

</body>
</html>
