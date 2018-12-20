<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;
use App\Charge;
use Flash;
use Carbon\Carbon;
use DB;
class AttendancesController extends Controller
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

        $attendances = Attendance::where('hour_departure','=',null)->get();
        return view('attendances.arrival_record.index',['attendances'=> $attendances] );
    }
    
    public function comparteToHourDeparture($hour_departure){

    }

    public function listAttendances(Request $request)
    {
        if ($request) {
            $employees = Employee::orderBy('surname_paternal')->get();        

            if ($request->get('date_start') != null && $request->get('date_end') !=null && $request->get('idemployee')!="--Empleado--" ) {
                $attendances=DB::table('attendances as att')
                    ->join('employees as emp','emp.id','=','att.idemployee')
                    ->select('att.idemployee', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(att.hour_not_worked))) as totalHours'),DB::raw('CONCAT(emp.surname_paternal," ",emp.surname_maternal," ",emp.name) as employee'), 'emp.dni')
                    ->where('att.idemployee','=',$request->get('idemployee'))
                    ->where('att.state','=','1')
                    ->whereBetween('att.date', [$request->get('date_start') , $request->get('date_end')])
                    ->groupBy('att.idemployee','emp.name','emp.dni','emp.surname_paternal','emp.surname_maternal')
                    ->get();
                $datos= array('totalHours' => $attendances[0]->totalHours, 'employee'=>$attendances[0]->employee,'date_start'=>$request->get('date_start'),'date_end'=>$request->get('date_end')  );
                
             
                return view('attendances.list_attendances.report',["datos"=>$datos,"employees"=>$employees]);
                
            }else{
                $attendances = DB::table('attendances as att')
                    ->join('employees as emp','emp.id','=','att.idemployee')
                    ->select('att.idemployee', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(att.hour_not_worked))) as totalHours'),DB::raw('CONCAT(emp.surname_paternal," ",emp.surname_maternal," ",emp.name) as employee'),'emp.dni')
                    ->where('att.state','=','1')
                    ->groupBy('att.idemployee','emp.name','emp.dni','emp.surname_paternal','emp.surname_maternal')
                    ->get();

                return view('attendances.list_attendances.list',["attendances"=>$attendances,"employees"=>$employees]);

                    //DB::raw('CONCAT(emp.surname_paternal," ",emp.surname_maternal," ",emp.name) as employee'),                           
                    /*SELECT CONCAT(emp.name," ",emp.surname_paternal," ",emp.surname_maternal) as employee, SEC_TO_TIME(SUM(TIME_TO_SEC(att.hour_not_worked))) as total
                    FROM employees emp
                    INNER JOIN attendances att ON emp.id = att.idemployee
                            GROUP BY att.idemployee;*/
            }
        }
           // $employees=Employee::pluck('name','surname_paternal','surname_maternal','id');
           //return view('attendances.list_attendances.list',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::orderBy('surname_paternal')->get();
       return view('attendances.arrival_record.create',["employees"=>$employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function takeOutDay($fecha){

        $fechats = strtotime($fecha); //a timestamp 
        $dia=null;
        //el parametro w en la funcion date indica que queremos el dia de la semana 
        //lo devuelve en numero 0 domingo, 1 lunes,.... 
        switch (date('w', $fechats)){ 
            case 0:
                $dia="Domingo"; break; 
            case 1: 
                $dia="Lunes"; break; 
            case 2: 
                $dia="Martes"; break; 
            case 3: 
                $dia="Miercoles";break; 
            case 4: 
                $dia= "Jueves"; break; 
            case 5: 
                $dia= "Viernes"; break; 
            case 6:
                $dia= "Sabado"; break; 
        }

        return $dia;
    }

    public function store(Request $request)
    {
            //Store es el encargado de guardar el nuevo producto
        $attendance= new Attendance;
        $attendance->date=$request->date;
        $attendance->hour_entry=$request->hour_entry;
        $attendance->idemployee=$request->idemployee;
        $attendance->state='1';
        
        if ($attendance->save()) {
            Flash::success('Asistencia registrado exitosamente.');
           return redirect(url('attendances/arrival_record'));
        }else{
            return view("attendances.arrival_record.create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idemployee)
    {

        //http://localhost:8000/attendances/arrival_record/2 automaticamente laravel reconocera que es show
        //var_dump("hello");
        $attendances = Attendance::where('idemployee','=',$idemployee)
                        ->where('state','=','1')
                        ->get();
        return view('attendances.arrival_record.show',['attendances'=> $attendances] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //Muestra un formulario para editar el productos con ese id
         $attendance = Attendance::find($id);
        if (empty($attendance)) {/*una variable se considera vacía si no existe o si su valor es igual a FALSE. empty() */
            Flash::error('Asistencia not encontrado');
            return redirect(url('attendances/arrival_record.edit'));
        }

        return view('attendances.arrival_record.edit',['attendance'=>$attendance]);    
        // ->with('charge', $charge);
    }


    public function editList($id)

    {
         //Muestra un formulario para editar el productos con ese id
         $attendance = Attendance::find($id);
        if (empty($attendance)) {/*una variable se considera vacía si no existe o si su valor es igual a FALSE. empty() */
            Flash::error('Asistencia not encontrado');
            return redirect(url('attendances/arrival_record.edit_list'));
        }

        return view('attendances.arrival_record.edit_list',['attendance'=>$attendance]);    
        // ->with('charge', $charge);
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

        //METODOS PRINT_R MUESTRA ORDENADO
        //METODO DD() muestra el valor
        //METODO gettype()

        if (!empty($request->listTable)) {
            
                $attendance= Attendance::find($id);
                $attendance->hour_departure=$request->hour_departure;
                $attendance->hour_entry=$request->hour_entry;
                // $attendance->hour_departure=$request->hour_departure;
          

                if ($attendance->save()) {
                        Flash::success('Hora de salida registrado exitosamente.');
                        return redirect(url('attendances/arrival_record'));
                }else{
                        return view("attendances.arrival_record.edit_list");
                }

        }else{
                $attendance= Attendance::find($id);
                $attendance->hour_departure=$request->hour_departure;
                $day=AttendancesController::takeOutDay($attendance->date);
             
                $delay=DB::select("call sp_calculator_dif_hours('$attendance->idemployee','$attendance->hour_entry','$attendance->hour_departure','$day')");  
                $attendance->hour_not_worked=$delay[0]->hour_not_worked ;        
                if ($attendance->save()) {
                        Flash::success('Hora de salida registrado exitosamente.');
                        return redirect(url('attendances/arrival_record'));
                }else{
                        return view("attendances.arrival_record.edit");
                }
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
        //
        $attendance= Attendance::find($id);
        if (empty($attendance)) {
            Flash::error('Asistencia no encontrado');
            $attendances = Attendance::where('state','=','1')
                        ->get();
             return view('attendances.arrival_record.show',['attendances'=> $attendances] );
        }
        $attendance->state="0";
        $attendance->update();
        Flash::success('Asistencia borrado exitosamente.');
        $attendances = Attendance::where('state','=','1')
                        ->get();
        return view('attendances.arrival_record.show',['attendances'=> $attendances] );
    }
    /**
      Metodo que devuelve el idcharge de un empleado en particular
      parametros: idemployee
     */
  
     public function returnEmployeeCharge($idemployee){
            $employee=Employee::find($idemployee);
            if (empty($employee)) {           
                return null;
            }
            $idcharge=$employee->idcharge;
            return $idcharge;
     }

    /*
        Metodo que devuelve la hour_entry y hour_departure 
        parametros: idcharge
    */
    public function hourEntryAndDepartureCharge($idcharge){
            $charge=Charge::find($idcharge);
            if (empty($employee)) {           
                return null;
            }
            $hours_charge = array('hour_entry' => $charge->hour_entry,'hour_departure' => $charge->hour_departure);

        return $hours_charge;
     }

     public function calculatorDelay($attendance_hour_entry,$attendance_hour_departure,$attendance_idemployee){
            $idcharge=AttendancesController::returnEmployeeCharge($attendance_idemployee);
            $hours_charge=AttendancesController::hourEntryAndDepartureCharge($idcharge);
            $hour_entry_charge=$hours_charge['hour_entry'];
            $hour_departure_charge=$hours_charge['hour_departure'];
            /*operaciones para calcular*/
            /*
                1.Diferencia de hora de llegada -> La diferencia en horas saldra entre la hora de llegada del empleado - la hora que se encuentra en la base de datos cargos
                
             */   
            $horai=substr($aa,0,2);
            $mini=substr($aa,3,2);
            $segi=substr($aa,6,2);
         
            $horaf=substr($horafin,0,2);
            $minf=substr($horafin,3,2);
            $segf=substr($horafin,6,2);
         
            $ini=((($horai*60)*60)+($mini*60)+$segi);
            $fin=((($horaf*60)*60)+($minf*60)+$segf);
         
            $dif=$fin-$ini;
         
            $difh=floor($dif/3600);
            $difm=floor(($dif-($difh*3600))/60);
            $difs=$dif-($difm*60)-($difh*3600);
            return date("H-i-s",mktime($difh,$difm,$difs));

            /*
                2.Diferencia de hora de salida -> La diferencia en horas saldra entre la hora de  salida que se encuentra en la base de datos cargos - la hora de salida del empleado
            */

             /*
             Sumaremos las horas de que no trabajo y eso ser el campo delay 
                
             */   
     }

}
