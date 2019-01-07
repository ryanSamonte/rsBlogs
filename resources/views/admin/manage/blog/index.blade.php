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
                    <form action="/admin/manage/blog/save" method="post" id="newBlogForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blogTitle">Title</label>
                                        <input type="text" name="blogTitle" class="form-control" id="blogTitle"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categoryId">Category</label>
                                        <select name="categoryId" id="categoryId" class="form-control">
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bannerFile">Banner</label>
                                        <input type="file" name="bannerFile" class="form-control" id="bannerFile" required/>
                                        <p class="small text-muted">*Banner must not be more than 700x400 pixels</p>
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


    <div class="modal fade" id="editBlogInfoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #343a40;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/manage/blog/save" method="post" id="editBlogForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="blogTitleEdit">Title</label>
                                        <input type="text" name="blogTitle" class="form-control" id="blogTitleEdit" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categoryIdEdit">Category</label>
                                        <select name="categoryId" id="categoryIdEdit" class="form-control">
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
                                        <label for="blogContentEdit">Content</label>
                                        <textarea name="blogContent" id="blogContentEdit" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bannerFileEdit">Banner</label>
                                        <input type="file" name="bannerFile" class="form-control" id="bannerFileEdit" required/>
                                        <p class="small text-muted">*Banner must not be more than 700x400 pixels</p>
                                        <img src="" alt="" id="bannerImage" style="width: 100%; height: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" id="updateButton" data-edit-id="">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            getBlogList();
        });

        $(document).on("click", "#insertButton", function(){
            if($("#newBlogForm").valid()){
                $.ajax({
                    type: "POST",
                    url: "/admin/manage/blog/save",
                    data:new FormData($("#newBlogForm")[0]),
                    async:false,
                    processData: false,
                    contentType: false,
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
            }

            return false;
        });

        $(document).on("click", "#btnEdit", function(){
            var id = $(this).attr("data-id");
            $("#updateButton").attr("data-edit-id", id);

            $.ajax({
                type: "GET",
                url: "/admin/manage/blog/edit?id="+id,
                success: function (data) {
                    var jsonStringified = JSON.stringify(data);
                    var blogDetails = JSON.parse(jsonStringified);

                    $("#blogTitleEdit").val(blogDetails.blogTitle);
                    $("#categoryIdEdit").val(blogDetails.categoryId);
                    $("#blogContentEdit").val(blogDetails.blogContent);
                    
                    $("#bannerImage").attr("src", window.location.protocol+"//"+window.location.host+"/img_upload/"+blogDetails.bannerFile);
                },
                error: function (data) {
                    alert('Error encountered while retrieving data of: '+id);
                }
            });
        });

        $(document).on("click", "#updateButton", function(){
            var id = $(this).attr("data-edit-id");

            if($("#editBlogForm").valid()){
                $.ajax({
                    type: "POST",
                    url: "/admin/manage/blog/update?id="+id,
                    data:new FormData($("#editBlogForm")[0]),
                    async:false,
                    processData: false,
                    contentType: false,
                    success: function (da) {
                        var table = $("#blogList").DataTable();
                        $("#editBlogInfoModal .close").click();
                        table.destroy();
                        getBlogList();
                    },
                    error: function (da) {
                        alert('Error encountered!');
                    }
                });
            }

            return false;
        });

        $(document).on("click", "#btnDelete", function(){
            var id = $(this).attr("data-id");

            $.ajax({
                type: "GET",
                url: "/admin/manage/blog/delete?id="+id,
                success: function (da) {
                    var table = $("#blogList").DataTable();
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
                    url: "/admin/manage/blog/retrieve",
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
                        data: "id",
                        render: function (data) {
                            
                            return "<a href=/view/blog?id=" + data + " class='btn btn-success' style='width:100%;'>View full blog</a>";
                        }
                    },
                    {
                        data: "id",
                        render: function (data) {

                            return "<input type='button' class='btn btn-warning editButton' data-id=" + data + " data-toggle='modal' data-target='#editBlogInfoModal' name='editButton' id='btnEdit' value='Edit' style='width:100%;'/>";
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