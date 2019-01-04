@extends('layouts.homepageMenu')

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-8">
				<div class="card w-100" style="min-height: 550px;">
				<img src="{{URL::asset('img_upload/'.$blog->bannerFile)}}" class="card-img-top" alt="..." style="height: 400px;">
				  <div class="card-body">
					<h5 class="card-title" style="font-size: 40px;">{{$blog->blogTitle}}</h5>
					<h6 style="font-size:12px;">14 December, 2018&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;">28 mins ago</span></h6>
					<br>
                    <p class="card-text" style="font-size:15px; text-align:justify; font-family: 'Arial'">{!! nl2br(e($blog->blogContent)) !!}</p>
				  </div>
				</div>
			</div>

            <div class="col-md-4">
                <div class="row">
			        <div class="col-md-12">
                        @foreach($otherBlogs as $otherBlogsValue)
                            <div class="card w-100 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="/view/blog?id={{$otherBlogsValue->id}}">{{$otherBlogsValue->blogTitle}}</a></h5>
                                    <h6 style="font-size:12px;">{{$otherBlogsValue->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;">28 mins ago</span></h6>
                                </div>
                            </div>
                        @endforeach
			        </div>
                </div>
			</div>
		</div>
	</div>
@endsection