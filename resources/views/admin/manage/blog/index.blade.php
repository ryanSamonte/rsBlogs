@extends('layouts.adminMenu')

@section('content')
	<div class="container mt-5">
        <div class="row">
            <div class="col">
                <input type='button' class='btn btn-primary createBlogButton' data-toggle='modal' data-target='#insertBlogModal' name='insertBlogButton' id='btnInsertBlog' value='Add New Blog' style='width:40%;' />
            </div>
        </div>
		<div class="row mt-5">
			<div class="col">
				<div class="table-responsive">
                    <table class="table table-striped" id="blogList">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th></th>
                            <th></th>
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

    <div class="modal fade" id="insertBlogModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #343a40;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">New Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/manage/blog/save" method="post" id="newBlogForm">
                    {{csrf_field()}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blogTitle">Title</label>
                                        <input type="text" name="blogTitle" class="form-control" id="blogTitle" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blogCategory">Category</label>
                                        <select name="blogCategory" id="blogCategory" class="form-control">
                                            @foreach($categoryList as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blogContent">Content</label>
                                        <textarea name="blogContent" id="blogContent" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" id="insertButton">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            getBlogList();
        });

        $(document).on("click", "#insertButton", function(){
            $.ajax({
                type: "POST",
                url: "/admin/manage/blog/save",
                data: {
                    '_token': $("input[name='_token']", "#newBlogForm").val(),
                    'blogTitle': $("#blogTitle").val(),
                    'categoryId': $("#blogCategory").val(),
                    'blogContent': $("#blogContent").val(),
                },
                success: function (da) {
                    var table = $("#blogList").DataTable();
                    $("#insertBlogModal .close").click();
                    table.destroy();
                    getBlogList();
                },
                error: function (da) {
                    alert('Error encountered!');
                }
            });
        });

        function getBlogList(){
            var table = $("#blogList").DataTable({
                ajax:{
                    url: "/admin/manage/blog/retrieveAll",
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
                        data: "authorId"
                    },
                    {
                        data: "id",
                        render: function (data) {
                            
                            return "<a href=/view/blog?id=" + data + " class='btn btn-success' style='width:100%;'>View full blog</a>";
                        }
                    },
                    {
                        data: "id",
                        render: function (data) {

                            return "<input type='button' class='btn btn-warning editButton' data-id=" + data + " data-toggle='modal' data-target='#editStudentInfoModal' name='editButton' id='btnEdit' value='Edit' style='width:100%;'/>";
                        }
                    },
                    {
                        data: "id",
                        render: function (data) {
                            return "<input type='button' class='btn btn-danger deleteButton' data-id=" + data + " name='deleteButton' id='btnDelete' value='Delete' style='width:100%;'/>";
                        }
                    }
                ]
            });
        }
    </script>
@endsection