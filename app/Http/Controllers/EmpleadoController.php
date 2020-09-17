<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;// incluyendo el modelo empleado
use Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Empleado::get(), 200); // el 200 nos indica 'ok'
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones = [
            'nombre' => 'required',
            'dui' => 'required',
            'nit' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'rol' => 'required',
            'cargo' => 'required',
            'estado' => 'required'
        ];
        $validator = Validator::make($request->all(), $validaciones);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $empleado = Empleado::create($request->all());
        return response()->json($empleado, 201); // el 201 nos indica que se creo con exito el registro
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        if(is_null($empleado)) {
            return response()->json(['message' => 'Empleado no encontrado!'], 404); 
        }
        return response()->json($empleado, 200); // el 200 nos indica 'ok'
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        if(is_null($empleado)) {
            return response()->json(['message' => 'Empleado no encontrado!'], 404);
        }
        $empleado->update($request->all());
        return response()->json($empleado, 200); // el 200 'ok'
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        if(is_null($empleado)) {
            return response()->json(['message' => 'Empleado no encontrado!'], 404);
        }
        $empleado->delete();
        return response()->json(null, 204); //204 no hay contenido que enviar para esta solicitud
    }
}
