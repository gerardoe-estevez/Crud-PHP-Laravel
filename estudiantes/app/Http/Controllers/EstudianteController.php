<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['estudiantes']=Estudiante::paginate(5);
        return view('estudiante.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:10',
            'Apellido'=>'required|string|max:10',
            'Cedula'=>'required|int|min:7|max:8',
            'Telefono'=>'requires|int|min:11|max:11',
            'Correo'=>'requiered|email',
            'FechaDeNacimiento'=>'required|date'            
        ];

        $mensaje=[
            'required'=>':attribute es requerido',
            'max'=>':attribute debe contener solo 10 caracteres',
            'Cedula.int'=>'Cedula solo debe contener solo numeros',
            'Cedula.min'=>'Cedula debe contener 7 u 8 numeros',
            'Cedula.max'=>'Cedula debe contener 7 u 8 numeros'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosEstudiante = $request->except('_token');
        Estudiante::insert($datosEstudiante);

        if($request->hasFile('Foto')){
            $datosEstudiante['Foto']=$request->file('Foto')->store('uploads','public');
        }
        return redirect('estudiante')->with('mensaje', 'Agregado con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $estudiante=Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEstudiante = $request->except('_token', '_method');

        if($request->hasFile('Foto')){

            $estudiante=Estudiante::findOrFail($id);
            Storage::delete('public/'.$estudiante->foto);
            $datosEstudiante['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Estudiante::where('id', '=', $id)->update($datosEstudiante);
        $estudiante=Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $estudiante=Estudiante::findOrFail($id);
        if(Storage::delete('public/'.$estudiante->foto)){
            Estudiante::destroy($id);
            
        }
        return redirect('/estudiante')->with('mensaje', 'Eliminado con Exito');
    }
}
