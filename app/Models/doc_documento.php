<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doc_documento extends Model
{
    use HasFactory;

    public $table = "doc_documentos";
    protected $fillable = array("*");

     public function pro_proceso()
    {
        return $this->belongsTo(pro_proceso::class, "pro_proceso");
    }

    public function tip_tipo_doc()
    {
        return $this->belongsTo(tip_tipo_doc::class, "tip_tipo_doc");
    }
}
