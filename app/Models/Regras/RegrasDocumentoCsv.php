<?php

namespace App\Models\Regras;

use App\Models\Entity\DocumentoCsv;
use App\Models\Facade\DocumentoCsvDB;
use Carbon\Carbon;

class RegrasDocumentoCsv
{

    public static function salvar($request)
    {
        $handle = fopen($request->documento, 'r');
        $header  = fgetcsv($handle);
        while (($data = fgetcsv($handle, 1000, ",")) !== False) {
            $csv[] = array_combine($header, $data);
        }
        foreach ($csv as $value) {
            $dados = new DocumentoCsv();
            $dados->product = $value['product'];
            $dados->desc = $value['desc'];
            $dados->unit = $value['unit'];
            $dados->price = floatval($value['price']);
            $dados->date = Carbon::parse($value['date'])->format('Y/m/d H:i');
            $dados->staff = $value['staff'];
            $dados->save();
        }
    }

    public static function downloadCSV($request)
    {
        $fileName = 'arquivo.csv';
        $csv = DocumentoCsvDB::getLinhaData($request);
        $headers = array(
            'Content-Type' => 'text/csv',
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $callback = function () use ($csv) {
            $arquivo = fopen('php://output', 'w');

            foreach ($csv as $item) {
                $listaItem = (array)$item;
                fputcsv($arquivo, array_keys($listaItem), ",");
                $listaItem = str_replace('"', '', $listaItem);
                fputcsv($arquivo, $listaItem, ",");
            }
            fclose($arquivo);
        };

        return response()->stream($callback, 200, $headers);
    }
}
