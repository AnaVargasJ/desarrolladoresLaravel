<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::orderBy('nombre','asc')->get();
        //Enviar a la vista
        return view('proyectos.index',compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Enviar a la vista
        return view('proyectos.insert');
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
        // dd($request);
        $request->validate([
            'nombre'=> 'required',
            'duracion'=> 'required'
        ]);

        Proyecto::create($request->all());
        //Retornar la vista
        return redirect()->route('proyectos.index')->with('exito','Se ha guardado el proyecto exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $proyecto = Proyecto::FindOrFail($id);
        //Enviar a la vista
        return view('proyectos.view', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proyecto = Proyecto::FindOrFail($id);
        //Enviar a la vista
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre'=> 'required',
            'duracion'=> 'required'
        ]);

        $proyecto = Proyecto::FindOrFail($id);

        $proyecto->update($request->all());
        //Retornar la vista
        return redirect()->route('proyectos.index')->with('exito','Se ha modificado el proyecto exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('exito', '¡Se ha eliminado el proyecto exitosamente!');
    }
}