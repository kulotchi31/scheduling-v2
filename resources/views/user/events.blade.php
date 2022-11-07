@extends('layouts.user') 

@section('content')

	<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Events</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="javascript:void(0);" method="POST">
                    @csrf


    
                    <div class="mb-3">
                        <label for="new_type" class="form-label">Type</label>
                        <input type="text" value="Event" readonly class="form-control" id="new_type" name="new_type" required>
                    </div>

                    <div class="mb-3">
                    	<label for="new_facility" class="form-label">Facility</label>
                    	<select name="new_facility" id="new_facility" class="form-control">
                    		<option value="Mayor's Hall">Mayor's Hall</option>
                    		<option value="Gymnasium">Gymnasium</option>
                    	</select>
                    </div>

                    <div class="mb-3">
                        <label for="new_title" class="form-label">Purpose</label>
                        <input type="text" class="form-control" id="new_title" name="new_title" required>
                    </div>

                      <div class="mb-3">
                        <label for="new_attendees" class="form-label">Approximate No. of Attendees:</label>
                        <input type="number" class="form-control" id="new_attendees" name="new_attendees" required>
                    </div>


                <div class="row">


                      <div class="col-6">
                        <label for="new_person" class="form-label">Requesting Person </label>
                        <input type="text" class="form-control" id="new_person" name="new_person" required>
                    </div>


                        <div class="col-6">
                        <label for="new_contact_no" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="new_contact_no" name="new_contact_no" required>
                    </div>


                   </div>


                       <div class="row">


                      <div class="col-4">
                        <label for="new_facility" class="form-label">Province</label>

                        <select id="addprovince" class="form-control" name="province"  required>
                        @foreach($addprovince as $addprovinces)
                        <option @if($addprovinces->provDesc=='NUEVA ECIJA') selected @endif value="{{$addprovinces->provDesc}}">{{$addprovinces->provDesc}}</option>
                        @endforeach
                        </select> 


                    </div>


                        <div class="col-4">
                        <label for="new_facility" class="form-label">City</label>
                        <select id="addcity" class="form-control" name="city_municipality"  required>
                        @foreach($addcity as $addcities)
                        <option @if($addcities->citymunDesc=='TALAVERA') selected @endif    value="{{$addcities->citymunDesc}}">{{$addcities->citymunDesc}}</option>
                        @endforeach
                        </select> 

                    </div>


                      <div class="col-4">
                        <label for="new_facility" class="form-label">Barangay</label>
                        <select id="addbrgy" class="form-control" name="barangay"  required>
                        @foreach($addbrgy as $addbrgys)
                        <option value="{{$addbrgys->brgyDesc}}">{{$addbrgys->brgyDesc}}</option>
                        @endforeach
                    </select>   
                        
                    </div>



                   </div>



             

           


               

                    <div class="row">


                      <div class="col-6">
                        <label for="date_from" class="form-label">Date From </label>
                        <input type="date" class="form-control" id="date_from" name="date_from" required>
                    </div>


                        <div class="col-6">
                        <label for="date_to" class="form-label">Date To</label>
                        <input type="date" class="form-control" id="date_to" name="date_to"
                        required>
                    </div>


                   </div>


                    <div class="row">


                      <div class="col-6">
                                           <label for="time_from" class="form-label">Time From </label>
                        <input type="time" class="form-control" id="time_from" name="time_from" required>
                    </div>


                        <div class="col-6">
                     <label for="time_to" class="form-label">Time To</label>
                        <input type="time" class="form-control " id="time_to" name="time_to"
                            required>
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







 <div class="container">

    <div id="calendar" ></div>

</div>
   
<script>

