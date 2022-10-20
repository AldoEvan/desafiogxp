<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentoCsv extends Model
{
    protected $table = 'documento_csv';
    protected $primaryKey = 'id';
    use SoftDeletes;
}
