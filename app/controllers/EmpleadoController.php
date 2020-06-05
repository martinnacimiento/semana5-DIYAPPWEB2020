<?php
namespace App\Controllers;

use App\Empleado;
use App\Handlers\AuthenticateHandler;
use App\Helpers;
use App\Persona;

class EmpleadoController
{
    function __construct($request)
    {
        $handler = new AuthenticateHandler();
        $handler->handle($request);
    }

    public function index()
    {
        return Helpers::view("empleados/index.php");
    }
    public function create()
    {
        $personas = Persona::all();
        return Helpers::view("empleados/store.php", ['personas' => $personas]);
    }
    public function store($request)
    {
        $empleado = new Empleado;
        $empleado->nro_legajo = $request->nro_legajo;
        $empleado->dependencia = $request->dependencia;
        $empleado->fecha_ingreso = $request->fecha_ingreso;
        $empleado->persona_id = $request->persona_id;
        $empleado->save();
        Helpers::redirect('/empleados/nuevo', ['message' => 'Empleado creada']);
    }
    public function edit($request)
    {
        $personas = Persona::all();
        $empleado = Empleado::find($request->id);
        Helpers::view("empleados/store.php", ['empleado' => $empleado, 'personas' => $personas]);
    }
    public function update($request)
    {
        $empleado = Empleado::find($request->id);
        $empleado->nro_legajo = $request->nro_legajo;
        $empleado->dependencia = $request->dependencia;
        $empleado->fecha_ingreso = $request->fecha_ingreso;
        $empleado->persona_id = $request->persona_id;
        $empleado->update();
        Helpers::redirect('/empleados', ['message' => "Datos de empleado $empleado->id actualizados"]);
    }
    public function destroy($request)
    {
        $empleado = Empleado::delete($request->id);
        Helpers::redirect('/empleados', ['message' => "Persona $request->id eliminada"]);
    }
}
