<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Charge;
use Flash;

class SchedulesController extends Controller
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
        $schedules = Schedule::where('state',1)
                    ->orderBy('created_at')
                    ->get();

        return view('schedules.index',["schedules"=>$schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $charges=Charge::pluck('name','id');
       // $charges=Charge::all();
       return view('schedules.create',compact('charges'));
        //return view('schedules.create',["charges"=>$charges]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $schedule= new Schedule;
        $schedule->day=$request->day;
        $schedule->hour_entry=$request->hour_entry;
        $schedule->hour_departure=$request->hour_departure;
        $schedule->state=$request->state;
        $schedule->idcharge=(int)$request->idcharge;
        
      /*  var_dump($schedule->idcharge);
        exit;*/
        if ($schedule->save()) {
            Flash::success('Horario registrado exitosamente.');
           return redirect(route('schedules.index'));
        }else{
            return view("schedules.create");
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
            //Para mostrar el producto con es id
        $schedule = Schedule::find($id);

        if (empty($schedule)) {
            Flash::error('Horario no encontrado');

            return redirect(route('schedules.index'));
        }

        return view('schedules.show')->with('schedule', $schedule);
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
          //Muestra un formulario para editar el productos con ese id
        $schedule = Schedule::find($id);
        if (empty($schedule)) {/*una variable se considera vacía si no existe o si su valor es igual a FALSE. empty() */
            Flash::error('Horario no encontrado');
            return redirect(route('schedules.index'));
        }
        $charges=Charge::pluck('name','id');
        return view('schedules.edit',['schedule'=>$schedule],compact('charges'));    
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
        $schedule= Schedule::find($id);

        $schedule->day=$request->day;
        $schedule->hour_entry=$request->hour_entry;
        $schedule->hour_departure=$request->hour_departure;
        //$schedule->state=$request->state;
        $schedule->idcharge=(int)$request->idcharge;
        
        if ($schedule->save()) {
            Flash::success('Horario editado exitosamente.');
           return redirect(route('schedules.index'));
        }else{
            return view("schedules.edit");
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
       $schedule= Schedule::find($id);

        if (empty($schedule)) {
            Flash::error('Horario no encontrado');

            return redirect(route('schedules.index'));
        }

        $schedule->state="0";
        $schedule->update();
        
        Flash::success('Cargo borrado exitosamente.');

        return redirect(route('schedules.index'));

    }
}
