<?php
namespace App\Controllers;

use App\Helpers;
use App\Persona;
use App\Correo;

class CorreoController
{
    public function index()
    {
        return Helpers::view("correos/index.php");
    }
    public function create()
    {
        $personas = Persona::all();
        return Helpers::view("correos/store.php", ['personas' => $personas]);
    }
    public function store($request)
    {
        $correo = new Correo;
        $correo->email = $request->email;
        $correo->persona_id = $request->persona_id;
        $correo->save();
        Helpers::redirect('/correos/nuevo', ['message' => 'Correo creado']);
    }
    public function edit($request)
    {
        $personas = Persona::all();
        $correo = Correo::find($request->id);
        Helpers::view("correos/store.php", ['correo' => $correo, 'personas' => $personas]);
    }
    public function update($request)
    {
        $correo = Correo::find($request->id);
        $correo->email = $request->email;
        $correo->persona_id = $request->persona_id;
        $correo->update();
        Helpers::redirect('/correos', ['message' => "Datos de correo $correo->id actualizados"]);
    }
    public function destroy($request)
    {
        $correo = Correo::delete($request->id);
        Helpers::redirect('/correos', ['message' => "Correo $request->id eliminado"]);
    }
}
