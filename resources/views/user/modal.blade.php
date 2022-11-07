@extends('layouts.user') @section('content')

<!-- Edit Modal -->
<div class="modal fade" id="exampleEditModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Event</h5>
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
                        <label for="updated_event_title" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="updated_event_title" name="event_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="updated_event_date" class="form-label">Event Date </label>
                        <input type="date" class="form-control" id="updated_event_date" name="event_date" required>
                    </div> 
                    <div class="mb-3">
                        <label for="updated_event_time" class="form-label">Event Time </label>
                        <input type="time" class="form-control" id="updated_event_time" name="event_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="updated_contact_person" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" id="updated_contact_person" name="contact_person" required>
                    </div>
                    <div class="mb-3">
                        <label for="updated_contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="updated_contact_number" name="contact_number" required>
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
                    <div class="card-header">{{ __('Event List') }}
                    </div>

                    <div class="card-body">

                        <table id='userstable' class="table table-bordered table-hover table-responsive table-striped ">
                            <thead>
                                <tr>

                                    <th scope="col">Event</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Contact Person</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Category</th>
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
                    url: "{{ route('user.events') }}",
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

                                { data: "event_title" },
                                { data: "event_date" },
                                { data: "event_time" },
                                { data: "contact_person" },
                                { data: "contact_number" },
                                { data: "category_id" },
                            ],

                            "columnDefs": [{
                                "targets": 6,
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

            $(document).on("click", "button[name='edit']", function () {
                var id = $(this).val();
                var route = "{{ route('user.edit', ':id')}}";
                route = route.replace(':id', id);
               

                $.ajax({
                    url: route,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $("#id").val(data[0]["id"]);
                        $("#updated_event_title").val(data[0]["event_title"]);
                        $("#updated_event_date").val(data[0]["event_date"]);
                        $("#updated_event_time").val(data[0]["event_time"]);
                        $("#updated_contact_person").val(data[0]["contact_person"]);
                        $("#updated_contact_number").val(data[0]["contact_number"]);

                    
                    }
                })
            }),
                $(document).on("submit", "#updateForm", function () {


                    var id = $("#id").val();
                    var event_title = $("#updated_event_title").val();
                    var event_date = $("#updated_event_date").val();
                    var event_time = $("#updated_event_time").val();
                    var contact_person = $("#updated_contact_person").val();
                    var contact_number = $("#updated_contact_number").val();
                    var route = "{{ route('user.update', ':id')}}";
                    route = route.replace(':id', id);
                  


                    var formData = new FormData();
                    formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
                    formData.append("event_title", event_title);
                    formData.append("event_date", event_date);
                    formData.append("event_time", event_time);
                    formData.append("contact_person", contact_person);
                    formData.append("contact_number", contact_number);
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
                                    title: 'Username Already Taken!',
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
                var route = "{{ route('user.destroy', ':id')}}";
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