@extends('layouts.homepageMenu')

@section('content')
	<div class="container mt-5" style="padding-left: 0px; padding-right: 0px;">
		<div class="row">
			<div class="col">
                <div class="card w-100" style="min-height: 550px;">
				  <div class="card-body">
                        <div class="container">
                        @foreach($blogs as $blogsValue)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-4" style="border: 1px #343a40 solid;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{URL::asset('img_upload/'.$blogsValue->bannerFile)}}" alt="" style="width: 100%; height: 150px;">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-block p-3">
                                                    <h5 class="card-title"><a href="/view/blog?id={{$blogsValue->id}}">{{$blogsValue->blogTitle}}</a></h5>
                                                    <h6 style="font-size:12px;">{{Carbon\Carbon::parse($blogsValue->created_at)->format('d F Y')}}&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10px;"></span></h6>
                                                    <p>{{strlen($blogsValue->blogContent) > 150 ? substr($blogsValue->blogContent, 0, 150)."..." : ($blogsValue->blogContent)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
				  </div>
                  <div class="card-footer text-center">
                    <p>{{ $blogs->links() }}</p>
                  </div>
				</div>
            </div>
        </div>
    </div>
@endsection