$(document).ready(function () {



//     $("#addModal").on("hidden.bs.modal", function () {
//     // put your default event here
//     alert('dog');
//     $('#calendar').fullCalendar('unselect');


// });

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;

$('input[name="date_from"]').attr('min',today);
$('input[name="date_to"]').attr('min',today);


    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });



    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({

        editable:false,
         height: 600 ,
         width:500,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek'
        },

        eventConstraint: {
        	start: moment().format('YYYY-MM-DD'),
        	end: '2200-01-01'
        },
 		
        googleCalendarApiKey: 'AIzaSyD03lpuz3IMx65Vh6OGiYhy-CZTX-B82ks',

        eventSources: [{googleCalendarId:'fil.philippines#holiday@group.v.calendar.google.com', className: 'gcal-event'},{url:"{{route('fetchevent')}}",}],

        // 
        selectable:true,
        selectHelper: true,
        select:function(start, end, allDay ,jsEvent)
        {
           
        

            $('#date_from').val($.fullCalendar.formatDate(start, 'Y-MM-DD'))
            $('#date_to').val($.fullCalendar.formatDate(start, 'Y-MM-DD'))

              
               var check = $.fullCalendar.formatDate(start,'Y-MM-DD');

               var today = moment().format("YYYY-MM-DD");
                
        
                if(check >= today)
                {



                     $("#addModal").modal('show');
                 


                   
                }
                else
                {
                    

                     Toast.fire({
                                icon: 'error',
                                title: 'Cannot Create Event For Past Dates!!',
                            });



                }

            

            // ;

                // $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
        calendar.fullCalendar('unselect');
            
        },
        eventResize: function(event, delta )
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.s_id;

            var route = "{{route('event.update',':id')}}";

            route.replace(':id',id);

              console.log(route);
            $.ajax({
                url:route,
                type:"POST",
                data:{
                	_method:"PUT",
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated Successfully");
                }
            })
        },
        eventRender: function(event, element) {
          

    //Check what is the key for description in event and use that one.

     element.find('.fc-title').empty();


     if(event.facility_name!=undefined)
     {

        var facility = event.facility_name;

     }
    else
    {

        var facility = "";

    }

    element.find('.fc-title').append(" <ul><li>"+ event.title+" </li> <li>"+facility+" </li> <li>"+event.start.format("h:mm a")+"-"+event.end.format("h:mm a")+"</li>  </ul " ); 


    
},
        eventDrop: function(event,revertFunc,delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
          	var id = event.s_id;
            var route = "{{route('event.update',':id')}}";

            route.replace(':id',id);


              var check = $.fullCalendar.formatDate(event.start,'Y-MM-DD');

               var today = moment().format("YYYY-MM-DD");
                
        
                if(check >= today)
                {
                

                    $.ajax({
                        url:route,
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })

                }
                else
                {

                    

                     Toast.fire({
                                icon: 'error',
                                title: 'Cannot Create Event For Past Dates!!',
                            });


                }

        },

        eventClick:function(event)
        {
            if (event.url) {
             
              return false;
          }


            else if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.s_id;

                var route = "{{route('event.destroy',':id')}}";

                route.replace(':id',id);




                $.ajax({
                    url:route,
                    type:"POST",
                    data:{
                    	_method:"DELETE",
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Deleted Successfully");
                    }
                })
            }
        }




    });




