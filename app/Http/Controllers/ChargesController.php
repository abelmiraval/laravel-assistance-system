<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charge;
use Flash;

class ChargesController extends Controller
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
        //Mostrar una colleccion de productos

        $cargos=Charge::all();
        return view('charges.index',["cargos"=>$cargos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Desplegar una vista para crear un nuevo producto
        return view('charges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store es el encargado de guardar el nuevo producto
        $charge= new Charge;
        $charge->name=$request->name;
        $charge->description=$request->description;
        if ($charge->save()) {
            Flash::success('Cargo registrado exitosamente.');
           return redirect(route('charges.index'));
        }else{
            return view("charges.create");
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
        //Para mostrar el producto con es id
        $charge = Charge::find($id);

        if (empty($charge)) {
            Flash::error('Cargo no encontrado');

            return redirect(route('charges.index'));
        }

        return view('charges.show')->with('charge', $charge);
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
         $charge = Charge::find($id);
        if (empty($charge)) {/*una variable se considera vacía si no existe o si su valor es igual a FALSE. empty() */
            Flash::error('Cargo not encontrado');
            return redirect(route('charges.index'));
        }

        return view('charges.edit',['charge'=>$charge]);    
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
        //Actualiza lo que se envio en edit
         $charge= Charge::find($id);
        $charge->name=$request->name;
        $charge->description=$request->description;
        if ($charge->save()) {
            Flash::success('Cargo editado exitosamente.');
           return redirect(route('charges.index'));
        }else{
            return view("charges.edit");
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
        //Elimina el producto con es id
        $charge= Charge::find($id);
        if (empty($charge)) {
            Flash::error('Cargo no encontrado');
            return redirect(route('charges.index'));
        }
        Charge::destroy($id);     
        Flash::success('Cargo borrado exitosamente.');
        return redirect(route('charges.index'));
    }
    
}
