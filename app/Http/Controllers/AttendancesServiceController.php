<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AttendancesServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $attendances = DB::table('attendances as att')
                     ->join('employees as emp','emp.id','=','att.idemployee')
                    ->select('att.idemployee', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(att.hour_not_worked))) as totalHours'),DB::raw('CONCAT(emp.surname_paternal," ",emp.surname_maternal," ",emp.name) as employee'),'emp.dni')
                    ->where('att.state','=','1')
                    ->groupBy('att.idemployee','emp.name','emp.dni','emp.surname_paternal','emp.surname_maternal')
                    ->get();

            return response()->json($attendances);
    }

 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idemployee)
    {
             $attendances = DB::table('attendances as att')
                     ->join('employees as emp','emp.id','=','att.idemployee')
                    ->select('att.idemployee', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(att.hour_not_worked))) as totalHours'),DB::raw('CONCAT(emp.surname_paternal," ",emp.surname_maternal," ",emp.name) as employee'),'emp.dni')
                    ->where('att.state','=','1')
                    ->where('att.idemployee','=',$idemployee)
                    ->groupBy('att.idemployee','emp.name','emp.dni','emp.surname_paternal','emp.surname_maternal')
                    ->get();
              return response()->json($attendances);
    }

 
}
