<?php

namespace App\Controllers;

use App\Helpers;
use App\Empresa;
use App\Handlers\AuthenticateHandler;
use App\Permiso;

class PermisoController
{
    function __construct($request)
    {
        $handler = new AuthenticateHandler();
        $handler->handle($request);
    }

    public function index()
    {
        return Helpers::view("permisos/index.php");
    }
    public function create()
    {
        $empresas = Empresa::all();
        return Helpers::view("permisos/store.php", ['empresas' => $empresas]);
    }
    public function store($request)
    {
        $permiso = new Permiso;
        $permiso->slug = $request->slug;
        $permiso->description = $request->description;
        $permiso->empresa_id = $request->empresa_id;
        $permiso->save();
        Helpers::redirect('/permisos/nuevo', ['message' => 'Permiso creado']);
    }
    public function edit($request)
    {
        $empresas = Empresa::all();
        $permiso = Permiso::find($request->id);
        Helpers::view("permisos/store.php", ['permiso' => $permiso, 'empresas' => $empresas]);
    }
    public function update($request)
    {
        $permiso = Permiso::find($request->id);
        $permiso->slug = $request->slug;
        $permiso->description = $request->description;
        $permiso->empresa_id = $request->empresa_id;
        $permiso->update();
        Helpers::redirect('/permisos', ['message' => "Datos del permiso $permiso->id actualizados"]);
    }
    public function destroy($request)
    {
        $permiso = Permiso::delete($request->id);
        Helpers::redirect('/permisos', ['message' => "Permiso $request->id eliminado"]);
    }
}
