<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at'];

    public function deseases()
    {
        return $this->belongsToMany(Desease::class,'desease_patients');
    }
}
