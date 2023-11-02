<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tip_tipo_doc;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = tip_tipo_doc::all();
        if($isset($response)){
            return $response;
        }else{
            return response()->json([
                "error" => true,
                "message" => "No se encontraron tipos de documento"
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
        $response = tip_tipo_doc::create($inputs);
        if(isset($response)){
            return response()->json([
                "error" => false,
                "message" => "tipo de documento creado correctamente"
            ]);
        }else{
            return response()->json([
                "error" => true,
                "message" => "No se pudo crear el tipo de documento"
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
        $tipo = tip_tipo_doc::find($id);
        if(isset($tipo->id)){
            if($tipo->update($request->all())){
                return response()->json([
                    "error" => false,
                    "message" => "tipo de documento actualizado correctamente"
                ]);
            }
        }else{
            return response()->json([
                "error" => true,
                "message" => "No se encontró el tipo de documento"
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
