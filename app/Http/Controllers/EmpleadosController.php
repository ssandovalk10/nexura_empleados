<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadosStoreRequest;
use App\Http\Requests\EmpleadosUpdateRequest;
use Illuminate\Http\Request;
use App\Empleado;
use App\Role;
use App\Areas;
use App\Empleado_role;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados = Empleado::get();

       return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

       //FORMULARIO EMPLEADO
        $roles= Role::all();
        
        $areaSql = Areas::get();

        $areas = [];

        foreach($areaSql as $area)
        {
             $areas[$area->id] = $area->nombre;
        }

       
         return view('empleados.create', compact('roles', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadosStoreRequest $request)
    {
        //ALMACENAR EMPLEADO
            $empleado = Empleado::create([

                'nombre'    => $request->get('nombre'),
                'email'     => $request->get('email'),
                'sexo'      => $request->get('sexo'),
                'area_id'   => $request->get('area_id'),
                'boletin'   => $request->get('boletin'),
                'description' => $request->get('description'),

            ]);

            $role = $request->get('role');

            $roles = $this->roles($empleado->id, $role );

            $message = $empleado ? 'Empleado Creado Correctamente' : 'Error al Crear';

        return redirect()->route('empleados.index')->with('info', $message);

    }

    /**
     * FUNCION PARA ALMACENAR LOS ROLES POR EMPLEADO
     *

     **/

     public function roles($empleado , $role)
    {
            
        foreach($role as $r)
        {

            $rol_empleado = Empleado_role::create([

                    'empleado_id' => $empleado,
                    'role_id'     => $r,

            ]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $empleado = Empleado::findOrFail($id);


        $roles= Role::get();        
        $areaSql = Areas::get();

        $areas = [];
        foreach($areaSql as $area)
        {
             $areas[$area->id] = $area->nombre;
        }

        $roles_empleado = [];
        foreach( $empleado->roles as $r)
        {
          $roles_empleado[$r->pivot->role_id] = $r->pivot->role_id;
        }
        
        //dd($roles_empleado);

        return view('empleados.edit', compact('areas', 'roles', 'roles_empleado'))->with('empleado', $empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadosUpdateRequest $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->nombre       = $request->get('nombre');
        $empleado->email        = $request->get('email');
        $empleado->sexo         = $request->get('sexo');
        $empleado->area_id      = $request->get('area_id');
        $empleado->boletin      = $request->get('boletin');
        $empleado->description  = $request->get('description');
        $empleado->update();

        $roles = $request->get('role');

        //Actulizar Roles
        $updateroles = $this->updateroles($id, $roles);

         $message = $empleado ? 'Empleado Actualizado' :'Error al Actualizar';

       return redirect()->route('empleados.index')->with('info', $message);


    }


    public function updateroles($id , $role)
    {
            
        //Busco los todos los roles que tiene el empleado
        $rolslq = Empleado_role::where('empleado_id', $id)
                                ->select('id')
                                ->get();

        //Recorro el arreglo y los eliminos
        foreach ($rolslq as $rol) {
                                 
            $roluser = Empleado_role::findOrFail($rol->id);
            $roluser->delete();

        }


        //Creo los roles que vienen desde el update
        foreach($role as $r)
        {

            $rol_empleado = Empleado_role::create([

                    'empleado_id' => $id,
                    'role_id'     => $r,

            ]);
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
        $empleado = Empleado::findOrFail($id);

        $empleado->delete();


        $message = 'Empleado Eliminado Correctamente';

       return redirect()->route('empleados.index')->with('info', $message);
    }
}
