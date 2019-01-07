@extends('layouts.homepageMenu')

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-8">
				<div class="card w-100" style="min-height: 550px;">
				<img src="{{URL::asset('img_upload/'.$blog->bannerFile)}}" class="card-img-top" alt="..." style="height: 400px;">
				  <div class="card-body">
					<h5 class="card-title" style="font-size: 40px;">{{$blog->blogTitle}}</h5>
					<h6 style="font-size:12px;">{{Carbon\Carbon::parse($blog->created_at)->format('d F Y')}}&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;">{{$blog->created_at->diffForHumans()}}</span></h6>
					<br>
                    <p class="card-text" style="font-size:15px; text-align:justify; font-family: unset">{!! nl2br(e($blog->blogContent)) !!}</p>
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
                                    <h6 style="font-size:12px;">{{Carbon\Carbon::parse($otherBlogsValue->created_at)->format('d F Y')}}&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;"></span></h6>
									<p>{{strlen($otherBlogsValue->blogContent) > 150 ? substr($otherBlogsValue->blogContent, 0, 150)."..." : ($otherBlogsValue->blogContent)}}</p>
                                </div>
                            </div>
                        @endforeach
			        </div>
                </div>
			</div>
		</div>
	</div>
@endsection