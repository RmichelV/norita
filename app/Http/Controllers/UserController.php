<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// propias librerias
use App\Models\User;
use App\Models\City;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $cities = City::all();
        $roles = Role::all();

        return view ('Users.index',compact('users','cities','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::all();
    

        return view('auth.register',compact('cities','roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name' => [
                'required', 
                'string', 
                'max:255',
                'regex:/^([A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)(\s[A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)*$/',
            ],
            'last_name' => [
                'required', 
                'string', 
                'max:255',
                'regex:/^([A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)(\s[A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)*$/',
            ],
            'email' => [
                'required', 
                'string', 
                'lowercase', 
                'email', 
                'max:255', 
                'unique:'.User::class,
                'regex:/^[\w\.-]+@[\w\.-]+\.(com|net|edu)$/',
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser una cadena de caracteres',
            'name.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'name.regex' => 'El campo nombre debe tener un formato válido (Ejemplo: Administrador)',
            'last_name.required' => 'El campo nombre es obligatorio',
            'last_name.string' => 'El campo nombre debe ser una cadena de caracteres',
            'last_name.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'last_name.regex' => 'El campo nombre debe tener un formato válido (Ejemplo: Administrador)',
            'email' => [
                'required' => 'El campo de correo electrónico es obligatorio.',
                'string' => 'El correo electrónico debe ser una cadena de texto.',
                'lowercase' => 'El correo electrónico debe estar en minúsculas.',
                'email' => 'El correo electrónico debe ser válido.',
                'max' => 'El correo electrónico no puede superar los 255 caracteres.',
                'unique' => 'El correo electrónico ya está registrado.',
                'regex' => 'El correo electrónico debe tener un formato válido (ejemplo: usuario@dominio.com, usuario@dominio.net, usuario@dominio.edu).',
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'last_name'=>$request->last_name,
            'cellphone'=>$request->cellphone,
            'identity_number'=>$request->identity_number,
            'city_id'=>$request->city_id,
            'gender'=>$request->gender,
            'role_id'=>$request->role_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        // event(new Registered($user));

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
