<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return $usuarios;
    }

    public function show($id)
    {
        $usuarios = Usuarios::find($id);
    
        if (!$usuarios) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required', 
            'email' => 'required|email|unique:usuarios',
        ]);
    
        $usuarios = new Usuarios;
        $usuarios->nombre = $request->input('nombre');
        $usuarios->apellido = $request->input('apellido');
        $usuarios->email = $request->input('email');
    
        $usuarios->save();
        return response()->json(['message' => 'Se ha creado el Usuario'], 201);
    }
    

    public function update(Request $request, $id)
    {
        // Valida los datos entrantes
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $id,
        ]);
    
        $usuarios = Usuarios::find($id);
    
        if (!$usuarios) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        $usuarios->nombre = $request->input('nombre');
        $usuarios->apellido = $request->input('apellido');
        $usuarios->email = $request->input('email');

        $usuarios->save();
        return response()->json(['message' => 'Se ha actualizado el Usuario'], 200);
    }  

    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
    
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        Usuarios::destroy($id);
        return response()->json(['message' => 'Se ha eliminado el Usuario'], 200);
    }   
}
