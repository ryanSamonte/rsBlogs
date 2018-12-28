<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	
	<link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
	<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet">
    <!-- <script src="{{URL::asset('plugins/jquery/dist/jquery.min.js')}}"></script> -->
	<script src="{{URL::asset('plugins/datatable/datatables.min.js')}}"></script>

<style>
	#main-footer{
    	background-color: #343a40;
	}

	#main-footer h2 a{
		color: #fff;
		text-decoration: none;
	}

	#main-footer .cdate{
		color: white;
		font-family: 'Century Gothic';
		font-size: 20px;
	}

	#main-footer ul{
		display: inline-block;
		list-style-type: none;
		margin-top: 50px;
		margin-bottom: 30px;
		text-align: center;
	}

	#main-footer ul li a{
		text-decoration: none;
		font-family: Nunito,sans-serif;
		font-size: 15px;
		padding: 10px;
		color: white;
	}	
</style>		
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/admin">RS Blogs</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li {{{ (Request::is("admin") ? "class=active" : "") }}}>
				<a class="nav-link" href="{{route('admin.index')}}">Home <span class="sr-only">(current)</span></a>
			</li>

			<li {{{ (Request::is("admin/manage/blog") ? "class=active" : "") }}}>
				<a class="nav-link" href="{{route('admin.manage.blog')}}">Manage Blog</a>
			</li>

			<li {{{ (Request::is("admin/manage/category") ? "class=active" : "") }}}>
				<a class="nav-link" href="{{route('admin.manage.category')}}">Manage Category</a>
			</li>

			<li {{{ (Request::is("admin/manage/author") ? "class=active" : "") }}}>
				<a class="nav-link" href="{{route('admin.manage.blog')}}">Manage Author</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
	</nav>
	
	@yield('content')

	<footer id="main-footer" class="mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center mt-5">
					<h2><a href="/admin">RS Blogs</a></h2>
					<p class="cdate">&copy; 2018</p>
				</div>
				<div class="col-md-6 text-center center-panel">
					<ul>
						<li><a href="{{route('admin.manage.blog')}}">Manage Blog</a></li>
					</ul>
					<ul>
						<li><a href="{{route('admin.manage.category')}}">Manage Category</a></li>
					</ul>

					<ul>
						<li><a href="">Manage Author</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>