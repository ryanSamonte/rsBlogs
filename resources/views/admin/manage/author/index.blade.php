@extends('layouts.adminMenu')

@section('content')
	<div class="container mt-5">
        <div class="row">
            <div class="col">
                <input type='button' class='btn btn-primary createAuthorButton' data-toggle='modal' data-target='#insertAuthorModal' name='insertAuthorButton' id='btnInsertAuthor' value='Add New Author' style='width:40%;' />
            </div>
        </div>
		<div class="row mt-5">
			<div class="col">
				<div class="table-responsive">
                    <table class="table table-striped" id="authorList">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                    </table>
                </div>
			</div>
		</div>
    </div>
    
    <div class="modal fade" id="insertAuthorModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #343a40;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">New Author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/manage/author/save" method="post" id="newAuthorForm">
                    {{csrf_field()}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="authorName">Name</label>
                                        <input type="text" name="authorName" class="form-control" id="authorName" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="authorEmail">Email</label>
                                        <input type="text" name="authorEmail" class="form-control" id="authorEmail" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="authorPassword">Password</label>
                                        <input type="password" name="authorPassword" class="form-control" id="authorPassword" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="authorRole">Role</label>
                                        <select name="authorRole" id="authorRole" class="form-control">
                                            <option value="1">Administrator</option>
                                            <option value="2">Contributor</option>
                                        </select>
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
        getAuthorList();
    });

    $(document).on("click", "#insertButton", function(){
        $.ajax({
            type: "POST",
            url: "/admin/manage/author/save",
            data:{
                '_token': $("input[name='_token']", "#newAuthorForm").val(),
                'name': $("#authorName").val(),
                'email': $("#authorEmail").val(),
                'password': $("#authorPassword").val(),
                'role_id': $("#authorRole").val()
            },
            success: function (da) {
                var table = $("#authorList").DataTable();
                $("#insertAuthorModal .close").click();
                table.destroy();
                getAuthorList();
            },
            error: function (da) {
                alert('Error encountered!');
            }
        });
    });

    function getAuthorList(){
        var table = $("#authorList").DataTable({
        ajax: {
            url: "/admin/manage/author/retrieveAll",
        dataSrc: "",
        },
        columns: [
            {
                data: "id"
            },
            {
                data: "name"
            },
            {
                data: "role_id",
                render: function(data){
                    return data == 1 ? "Administrator" : "Contributor";
                }
            },
            {
                data: "created_at"
            }
        ]
    });
}
</script>
@endsection

