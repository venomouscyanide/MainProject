<html>

<head>
	<title>graphical password construction</title>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js">					</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="static/css/mycss.css">
	 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="./node_modules/web3/dist/web3.min.js"></script>
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
$img_loc[0]='static/pic/batman1.jpg';
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
				alert("Indeed,a wise choice!");
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


