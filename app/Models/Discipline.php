<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'description', 'hours'];

    // Relacionamento com professores
    public function professors()
    {
        return $this->belongsToMany(User::class,'professor_discipline','professor_id');
    }
}
