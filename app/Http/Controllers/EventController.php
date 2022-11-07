<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule;
use App\Models\Event;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $addbrgy=DB::table('refbrgy')
       ->select('*')
       ->where('citymunCode','=','034930')
       ->get();

       $addcity=DB::table('refcitymun')
       ->select('*')
       ->where('provCode','=','0349')
       ->get();

       $addprovince=DB::table('refprovince')
       ->select('*')
       ->orderBy('provDesc','ASC')

       ->get();



        return view('user.events',["addprovince"=>$addprovince,'addbrgy'=>$addbrgy,"addcity"=>$addcity]);
    }


    public function checkSchedule(Request $request)
    {



      $period = CarbonPeriod::create($request->start,$request->end);
      $time_from = $request->time_from ; 
      $time_to = $request->time_to;

      $total = 0;

    foreach ($period as  $newperiod){


        
      $check = DB::table('schedule')
      ->join('event','schedule.s_id','=','event.fk_s_id')
      ->where('schedule.date_from', '=', $newperiod->format('Y-m-d'))
      ->where('event.facility_name', '=', $request->facility_name)
      ->where(function($query) use ($time_from ,$time_to) {
      $query->whereBetween('schedule.time_from',[$time_from,$time_to])
      ->orwhereBetween('schedule.time_to',[$time_from,$time_to]);
      })
 
      ->get();

                            if(count($check)!=0)
                            {
                                $total = $total+1;
                            }
                            else
                            {

                                $total = $total + 0 ;


                            }
            

                            }

        if($total==0)
        {


              return true;

        }

        else
        {

            return "cat";

        }


                        



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


        $period = CarbonPeriod::create($request->start,$request->end);

        $time_from = $request->time_from ; 
        $time_to = $request->time_to;
       

        $total = 0 ;
            foreach ($period as  $newperiod){
  
              // $check = DB::table('schedule')
              // ->join('event','schedule.s_id','=','event.fk_s_id')
              // ->whereBetween('schedule.time_from',  [$request->time_from,$request->time_to])
              // ->orwhereBetween('schedule.time_to',[$request->time_from,$request->time_to])
              // ->where('schedule.date_from', '=', $newperiod->format('Y-m-d'))
              // ->where('event.facility_name', '=', $request->facility_name)
              // ->get();

              $check = DB::table('schedule')
              ->join('event','schedule.s_id','=','event.fk_s_id')
              ->where(function($query) use ($time_from ,$time_to) {
                $query->whereBetween('schedule.time_from',[$time_from,$time_to])
                ->orwhereBetween('schedule.time_to',[$time_from,$time_to]);
            })
              ->where('schedule.date_from', '=', $newperiod->format('Y-m-d'))
              ->where('event.facility_name', '=', $request->facility_name)
              ->get();



                if(count($check)!=0)
                {
                     $total= $total +1; 
                }
                   

                }






         if($total==0)
         {


                       foreach ($period as  $newperiod){

                        $schedule = new schedule;


                        $schedule->type = $request->type;
                        $schedule->title = $request->title;
                        $schedule->start = $newperiod->format('Y-m-d').' '.$request->time_from ;
                        $schedule->end = $newperiod->format('Y-m-d').' '. $request->time_to ;
                        $schedule->date_from =$newperiod->format('Y-m-d');
                        $schedule->date_to =$newperiod->format('Y-m-d');
                        $schedule->time_from = $request->time_from;
                        $schedule->time_to = $request->time_to ;
                        $schedule->req_person = $request->person;
                        $schedule->barangay = $request->barangay;
                        $schedule->contact_number = $request->contact;

                        $schedule->save();


                     

                        $event = new Event;
                        $event->fk_s_id = $schedule->id;
                        $event->purpose  = $request->title;
                        $event->attendees = $request->attendees;
                        $event->facility_name = $request->facility_name;

                        $event->save();

                        






                       }

            

         }       
       
     
       return $total;

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
         
$event = schedule::find($request->id)->update([
                    'title'     =>  $request->title,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end
                ]);

return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $event = DB::table('schedule')
        ->where('s_id',$request->id)
        ->delete();

        return response()->json($event);
    }

    public function fetchEvent(Request $request)
    {

         if($request->ajax())
        {
            $data = schedule::whereDate('schedule.start', '>=', $request->start)
                       ->whereDate('schedule.end',   '<=', $request->end)
                       ->join('event','schedule.s_id','=','event.fk_s_id')
                       ->get(['s_id', 'title', 'start', 'end' ,'time_from', 'time_to','facility_name']);


                       
            return response()->json($data);
        }

    }


     public function getCities(Request $request)
    {
        try
        {
            $prov=DB::table('refprovince')
            ->select('*')
            ->where('provDesc','=',$request->prov)
            ->first();

            $cities=DB::table('refcitymun')
            ->select('*')
            ->where('provCode','=',$prov->provCode)
            ->get();

            return response()->json($cities);
        }

        catch(\Throwable $e)
        {
            return $e;
        }
    }

    public function getbrgy(Request $request)
    {
        try
        {
          $prov=DB::table('refprovince')
          ->select('*')
          ->where('provDesc','=',$request->prov)
          ->first();

            $city=DB::table('refcitymun')
            ->select('*')
            ->where('citymunDesc','=',$request->city)
            ->where('provCode','=',$prov->provCode)
            ->first();

            $brgy=DB::table('refbrgy')
            ->select('*')
            ->where('citymunCode','=',$city->citymunCode)
            ->get();

            return response()->json($brgy);
        }

        catch(\Throwable $e)
        {
            return $e;
        }
    }

    public function resetCity(Request $request)
    {



       $data=DB::table('refcitymun')
       ->select('*')
       ->where('provCode','=','0349')
       ->get();

        return response()->json($data);


    } 
    public function resetBrgy(Request $request)
    {

       $data=DB::table('refbrgy')
       ->select('*')
       ->where('citymunCode','=','034930')
       ->get();


        return response()->json($data);

    }
}
