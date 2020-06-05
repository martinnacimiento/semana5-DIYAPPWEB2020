<?php
namespace App\Controllers;
use App\Persona;
use App\Empresa;
use App\Helpers;
use App\Handlers\AuthenticateHandler;

class PersonaController
{
    function __construct($request)
    {
        $handler = new AuthenticateHandler();
        $handler->handle($request);
    }

    public function index()
    {
        return Helpers::view("personas/index.php");
    }

    public function create($request)
    {
        $empresas = Empresa::all();
        return Helpers::view("personas/store.php", ['empresas' => $empresas]);
    }
    
    public function store($request)
    {
        $persona = new Persona;
        $persona->cuil = $request->cuil;
        $persona->apellido = $request->apellido;
        $persona->nombre = $request->nombre;
        $persona->empresa_id = $request->empresa_id;
        $persona->save();
        Helpers::redirect('/personas/nuevo', ['message' => 'Persona creada']);
    }
    
    public function edit($request)
    {
        $persona = Persona::find($request->id);
        $empresas = Empresa::all();
        Helpers::view("personas/store.php", ['persona' => $persona, 'empresas' => $empresas]);
    }

    public function update($request)
    {
        $persona = Persona::find($request->id);
        $persona->cuil = $request->cuil;
        $persona->apellido = $request->apellido;
        $persona->nombre = $request->nombre;
        $persona->empresa_id = $request->empresa_id;
        $persona->update();
        Helpers::redirect('/personas', ['message' => "Datos de persona $persona->id actualizados"]);
    }

    public function destroy($request)
    {
        $persona = Persona::delete($request->id);
        Helpers::redirect('/personas', ['message' => "Persona $request->id eliminada"]);
    }
}
