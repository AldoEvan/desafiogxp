<?php

namespace App\Models\Facade;

use App\Models\Entity\DocumentoCsv;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DocumentoCsvDB
{
    public static function listarDocumento()
    {
        return DocumentoCsv::all();
    }
    public static function getLinhaData($request)
    {   
        $dataform = Carbon::parse($request)->format('Y/m/d H:i' );
        return DB::table("documento_csv as dc")
            ->select("dc.product",
            "desc","unit","price","date","staff")
            ->where("date", "=", $dataform)
            ->get();        
    }
}
