<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = Personas::all();
        return view('inicio', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $personas = new Personas();
        $personas->nombre = $request->post('nombre');
        $personas->apellido = $request->post('apellido');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Agregado con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personas = Personas::find($id);
        return view("eliminar" , compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $personas = Personas::find($id);
        return view("actualizar" , compact('personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //este metodo actualiza los datos en la bd
        $personas = Personas::find($id);
        $personas->nombre = $request->post('nombre');
        $personas->apellido = $request->post('apellido');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Actualizado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success", "Eliminado con exito!");
    }
}
