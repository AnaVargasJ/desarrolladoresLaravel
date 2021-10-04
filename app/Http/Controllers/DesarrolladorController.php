<?php

namespace App\Http\Controllers;

use App\Models\Desarrollador;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class DesarrolladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desarrolladores = Desarrollador::orderBy('nombre', 'asc')->get();
        return view('desarrolladores.index', compact('desarrolladores'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = Proyecto::orderBy('nombre', 'asc')->get();
        return view('desarrolladores.insert', compact('proyectos'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'proyectoId' => 'required',
        ]);
        Desarrollador::create($request->all());

        return redirect()->route('desarrolladores.index')->with('exito', 'se ha guardado el desarrollador exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desarrollador = Desarrollador::join('proyectos','desarrolladores.proyectoId', '=', 'proyectos.Id')//une la tabla desarrollador con la tabla proyecto atravez de l os campos de desarrollador con los campos de proyecto
                                        ->select('desarrolladores.*','proyectos.nombre as nombreProyecto')//*selecciona todos los campos que se elijan de la tabla
                                        ->where('desarrolladores.id', '=', $id)
                                        ->first();
        //echo $desarrollador;
        return view('desarrolladores.view', compact('desarrollador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desarrollador = Desarrollador::findOrFail($id);
        $proyectos = Proyecto::orderBy('nombre', 'asc')->get();
        return view('desarrolladores.edit', compact('desarrollador', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desarrollador $desarrollador)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'proyectoId' => 'required'
            
        ]);

        $desarrollador = Desarrollador::findOrFail($id);
        $desarrollador->update(($request->all());
        return redirect()->route('desarrolladores.index')->with('exito','se ha modificado los datos del desarrollador exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desarrollador = Desarrollador::findOrFail($id);
        $desarrollador->delete();
        return redirect()->('desarrolladores.index')->with('exito','se ha eliminado el desarrollador exitosamente');
    }
}
