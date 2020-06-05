<?php

namespace App\Controllers;

use App\Helpers;
use App\Empresa;
use App\Handlers\AuthenticateHandler;

class EmpresaController
{
    function __construct($request)
    {
        $handler = new AuthenticateHandler();
        $handler->handle($request);
    }

    public function index()
    {
        return Helpers::view("empresas/index.php");
    }
    public function create()
    {
        return Helpers::view("empresas/store.php");
    }
    public function store($request)
    {
        $empresa = new Empresa;
        $empresa->nombre = $request->nombre;
        $empresa->save();
        Helpers::redirect('/empresas/nuevo', ['message' => 'Empresa creada']);
    }
    public function edit($request)
    {
        $empresa = Empresa::find($request->id);
        Helpers::view("empresas/store.php", ['empresa' => $empresa]);
    }
    public function update($request)
    {
        $empresa = Empresa::find($request->id);
        $empresa->nombre = $request->nombre;
        $empresa->update();
        Helpers::redirect('/empresas', ['message' => "Datos de empresa $empresa->id actualizados"]);
    }
    public function destroy($request)
    {
        $empresa = Empresa::delete($request->id);
        Helpers::redirect('/empresas', ['message' => "Empresa $request->id eliminada"]);
    }
}
