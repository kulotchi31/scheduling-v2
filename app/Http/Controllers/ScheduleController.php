<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule;
use App\Models\Equipment;
use App\Models\Event;
use App\Models\Vehicle;
use DB;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.schedule');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_date_time = date('Y-m-d H:i:s');
        
        try {
            $sched = new schedule();
            $sched->type = $request->type;
            $sched->current_date = $current_date_time;
            $sched->date_from = $request->date_from;
            $sched->date_to = $request->date_to;
            $sched->time_from = $request->time_from;
            $sched->time_to = $request->time_to;
            $sched->req_person = $request->req_person;
            $sched->contact_number = $request->contact_number;
            $sched->barangay = $request->barangay;
            $sched->save();

            if ($sched) {
              

                    if($request->type == "Event")
                    {
                        $event = new Event();
                        $event->facility_name = $request->facility_name;
                        $event->purpose = $request->purpose;
                        $event->attendees = $request->attendees;
                        $event->fk_s_id = $sched->id;
                        $event->save();

                        if ($event) {
                            return true;
                        }
                    }
                    else if($request->type == "Vehicle")
                    {
                        $vehicle = new Vehicle();
                        $vehicle->vehicle_name = $request->vehicle_name;
                        $vehicle->meeting_place = $request->meeting_place;
                        $vehicle->name_of_patient_passenger = $request->name_of_patient_passenger;
                        $vehicle->destination = $request->destination;
                        $vehicle->driver = $request->driver;
                        $vehicle->contact_num = $request->contact_num;
                        $vehicle->fk_s_id = $sched->id;
                        $vehicle->save();

                        if ($vehicle) {
                            return true;
                        }
                    }
                    else if($request->type == "Equipment")
                    {
                        $equipment = new Equipment();
                        $equipment->equipment_name = serialize(json_decode($request->equipment_name));
                        $equipment->event = $request->event;
                        $equipment->indoor_outdoor = serialize(json_decode($request->indoor_outdoor));
                        $equipment->fk_s_id = $sched->id;
                        $equipment->save();

                        if ($equipment) {
                            return true;
                        }
                    }
            }
        
        // return serialize(json_decode($request->equipment_name));

        if ($sched) {
            return true;
        }
        } 
        catch (Throwable $e) {
            return false;
        }
    }

    public function DateSelect(Request $request)
    {
            if($request->date_from!='' and $request->date_to!='')
            {

                $data =  DB::table("schedule")
                ->select("*")
                ->where('date_from', ">=", $request->date_from)
                ->where('date_to', "<=", $request->date_to)
                ->where('type', "=", $request->type)
                ->get();

            }

            else
            {

                return null;
            }


            if($data)
            {
                $vehicle =  DB::table("vehicle")
                ->select("*")
                ->where('vehicle_name', "=", $request->vehicle_name)
                ->get();

                return response()->json($data);


                if($vehicle == 0)
                {
                    $equipment =  DB::table("equipment")
                    ->select("*")
                    ->where('equipment_name', "=", $request->equipment_name)
                    ->get();

                    return response()->json($data);


                    if($equipment != 0)
                    {
                        $event =  DB::table("event")
                        ->select("*")
                        ->where('event_name', "=", $request->event_name)
                        ->get();

                        return response()->json($data);

                    }
                }
                // return response()->json($data);
            }
        

    }
    public function fetchSched()
    {

        $data = DB::table('schedule')
        ->select('*')
        ->get();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function schedDestroy($s_id)
    {
        try {

            $delete = DB::table("schedule")
            ->where('s_id', "=", $s_id)
            ->delete();

                if($delete)
                {
                    $deleteEvent = DB::table("event")
                    ->where('fk_s_id', "=", $s_id)
                    ->delete();

                    if($deleteEvent !=0)
                    {
                        return true;
                    }
                    else if($deleteEvent == 0)
                    {
                        $deleteVehicle = DB::table("vehicle")
                        ->where('fk_s_id', "=", $s_id)
                        ->delete();

                        if($deleteVehicle !=0)
                        {
                        return true;
                        }
                        else if($deleteVehicle ==0)
                        {
                            $deleteEquipment = DB::table("equipment")
                            ->where('fk_s_id', "=", $s_id)
                            ->delete();

                            if($deleteEquipment !=0)
                            {
                            return true;
                            }
                        }
                    
                    }

                }


            if ($delete != 0) {
                return true;
            }
        } catch (\Throwable $e) {

            return $e;
        }
    }
    public function schedEdit($s_id)
    {

        $data =  DB::table("schedule")
        ->select("*")
        ->where('s_id',$s_id)
        ->first();

        $data->type;
      
            if($data->type== 'Event')
            {
                $data =  DB::table("schedule")
                ->join('event', 'schedule.s_id', '=', 'event.fk_s_id')
                ->where('fk_s_id', $s_id)
                ->get();

                foreach($data as $newdata)
                {
                    $array=[     
                            "s_id"=>$newdata->s_id,
                            "purpose"=>$newdata->purpose,
                            "attendees"=>$newdata->attendees,
                            "facility_name"=>$newdata->facility_name,                         
                            "type"=>$newdata->type,
                            "current_date"=>$newdata->current_date,
                            "date_from"=>$newdata->date_from,
                            "date_to"=>$newdata->date_to,
                            "time_from"=>$newdata->time_from,
                            "time_to"=>$newdata->time_to,
                            "req_person"=>$newdata->req_person,
                            "contact_number"=>$newdata->contact_number,
                            "barangay"=>$newdata->barangay,

                    ];
                }
                    $data = $array;
                // ->get(['event.facility_name', 'event.purpose', 'event.attendees']);
            }
            else if ($data->type== 'Vehicle')
            {
                $data =  DB::table("schedule")
                ->join('vehicle', 'schedule.s_id', '=', 'vehicle.fk_s_id')
                ->where('fk_s_id', $s_id)
                ->get();

                
                foreach($data as $newdata)
                {
                    $array=[     
                            "s_id"=>$newdata->s_id,
                            "name_of_patient_passenger"=>$newdata->name_of_patient_passenger,
                            "meeting_place"=>$newdata->meeting_place,
                            "driver"=>$newdata->driver,
                            "destination"=>$newdata->destination,
                            "contact_num"=>$newdata->contact_num,
                            "vehicle_name"=>$newdata->vehicle_name,
                            "type"=>$newdata->type,
                            "current_date"=>$newdata->current_date,
                            "date_from"=>$newdata->date_from,
                            "date_to"=>$newdata->date_to,
                            "time_from"=>$newdata->time_from,
                            "time_to"=>$newdata->time_to,
                            "req_person"=>$newdata->req_person,
                            "contact_number"=>$newdata->contact_number,
                            "barangay"=>$newdata->barangay,

                    ];
                }
                    $data = $array;

                // ->get(['vehicle.vehicle_name', 'vehicle.meeting_place', 'vehicle.name_of_patient_passenger','vehicle.destination','vehicle.driver','vehicle.contact_num']);
            }
            else if ($data->type== 'Equipment')
            {
                $data =  DB::table("schedule")
                ->join('equipment', 'schedule.s_id', '=', 'equipment.fk_s_id')
                ->where('fk_s_id', $s_id)
                ->get();
                
                foreach($data as $newdata)
                {
                    $array=[     
                            "s_id"=>$newdata->s_id,
                            "event"=>$newdata->event,
                            "equipment_name"=>unserialize($newdata->equipment_name),
                            "indoor_outdoor"=>unserialize($newdata->indoor_outdoor),
                            "type"=>$newdata->type,
                            "current_date"=>$newdata->current_date,
                            "date_from"=>$newdata->date_from,
                            "date_to"=>$newdata->date_to,
                            "time_from"=>$newdata->time_from,
                            "time_to"=>$newdata->time_to,
                            "req_person"=>$newdata->req_person,
                            "contact_number"=>$newdata->contact_number,
                            "barangay"=>$newdata->barangay,

                    ];
                }
                    $data = $array;

                // ->get(['equipment.equipment_name', 'equipment.indoor_outdoor', 'equipment.event']);
                // $toarray = unserialize($new_equipment);

            }

        return response()->json($data);
    }
    public function schedUpdate(Request $request, $s_id)
    {
        try {

            $update = DB::table("schedule")
                ->where('s_id', "=", $s_id)
                ->update([
                    "type" => $request->type,
                    "date_from" => $request->date_from,
                    "date_to" => $request->date_to,
                    "time_from" => $request->time_from,
                    "time_to" => $request->time_to,
                    "req_person" => $request->req_person,
                    "contact_number" => $request->contact_number,
                    "barangay" => $request->barangay 
                ]);
                
                    if ($update != 0 || $update == 0) 
                    {
                        if($request->type == "Event")
                        {
                            $updateEvent = DB::table("event")
                            ->where('fk_s_id', "=", $s_id)
                            ->update([
                                "facility_name" => $request->facility_name,
                                "purpose" => $request->purpose,
                                "attendees" => $request->attendees
                            ]);
                            if ($updateEvent != 0) {
                                return true;
                            }
                            
                        }
                        else if($request->type == "Vehicle")
                        {
                            $updateVehicle = DB::table("vehicle")
                            ->where('fk_s_id', "=", $s_id)
                            ->update([
                                "vehicle_name" => $request->vehicle_name,
                                "meeting_place" => $request->meeting_place,
                                "name_of_patient_passenger" => $request->name_of_patient_passenger,
                                "destination" => $request->destination,
                                "driver" => $request->driver,
                                "contact_num" => $request->contact_num
                            ]);
                            if ($updateVehicle != 0) {
                                return true;
                            }
                            
                        }
                        else if($request->type == "Equipment")
                        {
                            $updateEquipment = DB::table("equipment")
                            ->where('fk_s_id', "=", $s_id)
                            ->update([
                                "equipment_name" => serialize(json_decode($request->equipment_name)),
                                "event" => $request->event,
                                "indoor_outdoor" => serialize(json_decode($request->indoor_outdoor))
                            ]);
                            if ($updateEquipment != 0) {
                                return true;
                            }
                            
                        }
                    }
                    if ($update != 0) {
                        return true;
                    }
                
        } catch (\Throwable $e) {

            return '3';
        }
    }
}
