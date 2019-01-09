@extends('layouts.homepageMenu')

@section('content')
	<div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
		<div class="row">
			<div class="col">
			@if($blogsCount >= 1)
			<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
				  	<ol class="carousel-indicators">
						<?php $counter = 0; ?>
							@foreach($otherBlogs as $otherBlogsValue)
									@if($counter == 0)
										<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $counter; ?>" class="active"></li>
									@endif

									@if($counter > 0)
										<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $counter; ?>"></li>
									@endif

									<?php $counter++; ?>
							@endforeach
				  	</ol>
							<div class="carousel-inner">
							<?php $counterSlides = 0; ?>
							@foreach($otherBlogs as $otherBlogsValue)
									@if($counterSlides == 0)
											<div class="carousel-item active" id="homepage-carousel">
											<img class="d-block w-100" src="{{URL::asset('img_upload/'.$otherBlogsValue->bannerFile)}}" alt="First slide" style="height: 600px;">
												<div class="carousel-caption d-none d-xs-block d-sm-block d-md-block d-lg-block" style="background-color: rgba(52, 58, 64, 0.6)">
														<h5 style="font-family: 'Century Gothic'; font-size: 50px; color: #fff;">{{$otherBlogsValue->blogTitle}}</h5>
														<p>by: <span style="text-transform: uppercase; font-family: 'Century Gothic'; font-size: 12px;">{{$otherBlogsValue->authorRelation->name}}</span></p>
												</div>
											</div>
									@endif

									@if($counterSlides > 0)
											<div class="carousel-item" id="homepage-carousel">
											<img class="d-block w-100" src="{{URL::asset('img_upload/'.$otherBlogsValue->bannerFile)}}" alt="First slide" style="height: 600px;">
												<div class="carousel-caption d-none d-xs-block d-sm-block d-md-block d-lg-block" style="background-color: rgba(52, 58, 64, 0.6)">
														<h5 style="font-family: 'Century Gothic'; font-size: 50px; color: #fff;">{{$otherBlogsValue->blogTitle}}</h5>
														<p>by: <span style="text-transform: uppercase; font-family: 'Century Gothic'; font-size: 12px;">{{$otherBlogsValue->authorRelation->name}}</span></p>
												</div>
											</div>
									@endif

									<?php $counterSlides++; ?>
							@endforeach
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
			@endif
			</div>
		</div>
	</div>
<br>
	<div class="container">
	@if($blogsCount == 0)
	<div class="row">
		<div class="col text-center">
			<h1>No post yet.</h1>
		</div>
	</div>
	@endif

	@if($blogsCount == 1)
	<div class="row">
			@foreach($otherBlogs as $otherBlogsValue)
				<div class="col-md-12">
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
	@endif

	@if($blogsCount == 2)
	<div class="row">
			@foreach($otherBlogs as $otherBlogsValue)
				<div class="col-md-6">
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
	@endif

	@if($blogsCount == 3)
	<div class="row">
			@foreach($otherBlogs as $otherBlogsValue)
				<div class="col-md-4">
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
	@endif

	@if($blogsCount >= 4)
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
	@endif
	</div>
	
	
@endsection