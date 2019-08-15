<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() 
    {
        DB::table('users')->get();

        // return view('Usuarios.users', [
        //     'users' => $users,
        //     'title' => 'Listado de Usuarios'
        // ]);

        return view('Usuarios.users')
            ->with('users', $users)
            ->with('title', 'Listado de Usuarios');
    }

    public function show($id) 
    {
        return "Mostrando datos del usuario: {$id}";
    }
}
