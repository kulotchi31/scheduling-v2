<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Auth;
use Throwable;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('admin.users');
        $data = User::all();
        return view('admin.users', ["data" => $data]);
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
        try {
            $user = new User();
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = $request->type;
            $user->save();

            if ($user) {
                return true;
            }
        } catch (Throwable $e) {
            return false;
        }
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

    public function fetchUsers()
    {
        $data = DB::table('users')
        ->select('*')
        ->where('id','!=',Auth::user()->id)
        ->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  DB::table("users")
            ->select("*")
            ->where('id', "=", $id)
            ->get();

        return response()->json($data);
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
        try {

            $update = DB::table("users")
                ->where('id', "=", $id)
                ->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "status" => $request->status,
                    "type" => $request->type
                ]);


            if ($update != 0) {
                return true;
            }
        } catch (\Throwable $e) {

            return '3';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $delete = DB::table("users")
                ->where('id', "=", $id)
                ->delete();


            if ($delete != 0) {
                return true;
            }
        } catch (\Throwable $e) {

            return $e;
        }
    }
}
