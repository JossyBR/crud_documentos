<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Proceso;
use App\Models\TipoDocumento;

class DocumentoController extends Controller
{
    public function index (){
        $documentos = Documento::all();
        return view('documentos.index', compact('documentos'));
    }

    public function create(){
        $procesos = Proceso::all();
        $tipos = TipoDocumento::all();
        return view('documentos.create', compact('procesos', 'tipos'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'doc_nombre' => 'required|string|max:50',
            'doc_contenido' => 'required|string',
            'doc_id_tipo' => 'required|integer',
            'doc_id_proceso' => 'required|integer',
        ]);

        $tipo = TipoDocumento::find($validated['doc_id_tipo']);
        $proceso = Proceso::find($validated['doc_id_proceso']);
        $lastDoc = Documento::where('doc_id_tipo', $validated['doc_id_tipo'])
                            ->where('doc_id_proceso', $validated['doc_id_proceso'])
                            ->orderBy('doc_codigo', 'desc')
                            ->first();

        $consecutivo = $lastDoc ? intval(explode('-', $lastDoc->doc_codigo)[2]) + 1 : 1;
        $codigo = "{$tipo->tip_prefijo}-{$proceso->pro_prefijo}-{$consecutivo}";

        Documento::create([
            'doc_nombre' => $validated['doc_nombre'],
            'doc_codigo' => $codigo,
            'doc_contenido' => $validated['doc_contenido'],
            'doc_id_tipo' => $validated['doc_id_tipo'],
            'doc_id_proceso' => $validated['doc_id_proceso'],
        ]);

        $mensaje = 'Crédito aprobado y creado con éxito';

        return redirect()->route('documentos.index')->with('status', $mensaje);
    }

    // public function edit($id){
    //     $documento = Documento::findOrFail($id);
    //     $procesos = Proceso::all();
    //     $tipos = TipoDocumento::all();
    //     return view('documentos.edit', compact('documento', 'procesos', 'tipos'));
    // }

    // public function update(Request $request, $id){
    //     $validated = $request->validate([
    //         'doc_nombre' => 'required|string|max:50',
    //         'doc_contenido' => 'required|string',
    //         'doc_id_tipo' => 'required|integer',
    //         'doc_id_proceso' => 'required|integer',
    //     ]);

    //     $documento = Documento::findOrFail($id);
    //     $tipo = TipoDocumento::find($validated['doc_id_tipo']);
    //     $proceso = Proceso::find($validated['doc_id_proceso']);

    //     if ($documento->doc_id_tipo != $validated['doc_id_tipo'] || $documento->doc_id_proceso != $validated['doc_id_proceso']) {
    //         $lastDoc = Documento::where('doc_id_tipo', $validated['doc_id_tipo'])
    //                             ->where('doc_id_proceso', $validated['doc_id_proceso'])
    //                             ->orderBy('doc_codigo', 'desc')
    //                             ->first();

    //         $consecutivo = $lastDoc ? intval(explode('-', $lastDoc->doc_codigo)[2]) + 1 : 1;
    //         $codigo = "{$tipo->tip_prefijo}-{$proceso->pro_prefijo}-{$consecutivo}";
    //         $documento->doc_codigo = $codigo;
    //     }

    //     $documento->update([
    //         'doc_nombre' => $validated['doc_nombre'],
    //         'doc_contenido' => $validated['doc_contenido'],
    //         'doc_id_tipo' => $validated['doc_id_tipo'],
    //         'doc_id_proceso' => $validated['doc_id_proceso'],
    //     ]);

    //     return redirect()->route('documentos.index');
    // }

    // public function destroy($id){
    //     Documento::destroy($id);
    //     return redirect()->route('documentos.index');
    // }

    public function search(Request $request){
        $query = $request->input('query');
        $documentos = Documento::where('doc_nombre', 'LIKE', "%$query%")
                                ->orWhere('doc_codigo', 'LIKE', "%$query%")
                                ->get();
        return view('documentos.index', compact('documentos'));
    }
}
