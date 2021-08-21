<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desease extends Model
{
    use HasFactory;

    protected $guarded = ['name', 'description'];


    public function patients()
    {
        return $this->belongsToMany(Patient::class,'desease_patients');
    }
}
