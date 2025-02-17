<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

//propios
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        
        return view ("Categories",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("Categories",compact("categories"));
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
            ]],[
                'name.required' => 'El campo nombre es obligatorio',
                'name.string' => 'El campo nombre debe ser una cadena de caracteres',
                'name.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
                'name.regex' => 'El campo nombre debe tener un formato válido (Ej.: Herramientas o Herramientas pesadas)',
            ]
            );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $category = new category();
        $category->name = $request->input("name");
        $category->save();
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view ("Categories.edit");

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator=Validator::make($request->all(),[
            'name' => [
                'required', 
                'string', 
                'max:255',
                'regex:/^([A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)(\s[A-ZÑÁÉÍÓÚ][a-zñáéíóú]+)*$/',
            ]],[
                'name.required' => 'El campo nombre es obligatorio',
                'name.string' => 'El campo nombre debe ser una cadena de caracteres',
                'name.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
                'name.regex' => 'El campo nombre debe tener un formato válido (Ej.: Herramientas o Herramientas pesadas)',
            ]
            );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $category = category::find($id);
        $category->name = $request->input("name");
        $category->update();
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect(route('categories.index'));
    }
}