$(document).on('submit','#addForm',function(event){

    var type =  $('#new_type').val();
    var title = $('#new_title').val();
    var start = $('#date_from').val();
    var end =     $('#date_to').val();

    var time_from = $('#time_from').val();
    var time_to =     $('#time_to').val();


    var facility_name = $('#new_facility').val();
    var attendees = $('#new_attendees').val();
    var person = $('#new_person').val();
    var contact = $('#new_contact_no').val();
    var province = $('#addprovince').val();
    var city = $('#addcity').val();
    var barangay = $('#addbrgy').val();



    $.ajax({
        url:"{{route('event.store')}}",
        type:"POST",
        data:{
            title:title,
            start:start,
            end: end,
            time_from:time_from,
            time_to:time_to,
            type:type,

            facility_name:facility_name,
            attendees:attendees,
            person: person,
            contact:contact,
            province:province,
            city:city,
            barangay:barangay,
        },
        success:function(data)
        {

            if(data==0)
            {

            calendar.fullCalendar('refetchEvents');

             console.log(data);

            Toast.fire({
                icon: 'success',
                title: 'Event Created Successfully!',
            });


            resetCity()
            resetBarangay()
            
             $("#addForm").trigger('reset');

            $("#addModal").modal('hide');


            $("#date_from").removeClass("is-invalid");
            $("#date_to").removeClass("is-invalid");
            $("#time_from").removeClass("is-invalid");
            $("#time_to").removeClass("is-invalid");

            $("#date_from").removeClass("is-valid");
            $("#date_to").removeClass("is-valid");
            $("#time_from").removeClass("is-valid");
            $("#time_to").removeClass("is-valid");

            }


            else
            {

                   Toast.fire({
                icon: 'error',
                title: 'Conflict On Schedule!',
            });

            }
           


        }
    })

});


$(document).on('change','#time_to',function(event){

   var start = $('#date_from').val();
    var end =     $('#date_to').val();
    var time_from = $('#time_from').val();
    var time_to =     $('#time_to').val();
    var facility_name = $('#new_facility').val(); 

          if( start!='' &&  end!='' &&  time_from!='' &&  time_to!='' )
    {

       $.ajax({
        url:"{{route('checkschedule')}}",
        type:"POST",
        data:{
            
            start:start,
            end: end,
            time_from:time_from,
            time_to:time_to,
            facility_name:facility_name,
            
        },
        success:function(data)
        {
         

           console.log(data);

           if(data==1)
           {

             $("#date_from").removeClass("is-invalid");
            $("#date_to").removeClass("is-invalid");
            $("#time_from").removeClass("is-invalid");
            $("#time_to").removeClass("is-invalid");

            $("#date_from").addClass("is-valid");
            $("#date_to").addClass("is-valid");
            $("#time_from").addClass("is-valid");
            $("#time_to").addClass("is-valid");


        }
        else
        {

             

          $("#date_from").removeClass("is-valid");
          $("#date_to").removeClass("is-valid");
          $("#time_from").removeClass("is-valid");
          $("#time_to").removeClass("is-valid");

            $("#date_from").addClass("is-invalid");
            $("#date_to").addClass("is-invalid");
            $("#time_from").addClass("is-invalid");
            $("#time_to").addClass("is-invalid");



        }

            // Toast.fire({
            //     icon: 'success',
            //     title: 'Event Created Successfully!',
            // });


            // $("#addModal").modal('hide');

        }
    })


    }

    else
    {




    }




});


$(document).on('change','#time_from',function(event){

   var start = $('#date_from').val();
    var end =     $('#date_to').val();
    var time_from = $('#time_from').val();
    var time_to =     $('#time_to').val();
    var facility_name = $('#new_facility').val(); 

          if( start!='' &&  end!='' &&  time_from!='' &&  time_to!='' )
    {

       $.ajax({
        url:"{{route('checkschedule')}}",
        type:"POST",
        data:{
            
            start:start,
            end: end,
            time_from:time_from,
            time_to:time_to,
            facility_name:facility_name,
            
        },
        success:function(data)
        {
         

           console.log(data);

           if(data==1)
           {

             $("#date_from").removeClass("is-invalid");
            $("#date_to").removeClass("is-invalid");
            $("#time_from").removeClass("is-invalid");
            $("#time_to").removeClass("is-invalid");

            $("#date_from").addClass("is-valid");
            $("#date_to").addClass("is-valid");
            $("#time_from").addClass("is-valid");
            $("#time_to").addClass("is-valid");


        }
        else
        {

             

          $("#date_from").removeClass("is-valid");
          $("#date_to").removeClass("is-valid");
          $("#time_from").removeClass("is-valid");
          $("#time_to").removeClass("is-valid");

            $("#date_from").addClass("is-invalid");
            $("#date_to").addClass("is-invalid");
            $("#time_from").addClass("is-invalid");
            $("#time_to").addClass("is-invalid");



        }

            // Toast.fire({
            //     icon: 'success',
            //     title: 'Event Created Successfully!',
            // });


            // $("#addModal").modal('hide');

        }
    })


    }

    else
    {




    }




});


