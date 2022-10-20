<?php

namespace App\Http\Controllers;

use App\Models\Facade\DocumentoCsvDB;
use App\Models\Regras\RegrasDocumentoCsv;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DocumentoCsvController extends Controller
{

    public function index()
    {
        return DocumentoCsvDB::listarDocumento();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        try {
            RegrasDocumentoCsv::salvar($request);
            return response()->json(["mensagem" => "Documento Carregado com sucesso"]);
        } catch (Exception $ex) {
        return response()->json(["mensagem" => "Falha ao carregar o arquivo, por favor, entre em contato com suporte"/*. $ex->getMessage()*/]);
        }
    }

    public function consultar(Request $request)
    {
        $dados = DocumentoCsvDB::getLinhaData($request->date);
        return response()->json($dados);
    }

    public function download(Request $request)
    {
       
        return RegrasDocumentoCsv::downloadCSV($request->date);
    
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
