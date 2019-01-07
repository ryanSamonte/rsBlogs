@extends('layouts.adminMenu')

@section('content')
	<div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Trebuchet MS;font-size: 45px;">{{$blogCount}}</h5>
                        <p class="card-text" style="font-family: Trebuchet MS;font-size: 25px;">BLOG</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Trebuchet MS;font-size: 45px;">{{$categoryCount}}</h5>
                        <p class="card-text" style="font-family: Trebuchet MS;font-size: 25px;">CATEGORY</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: Trebuchet MS;font-size: 45px;">{{$authorCount}}</h5>
                        <p class="card-text" style="font-family: Trebuchet MS;font-size: 25px;">AUTHOR</p>
                    </div>
                </div>
            </div>
        </div>
		<div class="row mt-5">
			<div class="col">
            <div class="table-responsive">
                    <table class="table table-striped " id="blogList">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th></th>
                        </tr>
                    </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>

    <script>
        $(document).ready(function(){
            getBlogList();
        });

        function getBlogList(){
            var table = $("#blogList").DataTable({
                ajax:{
                    url: "/admin/manage/blog/retrieve/all",
                    dataSrc: "",
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "blogTitle"
                    },
                    {
                        data: "category_relation.categoryName"
                    },
                    {
                        data: "author_relation.name"
                    },
                    {
                        data: "id",
                        render: function (data) {
                            return "<a href=/view/blog?id=" + data + " class='btn btn-success' style='width:100%;'>View full blog</a>";
                        }
                    }
                ]
            });
        }
    </script>
@endsection