$(document).on('change','#date_from',function(event){

  var start = $('#date_from').val();
    var end =     $('#date_to').val();
    var time_from = $('#time_from').val();
    var time_to =     $('#time_to').val();
    var facility_name = $('#new_facility').val(); 

          if( start!='' &&  end!='' &&  time_from!='' &&  time_to!='' )
    {

       $.ajax({
        url:"{{route('checkschedule')}}",
        type:"POST",
        data:{
            
            start:start,
            end: end,
            time_from:time_from,
            time_to:time_to,
            facility_name:facility_name,
            
        },
        success:function(data)
        {
         

           console.log(data);

           if(data==1)
           {

             $("#date_from").removeClass("is-invalid");
            $("#date_to").removeClass("is-invalid");
            $("#time_from").removeClass("is-invalid");
            $("#time_to").removeClass("is-invalid");

            $("#date_from").addClass("is-valid");
            $("#date_to").addClass("is-valid");
            $("#time_from").addClass("is-valid");
            $("#time_to").addClass("is-valid");


        }
        else
        {

             

          $("#date_from").removeClass("is-valid");
          $("#date_to").removeClass("is-valid");
          $("#time_from").removeClass("is-valid");
          $("#time_to").removeClass("is-valid");

            $("#date_from").addClass("is-invalid");
            $("#date_to").addClass("is-invalid");
            $("#time_from").addClass("is-invalid");
            $("#time_to").addClass("is-invalid");



        }

            // Toast.fire({
            //     icon: 'success',
            //     title: 'Event Created Successfully!',
            // });


            // $("#addModal").modal('hide');

        }
    })


    }

    else
    {




    }


       



});


$(document).on('change','#date_to',function(event){

      var start = $('#date_from').val();
    var end =     $('#date_to').val();
    var time_from = $('#time_from').val();
    var time_to =     $('#time_to').val();
    var facility_name = $('#new_facility').val(); 

          if( start!='' &&  end!='' &&  time_from!='' &&  time_to!='' )
    {

       $.ajax({
        url:"{{route('checkschedule')}}",
        type:"POST",
        data:{
            
            start:start,
            end: end,
            time_from:time_from,
            time_to:time_to,
            facility_name:facility_name,
            
        },
        success:function(data)
        {
         

           console.log(data);

           if(data==1)
           {

             $("#date_from").removeClass("is-invalid");
            $("#date_to").removeClass("is-invalid");
            $("#time_from").removeClass("is-invalid");
            $("#time_to").removeClass("is-invalid");

            $("#date_from").addClass("is-valid");
            $("#date_to").addClass("is-valid");
            $("#time_from").addClass("is-valid");
            $("#time_to").addClass("is-valid");


        }
        else
        {

             

          $("#date_from").removeClass("is-valid");
          $("#date_to").removeClass("is-valid");
          $("#time_from").removeClass("is-valid");
          $("#time_to").removeClass("is-valid");

            $("#date_from").addClass("is-invalid");
            $("#date_to").addClass("is-invalid");
            $("#time_from").addClass("is-invalid");
            $("#time_to").addClass("is-invalid");



        }

            // Toast.fire({
            //     icon: 'success',
            //     title: 'Event Created Successfully!',
            // });


            // $("#addModal").modal('hide');

        }
    })


    }

    else
    {




    }




});


