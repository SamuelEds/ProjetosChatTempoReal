<head>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script type="text/javascript" src="/ProjetosChatTempoReal/js/bootstrap.js"></script>


	<link rel="stylesheet" type="text/css" href="/ProjetosChatTempoReal/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>

<nav id="sidebar">
	<div class="sidebar-header">
		<h3>BOOTSTRAP SIDEBAR</h3>
	</div>

	<ul class="list-unstyled components">
		<p>Dummy Heading</p>
		<li class="active">
			<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
			<ul class="collapse list-unstyled" id="homeSubmenu">
				<li>
					<a href="#">home1</a>
				</li>
				<li>
					<a href="#">home2</a>
				</li>
				<li>
					<a href="#">home3</a>
				</li>
			</ul> 
		</li>

		<li>
			<a href="#">About</a>
		</li>
		<li>
			<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Page</a>
			<ul class="collapse list-unstyled" id="pageSubmenu">
				<li>
					<a href="#">page1</a>
				</li>
				<li>
					<a href="#">page2</a>
				</li>
				<li>
					<a href="#">page3</a>
				</li>
			</ul> 
		</li>
		<li>
			<a href="#">Services</a>
		</li>
		<li>
			<a href="#">Contact Us</a>
		</li>
	</ul>

	<ul class="list-unstyled CTAs">
		<li>
			<a href="#" class="download">Download code</a>
		</li>
		<li>
			<a href="#" class="article">article</a>
		</li>
	</ul>
</nav>


<div class="content">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<button type="button" id="sidebarCollapse" class="btn btn-info">
			<i class="fas fa-align-justify"></i><span><b style="margin-left: 5px;">Mostrar Sidebar</b></span>
		</button>

		<!--<a class="navbar-brand" href="#">Navbar</a>-->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>
			</ul>
		</div>
	</nav>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});
	</script>
