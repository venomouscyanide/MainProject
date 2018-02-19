
$(function navbar(){
var nav="<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">BCV inc.</a>
	<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			<a class="nav-link" href="#">Home</a>
		</li>
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Options</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong">About</a>
			</div>
		</li>
	</ul>
</nav>



<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;">About this Project and Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color:black;">
       Team sucks. So does this project :^)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
";
$('#navbar').html('nav');
});
