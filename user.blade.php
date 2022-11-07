@extends('layouts.admin') @section('content')

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="javascript:void(0);" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="new_full_name" class="form-label">Fullname</label>
                        <input type="text" class="form-control" id="new_full_name" name="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_user_email" class="form-label">Username </label>
                        <input type="text" class="form-control" id="new_user_email" name="user_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_user_description" class="form-label">User Password</label>
                        <input type="password" class="form-control" id="new_user_password" name="user_password"
                            required>
                    </div>
                     <div class="mb-3">
                        <label for="new_user_status" class="form-label">User Status</label>
                        <select name="user_status" id="new_user_status" class="form-control">
                            <option value="inactive">Inactive</option>
                            <option value="Active">Active</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="new_user_type" class="form-label">User Type</label>
                        <select name="user_type" id="new_user_type" class="form-control">
                            <option value="admin">Administrator</option>
                            <option value="user">User</option>
                            <option value="uploader">Uploader</option>
                        </select>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="exampleEditModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" action="javascript:void(0);" method="PUT">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="mb-3">
                        <label for="updated_full_name" class="form-label">Fullname</label>
                        <input type="text" class="form-control" id="updated_full_name" name="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="updated_user_email" class="form-label">Username </label>
                        <input type="text" class="form-control" id="updated_user_email" name="user_email" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="updated_user_description" class="form-label">User Password</label>
                        <input type="password" class="form-control" id="updated_user_password" name="user_password" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="updated_user_status" class="form-label">User Status</label>
                        <select name="user_status" id="updated_user_status" class="form-control">
                            <option value="inactive">Inactive</option>
                            <option value="Active">Active</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updated_user_type" class="form-label">User Type</label>
                         <select name="user_type" id="updated_user_type" class="form-control">
                            <option value="admin">Administrator</option>
                            <option value="user">User</option>
                            <option value="uploader">Uploader</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div>


    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User List') }} <div style="float: right;"> <button type="button"
                                class="btn btn-primary  " data-toggle="modal" data-target="#addModal">
                                Add User
                            </button>

                        </div>
                    </div>

                    <div class="card-body">

                        <table id='userstable' class="table table-bordered table-hover table-responsive table-striped ">
                            <thead>
                                <tr>

                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function () {


            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });



            function showAll() {
                var table = $("#userstable").DataTable();

                table.destroy();
                table.clear().draw();

                $.ajax({
                    url: "{{ route('admin.fetchuser') }}",
                    type: "POST",
                    data:{_token:$('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                       
                        $("#userstable").DataTable({
                            data: data,
                            paging: true,
                            responsive: true,
                            searching: true,
                            pageLength: 10,

                            columns: [

                                { data: "name" },
                                { data: "email" },
                                { data: "status" },
                                { data: "type" },
                            ],

                            "columnDefs": [{
                                "targets": 4,
                                "data": 'id',
                                "render": function (data, type, row, meta) {


                                    return `<center><div class="btn-group" role="group" aria-label="Basic example"><button type="button" value="` + data + `" name="edit" class="btn btn-primary" data-toggle="modal" data-target="#exampleEditModal">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" value="` + data + `" name="delete" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button></div></center>`;

                                    ;
                                }

                            }]
                        });
                    },
                });
            }
            showAll();

            $(document).on("submit", "#addForm", function () {
                var fullname = $("#new_full_name").val();
                var email = $("#new_user_email").val();
                var password = $("#new_user_password").val();
                var type = $("#new_user_type").val();
                var status = $("#new_user_status").val();
                

                var formData = new FormData();
                formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
                formData.append("fullname", fullname);
                formData.append("email", email);
                formData.append("password", password);
                formData.append("type", type);
                formData.append("status", status);

                $.ajax({
                    url: "{{ route('users.store') }}",
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {

                        if (data == true) {



                            $('#addModal').modal('hide');
                            Toast.fire({
                                icon: 'success',
                                title: 'Account Added!',
                            });

                            $("#addForm").trigger("reset");
                            showAll();

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Email Already Taken!',
                            });

                            $("#new_user_email").val('');
                        }
                    }
                })
            })

            $(document).on("click", "button[name='edit']", function () {
                var id = $(this).val();
                var route = "{{ route('users.edit', ':id')}}";
                route = route.replace(':id', id);
               

                $.ajax({
                    url: route,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $("#id").val(data[0]["id"]);
                        $("#updated_full_name").val(data[0]["name"]);
                        $("#updated_user_email").val(data[0]["email"]);
                        $("#updated_user_status").val(data[0]["status"]);
                        $("#updated_user_type").val(data[0]["type"]);

                    
                    }
                })
            }),
                $(document).on("submit", "#updateForm", function () {


                    var id = $("#id").val();
                    var name = $("#updated_full_name").val();
                    var email = $("#updated_user_email").val();
                    var status = $("#updated_user_status").val();
                    var type = $("#updated_user_type").val();
                    var route = "{{ route('users.update', ':id')}}";
                    route = route.replace(':id', id);
                  


                    var formData = new FormData();
                    formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
                    formData.append("name", name);
                    formData.append("email", email);
                    formData.append("status", status);
                    formData.append("type", type);
                    formData.append("_method", 'PUT');


                    $.ajax({

                        url: route,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            
                            if (data == true) {

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Account Edited!',
                                });


                                showAll();
                                $('#exampleEditModal').modal('hide');

                            } else if (data == '3') {

                                Toast.fire({
                                    icon: 'error',
                                    title: 'Email Is Already Taken!',
                                });


                            } else {

                                Toast.fire({
                                    icon: 'error',
                                    title: 'No Changes Found!',
                                });


                            }

                        }
                    })

                });

            $(document).on("click", "button[name='delete']", function () {


                var id = $(this).val();
                var route = "{{ route('users.destroy', ':id')}}";
                route = route.replace(':id', id);

                var formData = new FormData();
                formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
                formData.append("_method", 'DELETE');

                Swal.fire({
                    title: 'Are you sure you?',
                    showDenyButton: true,

                    confirmButtonText: 'Delete',
                    denyButtonText: `Don't Delete`,
                }).then((result) => {

                    if (result.isConfirmed) {


                        $.ajax({

                            url: route,
                            contentType: false,
                            processData: false,
                            type: "POST",
                            data: formData,
                            success: function (data) {
                                if (data == 1) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Account Deleted!'
                                    })


                                    showAll();
                                }

                            }



                        })

                    }

                    else if (result.isDenied) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Not Deleted!'
                        })

                    }







                });

            });

        });
    </script>

    @endsection