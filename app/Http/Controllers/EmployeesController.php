<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Charge;
use Flash;
use DB;


class EmployeesController extends Controller
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
        //
        $employees = Employee::where('state','=','1')->get();
        return view('employees.index',["employees"=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $charges=Charge::pluck('name','id');
       return view('employees.create',compact('charges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employee= new Employee;
        $employee->name=$request->name;
        $employee->surname_paternal=$request->surname_paternal;
        $employee->surname_maternal=$request->surname_maternal;
        $employee->state=$request->state;
        $employee->dni=$request->dni;
        $employee->idcharge=(int)$request->idcharge;
        
      /*  var_dump($employee->idcharge);
        exit;*/
        if ($employee->save()) {
            Flash::success('Empleados registrado exitosamente.');
           return redirect(route('employees.index'));
        }else{
            return view("employees.create");
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
       $employeeBD=DB::table('employees')           
                    ->where('id','=',$id)
                    ->where('state','=','1')
                    ->get();


      
        foreach ($employeeBD as $emp) {
                $employee = new Employee();
                $employee->id=$emp->id;
                $employee->name=$emp->name;
                $employee->surname_paternal=$emp->surname_paternal;
                $employee->surname_maternal=$emp->surname_maternal;
                $employee->dni=$emp->dni;
                $employee->state=$emp->state;
                $employee->idcharge=$emp->idcharge;
    
        }

        if (empty($employee)) {
            Flash::error('Empleado no encontrado');

            return redirect(route('employees.index'));
        }

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employee = Employee::find($id);
        if (empty($employee)) {/*una variable se considera vacía si no existe o si su valor es igual a FALSE. empty() */
            Flash::error('Empleado no encontrado');
            return redirect(route('employees.index'));
        }
        $charges=Charge::pluck('name','id');
        return view('employees.edit',['employee'=>$employee],compact('charges'));    
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
        $employee= Employee::find($id);

        $employee->name=$request->name;
        $employee->surname_paternal=$request->surname_paternal;
        $employee->surname_maternal=$request->surname_maternal;
        $employee->state=$request->state;
        $employee->dni=$request->dni;
        $employee->idcharge=(int)$request->idcharge;
        
        if ($employee->save()) {
            Flash::success('Empleado editado exitosamente.');
           return redirect(route('employees.index'));
        }else{
            return view("employees.edit");
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
        $employee= Employee::find($id);
        if (empty($employee)) {
            Flash::error('Empleado no encontrado');
            return redirect(route('employees.index'));
        }
        $employee->state="0";
        $employee->update();
        Flash::success('Empleado borrado exitosamente.');
        return redirect(route('employees.index'));
    }
}
