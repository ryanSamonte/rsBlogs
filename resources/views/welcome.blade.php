@extends('layouts.homepageMenu')

@section('content')
	<div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
		<div class="row">
			<div class="col">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
					<div class="carousel-item active">
					  <img class="d-block w-100" src="{{URL::asset('img/banner1.jpg')}}" alt="First slide">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="{{URL::asset('img/banner1.jpg')}}" alt="Second slide">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="{{URL::asset('img/banner1.jpg')}}" alt="Third slide">
					</div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>				
			</div>
		</div>
	</div>
<br>
	<div class="container">
		<div class="row">
			@foreach($otherBlogs as $otherBlogsValue)
				<div class="col-md-3">
					<div class="card w-100">
				  	<div class="card-body">
							<h5 class="card-title"><a href="/view/blog?id={{$otherBlogsValue->id}}">{{$otherBlogsValue->blogTitle}}</a></h5>
							<h6 style="font-size:12px;">{{$otherBlogsValue->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;">28 mins ago</span></h6>
							<p class="card-text" style="font-size:12px;">With supporting text below as a natural lead-in to additional content.</p>
				  	</div>
					</div>
				</div>
    	@endforeach
		</div>
	</div>
	
	
@endsection