$(document).on('change','#new_facility',function(event){

   var start = $('#date_from').val();
    var end =     $('#date_to').val();
    var time_from = $('#time_from').val();
    var time_to =     $('#time_to').val();
    var facility_name = $('#new_facility').val(); 

          if( start!='' &&  end!='' &&  time_from!='' &&  time_to!='' )
    {

       $.ajax({
        url:"{{route('checkschedule')}}",
        type:"POST",
        data:{
            
            start:start,
            end: end,
            time_from:time_from,
            time_to:time_to,
            facility_name:facility_name,
            
        },
        success:function(data)
        {
         

           console.log(data);

           if(data==1)
           {

             $("#date_from").removeClass("is-invalid");
            $("#date_to").removeClass("is-invalid");
            $("#time_from").removeClass("is-invalid");
            $("#time_to").removeClass("is-invalid");

            $("#date_from").addClass("is-valid");
            $("#date_to").addClass("is-valid");
            $("#time_from").addClass("is-valid");
            $("#time_to").addClass("is-valid");


        }
        else
        {

             

          $("#date_from").removeClass("is-valid");
          $("#date_to").removeClass("is-valid");
          $("#time_from").removeClass("is-valid");
          $("#time_to").removeClass("is-valid");

            $("#date_from").addClass("is-invalid");
            $("#date_to").addClass("is-invalid");
            $("#time_from").addClass("is-invalid");
            $("#time_to").addClass("is-invalid");



        }

            // Toast.fire({
            //     icon: 'success',
            //     title: 'Event Created Successfully!',
            // });


            // $("#addModal").modal('hide');

        }
    })


    }

    else
    {




    }




});


           $(document).on('change',"#addprovince",function(){

                var prov = $(this).val();

                $.ajax({
                url:"{{route('getcities')}}",
                method:"POST",
                data:{prov:prov,_token:$('meta[name="csrf-token"]').attr('content')},
                    success:function(data){

                    console.log(data);

                    $('#addcity').empty();
                    $('#addbrgy').empty();
                    $('#addcity').append('<option ></option>');

                        for (var i = 0; i<data.length; i++) {

                        $('#addcity').append('<option value="'+data[i]['citymunDesc']+'">'+data[i]['citymunDesc']+'</option>');
                        }
                    }
                })
            });


            $(document).on('change',"#addcity",function(){
                var city = $(this).val();
                var prov = $('#addprovince').val();
                
                if(city!='')
                {

                    $.ajax({
                    url:"{{route('getbrgy')}}",
                    method:"POST",
                    data:{city:city,prov:prov,_token:$('meta[name="csrf-token"]').attr('content')},
                        
                    success:function(data){

                        console.log(data);

                        $('#addbrgy').empty();

                            for (var i = 0; i<data.length; i++) {

                                $('#addbrgy').append('<option>'+data[i]['brgyDesc']+'</option>');

                            }
                        }
                    })
                }
                else
                {
                    $('#addbrgy').empty();
                }
            });

        function resetCity()
        {

            $.ajax({
                url:"{{route('resetcity')}}",
                method:"POST",
                data:{_token:$('meta[name="csrf-token"]').attr('content')},
                success:function(data){

                    console.log(data);

                    $('#addcity').empty();
                    $('#addbrgy').empty();
                    $('#addcity').append('<option ></option>');

                    for (var i = 0; i<data.length; i++) {


                            if(data[i]['citymunDesc']=="TALAVERA")
                            {

                            $('#addcity').append('<option selected value="'+data[i]['citymunDesc']+'">'+data[i]['citymunDesc']+'</option>');


                            }

                            else
                            {

                                
                        $('#addcity').append('<option value="'+data[i]['citymunDesc']+'">'+data[i]['citymunDesc']+'</option>');   
                            }

                    }
                }
            })


        }

        function resetBarangay()
        {

          $.ajax({
            url:"{{route('resetbarangay')}}",
            method:"POST",
            data:{_token:$('meta[name="csrf-token"]').attr('content')},

            success:function(data){

                console.log(data);

                $('#addbrgy').empty();

                for (var i = 0; i<data.length; i++) {

                    $('#addbrgy').append('<option>'+data[i]['brgyDesc']+'</option>');

                }
            }
        })

        }


});
  
</script>




@endsection