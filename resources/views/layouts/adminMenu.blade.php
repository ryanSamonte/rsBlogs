<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<link rel="icon" href="{{URL::asset('img/favicon.JPG')}}">
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

	.error{
		color: red;
		font-family: "Century Gothic";
    	font-size: 12px;
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
				<a class="nav-link" href="{{route('admin.manage.author')}}">Manage Author</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
		</ul>
	</div>
	</nav>
	
	@yield('content')

	<footer id="main-footer" class="mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center mt-5">
					<h2><a href="/admin">RS Blogs</a></h2>
					<p class="cdate">&copy; <?php echo date('Y') ?></p>
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
	<script src="{{URL::asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
	<script src="{{URL::asset('js/validations.js')}}"></script>
</body>
</html>