<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    use HasFactory;
    protected $table = 'campos';
    protected $primaryKey = 'id_campo';

    protected $fillable = ['nombre_campo', 'tipo_campo', 'estado'];
}
