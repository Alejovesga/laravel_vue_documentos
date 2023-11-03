<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doc_documento;
use App\Models\pro_proceso;
use App\Models\tip_tipo_doc;
use App\Models\con_consecutivo;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = doc_documento::all();
        if(isset($response)){
            return $response;
        }else{
            return response()->json([
                "error" => true,
                "message" => "No se encontraron documentos"
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
            $codigo = $this->makeCode($request);
            $inputs['DOC_CODIGO'] = $codigo;

            $response = doc_documento::create($inputs);
            if(isset($response)){
                return response()->json([
                    "error" => false,
                    "message" => "Documento creado correctamente"
                ]);
            }else{
                return response()->json([
                    "error" => true,
                    "message" => "No se pudo crear el documento"
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
        $inputs = $request->input();
        $documento = doc_documento::find($id);

        if(($documento->DOC_ID_TIPO != $request->DOC_ID_TIPO) && ($documento->DOC_ID_PROCESO != $request->DOC_ID_PROCESO)){
            $codigo = $this->makeCode($request);
            $inputs['DOC_CODIGO'] = $codigo;
        }

        if(isset($documento->id)){
            if($documento->update($inputs)){
                return response()->json([
                        "error" => false,
                        "message" => "Documento actualizado correctamente"
                    ]);
            }
        }else{
            return response()->json([
                "error" => true,
                "message" => "No se pudo actualizar el documento"
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return doc_documento::destroy($id);
    }

    private function makeCode(Request $request){
        $prefijoProceso = pro_proceso::find($request->input('DOC_ID_PROCESO'))->PRO_PREFIJO;
        $prefijoTipo = tip_tipo_doc::find($request->input('DOC_ID_TIPO'))->TIP_PREFIJO;

        $consecutivo = con_consecutivo::where('CON_ID_PROCESO', $request->input('DOC_ID_PROCESO'))->where('CON_ID_TIPO', $request->input('DOC_ID_TIPO'))->first();

        if(isset($consecutivo)){
            $consecutivo->CON_CONSECUTIVO = $consecutivo->CON_CONSECUTIVO + 1;
            $consecutivo->save();
        }else{
            $consecutivo = new con_consecutivo();
            $consecutivo->CON_ID_PROCESO = $request->input('DOC_ID_PROCESO');
            $consecutivo->CON_ID_TIPO = $request->input('DOC_ID_TIPO');
            $consecutivo->CON_CONSECUTIVO = 1;
            $consecutivo->save();
        }

        return $prefijoTipo . "_" . $prefijoProceso . "_" . $consecutivo->CON_CONSECUTIVO;
    }
}
