@extends('layouts.user') 

@section('content')

<!-- Add Modal -->

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Schedule</h5><span><span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm" action="javascript:void(0);" method="POST">
                        @csrf

                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                          <div class="form-check form-check-inline mb-0 me-4">
                            <input type="radio" name="type" id="radio1" class="new_type" value="Event" required />&nbsp;&nbsp;Event
                        </div>
                        <script>
                            // radio1-onchange
                            $(document).on("change", "#radio1", function () {                                 
                                $(".new_vehicle_name").removeAttr('required');
                                $("#new_meeting_place").removeAttr('required');
                                $("#new_name_of_patient_passenger").removeAttr('required');
                                $("#new_destination").removeAttr('required');
                                $("#new_driver").removeAttr('required');
                                $("#new_vehi_contact_num").removeAttr('required');  

                                $("input[name='equipment_name']").removeAttr('required');
                                $("#new_event").removeAttr('required');
                                $("input[name='indoor_outdoor']").removeAttr('required');
                            });
                        </script>
                        <div class="form-check form-check-inline mb-0 me-4">
                            <input type="radio" name="type" id="radio2" class="new_type" value="Vehicle" required/>&nbsp;&nbsp;Vehicle
                        </div>
                        <script>
                            $(document).on("change", "#radio2", function () {                                 
                                $(".new_facility_name").removeAttr('required');
                                $("#new_purpose").removeAttr('required');
                                $("#new_attendees").removeAttr('required');

                                $("input[name='equipment_name']").removeAttr('required');
                                $("#new_event").removeAttr('required');
                                $("input[name='indoor_outdoor']").removeAttr('required');
                            });
                        </script>

                        <div class="form-check form-check-inline mb-0">
                            <input type="radio" name="type" id="radio3" class="new_type" value="Equipment" required/>&nbsp;&nbsp;Equipment
                        </div>
                    </div>
                    <script>
                        $(document).on("change", "#radio3", function () {                                 
                            $(".new_facility_name").removeAttr('required');
                            $("#new_purpose").removeAttr('required');
                            $("#new_attendees").removeAttr('required');

                            $(".new_vehicle_name").removeAttr('required');
                            $("#new_meeting_place").removeAttr('required');
                            $("#new_name_of_patient_passenger").removeAttr('required');
                            $("#new_destination").removeAttr('required');
                            $("#new_driver").removeAttr('required');
                            $("#new_vehi_contact_num").removeAttr('required');      
                        });
                    </script>


                    <style>
                        .myDiv{
                            display:none;
                        }  
                    </style>         
                    <script>
                        $(document).ready(function(){
                            $('input[type="radio"]').click(function(){
                                var demovalue = $(this).val(); 
                                $("div.myDiv").hide();
                                $("#show"+demovalue).show();
                            });
                        });
                    </script>
                    <div id="showEquipment" class="myDiv">
                        <input type="checkbox" name="equipment_name" class="new_equipment_name" value="Air Cooler"> Air Cooler <br>
                        <input type="checkbox" name="equipment_name" class="new_equipment_name" value="LED Wall"> LED Wall
                    </div>

                    <select id="dropdownEvent" name="facility_name" class="new_facility_name">
                        <option value="Hall">Hall</option>
                        <option value="Stage">Stage</option>
                        <option value="Gymnasium">Gymnasium</option>
                        <option value="Function Hall">Function Hall</option>
                    </select>
                    <select id="dropdownVehicle" name="vehicle_name" class="new_vehicle_name" >
                        <option value="Pick Up">Pick Up</option>
                        <option value="Ambulance">Ambulance</option>
                        <option value="Rescue">Rescue</option>
                        <option value="Train">Train</option>
                    </select>
                    <script>
                        $(document).ready(function(){
                            $('#dropdownEvent').hide();
                            $('input[type="radio"]').click(function(){                     
                                if ($(this).val() == 'Event') {
                                    $('#dropdownEvent').show();
                                }
                                else{
                                    $('#dropdownEvent').hide();
                                };
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function(){
                            $('#dropdownVehicle').hide();
                            $('input[type="radio"]').click(function(){                     
                                if ($(this).val() == 'Vehicle') {
                                    $('#dropdownVehicle').show();
                                }
                                else{
                                    $('#dropdownVehicle').hide();
                                };
                            });
                        });
                    </script>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Date:</label>
                    </div>
                    <div class="form-row">
                        <div class="col">
                        From:</label> <input id="new_date_from" type="date" name="date_from"  class="form-control form-control-lg" required>
                    </div>
                    <div class="col">
                    To:</label> <input id="new_date_to" type="date" name="date_to"  class="form-control form-control-lg" required>
                </div>

                <script language="javascript">
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0');
                    var yyyy = today.getFullYear();

                    today = yyyy + '-' + mm + '-' + dd;
                    $('input[name="date_from"]').attr('min',today);
                    $('input[name="date_to"]').attr('min',today);



                </script>

            </div> <br>      
            <script>
                $(document).ready(function () {

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                });

                $(document).on("change", "#new_date_from", function () {
                //  alert($(this).val()); 
                var date_from = $(this).val();

                var new_date_from = new Date(date_from);
                var dd = String(new_date_from.getDate()).padStart(2, '0');
                var mm = String(new_date_from.getMonth() + 1).padStart(2, '0');
                var yyyy = new_date_from.getFullYear();


                min_date = yyyy + '-' + mm + '-' + dd;
                      $('input[name="date_to"]').val('');

                $('input[name="date_to"]').attr('min',min_date);


                var date_to = $('#new_date_to').val();
                var type = $("input[name='type']:checked").val();
                var facility_name = $(".new_facility_name").val();
                var equipment_name = $("input[name='equipment_name']:checked").val();
                var vehicle_name = $(".new_vehicle_name").val();
                var route = "{{ route('user.dateselect')}}";

                $.ajax({
                    url: route,
                    method : "POST",
                    data: {

                        date_from:date_from,  
                        date_to:date_to,  
                        type:type,  
                        facility_name:facility_name,
                        equipment_name:equipment_name,  
                        vehicle_name:vehicle_name,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        

                    },
                    success: function (data) {
                        console.log(data);

                        let timerange = [];
                        for (let i = 0; i < data.length; i++) {


                            var a = data[i]["time_from"];
                            var b =  data[i]["time_to"];
                            var newB;

                            b.includes('30') ?    newB = b.replace('30','31') :  newB = b.replace('00','01') ;
                            
                            let timerangedata =[a ,newB];

                            timerange.push(timerangedata);
                            
                        }

                        $('input.timepicker').timepicker({

                            'disableTimeRanges':timerange,
                            'step':60,
                            'disableTextInput':true,
           
            

                        });  


                    }

                })

            });



                $(document).on("change", "#new_date_to", function () {
                //  alert($(this).val()); 
                var date_to = $(this).val();
                 var date_from = $('#new_date_from').val();
                var type = $("input[name='type']:checked").val();
                var facility_name = $(".new_facility_name").val();
                var equipment_name = $("input[name='equipment_name']:checked").val();
                var vehicle_name = $(".new_vehicle_name").val();
                var route = "{{ route('user.dateselect')}}";

                $.ajax({
                    url: route,
                    method : "POST",
                    data: {

                        date_from:date_from, 
                         date_to:date_to,   
                        type:type,  
                        facility_name:facility_name,
                        equipment_name:equipment_name,  
                        vehicle_name:vehicle_name,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        

                    },
                    success: function (data) {
                        console.log(data);

                        let timerange = [];
                        for (let i = 0; i < data.length; i++) {


                            var a = data[i]["time_from"];
                            var b =  data[i]["time_to"];
                            var newB;

                            b.includes('30') ?    newB = b.replace('30','31') :  newB = b.replace('00','01') ;
                            
                            let timerangedata =[a ,newB];

                            timerange.push(timerangedata);
                            
                        }

                        $('input.timepicker').timepicker({

                           'disableTimeRanges':timerange,
                           'step':60,
                           'disableTextInput':true,

                        });  


                    }

                })

            });
        </script>

        <div class="mb-3">
            <label class="form-label">Time:</label>
        </div> 
        <div class="form-row">
            <div class="col">   
                From: <input class="timepicker form-control form-control-lg" id="new_time_from" name="time_from" required>          
            </div>
            <div class="col">  
                To: <input class="timepicker form-control form-control-lg" id="new_time_to"  name="time_to" required>
            </div>
        </div>
        <hr>             
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" class="rel">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.js" integrity="sha512-s0SB4i9ezk9SRyV1Glrj/w5xS5ExSxXiN44fQeV9GYOtExbVWnC+mUsUyZdIYv6qXL0xe1qvpe0h1kk56gsgaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>         

        <script>
            $(document).ready(function(){
                $('#new_time_from').timepicker({

       
                
              'step':60,
              'disableTextInput':true,
           
            
              
                }); 





            });


            $('#new_time_from').change(function(){





                var startTime = $('#new_time_from').timepicker('getTime');
                var endTime = new Date(startTime.getTime() + 60*60000); 
                var maxTime = new Date(startTime.getTime() - 60*60000); 
                
                

                $('#new_time_to').timepicker({

                 
                  'minTime':endTime.toLocaleTimeString(),
                  'maxTime':maxTime.toLocaleTimeString(),
                  'disableTextInput':true,



              }); 


                $('#new_time_to').timepicker('setTime',endTime.toLocaleTimeString()); 
                

                
            }); 

        </script>  

        <div class="form-row">
            <div class="col">   
                <div>Requesting Person:</div>
                <input type="text" name="req_person" id="new_req_person"class="form-control form-control-lg" required>
            </div>
            <div class="col">  
                <div>Contact Number:</div>
                <input type="text" name="contact_number" id="new_contact_number"class="form-control form-control-lg" required> 
            </div>
        </div>
        <div class="form-row">
            <div class="col">   
                <div>Barangay:</div>
                <input type="text" name="barangay" id="new_barangay" class="form-control form-control-lg" required>
            </div>
        </div> 
        <hr>
        <style>
            .EventDiv{
                display:none;
            }  
        </style>         
        <script>
            $('input[type="radio"]').click(function(){
                if($(this).attr("value")=="Event"){
                    $(".EventDiv").show(); 
                    $(".VehicleDiv").hide();
                    $(".EquipDiv").hide();
                }        
            });
        </script>
        <div class="EventDiv">
            <div class="mb-3">
                <label class="form-label">Event Place:</label>
            </div>
            <div>Purpose:</div>
            <input type="text" name="purpose" id="new_purpose"class="form-control form-control-lg" required>

            <div>Approximate No. of Attendees:</div>
            <input type="number" name="attendees" id="new_attendees" class="form-control form-control-lg" required>                       
        </div>
        <style>
            .VehicleDiv{
                display:none;
            }  
        </style>         
        <script>
            $('input[type="radio"]').click(function(){
                if($(this).attr("value")=="Vehicle"){
                    $(".VehicleDiv").show(); 
                    $(".EventDiv").hide();
                    $(".EquipDiv").hide();
                }       
            });
        </script>
        <div class="VehicleDiv">
            <div class="mb-3">
                <label class="form-label">Vehicle:</label>
            </div>
            <div>Meeting Place:</div>
            <input type="text" name="meeting_place" id="new_meeting_place"class="form-control form-control-lg" required>

            <div>Name of Patient/Passenger:</div>
            <input type="text" name="name_of_patient_passenger" id="new_name_of_patient_passenger" class="form-control form-control-lg" required>                       

            <div>Destination:</div>
            <input type="text" name="destination"  id="new_destination"class="form-control form-control-lg" required>                       

            <div>Assigned Driver:</div>
            <input type="text" name="driver" id="new_driver" class="form-control form-control-lg" required>                       

            <div>Contact Number:</div>
            <input type="text" name="contact_num" id="new_vehi_contact_num" class="form-control form-control-lg" required>                                             
        </div>
        <style>
            .EquipDiv{
                display:none;
            }  
        </style>
        <script>
            $('input[type="radio"]').click(function(){
                if($(this).attr("value")=="Equipment"){
                    $(".EquipDiv").show();
                    $(".VehicleDiv").hide();
                    $(".EventDiv").hide();
                }        
            });
        </script>
        <div class="EquipDiv">
            <div class="mb-3">
                <label class="form-label">Equipment:</label>
            </div>
            <div>Event:</div>
            <input type="text" name="event" id="new_event"class="form-control form-control-lg" required><br>
            <div>
                <input type="checkbox" name="indoor_outdoor" id="new_indoor_outdoor" value="Indoor"> Indoor <br>
                <input type="checkbox" name="indoor_outdoor" id="new_indoor_outdoor" value="Outdoor"> Outdoor  
            </div>   
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
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Edit Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="updateForm" action="javascript:void(0);" method="PUT">
                @csrf
                <input type="hidden" id="s_id" name="s_id">
                <input type="hidden" name="_method" value="PUT">


                <div class="mb-3">
                    <label class="form-label">Category: </label>
                </div>  
                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input type="radio" name="edit_type" id="updated_type_event" class="updated_type" value="Event" required/>&nbsp;&nbsp;Event
                </div>

                <div class="form-check form-check-inline mb-0 me-4">
                    <input type="radio" name="edit_type" id="updated_type_vehicle"  class="updated_type" value="Vehicle" required/>&nbsp;&nbsp;Vehicle
                </div>

                <div class="form-check form-check-inline mb-0">
                    <input type="radio" name="edit_type" id="updated_type_equipment"  class="updated_type" value="Equipment" required/>&nbsp;&nbsp;Equipment
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    $('#select_event').hide();
                    $('#updated_type_event').click(function(){                     
                        if ($(this).val() == 'Event') {
                            $('#select_event').show();
                            $('#selectVehicle').hide();
                            $('#dropdownEquipment').hide();
                        }
                    });
                });
            </script>
            <select id="select_event" name="facility_name" class="updated_facility_name">
                <option value="Hall">Hall</option>
                <option value="Stage">Stage</option>
                <option value="Gymnasium">Gymnasium</option>
                <option value="Function Hall">Function Hall</option>
            </select>

            <script>
                $(document).ready(function(){
                    $('#dropdownEquipment').hide();
                    $('#updated_type_equipment').click(function(){                     
                        if ($(this).val() == 'Equipment') {
                            $('#dropdownEquipment').show();
                            $('#select_event').hide();
                            $('#selectVehicle').hide();


                        }
                    });
                });
            </script>
            <div id="dropdownEquipment">
                <input type="checkbox" name="edit_equipment_name" id="updated_aircooler" value="Air Cooler"> Air Cooler <br>
                <input type="checkbox" name="edit_equipment_name" id="updated_ledwall" value="LED Wall"> LED Wall
            </div>

            <script>
                $(document).ready(function(){
                    $('#selectVehicle').hide();
                    $('#updated_type_vehicle').click(function(){                     
                        if ($(this).val() == 'Vehicle') {
                            $('#selectVehicle').show();
                            $('#select_event').hide();
                            $('#dropdownEquipment').hide();

                        }
                    });
                });
            </script>  
            <select id="selectVehicle" name="vehicle_name" class="updated_vehicle_name">
                <option value="Pick Up">Pick Up</option>
                <option value="Ambulance">Ambulance</option>
                <option value="Rescue">Rescue</option>
                <option value="Train">Train</option>
            </select>        
            <hr>
            <div class="mb-3">
                <label class="form-label">Date:</label>
            </div>
            <div class="form-row">
                <div class="col">
                From:</label> <input id="updated_date_from" type="date" name="date_from"  class="form-control form-control-lg" required>
            </div>
            <div class="col">
            To:</label> <input id="updated_date_to" type="date" name="date_to"  class="form-control form-control-lg" required>
        </div>
    </div> <br>      

    <div class="mb-3">
        <label class="form-label">Time:</label>
    </div> 
    <div class="form-row">
        <div class="col">   
            From: <input class="timepicker form-control form-control-lg" id="updated_time_from" name="time_from" required>          
        </div>
        <div class="col">  
            To: <input class="timepicker form-control form-control-lg" id="updated_time_to"  name="time_to" required>
        </div>
    </div>
    <hr>  


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" class="rel">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.js" integrity="sha512-s0SB4i9ezk9SRyV1Glrj/w5xS5ExSxXiN44fQeV9GYOtExbVWnC+mUsUyZdIYv6qXL0xe1qvpe0h1kk56gsgaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>         



    <div class="form-row">
        <div class="col">   
            <div>Requesting Person:</div>
            <input type="text" name="req_person" id="updated_req_person"class="form-control form-control-lg" required>
        </div>
        <div class="col">  
            <div>Contact Number:</div>
            <input type="text" name="contact_number" id="updated_contact_number"class="form-control form-control-lg" required> 
        </div>
    </div>
    <div class="form-row">
        <div class="col">   
            <div>Barangay:</div>
            <input type="text" name="barangay" id="updated_barangay" class="form-control form-control-lg" required>
        </div>
    </div> 
    <hr>
    <style>
        .editEventDiv{
            display:none;
        }  
    </style>         
    <script>
        $('#updated_type_event').click(function(){
            if($(this).attr("value")=="Event"){
                $(".editEventDiv").show(); 
                $(".editVehicleDiv").hide();
                $(".editEquipDiv").hide();
            }        
        });
    </script>
    <div class="editEventDiv">
        <div class="mb-3">
            <label class="form-label">Event Place:</label>
        </div>
        <div>Purpose:</div>
        <input type="text" name="purpose" id="updated_purpose"class="form-control form-control-lg" required>

        <div>Approximate No. of Attendees:</div>
        <input type="number" name="attendees" id="updated_attendees" class="form-control form-control-lg" required>                       
    </div>
    <style>
        .editVehicleDiv{
            display:none;
        }  
    </style>         
    <script>
        $('#updated_type_vehicle').click(function(){
            if($(this).attr("value")=="Vehicle"){
                $(".editVehicleDiv").show(); 
                $(".editEventDiv").hide();
                $(".editEquipDiv").hide();
            }       
        });
    </script>
    <div class="editVehicleDiv">
        <div class="mb-3">
            <label class="form-label">Vehicle:</label>
        </div>
        <div>Meeting Place:</div>
        <input type="text" name="meeting_place" id="updated_meeting_place"class="form-control form-control-lg" required>

        <div>Name of Patient/Passenger:</div>
        <input type="text" name="name_of_patient_passenger" id="updated_name_of_patient_passenger" class="form-control form-control-lg" required>                       

        <div>Destination:</div>
        <input type="text" name="destination"  id="updated_destination"class="form-control form-control-lg" required>                       

        <div>Assigned Driver:</div>
        <input type="text" name="driver" id="updated_driver" class="form-control form-control-lg" required>                       

        <div>Contact Number:</div>
        <input type="text" name="contact_num" id="updated_vehi_contact_num" class="form-control form-control-lg" required>                                             
    </div>
    <style>
        .editEquipDiv{
            display:none;
        }  
    </style>
    <script>
        $('#updated_type_equipment').click(function(){
            if($(this).attr("value")=="Equipment"){
                $(".editEquipDiv").show();
                $(".editVehicleDiv").hide();
                $(".editEventDiv").hide();
            }        
        });
    </script>
    <div class="editEquipDiv">
        <div class="mb-3">
            <label class="form-label">Equipment:</label>
        </div>
        <div>Event:</div>
        <input type="text" name="event" id="updated_event"class="form-control form-control-lg" required><br>
        <div>
            <input type="checkbox" name="edit_indoor_outdoor" id="updated_indoor" class="updated_indoor_outdoor" value="Indoor" required> Indoor <br>
            <input type="checkbox" name="edit_indoor_outdoor" id="updated_outdoor" class="updated_indoor_outdoor" value="Outdoor" required> Outdoor  
        </div>   
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Schedule List') }} <div style="float: right;"> <button type="button"
                        class="btn btn-primary  " data-toggle="modal" data-target="#addModal">
                        Add Schedule
                    </button>

                </div>
            </div>

            <div class="card-body">

                <table id='userstable' class="table table-bordered table-hover table-responsive table-striped ">
                    <thead>
                        <tr>

                            <th scope="col">Type</th>
                            <th scope="col">Date From</th>
                            <th scope="col">Date To</th>
                            <th scope="col">Time From</th>
                            <th scope="col">Time To</th>
                            <th scope="col">Requested Person</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Barangay</th>
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
                url: "{{ route('fetch_schedule') }}",
                type: "GET",
                success: function (data) {
                        // console.log(data);
                        $("#userstable").DataTable({
                            data: data,
                            paging: true,
                            responsive: true,
                            searching: true,
                            pageLength: 10,

                            columns: [

                            { data: "type" },
                            { data: "date_from" },
                            { data: "date_to" },
                            { data: "time_from" },
                            { data: "time_to" },
                            { data: "req_person" },
                            { data: "contact_number" },
                            { data: "barangay" },
                            ],

                            "columnDefs": [{
                                "targets": 8,
                                "data": 's_id',
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

            var type = $("input[name='type']:checked").val();
            var date_from = $("#new_date_from").val();
            var date_to = $("#new_date_to").val();
            var time_from = $("#new_time_from").val();
            var time_to = $("#new_time_to").val();
            var req_person = $("#new_req_person").val();
            var contact_number = $("#new_contact_number").val();
            var barangay = $("#new_barangay").val();

            var equipment_name = [];
            $("input[name='equipment_name']:checked").each(function(i){
                equipment_name.push($(this).val());
            });
            var event = $("#new_event").val();
            var indoor_outdoor = [];
            $("input[name='indoor_outdoor']:checked").each(function(i){
                indoor_outdoor.push($(this).val());
            });

            var facility_name = $(".new_facility_name").val();
            var purpose = $("#new_purpose").val();
            var attendees = $("#new_attendees").val();

            var vehicle_name = $(".new_vehicle_name").val();
            var meeting_place = $("#new_meeting_place").val();
            var name_of_patient_passenger = $("#new_name_of_patient_passenger").val();
            var destination = $("#new_destination").val();
            var driver = $("#new_driver").val();
            var contact_num = $("#new_vehi_contact_num").val();

            var formData = new FormData();
            formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
            formData.append("type", type);
            formData.append("date_from", date_from);
            formData.append("date_to", date_to);
            formData.append("time_from", time_from);
            formData.append("time_to", time_to);
            formData.append("req_person", req_person);
            formData.append("contact_number", contact_number);
            formData.append("barangay", barangay);

            formData.append("equipment_name", JSON.stringify(equipment_name));
            formData.append("facility_name", facility_name);
            formData.append("vehicle_name", vehicle_name);
            formData.append("purpose", purpose);
            formData.append("attendees", attendees);
            formData.append("meeting_place", meeting_place);
            formData.append("name_of_patient_passenger", name_of_patient_passenger);
            formData.append("destination", destination);
            formData.append("driver", driver);
            formData.append("contact_num", contact_num);
            formData.append("indoor_outdoor", JSON.stringify(indoor_outdoor));
            formData.append("event", event);


            $.ajax({
                url: "{{ route('save_schedule') }}",
                method: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {

                    if (data == true) {

                        $('#addModal').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Schedule Added!',
                        });

                        $("#addForm").trigger("reset");
                        showAll();

                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Data not save!',
                        });

                    }
                    console.log(data);
                }
            })
        })

        $(document).on("click", "button[name='edit']", function () {
            var s_id = $(this).val();
            var route = "{{ route('edit_schedule', ':s_id')}}";
            route = route.replace(':s_id', s_id);
                // console.log(route);

                $.ajax({
                    url: route,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $("#s_id").val(data["s_id"]);
                        
                        if(data["type"]=='Event')
                        {
                            $('#updated_type_event').prop('checked',true);
                            $('#select_event').show();
                            $(".editEventDiv").show(); 
                            $(".editVehicleDiv").hide();
                            $(".editEquipDiv").hide();
                            $('#selectVehicle').hide();                        
                            $('#dropdownEquipment').hide();                        

                        }
                        else if(data["type"]=='Vehicle')
                        {
                            $('#updated_type_vehicle').prop('checked',true);
                            $('#selectVehicle').show(); 
                            $(".editVehicleDiv").show(); 
                            $(".editEventDiv").hide();
                            $(".editEquipDiv").hide();
                            $('#select_event').hide();                        
                            $('#dropdownEquipment').hide();                        
                        }
                        else if(data["type"]=='Equipment')
                        {
                            $('#updated_type_equipment').prop('checked',true);
                            $('#dropdownEquipment').show();
                            $(".editEquipDiv").show();
                            $(".editVehicleDiv").hide();
                            $(".editEventDiv").hide();
                            $('#selectVehicle').hide();                        
                            $('#select_event').hide();
                        }

                        $("#updated_date_from").val(data["date_from"]);
                        $("#updated_date_to").val(data["date_to"]);
                        $("#updated_time_from").val(data["time_from"]);
                        $("#updated_time_to").val(data["time_to"]);
                        $("#updated_req_person").val(data["req_person"]);
                        $("#updated_contact_number").val(data["contact_number"]);
                        $("#updated_barangay").val(data["barangay"]);


                        // console.log(data["equipment_name"][0])
                        let equipment_name = [];
                        for (let i = 0; i < data["equipment_name"].length; i++) {

                            if(data["equipment_name"][i]=='Air Cooler')
                            {
                                $('#updated_aircooler').attr('checked',true);
                            }
                            
                            if(data["equipment_name"][i]=='LED Wall')
                            {
                                $('#updated_ledwall').attr('checked',true);
                            }

                        }
                        
                        $(".updated_facility_name").val(data["facility_name"]);
                        $(".updated_vehicle_name").val(data["vehicle_name"]);
                        $("#updated_purpose").val(data["purpose"]);
                        $("#updated_attendees").val(data["attendees"]);
                        $("#updated_meeting_place").val(data["meeting_place"]);
                        $("#updated_name_of_patient_passenger").val(data["name_of_patient_passenger"]);
                        $("#updated_destination").val(data["destination"]);
                        $("#updated_driver").val(data["driver"]);
                        $("#updated_vehi_contact_num").val(data["contact_num"]);

                        let indoor_outdoor = [];
                        for (let i = 0; i < data["indoor_outdoor"].length; i++) {

                            if(data["indoor_outdoor"][i]=='Indoor')
                            {
                                $('#updated_indoor').attr('checked',true);
                            }

                            if(data["indoor_outdoor"][i]=='Outdoor')
                            {
                                $('#updated_outdoor').attr('checked',true);
                            }

                            $("#updated_event").val(data["event"]);
                        }
                        // console.log('User ' + data[0]["name"] + ' selected!');
                    }
                })
}),
$(document).on("submit", "#updateForm", function () {

    var s_id = $("#s_id").val();
    var type = $("input[name='edit_type']:checked").val();
    var date_from = $("#updated_date_from").val();
    var date_to = $("#updated_date_to").val();
    var time_from = $("#updated_time_from").val();
    var time_to = $("#updated_time_to").val();
    var req_person = $("#updated_req_person").val();
    var contact_number = $("#updated_contact_number").val();
    var barangay = $("#updated_barangay").val();

    var equipment_name = [];
    $("input[name='edit_equipment_name']:checked").each(function(i){
        equipment_name.push($(this).val());
    });
    var facility_name = $(".updated_facility_name").val();
    var vehicle_name = $(".updated_vehicle_name").val();
    var purpose = $("#updated_purpose").val();
    var attendees = $("#updated_attendees").val();
    var meeting_place = $("updated_meeting_place").val();
    var name_of_patient_passenger = $("updated_name_of_patient_passenger").val();
    var destination = $("#updated_destination").val();
    var driver = $("#updated_driver").val();
    var contact_num = $("#updated_vehi_contact_num").val(); 

    var indoor_outdoor = [];
    $("input[name='edit_indoor_outdoor']:checked").each(function(i){
        indoor_outdoor.push($(this).val());

    });
    var event = $("#updated_event").val();                    
    var route = "{{ route('update_schedule', ':s_id')}}";
    route = route.replace(':s_id', s_id);
                    // console.log(route);


                    var formData = new FormData();
                    formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
                    formData.append("type", type);
                    formData.append("date_from", date_from);
                    formData.append("date_to", date_to);
                    formData.append("time_from", time_from);
                    formData.append("time_to", time_to);
                    formData.append("req_person", req_person);
                    formData.append("contact_number", contact_number);
                    formData.append("barangay", barangay);

                    formData.append("equipment_name", JSON.stringify(equipment_name));
                    formData.append("facility_name", facility_name);
                    formData.append("vehicle_name", vehicle_name);
                    formData.append("purpose", purpose);
                    formData.append("attendees", attendees);
                    formData.append("meeting_place", meeting_place);
                    formData.append("name_of_patient_passenger", name_of_patient_passenger);
                    formData.append("destination", destination);
                    formData.append("driver", driver);
                    formData.append("contact_num", contact_num);
                    formData.append("indoor_outdoor", JSON.stringify(indoor_outdoor));
                    formData.append("event", event);
                    
                    formData.append("_method", 'PUT');

                    $.ajax({

                        url: route,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            // console.log(data);
                            if (data == true) {

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Schedule Edited!',
                                });


                                showAll();
                                $('#exampleEditModal').modal('hide');


                            } else {

                                Toast.fire({
                                    icon: 'error',
                                    title: 'No Changes Found!',
                                });


                            }

                        }
                    })

                });

$('#exampleEditModal').on('hidden.bs.modal', function () {
    $("input[type='checkbox']").removeAttr('checked');
})

$(document).on("click", "button[name='delete']", function () {


    var s_id = $(this).val();
    var route = "{{ route('destroy_schedule', ':s_id')}}";
    route = route.replace(':s_id', s_id);

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
                            title: 'Schedule Deleted!'
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