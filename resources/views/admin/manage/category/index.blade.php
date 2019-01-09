@extends('layouts.adminMenu')

@section('content')
	<div class="container mt-5">
        <div class="row">
            <div class="col">
                <input type='button' class='btn btn-primary createCategoryButton' data-toggle='modal' data-target='#insertCategoryModal' name='insertCategoryButton' id='btnInsertCategory' value='Add New Category' style='width:40%;' />
            </div>
        </div>
		<div class="row mt-5">
			<div class="col">
				<div class="table-responsive">
                    <table class="table table-striped" id="categoryList">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created</th>
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
    
    <div class="modal fade" id="insertCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #343a40;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/manage/category/save" method="post" id="newCategoryForm">
                    {{csrf_field()}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categoryName">Name</label>
                                        <input type="text" name="categoryName" class="form-control" id="categoryName" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categoryDesc">Description</label>
                                        <input type="text" name="categoryDesc" class="form-control" id="categoryDesc" required/>
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

    <div class="modal fade" id="editCategoryInfoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #343a40;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/manage/category/save" method="post" id="editCategoryForm">
                    {{csrf_field()}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categoryName">Name</label>
                                        <input type="text" name="categoryName" class="form-control" id="categoryNameEdit" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categoryDesc">Description</label>
                                        <input type="text" name="categoryDesc" class="form-control" id="categoryDescEdit" required/>
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
        getCategoryList();
    });

    $(document).on("click", "#insertButton", function(){
        $.ajax({
            type: "POST",
            url: "/admin/manage/category/save",
            data:{
                '_token': $("input[name='_token']", "#newCategoryForm").val(),
                'categoryName': $("#categoryName").val(),
                'categoryDesc': $("#categoryDesc").val()
            },
            success: function (da) {
                var table = $("#categoryList").DataTable();
                $("#insertCategoryModal .close").click();
                table.destroy();
                getCategoryList();
            },
            error: function (da) {
                alert('Error encountered!');
            }
        });
    });

    $(document).on("click", "#btnEdit", function(){
        var id = $(this).attr("data-id");

        $("#updateButton").attr("data-edit-id", id);

        $.ajax({
            type: "GET",
            url: "/admin/manage/category/edit?id="+id,
            success: function(data){
                var jsonStringified = JSON.stringify(data);
                var categoryDetails = JSON.parse(jsonStringified);

                $("#categoryNameEdit").val(categoryDetails.categoryName);
                $("#categoryDescEdit").val(categoryDetails.categoryDesc);
            },
            error: function(data){
                alert("Error retrieving data of id: "+id)
            }
        });
    });

    $(document).on("click", "#updateButton", function(){
        var id = $(this).attr("data-edit-id");

        //if($("#editCategoryForm").valid()){
            $.ajax({
                type: "POST",
                url: "/admin/manage/category/update?id="+id,
                data:new FormData($("#editCategoryForm")[0]),
                async:false,
                processData: false,
                contentType: false,
                success: function (da) {
                    var table = $("#categoryList").DataTable();
                    $("#editCategoryInfoModal .close").click();
                    table.destroy();
                    getCategoryList();
                },
                error: function (da) {
                    alert('Error encountered!');
                }
            });
        //}

        //return false;
    });

    $(document).on("click", "#btnDelete", function(){
        var id = $(this).attr("data-id");

        $.ajax({
            type: "GET",
            url: "/admin/manage/category/delete?id="+id,
            success: function (da) {
                var table = $("#categoryList").DataTable();
                table.destroy();
                getCategoryList();
            },
            error: function (da) {
                alert('Error encountered!');
            }
        });
    });

    function getCategoryList(){
        var table = $("#categoryList").DataTable({
        ajax: {
            url: "/admin/manage/category/retrieve",
        dataSrc: "",
        },
        columns: [
            {
                data: "id"
            },
            {
                data: "categoryName"
            },
            {
                data: "categoryDesc"
            },
            {
                data: "created_at",
                render: function(data){
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    var today = new Date(Date.parse(data));

                    return today.toLocaleDateString("en-US", options);
                }
            },
            {
                data: "id",
                render: function (data) {

                    return "<input type='button' class='btn btn-warning editButton' data-id=" + data + " data-toggle='modal' data-target='#editCategoryInfoModal' name='editButton' id='btnEdit' value='Edit' style='width:100%;'/>";
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

