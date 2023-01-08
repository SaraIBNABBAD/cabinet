<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    use HasFactory;
    protected $fillable = [
        'arrangement',
        'report',
        'cnssSheet',
        'balanceSheet',

    ];
    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }

}