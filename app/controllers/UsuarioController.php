<?php
namespace App\Controllers;

use App\Helpers;
use App\Empresa;
use App\Handlers\AuthenticateHandler;
use App\Permiso;
use App\Usuario;

class UsuarioController
{
    function __construct($request)
    {
        $handler = new AuthenticateHandler();
        $handler->handle($request);
    }

    public function index()
    {
        return Helpers::view("usuarios/index.php");
    }
    public function create()
    {
        $empresas = Empresa::all();
        $permisos = Permiso::all();
        return Helpers::view("usuarios/store.php", ['empresas' => $empresas, 'permisos' => $permisos]);
    }
    public function store($request)
    {
        $usuario = new Usuario;
        $usuario->username = $request->username;
        $usuario->password = password_hash($request->password, PASSWORD_BCRYPT);
        $usuario->empresa_id = $request->empresa_id;
        $usuario->permisos = $request->permisos;
        $usuario->save();
        Helpers::redirect('/usuarios/nuevo', ['message' => 'Usuario creado']);
    }
    public function edit($request)
    {
        $empresas = Empresa::all();
        $permisos = Permiso::all();
        $usuario = Usuario::find($request->id);
        Helpers::view("usuarios/store.php", ['usuario' => $usuario, 'empresas' => $empresas, 'permisos' => $permisos]);
    }
    public function update($request)
    {
        $usuario = Usuario::find($request->id);
        $usuario->username = $request->username;
        $usuario->password = crypt($request->password);
        $usuario->empresa_id = $request->empresa_id;
        $usuario->permisos = $request->permisos;
        $usuario->update();
        Helpers::redirect('/usuarios', ['message' => "Datos de usuario $usuario->id actualizados"]);
    }
    public function destroy($request)
    {
        $usuario = Usuario::delete($request->id);
        Helpers::redirect('/usuarios', ['message' => "Usuario $request->id eliminado"]);
    }
}
