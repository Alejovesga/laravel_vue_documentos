<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tip_tipo_doc extends Model
{
    use HasFactory;

    public $table = "tip_tipo_docs";
    protected $fillable = array("*");
}
