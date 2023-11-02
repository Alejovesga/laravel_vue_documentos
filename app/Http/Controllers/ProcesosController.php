<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pro_proceso;

class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = pro_proceso::all();
        if(isset($response)){
            return $response;
        }else{
            return response()->json([
                "error" => true,
                "message" => "No se encontraron procesos"
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $response = pro_proceso::create($inputs);
        if(isset($response)){
            return response()->json([
                "error" => false,
                "message" => "Proceso creado correctamente"
            ]);
        }else{
            return response()->json([
                "error" => true,
                "message" => "No se pudo crear el proceso"
            ]);
        }

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
        $proceso = pro_proceso::find($id);
        if(isset($proceso->id)){
            if($proceso->update($request->all())){
                return response()->json([
                    "error" => false,
                    "message" => "Proceso actualizado correctamente"
                ]);
            }

        }else{
            return response()->json([
                "error" => true,
                "message" => "No se encontró el proceso"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
